<!--begin::Header-->
<nav class="app-header navbar navbar-expand bg-body">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Start Navbar Links-->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                    <i class="bi bi-list"></i>
                </a>
            </li>
            <li class="nav-item d-none d-md-block"><a href="#" class="nav-link">Home</a></li>
        </ul>
        <!--end::Start Navbar Links-->
        <!--begin::End Navbar Links-->
        <ul class="navbar-nav ms-auto">

            <!--begin::Language Menu Dropdown-->
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link">
                    <img src="{{ asset('dashboard-assets/assets/img/indonesia.png') }}"
                        class="user-image rounded-circle shadow" alt="User Image" />
                </a>
            </li>
            <!--end::User Menu Dropdown-->
            <!--begin::User Menu Dropdown-->
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <img src={{ Auth::user()->profile_pic ? asset('storage/' . Auth::user()->profile_pic): asset('assets/img/default-profile.webp') }}
                        class="user-image rounded-circle shadow" alt="User Image" style="object-fit: cover;"/>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <!--begin::Menu Footer-->
                    <li class="user-footer">
                        <a href="{{ route('pengguna.profile') }}" class="btn btn-default btn-flat">Profile</a>
                        <a href="{{ route('logout') }}" class="btn btn-danger btn-flat float-end"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Sign out
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    <!--end::Menu Footer-->
                </ul>
            </li>
            <!--end::User Menu Dropdown-->
        </ul>
        <!--end::End Navbar Links-->
    </div>
    <!--end::Container-->
</nav>
<!--end::Header-->

<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="./index.html" class="brand-link">
            <!--begin::Brand Image-->
            <img src="{{ asset('landingpage/images/logo.png') }}" alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow" style="width:100%"/>
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            {{-- <span class="brand-text fw-light">Sapu Jagat</span> --}}
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-header" style="padding:0;">
                    <a href="{{ route('pengguna.profile') }}" class="nav-link" >
                        <img src={{ Auth::user()->profile_pic ? asset('storage/' . Auth::user()->profile_pic): asset('assets/img/default-profile.webp') }}
                            {{-- class="user-image rounded-circle shadow profile-img" alt="User Image" style="width: 30px; height: 30px;"/> --}}
                            class="user-image rounded-circle shadow" alt="User Image" style="width: 30px; height: 30px;"/>
                        <span class="ps-3 d-md-inline">{{ Auth::user()->name }}</span>
                    </a>
                </li>
                <hr />
                <li class="nav-item">
                    <a href="{{ route('pengguna.dashboard') }}"
                        class="nav-link {{ Route::is('pengguna.dashboard') ? 'navigationbuttonactive' : 'navigationbutton' }}">
                        <i class="nav-icon bi bi-house"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pengguna.tukar-sampah.index') }}"
                        class="nav-link {{ Route::is('pengguna.tukar-sampah.*') ? 'navigationbuttonactive' : 'navigationbutton' }}">
                        <i class="nav-icon bi bi-trash"></i>
                        <p>Tukar Sampah</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pengguna.histori.index') }}"
                        class="nav-link {{ Route::is('pengguna.histori.*') ? 'navigationbuttonactive' : 'navigationbutton' }}">
                        <i class="nav-icon bi bi-clock-history"></i>
                        <p>Histori</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pengguna.pelacakan.index') }}"
                        class="nav-link {{ Route::is('pengguna.pelacakan.*') ? 'navigationbuttonactive' : 'navigationbutton' }}">
                        <i class="nav-icon bi bi-check2-circle"></i>
                        <p>Pelacakan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pengguna.laporan.index') }}"
                        class="nav-link {{ Route::is('pengguna.pelaporan.*') ? 'navigationbuttonactive' : 'navigationbutton' }}">
                        <i class="nav-icon bi bi-exclamation-diamond"></i>
                        <p>Laporan</p>
                    </a>
                </li>
            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar-->
