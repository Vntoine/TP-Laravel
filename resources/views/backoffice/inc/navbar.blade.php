<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container px-5">
        <a class="navbar-brand" href="#!">BIENVENUE</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('accueil') }}">Accueil</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Films
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                        <a class="dropdown-item" href="{{ route('film.article') }}">Articles</a>
                        <a class="dropdown-item" href="{{ route('film.list') }}">Liste</a>
                        <a class="dropdown-item" href="{{ route('film.fluxrss') }}">Flux RSS</a>
                        <a class="dropdown-item" href="#">Quizz</a>
                    </div>
                @guest
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                @else
                    @hasanyrole('journaliste|redacteur|admin') 
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Gestions articles
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                @hasanyrole('journaliste|admin')
                                    <a class="dropdown-item" href="#">Création</a>
                                    <a class="dropdown-item" href="#">Modification</a>
                                    <a class="dropdown-item" href="#">Suppression</a>
                                @endhasanyrole
                                @hasanyrole('redacteur|admin')
                                    <a class="dropdown-item" href="#">Publication</a>
                                @endhasanyrole
                            </div>
                        </li>';
                        @hasanyrole('journaliste|admin')    
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown3" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Gestions Films
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown3">
                                <a class="dropdown-item" href="#">Création</a>
                                <a class="dropdown-item" href="#">Modification</a>
                                <a class="dropdown-item" href="#">Suppression</a>
                            </div>
                        </li>';
                        @endhasanyrole  
                    @endhasanyrole 
                    @hasanyrole('drh|admin') 
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown4" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Gestions users
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown4">
                                <a class="dropdown-item" href="#">Création</a>
                                <a class="dropdown-item" href="#">Modification</a>
                                <a class="dropdown-item" href="#">Actif</a>
                                @role('admin')
                                    <a class="dropdown-item" href="#">Suppression</a>
                                @endrole
                            </div>
                        </li>'; 
                    @endhasanyrole 
                        <li class="nav-item"><a class="nav-link" href="#">Profil</a></li>               
                        <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Deconnexion</a></li>
                        <form class="visually-hidden" id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                @endguest
            </ul>
        </div>
    </div>
</nav>
