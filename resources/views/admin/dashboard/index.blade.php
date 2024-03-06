@extends('admin.layouts.app')
@section('title')
  Dashboard
@endsection
@section('content')
  <div class="d-flex gap-2 align-items-center mb-4 pb-2">
    <h3 class="page-title">Dashboard</h3>
    <img
      src="{{ Vite::asset('resources/images/right-arrow.svg') }}"
      alt="auth-profile"
      class="img-fluid auth-img rounded-circle border border-white bg-white transition-x"
    >
  </div>
  <div class="col-md-12 divide-y-1 dashboard-card-main-col">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="d-flex align-items-center gap-3">
              <img
                src="{{ Vite::asset('resources/images/auth-profile-image.png') }}"
                alt="auth-profile"
                class="img-fluid auth-img rounded-circle border border-white bg-white transition-x"
              >
              <div class="auth-card-detail">
                <h3 class="welcome-head text-primary">Welcome, {{ Auth::user()->name }}</h3>
                <a class="auth-text fw-normal m-0" href="{{ route('admin.logout') }}">Logout</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <a href="/">
            <div class="card-body">
              <div class="d-block align-items-center gap-3">
                <div class="auth-card-detail">
                  <h3 class="welcome-head fw-normal">Admin User</h3>
                  <p class="fs-6 fw-medium">1</p>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <a href="/">
            <div class="card-body">
              <div class="d-block align-items-center gap-3">
                <div class="auth-card-detail">
                  <h3 class="welcome-head fw-normal">Roles</h3>
                  <p class="fs-6 fw-medium">super admin</p>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <a href="/">
            <div class="card-body">
              <div class="d-block align-items-center gap-3">
                <div class="auth-card-detail">
                  <h3 class="welcome-head fw-normal">Permission</h3>
                  <p class="fs-6 fw-medium">all</p>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
@endsection
