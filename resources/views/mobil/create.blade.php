<div>
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-12 col-xl-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Tambah Mobil</h6>
            <form wire:submit.prevent="store" >
                <div class="mb-3">
                    <label for="nopolisi" class="form-label">Plat Nomor Polisi</label>
                    <input type="text" id="nopolisi" class="form-control" wire:model.defer="nopolisi">
                    @error('nopolisi') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            
                <div class="mb-3">
                    <label for="merk" class="form-label">Merk Kendaraan</label>
                    <input type="text" id="merk" class="form-control" wire:model.defer="merk">
                    @error('merk') <span class="text-danger">{{ $message }}</span>@enderror
                </div>

                
                <div class="mb-3">
                    <label for="kursi" class="form-label">Kursi Kendaraan</label>
                    <input type="number" id="kursi" class="form-control" wire:model.defer="kursi">
                    @error('kursi') <span class="text-danger">{{ $message }}</span>@enderror
                </div>

                
            
                <div class="mb-3">
                    <label for="jenis" class="form-label">Jenis Kendaraan</label>
                    <select name="jenis" class="form-select" wire:model.defer="jenis">
                        <option value="">--PILIH--</option>
                        <option value="pickup">PickUp</option>
                        <option value="SUV">SUV</option>
                        <option value="sedan">Sedan</option>
                        <option value="minibus">MiniBus</option>
                    </select>
                    @error('jenis') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            
                <div class="mb-3">
                    <label for="mesin" class="form-label">Mesin Kendaraan</label>
                    <select name="mesin" class="form-select" wire:model.defer="mesin">
                        <option value="">--PILIH--</option>
                        <option value="manual">manual</option>
                        <option value="matic">matic</option>
                        <option value="listrik">listrik</option>
                    </select>
                    @error('mesin') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            
                
            
                <div class="mb-3">
                    <label for="bbm" class="form-label">bbm Kendaraan</label>
                    <select name="bbm" class="form-select" wire:model.defer="bbm">
                        <option value="">--PILIH--</option>
                        <option value="bensin">bensin</option>
                        <option value="solar">solar</option>
                    </select>
                    @error('bbm') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            


                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="text" id="harga" class="form-control" wire:model.defer="harga">
                    @error('harga') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" id="foto" class="form-control" wire:model="foto">
                    <div wire:loading wire:target="foto" class="text-info">Mengunggah file, harap tunggu...</div>
                    @error('foto') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            
                <button type="submit" class="btn btn-success" wire:loading.attr="disabled" wire:target="foto">Simpan</button>
                <button type="button" class="btn btn-secondary" wire:click="$set('addPage', false)">Batal</button>
            </form>
            
</div>
                </div>
            </div>
        </div>
</div>
