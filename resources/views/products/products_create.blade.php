@extends("master")
@section("title", __("messages.add_product"))
@section("content")
    <div class="row">
        <div class="col-12">
            <h1>{{__("messages.add_product")}}</h1>
            <form enctype="multipart/form-data" method="post" action="{{route("products.store")}}">
                @csrf
                <div class="row">
                    <div class="form-group col-12 col-lg-6">
                        <label for="category_id">{{__("messages.category")}}</label>
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-12 col-lg-6">
                        <label for="name">{{__("messages.name")}}</label>
                        <input required type="text" id="name" class="form-control" name="name"
                               placeholder="{{__("messages.name")}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">{{__("messages.description")}}</label>
                    <textarea required placeholder="{{__("messages.description")}}" class="form-control"
                              name="description"
                              id="description" cols="30" rows="5"></textarea>
                </div>
                <div class="row">
                    <div class="form-group col-12 col-lg-6">
                        <label for="price">{{__("messages.price")}}</label>
                        <input required type="number" min="0" id="price" class="form-control" name="price"
                               placeholder="{{__("messages.price")}}">
                    </div>
                    <div class="form-group col-12 col-lg-6">
                        <label for="stock">{{__("messages.stock")}}</label>
                        <input required type="number" id="stock" min="0" class="form-control" name="stock"
                               placeholder="{{__("messages.stock")}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="pictures">{{__("messages.pictures")}}</label>
                    <br>
                    <input accept="image/jpeg,image/png" id="pictures" type="file" multiple>
                </div>
                @include("notification")
                <button class="btn btn-success">{{__("messages.save")}}</button>
                <a class="btn btn-primary" href="{{route("products.index")}}">{{__("messages.go_back")}}</a>
            </form>
        </div>
    </div>
@endsection
