@extends('dashboard.part.main')

@section('maincontent')

<section class="section sz-section mb-n4">
    <div class="section-header mb-3">
        <h1>Events</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('event.index') }}">Events</a></div>
            <div class="breadcrumb-item">List Events</div>
        </div>
    </div>

    <div class="section-body">
        @livewire('dashboard.event.create')
        @livewire('dashboard.event.index')
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

