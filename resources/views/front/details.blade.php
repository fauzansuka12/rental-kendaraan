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
							<h2>{{ $mobil->merk }}</h2>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md d-flex align-self-stretch ftco-animate">
					<div class="media block-6 services">
						<div class="media-body py-md-4">
							<div class="d-flex mb-3 align-items-center">
								<div class="icon d-flex align-items-center justify-content-center"><span
										class="flaticon-dashboard"></span></div>
								<div class="text">
									<h3 class="heading mb-0 pl-3">
										Mileage
										<span>40,000</span>
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
			</div>
			<div class="row">
				<div class="col-md-12 pills">
					<div class="bd-example bd-example-tabs">
						<div class="d-flex justify-content-center">
							<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

								<li class="nav-item">
									<a class="nav-link active" id="pills-manufacturer-tab" data-toggle="pill"
										href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer"
										aria-expanded="true">Description</a>
								</li>
							</ul>
						</div>

						<div class="tab-content" id="pills-tabContent">
							<div class="tab-pane fade show active" id="pills-manufacturer" role="tabpanel"
								aria-labelledby="pills-manufacturer-tab">
								<p>Even the all-powerful Pointing has no control about the blind texts it is an almost
									unorthographic life One day however a small line of blind text by the name of Lorem
									Ipsum decided to leave for the far World of Grammar.</p>
								<p>When she reached the first hills of the Italic Mountains, she had a last view back on
									the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the
									subline of her own road, the Line Lane. Pityful a rethoric question ran over her
									cheek, then she continued her way.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section mt-5 bg-light">
		<div class="container">
			<div class="row no-gutters">
				<div class="col-md-12	featured-top">
					<div class="row justify-content-center no-gutters">
						<div class="col-md-10 d-flex align-items-center">
							<div class="services-wrap rounded-right w-100">
								<h3 class="heading-section text-center mb-4">What are you waiting for?</h3>
								<div class="row d-flex mb-4">
									<div class="col-md-4 d-flex align-self-stretch ftco-animate">
										<div class="services w-100 text-center">
											<div class="icon d-flex align-items-center justify-content-center"><span
													class="flaticon-route"></span></div>
											<div class="text w-100">
												<h3 class="heading mb-2">Choose Your Pickup Location</h3>
											</div>
										</div>
									</div>
									<div class="col-md-4 d-flex align-self-stretch ftco-animate">
										<div class="services w-100 text-center">
											<div class="icon d-flex align-items-center justify-content-center"><span
													class="flaticon-handshake"></span></div>
											<div class="text w-100">
												<h3 class="heading mb-2">Select the Best Deal</h3>
											</div>
										</div>
									</div>
									<div class="col-md-4 d-flex justify-content-center align-self-stretch ftco-animate">
										<div class="services w-100 text-center">
											<div class="icon d-flex align-items-center justify-content-center"><span
													class="flaticon-rent"></span></div>
											<div class="text w-100 text-center mx-auto m-auto">
												<h3 class="heading mb-2 text-center">Reserve Your Rental Car</h3>
											</div>
										</div>
									</div>
								</div>
								{{-- <p class="text-center mt-5"><a href="{{ route('checkout.process') }}" --}}
									
										class="btn text-center mx-auto m-auto ml-auto btn-primary py-3 px-4">Book
										Now</a>
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
					<span class="subheading">Choose Car</span>
					<h2 class="mb-2">Related Cars</h2>
				</div>
			</div>
			{{-- @forelse ($mobil as $mobil) --}}
					{{-- @dd($mobil->foto) --}}
			<div class="row">
				<div class="col-md-4">
					<div class="car-wrap rounded ftco-animate">
						<div class="img rounded d-flex align-items-end"
							style="background-image: url('{{ asset('storage/uploads/mobil/' . $mobil->foto) }}')}}');">
						</div>
						<div class="text">
							<h2 class="mb-0"><a href="car-single.html">{{$mobil->merk}}</a></h2>
							<div class="d-flex mb-3">
								<p class="price ml-auto">{{ $mobil->harga }} <span>/day</span></p>
							</div>
							<p class="d-flex mb-0 d-block">
								{{-- <a href="{{ route('checkout.process',) }}" class="btn btn-primary py-2 mr-1">Book now</a> --}}
								 <a
									href="{{ route('front.details',$mobil->slug)}}" class="btn btn-secondary py-2 ml-1">Details</a>
							</p>
						</div>
					</div>
				</div>
				{{-- <div class="col-md-4">
					<div class="car-wrap rounded ftco-animate">
						<div class="img rounded d-flex align-items-end"
							style="background-image: url(images/car-2.jpg')}}');">
						</div>
						<div class="text">
							<h2 class="mb-0"><a href="car-single.html">Range Rover</a></h2>
							<div class="d-flex mb-3">
								<p class="price ml-auto">$500 <span>/day</span></p>
							</div>
							<p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary py-2 mr-1">Book now</a> <a
									href="car-single.html" class="btn btn-secondary py-2 ml-1">Details</a></p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="car-wrap rounded ftco-animate">
						<div class="img rounded d-flex align-items-end"
							style="background-image: url({{asset('front/images/car-3.jpg')}}');">
						</div>
						<div class="text">
							<h2 class="mb-0"><a href="car-single.html">Mercedes Grand Sedan</a></h2>
							<div class="d-flex mb-3">
								<p class="price ml-auto">$500 <span>/day</span></p>
							</div>
							<p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary py-2 mr-1">Book now</a> <a
									href="car-single.html" class="btn btn-secondary py-2 ml-1">Details</a></p>
						</div>
					</div>
				</div> --}}
			</div>
						{{-- @empty
					
			@endforelse --}}

		</div>
	</section>


	<footer class="ftco-footer ftco-bg-dark ftco-section">
		<div class="container">
			<div class="row mb-5">
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2"><a href="#" class="logo">Car<span>book</span></a></h2>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
							there live the blind texts.</p>
						<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
							<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4 ml-md-5">
						<h2 class="ftco-heading-2">Information</h2>
						<ul class="list-unstyled">
							<li><a href="#" class="py-2 d-block">About</a></li>
							<li><a href="#" class="py-2 d-block">Services</a></li>
							<li><a href="#" class="py-2 d-block">Term and Conditions</a></li>
							<li><a href="#" class="py-2 d-block">Best Price Guarantee</a></li>
							<li><a href="#" class="py-2 d-block">Privacy &amp; Cookies Policy</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Customer Support</h2>
						<ul class="list-unstyled">
							<li><a href="#" class="py-2 d-block">FAQ</a></li>
							<li><a href="#" class="py-2 d-block">Payment Option</a></li>
							<li><a href="#" class="py-2 d-block">Booking Tips</a></li>
							<li><a href="#" class="py-2 d-block">How it works</a></li>
							<li><a href="#" class="py-2 d-block">Contact Us</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Have a Questions?</h2>
						<div class="block-23 mb-3">
							<ul>
								<li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain
										View, San Francisco, California, USA</span></li>
								<li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929
											210</span></a></li>
								<li><a href="#"><span class="icon icon-envelope"></span><span
											class="text">info@yourdomain.com</span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">

					<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;
						<script>document.write(new Date().getFullYear());</script> All rights reserved | This template
						is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a
							href="https://colorlib.com" target="_blank">Colorlib</a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</p>
				</div>
			</div>
		</div>
	</footer>


@endsection