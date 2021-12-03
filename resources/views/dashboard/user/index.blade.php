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
                    <div class="table-responsive">
                        <table class="table table-striped" id="sortable-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th colspan="2" ></th>
                                </tr>
                            </thead>
                            {{-- <tbody>
                                @foreach ($listUser as $user)
                                <tr>
                                    <td>{{ $loop->index + $listUser->firstItem() }}</td>
                                    <td>{{ strtoupper($user->name) }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ ucwords(\App\Enums\UserType::fromValue($user->type)->description) }}</td>
                                    <td>
                                        @if ($user->type == $authUser->id || $authUser->type == 1)
                                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-outline-info"><i class="fas fa-user-edit"></i></a>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($user->id !== 1 && $authUser->type == 1 && $user->id !== $authUser->id)
                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" href="" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody> --}}
                        </table>
                    </div>
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

