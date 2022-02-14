<div>
    @if (session()->has('updateUser'))
        <div class="alert alert-success alert-dismissible show fade col-lg-5 col md-5">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                <i class="far fa-lightbulb"></i> {{ session('updateUser') }}
            </div>
        </div>
    @endif
    @if (session()->has('deleteUser'))
        <div class="alert alert-danger alert-dismissible show fade col-lg-5 col md-5">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                <i class="far fa-lightbulb"></i> {{ session('deleteUser') }}
            </div>
        </div>
    @endif

    <div class="table-responsive mt-2">
        <table class="table table-striped" id="sortable-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->index + $users->firstItem() }}</td>
                    <td>{{ strtoupper($user->name) }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ ucwords(\App\Enums\UserType::fromValue($user->type)->description) }}</td>
                    <td>
                        <button type="button" class="btn btn-outline-info"
                            wire:click="showEditUser({{$user->id}})"
                        ><i class="fas fa-user-edit"></i></button>
                        @if ($user->id !== 1 && Auth::user()->type == 0 && $user->id !== Auth::user()->id)
                            <button type="button" class="btn btn-outline-danger"
                                wire:click="showDeleteUser({{$user->id}})"
                            ><i class="fas fa-trash-alt"></i></button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-right">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end">
                {{ $users->links() }}
            </ul>
        </nav>
    </div>

    {{-- Modal Delete --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="modalDelete" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger alert-has-icon">
                        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                        <div class="alert-body">
                        <div class="alert-title">Peringatan</div>
                            Apakah anda yakin ingin menghapus data ini?
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger"
                        wire:click.prevent="deleteUser"
                    ><i class="fas fa-trash-alt"></i> Delete</button>
                </div>
            </div>
        </div>
    </div>


    {{-- modal edit --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="modalEdit" wire:ignore.self>
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form wire:submit.prevent="addUser" autocomplete="off" class="needs-validation" novalidate="">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete User</h5>
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
                                            @if ($userId !== 1)
                                            <option {{ old('type') == "1"? 'selected':''}} value="{{ \App\Enums\UserType::User }}">User</option>
                                            @endif
                                        </select>
                                        @error('type')
                                            <small id="" class="sz-error">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="border-top border-info mb-2">
                                    <small class="text-info"><i class="far fa-lightbulb"></i> Kosongkan password bila tidak ingin mengubahnya!</small>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">User Password</label>
                                    <div class="col-sm-9">
                                        <input
                                            type="password"
                                            class="form-control @error('password') is-invalid @enderror"
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
                        <button type="button" class="btn btn-info"
                            wire:click.prevent="updateUser"
                        ><i class="fas fa-trash-alt"></i> Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

@section('specificts')

    <script>
        window.addEventListener('showModalUser', event => {
            console.log('test');
            $('#modalCreate').modal('show');
        })

        window.addEventListener('hideModalUser', event => {
            $('#modalCreate').modal('hide');
        })

        window.addEventListener('showEditModal', event => {
            $('#modalEdit').modal('show');
        })

        window.addEventListener('hideEditModal', event => {
            $('#modalEdit').modal('hide');
        })

        window.addEventListener('showRemoveModal', event => {
            $('#modalDelete').modal('show');
        })

        window.addEventListener('hideRemoveModal', event => {
            $('#modalDelete').modal('hide');
        })

    </script>

@endsection
