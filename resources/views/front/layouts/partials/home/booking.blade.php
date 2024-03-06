{{-- Booking Form Section Start --}}
<section class="booking-form-sec">
  <div class="container">
    <div class="booking-form-main py-2 py-lg-4 px-4 px-lg-5">
      <div class="row">
        <div class="col-sm-12">
          <h2 class="text-white fw-semibold mb-5">
              Get a quick quote for your travel and book safely and securely online now!
          </h2>
        </div>
      </div>
      <form action="" class="row">
        <div class="col-6 col-md-4 m-auto col-xl-2 p-1">
          <label for="" class="text-white mb-1 h6">Airport</label>
          <div class="input-group mb-3 ">
            <span class="input-group-text bg-white border-0 p-1 p-lg-3 ps-1 ps-lg-4 pe-2">
              <img src="{{ Vite::asset('resources/images/plane.svg') }}" alt="plane" />
            </span>
            <input
              type="text"
              class="form-control border-0 shadow-none p-1 p-lg-3"
              placeholder="Heathrow"
              aria-label="Basename"
              aria-describedby="base-name"
              name="airport-base"
              id="airportbase"
            />
          </div>
        </div>
        <div class="col-6 col-md-4 m-auto col-xl-2 p-1">
          <label for="" class="text-white mb-1 h6">Drop off date</label>
          <div class="input-group mb-3 ">
            <span class="input-group-text bg-white border-0 p-1 p-lg-3 ps-1 ps-lg-4 pe-2">
              <img src="{{ Vite::asset('resources/images/calander.svg') }}" alt="calander" />
            </span>
            <input
              type="date"
              class="form-control border-0 shadow-none p-1 p-lg-3"
              placeholder="Drop off Date"
              aria-label="Dropdate"
              aria-describedby="drop-date"
              name="drop-off-date"
              id="dropoffdate"
            />
          </div>
        </div>
        <div class="col-6 col-md-4 m-auto col-xl-2 p-1">
          <label for="" class="text-white mb-1 h6">Drop off time</label>
          <div class="input-group mb-3 ">
            <span class="input-group-text bg-white border-0 p-1 p-lg-3 ps-1 ps-lg-4 pe-2">
              <img src="{{ Vite::asset('resources/images/clock.svg') }}" alt="clock" />
            </span>
            <input
              type="time"
              class="form-control border-0 shadow-none p-1 p-lg-3"
              placeholder="Drop off Time"
              aria-label="Droptime"
              aria-describedby="drop-time"
              name="drop-off-time"
              id="dropofftime"
            />
          </div>
        </div>
        <div class="col-6 col-md-4 m-auto col-xl-2 p-1">
          <label for="" class="text-white mb-1 h6">Pick-up date</label>
          <div class="input-group mb-3 ">
            <span class="input-group-text bg-white border-0 p-1 p-lg-3 ps-1 ps-lg-4 pe-2">
              <img src="{{ Vite::asset('resources/images/calander.svg') }}" alt="calander" />
            </span>
            <input
              type="date"
              class="form-control border-0 shadow-none p-1 p-lg-3"
              placeholder="Pick up Date"
              aria-label="Pickdate"
              aria-describedby="pick-date"
              name="pick-up-date"
              id="pickupdate"
            />
          </div>
        </div>
        <div class="col-6 col-md-4 m-auto col-xl-2 p-1">
          <label for="" class="text-white mb-1 h6">Pick-up time</label>
          <div class="input-group mb-3 ">
            <span class="input-group-text bg-white border-0 p-1 p-lg-3 ps-1 ps-lg-4 pe-2">
              <img src="{{ Vite::asset('resources/images/clock.svg') }}" alt="clock" />
            </span>
            <input
              type="time"
              class="form-control border-0 shadow-none p-1 p-lg-3"
              placeholder="Pick up Time"
              aria-label="Picktime"
              aria-describedby="pick-time"
              name="pick-up-time"
              id="pickuptime"
            />
          </div>
        </div>
        <div class="col-6 col-md-4 m-auto col-xl-2 p-1">
          <label for="" class="text-white mb-1 h6">Number of vehicles</label>
          <div class="input-group mb-3 ">
            <span class="input-group-text bg-white border-0 p-1 p-lg-3 ps-1 ps-lg-4 pe-2">
              <img src="{{ Vite::asset('resources/images/car-icon.svg') }}" alt="car-icon" />
            </span>
            <input
              type="number"
              class="form-control border-0 shadow-none p-1 p-lg-3"
              placeholder="Number of Vehicle"
              aria-label="vehicle"
              aria-describedby="vehicle"
              name="vehicle-count"
              id="vehiclcount"
            />
          </div>
        </div>
        <div class="col-12 col-md-6 m-auto col-lg-6 p-1">
          <div class="input-group mb-3 w-100">
            <span class="input-group-text bg-white border-0 p-1 p-lg-3 ps-1 ps-lg-4 pe-0">
              <img src="{{ Vite::asset('resources/images/promo-code.svg') }}" alt="promo-code" />
            </span>
            <input
              type="text"
              class="form-control border-0 shadow-none p-1 p-lg-3"
              placeholder="Promotional Code"
              aria-label="code"
              aria-describedby="code"
              name="promotional-code"
              id="promotionalcode"
            />
          </div>
        </div>
        <div class="col-12 col-md-6 m-auto col-lg-6 p-1">
          <div class="input-group mb-3">
            <button class="btn btn-primary w-100 p-2 p-lg-3 d-flex align-items-center" type="submit">
              <span class="text-end w-50 text-uppercase">get quote</span>
              <span class="text-end w-50 pe-4">
                <img src="{{ Vite::asset('resources/images/white-arrow-btn.svg') }}" alt="arrow-icon" />
              </span>
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
{{-- Booking Form Section End --}}
