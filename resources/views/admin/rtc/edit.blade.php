@extends('backend.layouts.app')

@section('title', 'Edit startup')

@push('styles')

    <link rel="stylesheet" href="{{asset('backend/plugins/bootstrap-select/css/bootstrap-select.css')}}">

@endpush


@section('content')

    <div class="block-header"></div>

    <div class="row clearfix">
        <form action="{{route('admin.rtc.update', $student->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>EDIT STARTUP</h2>
                </div>
                <div class="body">

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="name" class="form-control" value="{{ $student->name }}">
                            <label class="form-label">Full name</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="phone" class="form-control" value="{{ $student->phone }}">
                            <label class="form-label">Phone number</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="email" class="form-control" value="{{ $student->email }}">
                            <label class="form-label">email</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="dept" class="form-control" value="{{ $student->dept }}">
                            <label class="form-label">Department</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>STACK</h2>
                </div>
                <div class="body">
                    <div class="form-group form-float">
                        <div class="form-line ">
                            <label for="field">Field</label>
                            <select name="field" class="form-control show-tick" id="field">
                                <option value="">Select field</option>
                                <option value="data science" {{ $student->field == 'data science' ? 'selected' : ''}}>Data science</option>
                                <option value="web development" {{ $student->field == 'web development' ? 'selected' : ''}}>Web development</option>
                                <option value="mobile app development" {{ $student->field == 'mobile app development' ? 'selected' : ''}}>Mobile App development</option>
                                <option value="ui/ux" {{ $student->field == 'ui/ux' ? 'selected' : ''}}>UI/UX</option>
                                <option value="quantum computing" {{ $student->field == 'quantum computing' ? 'selected' : ''}}>Quantum computing</option>
                                <option value="graphic design" {{ $student->field == 'graphic design' ? 'selected' : ''}}>Graphic design</option>
                                <option value="content creation/blogging" {{ $student->field == 'content creation/blogging' ? 'selected' : ''}}>Content creation/Blogging</option>
                                <option value="copywriting" {{ $student->field == 'copywriting' ? 'selected' : ''}}>Copywriting</option>
                                <option value="robotics & ai" {{ $student->field == 'robotics & ai' ? 'selected' : ''}}>Robotics & AI</option>
                            </select>
                        </div>
                    </div><div class="form-group form-float">
                        <div class="form-line ">
                            <label for="field">Level</label>
                            <select name="level" class="form-control show-tick" id="field">
                                <option value="">Select level</option>
                                <option value="yet to start" {{ $student->level == 'yet to start' ? 'selected' : ''}}>Yet to start</option>
                                <option value="beginner" {{ $student->level == 'beginner' ? 'selected' : ''}}>Beginner</option>
                                <option value="intermediate" {{ $student->level == 'intermediate' ? 'selected' : ''}}>Intermediate</option>
                                <option value="advanced" {{ $student->level == 'advanced' ? 'selected' : ''}}>Advanced</option>
                            </select>
                        </div>
                    </div>
                    <a href="{{route('admin.rtc.index')}}" class="btn btn-danger btn-lg m-t-15 waves-effect">
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
