@extends('front.main')
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

<section class="ftco-section bg-light">
		<div class="container">
			<div class="row">

				@foreach ($mobil as $data)
						
				<div class="col-md-4">
					<div class="car-wrap rounded ftco-animate">
						<div class="img rounded d-flex align-items-end"
							style="background-image: url({{ asset('storage/uploads/mobil/' . $data->foto) }});">
						</div>
						<div class="text">
							<h2 class="mb-0"><a href="car-single.html">{{ $data->merk }}</a></h2>
							<div class="d-flex mb-3">
								<p class="price ml-auto">Rp.{{ number_format($data->harga) }}<span>/Hari</span></p>
							</div>
							<p class="d-flex mb-0 d-block">
								@if ($data->status === 'PROSES')
										<button class="btn btn-secondary py-2 mr-1" disabled>On Order</button>
								@else
										<a href="{{ route('checkout', ['mobil' => $data->slug]) }}" class="btn btn-primary py-2 mr-1">Booking</a> 
								@endif
								<a href="{{ route('front.details', ['mobil' => $data->slug]) }}" class="btn btn-secondary py-2 mr-1">Detail</a>
							</p>
						</div>
					</div>
				</div>
				
				@endforeach
		
			</div>
			{{-- pagginate --}}
			{{-- <div class="row mt-5">
				<div class="col text-center">
					<div class="block-27">
						<ul>
                Tombol Sebelumnya
                @if ($mobil->onFirstPage())
                    <li class="disabled"><span>&lt;</span></li>
                @else
                    <li><a href="{{ $mobil->previousPageUrl() }}">&lt;</a></li>
                @endif

                Nomor Halaman
                @for ($i = 1; $i <= $mobil->lastPage(); $i++)
                    @if ($i == $mobil->currentPage())
                        <li class="active"><span>{{ $i }}</span></li>
                    @else
                        <li><a href="{{ $mobil->url($i) }}">{{ $i }}</a></li>
                    @endif
                @endfor

                Tombol Berikutnya
                @if ($mobil->hasMorePages())
                    <li><a href="{{ $mobil->nextPageUrl() }}">&gt;</a></li>
                @else
                    <li class="disabled"><span>&gt;</span></li>
                @endif
            </ul>
					</div>
				</div>
			</div> --}}
		</div>
</section>
@endsection