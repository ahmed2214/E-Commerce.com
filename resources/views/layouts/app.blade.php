<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('users.index') }}">E-Commerce.com</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @if (session('user_permissions') == 'admin_user')
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('categories.index') }}">All
                                Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('products.index') }}">All
                                Product</a>
                        </li>
                    @endif

                </ul>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        @yield('userName')
                    </li>
                </ul>
            </div>
            <div class="" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        @if (session('user') != null)
                            <a class="nav-link active" aria-current="page" href="{{ route('cart.index') }}">
                                Cart</a>
                        @endif
                    </li>
                    <li class="nav-item">
                        @if (session('user') == null)
                            <a class="nav-link active" aria-current="page"
                                href="{{ route('auth.showloginform') }}">Login</a>
                        @else
                            <a class="nav-link active" aria-current="page"
                                href="{{ route('users.getSignOut') }}">Logout</a>
                        @endif
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <div class="container ">

        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
