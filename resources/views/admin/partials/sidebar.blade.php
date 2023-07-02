<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">Berbagi Makan</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="https://ui-avatars.com/api/?name={{ substr(auth()->user()->name, 0, 1) }}&color=FFFFFF&background=111827"
                    class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{ route('dashboard.index') }}"
                        class="nav-link {{ Route::currentRouteName() === 'dashboard.index' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="{{ route('dashboard.donation') }}"
                        class="nav-link {{ Route::currentRouteName() === 'dashboard.donation' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-box-open"></i>
                        <p>
                            Manajemen Donasi
                        </p>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a href="{{ route('dashboard.transaction') }}"
                        class="nav-link {{ Route::currentRouteName() === 'dashboard.transaction' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-print"></i>
                        <p>
                            Manajemen Transaksi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dashboard.user.index') }}"
                        class="nav-link {{ Route::currentRouteName() === 'dashboard.user.index' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Manajemen User
                        </p>
                        @if ($newUserNotif > 0)
                            <span
                                class="position-absolute top-0 start-100 translate-middle ml-3 px-2 bg-danger border border-light rounded-circle">
                                <span class="visually-hidden">{{ $newUserNotif }}</span>
                            </span>
                        @endif
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dashboard.setting') }}"
                        class="nav-link {{ Route::currentRouteName() === 'dashboard.setting' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Pengaturan Akun
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
