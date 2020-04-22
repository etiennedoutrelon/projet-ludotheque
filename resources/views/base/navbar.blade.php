<nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="font-size: larger;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="{{url('/')}}">
        <img class="img-nav" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9b/Logo_IUT_Lens.svg/512px-Logo_IUT_Lens.svg.png">
        Ludothèque
    </a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-item nav-link" href="{{route('contact')}}">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-item nav-link" href="{{route('apropos')}}">A propos</a>
            </li>
        </ul>

        <!-- partie droite -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Inscription') }}</a>
                    </li>
                @endif
            @else
                @if(Auth::user()->isAdmin())
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('administration')}}">
                            Administration
                        </a>
                    </li>
                @endif
                <li class="nav-item dropdown">
                    <a class="nav-item nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                        {{ __('Déconnexion') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    </a>
                </li>
            @endguest
        </ul>
    </div>
</nav>
