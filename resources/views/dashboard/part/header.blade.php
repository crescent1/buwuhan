<nav class="navbar navbar-expand-lg main-navbar">

    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
    </form>

    <ul class="navbar-nav navbar-right">
        @if (Auth::check())
            <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                {{-- <img alt="image" src="{{ url('/') }}/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1"> --}}
                <div class="d-sm-none d-lg-inline-block">Welcome {{Auth::user()->name}}</div></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-title">Setting</div>
                    <a href="{{ route('user.edit', Auth::user()->id) }}" class="dropdown-item has-icon">
                        <i class="far fa-user"></i> Edit Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </div>
            </li>
        @else
            <div class="text-white">Welcome to {{ config('app.name') }}</div></a>
        @endif
    </ul>
</nav>
