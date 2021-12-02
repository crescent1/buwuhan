@extends('dashboard.layout')

@section('content')

<div class="main-wrapper">
    <div class="navbar-bg"></div>

    @include('dashboard.part.header')
    @include('dashboard.part.sidebar')

    <!-- Main Content -->
    <div class="main-content">
        @yield('maincontent')
    </div>

    <footer class="main-footer">
        <div class="footer-left">
            Copyright &copy; <strong>{{ config('app.name') }} 2021</strong>
        </div>
        <div class="footer-right">
            version: 000.1 alpha
        </div>
    </footer>
</div>

@endsection
