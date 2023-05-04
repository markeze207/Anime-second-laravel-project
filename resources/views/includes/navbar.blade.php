<header class="header" data-header>
    <div class="container">

        <div class="overlay" data-overlay></div>

        <a href="{{ route('anime.index') }}" class="logo">
            <img src="{{ asset('assets/images/logo.svg') }}" alt="Filmlane logo">
        </a>

        <div class="header-actions">

            <form class="form-inline d-flex justify-content-center md-form form-sm mt-0">
                <i class="fas fa-search" aria-hidden="true"></i>
                <input style="background: none; color: white; box-shadow: none; outline: none; border:none; border-bottom: 1px solid var(--citrine); margin-top: 6px;" value="{{ isset($_GET['title']) ?? '' }}" name="title" type="text" placeholder="Search"
                       aria-label="Search">
            </form>

            @if(auth()->check())
                <a href="{{ route('home') }}"><button class="btn btn-primary">Profile</button></a>
            @else
                <a href="{{ route('login') }}"><button class="btn btn-primary">Sign in</button></a>
            @endif

        </div>

        <button class="menu-open-btn" data-menu-open-btn>
            <ion-icon name="reorder-two"></ion-icon>
        </button>

        <nav class="navbar" data-navbar>

            <div class="navbar-top">

                <a href="{{ route('home') }}" class="logo">
                    <img src="{{ asset('assets/images/logo.svg') }}" alt="Filmlane logo">
                </a>

                <button class="menu-close-btn" data-menu-close-btn>
                    <ion-icon name="close-outline"></ion-icon>
                </button>

            </div>

            <ul class="navbar-social-list">

                <li>
                    <a href="#" class="navbar-social-link">
                        <ion-icon name="logo-twitter"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="navbar-social-link">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="navbar-social-link">
                        <ion-icon name="logo-pinterest"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="navbar-social-link">
                        <ion-icon name="logo-instagram"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="navbar-social-link">
                        <ion-icon name="logo-youtube"></ion-icon>
                    </a>
                </li>

            </ul>

        </nav>

    </div>
</header>
