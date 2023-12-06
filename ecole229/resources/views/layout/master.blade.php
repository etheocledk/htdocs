 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <style>
        .btn-sm {
            background-color: green;
            color: white;
            font-weight: bold;
        }

        .btn-sm:hover {
            background-color: transparent;
            color: black;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand text-white bold" href="/">BLOG</a>
                <form class="d-flex">
                    
                    <a class="btn btn-danger me-3" href="{{route('logout')}}">LOGOUT</a>
                    <input class="form-control me-2" type="search" placeholder="Rechercher un blog">
                    <button class="btn btn-success" type="submit">Rechercher</button>
                </form>
            </div>
        </nav>
    </header>

    @yield("content")

</body>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.js') }}"></script>
</html>


 {{-- @if(Auth::check()) --}}