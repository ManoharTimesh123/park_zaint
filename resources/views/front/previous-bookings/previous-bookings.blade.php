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
            <h2 class="hero-banner-title text-white fst-italic">Previous bookings</h2>
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
              <div class="profile-info-sec p-3 py-xl-5 border border-1 rounded-2 shadow-sm mb-5">
                <h5
                  class="profile-info-title text-start w-100 text-black fw-semibold fst-italic">
                  Your previous bookings with Park Giant:
                </h5>
                <div class="row border border-1">
                  <div class="col-12">
                    <h5 class="fw-semibold fst-italic py-3">Booking summary</h5>
                  </div>
                  <div class="col-11 col-md-10 m-auto">
                    <div class="row mb-3">
                      <div class="col-12 col-md-6"><label for=""class="fw-semibold">Booking reference:</label></div>
                      <div class="offset-1 offset-sm-0 col-11 col-md-6">
                        <div class="row">
                          <div class="col-6"><span class="fw-bold">PG-86465</span></div>
                          <div class="col-6">
                            <a href="/previous-bookings-summary" class="font-sm text-dark fst-italic">View booking</a>
                          </div>
                        </div>
                      </div>
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
                        <div class="row">
                          <div class="col-6">
                            <span class="fw-bold">16/8/23</span>
                          </div>
                          <div class="col-6">
                            <span class="d-inline-flex align-items-center fw-bold">
                              <img
                                src="{{ Vite::asset('resources/images/green-clock.svg') }}"
                                alt="green-clock-icon"
                                class="me-2 green-clock-icon"
                              />
                              13:15
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-md-6"><label for=""class="fw-semibold">Pick up date:</label></div>
                      <div class="offset-1 offset-sm-0 col-11 col-md-6">
                      <div class="row">
                          <div class="col-6">
                            <span class="fw-bold">23/8/23</span>
                          </div>
                          <div class="col-6">
                            <span class="d-inline-flex align-items-center fw-bold">
                              <img
                                src="{{ Vite::asset('resources/images/green-clock.svg') }}"
                                alt="green-clock-icon"
                                class="me-2 green-clock-icon"
                              />
                              07:00
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-md-6"><label for=""class="fw-semibold">Number of vehicles:</label></div>
                      <div class="offset-1 offset-sm-0 col-11 col-md-6"><span class="fw-bold">2</span></div>
                    </div>
                  </div>
                  <!-- Divider Start -->
                  <div class="row">
                    <div class="col-12 pb-4 py-2">
                      <label class="hr-divider"></label>
                    </div>
                  </div>
                  <!-- Divider End -->
                  <!-- New Booking Div Start -->
                  <div class="col-11 col-md-10 m-auto">
                    <div class="row mb-3">
                      <div class="col-12 col-md-6"><label for=""class="fw-semibold">Booking reference:</label></div>
                      <div class="offset-1 offset-sm-0 col-11 col-md-6">
                        <div class="row">
                          <div class="col-6"><span class="fw-bold">PG-86326</span></div>
                          <div class="col-6">
                            <a href="/previous-bookings-summary" class="font-sm text-dark fst-italic">View booking</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-md-6"><label for=""class="fw-semibold">Booking date:</label></div>
                      <div class="offset-1 offset-sm-0 col-11 col-md-6">
                        <span class="fw-bold">12/2/23</span>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-md-6"><label for=""class="fw-semibold">Drop off date:</label></div>
                      <div class="offset-1 offset-sm-0 col-11 col-md-6">
                        <div class="row">
                          <div class="col-6">
                            <span class="fw-bold">16/2/23</span>
                          </div>
                          <div class="col-6">
                            <span class="d-inline-flex align-items-center fw-bold">
                              <img
                                src="{{ Vite::asset('resources/images/green-clock.svg') }}"
                                alt="green-clock-icon"
                                class="me-2 green-clock-icon"
                              />
                              13:15
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-md-6"><label for=""class="fw-semibold">Pick up date:</label></div>
                      <div class="offset-1 offset-sm-0 col-11 col-md-6">
                      <div class="row">
                          <div class="col-6">
                            <span class="fw-bold">20/2/23</span>
                          </div>
                          <div class="col-6">
                            <span class="d-inline-flex align-items-center fw-bold">
                              <img
                                src="{{ Vite::asset('resources/images/green-clock.svg') }}"
                                alt="green-clock-icon"
                                class="me-2 green-clock-icon"
                              />
                              07:00
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-md-6"><label for=""class="fw-semibold">Number of vehicles:</label></div>
                      <div class="offset-1 offset-sm-0 col-11 col-md-6"><span class="fw-bold">3</span></div>
                    </div>
                  </div>
                  <!-- New Booking Div End -->
                  <!-- Divider Start -->
                  <div class="row">
                    <div class="col-12 pb-4 py-2">
                      <label class="hr-divider"></label>
                    </div>
                  </div>
                  <!-- Divider End -->
                  <!-- New Booking Div Start -->
                  <div class="col-11 col-md-10 m-auto">
                    <div class="row mb-3">
                      <div class="col-12 col-md-6"><label for=""class="fw-semibold">Booking reference:</label></div>
                      <div class="offset-1 offset-sm-0 col-11 col-md-6">
                        <div class="row">
                          <div class="col-6"><span class="fw-bold">PG-86646</span></div>
                          <div class="col-6">
                            <a href="/previous-bookings-summary" class="font-sm text-dark fst-italic">View booking</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-md-6"><label for=""class="fw-semibold">Booking date:</label></div>
                      <div class="offset-1 offset-sm-0 col-11 col-md-6">
                        <span class="fw-bold">12/4/23</span>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-md-6"><label for=""class="fw-semibold">Drop off date:</label></div>
                      <div class="offset-1 offset-sm-0 col-11 col-md-6">
                        <div class="row">
                          <div class="col-6">
                            <span class="fw-bold">16/5/23</span>
                          </div>
                          <div class="col-6">
                            <span class="d-inline-flex align-items-center fw-bold">
                              <img
                                src="{{ Vite::asset('resources/images/green-clock.svg') }}"
                                alt="green-clock-icon"
                                class="me-2 green-clock-icon"
                              />
                              13:15
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-md-6"><label for=""class="fw-semibold">Pick up date:</label></div>
                      <div class="offset-1 offset-sm-0 col-11 col-md-6">
                      <div class="row">
                          <div class="col-6">
                            <span class="fw-bold">20/5/23</span>
                          </div>
                          <div class="col-6">
                            <span class="d-inline-flex align-items-center fw-bold">
                              <img
                                src="{{ Vite::asset('resources/images/green-clock.svg') }}"
                                alt="green-clock-icon"
                                class="me-2 green-clock-icon"
                              />
                              07:00
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-md-6"><label for=""class="fw-semibold">Number of vehicles:</label></div>
                      <div class="offset-1 offset-sm-0 col-11 col-md-6"><span class="fw-bold">4</span></div>
                    </div>
                  </div>
                  <!-- New Booking Div End -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
