<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion vh-100" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3 fs-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link fs-5" href="{{ route('admin') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Contact -->
    <li class="nav-item">
        <a class="nav-link fs-5" href="{{ route('admin.contact.index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Contact</span>
        </a>
    </li>

    <!-- Nav Item - About -->
    <li class="nav-item">
        <a class="nav-link fs-5" href="{{ route('admin_about') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>About</span>
        </a>
    </li>

    <!-- Nav Item - Certificates -->
    <li class="nav-item">
        <a class="nav-link fs-5" href="{{ route('admin.certificates.index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Certificate</span>
        </a>
    </li>

    <!-- Nav Item - Skill -->
    <li class="nav-item">
        <a class="nav-link fs-5" href="{{ route('admin.skill.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Skill</span>
        </a>
    </li>

    <!-- Nav Item - Home -->
    <li class="nav-item">
        <a class="nav-link fs-5" href="{{ route('admin.home.index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Home</span>
        </a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link fs-5" href="{{ route('admin.projects.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Project</span>
        </a>
    </li>

    <li class="nav-item">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="dropdown-item">
                <i class="fas fa-sign-out-alt"></i>
                <span>Log Out</span>
            </button>
        </form>
    </li>
</ul>
