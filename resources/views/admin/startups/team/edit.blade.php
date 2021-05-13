@extends('backend.layouts.app')

@section('title', 'Edit Team')

@push('styles')

    <link rel="stylesheet" href="{{asset('backend/plugins/bootstrap-select/css/bootstrap-select.css')}}">

@endpush


@section('content')

    <div class="block-header"></div>

    <div class="row clearfix">
        <form action="{{route('admin.steam.update', $team->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>EDIT {{ $team->name }}</h2>
                    </div>
                    <div class="body">
                        <div class="form-group">
                            <div class="form-line">
                                <label class="form-label">Name</label><br><br>
                                <input type="text" name="name" class="form-control" value="{{ $team->name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label class="form-label">Email</label><br><br>
                                <input type="text" name="email" class="form-control" value="{{ $team->email }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label class="form-label">Phone number</label><br><br>
                                <input type="text" name="phone" class="form-control" value="{{ $team->phone }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-line">
                                <label class="form-label">Skill</label><br><br>
                                <input type="text" name="skill" class="form-control" value="{{ $team->skill }}">
                            </div>
                        </div>

                        {{-- <div class="form-group">
                            <div class="form-line">
                                <label class="form-label">Description</label><br><br>
                                <textarea class="form-control" name="description" rows="4" id="">{{ $team->description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label class="form-label">Bio</label><br><br>
                                <textarea name="bio" rows="4" id="tinymce">{{ $team->bio }}</textarea>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>MEDIA</h2>
                    </div>
                    <div class="body">
                        <div class="form-group form-float">
                            <div class="form-line {{$errors->has('startups') ? 'focused error' : ''}}">
                                <label for="categories">Select Startup</label>
                                <select name="startup_id" class="form-control show-tick" id="startups">
                                    @foreach($startups as $startup)
                                    <option value="{{$startup->id}}" {{ $startup->id == $team->startup->id ? 'selected' : '' }} >{{$startup->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <img src="{{Storage::url('startups/team/'.$team->image)}}" id="image-imgsrc" class="img-responsive">
                            <input type="file" name="image" id="image-image-input" style="display:none;">
                            <button type="button" class="btn bg-grey btn-sm waves-effect m-t-15" id="image-image-btn">
                                <i class="material-icons">image</i>
                                <span>UPLOAD IMAGE</span>
                            </button>
                        </div><hr>

                        {{-- <div class="form-group">
                            <div class="form-line">
                                <label class="form-label">Facebook</label><br><br>
                                <input type="text" name="facebook" class="form-control" value="{{ $team->facebook }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-line">
                                <label class="form-label">Instagram</label><br><br>
                                <input type="text" name="instagram" class="form-control"  value="{{ $team->instagram }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-line">
                                <label class="form-label">Twitter</label><br><br>
                                <input type="text" name="twitter" class="form-control"  value="{{ $team->twitter }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-line">
                                <label class="form-label">LinkedIn</label><br><br>
                                <input type="text" name="linkedin" class="form-control" value="{{ $team->linkedin }}">
                            </div>
                        </div> --}}

                        <a href="{{route('admin.steam.index')}}" class="btn btn-danger btn-lg m-t-15 waves-effect">
                            <i class="material-icons left">arrow_back</i>
                            <span>BACK</span>
                        </a>

                        <button type="submit" class="btn btn-indigo btn-lg m-t-15 waves-effect">
                            <i class="material-icons">save</i>
                            <span>UPDATE</span>
                        </button>

                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection


@push('scripts')
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
        });
    </script>
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

@endpush

