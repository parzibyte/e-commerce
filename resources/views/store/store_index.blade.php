@extends("master")
@section("title", __("messages.store"))
@section("content")
    <div class="row">
        <div class="col-12">
            @include("notification")
            <form action="#" method="get">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <label for="category">{{__("messages.category")}}</label>
                        <select name="category" id="category" class="form-control">
                            <option {{$categoryId == -1 ? 'selected' : ''}} value="-1">{{__("messages.all")}}</option>
                            @foreach($categories as $category)
                                <option
                                    {{$category->id == $categoryId ? 'selected': ''}} value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-md-7 mb-2">
                        <label for="search">{{__("messages.search")}}</label>
                        <input value="{{$search}}" id="search" placeholder="{{__("messages.search")}}"
                               name="search" type="text"
                               class="form-control">
                    </div>
                    <div class="col-12 col-md-1">
                        <label for="#">‏‏‎ ‎</label>
                        <br>
                        <button type="submit" class="btn btn-primary">{{__("messages.filter")}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        @foreach($products as $product)
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-2 card-group">
                <div class="card">
                    <img class="card-img-top" src="{{$product->pictures[0]->getPath()}}"
                         alt="{{$product->name}} picture">
                    <div class="card-body">
                        <a href="{{$product->getAbsoluteUrl()}}" class="card-title h5">{{$product->name}}</a>
                        <p class="card-text">{{Str::limit($product->description)}}</p>
                    </div>
                    <div class="card-footer">
                        <h3>${{number_format($product->price, 2)}}</h3>
                        <a class="btn btn-success w-100"
                           href="{{$product->getAbsoluteUrl()}}">{{__("messages.details")}}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-12">
            {{$products->links()}}
        </div>
    </div>
@endsection
