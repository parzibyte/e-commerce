@extends("master")
@section("title", __("messages.cart"))
@section("content")
    <div class="row">
        <div class="col-12">
            <h1>{{__("messages.cart")}}</h1>
        </div>
        @if(count($cart) > 0)
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>{{__("messages.name")}}</th>
                            <th>{{__("messages.price")}}</th>
                            <th>{{__("messages.quantity")}}</th>
                            <th>{{__("messages.subtotal")}}</th>
                            <th>{{__("messages.view")}}</th>
                            <th>{{__("messages.remove")}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $total = 0
                        ?>
                        @foreach($cart as $product)
                            <tr>
                                <td>{{$product->name}}</td>
                                <td>${{$product->price}}</td>
                                <td>{{number_format($product->quantity, 2)}}</td>
                                <td>${{number_format($product->quantity * $product->price, 2)}}</td>
                                <td>
                                    <a href="{{$product->getAbsoluteUrl()}}" class="btn btn-info">
                                        <i class="fa fa-info-circle"></i>
                                    </a>
                                </td>
                                <td>
                                    <form method="post" action="#">
                                        @csrf
                                        @method("DELETE")
                                        <button class="btn btn-danger btn-confirm-action">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                            $total += $product->quantity * $product->price;
                            ?>
                        @endforeach
                        </tbody>

                    </table>
                    <h2><small>{{__("messages.total")}}:</small> ${{number_format($total, 2)}}</h2>
                    <form action="#">
                        <button class="btn btn-success btn-lg"><i
                                class="fa fa-check"></i>&nbsp;{{__("messages.checkout")}}
                        </button>
                    </form>
                    <form class="mt-2" action="">
                        <button class="btn btn-danger btn-xs btn-confirm-action">{{__("messages.empty_cart")}}
                        </button>
                    </form>
                </div>
            </div>
        @endif
    </div>
@endsection
