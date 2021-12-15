<div>
    <div class="table-responsive mt-2">
        <table class="table table-striped" id="sortable-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Even</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                <tr>
                    <td>{{ $loop->index + $events->firstItem() }}</td>
                    <td>{{ strtoupper($event->name) }}</td>
                    <td>{{ $event->date }}</td>
                    <td>
                        <button type="button" class="btn btn-outline-info"
                            wire:click="showEditUser({{$event->id}})"
                        ><i class="fas fa-user-edit"></i></button>
                        <button type="button" class="btn btn-outline-danger"
                            wire:click="showDeleteUser({{$event->id}})"
                        ><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-right">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end">
                {{ $events->links() }}
            </ul>
        </nav>
    </div>
</div>
