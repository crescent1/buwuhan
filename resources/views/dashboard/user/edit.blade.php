@extends('dashboard.part.main')

@section('maincontent')

<section class="section sz-section mb-n4">
    <div class="section-header">
        <h1>Users</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('user.index') }}">Users</a></div>
            <div class="breadcrumb-item">Edit User</div>
        </div>
    </div>

    <div class="section-body">
        <div class="col-12 col-sm-12 col-lg-8 p-0">
            <div class="card card-success">
                <div class="card-header">
                    <div class="col-6 col-sm-8 col-md-9 pl-0">
                        <h4 class="text-success"><i class="fas fa-user-edit"></i> Edit User</h4>
                    </div>
                </div>
                <div class="card-body p-1">
                    <form action="{{ route('user.update', $user->id) }}" method="POST" autocomplete="off" class="needs-validation" novalidate="">
                        @csrf
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success text-center">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <input hidden type="text" name="id" value="{{$user->id}}}">

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">User Name</label>
                                <div class="col-sm-9">
                                    <input
                                        type="text"
                                        class="form-control @error('name') is-invalid @enderror"
                                        required
                                        minlength="3"
                                        maxlength="100"
                                        name="name"
                                        value="{{old('name', $user->name)}}"
                                        placeholder="ex: my name"
                                    >
                                    @error('name')
                                        <small id="" class="sz-error">
                                            {{ $message }}
                                        </small>
                                    @enderror

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">User Email</label>
                                <div class="col-sm-9">
                                    <input
                                        type="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        required
                                        autocomplete="off"
                                        name="email"
                                        value="{{old('email', $user->email)}}"
                                        placeholder="ex: myname@gmail.com"
                                    >
                                    @error('email')
                                        <small id="" class="sz-error">
                                            {{ $message }}
                                        </small>
                                    @enderror

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">User Status</label>
                                <div class="col-sm-9">
                                    <select
                                        class="form-control @error('type') is-invalid @enderror"
                                        required
                                        name="type"
                                    >
                                        <option value="">. . .</option>
                                        <option {{ old('type', $user->type) == "0"? 'selected':''}} value="{{ \App\Enums\UserType::Administrator }}">Administrator</option>
                                        @if ($user->id !== 1)
                                        <option {{ old('type', $user->type) == "1"? 'selected':''}} value="{{ \App\Enums\UserType::User }}">User</option>
                                        @endif
                                    </select>
                                    @error('type')
                                        <small id="" class="sz-error">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="border-top border-success mb-2">
                                <small class="text-success"><i class="far fa-lightbulb"></i> Kosongkan password bila tidak ingin mengubahnya!</small>
                            </div>
                            <div class="form-group row mb-0">
                                <label class="col-sm-3 col-form-label">User Password</label>
                                <div class="col-sm-9">
                                    <input
                                        type="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        autocomplete="new-password"
                                        name="password"
                                        value="{{old('password')}}"
                                    >
                                    @error('password')
                                        <small id="" class="sz-error">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="card-footer border-top mb-0">
                            <div class="form-row mb-0">
                                <div class="form-group col-6 col-sm-6 col-md-6 mb-0">
                                    <a class="btn btn-primary" href="{{ route('dashboard') }}"><i class="fas fa-angle-left"></i> Back</a>
                                </div>
                                <div class="form-group col-6 col-sm-6 col-md-6 text-right mb-0">
                                    <button class="btn btn-success"><i class="fas fa-save"></i> Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
