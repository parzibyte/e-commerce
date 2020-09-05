<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{env("APP_NAME")}}">
    <meta name="author" content="Parzibyte">
    <title>@yield("title") - {{env("APP_NAME")}}</title>
    <link href="{{url("/css/bootstrap.min.css")}}" rel="stylesheet">
    <link href="{{url("/css/all.min.css")}}" rel="stylesheet">
    <link href="{{url("/css/style.css")}}" rel="stylesheet">
    <!-- These libraries are only for product details. Maybe we should load them only when the current page is product details? -->
    <link href="{{url("/css/tiny-slider.css")}}" rel="stylesheet">
    <script src="{{url("/js/tiny-slider.js")}}" type="text/javascript"></script>
    <script src="{{url("/js/Drift.min.js")}}" type="text/javascript"></script>
    <!-- These libraries are only for product details. Maybe we should load them only when the current page is product details? -->
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" target="_blank" href="//parzibyte.me/blog">{{env("APP_NAME")}}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse"
            id="botonMenu" aria-label="Mostrar u ocultar menú">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{route("categories.index")}}">{{__("messages.categories")}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route("products.index")}}">{{__("messages.products")}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route("store.index")}}">{{__("messages.store")}}</a>
            </li>
        </ul>
        <ul class="navbar-nav">
            @if(session("cart"))
                <li class="nav-item">
                    <a class="btn btn-success h2" href="{{route("view_cart")}}">{{__("messages.see_cart")}}&nbsp;
                        <span class="badge badge-light">{{count(session("cart"))}}</span>
                    </a>
                </li>
            @endif
            @auth
                <li class="nav-item">
                    <form method="post" action="{{route("logout")}}">
                        @csrf
                        @method("POST")
                        <button class="btn btn-warning ml-1 btn-confirm-action"
                                type="submit">{{__("messages.logout")}} ({{Auth::user()->email}})
                        </button>
                    </form>
                </li>
            @endauth
        </ul>

    </div>
</nav>
<script type="text/javascript">
    // Tomado de https://parzibyte.me/blog/2019/06/26/menu-responsivo-bootstrap-4-sin-dependencias/
    document.addEventListener("DOMContentLoaded", () => {
        const menu = document.querySelector("#menu"),
            botonMenu = document.querySelector("#botonMenu");
        if (menu) {
            botonMenu.addEventListener("click", () => menu.classList.toggle("show"));
        }
    });
</script>
<main class="container-fluid">
    @yield("content")
</main>
<footer class="px-2 py-2 fixed-bottom bg-dark">
    <span class="text-muted">Gestión de tienda en línea (e-commerce) en Laravel.
        <i class="fa fa-code text-white"></i>
        con
        <i class="fa fa-heart" style="color: #ff2b56;"></i>
        por
        <a class="text-white" href="//parzibyte.me/blog">Parzibyte</a>
        &nbsp;|&nbsp;
        <a target="_blank" class="text-white" href="#">
            <i class="fab fa-github"></i>
        </a>
    </span>
</footer>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        (document.querySelectorAll(".btn-confirm-action") || []).forEach(e => {
            e.addEventListener("click", function (event) {
                if (!confirm(("{{__("messages.confirm_action")}}"))) {
                    event.preventDefault();
                }
            });
        });
    });
</script>
</body>
</html>
