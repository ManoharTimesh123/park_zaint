@extends('front.layouts.app')
@section('title')
Profile info
@endsection
@section('content')
  <section class="user-dashboard login-section">
    <div class="hero-banner">
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-10 m-auto py-0 py-sm-4 my-3">
            <h2 class="hero-banner-title text-white fst-italic text-capitalize">your profile</h2>
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
            <div class="col-12 col-lg-7 mb-4">
              <div class="profile-info-sec p-3 p-xl-5 border border-1 rounded-2 shadow-sm">
                <h5
                  class="profile-info-title text-start w-100 text-black fw-semibold fst-italic">
                  Your profile
                  <a href="#" data-bs-toggle="modal"data-bs-target="#edit-info">
                    <img src="{{ Vite::asset('resources/images/edit-circle-icon.svg')}}" alt="edit circle button" />
                  </a>
                </h5>
                <h5 class="fw-semibold fst-italic py-3 text-capitalize">booking summary</h5>
                <div class="row">
                  <div class="col-11 col-md-10 m-auto">
                    <div class="row mb-3">
                      <div class="col-12 col-md-5"><span class="fw-semibold">Driver name:</span></div>
                      <div class="offset-1 offset-sm-0 col-11 col-md-7">
                        <span class="fw-bold text-capitalize">john smith</span>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-md-5"><span class="fw-semibold">Email address:</span></div>
                      <div class="offset-1 offset-sm-0 col-11 col-md-7">
                        <span class="fw-bold">
                          <a class="text-secondary" href="mailto:John@smith.com">john@smith.com</a>
                        </span>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-md-5"><span class="fw-semibold">Mobile number:</span></div>
                      <div class="offset-1 offset-sm-0 col-11 col-md-7">
                        <span class="fw-bold">
                          <a class="text-secondary" href="tel:07958 965 565">07958 965 565</a>
                        </span>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-md-5"><span class="fw-semibold">Company name:</span></div>
                      <div class="offset-1 offset-sm-0 col-11 col-md-7">
                        <span class="fw-bold text-capitalize">ABC incorporates</span>
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
