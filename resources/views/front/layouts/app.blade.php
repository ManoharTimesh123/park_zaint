<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>
  <!-- Scripts -->
  @vite(['resources/scss/front/front.scss', 'resources/js/front/front.js'])
  <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
</head>
<body>
  <div id="app">
    <main>
        <div id="layoutSidenav_content"class="main-content">
          @include('front.layouts.partials.header-footer.header')
          <div class="main-inner-content">
            @yield('content')
          </div>
          @include('front.layouts.partials.header-footer.footer')
      </div>
    </main>
  </div>
    @stack('scripts')
</body>
</html>
