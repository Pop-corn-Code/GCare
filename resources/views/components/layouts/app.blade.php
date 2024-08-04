<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>{{ config('app.name') }} - @yield('page-title')</title>

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('logo/logo1.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('logo/logo2.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <script src="vendors/simplebar/simplebar.min.js"></script>
    <script src="assets/js/config.js"></script>

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="../../css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href="vendors/simplebar/simplebar.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../release/v4.0.8/css/line.css">
    <link href="{{asset('assets/css/theme-rtl.min.css')}}" type="text/css" rel="stylesheet" id="style-rtl">
    <link href="{{asset('assets/css/theme.min.css')}}" type="text/css" rel="stylesheet" id="style-default">
    <link href="{{asset('assets/css/user-rtl.min.css')}}" type="text/css" rel="stylesheet" id="user-style-rtl">
    <link href="{{asset('assets/css/user.min.css')}}" type="text/css" rel="stylesheet" id="user-style-default">
    <script>
      var phoenixIsRTL = window.config.config.phoenixIsRTL;
      if (phoenixIsRTL) {
        var linkDefault = document.getElementById('style-default');
        var userLinkDefault = document.getElementById('user-style-default');
        linkDefault.setAttribute('disabled', true);
        userLinkDefault.setAttribute('disabled', true);
        document.querySelector('html').setAttribute('dir', 'rtl');
      } else {
        var linkRTL = document.getElementById('style-rtl');
        var userLinkRTL = document.getElementById('user-style-rtl');
        linkRTL.setAttribute('disabled', true);
        userLinkRTL.setAttribute('disabled', true);
      }
    </script>
    <link href="{{asset('vendors/leaflet/leaflet.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/leaflet.markercluster/MarkerCluster.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/leaflet.markercluster/MarkerCluster.Default.css')}}" rel="stylesheet">

{{-- Map integration --}}
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}"></script>

  </head>
  @inject('request', 'Illuminate\Http\Request')
  <body class="bg-body-emphasis" style="--phoenix-scroll-margin-top: 1.2rem;">
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
    @if( $request->routeIs('app.landing') )
      @include('components.navigation.navbar')
    @endif
    @if( $request->routeIs('app.dash.*') )
        @include('components.navigation.dash.nav')
        {{-- @include('components.navigation.dash.sidebar')
        @include('components.navigation.dash.navbar') --}}
      <script>
        var navbarTopShape = window.config.config.phoenixNavbarTopShape;
        var navbarPosition = window.config.config.phoenixNavbarPosition;
        var body = document.querySelector('body');
        var navbarDefault = document.querySelector('#navbarDefault');
        var navbarTop = document.querySelector('#navbarTop');
        var topNavSlim = document.querySelector('#topNavSlim');
        var navbarTopSlim = document.querySelector('#navbarTopSlim');
        var navbarCombo = document.querySelector('#navbarCombo');
        var navbarComboSlim = document.querySelector('#navbarComboSlim');
        var dualNav = document.querySelector('#dualNav');

        var documentElement = document.documentElement;
        var navbarVertical = document.querySelector('.navbar-vertical');

        if (navbarPosition === 'dual-nav') {
          topNavSlim.remove();
          navbarTop.remove();
          navbarVertical.remove();
          navbarTopSlim.remove();
          navbarCombo.remove();
          navbarComboSlim.remove();
          navbarDefault.remove();
          dualNav.removeAttribute('style');
          document.documentElement.setAttribute('data-navigation-type', 'dual');

        } else if (navbarTopShape === 'slim' && navbarPosition === 'vertical') {
          navbarDefault.remove();
          navbarTop.remove();
          navbarTopSlim.remove();
          navbarCombo.remove();
          navbarComboSlim.remove();
          topNavSlim.style.display = 'block';
          navbarVertical.style.display = 'inline-block';
          document.documentElement.setAttribute('data-navbar-horizontal-shape', 'slim');

        } else if (navbarTopShape === 'slim' && navbarPosition === 'horizontal') {
          navbarDefault.remove();
          navbarVertical.remove();
          navbarTop.remove();
          topNavSlim.remove();
          navbarCombo.remove();
          navbarComboSlim.remove();
          dualNav.remove();
          navbarTopSlim.removeAttribute('style');
          document.documentElement.setAttribute('data-navbar-horizontal-shape', 'slim');
        } else if (navbarTopShape === 'slim' && navbarPosition === 'combo') {
          navbarDefault.remove();
          navbarTop.remove();
          topNavSlim.remove();
          navbarCombo.remove();
          navbarTopSlim.remove();
          dualNav.remove();
          navbarComboSlim.removeAttribute('style');
          navbarVertical.removeAttribute('style');
          document.documentElement.setAttribute('data-navbar-horizontal-shape', 'slim');
        } else if (navbarTopShape === 'default' && navbarPosition === 'horizontal') {
          navbarDefault.remove();
          topNavSlim.remove();
          navbarVertical.remove();
          navbarTopSlim.remove();
          navbarCombo.remove();
          navbarComboSlim.remove();
          dualNav.remove();
          navbarTop.removeAttribute('style');
          document.documentElement.setAttribute('data-navigation-type', 'horizontal');
        } else if (navbarTopShape === 'default' && navbarPosition === 'combo') {
          topNavSlim.remove();
          navbarTop.remove();
          navbarTopSlim.remove();
          navbarDefault.remove();
          navbarComboSlim.remove();
          dualNav.remove();
          navbarCombo.removeAttribute('style');
          navbarVertical.removeAttribute('style');
          document.documentElement.setAttribute('data-navigation-type', 'combo');


        } else {
          topNavSlim.remove();
          navbarTop.remove();
          navbarTopSlim.remove();
          navbarCombo.remove();
          navbarComboSlim.remove();
          dualNav.remove();
          navbarDefault.removeAttribute('style');
          navbarVertical.removeAttribute('style');
        }

        var navbarTopStyle = window.config.config.phoenixNavbarTopStyle;
        var navbarTop = document.querySelector('.navbar-top');
        if (navbarTopStyle === 'darker') {
          navbarTop.setAttribute('data-navbar-appearance', 'darker');
        }

        var navbarVerticalStyle = window.config.config.phoenixNavbarVerticalStyle;
        var navbarVertical = document.querySelector('.navbar-vertical');
        if (navbarVerticalStyle === 'darker') {
          navbarVertical.setAttribute('data-navbar-appearance', 'darker');
        }
      </script>
      <div class="content">
    @endif

        {{ $slot }}

    @if($request->routeIs('app.dash.*'))
        @include('components.dash.footer')
      </div>
    @endif

    @if( $request->routeIs('app.landing') )
      @include('components.newsletter')
      @include('components.footer')
    @endif

      @include('components.layouts.chat')
    </main><!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->


        <!-- ===============================================-->
        <!--    JavaScripts-->
        <!-- ===============================================-->
        <script src="{{asset('js/script.js')}}"></script>
        <script src="{{asset('vendors/popper/popper.min.js')}}"></script>
        <script src="{{asset('vendors/bootstrap/bootstrap.min.js')}}"></script>
        <script src="{{asset('vendors/anchorjs/anchor.min.js')}}"></script>
        <script src="{{asset('vendors/is/is.min.js')}}"></script>
        <script src="{{asset('vendors/fontawesome/all.min.js')}}"></script>
        <script src="{{asset('vendors/lodash/lodash.min.js')}}"></script>
        <script src="{{asset('v3/polyfill.min.js?features=window.scroll')}}"></script>
        <script src="{{asset('vendors/list.js/list.min.js')}}"></script>
        <script src="{{asset('vendors/feather-icons/feather.min.js')}}"></script>
        <script src="{{asset('vendors/dayjs/dayjs.min.js')}}"></script>
        <script src="{{asset('vendors/leaflet/leaflet.js')}}"></script>
        <script src="{{asset('vendors/leaflet.markercluster/leaflet.markercluster.js')}}"></script>
        <script src="{{asset('vendors/leaflet.tilelayer.colorfilter/leaflet-tilelayer-colorfilter.min.js')}}"></script>
        <script src="{{asset('assets/js/phoenix.js')}}"></script>
        <script src="{{asset('vendors/echarts/echarts.min.js')}}"></script>
        <script src="{{asset('assets/js/ecommerce-dashboard.js')}}"></script>
    </body>
</html>
