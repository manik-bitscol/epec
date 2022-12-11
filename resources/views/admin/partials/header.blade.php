<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>


        <!-- Profile -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <img src="{{ asset('assets/backend/dist/img/user1-128x128.jpg') }}" alt=""
                    style="width: 30px; border-radius: 50%;">
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <a href="{{ route('admin.profile.show') }}" class="dropdown-item">
                    <i class="fas fa-eye mr-2"></i> View Profile
                </a>
                <a href="{{ route('admin.profile.edit') }}" class="dropdown-item">
                    <i class="fas fa-edit mr-2"></i> Edit Profile
                </a>
                <a href="{{ route('admin.change.password') }}" class="dropdown-item">
                    <i class="fas fa-lock mr-2"></i> Change Password
                </a>
                <a href="{{ route('admin.create') }}" class="dropdown-item">
                    <i class="fas fa-plus mr-2"></i> Add New Admin
                </a>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                    class="dropdown-item"><i class="fas fa-power-off"></i> Log Out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

            </div>
        </li>

    </ul>
</nav>
<!-- /.navbar -->
