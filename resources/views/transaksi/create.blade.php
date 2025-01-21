<div>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Add Transaksi</h6>
        <form wire:submit.prevent="store" >
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Pemesan</label>
                <input type="text" id="nama" class="form-control" wire:model="nama"
                value"{{@old('nama')}}">
                @error('nama') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label for="ponsel" class="form-label">NomerPonsel Pemesan</label>
                <input type="text" id="ponsel" class="form-control" wire:model="ponsel"
                value"{{@old('ponsel')}}">
                @error('ponsel') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat Pemesan</label>
                <input type="text" id="alamat" class="form-control" wire:model="alamat"
                value"{{@old('alamat')}}">
                @error('alamat') <span class="text-danger">{{ $message }}</span> @enderror
            </div>    
            <div class="mb-3">
                <label for="lama" class="form-label">Lama Pemesanan</label>
                <input type="number" id="lama" class="form-control" wire:change="hitung" wire:model="lama"
                value"{{@old('lama')}}">
                @error('lama') <span class="text-danger">{{ $message }}</span> @enderror
            </div>   
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal Pemesan</label>
                <input type="date" id="tanggal" class="form-control" wire:model="tanggal"
                value"{{@old('tanggal')}}">
                @error('tanggal') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                Total : {{$total}} </div>   
            <button type="submit" wire:click="store" class="btn btn-primary">Simpan</button>
            <button type="button" class="btn btn-secondary" wire:click="$set('addPage', false)">Batal</button>
        </form>
        
</div>
            </div>
        </div>
    </div>
</div>
