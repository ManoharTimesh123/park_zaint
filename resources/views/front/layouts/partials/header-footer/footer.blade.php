<footer class="footer-main">
  <div class="container">
    <div class="row justify-content-between divide-border-1">
      <div class="col-6 col-md-3">
        <a class="footer-logo d-block pb-3" href="#">
          <img src="{{ Vite::asset('resources/images/header-logo.svg') }}"
            alt="logo"
            class="img-fluid"
          />
        </a>
        <p class="text-white lh-sm d-none d-md-block">
          Park Giant is Heathrow’s leading Meet & Greet Valet parking company.
          We are Heathrow approved and Park Mark accredited.
        </p>
      </div>
      <div class="col-md-2 d-none d-md-block">
        <h6 class="footer-head">Our Services</h6>
        <ul class="footer-list">
          <li class="footer-list-item">
            <a class="footer-list-item-link active" aria-current="page" href="/what-parking">Meet & Greet parking?</a>
          </li>
          <li class="footer-list-item">
            <a class="footer-list-item-link" href="/ev-parking">EV Parking</a>
          </li>
          <li class="footer-list-item">
            <a class="footer-list-item-link" href="/business-parking">Professional Valet Service</a>
          </li>
        </ul>
      </div>
      <div class="col-md-3 d-none d-md-block">
        <h6 class="footer-head">Site Links</h6>
        <div class="d-md-flex gap-5">
          <ul class="footer-list">
            <li class="footer-list-item">
              <a class="footer-list-item-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="footer-list-item">
              <a class="footer-list-item-link active"
              aria-current="page" href="/what-parking">What is Meet & Greet parking?</a>
            </li>
            <li class="footer-list-item">
              <a class="footer-list-item-link" href="/ev-parking">EV Parking</a>
            </li>
            <li class="footer-list-item">
              <a class="footer-list-item-link" href="/business-parking">Business Parking</a>
            </li>
          </ul>
          <ul class="footer-list">
            <li class="footer-list-item">
              <a class="footer-list-item-link" href="/directions">Directions</a>
            </li>
            <li class="footer-list-item">
              <a class="footer-list-item-link" href="#">FAQs</a>
            </li>
            <li class="footer-list-item">
              <a class="footer-list-item-link" href="#">Terms & Conditions</a>
            </li>
            <li class="footer-list-item">
              <a class="footer-list-item-link" href="#">Privacy Policy</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-md-3 d-none d-md-block">
        <div class="border-0 border-primary">
          <h6 class="footer-head">Contact Us</h6>
          <ul class="footer-list">
            <li class="footer-list-item">
              <a class="footer-list-item-link" href="tel: 020 XXXX XXXX">
                <img src="{{ Vite::asset('resources/images/call-icon.svg') }}"
                  alt="copyright"
                  class="img-fluid"
                />
                <span>020 XXXX XXXX</span>
              </a>
            </li>
            <li class="footer-list-item">
              <a class="footer-list-item-link" href="mailto:contact@parkgiant.co.uk">
                <img src="{{ Vite::asset('resources/images/message-icon.svg') }}"
                  alt="copyright"
                  class="img-fluid"
                />
                <span>contact@parkgiant.co.uk</span>
              </a>
            </li>
            <li class="footer-list-item">
              <a class="footer-list-item-link" href="https://parkmark.co.uk">
                <img src="{{ Vite::asset('resources/images/parkmark-logo.png') }}"
                alt="copyright"
                class="img-fluid"/>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row d-none d-md-block">
      <div class="col-sm-12">
        <small class="copyright-sec">
          <span>All Rights Reserved.</span>
          <img src="{{ Vite::asset('resources/images/copyright.svg') }}"
            alt="copyright"
            class="img-fluid"
          />
          <span>2023. Website Designed, Developed and Hosted by
            <a href="/"> http://www.webologymarketing.co.uk/ </a>
          </span>
        </small>
      </div>
    </div>
    <div class="d-block d-md-none">
      <div class="row">
        <div class="col-8">
          <h4 class="text-white fw-semibol mb-2 text-capitalize">quick links</h4>
          <ul>
            <li class="footer-list-item">
              <a class="footer-list-item-link text-capitalize" href="#">terms & conditions</a>
            </li>
            <li class="footer-list-item">
              <a class="footer-list-item-link text-capitalize" href="#">privacy policy</a>
            </li>
          </ul>
        </div>
        <div class="col-4">
          <a class="footer-list-item-link" href="https://parkmark.co.uk">
            <img src="{{ Vite::asset('resources/images/parkmark-logo.png') }}"
            alt="copyright"
            class="img-fluid w-100"/>
          </a>
        </div>
        <div class="col-12">
          <p class="mt-3 mb-0 text-center text-white">
            All rights reserved. Copyright 2022. Website designed, Developed and hosted
            by Webology Marketing
          </p>
        </div>
      </div>
    </div>
  </div>
  <!-- Whatsapp Icon Start  -->
  <div class="float-whatsapp-icon">
    <a href="#">
      <img
        src="{{ Vite::asset('resources/images/whatsapp-icon.svg') }}"
        alt="whatsapp icon"
        class="img-fluid"
      />
    </a>
  </div>
  <!-- Whatsapp Icon End  -->
  <!-- All Modals Start  -->
  @include('front.layouts.partials.modals.more-info-modal')
  @include('front.layouts.partials.modals.resend-mail-modal')
  @include('front.layouts.partials.modals.edit-info-modal')
  <!-- All Modals End  -->
</footer>
