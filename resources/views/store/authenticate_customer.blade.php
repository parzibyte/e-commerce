@extends("master")
@section("title", __("messages.checkout"))
@section("content")
    <div class="row">
        <div class="col-12">
            <h1>{{__("messages.checkout")}}</h1>
        </div>
        <div class="col-12 col-md-6">
            <h2>{{__("messages.already_have_account")}}</h2>
            <form action="{{route("login")}}" method="post">
                @csrf
                @method("POST")
                <label for="login_email">{{__("messages.email")}}</label>
                <input class="form-control w-auto" id="login_email" type="email" name="email" required
                       placeholder="{{__("messages.email")}}">
                <label for="login_password">{{__("messages.password")}}</label>
                <input class="form-control w-auto" id="login_password" type="password" name="password" required
                       placeholder="{{__("messages.password")}}">
                <button class="btn btn-success mt-2" type="submit">{{__("messages.login")}}</button>
            </form>
        </div>
        <div class="col-12 col-md-6">
            <h2>{{__("messages.register")}}</h2>
            <form action="{{route("customers.store")}}" method="post">
                @csrf
                @method("POST")
                <label for="name">{{__("messages.name")}}</label>
                <input class="form-control w-auto" id="name" type="text" name="name" required
                       placeholder="{{__("messages.name")}}">

                <label for="email">{{__("messages.email")}}</label>
                <input class="form-control w-auto" id="email" type="email" name="email" required
                       placeholder="{{__("messages.email")}}">

                <label for="address">{{__("messages.address")}}</label>
                <textarea name="address" id="address" rows="5" class="form-control w-auto" required
                          placeholder="{{__("messages.address")}}"></textarea>
                <label for="password">{{__("messages.password")}}</label>
                <input class="form-control w-auto" id="password" type="password" name="password" required
                       placeholder="{{__("messages.password")}}">

                <label for="password_confirm">{{__("messages.password_confirm")}}</label>
                <input class="form-control w-auto" id="password_confirm" type="password" name="password_confirm"
                       required
                       placeholder="{{__("messages.password_confirm")}}">
                <button class="btn btn-success mt-2" type="submit">{{__("messages.register")}}</button>
            </form>
        </div>
    </div>
@endsection
