<div>
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-2 p-0">
        <button type="button" class="btn btn-success"
            wire:click.prevent="showAddUser"
        ><i class="fas fa-plus-circle"></i> Add User</button>
    </div>

    @if (session()->has('newUser'))
        <div class="alert alert-success alert-dismissible show fade col-lg-5 col md-5">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                <i class="far fa-lightbulb"></i> {{ session('newUser') }}
            </div>
        </div>
    @endif

    {{-- modal create --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="modalCreate" wire:ignore.self>
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form wire:submit.prevent="addUser" autocomplete="off" class="needs-validation" novalidate="">
                    <div class="modal-header">
                        <h5 class="modal-title">Add User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
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
                                            value="{{old('name')}}"
                                            placeholder="ex: my name"
                                            wire:model="state.name"
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
                                            value="{{old('email')}}"
                                            placeholder="ex: myname@gmail.com"
                                            wire:model="state.email"
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
                                            wire:model="state.type"
                                        >
                                            <option value="">. . .</option>
                                            <option {{ old('type') == "0"? 'selected':''}} value="{{ \App\Enums\UserType::Administrator }}">Administrator</option>
                                            <option {{ old('type') == "1"? 'selected':''}} value="{{ \App\Enums\UserType::User }}">User</option>
                                        </select>
                                        @error('type')
                                            <small id="" class="sz-error">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">User Password</label>
                                    <div class="col-sm-9">
                                        <input
                                            type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            required
                                            autocomplete="new-password"
                                            name="password"
                                            value="{{old('password')}}"
                                            wire:model="state.password"
                                        >
                                        @error('password')
                                            <small id="" class="sz-error">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success"><i class="fas fa-plus-circle"></i> Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
