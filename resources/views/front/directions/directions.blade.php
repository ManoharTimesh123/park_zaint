@extends('front.layouts.app')
@section('title')
Directions
@endsection
@section('content')
  <section class="hero-banner-sec">
    <div class="container">
      <div class="hero-banner-main">
        <img
          src="{{ Vite::asset('resources/images/direction-hero-banner.svg') }}"
          alt="hero-banner"
          class="img-fluid w-100"
        />
        <div class="hero-header-main">
          <h1 class="fw-normal text-end">Directions</h1>
          <p class="text-end font-italic text-primary">
            <em>Enjoy a quick and seamless drop of and collection with Park Giant meet and greet</em>
          </p>
        </div>
        <ul class="list-group bg-dark divide-border-2">
          <li>Meet us at the terminal</li>
          <li>We will store your car</li>
          <li>Meet us back at the terminal</li>
        </ul>
      </div>
    </div>
  </section>
  {{-- Feature Section Start --}}
  @include('front.layouts.partials.home.feature')
  {{-- Feature Section End --}}
  {{-- Problem Solution Section Start --}}
  <section class="pro-sol-sec">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 col-md-6">
          <img
            src="{{ Vite::asset('resources/images/navigating-img.svg') }}"
            class="img-fluid"
            alt="navigating-img"
          />
        </div>
        <div class="col-12 col-md-6 mt-3 mt-md-0">
          <h2 class="pro-sol-title">Effortless Terminal Drop-offs: Navigating Heathrow with Ease</h2>
          <p>
            Welcome to Park Giant's Directions page, your guide to stress-free terminal drop-offs at Heathrow Airport.
            We understand that the journey to the terminal entrance should be as smooth as your flight itself.
            That's why we've crafted this guide to help you navigate with confidence and simplicity.
          </p>
          <p>
            At Park Giant, we've made the process of dropping off passengers at each Heathrow terminal a breeze.
            Whether you're departing for business or embarking on a well-deserved holiday, our easy-to-follow
            directions ensure that your arrival at the airport is just as hassle-free as our parking services.
          </p>
          <p>
            With clear signage and straightforward routes, finding your way to the terminal entrance
            couldn't be simpler. Our goal is to let you focus on the excitement of your journey while we take 
            care of the logistics. No more worries about complex directions or last-minute detours—just a 
            straightforward path to your desired terminal.
          </p>
        </div>
        <div class="col-12 pt-3 text-center">
          <p>Choose your terminal below to discover the <strong>seamless route</strong> that awaits you.</p>
          <p>
            Experience the <strong>convenience</strong> of Park Giant's directions, where <strong>smooth travel
            </strong> begins from the moment you arrive at Heathrow Airport.
          </p>
        </div>
      </div>
    </div>
  </section>
  {{-- Problem Solution Section End --}}
  {{-- Work Section Start --}}
  @include('front.layouts.partials.home.work')
  {{-- Work Section End --}}
  {{-- Terminal Section Start --}}
  <section class="work-content-sec pb-0">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <p class="fw-bold work-content-sec-title my-3">Outbound journey</p>
          <p class="m-0">
            To ensure a seamless experience, please make sure that you can be reached at the contact number provided
            in your booking. We cover parking costs for up to 15 minutes only. Should there be any adjustments to your 
            booked times, kindly inform our team.
          </p>
          <p class="m-0">
            Before handing over your vehicle, please remove all travel documents, phones, cash, and valuables from
            your car. Note that we cannot take responsibility for personal items left inside vehicles.
          </p>
          <p class="m-0">
            When you're ready, hand your vehicle and keys to our fully insured Chauffeur. After signing necessary
            paperwork, proceed directly to your terminal's check-in. Your vehicle will be driven by our insured
            chauffeur to our secure storage location while you're away. Your journey starts here with Park Giant's
            hassle-free service.
          </p>
          <p class="fw-bold work-content-sec-title my-3">On your return</p>
          <p class="m-0">
            Upon arrival, thoroughly inspect your vehicle and promptly inform us of any concerns before you
            leave the meet and greet drop off area. Please note that we cannot accept damage claims or other
            issues reported after departing the drop off area. Complete the required paperwork and retrieve
            your vehicle from the designated area.
          </p>
          <p class="m-0">
            Kindly be aware that entering the Heathrow Drop-Off zones (clearly marked) will result in extra fees payable
            directly to the airport. Your attention to these details ensures a seamless experience with Park Giant.
          </p>
          <p class="fw-bold work-content-sec-title my-3">Directions and meeting points</p>
          <p class="m-0">Sat Nav Info
          <p class="m-0"> Terminal 2 - Post code TW6 1EW</p>
          <p class="m-0"> Terminal 3 - Post code TW6 1QG</p>
          <p class="m-0"> Terminal 4 - Post Code TW6 3XA</p>
          <p class="m-0"> Terminal 5 - Post Code TW6 2GA</p>

          <p class="d-flex align-items-center text-primary mt-3 mb-3 fw-semibold">
            <img
              src="{{ Vite::asset('resources/images/rightgreen-arrow.svg') }}"
              alt="right-green-arrow-icon"
              class="me-2"
            />
            Terminal 2 - Post code TW6 1EW
          </p>
          <p>
            Exit the M25 at Junction 14. Follow signs for Terminals 1, 2 & 3, taking the route that leads 
            onto the Western Perimeter Road. Continue through the main tunnel to
            reach the Central Terminal Area for Terminals 1, 2 & 3.
          </p>
          <p>
            As you exit the tunnel, stay on the right-hand side. Pass the Central Bus Station and merge onto the final
            approach towards Terminal 2 via Cosmopolitan Way. Once again, stay right, and the road to Terminal 2 will
            move away from the building briefly. It will then turn back as the road ramps up towards Terminal
            2 Departures and the Short Stay 2 car park on Constellation Way.
          </p>
          <p>
            On the ascending ramp, continue keeping to the right. This ramp will take you directly to the entry
            barriers of the "Short stay car park." Take a barrier ticket and enter the car park.
          </p>
          <p>
            Upon entering the car park on Level 4, maintain your position on the RIGHT for Level 4. Follow signs
            indicating "Off Airport Parking Meet & Greet." Park your vehicle in "Row B." Here, a TERMINALS PARKING
            Chauffeur will be ready to meet you and collect your car. Your journey begins with ease at this point.
          </p>
          <p class="d-flex align-items-center text-primary mt-3 mb-3 fw-semibold">
            <img
              src="{{ Vite::asset('resources/images/rightgreen-arrow.svg') }}"
              alt="right-green-arrow-icon"
              class="me-2"
            />
            Terminal 3 - Postcode TW6 3QG
          </p>
          <p>
            From the M25, take the exit at Junction 14. Follow the signs for Terminals 1, 2 & 3. Continue
            along the route onto the Western Perimeter Road. Proceed through the main tunnel, heading
            towards the Central Terminal Area for Terminals 1, 2 & 3.
          </p>
          <p>
            Upon exiting the tunnel, stay in the first lane and follow the signs for Terminal 3 Short Stay
            Carpark (Carpark 3). Take a ticket from the barrier. Drive to Level 4 and locate ROW "A" for
            parking. Here, a TERMINALS PARKING Chauffeur will be waiting to assist you in collecting your vehicle.
            Your journey unfolds smoothly from this point onward.
          </p>
          <p class="d-flex align-items-center text-primary mt-3 mb-3 fw-semibold">
            <img
              src="{{ Vite::asset('resources/images/rightgreen-arrow.svg') }}"
              alt="right-green-arrow-icon"
              class="me-2"
            />
            Terminal 4 - Post Code TW6 3XA
          </p>
          <p class="m-0">
            After exiting the Terminal 4 roundabout, watch for signs indicating Short Stay Parking.
            Proceed up the ramp while keeping to the right. Take a ticket to enter the Short Stay Car Park.
            Maintain your position on the right side and proceed to level 2.
          </p>
          <p class="m-0">
            Look for signs directing you to Off-Airport Parking, specifically Rows E and F. Once you've found the
            designated area, park your vehicle in a bay. Your uniformed driver will be waiting to meet you here,
            ensuring a seamless continuation of your journey.
          </p>
          <p class="d-flex align-items-center text-primary mt-3 mb-3 fw-semibold">
            <img
              src="{{ Vite::asset('resources/images/rightgreen-arrow.svg') }}"
              alt="right-green-arrow-icon"
              class="me-2"
            />
            Terminal 5 - Post Code TW6 2GA
          </p>
          <p>
            Proceed towards the PICK UP AND DEPARTURES area. As you ascend the ramp, notice the signs pointing
            to the SHORT STAY CAR PARK. Follow this sign, which will lead you to Level 4 of the TERMINAL CAR PARK.
            Stay in the lane on the left-hand side, clearly marked as FAST TRACK BUSINESS PARKING.
          </p>
          <p>
            Upon reaching the barrier, take a ticket. Please note that there is no extra charge for entering the
            TERMINAL CAR PARK. Continue to ROW S or R, where a TERMINALS PARKING Chauffeur will be
            present to collect your vehicle. Your journey continues seamlessly from here.
          </p>
        </div>
      </div>
    </div>
  </Section>
  {{-- Terminal Section End --}}
  {{-- Booking Form Section Start --}}
  @include('front.layouts.partials.home.booking')
  {{-- Booking Form Section End --}}
  {{-- FAQ Section End --}}
  @include('front.layouts.partials.home.faq')
  {{-- FAQ  Section End --}}
  {{-- Why Park Giant Sec Start --}}
  @include('front.layouts.partials.home.why-parkgiant')
  {{-- Why Park Giant Sec End --}}
  {{-- Google Review Sec Start --}}
  @include('front.layouts.partials.home.review')
  {{-- Google Review Sec End --}}
  {{-- Instant Quote Sec Start --}}
  @include('front.layouts.partials.home.instantquote')
<!-- Instant Quote Sec End  -->
@endsection
