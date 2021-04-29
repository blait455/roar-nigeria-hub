@extends('backend.layouts.app')

@section('title', 'Edit startup')

@push('styles')

    <link rel="stylesheet" href="{{asset('backend/plugins/bootstrap-select/css/bootstrap-select.css')}}">

@endpush


@section('content')

    <div class="block-header"></div>

    <div class="row clearfix">
        <form action="{{route('admin.startup.update', $startup->id)}}" method="POST" enctype="multipart/form-data">
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
                            <input type="text" name="name" class="form-control" value="{{ $startup->name }}">
                            <label class="form-label">Venture name</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="phone" class="form-control" value="{{ $startup->phone }}">
                            <label class="form-label">Phone number</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="email" class="form-control" value="{{ $startup->email }}">
                            <label class="form-label">email</label>
                        </div>
                    </div>

                    <label class="form-label">Status</label>
                    <div class="row">
                        <div class="form-check form-check-inline col-md-4">
                            <input class="form-check-input" type="radio" name="status" id="incubatee" value="1" {{ $startup->status == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="incubatee">Incubatee</label>
                        </div>
                        <div class="form-check form-check-inline col-md-4">
                            <input class="form-check-input" type="radio" name="status" id="mvp" value="2" {{ $startup->status == 2 ? 'checked' : '' }}>
                            <label class="form-check-label" for="mvp">MVP</label>
                        </div>
                        <div class="form-check form-check-inline col-md-4">
                            <input class="form-check-input" type="radio" name="status" id="pmvp" value="3" {{ $startup->status == 3 ? 'checked' : '' }}>
                            <label class="form-check-label" for="pmvp">Post MVP</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="idea" class="form-control" value="{{ $startup->idea }}">
                            <label class="form-label">Idea or problem you are solving</label>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="">Body</label>
                        <textarea name="description" id="tinymce">{{ $startup->description }}</textarea>
                    </div>

                </div>
            </div>
            <div class="card">
                <div class="header">
                    <h2>TEAM MEMBERS</h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="tab_logic">
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
                                @foreach ($startup->team as $member)
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-center"><input type="text" name="tname[]" class="form-controll" value="{{ $member->name }}"></td>
                                        <td class="text-center"><input type="text" name="temail[]" class="form-controll" value="{{ $member->email }}"></td>
                                        <td class="text-center"><input type="text" name="tphone[]" class="form-controll" value="{{ $member->phone }}"></td>
                                        <td class="text-center"><input type="text" name="tskill[]" class="form-controll" value="{{ $member->skill }}"></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
                                    <option value="{{$aspect->id}}" {{ $startup->aspect_id == $aspect->id ? 'checked' : '' }}>{{$aspect->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <img src="{{ Storage::url('startups/'.$startup->image) }}" id="image-imgsrc" class="img-responsive">
                        <input type="file" name="image" id="image-image-input" style="display:none;">
                        <button type="button" class="btn bg-grey btn-sm waves-effect m-t-15" id="image-image-btn">
                            <i class="material-icons">image</i>
                            <span>UPLOAD GROUP IMAGE</span>
                        </button>
                    </div><hr>
                    <div class="form-group">
                        <img src="{{ Storage::url('startups/'.$startup->logo) }}" id="logo-imgsrc" class="img-responsive">
                        <input type="file" name="logo" id="logo-image-input" style="display:none;">
                        <button type="button" class="btn bg-grey btn-sm waves-effect m-t-15" id="logo-image-btn">
                            <i class="material-icons">image</i>
                            <span>UPLOAD LOGO</span>
                        </button>
                    </div><hr>

                    <a href="{{route('admin.startup.index')}}" class="btn btn-danger btn-lg m-t-15 waves-effect">
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
