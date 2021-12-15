<div>
    @if ($status == false)
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-right">
            <button type="button" class="btn btn-success"
                wire:click.privent="showAddForm"
            ><i class="fas fa-plus-circle"></i> Add Event</button>
        </div>
    @else
        <form action="">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Event</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" required
                        minlength="3"
                        maxlength="100"
                        name="name"
                        value="{{old('name')}}"
                        wire:model="state.event"
                    >
                    @error('name')
                        <small id="" class="sz-error">
                            {{ $message }}
                        </small>
                    @enderror

                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Date</label>
                <div class="col-sm-4">
                    <input type="datetime-local" class="form-control @error('email') is-invalid @enderror" required autocomplete="off"
                        name="date"
                        value="{{old('date')}}"
                        wire:model="state.date"
                    >
                    @error('email')
                        <small id="" class="sz-error">
                            {{ $message }}
                        </small>
                    @enderror

                </div>
            </div>
        </form>
    @endif

    <br/>
    @if (session()->has('newEvent'))
        <div class="alert alert-success alert-dismissible show fade col-lg-5 col md-5">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                <i class="far fa-lightbulb"></i> {{ session('newEvent') }}
            </div>
        </div>
    @endif
</div>
