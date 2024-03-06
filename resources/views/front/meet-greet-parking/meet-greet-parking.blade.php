@extends('front.layouts.app')
@section('title')
what-parking
@endsection
@section('content')
  <section class="hero-banner-sec">
    <div class="container">
      <div class="hero-banner-main">
        <img
          src="{{ Vite::asset('resources/images/meet-gree-hero-banner.svg') }}"
          alt="hero-banner"
          class="img-fluid w-100"
        />
        <div class="hero-header-main">
          <h1 class="fw-normal text-end">What is Meet & Greet?</h1>
          <p class="text-end font-italic text-primary">
            <em>Save time and money with Park Giant</em>
          </p>
        </div>
        <ul class="list-group bg-dark divide-border-2">
          <li>Drive to your terminal</li>
          <li>Leave your car with us</li>
          <li>Car waiting on arrival</li>
        </ul>
      </div>
    </div>
  </section>
  {{-- meet-greet Section Start --}}
  @include('front.layouts.partials.meet-greet.meet-greet')
  {{-- meet-greet Section End --}}
  {{-- meet-greet inner Section Start --}}
  <section>
    <div class="container-fluid meet-greet-inner-sec px-2 px-md-5 py-2 py-md-4">
      <div class="row">
        <div class="col-12 col-lg-11 m-auto">
          <p class="text-white meet-greet-inner-sec-title text-center mb-0">
            Say goodbye to the hassles of long stay parking and
            <span class="text-primary">
              hello to a seamless and stress-free experience.
            </span>
          </p>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row pt-4">
        <div class="col-12 pt-3">
          <p>The procedure for meet and greet parking is <strong>straightforward</strong>: 
            you just drive right up to the terminal car park, where one of our courteous, experienced, 
            and <strong>fully insured drivers</strong> is waiting for you. We bring the parking to you, 
            so there's no need to negotiate crowded parking lots or shuttle buses.
          </p>
          <p>Our thoughtful driver takes care of everything as you exit your vehicle. 
            They will help you unload your bags and make sure your car is handled safely. 
            Our committed team member will <strong>safely store your vehicle</strong> in our monitored, 
            well-maintained parking facility, which is situated only three miles from the airport, 
            while you continue with check-in.
          </p>
          <p>Just give us a call when you get back, and we'll have your
            <strong>car returned to the terminal</strong> as soon as you've collected your bags.
          </p>
        </div>
      </div>
    </div>
    <div class="container-fluid meet-greet-inner-sec efficiency-banner px-2 px-md-5 py-2 py-md-4">
      <div class="row">
        <div class="col-12 col-lg-11 m-auto ">
          <p class="text-white meet-greet-inner-sec-title text-center mb-0">
            No lengthy walks, no searching for your car ...
            <span class="text-primary"> 
              just seamless convenience and efficiency.
            </span>
          </p>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row pt-4">
        <div class="col-12 pt-3">
          <p>
            Now let's discuss the <strong>advantages</strong>of meet and greet parking over long-term parking. 
            Meet & greet parking gives the utmost <strong>convenience</strong> of dropping off and picking 
            up your vehicle directly at the terminal, in contrast to regular extended stay parking, 
            where you may need to park distance from the terminal and rely on shuttle services. As a result, 
            there will be <strong>no time lost</strong>, undue worry, or extra work on your behalf.
          </p>
          <p>
            Additionally, with our meet and greet service, you can have <strong>peace of mind</strong> 
            knowing that your vehicle is in safe hands. Our parking facilities 
            are <strong>Park Mark accredited</strong> and have cutting-edge security 
            features like <strong>24-hour surveillance</strong>, safe fencing, and full insurance coverage. 
            We take seriously the duty of protecting your car, giving you complete peace of 
            mind as you concentrate on your journey.</p>
          <p>
            At Park Giant, we recognise that every second counts and work to make your time in the 
            airport as easy and quick as we can. So why choose the hassles of long-term parking when meet & greet 
            parking offers such <strong> unrivalled comfort and security </strong> instead?
          </p>
          <p>
            <strong>Try Park Giant's meet and greet parking service</strong> 
            to see the difference for yourself, and let us take the stress out of your travel.</p>
        </div>
      </div>
    </div>
    <div class="container-fluid meet-greet-inner-sec journey-begin-banner px-2 px-md-5 py-2 py-md-4">
      <div class="row">
        <div class="col-12 col-lg-11 m-auto ">
          <p class="text-white meet-greet-inner-sec-title text-center mb-0">
            Get ready for a journey that begins and ends with
            <span class="text-primary"> simplicity, efficiency, and a touch of luxury.</span>
          </p>
        </div>
      </div>
    </div>
  </section>
  {{-- meet-greet inner Section End --}}
  {{--  Why Park Giant Sec Start --}}
  @include('front.layouts.partials.home.why-parkgiant')
  {{--  Why Park Giant Sec End --}}
  {{-- Booking Form Section Start --}}
  @include('front.layouts.partials.home.booking')
  {{-- Booking Form Section End --}}
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
