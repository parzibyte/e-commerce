@if(session("message"))
    <div class="alert alert-{{session('type') ? session("type") : "info"}}">
        {{session('message')}}
    </div>
@endif
