<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{

    public function index(Mobil $mobil) {
    $mobil = Mobil::all();
    // dd($mobil->slug);
    return view('front.index',compact('mobil'));
    }

    public function list()  {
        $mobil = Mobil::paginate(3);
        return view('front.car',compact('mobil'));
    }

    public function category() {
    $mobil = Mobil::all();
    return view('front.car',compact('mobil'));
    }
    
    public function details(Mobil $mobil) {
  
    return view('front.details', compact('mobil'));
    }


public function profile(Request $request) {
    // Ambil transaksi user yang sedang login
    $transaksi = Transaksi::where('user_id', Auth::user()->id)->latest()->first();

    // Jika tidak ada transaksi, tampilkan pesan
    if (!$transaksi) {
        return view('front.profile')->with('message', 'Tidak ada transaksi ditemukan.');
    }

    // Konversi tgl_pesan ke Carbon
    // $tglPesan = Carbon::parse($transaksi->tgl_pesan);
    
    // Konversi 'lama' ke integer untuk memastikan validitas
    $lama = (int) $transaksi->lama;
  // Cek apakah status transaksi adalah "PROSES"
    if ($transaksi->status === 'PROSES') {
        // Mulai hitung waktu sejak transaksi masuk status "PROSES"
        $tglMulai = Carbon::parse($transaksi->tgl_proses ?? $transaksi->tgl_pesan); 
        $tglSelesai = $tglMulai->copy()->addDays($lama);
        
        // Hitung sisa waktu dari sekarang
        $sisaWaktu = Carbon::now()->diff($tglSelesai);
        // Carbon::parse($sisaWaktu)->format('d/m/Y:H:i:s');
        // dd($sisaWaktu)
    } else {
        // Jika belum PROSES, sisa waktu belum dihitung
        $sisaWaktu = null;
    }


    return view('front.profile', compact('transaksi', 'sisaWaktu'));
}



}
