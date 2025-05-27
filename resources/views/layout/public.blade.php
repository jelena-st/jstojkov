<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width,initial-scale=1" name="viewport">
    <meta content="Page description" name="description">
    <meta name="google" content="notranslate" />
    <meta content="Mashup templates have been developped by Orson.io team" name="author">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <link href="./assets/apple-icon-180x180.png" rel="apple-touch-icon">
    <link href="./assets/favicon.ico" rel="icon">



    <title>@yield('title')</title>

    @vite('resources/css/main.82cfd66e.css')
</head>

<body>

    <!-- Add your content of header -->
    <header class="">
        <div class="navbar navbar-default visible-xs">
            <button type="button" class="navbar-toggle collapsed">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="{{ route('horse.welcome') }}" class="navbar-brand">Imperial Stables</a>
        </div>

        <nav class="sidebar">
            <div class="navbar-collapse" id="navbar-collapse">
                <div class="site-header hidden-xs">
                    <a class="site-brand" href="{{ route('horse.welcome') }}" title="">
                        <img class="img-responsive site-logo" alt="" src="{{ asset('images/logo1.png') }}">
                        Imperial Stables
                    </a>
                    <p>Where passion for horses meets unmatched quality and care.</p>
                </div>
                <ul class="nav">
                    <li><a href="{{ route('horse.welcome') }}" title="">Home</a></li>
                    <li><a href="{{ route('horse.list') }}" title="">Horses auction</a></li>
                    <li><a href="{{ route('contact') }}" title="">Contact us</a></li>

                    @if (Auth::check())
                        @if (Auth::user()->role_id == 2)
                            <li><a href="{{ route('dashboard') }}" title="">My Bids</a></li>
                        @elseif (in_array(Auth::user()->role_id, [1, 3]))
                            <li><a href="{{ route('dashboard') }}" title="">Dashboard</a></li>
                        @endif
                    @endif

                    @if (!Auth::check())
                        <li><a href="{{ route('login') }}" title="">Login</a></li>
                        <li><a href="{{ route('register') }}" title="">Register</a></li>
                    @else
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    @endif
                </ul>

                <nav class="nav-footer">
                    <p class="nav-footer-social-buttons">
                        <a class="fa-icon" href="https://www.instagram.com/" title="">
                            <i class="fa fa-instagram"></i>
                        </a>
                        <a class="fa-icon" href="https://dribbble.com/" title="">
                            <i class="fa fa-dribbble"></i>
                        </a>
                        <a class="fa-icon" href="https://twitter.com/" title="">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </p>
                    <p>Copyright © 2025 | Website created with <a href="http://www.mashup-template.com/"
                            title="Create website with free html template">Mashup Template</a><a
                            href="https://www.unsplash.com/" title="Beautiful Free Images"></a></p>
                </nav>
            </div>
        </nav>
    </header>
    <main class="" id="main-collapse">

        @yield('content')

    </main>

    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            navbarToggleSidebar();
            navActivePage();
        });
    </script>

    @vite('resources/js/main.85741bff.js')
</body>

</html>
