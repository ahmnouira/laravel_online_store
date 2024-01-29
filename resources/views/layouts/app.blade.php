<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <title>@yield('title', 'Online Store')</title>
</head>

<body>
    <!-- header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary py-4">
        <div class="container">
            <a href="{{ route('home.index') }}" class="navbar-brand">
                Online Store
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a href="{{ route('home.index') }}" class="nav-link active">Home</a>
                    <a href="{{ route('products.index') }}" class="nav-link active">Products</a>
                    <a href="{{ route('home.about') }}" class="nav-link active">About</a>
                    <div class="vr bg-white mx-2 d-none d-lg-block"></div>
                    @guest
                    <a class="nav-link active" href="{{route('login')}}">Login</a>
                    <a class="nav-link active" href="{{route('register')}}">Register</a>
                    @else
                    <form id="logout" action="{{route('logout')}}" method="POST">
                        <a role="button" class="nav-link active" onclick="document.getElementById('logout').submit();">
                            Logout
                        </a>
                        @csrf
                    </form>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <header class="masthead bg-primary text-white text-center py-4">
        <div class="container d-flex align-items-center flex-column">
            <h2>@yield('subtitle', 'A Laravel Online Store')</h2>
        </div>
    </header>
    <!-- header -->

    <div class="container my-4">
        @yield('content')
    </div>
    <!-- footer -->
    <div class="copyright py-4 text-center text-white">
        <div class="container">
            <small>
                Copyright - <a class="text-reset fw-bold text-decoration none" target="_blank" href="https://twitter.com/ahmnouira">
                    ahmnouira
                </a>
                - <b>Ahmed Nouira</b>
            </small>
        </div>
    </div>
    <!-- footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>

</body>

</html>