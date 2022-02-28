<div>
    <div class="card card-success">
        <div class="card-body">
            <h6 class="text-success"><i class="fas fa-user-plus"></i> Add Buwuhan</h6>
            <hr class="border-top sz-borderheader2 mb-2">
            {{-- <div class="border-top sz-borderheader2 mb-2"></div> --}}
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-2">
                    <select id="" class="form-control @error('gender') is-invalid @enderror" required
                        wire:model="state.gender"
                    >
                        <option value="">. . .</option>
                        <option value="bapak">Bapak</option>
                        <option value="ibu">Ibu</option>
                    </select>
                    <small id="" class="sz-color">
                        Contoh : bapak/ibu
                    </small>
                    @error('gender')
                        <small id="" class="sz-error">
                            <br/>  {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="col-sm-5">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" required
                        minlength="2"
                        maxlength="100"
                        wire:model="state.name"
                    >
                    <small id="" class="sz-color">
                        Contoh : ahmad
                    </small>
                    @error('name')
                        <small id="" class="sz-error">
                            <br/>  {{ $message }}
                        </small>
                    @enderror

                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Uang</label>
                <div class="col-sm-7">
                    <input type="number" min="0" step="5000" class="form-control @error('money') is-invalid @enderror" required autocomplete="off"
                        wire:model="state.money"
                    >
                    <small id="" class="sz-color">
                        Contoh : 20000
                    </small>
                    @error('money')
                        <small id="" class="sz-error">
                            <br/> {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Items (pisahkan dengan koma)</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control @error('item') is-invalid @enderror" autocomplete="off"
                        wire:model="state.item"
                    >
                    <small id="" class="sz-color">
                        Contoh : gula 1 kg, mie 2 bungkus
                    </small>
                    @error('item')
                        <small id="" class="sz-error">
                            <br/> {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">District</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control @error('district') is-invalid @enderror" required autocomplete="off"
                        wire:model="state.district"
                    >
                    <small id="" class="sz-color">
                        Contoh : Ngoro
                    </small>
                    @error('district')
                        <small id="" class="sz-error">
                            <br/> {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="col-sm-3">
                    <button
                        class="btn btn-primary py-2"
                        wire:click.privent="addBuwuhan"
                    ><i class="fas fa-plus-circle"></i></button>
                    <button
                        class="btn btn-danger py-2"
                        wire:click.privent="hideBuwuhan"
                    ><i class="far fa-window-close"></i></button>
                </div>
            </div>

        </div>
    </div>

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
