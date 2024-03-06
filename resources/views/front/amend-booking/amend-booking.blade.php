@extends('front.layouts.app')
@section('title')
Amend Booking
@endsection
@section('content')
  <section class="user-dashboard">
    <div class="hero-banner">
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-10 m-auto py-0 py-sm-4 my-3">
            <h2 class="hero-banner-title text-white fst-italic">Amend Booking</h2>
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
              <!-- amend-booking Div Start-->
              <div class="amend-booking profile-info-sec p-3 p-xl-5 border border-1 rounded-2 shadow-sm pb-3 pb-md-5">
                <div class="back-btn align-items-center justify-content-start gap-2 cursor-pointer mb-2">
                  <a href="/your-account">
                    <img src="{{ Vite::asset('resources/images/back-green-icon.svg') }}" alt="back icon">
                    <span class="fst-italic text-black">Back to current bookings</span>
                  </a>
                </div>
                <h5
                  class="profile-info-title text-start w-100 text-black fw-semibold fst-italic">
                  Your current bookings with Park Giant:
                </h5>
                <h5 class="fw-semibold fst-italic py-3">Booking summary</h5>
                <div class="row">
                  <div class="col-11 col-md-10 m-auto mb-3">
                    <div class="row mb-3">
                      <div class="col-12 col-md-6"><span class="fw-semibold">Booking reference:</span></div>
                      <div class="offset-1 offset-sm-0 col-11 col-md-6"><span class="fw-bold">PG-86465</span></div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-md-6"><span class="fw-semibold">Booking date:</span></div>
                      <div class="offset-1 offset-sm-0 col-11 col-md-6">
                        <span class="fw-bold">14/04/23</span>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-md-6"><span class="fw-semibold">Drop off date:</span></div>
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
                      <div class="col-12 col-md-6"><span class="fw-semibold">Pick up date:</span></div>
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
                      <div class="col-12 col-md-6"><span class="fw-semibold">Number of vehicles:</span></div>
                      <div class="offset-1 offset-sm-0 col-11 col-md-6"><span class="fw-bold">2</span></div>
                    </div>
                    <div class="row mt-4">
                      <div class="col-md-9 m-auto">
                        <span class="email-us text-center font-sm w-100 d-block text-dark fst-italic">
                          To amend your booking date, time, or to cancel your booking please email us:
                          <a href="mailto:contact@parkgiant.co.uk" class="text-dark">contact@parkgiant.co.uk</a>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Divider Start -->
                <div class="row">
                  <div class="col-12 py-2">
                    <span class="hr-divider"></span>
                  </div>
                </div>
                <!-- Divider End -->
                <!-- Pricing Div Start -->
                <h5 class="fw-semibold fst-italic py-3">Pricing</h5>
                <div class="row">
                  <div class="col-11 col-md-10 m-auto">
                    <div class="row mb-3">
                      <div class="col-12 col-md-6"><span class="fw-semibold">Parking:</span></div>
                      <div class="offset-1 offset-sm-0 col-11 col-md-6"><span class="fw-bold">£85.99</span></div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-md-6"><span class="fw-semibold">Valet:</span></div>
                      <div class="offset-1 offset-sm-0 col-11 col-md-6"><span class="fw-bold">£95.00</span></div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-md-6"><span class="fw-semibold">Cancellation waiver:</span></div>
                      <div class="offset-1 offset-sm-0 col-11 col-md-6"><span class="fw-bold">£10.00</span></div>
                    </div>
                    <div class="row my-3">
                      <div class="col-12 col-md-6"><h3 class="fw-semibold">Total:</h3></div>
                      <div class="offset-1 offset-sm-0 col-11 col-md-6">
                        <h3 class="fw-bold text-primary">£190.99</h3>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Pricing Div End -->
                <!-- Divider Start -->
                <div class="row">
                  <div class="col-12 py-2">
                    <span class="hr-divider"></span>
                  </div>
                </div>
                <!-- Divider End -->
                <!-- Your details Div Start -->
                <h5 class="fw-semibold fst-italic py-3">Your details
                  <a href="#" data-bs-toggle="modal"data-bs-target="#edit-info">
                    <img src="{{ Vite::asset('resources/images/edit-circle-icon.svg')}}" alt="edit circle button" />
                  </a>
                </h5>
                <div class="row">
                  <div class="col-11 col-md-10 m-auto">
                    <div class="row mb-3">
                      <div class="col-12 col-md-6"><span class="fw-semibold">Name:</span></div>
                      <div class="offset-1 offset-sm-0 col-11 col-md-6"><span class="fw-bold">Harsh Desai</span></div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-md-6"><span class="fw-semibold">Email address:</span></div>
                      <div class="offset-1 offset-sm-0 col-11 col-md-6">
                        <span class="fw-bold">
                          <a
                            class="text-secondary email"
                            href="mailto:hd@webologymarketing.co.uk"
                          >
                            hd@webologymarketing.co.uk
                          </a>
                        </span>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-md-6"><span class="fw-semibold">Mobile number:</span></div>
                      <div class="offset-1 offset-sm-0 col-11 col-md-6">
                        <span class="fw-bold">
                          <a class="text-secondary" href="tel:07596 122 344">07596 122 344</a>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Your details Div End -->
                <!-- Divider Start -->
                <div class="row">
                  <div class="col-12 py-2">
                    <span class="hr-divider"></span>
                  </div>
                </div>
                <!-- Divider End -->
                <!-- Vehicle details Div Start -->
                <h5 class="fw-semibold fst-italic py-3">Vehicle details
                  <a href="#" data-bs-toggle="modal" data-bs-target="#edit-info">
                    <img src="{{ Vite::asset('resources/images/edit-circle-icon.svg')}}" alt="edit circle button" />
                  </a>
                </h5>
                <div class="row">
                  <div class="col-11 col-md-10 m-auto">
                    <div class="row mb-3">
                      <div class="col-12 col-md-6"><span class="fw-semibold">Make:</span></div>
                      <div class="offset-1 offset-sm-0 col-11 col-md-6"><span class="fw-bold">BMW</span></div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-md-6"><span class="fw-semibold">Model:</span></div>
                      <div class="offset-1 offset-sm-0 col-11 col-md-6"><span class="fw-bold">520d M sport</span></div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-md-6"><span class="fw-semibold">Colour:</span></div>
                      <div class="offset-1 offset-sm-0 col-11 col-md-6"><span class="fw-bold">Black</span></div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-md-6"><span class="fw-semibold">Registration:</span></div>
                      <div class="offset-1 offset-sm-0 col-11 col-md-6"><span class="fw-bold">RE60 DJF</span></div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-md-6"><span class="fw-semibold">Number of passengers:</span></div>
                      <div class="offset-1 offset-sm-0 col-11 col-md-6"><span class="fw-bold">4</span></div>
                    </div>
                  </div>
                </div>
                <!-- Vehicle details Div End -->
                 <!-- Divider Start -->
                 <div class="row">
                  <div class="col-12 py-2">
                    <span class="hr-divider"></span>
                  </div>
                </div>
                <!-- Divider End -->
                 <!-- Vehicle details Div Start -->
                 <h5 class="fw-semibold fst-italic py-3">Flight details
                  <a href="#" data-bs-toggle="modal"data-bs-target="#edit-info">
                    <img src="{{ Vite::asset('resources/images/edit-circle-icon.svg')}}" alt="edit circle button" />
                  </a>
                 </h5>
                <div class="row">
                  <div class="col-11 col-md-10 m-auto">
                    <div class="row mb-3">
                      <div class="col-12 col-md-6">
                        <span class="fw-semibold">Outbound flight number:</span>
                      </div>
                      <div class="offset-1 offset-sm-0 col-11 col-md-6"><span class="fw-bold">EK3</span></div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-md-6"><span class="fw-semibold">Departure terminal:</span></div>
                      <div class="offset-1 offset-sm-0 col-11 col-md-6"><span class="fw-bold">3</span></div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-md-6"><span class="fw-semibold">Inbound flight number:</span></div>
                      <div class="offset-1 offset-sm-0 col-11 col-md-6"><span class="fw-bold">EK 8</span></div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-md-6"><span class="fw-semibold">Arrival terminal:</span></div>
                      <div class="offset-1 offset-sm-0 col-11 col-md-6"><span class="fw-bold">3</span></div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-md-6"><span class="fw-semibold">Number of passengers:</span></div>
                      <div class="offset-1 offset-sm-0 col-11 col-md-6"><span class="fw-bold">4</span></div>
                    </div>
                  </div>
                  <div class="col-12 col-md-10 mx-auto my-2 my-md-5">
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
                <!-- Vehicle details Div End -->
              </div>
              <!-- amend-booking Div End-->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
