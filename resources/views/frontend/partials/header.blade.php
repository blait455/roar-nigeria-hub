<header id="rs-header" class="rs-header">
    <!-- Topbar Area Start -->
    <div class="topbar-area">
        <div class="container">
            <div class="row rs-vertical-middle">
                <div class="col-lg-2">
                    <div class="logo-part">
                        <a href="{{ route('home') }}"><img src="{{ Storage::url('settings/'.$settings->logo) }}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-10 text-right">
                    <ul class="rs-contact-info">
                        <li class="contact-part">
                            <i class="flaticon-location"></i>
                            <span class="contact-info">
                                <span>Address</span>
                                {{ $settings->address }}
                            </span>
                        </li>
                        <li class="contact-part">
                            <i class="flaticon-email"></i>
                            <span class="contact-info">
                                <span>E-mail</span>
                                <a href="mailto:{{ $settings->email }}">{{ $settings->email }}</a>
                            </span>
                        </li>
                        <li class="contact-part no-border">
                             <i class="flaticon-call"></i>
                            <span class="contact-info">
                                <span>Phone</span>
                                <a href="tel:{{ $settings->phone }}">{{ $settings->phone }}</a>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar Area End -->

    <!-- Menu Start -->
    <div class="menu-area menu-sticky">
        <div class="container">
            <div class="logo-area">
                <a href="{{ route('home') }}">
                    <img class="sticky-logo" src="{{ Storage::url('settings/'.$settings->logo) }}" alt="logo">
                </a>
            </div>
            <div class="rs-menu-area">
                <div class="main-menu">
                    <div class="mobile-menu">
                        <a href="{{ route('home') }}" class="mobile-logo">
                            <img src="{{ Storage::url('settings/'.$settings->logo) }}" alt="logo">
                        </a>
                        <a href="#" class="rs-menu-toggle rs-menu-toggle-close">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                    <nav class="rs-menu">
                        <ul class="nav-menu">
                            <li class="{{Request::path() == 'home' ? 'current-menu-item' : ''}}">
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="{{Request::path() == 'about-us' ? 'current-menu-item' : ''}}">
                                <a href="{{ route('about-us') }}">About Us</a>
                            </li>
                            <li class="{{Request::path() == 'startups' ? 'current-menu-item' : ''}}">
                                <a href="{{ route('startups') }}">Startups</a>
                            </li>
                            <li>
                                <a href="{{ route('events') }}">Events</a>
                            </li>

                            <li class="">
                               <a href="{{ route('blog') }}">Blog</a>
                            </li>
                            <li>
                                <a href="{{ route('contact') }}">Contact Us</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Apply Here</a>
                                <ul class="sub-menu">
                                    <li><a href="{{ route('incubation') }}">Startup/Business incubation</a> </li>
                                    <li><a href="#">Volunteer</a></li>
                                    <li><a href="#">Master Class Facilitator</a></li>
                                    <li><a href="#">Mentor/Coach</a></li>
                                    <li><a href="#">Roar Angels Network</a></li>
                                    <li><a href="#">Roar Technology Community</a></li>
                                </ul>
                            </li>
                            |
                            @auth
                                <li>
                                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('login') }}">Login</a>
                                </li>
                                <li>
                                    <a href="{{ route('register') }}">Register</a>
                                </li>
                            @endauth
                        </ul> <!-- //.nav-menu -->
                    </nav>
                </div> <!-- //.main-menu -->
            </div>
            <div class="expand-btn-inner search-icon hidden-sticky hidden-md">
                <ul>
                    <li class="sidebarmenu-search">
                        <a class="hidden-xs rs-search" data-target=".search-modal" data-toggle="modal" href="#">
                            <i class="flaticon-search"></i>
                        </a>
                    </li>
                </ul>
                <div class="toolbar-sl-share">
                    <ul class="social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Menu End -->
</header>
