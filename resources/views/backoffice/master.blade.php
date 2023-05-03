<!DOCTYPE HTML>
<html class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Meta-->
    <meta name="keywords" content="@yield('keywords', 'cinéma,film,films à l\'affiche')" />
    <meta name="description" content="@yield('description', 'Equipe de passionné(e)s de Cinéma. Nous sommes heureux de vous présenter nos coups de coeur, recommandés par de fous furieux !'))" />
    <meta name="author" content="@yield('author', 'BTS SIO CARCOUET'))" />
    <title>{{ $title }}</title>
    <!-- CSRF for AJAX -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Scripts spécifiques-->
    @isset($jshead)
        {!! $jshead !!}
    @endisset
</head>
<body>
    <!-- begin header -->
    @section('header')
        @include('backoffice.inc.header')
    @show
    <!-- end header -->
    <!-- begin navbar -->
    @section('navbar')
        @include('backoffice.inc.navbar')
    @show
    <!-- end navbar -->
    <!-- content -->
    <div class="container-fluid">
                @yield('content')
                @isset($contentviacontroller)
                    {!! $contentviacontroller!!}
                @endisset
                @isset($slot)
                    {{ $slot }}
                @endisset
                @isset($includeviews)
                    @if ($includeviews)
                        @foreach( $vues as $vue)
                            @include($vue) 
                        @endforeach
                    @else
                        @include($vue)   
                    @endif
                @endisset

    <!—end content -->
    </div>
    <!-- begin footer -->
    @section('footer')
        @include('backoffice.inc.footer')
    @show
    <!-- end footer -->
    @isset($jsfoot)
            {!! $jsfoot !!}
    @endisset
</body>
</html>