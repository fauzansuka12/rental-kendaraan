<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    // Menampilkan halaman checkout berdasarkan slug
    public function show(Mobil $mobil)
    {
        // $mobil = Mobil::where('slug', $slug)->firstOrFail();
        return view('front.checkout', compact('mobil'));
    }

    // Memproses transaksi
    public function process(Request $request,Mobil $mobil)
    {
        // $mobil = Mobil::where('slug', $slug)->firstOrFail();
        
        // Validasi input checkout
        $request->validate([
            'nama' => 'required|string',
            'ponsel' => 'required|string',
            'alamat' => 'required|string',
            'lama' => 'required|integer|min:1',
            'tgl_pesan' => 'required|date',
        ]);

        // Hitung total harga
        $totalHarga = $mobil->harga * $request->lama;

        // Simpan transaksi ke database
        $transaksi = Transaksi::create([
            'user_id' => Auth::id(),
            'mobil_id' => $mobil->id,
            'nama' => $request->nama,
            'ponsel' => $request->ponsel,
            'alamat' => $request->alamat,
            'lama' => $request->lama,
            'tgl_pesan' => $request->tgl_pesan,
            'total' => $totalHarga,
            'status' => 'WAIT',
        ]);

    return redirect()->route('front.profile', ['mobil' => $mobil->slug])->with('success', 'Pesanan Anda berhasil diproses!');
    }
}
