@extends('front.layouts.app')
@section('title')
Your Account
@endsection
@section('content')
  <section class="user-dashboard">
    <div class="hero-banner">
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-10 m-auto py-0 py-sm-4 my-3">
            <h2 class="hero-banner-title text-white fst-italic text-capitalize">your account</h2>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="profile-sec">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-9 m-auto">
          <div class="row gap-3">
            <div class="col-12 col-lg-4">
             @include('front.layouts.partials.user-profile.account-sidebar')
            </div>
            <div class="col-12 col-lg-7">
              <div class="profile-info-sec p-3 p-xl-5 border border-1 rounded-2 shadow-sm mb-5">
                <h5
                  class="profile-info-title text-start w-100 text-black fw-semibold fst-italic">
                  Your current bookings with Park Giant:
                </h5>
                <div class="row">
                  <div class="col-11 col-md-10 m-auto mt-3">
                    <div class="row mb-3">
                      <div class="col-12 col-md-6"><label for=""class="fw-semibold">Booking reference:</label></div>
                      <div class="offset-1 offset-sm-0 col-11 col-md-6"><span class="fw-bold">PG-86465</span></div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-md-6"><label for=""class="fw-semibold">Booking date:</label></div>
                      <div class="offset-1 offset-sm-0 col-11 col-md-6">
                        <span class="fw-bold">14/04/23</span>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-md-6"><label for=""class="fw-semibold">Drop off date:</label></div>
                      <div class="offset-1 offset-sm-0 col-11 col-md-6">
                        <span class="fw-bold d-inline-flex align-items-center justify-content-between gap-3">
                          <span>
                            16/8/23
                          </span>
                          <span class="d-inline-flex align-items-center">
                          <img
                              src="{{ Vite::asset('resources/images/green-clock.svg') }}"
                              alt="green-clock-icon"
                              class="me-2 green-clock-icon"
                          />
                          13:15</span>
                        </span>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-md-6"><label for=""class="fw-semibold">Pick up date:</label></div>
                      <div class="offset-1 offset-sm-0 col-11 col-md-6">
                        <span class="fw-bold d-inline-flex align-items-center justify-content-between gap-3">
                          <span>
                            23/8/23
                          </span>
                          <span class="d-inline-flex align-items-center">
                          <img
                              src="{{ Vite::asset('resources/images/green-clock.svg') }}"
                              alt="green-clock-icon"
                              class="me-2 green-clock-icon"
                           />
                          07:00</span>
                        </span>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-md-6"><label for=""class="fw-semibold">Number of vehicles:</label></div>
                      <div class="offset-1 offset-sm-0 col-11 col-md-6"><span class="fw-bold">2</span></div>
                    </div>
                    <div class="row mt-5">
                      <div class="col-12 text-center mb-4">
                        <a href="/amend-booking"
                          class="border border-0 w-100 edit-info fst-italic text-dark">
                          <span>Click here to view or edit this booking</span>
                        </a>
                      </div>
                      <div class="col-12">
                        <button
                          type="button"
                          class="border w-100 border-dark rounded-3 py-2 px-4 resend-mail-btn gap-2 d-flex mb-4"
                          data-bs-toggle="modal"
                          data-bs-target="#resendmailModal"
                        >
                          <img src="{{ Vite::asset('resources/images/email-icon.svg') }}" alt="email-icon">
                          <span>Click here to resend your booking confirmation email</span>
                        </button>
                      </div>
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
