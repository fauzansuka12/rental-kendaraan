<?php

namespace App\Livewire;

use App\Models\Mobil;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;


class TransaksiComponent extends Component
{
    use WithPagination,WithoutUrlPagination;
    public $addPage,$lihatPage = false;
    public $nama,$ponsel,$alamat,$lama,$tanggal,$mobil_id,$harga,$total;
    public function render()
    {
        $data['mobil'] = Mobil::paginate(5);
        return view('livewire.transaksi-component',$data);
    }
    public function create($id,$harga)
    {      
        $this->mobil_id=$id;
        $this->harga=$harga;
        $this->addPage=true;
    }
    public function hitung()
    {
        $lama=$this->lama;
        $harga=$this->harga;
        $this->total=$lama*$harga;
    }
    public function store()
    {
        $this->validate([
            'nama'=>'required',
            'ponsel'=>'required',
            'alamat'=>'required',
            'lama'=>'required',
            'tanggal'=>'required',
        ],[
            'nama.required'=>'Nama Tidak Boleh Kosong',
             'ponsel.required'=>'Ponsel Tidak Boleh Kosong',
              'alamat.required'=>'Alamat Tidak Boleh Kosong',
               'lama.required'=>'Lama Pesanan Tidak Boleh Kosong',
                'tanggal.required'=>'Tanggal Peasanan Tidak Boleh Kosong'
        ]);
        $cari=Transaksi::where('mobil_id',$this->mobil_id)
        ->where('tgl_pesan',$this->tanggal)
        ->where('status','!=','SELESAI')->count();

        if($cari==1){ 
            session()->flash('error','Mobil Sudah Di Pesan');
        }
        else{
            Transaksi::create([
                'user_id' => Auth::user()->id,
                'mobil_id' => $this->mobil_id,
                'nama' => $this->nama,
                'ponsel' => $this->ponsel,
                'lama'=>$this->lama,
                'alamat' => $this->alamat,
                'tgl_pesan' => $this->tanggal,
                'total' => $this->total,
                'status' => 'WAIT',
            ]); 
            session()->flash('success','Transaksi Berhasil Disimpan');
        }
        $this->dispatch('lihat-transaksi');
        $this->reset();
    }
        public function lihat()
        {
        $this->dataTransaksi['transaksi']=Transaksi::paginate(10);

        $this->lihatPage=true;
        }
}