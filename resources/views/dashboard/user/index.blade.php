@extends('dashboard.part.main')

@section('maincontent')

<section class="section sz-section mb-n4">
    <div class="section-header mb-3">
        <h1>Users</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('user.index') }}">Users</a></div>
            <div class="breadcrumb-item">List Users</div>
        </div>
    </div>

    <div class="section-body">
        @livewire('dashboard.user.create')
        @livewire('dashboard.user.index')
    </div>
</section>

@endsection

@section('styles')

    @livewireStyles

    <link rel="stylesheet" href="{{ url('/') }}/assets/css/custom.css">

@endsection

@section('scripts')

    @livewireScripts

@endsection

