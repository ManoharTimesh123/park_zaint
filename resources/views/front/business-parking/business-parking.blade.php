@extends('front.layouts.app')
@section('title')
  Business Parking
@endsection
@section('content')
  <section class="hero-banner-sec">
    <div class="container">
      <div class="hero-banner-main">
        <img
          src="{{ Vite::asset('resources/images/hero-banner-business-parking.svg') }}"
          alt="hero-banner"
          class="img-fluid w-100"
        />
        <div class="hero-header-main">
          <h1 class="fw-normal text-end">Corporate accounts</h1>
          <p class="text-end font-italic text-primary">
            <em>Apply for a corporate account for a convenient parking solution for you and your team</em>
          </p>
        </div>
        <ul class="list-group bg-dark divide-border-2">
          <li>Fast bookings</li>
          <li>Monthly payment options</li>
          <li>Account invoicing</li>
        </ul>
      </div>
    </div>
  </section>
  {{-- Feature Section Start --}}
  @include('front.layouts.partials.home.feature')
  {{-- Feature Section End --}}
  {{-- Problem Solution Section Start --}}
  <section class="pro-sol-sec pt-md-0">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 col-md-6">
          <img
            src="{{ Vite::asset('resources/images/valet-parking-man.svg') }}"
            class="img-fluid"
            alt="parking"
          />
        </div>
        <div class="col-12 col-md-6 mt-3 mt-md-0">
          <h2 class="pro-sol-title text-capitalize">
            corporate business parking with park giant: streamlined excellence
          </h2>
          <p>
            Welcome to Park Giant's Corporate Business Parking,
            where flawless efficiency and unmatched convenience are combined.
          </p>
          <p>
            We understand that managing business travel logistics for your valued staff requires <strong>
            precision and reliability</strong>. That's why we've designed our corporate account services to
            align with your company's needs, making the parking experience as effortless as possible.
          </p>
          <p>
            Opening a corporate account with Park Giant is a straightforward process,
            tailored to accommodate your business requirements.
          </p>
          <p>
            Our dedicated account management team ensures a smooth onboarding experience, providing
            you with a single point of contact for all your parking needs. From arranging bookings to managing
            invoices, we're here to <strong>simplify your business's travel arrangements.</strong>
          </p>
        </div>
        <div class="col-12 pt-3">
          <p>
            With our valet parking service, your staff can experience the <strong>luxury</strong> of
            arriving at the terminal, where our <strong>professional</strong> chauffeurs eagerly await to assist.
            No need to navigate parking lots or worry about finding a space. Our valet parking guarantees a
            <strong> seamless</strong> drop-off and pick-up process, allowing your team to focus on their journey.
          </p>
          <p>
              At Park Giant, we pride ourselves on delivering <strong>exceptional service</strong> to our
              corporate clients. Our commitment to excellence, combined with the ease of valet parking and the
              convenience of corporate accounts, ensures that your business can operate with the utmost
              <strong>efficiency and professionalism.</strong>
          </p>
          <p>
            Experience the <strong>ease</strong> of corporate business parking with Park Giant, and let us
            redefine the way your company manages travel logistics. Your business deserves nothing less than the
            finest service, and we're here to provide it. Join us in making business travel an effortless journey.
          </p>
        </div>
      </div>
    </div>
  </section>
  {{-- Problem Solution Section End --}}
  {{--Get in Touch Section Start--}}
  <section class="get-in-touch-sec p-2 p-md-5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 col-lg-5">
          <div class="row">
            <div class="col-12 col-lg-7 ms-auto p-0 pe-5">
              <h2 class="get-in-touch-sec-title text-white mb-3 mb-lg-o">Get in touch with the team to
                <span class="text-primary">open a corporate account</span>
              </h2>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-7 me-auto">
          <form action="" class="get-in-touch-form m-auto ms-md-0 me-md-auto">
            <div class="row">
              <div class="col-6 mb-3">
                <input
                  type="text"
                  name="name"
                  id=""
                  placeholder="Name"
                  class="form-control shadow p-2 p-md-3 rounded-1"
                />
              </div>
              <div class="col-6 mb-3">
                <input
                  type="text"
                  name="Position"
                  placeholder="Position"
                  class="form-control shadow p-2 p-md-3 rounded-1"
                  id=""
                >
              </div>
              <div class="col-6 mb-3">
                <input
                  type="text"
                  name="Company"
                  placeholder="Company"
                  class="form-control shadow p-2 p-md-3 rounded-1"
                  id=""
                >
              </div>
              <div class="col-6 mb-3">
                <input
                  type="number"
                  name="Team Size"
                  placeholder="Team Size"
                  class="form-control shadow p-2 p-md-3 rounded-1"
                  id=""
                >
              </div>
              <div class="col-6 mb-3">
                <input
                  type="email"
                  name="name"
                  placeholder="Email"
                  class="form-control shadow p-2 p-md-3 rounded-1"
                  id=""
                >
              </div>
              <div class="col-6 mb-3">
                <input
                  type="tel"
                  name="name"
                  placeholder="Contact number"
                  class="form-control shadow p-2 p-md-3 rounded-1"
                  id=""
                >
              </div>
              <div class="col-12">
                <textarea
                cols="30"
                rows="10"
                placeholder="Your Message"
                name=""
                class="form-control shadow p-2 p-md-3 rounded-1"
                id=""
                >
              </textarea>
              </div>
              <div class="col-12 py-3">
                <span class="text-white ">
                  <input
                    type="checkbox"
                    name="checkbox"
                    class=""
                    id=""
                  />
                  You agree to our
                  <a href="#" class="text-decoration-underline"> privacy policy</a>
                </span>
              </div>
              <div class="col-12">
                <button
                  class="btn bg-white w-100 p-3 h6 fw-bold shadow submit-btn text-capitalize"
                  type="submit">
                  send
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  {{--Get in Touch Section End--}}
  {{-- Booking Form Section Start --}}
  @include('front.layouts.partials.home.booking')
  {{-- Booking Form Section End --}}
  {{-- Work Section Start --}}
  @include('front.layouts.partials.home.work')
  {{-- Work Section End --}}
  {{-- FAQ Section End --}}
  @include('front.layouts.partials.home.faq')
  {{-- FAQ  Section End --}}
  {{-- Why Park Giant Sec Start --}}
  @include('front.layouts.partials.home.why-parkgiant')
  {{-- Why Park Giant Sec End --}}
  {{-- Google Review Sec Start --}}
  @include('front.layouts.partials.home.review')
  {{-- Google Review Sec End --}}
  <!-- Instant Quote Sec Start  -->
  @include('front.layouts.partials.home.instantquote')
  <!-- Instant Quote Sec End  -->
@endsection
