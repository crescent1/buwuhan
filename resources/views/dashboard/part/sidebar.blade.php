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
                    <li class="{{Route::currentRouteName() == 'user.index' ? 'active': ''}}"><a class="nav-link" href="{{ route('user.index') }}"><i class="fas fa-users"></i><span>Users</span></a></li>
                @endif
                @if (Auth::user()->type == 0 || Auth::user()->type == 1)
                    <li class="{{Route::currentRouteName() == 'sales.index' ? 'active': ''}}"><a class="nav-link" href="{{ route('agenda.index') }}"><i class="fas fa-calendar-alt"></i><span>Acara</span></a></li>
                @endif
            @endif
        </ul>
    </aside>
</div>
