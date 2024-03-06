@extends('front.layouts.app')
@section('title')
  Home Page
@endsection
@section('content')
  <section class="hero-banner-sec">
    <div class="container">
      <div class="hero-banner-main">
        <img src="{{ Vite::asset('resources/images/home_hero_banner.png') }}" alt="hero-banner"
          class="img-fluid w-100" />
        <div class="hero-header-main">
          <h1 class="fw-normal text-end">Stress free airport parking</h1>
          <p class="text-end font-italic text-primary">
            <em>With meet and greet parking you can trust</em>
          </p>
        </div>
        <ul class="list-group bg-dark divide-border-2">
          <li>Fully insured drivers</li>
          <li>Fully insured drivers</li>
          <li>Fully insured drivers</li>
        </ul>
      </div>
    </div>
  </section>
  {{-- Feature Section Start --}}
  @include('front.layouts.partials.home.feature')
  {{-- Feature Section End --}}
  {{-- Booking Form Section Start --}}
  @include('front.layouts.partials.home.booking')
  {{-- Booking Form Section End --}}
  {{-- Problem Solution Section Start --}}
  <section class="pro-sol-sec">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 col-md-6">
          <img src="{{ Vite::asset('resources/images/valet-parking.png') }}" class="img-fluid" alt="parking" />
        </div>
        <div class="col-12 col-md-6 mt-3 mt-md-0">
          <h2 class="pro-sol-title">Problem / solution</h2>
          <p>
            <strong>Talk about your main problem </strong>
            Lorem ipsum dolor sit amet consectetur. Tellus massa feugiat enim etiam. Sollicitudin faucibus volutpat massa est. Non gravida sed morbi lorem ut nunc ut. Pharetra pellentesque fames turpis non amet amet laoreet sagittis.
          </p>
          <p>
            <strong>Agitate with examples </strong>
            Lorem ipsum dolor sit amet consectetur. Tellus massa feugiat enim etiam. Sollicitudin faucibus volutpat massa est. Non gravida sed morbi lorem ut nunc ut.Pharetra pellentesque fames turpis non amet amet laoreet sagittis.
          </p>
          <p>
            <strong>Introduce your solution </strong>
            Lorem ipsum dolor sit amet consectetur. Tellus massa feugiat enim etiam. Sollicitudin faucibus volutpat massa est. Non gravida sed morbi lorem ut nunc ut. Pharetra pellentesque fames turpis non amet amet laoreet sagittis.
          </p>
        </div>
      </div>
    </div>
  </section>
  {{-- Problem Solution Section End --}}
  {{-- Work Section Start --}}
  @include('front.layouts.partials.home.work')
  {{-- Work Section End --}}
  <!-- Google Review Sec Start -->
  @include('front.layouts.partials.home.review')
  <!-- Google Review Sec End -->
  {{-- Parking Options Sec Start --}}
  <section class="parking-opt-sec">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h2 class="work-sec-title parking-opt-title">Parking options</h2>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 my-3 my-md-0">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Flexible parking</h5>
              <ul class="list-group text-start">
                <li class="list-group-item">Most popular option</li>
                <li class="list-group-item">Free amendments</li>
                <li class="list-group-item">Short walk from check-in</li>
                <li class="list-group-item">Stress free</li>
              </ul>
            </div>
            <div class="card-footer">
              <a href="#" class="card-link">Book now</a>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 my-3 my-md-0">
          <div class="card bg-primary">
            <div class="card-body">
              <h5 class="card-title primary-title">EV parking</h5>
              <ul class="list-group text-start">
                <li class="list-group-item">Most popular option</li>
                <li class="list-group-item">Free amendments</li>
                <li class="list-group-item">Short walk from check-in</li>
                <li class="list-group-item">Stress free</li>
              </ul>
            </div>
            <div class="card-footer">
              <a href="#" class="card-link">Book now</a>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 my-3 my-md-0">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Extras</h5>
              <ul class="list-group text-start">
                <li class="list-group-item">Professional valet</li>
                <li class="list-group-item">Cancellation waiver</li>
              </ul>
            </div>
            <div class="card-footer">
              <a href="#" class="card-link">Book now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  {{-- Parking Options Sec End --}}
  <!-- ====== Why Park Giant Sec Start ===== -->
  @include('front.layouts.partials.home.why-parkgiant')
  <!-- ====== Why Park Giant Sec End ===== -->
  <!-- FAQ  Sec Start -->
  @include('front.layouts.partials.home.faq')
  <!-- FAQ  Sec End -->
  <!-- Instant Quote Sec Start  -->
  @include('front.layouts.partials.home.instantquote')
  <!-- Instant Quote Sec End  -->
@endsection
