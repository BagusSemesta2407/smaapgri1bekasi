<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/dashboard">SMA 1 PGRI BEKASI</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/dashboard">St</a>
        </div>
        <ul class="sidebar-menu">
            @role('admin')
                <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <span>Dahboard</span>
                    </a>
                </li>

                <li class="{{ request()->is('admin/user*') || request()->is('admin/user/*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.user.index') }}">
                        <i class="fas fa-user"></i>
                        <span>User</span>
                    </a>
                </li>

                <li
                    class="nav-item dropdown 
                {{ request()->is('admin/misi*') ? 'active' : '' }} 
                || {{ request()->is('admin/tujuan*') ? 'active' : '' }}
                || {{ request()->is('admin/strategy*') ? 'active' : '' }}
                || {{ request()->is('admin/visi*') ? 'active' : '' }}">
                    <a class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-newspaper"></i>
                        <span>Profil Sekolah</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="{{ request()->is('admin/visi*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.get-visi') }}">
                                <span>Visi</span>
                            </a>
                        </li>

                        <li class="{{ request()->is('admin/misi*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.misi.index') }}">
                                <span>Misi</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('admin/tujuan*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.tujuan.index') }}">
                                <span>Tujuan</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('admin/strategy*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.strategy.index') }}">
                                <span>Strategi</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li
                    class="nav-item dropdown {{ request()->is('admin/category-article*') || request()->is('admin/article*') ? 'active' : '' }}">
                    <a class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-newspaper"></i>
                        <span>Berita</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="{{ request()->is('admin/category-article*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.category-article.index') }}">
                                <span>Kategori Berita</span>
                            </a>
                        </li>

                        <li class="{{ request()->is('admin/article*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.article.index') }}">
                                <span>Berita</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li
                    class="nav-item dropdown {{ request()->is('admin/category-extracurricular*') || request()->is('admin/extracurricular*') ? 'active' : '' }}">
                    <a class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-newspaper"></i>
                        <span>Ekstrakulikuler</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="{{ request()->is('admin/category-extracurricular*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.category-extracurricular.index') }}">
                                <span>Ekstrakulikuler</span>
                            </a>
                        </li>

                        <li class="{{ request()->is('admin/extracurricular*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.extracurricular.index') }}">
                                <span>Kegiatan Ekstrakulikuler</span>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- <li class="{{ request()->is('admin/agenda*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.agenda.index') }}">
                    <i class="fas fa-calendar"></i>
                    <span>Agenda</span>
                </a>
            </li> --}}

                <li class="{{ request()->is('admin/scientificpaper*') ? 'active' : '' }}">
                    <a href="{{ route('admin.scientificpaper.index') }}">
                        <i class="fas fa-bullhorn"></i>
                        <span>Karya Ilmiah</span>
                    </a>
                </li>

                <li class="{{ request()->is('admin/announcement*') ? 'active' : '' }}">
                    <a href="{{ route('admin.announcement.index') }}">
                        <i class="fas fa-bullhorn"></i>
                        <span>Pengumuman</span>
                    </a>
                </li>

                <li class="{{ request()->is('admin/gallery*') ? 'active' : '' }}">
                    <a href="{{ route('admin.gallery.index') }}">
                        <i class="fas fa-image"></i>
                        <span>Galeri</span>
                    </a>
                </li>

                <li class="{{ request()->is('admin/banner*') ? 'active' : '' }}">
                    <a href="{{ route('admin.banner.index') }}">
                        <i class="fas fa-scroll"></i>
                        <span>Banner</span>
                    </a>
                </li>

                <li class="{{ request()->is('admin/setting*') ? 'active' : '' }}">
                    <a href="{{ route('admin.get-setting') }}">
                        <i class="fas fa-scroll"></i>
                        <span>Setting</span>
                    </a>
                </li>
            @endrole

            @role('guru')
                <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <span>Dahboard</span>
                    </a>
                </li>
                <li class="{{ request()->is('guru/scientificpaper*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('guru.scientificpaper.index') }}">
                        <i class="fas fa-scroll"></i>
                        <span>Karya Ilmiah</span>
                    </a>
                </li>
            @endrole

            @role('pembina')
                <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <span>Dahboard</span>
                    </a>
                </li>
                <li class="{{ request()->is('pembina/extracurricular*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('pembina.extracurricular.index') }}">
                        <i class="fas fa-scroll"></i>
                        <span>Ekstrakulikuler</span>
                    </a>
                </li>
            @endrole
        </ul>
    </aside>
</div>
