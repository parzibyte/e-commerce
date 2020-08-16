@extends("master")
@section("title", __("messages.edit_product"))
@section("content")
    <div class="row">
        <div class="col-12 col-lg-6">
            <h1>{{__("messages.edit_product")}}</h1>
            <form enctype="multipart/form-data" method="post" action="{{route("products.update", $product)}}">
                @method("PUT")
                @csrf
                <div class="row">
                    <div class="form-group col-12 col-lg-6">
                        <label for="category_id">{{__("messages.category")}}</label>
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach($categories as $category)
                                <option
                                    {{$product->category_id == $category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-12 col-lg-6">
                        <label for="name">{{__("messages.name")}}</label>
                        <input required type="text" id="name" class="form-control" name="name"
                               value="{{$product->name}}"
                               placeholder="{{__("messages.name")}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">{{__("messages.description")}}</label>
                    <textarea required placeholder="{{__("messages.description")}}" class="form-control"
                              name="description"
                              id="description" cols="30" rows="5">{{$product->description}}</textarea>
                </div>
                <div class="row">
                    <div class="form-group col-12 col-lg-6">
                        <label for="price">{{__("messages.price")}}</label>
                        <input required type="number" min="0" id="price" class="form-control" name="price"
                               value="{{$product->price}}"
                               placeholder="{{__("messages.price")}}">
                    </div>
                    <div class="form-group col-12 col-lg-6">
                        <label for="stock">{{__("messages.stock")}}</label>
                        <input required type="number" id="stock" min="0" class="form-control" name="stock"
                               value="{{$product->stock}}"
                               placeholder="{{__("messages.stock")}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="pictures">{{__("messages.pictures")}}</label>
                    <br>
                    <input name="pictures[]" accept="image/jpeg,image/png" id="pictures" type="file" multiple>
                </div>
                @include("notification")
                @include("form_errors")
                <button class="btn btn-success">{{__("messages.save")}}</button>
                <a class="btn btn-primary" href="{{route("products.index")}}">{{__("messages.go_back")}}</a>
            </form>
        </div>
        <div class="col-12 col-lg-6">
            <h1>{{__("messages.pictures")}}</h1>
            <div class="row">
                @foreach($product->pictures as $picture)
                    <div class="col-auto mb-3">
                        <div class="card" style="width: 18rem;">
                            <img
                                src="{{$picture->getPath()}}"
                                alt="{{$product->name}} picture"
                                class=" img-fluid">
                            <div class="card-body">
                                <form method="post" action="{{route("product_pictures.destroy", $picture)}}">
                                    @method("DELETE")
                                    @csrf
                                    <a target="_blank"
                                       href="{{asset("storage".  DIRECTORY_SEPARATOR . config("project.pictures_directory") . DIRECTORY_SEPARATOR . $picture->name)}}"
                                       class="btn-info btn">
                                        <i class="fa fa-external-link-alt"></i>
                                    </a>
                                    <button class="btn btn-danger btn-confirm-action">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
