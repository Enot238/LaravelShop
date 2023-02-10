<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Магазин іграшок @yield('tittle')</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/starter-template.css" rel="stylesheet">
    <style>
        body{
            height: 100%;
            width: 100%;
            margin: 0;
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{route('index')}}">Магазин іграшок</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li ><a href="{{route('index')}}">Всі товари</a></li>
                <li ><a href="{{route('categories')}}">Категорії</a>
                </li>
                <li ><a href="{{route('basket')}}">Кошик</a></li>
{{--                <li><a href="{{route('index')}}">en</a></li>--}}

{{--                <li class="dropdown">--}}
{{--                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">₽<span class="caret"></span></a>--}}
{{--                    <ul class="dropdown-menu">--}}
{{--                        <li><a href="http://internet-shop.tmweb.ru/currency/RUB">₽</a></li>--}}
{{--                        <li><a href="http://internet-shop.tmweb.ru/currency/USD">$</a></li>--}}
{{--                        <li><a href="http://internet-shop.tmweb.ru/currency/EUR">€</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}

            </ul>

            <ul class="navbar-nav nav navbar-form">

                <li><form action="{{route('search')}}">
                        <input class="form-control me-2" type="search" placeholder="Почати пошук..." aria-label="Search" name="q" id="q">
                        <button class="btn btn-outline-success" type="submit">Знайти</button>
                    </form></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @guest
                <li><a href="{{route('login')}}">Вхід</a></li>
                <li><a href="{{route('register')}}">Реєстрація</a></li>

                @endguest
                @auth

                    @if(\Illuminate\Support\Facades\Auth::user()->utype==="ADM")
                            <li><a href="{{ route('home')}}">Панель адміністратора</a></li>
                    @endif

                    <li><a href="{{ route('get-logout')}}">Вихід</a></li>
                @endauth


            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="starter-template">
        @if(session()->has('success'))
            <p class="alert alert-success"> {{session()->get('success')}}</p>
        @endif

        @if(session()->has('warning'))
            <p class="alert alert-warning"> {{session()->get('warning')}}</p>
        @endif

        @yield('content')
    </div>

</div>
</body>
</html>
