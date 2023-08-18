<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="{{ '/' }}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h2 class="m-0 text-primary">
            <img src="{{ asset('logo.png') }}" alt="" width="250px" height="75px">
        </h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{ '/' }}" class="nav-item nav-link 
                {{ request()->is('/') ? 'active' : '' }}">
                Beranda
            </a>
            <a href="{{ route('about') }}" class="nav-item nav-link 
                {{ request()->is('about') ? 'active' : '' }}">
                Tentang
            </a>
            <a href="{{ route('article')}}" class="nav-item nav-link 
                {{ request()->is('article') ? 'active' : '' }}">
                Artikel
            </a>
            <a href="{{ route('landing-page-contact') }}" class="nav-item nav-link
                {{ request()->is('contact') ? 'active' : '' }}">
                Kontak
            </a>
        </div>
    </div>
</nav>