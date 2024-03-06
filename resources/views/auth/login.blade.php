@extends('front.layouts.app')
@section('title')
	Login
@endsection
@section('content')
<!--======== Account Login Page Start == -->
<section class="user-dashboard login-section">
  <div class="hero-banner">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-10 m-auto py-0 py-sm-4 my-3">
          <h2 class="hero-banner-title text-white fst-italic text-capitalize">{{ __('account login') }}</h2>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="login-form-div">
      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="row">
          <div class="col-11 col-sm-9 col-lg-5 m-auto m-auto mt-5 rounded-3 overflow-hidden border border-3">
            <div class="row">
              <div class="col-12 p-0">
                <div class="form-header py-3 py-md-5 mb-2 mb-md-5">
                  <h5 class="text-center text-black fst-italic fw-bold text-capitalize">{{ __('account login') }}</h5>
                </div>
              </div>
              <div class="col-12 col-lg-9 m-auto my-3 my-md-5">
                <input
                  type="email"
                  class="form-control py-3 mb-4 shadow fst-italic rounded-3 border border-2
                    @error('email') is-invalid @enderror"
                  id="email"
                  placeholder="Email"
                  name="email"
                  value="{{ old('email') }}" required autocomplete="email"
                >
                  @error('email')
                    <span class="invalid-feedback mt-n3 mb-3" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                <input id="password"
                  type="password"
                  class="form-control py-3 mb-4 shadow fst-italic rounded-3
                    border border-2 @error('password') is-invalid @enderror"
                  name="password" required
                  autocomplete="current-password"
                  placeholder="Password"
                >
                  @error('password')
                    <span class="invalid-feedback mt-n3 mb-3" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                <input
                  type="text"
                  class="form-control py-3 mb-4 shadow fst-italic rounded-3 border border-2"
                  id=""
                  placeholder="Booking reference"
                  name="bookingreference"
                >
                <button class="btn btn-primary w-100 p-3 shadow rounded-3 mb-5" type="submit">
                  <span class="w-100 text-center fst-italic text-capitalize">{{ __('login') }}</span>
                </button>
                <div class="text-center mb-3">
                  @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="fst-italic text-dark">
                      {{ __('Forgot your booking reference?') }}
                    </a>
                  @endif
              </div>
              <button
                type="button"
                class="border w-100 border-dark rounded-3 py-2 px-4 resend-mail-btn fst-italic gap-2 d-flex mb-4"
                data-bs-toggle="modal"
                data-bs-target="#resendmailModal"
              >
                <img src="{{ Vite::asset('resources/images/email-icon.svg') }}" alt="email-icon" />
                <span>Click here to resend your booking confirmation email</span>
              </button>
              <div class="text-center fw-light">
                <span>
                  If you have booked through one of our partners, please visit their site to access your booking
                </span>
              </div>
            </div>
          </div>
        </div>
      </form>
		</div>
  </div>
</section>
<!--======== Account Login Page End == -->
@endsection
