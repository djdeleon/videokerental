<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm fixed-top">
        <h5 class="my-0 mr-md-auto font-weight-normal">
            <a class="navbar-brand text-dark" href="/">
                Videoke Rental Website
            </a>
        </h5>
        
        @if (Route::has('login'))
            <div>
            @auth
                <a href="/" class="pr-3">Home</a>
                @if (Auth::user()->usertype == 'User')
                    <a href="/user/{{ auth()->user()->id }}/account/home" class="pr-3">Account</a>
                @else
                    <a href="/admin" class="pr-3">Dashboard</a>
                @endif
                <a class="p-2 text-dark" href="/about">About</a>
                <a class="p-2 text-dark" href="/contact">Contact</a>
                <a class="p-2 text-dark" href="/service">Service</a>
                <a class="p-2 text-dark" href="/pricing">Pricing</a>
                <a class="p-2 text-dark" href="/team">Team</a>
            @else
                
            <nav class="my-2 my-md-0 mr-md-3 center">
                <a class="p-2 text-dark" href="/">Home</a>
                <a class="p-2 text-dark" href="/about">About</a>
                <a class="p-2 text-dark" href="/contact">Contact</a>
                <a class="p-2 text-dark" href="/service">Service</a>
                <a class="p-2 text-dark" href="/pricing">Pricing</a>
                <a class="p-2 text-dark" href="/team">Team</a>
                <a class="btn btn-outline-primary col-btn" href="{{ route('login') }}">Login</a>
            </nav>
    
                {{-- <a class="btn btn-outline-primary ml-2" href="/register">Register</a> --}}
            @endauth
            </div>
            @endif
</div>

<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/">
                Videoke Rental Website
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->first_name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </div>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>