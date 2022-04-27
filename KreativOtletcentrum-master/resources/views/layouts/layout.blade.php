<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Alegreya Sans SC' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/1aa607cf76.js" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.1/nouislider.css" integrity="sha512-MKxcSu/LDtbIYHBNAWUQwfB3iVoG9xeMCm32QV5hZ/9lFaQZJVaXfz9aFa0IZExWzCpm7OWvp9zq9gVip/nLMg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.1/nouislider.min.js" integrity="sha512-T5Bneq9hePRO8JR0S/0lQ7gdW+ceLThvC80UjwkMRz+8q+4DARVZ4dqKoyENC7FcYresjfJ6ubaOgIE35irf4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fooldal_style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/kapcsolat_style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/termek_style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/kesz_termekek.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dekoraciok_style.css') }}" rel="stylesheet">


    <link rel="icon" href="photos/favicon.ico" type="image/gif" sizes="16x16">

</head>

<body onload="onLoader()" style="margin-top:0;">

    <!--Menü kezdete-->
    <nav id="navbar">
        <div class="menu-icon">
            <span class="fas fa-bars"></span>
        </div>


        <div class="nav-items">
            <li><a href="{{ route('index') }}">Főoldal</a></li>
            <li><a href="{{ route('termekek') }}">Termékek</a></li>
            <li><a href="{{ route('rolunk') }}">Rólunk</a></li>
            <li><a href="{{ route('kapcsolat') }}">Kapcsolat</a></li>
            <div class="dark-icon-hided"><button id="dark-mode-toggle-hided" class="dark-mode-toggle-hided"><i class="fa-solid fa-circle-half-stroke" id="darkicon"></i></button>
            </div>
            <!--
            @auth
            <li id="login-hided">
                <div class="dropdown">
                    <button type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                        <script src="https://cdn.lordicon.com/lusqsztk.js"></script>
                        <lord-icon src="https://cdn.lordicon.com/dxjqoygy.json" trigger="hover" colors="primary:#121331,secondary:#08a88a" stroke="85" style="width:3rem;height:3rem">
                        </lord-icon>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <p>{{ Auth::user()->name }}</p>
                        <a href="{{ route('profil') }}">
                            {{ __('Profilom') }}
                        </a><br />
                        <a href="{{ route('kosaram') }}">
                            {{ __('Kosár') }}
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Kijelentkezés') }}
                            </a>
                        </form>
                    </div>
                </div>
            </li>
            @else
            <li id="login-hided">
                <div class="dropdown">
                    <button type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <script src="https://cdn.lordicon.com/lusqsztk.js"></script>
                        <lord-icon src="https://cdn.lordicon.com/dxjqoygy.json" trigger="hover" colors="primary:#121331,secondary:#08a88a" stroke="85" style="width:4.5rem;height:4.5rem">
                        </lord-icon>

                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a href="{{ route('login') }}">
                            {{ __('Bejelentkezés') }}
                        </a>
                        <a href="{{ route('register') }}">
                            {{ __('Regisztráció') }}
                        </a><br />

                    </div>
                </div>
            </li>
            @endauth-->
        </div>


        <div class="search-icon">
            <span class="fas fa-search"></span>
        </div>

        <div class="cancel-icon">
            <span class="fas fa-times"></span>
        </div>

        <form action="{{ route('web.search')}}" method="GET" id="kereso_mezo">
            <input type="text" name="query" class="search-data" placeholder="Keresés" required>
            <button type="submit" id="kereso_gomb">
                <script src="https://cdn.lordicon.com/lusqsztk.js"></script>
                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="hover" colors="primary:#121331,secondary:#08a88a" stroke="100" style="width:2.5rem;height:2.5rem">
                </lord-icon>
            </button>
        </form>

        <div class="bag-icon">
            <a href="{{ route('cart') }}"><button type="button" class="btn btn"><span class="bi bi-bag">{{ count((array) session('cart')) }}</span></button></a>
        </div>

        <div class="dark-icon"><button id="dark-mode-toggle" class="dark-mode-toggle"><i class="fa-solid fa-circle-half-stroke" id="darkicon"></i></button>
        </div>


    </nav>
    <!--Menü vége-->

    <div id="loader"></div>
    <div style="display:none;" id="loaderdiv" class="animate-bottom">
        @auth
        <li id="login">
            <div class="dropdown">
                <button type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <script src="https://cdn.lordicon.com/lusqsztk.js"></script>
                    <lord-icon src="https://cdn.lordicon.com/dxjqoygy.json" trigger="hover" colors="primary:#121331,secondary:#08a88a" stroke="85" style="width:4.5rem;height:4.5rem">
                    </lord-icon>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="drop_login">
                    <p>{{ Auth::user()->name }}</p>
                    <a href="{{ route('profil') }}">
                        {{ __('Profilom') }}
                    </a>
                    <a href="{{ route('kosaram') }}">
                        {{ __('Kosaram') }}
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <a href="{{ route('logout') }}" style="color: red;" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Kijelentkezés') }}
                        </a>
                    </form>
                </div>
            </div>
        </li>
        @else
        <li id="login">
            <div class="dropdown">
                <button type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <script src="https://cdn.lordicon.com/lusqsztk.js"></script>
                    <lord-icon src="https://cdn.lordicon.com/dxjqoygy.json" trigger="hover" colors="primary:#121331,secondary:#08a88a" stroke="85" style="width:4.5rem;height:4.5rem">
                    </lord-icon>

                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="drop_login">
                    <a href="/verify-email">
                        {{ __('Bejelentkezés') }}
                    </a>
                    <a href="{{ route('register') }}">
                        {{ __('Regisztráció') }}
                    </a><br />

                </div>
            </div>
        </li>
        @endauth
        <div class="container">

            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @yield('content')

            <button onclick="topFunction()" id="tetejere"><i class="fa-solid fa-angle-up"></i></button>
        </div>

        @yield('scripts')


        <!--Footer eleje-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 my-2 my-lg-0" id="footer-col">
                        <h4>Információk</h4>
                        <ul>
                            <li><a href="{{ route('kapcsolat') }}">Kapcsolat</a></li>
                            <li><a href="{{ route('adatvedelem') }}">Adatvédelem</a></li>
                            <li><a href="{{ route('aszf') }}">Általános Szerződési Feltételek (ÁSZF)</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 my-2 my-lg-0" id="footer-col">
                        <h4>Segítség</h4>
                        <ul>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="{{ route('szallitas') }}">Szállítás</a></li>
                            <li><a href="#">Garancia</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 my-2 my-lg-0" id="footer-col">
                        <h4>termékek</h4>
                        <ul>
                            <li><a href="{{ route('kesz_termekek') }}">Kész termékek</a></li>
                            <li><a href="{{ route('alapanyagok') }}">Alapanyagok</a></li>
                            <li><a href="{{ route('dekoraciok') }}">Dekorációk</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 my-2 my-lg-0" id="footer-col">
                        <h4>kövess minket</h4>
                        <div class="social-links">
                            <a href="https://www.facebook.com/kreativotletcentrum" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--Footer vége-->
    </div>



</body>

</html>