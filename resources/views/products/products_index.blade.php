@extends("master")
@section("title", __("messages.products"))
@section("content")
    <div class="row">
        <div class="col-12">
            <h1>{{__("messages.products")}}</h1>
            <a href="{{route("products.create")}}" class="btn btn-success mb-2">
                <i class="fa fa-plus-circle"></i>
                {{__("messages.add_product")}}</a>
            @include("notification")
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>{{__("messages.name")}}</th>
                <th>{{__("messages.description")}}</th>
                <th>{{__("messages.category")}}</th>
                <th>{{__("messages.edit")}}</th>
                <th>{{__("messages.delete")}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->name}} </td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->category->name}}</td>
                    <td>
                        <a class="btn btn-warning" href="{{route("products.edit", $product)}}">
                            <i class="fa fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <form method="post" action="{{route("products.destroy", $product)}}">
                            @method("DELETE")
                            @csrf
                            <button class="btn btn-danger btn-confirm-action" type="submit">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
