<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">

            <li class="{{ request()->is('admin.dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <span>Dahboard</span>
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link has-dropdown" data-toggle="dropdown" href="">
                  <i class="fas fa-newspaper"></i>
                    <span>Article</span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{ route('admin.category-article.index') }}">
                            <span>Kategori Artikel</span>
                        </a>
                    </li>

                    <li>
                        <a class="nav-link" href="{{ route('admin.article.index') }}">
                            <span>Artikel</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="">
                    <i class="fas fa-calendar"></i>
                    <span>Agenda</span>
                </a>
            </li>

            <li>
                <a href="">
                    <i class="fas fa-bullhorn"></i>
                    <span>Pengumuman</span>
                </a>
            </li>



            <li>
                <a href="">
                    <i class="fas fa-image"></i>
                    <span>Galeri</span>
                </a>
            </li>

            <li>
                <a href="">
                    <i class="fas fa-scroll"></i>
                    <span>Banner</span>
                </a>
            </li>

        </ul>
    </aside>
</div>
