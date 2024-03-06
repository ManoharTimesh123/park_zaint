@extends('front.layouts.app')
@section('title')
ev-parking
@endsection
@section('content')
  <section class="hero-banner-sec">
    <div class="container">
      <div class="hero-banner-main">
        <img
          src="{{ Vite::asset('resources/images/ev-parking-bg.svg') }}"
          alt="hero-banner"
          class="img-fluid w-100"
        />
        <div class="hero-header-main">
          <h1 class="fw-normal text-end">We will charge your EV for you</h1>
          <p class="text-end font-italic text-primary">
            <em>Enough miles to get you back home!*</em>
          </p>
        </div>
        <ul class="list-group bg-dark divide-border-2">
          <li>Leave your car with us</li>
          <li>We will charge it for you</li>
          <li>Ready for your return</li>
        </ul>
      </div>
    </div>
  </section>
  {{-- meet-greet Section Start --}}
  @include('front.layouts.partials.meet-greet.meet-greet')
  {{-- meet-greet Section End --}}
  {{--Problem Solution Section Start--}}
  <section class="pro-sol-sec">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 col-md-6">
          <img
            src="{{ Vite::asset('resources/images/ev-charging-man.svg') }}"
            class="img-fluid"
            alt="ev-charging-man"
          />
        </div>
        <div class="col-12 col-md-6 mt-3 mt-md-0">
          <p>
            Here at Park Giant EV Parking, <strong>convenience</strong> and <strong>sustainability</strong>
            come together. We are happy to provide an electric vehicle owner-specific
            service that will make your trip hassle-free and environmentally friendly.
          </p>
          <p>
            With our EV Parking service, you can enjoy the benefits of <strong>seamless charging</strong>
            right at our parking facility. We follow manufacturer guidelines to ensure your vehicle receives
            <strong>optimal</strong> charging, all included in the price of your booking.
          </p>
          <p>
            You won't have to worry about finding a charging station or
            navigating challenging charging procedures on our way home.
          </p>
          <p>
            Park Giant recognises the value of sustainability and works 
            to give electric vehicle users a hassle-free experience.
            When you use our EV Parking service, you can rest easy knowing that your
            car will be <strong>fully charged and ready</strong> for your next adventure.
          </p>
        </div>
        <div class="col-12 text-center mt-5">
          <p>
            <strong>Book your EV Parking</strong> spot with Park Giant today and join us in embracing a greener future.
          </p>
          <p>
            Experience the <strong>convenience, reliability, and eco-friendliness</strong> 
            of our EV Parking service. Your journey starts here, with Park Giant.
          </p>
        </div>
      </div>
    </div>
  </section>
  {{--Problem Solution Section End --}}
  {{-- Booking Form Section Start --}}
  @include('front.layouts.partials.home.booking')
  {{-- Booking Form Section End --}}
  {{--  Why Park Giant Sec Start --}}
  @include('front.layouts.partials.home.why-parkgiant')
  {{--  Why Park Giant Sec End --}}
  {{-- FAQ  Sec Start --}}
  @include('front.layouts.partials.home.faq')
  {{-- FAQ  Sec End --}}
  {{-- Google Review Sec Start --}}
  @include('front.layouts.partials.home.review')
  {{-- Google Review Sec End --}}
  {{-- Instant Quote Sec Start --}}
  @include('front.layouts.partials.home.instantquote')
  {{-- Instant Quote Sec End --}}
@endsection
