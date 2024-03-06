<nav class="navbar navbar-expand-lg navbar-dark bg-dark mobile-navbar">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">
      <img src="{{ Vite::asset('resources/images/header-logo.svg') }}"
        alt="logo"
        class="img-fluid"
      />
    </a>
    <button
      class="navbar-toggler"
      type="button"
      data-bs-toggle="offcanvas"
      data-bs-target="#offcanvasNavbar"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div
      class="offcanvas offcanvas-end d-flex flex-column flex-lg-row"
      tabindex="-1" id="offcanvasNavbar"
      aria-labelledby="offcanvasNavbarLabel"
    >
      <button
        class="navbar-toggler close-menu-btn"
        type="button"
        data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasNavbar"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation">
        <img src="{{ Vite::asset('resources/images/menu-toggle.png') }}" alt="menu-toggle">
      </button>
      <ul class="navbar-nav ms-auto mx-lg-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-capitalize" aria-current="page" href="/what-parking">
            what is meet & greet parking?
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-capitalize" href="/ev-parking">EV parking</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-capitalize" href="/business-parking">business parking</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-capitalize" href="/directions">directions</a>
        </li>
      </ul>
      <form class="d-flex gap-4 align-items-center">
        <a href="/login">Login</a>
        <button class="btn btn-primary text-uppercase" type="submit">get quote</button>
      </form>
    </div>
  </div>
</nav>
