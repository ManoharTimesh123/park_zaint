<header class="header" id="header">
  <nav class="navbar navbar-expand navbar-light position-sticky sticky-top" aria-label="">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <button class="btn btn-md shadow-none border-0 float-end sidebar-arrow">
          <div class="hamburg-icon">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
          </div>
        </button>
        <div class="search-bar-main">
          <button type="search" class="btn" onclick="">
            <img
              src="{{ Vite::asset('resources/images/search.svg') }}"
              alt="Search"
              class="img-fluid m-auto transition-x"
            />
          </button>
          <input type="search" class="form-control" name="search" id="" placeholder="search" />
        </div>
        <ul class="navbar-nav ms-auto gap-3">
          <li class="nav-item">
            <a
              class="nav-link d-flex py-0"
              href="javascript:void(0)">
              <span class="text-white">{{date('h:i', time())}}</span>
            </a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link d-flex py-0"
              href="javascript:void(0)">
              <span class="text-white current-header-time">{{date('D d M', time())}}</span>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a
              id="navbarDropdown"
              class="nav-link dropdown-toggle d-flex py-0"
              href="#"
              role="button"
              data-bs-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
              v-pre>
              <img
                src="{{ Vite::asset('resources/images/auth-profile-image.png') }}"
                alt="auth-profile"
                class="img-fluid auth-img rounded-circle border border-white bg-white transition-x"
              />
              <div class="d-none d-md-block">
                <p class="mb-0">{{ Auth::user()->name }}</p>
              </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <li>
                <a
                  class="dropdown-item"
                  href="javascript:void(0)"
                >
                  <i class="fa-regular fa-user"></i>
                  <span>Profile</span>
                </a>
              </li>
              <li>
                <a
                  class="dropdown-item"
                  href="javascript:void(0)"
                >
                  <i class="fa-solid fa-gears"></i>
                  <span>Setting</span>
                </a>
              </li>
              <li>
                <a
                  class="dropdown-item"
                  href="/"
                >
                  <i class="fa-solid fa-key"></i>
                  <span>Change Password</span>
                </a>
              </li>
              <li>
                <a
                  class="dropdown-item"
                  href="{{ route('admin.logout') }}"
                >
                  <i class="fa-solid fa-power-off"></i>
                  <span>Sign Out</span>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>
