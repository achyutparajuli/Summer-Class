<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">MySite</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link @if(request()->is('/')) active @endif" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->is('about-us')) active @endif" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->is('service')) active @endif" href="{{ route('service') }}">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->is('contact')) active @endif" href="{{ route('contact') }}">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>