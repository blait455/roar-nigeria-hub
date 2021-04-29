@extends('frontend.layouts.app')

@section('title','Roar nigeria hub - Bussiness incubation application')

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
                           {{-- <span class="sub-text contact mb-15">Get In Touch</span> --}}
                           <h2 class="title testi-title">Incubation Registration form</h2>

                       </div>
                        <div id="form-messages"></div>
                        <form id="contact-us" method="post" action="{{ route('incubation.store') }}">
                            @csrf
                            <fieldset>
                                <div class="row">
                                    <div class="col-lg-12 mb-30 col-md-6 col-sm-6">
                                        <input class="from-control" type="text" id="name" name="name" placeholder="Idea/Venture name" required="">
                                    </div>
                                    <div class="col-lg-12 mb-30 col-md-6 col-sm-6">
                                        <input class="from-control" type="text" id="reason" name="reason" placeholder="Why this idea" required="">
                                    </div>
                                    <div class="col-lg-12 mb-30 col-md-6 col-sm-6">
                                        <input class="from-control" type="text" id="problem" name="problem" placeholder="What is the problem you are solving" required="">
                                    </div>
                                    <div class="col-lg-12 mb-30 col-md-6 col-sm-6">
                                        <input class="from-control" type="text" id="motivation" name="motivation" placeholder="What is your motivation" required="">
                                    </div>
                                    <div class="col-lg-12 mb-30 col-md-6 col-sm-6">
                                        {{-- <label for="">How long have you been working on the idea</label> --}}
                                        <input class="from-control" type="text" id="idea_duration" name="idea_duration" placeholder="How long have you been working on the idea" required="">
                                    </div>
                                    <div class="col-lg-12 mb-30 col-md-6 col-sm-6">
                                        <input class="from-control" type="text" id="biz_experience" name="biz_experience" placeholder="Share with us your bussinesss experience if any" required="">
                                    </div>
                                    <div class="col-lg-12 mb-30">
                                        <textarea class="from-control" id="idea_description" name="idea_description" placeholder="Decribe your idea" required=""></textarea>
                                    </div>
                                    <hr>
                                    <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                        <input class="from-control" type="text" id="email" name="email" placeholder="E-Mail" required="">
                                    </div>
                                    <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                        <input class="from-control" type="number" id="phone" name="phone" placeholder="Phone Number" required="">
                                    </div>
                                    <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                        <input class="from-control" type="number" id="age" name="age" placeholder="How old are you" required="">
                                    </div>

                                    <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                        <input class="from-control" type="text" id="fav_color" name="fav_color" placeholder="What is your favorite color" required="">
                                    </div>

                                    <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                        <input class="from-control" type="text" id="fav_subject" name="fav_subject" placeholder="What is your favourite subject in high school" required="">
                                    </div>
                                    <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                        <input class="from-control" type="text" id="course" name="course" placeholder="What is your course of study in UNN" required="">
                                    </div>
                                    {{-- <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                        <input class="from-control" type="text" id="reg_no" name="reg_no" placeholder="What is your students' registration number">
                                    </div> --}}
                                    <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                        <select class="from-control" name="type" id="" required="">
                                            <option value="">Your idea type</option>
                                            <option value="software">Software</option>
                                            <option value="non software">Non software</option>
                                            <option value="both">Both</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                        <select class="from-control" name="medium_aware" id="" required="">
                                            <option value="">How did you hear about us</option>
                                            <option value="friend">From a friend</option>
                                            <option value="social media">On social media</option>
                                            <option value="advert">An advert</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-12 mb-30 col-md-6 col-sm-6">
                                        <select class="from-control" name="aspect_id" id="" required="">
                                            <option value="">Select your Idea's Category</option>
                                            @foreach ($aspects as $aspect)
                                                <option value="{{ $aspect->id }}">{{ $aspect->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="card col-lg-12 from-control">
                                        <div class="card-title">
                                            <h4 class="text-center">Add team members</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive col-lg-12">
                                                <table class="table table-bordered table-hover" id="tab_logic">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">SL.</th>
                                                        <th class="text-center">Name</th>
                                                        <th class="text-center">Email</th>
                                                        <th class="text-center">Phone</th>
                                                        <th class="text-center">Skill</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr id='addr0'>
                                                        <td class="text-center">1</td>
                                                        <td class="text-center"><input type="text" name="tname[]" class="form-controll" required></td>
                                                        <td class="text-center"><input type="email" name="temail[]" class="form-controll" required></td>
                                                        <td class="text-center"><input type="number" name="tphone[]" class="form-controll" required></td>
                                                        <td class="text-center"><input type="text" name="tskill[]" class="form-controll" required></td>
                                                    </tr>
                                                    <tr id='addr1'></tr>
                                                </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-12"><br>
                                                <button type="button" id="add_row" class="btn btn-primary float-left">Add Row</button>
                                                <button id='delete_row' type="button" class="float-right btn btn-danger">Remove Row</button>
                                            </div>
                                        </div>
                                      </div>
                                        <br>
                                    </div>

                                </div><br>
                                <div class="btn-part">
                                    <div class="form-group mb-0">
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
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script>
        $(document).ready(function(){
            var i=1;
            $("#add_row").click(function(){b=i-1;
                $('#addr'+i).html($('#addr'+b).html()).find('td:first-child').html(i+1);
                $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
                i++;
            });
            $("#delete_row").click(function(){
                if(i>1){
                $("#addr"+(i-1)).html('');
                i--;
                }
                calc();
            });
        });
    </script>
@endsection

@section('scripts')
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script>
        $(document).ready(function(){
            var i=1;
            $("#add_row").click(function(){b=i-1;
                $('#addr'+i).html($('#addr'+b).html()).find('td:first-child').html(i+1);
                $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
                i++;
            });
            $("#delete_row").click(function(){
                if(i>1){
                $("#addr"+(i-1)).html('');
                i--;
                }
                calc();
            });
        });
    </script>

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
