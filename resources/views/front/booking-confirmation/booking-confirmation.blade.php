@extends('front.layouts.app')
@section('title')
Booking confirmation
@endsection
@section('content')
  <Section class="user-dashboard">
    <div class="hero-banner">
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-10 m-auto py-0 py-sm-4 my-3">
            <h2 class="hero-banner-title text-white fst-italic">Booking confirmation</h2>
          </div>
        </div>
      </div>
    </div>
  </Section>
  <section class="checkout-sec pt-0">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-12 col-xl-10 m-auto">
          <div class="row">
            <div class="col-12 col-lg-7 col-xl-8">
              <div class="booking-info-div rounded-3 overflow-hidden border border-1 shadow-sm mb-4">
                <!-- Step Form Header Start  -->
                @include('front.layouts.partials.step-form-header')
                <!-- Step Form Header End  -->
                <div class="info-div m-3 p-3 my-5 border border-1 pb-4">
                    <p class="fst-italic info-div-title fw-semibold text-black mb-4">Booking confirmed</p>
                    <div class="row">
                      <div class="col-12 text-center mt-3">
                        <span class="fst-italic text-black">Thank you for choosing Park Giant!</span>
                        <h2 class="fst-italic text-black fw-normal my-3">Your booking is confirmed!</h2>
                        <h4 class="fst-italic fw-bold text-black">ref: PG-86465</h4>
                        <span class="fst-italic text-black my-4 d-block">
                          We've emailed you all the booking information and instructions.
                        </span>
                      </div>
                      <div class="col-10 col-lg-6 m-auto text-center">
                        <span class="fst-italic text-black my-4">
                          To view or amend your booking please login in to you account by clicking here
                        </span>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
            <div class="col-12 col-lg-5 col-xl-4">
              <!-- Booking Summary Start  -->
              @include('front.layouts.partials.booking-summary')
              <!-- Booking Summary End  -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
