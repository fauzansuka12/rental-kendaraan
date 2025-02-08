@extends('front.main')
@section('title','Detail Mobil')
@section('content')
		<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{asset('front/images/bg_3.jpg')}}');"
		data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
				<div class="col-md-9 ftco-animate pb-5">
					<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i
									class="ion-ios-arrow-forward"></i></a></span> <span>Car details <i
								class="ion-ios-arrow-forward"></i></span></p>
					<h1 class="mb-3 bread">Car Details</h1>
				</div>
			</div>
		</div>
	</section>


	<section class="ftco-section ftco-car-details">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12">
					<div class="car-details">
						<div class="img rounded" style="background-image: url('{{asset('storage/uploads/mobil/'.$mobil->foto)}}');"></div>
						<div class="text text-center">
							{{-- <h2>{{ $mobil->merk }}</h2> --}}
						</div>
					</div>
				</div>
			</div>
			{{-- <div class="row">
				
				<div class="col-md d-flex align-self-stretch ftco-animate">
					<div class="media block-6 services">
						<div class="media-body py-md-4">
							<div class="d-flex mb-3 align-items-center">
								<div class="icon d-flex align-items-center justify-content-center"><span
										class="flaticon-pistons"></span></div>
								<div class="text">
									<h3 class="heading mb-0 pl-3">
										Transmission
										<span>Manual</span>
									</h3>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md d-flex align-self-stretch ftco-animate">
					<div class="media block-6 services">
						<div class="media-body py-md-4">
							<div class="d-flex mb-3 align-items-center">
								<div class="icon d-flex align-items-center justify-content-center"><span
										class="flaticon-car-seat"></span></div>
								<div class="text">
									<h3 class="heading mb-0 pl-3">
										Seats
										<span>5 Adults</span>
									</h3>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md d-flex align-self-stretch ftco-animate">
					<div class="media block-6 services">
						<div class="media-body py-md-4">
							<div class="d-flex mb-3 align-items-center">
								<div class="icon d-flex align-items-center justify-content-center"><span
										class="flaticon-diesel"></span></div>
								<div class="text">
									<h3 class="heading mb-0 pl-3">
										Fuel
										<span>Petrol</span>
									</h3>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> --}}
		</div>
	</section>

	<section class="ftco-section mt-5 bg-light">
		<div class="container">
			<div class="row no-gutters">
				<div class="col-md-12	featured-top">
					<div class="row justify-content-center no-gutters">
						<div class="col-md-10 d-flex align-items-center">
							<div class="services-wrap rounded-right w-100">
								<h3 class="heading-section text-center mb-4">{{ $mobil->merk }} </h3>
								<div class="row d-flex mb-4">
									<div class="col-md-3 d-flex align-self-stretch ftco-animate">
										<div class="services w-100 text-center">
											<div class="icon d-flex align-items-center justify-content-center"><span
													class="flaticon-pistons"></span></div>
											<div class="text w-100">
												<h3 class="heading mb-2">{{$mobil->mesin}}</h3>
											</div>
										</div>
									</div>
									<div class="col-md-3 d-flex align-self-stretch ftco-animate">
										<div class="services w-100 text-center">
											<div class="icon d-flex align-items-center justify-content-center"><span
													class="flaticon-car-seat"></span></div>
											<div class="text w-100">
												<h3 class="heading mb-2">{{ $mobil->kursi }} kursi</h3>
											</div>
										</div>
									</div>
									<div class="col-md-3 d-flex justify-content-center align-self-stretch ftco-animate">
										<div class="services w-100 text-center">
											<div class="icon d-flex align-items-center justify-content-center"><span
													class="flaticon-diesel"></span></div>
											<div class="text w-100 text-center mx-auto m-auto">
												<h3 class="heading mb-2 text-center">{{ $mobil->bbm }}</h3>
											</div>
										</div>
									</div>
									<div class="col-md-3 d-flex justify-content-center align-self-stretch ftco-animate">
										<div class="services w-100 text-center">
											<div class="icon d-flex align-items-center justify-content-center"><span
													class="flaticon-rent"></span></div>
											<div class="text w-100 text-center mx-auto m-auto">
												<h3 class="heading mb-2 text-center">Rp.{{ number_format($mobil->harga) }} / Hari</h3>
											</div>
										</div>
									</div>
								</div>
								<p class="text-center mt-5">
								@if ($mobil->status === 'PROSES')
										<button class="btn btn-secondary py-2 mr-1" disabled>On Order</button>
								@else
									<a href="{{ route('checkout', ['mobil' => $mobil->slug]) }}"
										class="btn text-center mx-auto m-auto ml-auto btn-primary py-3 px-4">Pesan Sekarang</a>
								@endif
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
	</section>

	<section class="ftco-section ftco-no-pt">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 heading-section text-center ftco-animate mb-5">
					<span class="subheading">Pilih Mobil</span>
					<h2 class="mb-2">Mobil Terkait</h2>
				</div>
			</div>
			{{-- @forelse ($mobil as $mobil) --}}
					{{-- @dd($mobil->foto) --}}
			<div class="row">
				<div class="col-md-4">
					<div class="car-wrap rounded ftco-animate">
						<div class="img rounded d-flex align-items-end"
							style="background-image: url('{{ asset('storage/uploads/mobil/' . $mobil->foto) }}');">
						</div>
						<div class="text">
							<h2 class="mb-0"><a href="car-single.html">{{$mobil->merk}}</a></h2>
							<div class="d-flex mb-3">
								<p class="price ml-auto">Rp. {{number_format($mobil->harga) }} <span>/day</span></p>
							</div>
							<p class="d-flex mb-0 d-block">
								<a href="{{ route('checkout',['mobil' => $mobil->slug]) }}" class="btn btn-primary py-2 mr-1">Pesan</a>
								 <a
									href="{{ route('front.details',$mobil->slug)}}" class="btn btn-secondary py-2 ml-1">Detail</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


@endsection