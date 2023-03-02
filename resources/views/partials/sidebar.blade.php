<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="javascript:void(0);" class="brand-link">
        <img src="{{ asset('back/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('back/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link @yield('menu_users')">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Pengguna</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('bank-account') }}" class="nav-link @yield('menu_bank_accounts')">
                        <i class="nav-icon fas fa-money-check-alt"></i>
                        <p>Akun Bank</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('swap') }}" class="nav-link @yield('menu_swap')">
                        <i class="nav-icon fas fa-recycle"></i>
                        <p>Swap Variable</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('counted') }}" class="nav-link @yield('menu_counted')">
                        <i class="nav-icon fas fa-sort-numeric-down-alt"></i>
                        <p>Angka Terbilang</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>