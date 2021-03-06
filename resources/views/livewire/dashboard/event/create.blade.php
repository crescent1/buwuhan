<div>
    @if ($status == false)
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 p-0 mb-2">
            <button type="button" class="btn btn-success"
                wire:click.privent="showAddForm"
            ><i class="far fa-calendar-plus"></i> Add Event</button>
        </div>
    @else
        <div class="col-12 col-sm-12 col-lg-8 ml-n3">
            <div class="card card-primary">
                <div class="card-body">
                    <h6 class="text-primary"><i class="far fa-calendar-plus"></i> Add Event</h6>
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
                                    wire:click.privent="addEvent"
                                ><i class="fas fa-plus-circle"></i></button>
                                <button
                                    class="btn btn-danger py-2"
                                    wire:click.privent="hideAddEvent"
                                ><i class="far fa-window-close"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible show fade col-lg-5 col md-5">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                <i class="far fa-lightbulb"></i> {{ session('success') }}
            </div>
        </div>
    @endif
</div>
