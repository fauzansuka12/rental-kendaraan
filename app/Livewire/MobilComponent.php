<?php

namespace App\Livewire;

use App\Models\Mobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\Features\SupportPagination\WithoutUrlPagination;

use Illuminate\Support\Str;
use Livewire\WithPagination;

class MobilComponent extends Component
{
    use WithPagination, WithoutUrlPagination, WithFileUploads;

    protected $paginationTheme = "bootstrap";
    public $addPage, $editPage = false;
    public $nopolisi, $merk, $jenis, $kapasitas, $harga, $foto, $id;

    public function render()
    {
        $data['mobil'] = Mobil::paginate(10);
        return view('livewire.mobil-component', $data);
    }

    public function create()
    {
        $this->addPage = true;
    }

    public function updatedFoto()
    {
        $this->validate([
            'foto' => 'image|max:1024', // Validasi ukuran maksimum 1MB
        ]);
    }

    public function store(Request $request)
    {
        $this->validate([
            'nopolisi' => 'required',
            'merk' => 'required',
            'jenis' => 'required',
            'harga' => 'required',
            'foto' => 'required|image'
        ], [
            'nopolisi.required' => 'Nopolisi Tidak Boleh Kosong',
            'merk.required' => 'Merk Tidak Boleh Kosong',
            'jenis.required' => 'Jenis Tidak Boleh Kosong',
            'harga.required' => 'Harga Tidak Boleh Kosong',
            'foto.required' => 'Foto Tidak Boleh Kosong',
            'foto.image' => 'Foto Dalam Format Image',
        ]);

       
        $filename = time(). "_". $this->foto->getClientOriginalName();
        $this->foto->storeAs("uploads/mobil",$filename,"public");
        Mobil::create([
            'user_id' => Auth::user()->id,
            'nopolisi' => $this->nopolisi,
            'merk' => $this->merk,
            'jenis' => $this->jenis,
            'harga' => $this->harga,
            'foto'=>$filename,
            'slug'=>Str::slug($this->merk)
        ]);

        session()->flash('succes', 'Berhasil Simpan Data');
        $this->reset(['nopolisi', 'merk', 'jenis', 'kapasitas', 'harga', 'foto']);
    }
    //edit
    public function update()
{
    $mobil = Mobil::find($this->id);

    if (empty($this->foto)) {
        $mobil->update([
            'user_id' => Auth::user()->id,
            'nopolisi' => $this->nopolisi,
            'merk' => $this->merk,
            'jenis' => $this->jenis,
            'harga' => $this->harga,
            'foto' => $mobil->foto, // Tetap gunakan foto lama
        ]);
    } else {
        $filePath = public_path('storage/uploads/mobil/' . $mobil->foto);
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $fileName = $this->foto->getClientOriginalName();
        $this->foto->storeAs('uploads/mobil', $fileName, 'public');

        $mobil->update([
            'user_id' => Auth::user()->id,
            'nopolisi' => $this->nopolisi,
            'merk' => $this->merk,
            'jenis' => $this->jenis,
            'harga' => $this->harga,
            'foto' => $fileName,
        ]);
    }

    session()->flash('success', 'Berhasil diedit');
    $this->reset();
}

    public function edit($id)
{
    $this->editPage = true;
    $this->id=$id;
    $mobil=Mobil::find($id);
    $this->nopolisi=$mobil->nopolisi;
    $this->merk=$mobil->merk;
    $this->jenis=$mobil->jenis;
    $this->harga = $mobil->harga;
}

    // menghapus 
    public function destroy($id)
    {
        $cari = Mobil::find($id);
        $cari->delete();
        session()-> flash('success','Berhasil Hapus Data');
        $this->reset();
    }

}
