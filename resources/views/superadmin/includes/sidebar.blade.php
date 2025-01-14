<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item -  -->
    <li class="nav-item {{ request()->is('/home') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('superadmin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>

            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item {{ request()->is('domains/*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('superadmin.domains.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>

            <span>Domains</span></a>
    </li>
    <li class="nav-item {{ request()->is('admins/*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('superadmin.admins.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>

            <span>Admins</span></a>
    </li>



</ul>
<!-- End of Sidebar -->
