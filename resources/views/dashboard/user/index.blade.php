@extends('dashboard.part.main')

@section('maincontent')

<section class="section">
    <div class="section-header">
        <h1>Users</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('user.index') }}">Users</a></div>
            <div class="breadcrumb-item">List Users</div>
        </div>
    </div>

    <div class="section-body">
        <div class="col-12 col-sm-12 col-lg-12">
            <h2 class="section-title">Users</h2>
            <div class="card">
                {{-- <div class="card-header">

                </div> --}}
                <div class="card-body">
                    @livewire('dashboard.user.index')
                </div>
                <div class="card-footer text-right">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end">

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@section('styles')

    @livewireStyles

    {{-- <link rel="stylesheet" href="{{ url('/') }}/assets/css/custom.css"> --}}

@endsection

@section('scripts')

    @livewireScripts

@endsection

