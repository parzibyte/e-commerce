<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StoreProduct;
use App\Product;
use App\ProductPicture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("products.products_index", [
            "products" => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("products.products_create", [
            "products" => Product::all(),
            "categories" => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
        $product = new Product($request->input());
        $uniqid = uniqid();
        $product->slug = Str::of($product->name)->slug("-")->limit(255 - mb_strlen($uniqid) - 1)->append("-", $uniqid);
        $product->saveOrFail();
        $this->storePictures($request, $product->id);
        return redirect()->route("products.index")->with("message", __("messages.product_created"));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Product $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, string $slug)
    {
        $product = Product::where("slug", "=", $slug)->limit(1)->first();
        $inCart = false;
        $cart = [];
        if (session("cart")) {
            $cart = session("cart");
        }
        foreach ($cart as $cartProduct) {
            if ($product->id === $cartProduct->id) {
                $inCart = true;
                break;
            }
        }
        return view("products.products_detail", ["product" => $product, "inCart" => $inCart]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view("products.products_edit", [
            "product" => $product,
            "categories" => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->fill($request->input());
        $product->saveOrFail();
        $this->storePictures($request, $product->id);
        return redirect()->route("products.index")->with("message", __("messages.product_updated"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $this->deletePictures($product);
        $product->delete();
        return redirect()->route("products.index")->with("message", __("messages.product_deleted"));
    }

    private function deletePictures(Product $product)
    {
        $picturesController = new ProductPicturesController();
        foreach ($product->pictures as $picture) {
            $picturesController->deletePictureFromFilesystem($picture->name);
        }
    }

    private function storePictures(Request $request, $productId)
    {
        if (!$request->file("pictures")) {
            return;
        }
        foreach ($request->file("pictures") as $picture) {
            $fullPath = $picture->store(config("project.pictures_directory"), [
                "disk" => "public",
            ]);
            $basename = basename($fullPath);
            $picture = new ProductPicture();
            $picture->fill([
                "product_id" => $productId,
                "name" => $basename
            ]);
            $picture->saveOrFail();
        }
    }
}
