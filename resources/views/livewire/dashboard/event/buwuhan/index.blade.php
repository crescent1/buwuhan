<div>
    @if ($status == false)
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
                            wire:click="showEditGuest({{$guest->id}})"
                        ><i class="fas fa-user-edit"></i></button>
                        <button type="button" class="btn btn-outline-danger"
                            wire:click="showDeleteGuest({{$guest->id}})"
                        ><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
        <h6 class="section-title mt-1">Edit Buwuhan</h6>
        <div class="border-top sz-borderheader2 mb-2"></div>
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
                <input type="number" min="0" class="form-control @error('money') is-invalid @enderror" required autocomplete="off"
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
                    wire:click.privent="updateBuwuhan"
                ><i class="fas fa-plus-circle"></i></button>
                <button
                    class="btn btn-danger py-2"
                    wire:click.privent="hideBuwuhan"
                ><i class="far fa-window-close"></i></button>
            </div>
        </div>
    @endif
</div>
