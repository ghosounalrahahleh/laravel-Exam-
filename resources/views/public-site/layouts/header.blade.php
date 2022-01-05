<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <title>Quiz online- @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="../Homepage/particles.js-master/demo/css/style.css"> -->
    {{-- Questions CSS --}}
    <link rel="stylesheet" href="{{ asset('css/styleQuiz.css') }}">
    {{-- Categories CSS --}}
    <link rel="stylesheet" type="text/css" href="{{ asset("css/choice.css") }}" />
    {{-- login --}}
    <link rel="stylesheet" href="{{ asset('css/sing-login-style.css') }}">

</head>

<body>
    <nav class="navbar ">
        <div class="container-fluid margin_Container justify-content-around">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('img/logo.png') }}" alt="" width="90" height="70">
            </a>
            <a>
                <ul id="menu" class=" mb-0">
                    <li class="nav-item ">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('categories.index') }}">Categories</a>

                    </li>
                    @guest
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
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                            <a class="dropdown-item" href="{{ route('users.index') }}">
                                Profile</a>
                        </div>
                    </li>
                    @endguest
                </ul>
            </a>
            {{-- Search part --}}
            <form action="{{ route('search') }}" method="get" class="searchform order-lg-last bg-light rounded-pill  ">
                <div class="input-group">
                    <div class="form-group d-flex">
                        <input type="text"
                            class="form-control pl-3 bg-transparent rounded-pill border-0  text-black ser"
                            placeholder="Search" name="search" required>
                        <button type="submit" placeholder=""
                            class="form-control search w-25 bg-transparent rounded-pill border-0 ser">
                            <i class="fas fa-search"></i></button>
                    </div>
            </form>
            {{-- End Searh part --}}
        </div>
    </nav>
