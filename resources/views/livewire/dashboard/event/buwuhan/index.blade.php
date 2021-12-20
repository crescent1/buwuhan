<div>
    <div class="table-responsive mt-2">
        <table class="table table-striped" id="sortable-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Daerah</th>
                    <th>Uang</th>
                    <th>Item</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($guests as $guest)
                <tr>
                    <td>{{ $loop->index + $guests->firstItem() }}</td>
                    <td>{{ strtoupper($guest->gender . ' ' .$guest->name) }}</td>
                    <td>{{ $guest->district }}</td>
                    <td>{{ number_format($guest->money, '0', '.', '.') }}</td>
                    <td>{{ $guest->item }}</td>
                    <td>
                        <button type="button" class="btn btn-outline-info"
                            wire:click="showEditEvent({{$guest->id}})"
                        ><i class="fas fa-user-edit"></i></button>
                        <button type="button" class="btn btn-outline-danger"
                            wire:click="showDeleteEvent({{$guest->id}})"
                        ><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
