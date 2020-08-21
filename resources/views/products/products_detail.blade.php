@extends("master")
@section("title", $product->name)
@section("content")
    <div class="row">
        <div class="col-12 col-lg-4">
            {{$product->pictures}}
        </div>
        <div class="col-12 col-lg-8">
            <h1 class="display-4">{{$product->name}}</h1>
            <p class="product-detail">{{$product->description}}</p>
            <h1 class="display-3">${{number_format($product->price, 2)}} </h1>
            <h3 class="text-muted">{{$product->stock}} {{__("messages.available_count")}}</h3>
            <form method="post" action="{{route("add_product_to_cart", ["product"=>$product])}}">
                @csrf
                <div class="input-group mb-3 add-to-cart-form">
                    <input name="quantity" value="1" min="1" max="{{$product->stock}}" type="number"
                           class="form-control"
                           placeholder="{{__("messages.quantity")}}">
                    <div class="input-group-append">
                        <button class="btn btn-success" type="submit">{{__("messages.add_to_cart")}}&nbsp;<i
                                class="fa fa-cart-plus"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
