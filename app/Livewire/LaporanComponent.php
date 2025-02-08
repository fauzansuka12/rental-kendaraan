<?php

namespace App\Livewire;

use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Dompdf\Adapter\PDFLib;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class LaporanComponent extends Component
{
    use WithPagination, WithoutUrlPagination;
    
    public $tanggal1, $tanggal2;
    #[On('lihat-transaksi')]
    
    public function render()
    {
if ($this->tanggal2 != "") {
    $data['transaksi'] = Transaksi::where('status','SELESAI')
    ->whereBetween('tgl_pesan',[$this->tanggal1,$this->tanggal2])
    ->paginate(15);
}else{
    $data['transaksi'] = Transaksi::where('status','SELESAI')->paginate(15);

}

        return view('livewire.laporan-component',$data);
    }

    public function cari(){
        $this->dispatch('lihat-laporan');
    }
    public function exportpdf()
    {
        if($this->tanggal2 !=""){
            $data['transaksi'] = Transaksi::where('status','SELESAI')
    ->whereBetween('tgl_pesan',[$this->tanggal1,$this->tanggal2])
    ->get();
            $pdf= Pdf::loadView('laporan.exportpdf',$data)->output();
            return response()->streamDownload(
                fn()=>print($pdf),
                "Laporan Transaksi" . $this->tanggal1 . ' s-d ' .$this->tanggal2 .".pdf"  
            );          
        }else{
            $data['transaksi'] = Transaksi::where('status','SELESAI')->get();
            $pdf= Pdf::loadView('laporan.exportpdf',$data)->output();
            return response()->streamDownload(
                fn()=>print($pdf),
                "Laporan Transaksi Seluruhan.pdf"
            );   
        }                                     
    }
}
