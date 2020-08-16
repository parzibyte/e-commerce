@extends("master")
@section("title", __("messages.store"))
@section("content")
    <div class="row">
        <div class="col-12">
            <form action="#" method="get">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <label for="category">{{__("messages.category")}}</label>
                        <select required name="category" id="category" class="form-control">
                            <option value="-1">{{__("messages.all")}}</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-md-7 mb-2">
                        <label for="search">{{__("messages.search")}}</label>
                        <input required id="search" placeholder="{{__("messages.search")}}" name="search" type="text"
                               class="form-control">
                    </div>
                    <div class="col-12 col-md-1">
                        <label for="#">‏‏‎ ‎</label>
                        <br>
                        <button type="submit" class="btn btn-success">{{__("messages.filter")}}</button>
                    </div>
                </div>
            </form>
            @include("notification")
        </div>
    </div>
    <div class="row">
        @foreach($products as $product)
            <div class="col-12 col-md-4 col-lg-3 mb-2 card-group">
                <div class="card">
                    <img class="card-img-top" src="{{$product->pictures[0]->getPath()}}"
                         alt="{{$product->name}} picture">
                    <div class="card-body">
                        <h5 class="card-title">{{$product->name}}</h5>
                        <p class="card-text">{{$product->description}}</p>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-success" href="#">{{__("messages.details")}}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
