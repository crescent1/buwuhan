<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        @if (Auth::check() == false || Auth::user()->type == 1)
            <div class="sidebar-brand">
                <a href="{{ route('dashboard') }}">{{ config('app.name')}}</a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
                <a href="{{ route('dashboard') }}">{{ config('custom.short_name') }}</a>
            </div>
        @endif
        {{-- @if (Auth::user())
            @if (Auth::user()->type == 2)
                <div class="sidebar-brand">
                    <a href="{{ route('finance.index') }}">{{ config('app.name')}}</a>
                </div>
                <div class="sidebar-brand sidebar-brand-sm">
                    <a href="{{ route('finance.index') }}">{{ config('google.name_short') }}</a>
                </div>
            @endif
        @endif --}}

        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            {{-- <li class="{{Route::currentRouteName() == 'dashboard' ? 'active': ''}}">
                <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li> --}}
            {{-- <li class=""><a class="nav-link" href="{{ route('authorize') }}"><i class="fas fa-cogs"></i> <span>Authorize</span></a></li> --}}
            {{-- @if (Auth::check() == false || Auth::user()->type == 1)
                <li class="{{Route::currentRouteName() == 'search' ? 'active': ''}}"><a class="nav-link" href="{{ route('search') }}"><i class="fas fa-search"></i> <span>Search Data</span></a></li>
                <li class="{{Route::currentRouteName() == 'search.create' ? 'active': ''}}"><a class="nav-link" href="{{ route('search.create') }}"><i class="fas fa-file"></i><span>Add Data</span></a></li>
            @endif
            @if (Auth::check() == false)
                <li class="{{Route::currentRouteName() == 'login' ? 'active': ''}}"><a class="nav-link text-info" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i><span><strong>LOGIN</strong></span></a></li>
            @endif

            @if (Auth::user())
                @if (Auth::user()->type == 1)
                    <li class="menu-header">Features</li>
                    <li class="nav-item dropdown {{in_array(Route::currentRouteName(), ['user.index', 'user.create']) ? 'active' : ''}}">
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-user"></i> <span>Users</span></a>
                        <ul class="dropdown-menu">
                            <li class="{{Route::currentRouteName() == 'user.index' ? 'active': ''}}"><a class="nav-link" href="{{ route('user.index') }}">List Users</a></li>
                            <li class="{{Route::currentRouteName() == 'user.create' ? 'active': ''}}"><a class="nav-link" href="{{ route('user.create') }}">Add User</a></li>
                        </ul>
                    </li>
                @endif
                @if (Auth::user()->type == 1 || Auth::user()->type == 2)
                    <li class="{{in_array(Route::currentRouteName(), ['finance.index', 'finance.payment']) ? 'active': ''}}"><a class="nav-link" href="{{ route('finance.index') }}"><i class="far fa-money-bill-alt"></i><span>Finance</span></a></li>
                @endif
                @if (Auth::user()->type == 1 || Auth::user()->type == 3)
                    <li class="{{Route::currentRouteName() == 'sales.index' ? 'active': ''}}"><a class="nav-link" href="{{ route('sales.index') }}"><i class="fas fa-universal-access"></i><span>Sales</span></a></li>
                @endif
                @if (Auth::user()->type == 1 || Auth::user()->type == 4)
                    <li class="{{Route::currentRouteName() == 'administrasi.index' ? 'active': ''}}"><a class="nav-link" href="{{ route('administrasi.index') }}"><i class="fas fa-clipboard-list"></i><span>Administrasi</span></a></li>
                @endif
                @if (Auth::user()->type == 1 || Auth::user()->type == 5)
                    <li class="{{Route::currentRouteName() == 'inventory.index' ? 'active': ''}}"><a class="nav-link" href="{{ route('inventory.index') }}"><i class="fas fa-boxes"></i><span>Inventory</span></a></li>
                @endif
                @if (Auth::user()->type == 1 || Auth::user()->type == 6)
                    <li class="{{Route::currentRouteName() == 'pengiriman.index' ? 'active': ''}}"><a class="nav-link" href="{{ route('pengiriman.index') }}"><i class="fas fa-shipping-fast"></i></i><span>Pengiriman</span></a></li>
                @endif
                @if (Auth::user()->type == 1 || Auth::user()->type == 7)
                    <li class="{{Route::currentRouteName() == 'hr.index' ? 'active': ''}}"><a class="nav-link" href="{{ route('hr.index') }}"><i class="fas fa-users"></i><span>HR</span></a></li>
                @endif
                @if (Auth::user()->type == 1 || Auth::user()->type == 8)
                    <li class="{{Route::currentRouteName() == 'operator.index' ? 'active': ''}}"><a class="nav-link" href="{{ route('operator.index') }}"><i class="fas fa-headset"></i><span>Operator</span></a></li>
                @endif
            @endif --}}
        </ul>
    </aside>
</div>
