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
            <div class="col-md-12">
                <div class="row mb-5">
                    <div class="col-md-4">
					<div class="car-wrap rounded ftco-animate">
						<div class="img rounded d-flex align-items-end"
							style="background-image: url({{ asset('storage/uploads/mobil/' . $transaksi->mobil->foto) }});">
						</div>
						<div class="text">
                            @if(isset($transaksi))
                            <p>
                                <span>Mobil:</span> {{ $transaksi->mobil->merk ?? 'Tidak diketahui' }} <br>
                                <span>Status:</span> {{ ucfirst($transaksi->status) }} <br>
                                <span>Tgl Pesan:</span> {{ \Carbon\Carbon::parse($transaksi->tgl_pesan)->format('d-M-Y') }} <br>
                                <span>Sisa Waktu:</span> {{ $sisaWaktu }} <br>
                            </p>
                            @else
                            <p>Tidak ada transaksi ditemukan.</p>
                            @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
