<div class="col-md-12">
    <div class="row mb-5">
        <div class="col-md-4">
            <div class="car-wrap rounded ftco-animate">
            <div class="img rounded d-flex align-items-end"
                style="background-image: url({{ asset('storage/uploads/mobil/' . $transaksiAktif->mobil->foto) }});">
            </div>
            <div class="text">
                @if(isset($transaksiAktif))
                <p>
                    <span>Mobil:</span> {{ $transaksiAktif->mobil->merk ?? 'Tidak diketahui' }} <br>
                    <span>Status:</span> {{ ucfirst($transaksiAktif->status) }} <br>
                    <span>Tgl Pesan:</span> {{ \Carbon\Carbon::parse($transaksiAktif->tgl_pesan)->format('d-M-Y') }} <br>
                    <span>Sisa Waktu:</span> {{ $sisaWaktu }} <br>
                </p>
                @else
                <p>Tidak ada transaksiAktif ditemukan.</p>
                @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>  
</div>