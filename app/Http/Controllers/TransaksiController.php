<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
   
    public function updateStatus(Request $request, $id)
{
    $transaksi = Transaksi::findOrFail($id);

    if ($request->status === 'SELESAI') {
        $transaksi->mobil->update(['status' => 'TERSEDIA']);
    }

    $transaksi->update(['status' => $request->status]);

    return back()->with('success', 'Status transaksi berhasil diperbarui.');
}


    // Memproses transaksi
    public function process(Request $request,Mobil $mobil)
    {
        
        // $mobil = Mobil::where('slug', $slug)->firstOrFail();
        
        // Validasi input checkout
        $request->validate([
            'nama' => 'required|string',
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
            'alamat' => $request->alamat,
            'lama' => $request->lama,
            'tgl_pesan' => $request->tgl_pesan,
            'total' => $totalHarga,
            'status' => 'PROSES',
        ]);

    return redirect()->route('front.profile')->with('success', 'Pesanan Anda berhasil diproses!');
    }

    
}
