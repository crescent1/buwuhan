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
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-right">
        <a class="btn btn-success" href="" ><i class="fas fa-plus-circle"></i> Add User</a>
    </div>
</div>
