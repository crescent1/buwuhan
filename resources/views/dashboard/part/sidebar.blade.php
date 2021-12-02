<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a
                @if (Auth::user()->type == 0)
                    href="{{ route('dashboard') }}"
                @endif
            >{{ config('app.name')}}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a
                @if (Auth::user()->type == 0)
                    href="{{ route('dashboard') }}"
                @endif
            >{{ config('custom.short_name') }}</a>
        </div>

        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{Route::currentRouteName() == 'dashboard' ? 'active': ''}}">
                <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>

            @if (Auth::user())
                @if (Auth::user()->type == 0)
                    <li class="menu-header">Features</li>
                    {{-- <li class="nav-item dropdown {{in_array(Route::currentRouteName(), ['user.index', 'user.create']) ? 'active' : ''}}">
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-user"></i> <span>Users</span></a>
                        <ul class="dropdown-menu">
                            <li class="{{Route::currentRouteName() == 'user.index' ? 'active': ''}}"><a class="nav-link" href="{{ route('user.index') }}">List Users</a></li>
                            <li class="{{Route::currentRouteName() == 'user.create' ? 'active': ''}}"><a class="nav-link" href="{{ route('user.create') }}">Add User</a></li>
                        </ul>
                    </li> --}}
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
            @endif
        </ul>
    </aside>
</div>
