<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">Inventaris_18361 <i class="fa-solid fa-shop" style="color: #718098;"></i></a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}"><i class="fa-solid fa-shop" style="color: #718098;"></i></a>
        </div>
        <ul class="sidebar-menu">
            <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-table-columns"></i> <span>Beranda</span>
                </a>
            </li>


            @php
                $userLevel = Auth::user()->level->nama_level ?? null; // Get user level and handle null
            @endphp

            @if (Auth::check() && in_array($userLevel, ['administrator', 'kepala_gudang']))
                <li class="{{ request()->is('validate*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('validate.validate.index') }}">
                        <i class="fas fa-book"></i> <span>Validasi</span>
                    </a>
                </li>
            @endif

            @if (Auth::check() && in_array($userLevel, ['administrator', 'operator']))
                <li class="{{ request()->is('peminjaman*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('peminjaman.index') }}">
                        <i class="fas fa-book"></i> <span>Peminjaman</span>
                    </a>
                </li>
            @endif

            @if (Auth::check() && $userLevel == 'administrator')
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Master
                            data</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ request()->is('users*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('user.index') }}">
                                <span>Users</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('jenis*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('jenis.index') }}">
                                <span>Jenis</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('ruang*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('ruang.index') }}">
                                <span>Ruang</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('inventaris*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('inventaris.index') }}">
                                <span>Inventaris</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('pegawai*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('pegawai.index') }}">
                                <span>Pegawai</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </aside>
</div>
