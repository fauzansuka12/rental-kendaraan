@extends('front.main')
@section('title','Rental Mobil')
    
@section('content')
    <div class="hero-wrap ftco-degree-bg" style="background-image: url('{{asset('front/images/bg_1.jpg')}}');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
        <div class="col-lg-8 ftco-animate">
          <div class="text w-100 text-center mb-md-5 pb-md-5">
            <h1 class="mb-4">Fast &amp; Cara Cepat & Mudah Menyewa Mobil</h1>
            <p style="font-size: 18px;"></p>
            <a href="{{ route('login') }}"
              class="icon-wrap  d-flex align-items-center mt-4 justify-content-center">
              <div class="icon d-flex align-items-center justify-content-center">
                <span class="ion-ios-play"></span>
              </div>
              <div class="heading-title ml-5">
                <span>Muda Langkah-langkah login/register </span>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section ftco-no-pt bg-light">
    <div class="container">
      <div class="row no-gutters">
        <div class="col-md-12	featured-top">
          <div class="row justify-content-center no-gutters">
            <div class="col-md-10 d-flex align-items-center">
              <div class="services-wrap rounded-right w-100">
                <h3 class="heading-section text-center mb-4">Cara Lebih Baik untuk Menyewa Mobil Impian Anda</h3>
                <div class="row d-flex mb-4">
                  <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                    <div class="services w-100 text-center">
                      <div class="icon d-flex align-items-center justify-content-center"><span
                          class="flaticon-route"></span></div>
                      <div class="text w-100">
                        <h3 class="heading mb-2">Lokasi Tempat Armada</h3>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                    <div class="services w-100 text-center">
                      <div class="icon d-flex align-items-center justify-content-center"><span
                          class="flaticon-handshake"></span></div>
                      <div class="text w-100">
                        <h3 class="heading mb-2">Pilih Penawaran Terbaik</h3>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 d-flex justify-content-center align-self-stretch ftco-animate">
                    <div class="services w-100 text-center">
                      <div class="icon d-flex align-items-center justify-content-center"><span
                          class="flaticon-rent"></span></div>
                      <div class="text w-100 text-center mx-auto m-auto">
                        <h3 class="heading mb-2 text-center">Pesan Mobil Sewaan Anda</h3>
                      </div>
                    </div>
                  </div>
                </div>
                <p class="text-center mt-5"><a href="#"
                    class="btn text-center mx-auto m-auto ml-auto btn-primary py-3 px-4">Pesan Mobil Sempurna Anda</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>


  <section class="ftco-section ftco-no-pt bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          <span class="subheading"2>Apa yang kami tawarkan</span>
          <h2 class="mb-2">Kendaraan Unggulan</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="carousel-car owl-carousel">

        @foreach ($mobil as $data)
              
            <div class="item">
              <div class="car-wrap rounded ftco-animate">
                <div class="img rounded d-flex align-items-end" style="background-image: url('{{ asset('storage/uploads/mobil/' . $data->foto) }}">
                </div>
                <div class="text">
                  <h2 class="mb-0"><a href="#">{{ $data->merk }}</a></h2>
                  <div class="d-flex mb-3">
                    <p class="price ml-auto">{{ $data->harga }} <span>/day</span></p>
                  </div>
                  <p class="d-flex mb-0 d-block"><a href="{{route('checkout.show', ['mobil' => $data->slug])}}" class="btn btn-primary py-2 mr-1">Book now</a>
                    
                     <a
                      href="{{route('front.details', ['mobil' => $data->slug])}}" class="btn btn-secondary py-2 ml-1">Detail</a>
                    </p>
                      {{$data->slug}}
                </div>
              </div>
            </div>
            @endforeach
         
          </div>

        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section ftco-about">
    <div class="container">
      <div class="row no-gutters">
        <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center"
          style="background-image: url('{{ asset('front/images/about.jpg') }}');">
        </div>
        <div class="col-md-6 wrap-about ftco-animate">
          <div class="heading-section heading-section-white pl-md-5">
            <span class="subheading">HIIIIIII</span>
            <h2 class="mb-4">Welcome to RentalMobil</h2>

            <p></p>
            <p></p>
            <p><a href="#" class="btn btn-primary py-3 px-4">Cari Tentang Kendaraan</a></p>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection