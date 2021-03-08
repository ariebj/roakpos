<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, 
     user-scalable=0'>
    <link rel="shortcut icon" href="{{ url('https://pos.roakrak.co.id/roakpos/storage/app/public/logos/favicon.png') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Web Application Manifest -->
    <link rel="manifest" href="manifest.json">
    <!-- Chrome for Android theme color -->
    <meta name="theme-color" content="#000000">

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="application-name" content="{{ config('app.name', 'Laravel') }}">
    <link rel="icon" sizes="512x512" href="/roakpos/public/storage/logos/logo-512x512.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="PWA">
    <link rel="apple-touch-icon" href="/roakpos/public/storage/logos/logo-512x512.png">

    <link href="/roakpos/public/storage/logos/splash-640x1136.png" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="/roakpos/public/storage/logos/splash-750x1334.png" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="/roakpos/public/storage/logos/splash-1242x2208.png" media="(device-width: 621px) and (device-height: 1104px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
    <link href="/roakpos/public/storage/logos/splash-1125x2436.png" media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
    <link href="/roakpos/public/storage/logos/splash-828x1792.png" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="/roakpos/public/storage/logos/splash-1242x2688.png" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
    <link href="/roakpos/public/storage/logos/splash-1536x2048.png" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="/roakpos/public/storage/logos/splash-1668x2224.png" media="(device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="/roakpos/public/storage/logos/splash-1668x2388.png" media="(device-width: 834px) and (device-height: 1194px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="/roakpos/public/storage/logos/splash-2048x2732.png" media="(device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />

    <!-- Tile for Win8 -->
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/roakpos/public/storage/logos/icon-512x512.png">

    <!-- Scripts -->
    <script src="{{ asset('/js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/cdda5b48e5.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style>
        @media only screen and (min-width: 320px) and (max-width: 480px) {
            .menu {
                height: 100%;
            }

            .hidden-xs {
                display: none;
            }

            .visible-xs {
                display: block;
            }

            .dinein {
                width: 50%;
            }

            .title {
                font-size: 14px;
            }

            .prodprice {
                font-size: 12px;
            }

            .prodname {
                font-size: 12px;
            }
        }

        @media only screen and (min-width: 420px) and (max-width: 720px) {
            .menu {
                height: 100%;
            }

            .hidden-xs {
                display: none;
            }

            .visible-xs {
                display: block;
            }

            .dinein {
                width: 25%;
            }

            .title {
                font-size: 14px;
            }

            .prodprice {
                font-size: 12px;
            }

            .prodname {
                font-size: 12px;
            }
        }

        @media only screen and (min-width: 720px) {

            .visible-xs {
                display: none;
            }
        }

        .percent {
            position: absolute;
            display: inline-block;
            left: 50%;
            color: #040608;
        }

        .list-group-item:hover {
            opacity: 0.8;
        }

        .pagination {
            margin-bottom: 0;
            padding-bottom: 0;
        }

        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-color: #F5F5F5;
            border-radius: 1px;
        }

        ::-webkit-scrollbar {
            width: 3px;
            height: 10px;
            background-color: #F5F5F5;
        }

        ::-webkit-scrollbar-thumb {
            border-radius: 1px;
            background-color: #FFF;
            background-image: -webkit-gradient(linear,
                    40% 0%,
                    75% 84%,
                    from(#4D9C41),
                    to(#19911D),
                    color-stop(.6, #54DE5D))
        }

        .ovl-container {
            position: relative;
            width: 100%;
            max-width: 400px;
        }

        .image-ovl {
            display: block;
            width: 100%;
            height: auto;
        }

        .ovl {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            height: 100%;
            width: 100%;
            opacity: 0;
            transition: .3s ease;
            background-color: #000;
        }

        .ovl-container:hover .ovl {
            opacity: 0.7;
        }

        .ovl-icon {
            color: white;
            font-size: 100px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            text-align: center;
        }

        .fa-shopping-cart:hover {
            color: #ef8b17;
        }

        .modal.left .modal-dialog,
        .modal.right .modal-dialog {
            position: fixed;
            margin: auto;
            width: 200px;
            height: 100%;
            -webkit-transform: translate3d(0%, 0, 0);
            -ms-transform: translate3d(0%, 0, 0);
            -o-transform: translate3d(0%, 0, 0);
            transform: translate3d(0%, 0, 0);
            border-radius: 0;
        }

        .modal.left .modal-header .modal-footer,
        .modal.right .modal-header .modal-footer {
            border-radius: 0;
        }

        .modal.left .modal-content,
        .modal.right .modal-content {
            height: 100%;
            overflow-y: auto;
        }

        .modal.left .modal-body,
        .modal.right .modal-body {
            padding: 15px 15px 80px;
        }


        .modal.right.fade .modal-dialog {
            right: -320;
            -webkit-transition: opacity 0.3s linear, left 0.3s ease-out;
            -moz-transition: opacity 0.3s linear, left 0.3s ease-out;
            -o-transition: opacity 0.3s linear, left 0.3s ease-out;
            transition: opacity 0.3s linear, left 0.3s ease-out;
        }

        .modal.right.fade.in .modal-dialog {
            right: 0;
        }

        .modal.right.fade:not(.in) .modal-dialog {
            right: 0;
        }

        table {
            text-align: left;
            position: relative;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 0.25rem;
        }

        tr.red th {
            background: red;
            color: white;
        }

        tr.green th {
            background: green;
            color: white;
        }

        tr.purple th {
            background: purple;
            color: white;
        }

        th {
            background: #fff;
            position: sticky;
            z-index: 1;
            border: 0;
            top: 0;
            /* Don't forget this, required for the stickiness */
            box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);
        }
    </style>
    @livewireStyles
</head>

<body>
    <div id="app">
        @if(session()->has('message'))
        <div class="alert alert-success align-items-center" role="alert" style="display:flex;position:absolute;top:0;z-index:99999;width:100%;">
            {{session('message')}}
            <button type="button" class="text-danger close" data-dismiss="alert" aria-hidden="true" style="position:absolute;right:5px;top:5px;">&times;</button>
        </div>
        @endif
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-top">
            <div class="container-fluid d-flex justify-content-between">
                <a class="navbar-brand text-secondary" href="{{ url('/') }}">
                    <img src="{{ asset('storage/logos/logo-512x512.png') }}" class="img-responsive py-0 px-0" alt="logo" style="height:40px;">
                </a>
                <div class="col text-secondary text-left px-0">
                    <strong>{{ config('app.name') }}</strong> {{ config('app.version') }}
                </div>
                @if (Route::has('login'))
                @auth
                <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#adminSideBar">
                    <i class="fa fa-list" aria-hidden="true"></i>
                </button>
                <a class="btn btn-outline-secondary" href="{{ route('home') }}">
                    <i class="fa fa-tachometer mr-1"></i><span class="hidden-xs">Dasbor</span>
                </a>
                <a class="btn btn-outline-secondary" href="{{ route('cart') }}">
                    <i class="fa fa-cash-register mr-1"></i><span class="hidden-xs">Kasir</span>
                </a>

                <a class="btn btn-outline-secondary" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                @endauth
                @endif
                @guest
                <button class="btn btn-outline-secondary" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <i class="fa fa-list" aria-hidden="true"></i>
                </button>
                @endguest
            </div>
            <div class="container-fluid px-0">
                @guest
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                    </ul>
                </div>
                @endguest

            </div>
        </nav>
        <main class="py-2">
            @yield('content')
            <div class="container-fluid px-1">
                @include('livewire.dashboard-nav')
                {{isset($slot) ? $slot : null}}
            </div>
        </main>
    </div>
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script>
    @stack('scripts')
    <!-- service worker javascript -->
    <script>
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('serviceworker.js').then(function() {
                console.log('Service Worker Registered');
            });
        }
    </script>
</body>

</html>