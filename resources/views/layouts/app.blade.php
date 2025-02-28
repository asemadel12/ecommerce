<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'my laravel project')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-reboot.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-reboot.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-utilities.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-utilities.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-reboot.rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-reboot.rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-utilities.rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-utilities.rtl.min.css') }}">

</head>

<body>
    <header>
        <nav>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"><img width="40" height="40" src="data:image/jpeg;base64,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" alt=""></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('index') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('index') }}">Add Item</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
    </footer>
    <!-- Bootstrap JavaScript (with Popper.js included) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap JavaScript (no Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>

</html>