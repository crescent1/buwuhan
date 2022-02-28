@extends('dashboard.part.main')

@section('maincontent')

<section class="section sz-section">
    <div class="section-header">
        <h1>Events</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('event.index') }}">Event</a></div>
            <div class="breadcrumb-item">Buwuhan</div>
        </div>
    </div>

    <div class="section-body">
        @livewire('dashboard.event.buwuhan.create', ['eventId' => $eventId])
        @livewire('dashboard.event.buwuhan.index', ['eventId' => $eventId])
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

