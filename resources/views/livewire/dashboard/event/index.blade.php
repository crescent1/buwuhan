<div>
    @if (session()->has('deleteEvent'))
        <div class="alert alert-danger alert-dismissible show fade col-lg-5 col md-5">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                <i class="far fa-lightbulb"></i> {{ session('deleteEvent') }}
            </div>
        </div>
    @endif
    @if (session()->has('updateEvent'))
        <div class="alert alert-success alert-dismissible show fade col-lg-5 col md-5">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                <i class="far fa-lightbulb"></i> {{ session('updateEvent') }}
            </div>
        </div>
    @endif

    @if ($status == false)
        <div class="card card-primary mt-2">
            <div class="card-header">
                <div class="col-6 col-sm-8 col-md-9 pl-0">
                    <h4 class="text-success"><i class="fas fa-th-list"></i> List Events</h4>
                </div>
                <div class="col-6 col-sm-4 col-md-3 pr-0">
                    <input class="form-control border border-success" type="text" minlength="1" maxlength="100" placeholder="Search Event . . ."
                        wire:model="searchEvent"
                    >
                </div>
            </div>
            <div class="card-body pt-0">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered table-striped">
                        <thead class="bg-success text-center">
                            <tr>
                                <th class="text-white">No</th>
                                <th class="text-white">Event</th>
                                <th class="text-white">Date</th>
                                <th class="text-white">Action</th>
                                <th class="text-white">Menu</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($events as $event)
                            <tr>
                                <td>{{ $loop->index + $events->firstItem() }}</td>
                                <td>{{ strtoupper($event->name) }}</td>
                                <td>{{ $event->date->translatedFormat('d F Y') }}</td>
                                <td>
                                    <button type="button" class="btn btn-outline-info"
                                        wire:click="showEditEvent({{$event->id}})"
                                    ><i class="fas fa-user-edit"></i></button>
                                    <button type="button" class="btn btn-outline-danger"
                                        wire:click="showDeleteEvent({{$event->id}})"
                                    ><i class="fas fa-trash-alt"></i></button>
                                </td>
                                <td>
                                    <a type="button" class="btn btn-outline-success" href="{{route('guest.index', $event->id )}}">Buwuhan</a>
                                    <a type="button" class="btn btn-outline-success" href="">Undangan</a>
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
        </div>

    @else
        <div class="col-12 col-sm-12 col-lg-8 ml-n3">
            <div class="card card-primary">
                <div class="card-body">
                    <h6 class="text-primary"><i class="far fa-calendar-alt"></i> Edit Event</h6>
                    <div class="border-top sz-borderheader2 mb-2"></div>
                    <div class="form-group mb-0">
                        <label class="col-sm-2 col-form-label">Event</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" required
                                minlength="3"
                                maxlength="100"
                                wire:model="state.name"
                            >
                            <small id="" class="sz-color">
                                Contoh : pernikahan a dan b
                            </small>
                            @error('name')
                                <small id="" class="sz-error">
                                    <br/>  {{ $message }}
                                </small>
                            @enderror

                        </div>
                    </div>
                    <div class="form-group mb-0">
                        <label class="col-sm-2 col-form-label">Date</label>
                        <div class="input-group">
                            <div class="col-sm-9">
                                <input type="datetime-local" class="form-control @error('date') is-invalid @enderror" required autocomplete="off"
                                    wire:model="state.date"
                                >
                                <small id="" class="sz-color">
                                    Contoh : 01-01-2021
                                </small>
                                @error('date')
                                    <small id="" class="sz-error">
                                        <br/> {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="col-sm-3">
                                <button
                                    class="btn btn-success py-2"
                                    wire:click.privent="updateEvent"
                                ><i class="far fa-save"></i></button>
                                <button
                                    class="btn btn-danger py-2"
                                    wire:click.privent="hideEditEvent"
                                ><i class="far fa-window-close"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- Modal Delete --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="modalDeleteEvent" wire:ignore.self>
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
                            Ini dapat menghapus semua data yang berkaitan dengan event yang akan dihapus. <br/>
                            Apakah anda yakin ingin menghapus data ini?
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger"
                        wire:click.prevent="deleteEvent"
                    ><i class="fas fa-trash-alt"></i> Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

@section('specificts')

    <script>
        window.addEventListener('showRemoveModalEvent', event => {
            $('#modalDeleteEvent').modal('show');
        })

        window.addEventListener('hideRemoveModalEvent', event => {
            $('#modalDeleteEvent').modal('hide');
        })

    </script>

@endsection
