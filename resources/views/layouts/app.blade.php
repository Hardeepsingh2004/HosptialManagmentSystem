<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@php
    $settings = \App\Models\Settings::pluck('value', 'key')->toArray();
@endphp
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/' . ($settings['icon'] ?? 'default-icon.png')) }}" type="image/x-icon" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/colors.css') }}">
    <link rel="stylesheet" href="{{ asset('css/versions.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/modernizer.js') }}"></script>

    @livewireStyles
</head>

<body class="clinic_version">
    <!-- LOADER -->
    <div id="preloader">
        <a href="{{ url('/') }}">
            <img class="preloader" src="{{ asset('images/loaders/heart-loading2.gif') }}" alt="loading">
        </a>
    </div>

    <header>
        <div class="header-top wow fadeIn">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/' . ($settings['logo'] ?? 'logo.png')) }}" alt="logo">
                </a>
                <div class="right-header">
                    <div class="header-info">
                        <div class="info-inner">
                            <span class="icontop"><img src="{{ asset('images/phone-icon.png') }}" alt="phone" onerror="this.src='{{ asset('images/default-phone-icon.png') }}';"></span>
                            <span class="iconcont"><a href="tel:{{ $settings['phone'] ?? '123 123 123' }}">{{ $settings['phone'] ?? '123 123 123' }}</a></span>
                        </div>
                        <div class="info-inner">
                            <span class="icontop"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                            <span class="iconcont"><a href="mailto:{{ $settings['email'] ?? 'tauseed@test.com' }}">{{ $settings['email'] ?? 'example@test.com' }}</a></span>
                        </div>
                        <div class="info-inner">
                            <span class="icontop"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                            <span class="iconcont"><a href="#">Daily: {{ $settings['working_horse'] ?? '7:00 AM - 8:00 PM' }}</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-bottom wow fadeIn">
            <div class="container-fluid">
                <nav class="main-menu">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li><a id="Home" href="{{ url('/') }}">Home</a></li>
                            <li><a id="Services" href="{{ url('/services') }}">Services</a></li>
                            <li><a id="Doctors" href="{{ url('/docters') }}">Doctors</a></li>
                            <li><a id="Departments" href="#departments">Departments</a></li>
                            <li><a id="About" href="{{ url('/about') }}">About Us</a></li>
                            <li><a id="Contact" href="{{ url('/contact') }}">Contact</a></li>
                            @auth
                                @if (auth()->user()->is_super_admin)
                                    <li><a id="admin-area" href="{{ route('admin_settings') }}">Admin Area</a></li>
                                @endif
                            @endauth
                        </ul>
                    </div>
                </nav>
                @livewire('search')
            </div>
        </div>
    </header>

    <main id="main">
        @yield('content')
    </main>

    <a href="#home" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <footer id="footer" class="footer-area wow fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="logo padding">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('images/' . ($settings['logo'] ?? 'logo.png')) }}" alt="logo">
                        </a>
                        <p>{{ $settings['description'] ?? 'Locavore pork belly scenester pine est chill wave microdosing pop up cliche artisan.' }}</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="footer-info padding">
                        <h3>CONTACT US</h3>
                        <p><i class="fa fa-map-marker"></i> {{ $settings['address'] ?? 'District ABC, P/O XYZ, Sorana' }}</p>
                        <p><i class="fa fa-paper-plane"></i> {{ $settings['email'] ?? 'example@test.com' }}</p>
                        <p><i class="fa fa-phone"></i> {{ $settings['phone'] ?? '123 123 123' }}</p>
                    </div>
                </div>

                @livewire('subscribe')
            </div>
        </div>
    </footer>

    <div class="copyright-area wow fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="footer-text">
                        <p>© {{ date('Y') }} <a href="{{ url('') }}" target="_blank">{{ env('APP_NAME') }}</a>, Inc</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="social">
                        <ul class="social-links">
                            <li><a href="#"><i class="fa fa-rss"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="{{ route('privacy.policy') }}">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @livewireScripts

    <!-- JS -->
    <script src="{{ asset('js/all-in-one.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script>
        function check_active(id) {
            const element = document.getElementById(id);
            if (element) {
                document.querySelectorAll('.nav > li > a').forEach(el => el.classList.remove('active'));
                element.classList.add('active');
            }
        }
    </script>
</body>
</html>
