<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class UserComponent extends Component
{
    use WithPagination,WithoutUrlPagination;

    protected $paginationTheme = "bootstrap";
    public $addPage, $editPage = false;
    public $name, $email, $password, $telephone,$id;

    public function render()
    {
        $user = User::all();
        // dd($user);
        return view('livewire.user-component', compact('user'));
    }

    public function create()
    {
        $this->addPage = true;
    }
    public $editId; // Menyimpan ID user yang akan diedit

// Fungsi untuk memuat data user ke dalam form
public function edit($id)
{
    $cari = User::find($id);

    if ($cari) {
        $this->editId = $cari->id;
        $this->name = $cari->name;
        $this->email = $cari->email;
        $this->telephone = $cari->telephone;
        $this->editPage = true;
    } else {
        session()->flash('error', 'User tidak ditemukan.');
    }
}

// Fungsi untuk memperbarui data user
public function update()
{
    $this->validate([
        'name' => 'required',
        'email' => 'required|email',
        'telephone' => 'required',
    ], [
        'name.required' => 'Nama tidak boleh kosong.',
        'email.required' => 'Email tidak boleh kosong.',
        'email.email' => 'Format email salah.',
        'telephone.required' => 'telephone tidak boleh kosong.',
    ]);

    $user = User::find($this->editId);

    if ($user) {
        $user->name = $this->name;
        $user->email = $this->email;
        if ($this->password) {
            $user->password = Hash::make($this->password); // Update password jika diisi
        }
        $user->telephone = $this->telephone;
        $user->save();

        session()->flash('success', 'Data berhasil diperbarui.');
        $this->reset(['name', 'email', 'password', 'telephone', 'editPage', 'editId']);
    } else {
        session()->flash('error', 'User tidak ditemukan.');
    }
}


    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'telephone' => 'required',
        ], [
            'name.required' => 'Name Tidak Boleh Kosong',
            'email.required' => 'Email Tidak Boleh Kosong',
            'email.email' => 'Format email salah',
            'password.required' => 'Password Tidak Boleh Kosong',
            'telephone.required' => 'Telephone Tidak Boleh Kosong',
        ]);

        $user =User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'telephone' => $this->telephone,
        ]);
        $user->assignRole('pelanggan');
        // dd($user->getNameRoles);
        


        session()->flash('success', 'Berhasil simpan data');
        $this->reset();
    }
    public function destroy($id){
        $cari = User::find($id);
        $cari->delete();
        session()-> flash('success','Berhasil Hapus Data');
        $this->reset();
    }
    
}
