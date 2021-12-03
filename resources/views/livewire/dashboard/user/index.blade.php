<div>
    <div class="table-responsive">
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
                        <button type="button" href="" class="btn btn-outline-info"><i class="fas fa-user-edit"></i></button>
                        <button type="button" href="" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
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
    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <button type="button" class="btn btn-success"
            wire:click.privent="showAddUser"
        ><i class="fas fa-plus-circle"></i> Add User</button>
    </div>

    {{-- modal --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="userModal" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

</div>

@section('specificts')

    <script>
        window.addEventListener('showModalUser', event => {
            console.log('show modal');
            $('#userModal').modal('show');
        })

        // window.addEventListener('pending-form-hide', event => {
        //     console.log('test pending');
        //     $('#pendingModalShow').modal('hide');
        // })



        // window.addEventListener('approved-form-show', event => {
        //     // console.log('test approved');
        //     $('#approvedModalShow').modal('show');
        // })

    </script>

@endsection
