<div>
    <form wire:submit.prevent="store">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" id="name" class="form-control" wire:model="name">
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" class="form-control" wire:model="email">
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" class="form-control" wire:model="password">
            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select id="role" class="form-control" wire:model="role">
                <option value="">Pilih Role</option>
                <option value="admin">Admin</option>
                <option value="pemilik">Pemilik</option>
            </select>
            @error('role') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <button type="button" class="btn btn-secondary" wire:click="$set('addPage', false)">Batal</button>
    </form>
</div>
