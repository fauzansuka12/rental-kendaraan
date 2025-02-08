@extends('front.main')
@section('title','Detail Pemesanan')
@section('content')

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs">
                    <span class="mr-2"><a href="{{ route('home') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> 
                    <span>Detail <i class="ion-ios-arrow-forward"></i></span>
                </p>
                <h1 class="mb-3 bread">{{ Auth::user()->name }}</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section contact-section">
    <div class="container">
        <div class="row d-flex mb-5 contact-info">
            
            @if($riwayatTransaksi->filter(fn($item) => $item->status === 'PROSES')->count() > 0)
            @include('front.proses')
            @endif
            <div class="col-md-12">
                 <!-- Riwayat transaksiAktif -->
                <h4>Riwayat transaksiAktif</h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Mobil</th>
                            <th>Tanggal Pesan</th>
                            <th>Tanggal Selesai</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($riwayatTransaksi as $dt )

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dt->mobil->nopolisi }}</td>
                            <td>{{ $dt->tgl_pesan }}</td>
                            <td>{{ $dt->tgl_selesai }}</td>
                            <td>{{ $dt->status }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada riwayat transaksiAktif.</td>
                        </tr>    
                        
                        @endforelse
                    </tbody>
                </table>
            </div>
    </section>

@endsection
