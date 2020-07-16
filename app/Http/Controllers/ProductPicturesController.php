<?php

namespace App\Http\Controllers;

use App\ProductPicture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductPicturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\ProductPicture $productPicture
     * @return \Illuminate\Http\Response
     */
    public function show(ProductPicture $productPicture)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\ProductPicture $productPicture
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductPicture $productPicture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\ProductPicture $productPicture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductPicture $productPicture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\ProductPicture $productPicture
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductPicture $productPicture)
    {
        $this->deletePictureFromFilesystem($productPicture->name);
        $productPicture->delete();
        return redirect()->back()->with("message", __("messages.picture_deleted"));
    }

    public function deletePictureFromFilesystem($pictureName)
    {
        $path = config("project.pictures_directory") . DIRECTORY_SEPARATOR . $pictureName;
        Storage::disk("public")->delete($path);
    }
}
