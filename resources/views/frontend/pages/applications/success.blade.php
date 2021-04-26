@extends('frontend.layouts.app')

@section('title','Roar nigeria hub - Contact Page')

@section('main-content')
    <!-- Breadcrumbs Start -->
    <div class="rs-breadcrumbs img3" style="background-image:url({{Storage::url('background/'.$background->s1_bg)}});">
        <div class="breadcrumbs-inner text-center">
            <h1 class="page-title">Roar Bussiness Incubation</h1>
            <ul>
                <li title="Roar Nigeria Hub - Where innovation lives">
                    <a class="active" href="{{ route('home') }}">Home</a>
                </li>
               <li>Incubation form</li>
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
                           <span class="sub-text contact mb-15">Success</span>
                           {{-- <h2 class="title testi-title">Incubation Registration form</h2> --}}

                       </div>
                        <div id="form-messages"></div>
                        <fieldset>
                            <div class="row">
                                <div class="col-lg-12 mb-30 col-md-6 col-sm-6">
                                    <h1>Your application has been recieved.</h1>
                                    <p>you will be contacted via email.</p>
                                </div>
                            </div>
                            <div class="btn-part">
                                <div class="form-group mb-0">
                                    {{-- <input class="readon learn-more" type="submit"> --}}
                                    <button class="submit learn-more readon" type="submit">Submit</button>
                                </div>
                            </div>
                        </fieldset>
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
