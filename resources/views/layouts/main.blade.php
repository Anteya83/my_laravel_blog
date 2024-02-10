<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div class="container">
{{--    <nav class="row-cols-auto">--}}
{{--        <ul>--}}
{{--            <li><a href="{{route('article.index')}}">Main</a></li>--}}
{{--            <li><a href="{{route('about.index')}}">About</a></li>--}}
{{--            <li><a href="{{route('contacts.index')}}">Contacts</a></li>--}}
{{--        </ul>--}}
{{--    </nav>--}}
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('article.index')}}">Main</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('about.index')}}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contacts.index')}}">Contacts</a>
                    </li>
                    @can('view', auth()->user())
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.article.index')}}">Admin</a>
                    </li>
                    @endcan
                </ul>

            </div>
        </div>
    </nav>
</div>
    @yield('content')
</body>
</html>
