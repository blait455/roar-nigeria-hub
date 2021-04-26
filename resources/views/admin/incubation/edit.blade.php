@extends('backend.layouts.app')

@section('title', 'Create Post')

@push('styles')

    <link rel="stylesheet" href="{{asset('backend/plugins/bootstrap-select/css/bootstrap-select.css')}}">

@endpush


@section('content')

    <div class="block-header"></div>

    <div class="row clearfix">
        <form action="{{route('admin.incubation.update', $application->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>EDIT APPLICATION</h2>
                </div>
                <div class="body">

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="name" class="form-control" value="{{ $application->name }}">
                            <label class="form-label">Idea/Venture name</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="reason" class="form-control" value="{{ $application->reason }}">
                            <label class="form-label">Why this idea</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="problem" class="form-control" value="{{ $application->problem }}">
                            <label class="form-label">What is the problem you are solving</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="motivation" class="form-control" value="{{ $application->motivation }}">
                            <label class="form-label">What is your motivation</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="idea_duration" class="form-control" value="{{ $application->idea_duration }}">
                            <label class="form-label">How long have you been working on the idea</label>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" name="age" class="form-control" value="{{ $application->age }}">
                            <label class="form-label">How old are you</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="fav_color" class="form-control" value="{{ $application->fav_color }}">
                            <label class="form-label">What is your favorite color</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="fav_subject" class="form-control" value="{{ $application->fav_subject }}">
                            <label class="form-label">What was your favourite subject back in High school</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="course" class="form-control" value="{{ $application->course }}">
                            <label class="form-label">What is your course of study in UNN</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="biz_experience" class="form-control" value="{{ $application->biz_experience }}">
                            <label class="form-label">Share with us your business experience if any</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" name="phone" class="form-control" value="{{ $application->phone }}">
                            <label class="form-label">Phone number</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="email" class="form-control" value="{{ $application->email }}">
                            <label class="form-label">Email</label>
                        </div>
                    </div>
                    <hr>
                    <label class="form-label">Status</label>
                    <div class="row">
                        <div class="form-check form-check-inline col-md-4">
                            <input class="form-check-input" type="radio" name="status" id="incubatee" value="1" {{ $application->status == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="incubatee">Incubatee</label>
                        </div>
                        <div class="form-check form-check-inline col-md-4">
                            <input class="form-check-input" type="radio" name="status" id="mvp" value="2" {{ $application->status == 2 ? 'checked' : '' }}>
                            <label class="form-check-label" for="mvp">MVP</label>
                        </div>
                        <div class="form-check form-check-inline col-md-4">
                            <input class="form-check-input" type="radio" name="status" id="pmvp" value="3" {{ $application->status == 3 ? 'checked' : '' }}>
                            <label class="form-check-label" for="pmvp">Post MVP</label>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="">Full description of the idea</label>
                        <textarea name="idea_description" id="tinymce">{{ $application->idea_description }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>SELECT </h2>
                </div>
                <div class="body">

                    <div class="form-group form-float">
                        <div class="form-line {{$errors->has('aspects') ? 'focused error' : ''}}">
                            <label>Select Aspect</label>
                            <select name="aspect_id" class="form-control show-tick">
                                @foreach($aspects as $aspect)
                                    <option value="{{$aspect->id}}" {{ $application->aspect_id == $aspect->id ? 'checked' : '' }}>{{$aspect->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line {{$errors->has('type') ? 'focused error' : ''}}">
                            <label>Select Idea type</label>
                            <select name="type" class="form-control show-tick">
                                    <option value="">Select type</option>
                                    <option value="software" {{ $application->type = 'software' ? 'checked' : '' }}>Software</option>
                                    <option value="non software" {{ $application->type == 'non software' ? 'checked' : '' }}>Non software</option>
                                    <option value="both" {{ $application->type == 'both' ? 'checked' : '' }}>Both</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line {{$errors->has('type') ? 'focused error' : ''}}">
                            <label>How did you hear about us</label>
                            <select name="medium_aware" class="form-control show-tick">
                                    <option value="">Select</option>
                                    <option value="friend" {{ $application->medium_aware == 'friend' ? 'checked' : '' }}>From a friend</option>
                                    <option value="social media" {{ $application->medium_aware == 'social media' ? 'checked' : '' }}>On social media</option>
                                    <option value="advert" {{ $application->medium_aware == 'advert' ? 'checked' : '' }}>An advert</option>
                            </select>
                        </div>
                    </div><hr>

                    <a href="{{route('admin.incubation.index')}}" class="btn btn-danger btn-lg m-t-15 waves-effect">
                        <i class="material-icons left">arrow_back</i>
                        <span>BACK</span>
                    </a>

                    <button type="submit" class="btn btn-indigo btn-lg m-t-15 waves-effect">
                        <i class="material-icons">save</i>
                        <span>SAVE</span>
                    </button>

                </div>
            </div>
        </div>
        </form>
    </div>

@endsection


@push('scripts')

    <script src="{{ asset('backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
    <script src="{{asset('backend/plugins/tinymce/tinymce.js')}}"></script>
    <script>
        $(function () {
            tinymce.init({
                selector: "textarea#tinymce",
                theme: "modern",
                height: 300,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true
            });
            tinymce.suffix = ".min";
            tinyMCE.baseURL = '{{asset('backend/plugins/tinymce')}}';
        });
    </script>
    <script>
        $(function(){
            function showImage(fileInput,imgID){
                if (fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $(imgID).attr('src',e.target.result);
                        $(imgID).attr('alt',fileInput.files[0].name);
                    }
                    reader.readAsDataURL(fileInput.files[0]);
                }
            }
            // image
            $('#image-image-btn').on('click', function(){
                $('#image-image-input').click();
            });
            $('#image-image-input').on('change', function(){
                showImage(this, '#image-imgsrc');
            });

            // logo
            $('#logo-image-btn').on('click', function(){
                $('#logo-image-input').click();
            });
            $('#logo-image-input').on('change', function(){
                showImage(this, '#logo-imgsrc');
            });
        });
    </script>
@endpush
