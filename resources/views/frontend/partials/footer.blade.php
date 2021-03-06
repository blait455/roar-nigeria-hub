        <!-- Footer Start -->
        <footer id="rs-footer" class="rs-footer"  style="background-image:url({{Storage::url('background/'.$background->f5_bg)}});">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-12 col-sm-12 footer-widget">
                            <div class="footer-logo mb-30">
                                <a href="{{ route('home') }}"><img src="{{ Storage::url('settings/'.$settings->logo) }}" alt=""></a>
                            </div>
                            <div class="textwidget pb-30"><p>{{ $settings->about }}</p>
                            </div>
                            <ul class="footer-social md-mb-30">
                                <li>
                                    <a href="{{ $settings->facebook }}" target="_blank"><span><i class="fa fa-facebook"></i></span></a>
                                </li>
                                <li>
                                    <a href="{{ $settings->twitter }}" target="_blank"><span><i class="fa fa-twitter"></i></span></a>
                                </li>
                                <li>
                                    <a href="{{ $settings->linkedin }}" target="_blank"><span><i class="fa fa-linkedin"></i></span></a>
                                </li>
                                <li>
                                    <a href="{{ $settings->instagram }}" target="_blank"><span><i class="fa fa-instagram"></i></span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12 pl-45 md-pl-15 md-mb-30">
                            <h3 class="widget-title">Our Aspects</h3>
                            <ul class="site-map">
                                <li><a href="/">Technology</a></li>
                                <li><a href="/">Innovation & Entrepreneurship</a></li>
                                <li><a href="/">Bussiness incubation</a></li>
                                <li><a href="/">Consultancy</a></li>
                                <li><a href="/">Support</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12 md-mb-30">
                            <h3 class="widget-title">Contact Info</h3>
                            <ul class="address-widget">
                                <li>
                                    <i class="flaticon-location"></i>
                                    <div class="desc">{{ $settings->address }}</div>
                                </li>
                                <li>
                                    <i class="flaticon-call"></i>
                                    <div class="desc">
                                       <a href="tel:{{ $settings->phone }}">{{ $settings->phone }}</a>
                                    </div>
                                </li>
                                <li>
                                    <i class="flaticon-email"></i>
                                    <div class="desc">
                                        <a href="mailto:{{ $settings->email }}">{{ $settings->email }}</a>
                                    </div>
                                </li>
                                <li>
                                    <i class="flaticon-clock-1"></i>
                                    <div class="desc">
                                        Opening Hours: 10:00 - 18:00
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12">
                            <h3 class="widget-title">Newsletter</h3>
                            <p class="widget-desc">Subscribe to our newsletter.</p>
                            <p>
                                {{-- <form action="{{ route('subscribe') }}" method="post" class="form"> --}}
                                    <input type="email" name="EMAIL" placeholder="Your email address" required="">
                                    <em class="paper-plane"><input type="submit" value="Sign up"></em>
                                    <i class="flaticon-send"></i>
                                {{-- </form> --}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row y-middle">
                        <div class="col-lg-6 text-right md-mb-10 order-last">
                            <ul class="copy-right-menu">
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li><a href="{{ route('about-us') }}">About</a></li>
                                <li><a href="{{ route('blog') }}">Blog</a></li>
                                <li><a href="{{ route('startups') }}">Startups</a></li>
                                <li><a href="{{ route('contact') }}">Contact</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <div class="copyright">
                                <p>&copy; {{ $settings->footer }}.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer End -->

        <!-- start scrollUp  -->
        <div id="scrollUp" class="orange-color">
            <i class="fa fa-angle-up"></i>
        </div>
        <!-- End scrollUp  -->

        <!-- Search Modal Start -->
        <div aria-hidden="true" class="modal fade search-modal" role="dialog" tabindex="-1">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span class="flaticon-cross"></span>
            </button>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="search-block clearfix">
                        <form>
                            <div class="form-group">
                                <input class="form-control" placeholder="Search Here..." type="text">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Search Modal End -->

        <!-- modernizr js -->
        <script src="{{ asset('frontend/assets/js/modernizr-2.8.3.min.js') }}"></script>
        <!-- jquery latest version -->
        <script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
        <!-- Bootstrap v4.4.1 js -->
        <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
        <!-- Menu js -->
        <script src="{{ asset('frontend/assets/js/rsmenu-main.js') }}"></script>
        <!-- op nav js -->
        <script src="{{ asset('frontend/assets/js/jquery.nav.js') }}"></script>
        <!-- owl.carousel js -->
        <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
        <!-- wow js -->
        <script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
        <!-- Skill bar js -->
        <script src="{{ asset('frontend/assets/js/skill.bars.jquery.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/jquery.counterup.min.js') }}"></script>
        <!-- counter top js -->
        <script src="{{ asset('frontend/assets/js/waypoints.min.js') }}"></script>
        <!-- swiper js -->
        <script src="{{ asset('frontend/assets/js/swiper.min.js') }}"></script>
        <!-- particles js -->
        <script src="{{ asset('frontend/assets/js/particles.min.js') }}"></script>
        <!-- magnific popup js -->
        <script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
        <!-- plugins js -->
        <script src="{{ asset('frontend/assets/js/plugins.js') }}"></script>
        <!-- pointer js -->
        <script src="{{ asset('frontend/assets/js/pointer.js') }}"></script>
        <!-- contact form js -->
        <script src="{{ asset('frontend/assets/js/contact.form.js') }}"></script>
        <!-- main js -->
        <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
