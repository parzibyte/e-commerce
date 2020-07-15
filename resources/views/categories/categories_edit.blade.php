@extends("master")
@section("title", __("messages.edit_category"))
@section("content")
    <div class="row">
        <div class="col-12">
            <h1>{{__("messages.edit_category")}}</h1>
            <form method="post" action="{{route("categories.update", $category)}}">
                @csrf
                @method("PUT")
                <div class="form-group">
                    <label for="name">{{__("messages.name")}}</label>
                    <input required type="text" id="name" class="form-control" name="name"
                           value="{{$category->name}}"
                           placeholder="{{__("messages.name")}}">
                </div>
                <div class="form-group">
                    <label for="description">{{__("messages.description")}}</label>
                    <input required type="text" id="description" class="form-control" name="description"
                           value="{{$category->description}}"
                           placeholder="{{__("messages.description")}}">
                </div>
                @include("notification")
                <button class="btn btn-success">{{__("messages.save")}}</button>
                <a class="btn btn-primary" href="{{route("categories.index")}}">{{__("messages.go_back")}}</a>
            </form>
        </div>
    </div>
@endsection
