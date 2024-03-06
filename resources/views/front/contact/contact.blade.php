@extends('front.layouts.app')
@section('title')
Contact us
@endsection
@section('content')
  <section class="hero-banner-sec">
    <div class="container">
      <div class="hero-banner-main">
        <img
          src="{{ Vite::asset('resources/images/contact-us-hero-banner.svg') }}"
          alt="hero-banner"
          class="img-fluid w-100"
        />
        <div class="hero-header-main">
          <h1 class="fw-normal text-end">Contact us</h1>
          <p class="text-end font-italic text-primary">
            <em>Park Giant - Heathrow's premier meet and greet service</em>
          </p>
        </div>
        <ul class="list-group bg-dark divide-border-2">
          <li>Fully insured drivers</li>
          <li>3 minute walk to check in</li>
          <li>Heathrow approved</li>
        </ul>
      </div>
    </div>
  </section>
  <section class="contact-us-sec">
    <div class="container">
      <div class="row mt-0 mt-md-5">
        <div class="col-12 col-lg-9 m-auto">
          <div class="row mt-0 mt-md-5">
            <div class="col-12 col-lg-6">
              <h2 class="contact-us-sec-title text-capitalize">contact us</h2>
                <ul class="list-group p-0 p-md-3">
                  <li class="list-group-item p-0">
                    <a
                      href="tel:02037771234"
                      class="anchor-list-item"
                    >
                    t: 020 3777 1234
                  </a>
                  </li>
                  <li class="list-group-item p-0">
                    <a
                      href="mailto:info@parkgiant.co.uk"
                      class="anchor-list-item text-decoration-none"
                    >
                      e: info@parkgiant.co.uk
                    </a>
                  </li>
                </ul>
              <div class="row">
                <div class="col-12 col-lg-11">
                  <div class="google-map-div mt-2 mt-md-5">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d9940.301487133702!2d-0.5174867!3d51.4751308!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4876710b6979b33f%3A0x7f03e879bd9540d5!2sPark%20Giant%20Meet%20%26%20Greet%20Parking%20Heathrow!5e0!3m2!1sen!2sin!4v1703490574025!5m2!1sen!2sin" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-6">
              <div class="contact-form mt-5 mt-lg-0">
                <form action="" class="get-in-touch-form">
                  <div class="row">
                    <div class="col-12 mb-3">
                      <input
                        type="text"
                        name="name"
                        id=""
                        placeholder="Name"
                        class="form-control shadow p-2 p-md-3 rounded-1"
                      />
                    </div>
                    <div class="col-6 col-lg-6 mb-3">
                      <input
                        type="email"
                        name="name"
                        placeholder="Email"
                        id=""
                        class="form-control shadow p-2 p-md-3 rounded-1"
                      />
                    </div>
                    <div class="col-6 col-lg-6 mb-3">
                      <input
                        type="tel"
                        name="name"
                        placeholder="Contact number"
                        id=""
                        class="form-control shadow p-2 p-md-3 rounded-1"
                      />
                    </div>
                    <div class="col-12">
                      <textarea
                        cols="30"
                        rows="10"
                        placeholder="Your Message"
                        name="Message"
                        id=""
                        class="form-control shadow p-2 p-md-3 rounded-1">
                      </textarea>
                    </div>
                    <div class="col-12 py-3">
                      <span>
                        <input type="checkbox" name="checkbox" class="me-2" id="">You agree to our
                        <a href="#" class="text-decoration-underline privacy-policy-text"> privacy policy</a>
                      </span>
                    </div>
                    <div class="col-12">
                      <button class="btn w-100 p-3 fs-6 shadow submit-btn" type="submit">Send</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  {{-- Booking Form Section Start --}}
  @include('front.layouts.partials.home.booking')
  {{-- Booking Form Section End --}}
  {{-- FAQ Section Start --}}
  @include('front.layouts.partials.home.faq')
  {{-- FAQ  Section End --}}
  {{-- Instant Quote Sec Start --}}
  @include('front.layouts.partials.home.instantquote')
<!-- Instant Quote Sec End  -->
@endsection
