<!DOCTYPE html>
<html lang="zxx">
    <head>
        @include('frontend.partials.head')
        <!-- Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
        @yield('styles')
    </head>

    <body class="default-home">
        <!--Preloader area start here-->
        <div id="loader" class="loader">
            <div class="loader-container"></div>
        </div>
        <!--Preloader area End here-->

        {{-- @include('frontend.layouts.notification') --}}
        <div class="main-content">
            <div class="full-width-header">
                <!-- Header -->
                @include('frontend.partials.header')
                <!--/ End Header -->
            </div>
            @yield('main-content')
        </div>

        @include('frontend.partials.footer')
    </body>
  </html>
  {{-- <li class="category-bg-image" style="background-image:url({{Storage::url('category/slider/'.$category->image)}});"> --}}
