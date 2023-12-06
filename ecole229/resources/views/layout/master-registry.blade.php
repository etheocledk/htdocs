<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
</head>

<body class="container " style="width: 100%;height: 100vh;display: flex;align-items: center;justify-content: center">

    <div class="card" style="width: 500px">
        <div class="card-header boder-success ">
            <div class="acrd-header bg-success text-white text-center">@yield('title')</div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show container" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session("success"))
            <div class="alert alert-success alert-dismissible fade show container" role="alert">
                <p>{{session("success")}}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session("error"))
        <div class="alert alert-danger alert-dismissible fade show container" role="alert">
            <p>{{session("error")}}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
        <div class="card-body ">

            @yield('content')
        </div>
    </div>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
</body>

</html>
