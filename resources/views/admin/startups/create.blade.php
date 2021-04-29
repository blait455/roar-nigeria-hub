@extends('backend.layouts.app')

@section('title', 'Create startup')

@push('styles')

    <link rel="stylesheet" href="{{asset('backend/plugins/bootstrap-select/css/bootstrap-select.css')}}">

@endpush


@section('content')

    <div class="block-header"></div>

    <div class="row clearfix">
        <form action="{{route('admin.startup.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>CREATE STARTUP</h2>
                </div>
                <div class="body">

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="name" class="form-control" value="{{old('name')}}">
                            <label class="form-label">Venture name</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="phone" class="form-control" value="{{old('phone')}}">
                            <label class="form-label">Phone number</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="email" class="form-control" value="{{old('email')}}">
                            <label class="form-label">Email</label>
                        </div>
                    </div>

                    <label class="form-label">Status</label>
                    <div class="row">
                        <div class="form-check form-check-inline col-md-4">
                            <input class="form-check-input" type="radio" name="status" id="incubatee" value="1">
                            <label class="form-check-label" for="incubatee">Incubatee</label>
                        </div>
                        <div class="form-check form-check-inline col-md-4">
                            <input class="form-check-input" type="radio" name="status" id="mvp" value="2">
                            <label class="form-check-label" for="mvp">MVP</label>
                        </div>
                        <div class="form-check form-check-inline col-md-4">
                            <input class="form-check-input" type="radio" name="status" id="pmvp" value="3">
                            <label class="form-check-label" for="pmvp">Post MVP</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="idea" class="form-control" value="{{old('idea')}}">
                            <label class="form-label">Idea or problem you are solving</label>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="">Full description of startup</label>
                        <textarea name="description" id="tinymce">{{old('description')}}</textarea>
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
                                <tr id="addr0">
                                    <td class="text-center">1</td>
                                    <td class="text-center"><input type="text" name="tname[]" class="form-controll"></td>
                                    <td class="text-center"><input type="text" name="temail[]" class="form-controll"></td>
                                    <td class="text-center"><input type="text" name="tphone[]" class="form-controll"></td>
                                    <td class="text-center"><input type="text" name="tskill[]" class="form-controll"></td>
                                </tr>
                                <tr id="addr1"></tr>
                            </tbody>
                        </table>
                    </div>
                    <button type="button" id="delete_row" class="btn btn-sm btn-danger btn-lg m-t-15 waves-effect">
                        <i class="material-icons">remove</i>
                        <span></span>
                    </button>
                    <button type="button" id="add_row" class="btn btn-sm btn-primary btn-lg m-t-15 waves-effect right">
                        <i class="material-icons">add</i>
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>SELECT CATEGORY</h2>
                </div>
                <div class="body">

                    <div class="form-group form-float">
                        <div class="form-line {{$errors->has('aspects') ? 'focused error' : ''}}">
                            <label>Select Aspect</label>
                            <select name="aspect_id" class="form-control show-tick">
                                @foreach($aspects as $aspect)
                                    <option value="{{$aspect->id}}">{{$aspect->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <img src="/" id="image-imgsrc" class="img-responsive">
                        <input type="file" name="image" id="image-image-input" style="display:none;">
                        <button type="button" class="btn bg-grey btn-sm waves-effect m-t-15" id="image-image-btn">
                            <i class="material-icons">image</i>
                            <span>UPLOAD GROUP IMAGE</span>
                        </button>
                    </div><hr>
                    <div class="form-group">
                        <img src="/" id="logo-imgsrc" class="img-responsive">
                        <input type="file" name="logo" id="logo-image-input" style="display:none;">
                        <button type="button" class="btn bg-grey btn-sm waves-effect m-t-15" id="logo-image-btn">
                            <i class="material-icons">image</i>
                            <span>UPLOAD LOGO</span>
                        </button>
                    </div><hr>

                    <a href="{{route('admin.posts.index')}}" class="btn btn-danger btn-lg m-t-15 waves-effect">
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
