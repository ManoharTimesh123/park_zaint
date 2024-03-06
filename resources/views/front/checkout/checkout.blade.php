@extends('front.layouts.app')
@section('title')
Checkout-Your parking quote
@endsection
@section('content')
  <section class="user-dashboard">
    <div class="hero-banner">
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-10 m-auto py-0 py-sm-4 my-3">
            <h2 class="hero-banner-title text-white fst-italic">Your parking quote</h2>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="checkout-sec pt-0">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-11 col-xl-10 m-auto mt-0">
          <div class="features">
            <ul class="features-list d-flex align-items-center  justify-content-center flex-wrap gap-1 gap-sm-3">
              <li class="fw-normal ps-3 ps-md-4">Heathrow approved</li>
              <li class="fw-normal ps-3 ps-md-4">Park mark accredited</li>
              <li class="fw-normal ps-3 ps-md-4">Fully insured drivers</li>
              <li class="fw-normal ps-3 ps-md-4">Corporate accounts</li>
              <li class="fw-normal ps-3 ps-md-4">Car park 3 miles from Heathrow</li>
              <li class="fw-normal ps-3 ps-md-4">Price match*</li>
              <li class="fw-normal ps-3 ps-md-4">Tesla super charging*</li>
              <li class="fw-normal ps-3 ps-md-4">EV charging available*</li>
            </ul>
            <span class="float-end font-sm">*See FAQs</span>
          </div>
        </div>
        <div class="col-12 col-lg-12 col-xl-10 m-auto mt-3 mt-lg-5">
          <div class="row">
            <div class="col-12 col-lg-7 col-xl-8 order-2 order-sm-1">
              <div class="booking-info-div rounded-3 overflow-hidden border border-1 shadow-sm">
                <!-- Step Form Header Start  -->
                @include('front.layouts.partials.checkout.step-form-header')
                <!-- Step Form Header End  -->
                <form action="">
                  <div class="info-div m-2 m-md-3 p-3 mt-5 border border-1 pb-4">
                    <p class="fst-italic info-div-title fw-semibold text-black mb-4 w-100">
                      Select your parking product
                    </p>
                    <div class="row">
                      <div class="col-12 col-md-11 col-lg-11 col-xl-10 ms-auto mt-3">
                        <div class="row">
                          <div class="col-12 col-md-8">
                            <h6 class="fw-semibold font-md text-black">
                              Flexible parking
                              <span>
                                <a
                                  href="#"
                                  class="font-sm text-black fw-light text-decoration-underline fst-italic"
                                  data-bs-toggle="modal"
                                  data-bs-target="#more-info"
                                >more info
                                </a>
                              </span>
                            </h6>
                            <ul class="product-inner-features ps-0">
                              <li class="walk font-sm text-black">
                                Less than 3 minutes walk from the terminal
                              </li>
                              <li class="convenience font-sm text-black ">Ultimate convenience</li>
                              <li class="parking font-sm text-black ">Our most popular parking option</li>
                              <li class="airport font-sm text-black ">Includes airport parking fee</li>
                              <li class="font-sm text-black">Hassle free</li>
                              <li class="font-sm text-black">Free amendments*</li>
                              <li class="font-sm text-black">Free cancellation*</li>
                            </ul>
                          </div>
                          <div class="col-12 col-md-3">
                            <div
                              class="d-flex flex-md-wrap
                                align-items-center flex-row
                                flex-md-column justify-content-between h-100 gap-5"
                              >
                              <img
                                src="{{ Vite::asset('resources/images/park-giant-logo.svg') }}"
                                alt="park giant logo"
                                class="w-100"
                              />
                              <div class="price-div w-100">
                                <div class="d-flex align-items-center  justify-content-between mb-1">
                                  <span class="fst-italic fw-bold">Price</span>
                                  <span class="fst-italic fw-bold">£95.00</span>
                                </div>
                                <button
                                  type="button"
                                  class="bg-primary font-mob-md
                                    p-1 p-md-2 border-0 w-100
                                    rounded-0 fst-italic fw-semibold text-white">
                                  add to quote
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-11 py-3 pb-4">
                            <div class="hr-grey-divider"></div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12 col-md-8">
                            <h6 class="fw-semibold font-md text-black">EV parking
                              <span>
                                <a
                                  href="#"
                                  class="font-sm text-black fw-light text-decoration-underline fst-italic"
                                  data-bs-toggle="modal"
                                  data-bs-target="#more-info"
                                >
                                  more info
                                </a>
                              </span>
                            </h6>
                            <ul class="product-inner-features ps-0">
                              <li class="charging-point font-sm text-black">Vehicle charging included</li>
                              <li class="walk font-sm text-black">Less than 3 minutes walk from the terminal</li>
                              <li class="convenience font-sm text-black">Ultimate convenience</li>
                              <li class="airport font-sm text-black">Includes airport parking fee</li>
                              <li class="font-sm text-black">Hassle free</li>
                              <li class="font-sm text-black">Free amendments*</li>
                              <li class="font-sm text-black">Free cancellation*</li>
                            </ul>
                          </div>
                          <div class="col-12 col-md-3">
                            <div class="d-flex flex-md-wrap
                                align-items-center flex-row
                                flex-md-column justify-content-between h-100 gap-5">
                              <img
                                src="{{ Vite::asset('resources/images/evparkgiant-logo.svg') }}"
                                alt="ev parkgiant logo"
                                class="w-100"
                              />
                              <div class="price-div w-100">
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                  <span class="fst-italic fw-bold">Price</span>
                                  <span class="fst-italic fw-bold">£165.00</span>
                                </div>
                                <button
                                  type="button"
                                  class="bg-primary font-mob-md
                                    p-1 p-md-2 border-0 w-100
                                    rounded-0 fst-italic fw-semibold text-white">
                                  add to quote
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="info-div m-2 m-md-3 p-3 border border-1 pb-4">
                    <div class="your-details">
                      <div class="row g-3 align-items-center mb-3 info-div-title d-flex mb-4">
                        <div class="col-6 col-md-4 text-start">
                          <p class="fst-italic fw-semibold text-black m-0">Your details</p>
                        </div>
                        <div class="col-6 col-md-7">
                          <span class="font-sm fst-italic font-mob-sm">
                            All fields are required, you can change these later</span>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12 col-lg-12 ms-auto">
                          <div class="row g-0 g-md-3 align-items-center mb-3">
                            <div class="col-12 col-md-4 text-md-end">
                              <label for="" class="font-md fw-semibold text-black">Drivers name</label>
                            </div>
                            <div class="col-12 col-md-7">
                              <input type="text" class="form-control" name="drivername" id="">
                            </div>
                          </div>
                          <div class="row g-0 g-md-3 align-items-center mb-3">
                            <div class="col-12 col-md-4 text-md-end">
                              <label for="" class="font-md fw-semibold text-black">Email address</label>
                            </div>
                            <div class="col-12 col-md-7">
                            <input type="email" class="form-control" name="email-address" id="">
                            </div>
                          </div>
                          <div class="row g-0 g-md-3 align-items-center mb-3">
                            <div class="col-12 col-md-4 text-md-end">
                              <label for="" class="font-md fw-semibold text-black">Confirm email</label>
                            </div>
                            <div class="col-12 col-md-7">
                              <input type="email" class="form-control" name="confirm-email" id="">
                            </div>
                          </div>
                          <div class="row g-0 g-md-3 align-items-center mb-3">
                            <div class="col-12 col-md-4 text-md-end">
                              <label for="" class="font-md fw-semibold text-black">Mobile number</label>
                            </div>
                            <div class="col-12 col-md-7">
                              <input type="tel" class="form-control" name="mobile-number" id="">
                            </div>
                          </div>
                          <div class="row g-0 g-md-3 align-items-center mb-3">
                            <div class="col-12 col-md-4 text-md-end">
                              <label for="" class="font-md fw-semibold text-black">Company name</label>
                            </div>
                            <div class="col-12 col-md-7">
                              <input type="text" class="form-control" placeholder="Optional" name="company-name" id="">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="flight-details">
                      <div class="row g-3 align-items-center mb-3 info-div-title d-flex mb-4">
                        <div class="col-6 col-md-4 text-start">
                          <p class="fst-italic fw-semibold text-black m-0">Flight details</p>
                        </div>
                        <div class="col-6 col-md-7">
                          <span class="font-sm fst-italic font-mob-sm">
                            All fields are required, you can change these later</span>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12 col-lg-12 ms-auto">
                          <div class="row g-0 g-md-3 align-items-center mb-3">
                            <div class="col-12 col-md-4 text-md-end">
                              <label for="" class="font-md fw-semibold text-black">Outbound flight number</label>
                            </div>
                            <div class="col-12 col-md-7">
                              <input type="text" class="form-control" name="flightnumber" id="">
                            </div>
                          </div>
                          <div class="row g-0 g-md-3 align-items-center mb-3">
                            <div class="col-12 col-md-4 text-md-end">
                              <label for="" class="font-md fw-semibold text-black">Outbound terminal</label>
                            </div>
                            <div class="col-12 col-md-7">
                              <input type="number" class="form-control" name="terminal" id="">
                            </div>
                          </div>
                          <div class="row g-0 g-md-3 align-items-center mb-3">
                            <div class="col-12 col-md-4 text-md-end">
                              <label for="" class="font-md fw-semibold text-black">Inbound flight number</label>
                            </div>
                            <div class="col-12 col-md-7">
                              <input type="text" class="form-control" name="inbound-flight-number" id="">
                            </div>
                          </div>
                          <div class="row g-0 g-md-3 align-items-center mb-3">
                            <div class="col-12 col-md-4 text-md-end">
                              <label for="" class="font-md fw-semibold text-black">Inbound terminal</label>
                            </div>
                            <div class="col-12 col-md-7">
                              <input type="number" class="form-control" name="inbound-terminal" id="">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="vehicle-details">
                      <div class="row g-3 align-items-center mb-3 info-div-title d-flex mb-4">
                        <div class="col-6 col-md-4 text-start">
                          <p class="fst-italic fw-semibold text-black m-0">Vehicle details</p>
                        </div>
                        <div class="col-6 col-md-7">
                          <span class="font-sm fst-italic font-mob-sm">
                            All fields are required, you can change these later</span>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12 col-lg-12 ms-auto">
                          <div class="row g-0 g-md-3 align-items-center mb-3">
                            <div class="col-12 col-md-4 text-md-end">
                              <label for="" class="font-md fw-semibold text-black">Registration</label>
                            </div>
                            <div class="col-12 col-md-7">
                              <input type="text" class="form-control" name="vehicle-details" id="">
                            </div>
                          </div>
                          <div class="row g-0 g-md-3 align-items-center mb-3">
                            <div class="col-12 col-md-4 text-md-end">
                              <label for="" class="font-md fw-semibold text-black">Vehicle make</label>
                            </div>
                            <div class="col-12 col-md-7">
                              <input type="text" class="form-control" name="vehicle-make" id="">
                            </div>
                          </div>
                          <div class="row g-0 g-md-3 align-items-center mb-3">
                            <div class="col-12 col-md-4 text-md-end">
                              <label for="" class="font-md fw-semibold text-black">Vehicle model</label>
                            </div>
                            <div class="col-12 col-md-7">
                              <input type="text" class="form-control" name="vehicle-model" id="">
                            </div>
                          </div>
                          <div class="row g-0 g-md-3 align-items-center mb-3">
                            <div class="col-12 col-md-4 text-md-end">
                              <label for="" class="font-md fw-semibold text-black">Vehicle colour</label>
                            </div>
                            <div class="col-12 col-md-7">
                              <input type="text" class="form-control" name="vehicle-colour" id="">
                            </div>
                          </div>
                          <div class="row g-0 g-md-3 align-items-center mb-3">
                            <div class="col-12 col-md-4 text-md-end">
                              <label for="" class="font-md fw-semibold text-black">Number of passengers</label>
                            </div>
                            <div class="col-12 col-md-7">
                            <input type="number" class="form-control" name="no-fo-passenger" id="">
                            </div>
                          </div>
                          <div class="text-center">
                            <span class="fst-italic font-sm text-black ">
                              <img
                                src="{{ Vite::asset('resources/images/exclamation-circle.svg') }}"
                                alt="icon"
                                class="me-1"
                              />
                              If your vehicle is over 2.1m in height and/or long wheel base, please email us at
                              <a href="mailto:contact@parkgiant.co.uk" class="text-black">contact@parkgiant.co.uk</a>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="info-div m-2 m-md-3 p-3 border border-1 pb-4">
                    <div class="row g-3 align-items-center mb-3 info-div-title d-flex mb-4">
                      <div class="col-6 col-md-4 text-start">
                        <p class="fst-italic fw-semibold text-black m-0">Add ons</p>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-12 ms-auto pt-5">
                          <div class="row g-0 g-md-3 align-items-center mb-3">
                            <div class="col-12 col-md-4 text-md-end">
                              <label for="" class="font-md fw-semibold text-black">Professional valet</label>
                            </div>
                            <div class="col-10 col-md-7">
                              <select name="" id="" class="form-control">
                                <option value="Null">Not Selected</option>
                                <option value="no">NO</option>
                                <option value="yes">Yes</option>
                              </select>
                            </div>
                            <div class="col-2 col-md-1 p-0 text-end">
                              <a href="#"
                                class="font-sm font-mob-sm text-black text-decoration-underline"
                                data-bs-toggle="modal"
                                data-bs-target="#more-info"
                              >
                              more info
                              </a>
                            </div>
                          </div>
                          <div class="row g-0 g-md-3 align-items-center mb-3">
                            <div class="col-12 col-md-4 text-md-end">
                              <label for="" class="font-md fw-semibold text-black">EV charging</label>
                            </div>
                            <div class="col-10 col-md-7">
                              <select name="" id="" class="form-control">
                                <option value="Null">Not Selected</option>
                                <option value="no">NO</option>
                                <option value="yes">Yes</option>
                              </select>
                            </div>
                            <div class="col-2 col-md-1 p-0 text-end">
                              <a href="#"
                                class="font-sm font-mob-sm text-black text-decoration-underline"
                                data-bs-toggle="modal"
                                data-bs-target="#more-info"
                              >
                                more info
                              </a>
                            </div>
                          </div>
                          <div class="row g-0 g-md-3 align-items-center mb-3">
                            <div class="col-12 col-md-4 text-md-end">
                              <label for="" class="font-md fw-semibold text-black">Cancellation waiver</label>
                            </div>
                            <div class="col-10 col-md-7">
                              <select name="" id="" class="form-control">
                                <option value="Null">Not Selected</option>
                                <option value="no">NO</option>
                                <option value="yes">Yes</option>
                              </select>
                            </div>
                            <div class="col-2 col-md-1 p-0 text-end">
                              <a href="#"
                                class="font-sm font-mob-sm text-black text-decoration-underline"
                                data-bs-toggle="modal"
                                data-bs-target="#more-info"
                              >
                                more info
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
            </div>
            <div class="col-12 col-lg-5 col-xl-4 order-1 order-sm-2">
              @include('front.layouts.partials.checkout.booking-summary')
              <!-- Save Quote Div Start -->
              <div class="booking-summary rounded-3 overflow-hidden shadow-sm border border-1 my-4">
                <div class="booking-summary-header p-3">
                  <p class="text-center mb-0 text-capitalize">save quote</p>
                </div>
                <div class="row p-4">
                  <div class="col-12">
                    <sapn class="text-black">Enter your email below to have this quote sent to your inbox</span>
                  </div>
                  <form action="" class="mt-3 text-center">
                    <input type="email" class="form-control font-sm" name="emailquote" id="">
                    <button
                      type="button"
                      class="fst-italic bg-primary border-0 text-white py-2 px-4 font-sm mt-3"
                    >email quote
                    </button>
                  </form>
                </div>
              </div>
              <!-- Save Quote Div End -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
