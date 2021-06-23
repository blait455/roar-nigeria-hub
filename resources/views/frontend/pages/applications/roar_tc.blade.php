@extends('frontend.layouts.app')

@section('title','Roar nigeria hub - WDTS registration')

@section('main-content')
    <!-- Breadcrumbs Start -->
    <div class="rs-breadcrumbs img3" style="background-image:url({{Storage::url('background/'.$background->e1_bg)}});">
        <div class="breadcrumbs-inner text-center">
            <h1 class="page-title">Roar Tech Community</h1>
            <ul>
                <li title="Roar Nigeria Hub - Where innovation lives">
                    <a class="active" href="{{ route('home') }}">Home</a>
                </li>
               <li>Registration form</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumbs End -->

    <!-- Contact Section Start -->
    <div class="rs-contact pt-120 md-pt-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 md-mb-60">
                   <div class="contact-box">
                        <div class="sec-title mb-45">
                            <span class="sub-text new-text white-color">Let's Talk</span>
                            <h2 class="title white-color">Speak With Professionals.</h2>
                        </div>
                       <div class="address-box mb-25">
                           <div class="address-icon">
                               <i class="fa fa-home"></i>
                           </div>
                           <div class="address-text">
                                <span class="label">Email:</span>
                                <a href="mailto:{{ $settings->email }}">{{ $settings->email }}</a>
                           </div>
                       </div>
                       <div class="address-box mb-25">
                           <div class="address-icon">
                               <i class="fa fa-phone"></i>
                           </div>
                           <div class="address-text">
                               <span class="label">Phone:</span>
                               <a href="tel:{{ $settings->phone }}">{{ $settings->phone }}</a>
                           </div>
                       </div>
                       <div class="address-box">
                           <div class="address-icon">
                               <i class="fa fa-map-marker"></i>
                           </div>
                           <div class="address-text">
                               <span class="label">Address:</span>
                               <div class="desc">{{ $settings->address }}</div>
                           </div>
                       </div>
                   </div>
                </div>
                <div class="col-lg-8 pl-70 md-pl-15">
                    <div class="contact-widget">
                        <div class="sec-title2 mb-40">
                            <span class="sub-text contact mb-15">RTC</span>
                            <h2 class="title testi-title">Roar Tech Community</h2>
                            <p>
                                Join Roar-TC to accelerate your skill through: 
                                <ol>
                                    <li>Networking Events</li>
                                    <li>Hackathons</li>
                                    <li>Hangouts &</li>
                                    <li>Moonlight coding</li>
                                </ol>

                                <h4>Benefits of joining Roar-TC</h4>
                                <ol>
                                    <li>Co-working space</li>
                                    <li>24/7 access to the hub</li>
                                    <li>Learn new skills <b>Professionaly</b></li>
                                    <li>Roar portfolio/e-ID</li>
                                    <li>Access to Roar-TC events/workshops & tech programs</li>
                                </ol>
                            </p>
                            <p><i>All it takes to join Roar-TC is your <b>Interest</b> no pre-requisite</i></p>
                        </div>
                        <div id="form-messages"></div>
                        <form id="contact-us" method="post" action="{{ route('rtc.store') }}" enctype="multipart/form-data">
                            @csrf
                            <fieldset>
                                <div class="row">
                                    <div class="col-lg-12 mb-30 col-md-6 col-sm-6">
                                        <label for="name">Full name</label>
                                        <input class="from-control" type="text" id="name" name="name" placeholder="e.g: Ekene Femi Musa " required>
                                    </div>
                                    <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                        <label for="email">Email</label>
                                        <input class="from-control" type="text" id="email" name="email" placeholder="please input a valid email" required="">
                                    </div>
                                    <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                        <label for="phone">Phone number</label>
                                        <input class="from-control" type="number" id="phone" name="phone" placeholder="e.g: 080224...." required="">
                                    </div>
                                    <div class="col-lg-12 mb-30 col-md-6 col-sm-6">
                                        <label for="phone">Department</label>
                                        <input class="from-control" type="text" id="dept" name="dept" placeholder="Course of study" required="">
                                    </div>
                                    <span class="col-lg-12" style="color: red;"><sup>*</sup><small>Choose a field you already belong to or are interested in and indicate your level</small></span>
                                    <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                        <label for="size">Field</label>
                                        <select class="from-control" name="field" id="" required="">
                                            <option value="">Choose your field</option>
                                            <option value="data science">Data science</option>
                                            <option value="web development">Web development</option>
                                            <option value="mobile app development">Mobile App development</option>
                                            <option value="ui/ux">UI/UX</option>
                                            <option value="graphic design">Graphic design</option>
                                            <option value="content creation/blogging">Content creation/Blogging</option>
                                            <option value="copywriting">Copywriting</option>
                                            <option value="robotics & ai">Robotics & AI</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                        <label for="size">Level</label>
                                        <select class="from-control" name="level" id="" required="">
                                            <option value="">Choose your level</option>
                                            <option value="yet to start">Yet to start</option>
                                            <option value="beginner">Beginner</option>
                                            <option value="intermediate">Intermediate</option>
                                            <option value="advanced">Advanced</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="btn-part">
                                    <div class="form-group mb-0">
                                        {{-- <input class="readon learn-more" type="submit"> --}}
                                        <button class="submit learn-more readon" type="submit">Submit</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="map-canvas pt-120 md-pt-80">
            {{-- <iframe src="https://maps.google.com/maps?q=rstheme&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe> --}}
        </div>
    </div>
    <!-- Contact Section Start -->
@endsection

@section('scripts')
<script>
    $('textarea#message').characterCounter();

    $(function(){
        $(document).on('submit','#contact-us',function(e){
            e.preventDefault();

            var data = $(this).serialize();
            var url = "{{ route('contact.store') }}";
            var btn = $('#msgsubmitbtn');

            $.ajax({
                type: 'POST',
                url: url,
                data: data,
                beforeSend: function() {
                    $(btn).addClass('disabled');
                    $(btn).empty().append('<span>LOADING...</span><i class="material-icons right">rotate_right</i>');
                },
                success: function(data) {
                    if (data.message) {
                        M.toast({html: data.message, classes:'green darken-4'})
                    }
                },
                error: function(xhr) {
                    M.toast({html: 'ERROR: Failed to send message!', classes: 'red darken-4'})
                },
                dataType: 'json'
            });

        })
    })

</script>
@endsection
