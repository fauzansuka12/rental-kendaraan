<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function index()
{
    // Hanya ambil mobil yang statusnya 'TERSEDIA'
    $mobil = Mobil::where('status', 'TERSEDIA')->paginate(6);
    $mobil_list = Mobil::all();
    
    return view('front.index', compact('mobil','mobil_list'));
}

    public function list()  {
    // $mobil = Mobil::with(['transaksi' => function ($query) {
    //     $query->where('status', 'PROSES')->paginate(3);
    // }])->get();
    // $mobil = Mobil::where('status', 'TERSEDIA')->get();

    return view('front.car',compact('mobil'));
    }
    
 // Menampilkan halaman checkout berdasarkan slug
    public function checkout( $slug)
    {
        // $mobil = Mobil::where('slug', $slug)->firstOrFail();
   $mobil = Mobil::where('slug', $slug)->firstOrFail();

    if ($mobil->status === 'PROSES') {
        return redirect()->back()->with('error', 'Mobil ini sedang dalam pemesanan.');
    }

    return view('front.checkout', compact('mobil'));    }


// Fungsi untuk menyimpan transaksi
public function storeCheckout(Request $request)
{
    $mobil = Mobil::findOrFail($request->mobil_id);

    if ($mobil->status === 'PROSES') {
        return redirect()->back()->with('error', 'Mobil ini sudah dipesan.');
    }

    $transaksi = Transaksi::create([
        'user_id' => Auth::user()->id,
        'mobil_id' => $mobil->id,
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'lama' => $request->lama,
        'tgl_pesan' => now(),
        'total' => $mobil->harga * $request->lama,
        'status' => 'PROSES'
    ]);

    // Ubah status mobil jadi "PROSES"
    $mobil->update(['status' => 'PROSES']);

    return redirect('/profile')->with('success', 'Pemesanan berhasil! Silakan cek status pemesanan di profil.');
}
    public function details(Mobil $mobil) {
  
    return view('front.details', compact('mobil'));
    }


    public function profile() {
        
        $userId = Auth::user()->id; // Ambil ID user yang sedang login

            // Ambil riwayat transaksi yang sudah selesai
        $riwayatTransaksi = Transaksi::where('user_id', $userId)
            ->where('status', 'SELESAI')
            ->orderBy('tgl_pesan', 'desc') // Urutkan berdasarkan tanggal selesai
            ->get();
            $transaksiAktif = Transaksi::where('user_id', $userId)
        ->where('status', '!=', 'SELESAI')
        ->latest()
        ->first();

    // Hitung sisa waktu hanya jika status "PROSES"
    $sisaWaktu = null;
    if ($transaksiAktif && $transaksiAktif->status === 'PROSES') {
        $tglMulai = Carbon::parse($transaksiAktif->tgl_proses ?? $transaksiAktif->tgl_pesan);
        $tglSelesai = $tglMulai->copy()->addDays((int) $transaksiAktif->lama);
        $sisaWaktu = Carbon::now()->diff($tglSelesai);
    }
    return view('front.profile',compact('riwayatTransaksi','transaksiAktif','sisaWaktu'));
    }

    public function proses() {
    $userId = Auth::user()->id; // Ambil ID user yang sedang login
    
     $transaksiAktif = Transaksi::where('user_id', $userId)
        ->where('status', '!=', 'SELESAI')
        ->latest()
        ->first();

    // Hitung sisa waktu hanya jika status "PROSES"
    $sisaWaktu = null;
    if ($transaksiAktif && $transaksiAktif->status === 'PROSES') {
        $tglMulai = Carbon::parse($transaksiAktif->tgl_proses ?? $transaksiAktif->tgl_pesan);
        $tglSelesai = $tglMulai->copy()->addDays((int) $transaksiAktif->lama);
        $sisaWaktu = Carbon::now()->diff($tglSelesai);
    }
    return view('front.proses', compact('transaksiAktif',  'sisaWaktu'));
    }

}
