<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/admin.css')}}">
    <title>@yield('title', 'Admin - Online Store')</title>
</head>

<body>
    <div class="row g-0" style="min-height: calc(100vh - 64px);">
        <!-- sidebar -->
        <aside class="p-3 col fixed text-white bg-dark">
            <a href="{{route('admin.home.index')}}" class="text-white text-decoration-none">
                <span class="fs-4">
                    Admin Panel
                </span>
            </a>
            <hr />
            <ul class="nav flex-column">
                <li>
                    <a href="{{route('admin.home.index')}}" class="nav-link text-white">
                        Admin - Home
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.products.index')}}" class="nav-link text-white">
                        Admin - Products
                    </a>
                </li>
                <li>
                    <a href="{{route('home.index')}}" class="mt-2 btn bg-primary text-white">
                        Go back to the home page
                    </a>
                </li>
            </ul>
        </aside>
        <!-- Content -->
        <div class="col content-grey">
            <nav class="p-3 shadow text-end">
                <span class="profile-font">
                    Admin
                </span>
                <img class="img-profile rounded circle" src="{{asset('/img/undraw_profile.svg')}}">
            </nav>
            <div class="g-0 m-5">
                @yield('content')
            </div>
        </div>
    </div>


    <!-- footer -->
    <footer class="copyright py-4 text-center text-white">
        <div class="container">
            <small>
                Copyright - <a class="text-reset fw-cold text-decoration-none" target="_blank" href="https://twitter.com/danielgarax">
                    Ahmed Nouira
                </a></small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
</body>

</html>