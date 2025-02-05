<div>
    {{-- Stop trying to control. --}}
</div>
<div>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Add Mobil</h6>
<form wire:submit.prevent="edit">
    <div class="mb-3">
        <label for="nopolisi" class="form-label">Plat Nomor Polisi</label>
        <input type="text" id="nopolisi" class="form-control" wire:model="nopolisi">
        @error('nopolisi') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mb-3">
        <label for="merk" class="form-label">Merk Kendaraan</label>
        <input type="text" id="merk" class="form-control" wire:model="merk">
        @error('merk') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

        <div class="mb-3">
            <label for="jenis" class="form-label">Jenis Kendaraan</label>
            <select name="jenis" class="form-select" wire:model="jenis">
                <option value="">--PILIH--</option>
                <option value="pickup">PickUp</option>
                <option value="sedan">sedan</option>
                <option value="minibus">MiniBus</option>
                <option value="SUV">MiniBus</option>
            </select>
            @error('jenis') <span class="text-danger">{{ $message }}</span> 
            @enderror
        </div>
        <div class="mb-3">
            <label for="mesin" class="form-label">Mesin Kendaraan</label>
            <select name="mesin" class="form-select" wire:model="mesin">
                <option value="">--PILIH--</option>
                <option value="manual">manual</option>
                <option value="matic">matic</option>
                <option value="listrik">listrik</option>
            </select>
            @error('mesin') <span class="text-danger">{{ $message }}</span> 
            @enderror
        </div>
        <div class="mb-3">
            <label for="bbm" class="form-label">BBM Kendaraan</label>
            <select name="bbm" class="form-select" wire:model="bbm">
                <option value="">--PILIH--</option>
                <option value="bensin">bensin</option>
                <option value="solar">solar</option>
            </select>
            @error('bbm') <span class="text-danger">{{ $message }}</span> 
            @enderror
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="teks" id="harga" class="form-control" wire:model="harga">
            @error('harga') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="kursi" class="form-label">kursi</label>
            <input type="number" id="kursi" class="form-control" wire:model="kursi">
            @error('kursi') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
     
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="teks" id="harga" class="form-control" wire:model="harga">
            @error('harga') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" id="foto" class="form-control" wire:model="foto">
                @error('foto') <span class="text-danger">{{ $message }}</span> @enderror
                <img src="{{ asset('/storage/uploads/mobil/' . $data->foto) }}" style="width: 100px;" alt="{{ $data->foto }}">
            
            </div>
    </div>

    <button type="button"wire:click="update()" class="btn btn-primary">EDIT</button>
</form>
</div>
            </div>
        </div>
    </div>
</div>
