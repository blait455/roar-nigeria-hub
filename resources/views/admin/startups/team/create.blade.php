@extends('backend.layouts.app')

@section('title', 'Create Team')

@push('styles')

    <link rel="stylesheet" href="{{asset('backend/plugins/bootstrap-select/css/bootstrap-select.css')}}">

@endpush


@section('content')

    <div class="block-header"></div>

    <div class="row clearfix">
        <form action="{{route('admin.steam.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>NEW TEAM MEMBER</h2>
                    </div>
                    <div class="body">
                        <div class="form-group">
                            <div class="form-line">
                                <label class="form-label">Name</label><br><br>
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label class="form-label">Email</label><br><br>
                                <input type="text" name="email" class="form-control">
                            </div>
                        </div><div class="form-group">
                            <div class="form-line">
                                <label class="form-label">Phone</label><br><br>
                                <input type="text" name="phone" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label class="form-label">Skill</label><br><br>
                                <input type="text" name="skill" class="form-control">
                            </div>
                        </div>

                        {{-- <div class="form-group">
                            <div class="form-line">
                                <label class="form-label">Desciption</label><br><br>
                                <textarea name="description" rows="4" id=""></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label class="form-label">Bio</label><br><br>
                                <textarea name="bio" rows="4" id="tinymce"></textarea>
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
                                <label>Select Startup</label>
                                <select name="startup_id" class="form-control show-tick">
                                    @foreach($startups as $startup)
                                        <option value="{{$startup->id}}">{{$startup->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <img src="/" id="image-imgsrc" class="img-responsive">
                            <input type="file" name="image" id="image-image-input" style="display:none;">
                            <button type="button" class="btn bg-grey btn-sm waves-effect m-t-15" id="image-image-btn">
                                <i class="material-icons">image</i>
                                <span>UPLOAD IMAGE</span>
                            </button>
                        </div><hr>

                        {{-- <div class="form-group">
                            <div class="form-line">
                                <label class="form-label">Facebook</label><br><br>
                                <input type="text" name="facebook" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-line">
                                <label class="form-label">Instagram</label><br><br>
                                <input type="text" name="instagram" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-line">
                                <label class="form-label">Twitter</label><br><br>
                                <input type="text" name="twitter" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-line">
                                <label class="form-label">LinkedIn</label><br><br>
                                <input type="text" name="linkedin" class="form-control">
                            </div>
                        </div> --}}

                        <a href="{{route('admin.steam.index')}}" class="btn btn-danger btn-lg m-t-15 waves-effect">
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

