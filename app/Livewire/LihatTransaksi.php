<?php

namespace App\Livewire;

use App\Models\Mobil;
use App\Models\Transaksi;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;

class LihatTransaksi extends Component
{
    use WithPagination,WithoutUrlPagination;
    #[On('lihat-transaksi')]
    public function render()
    {
        $data['transaksi']=Transaksi::paginate(15);
        return view('livewire.lihat-transaksi',$data);
    }
    public function proses($id){
        $transaksi=Transaksi::find($id);
        $transaksi->update([
            'status'=>'PROSES'
        ]);
        session()->flash('success','Berhasil Proses Data');
    }
    public function selesai($id){
        $transaksi=Mobil::find($id);
        $transaksi->update([
            'status'=>'TERSEDIA'
        ]);
        session()->flash('success','Berhasil Proses Data');
    }
}
