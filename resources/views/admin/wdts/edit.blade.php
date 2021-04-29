@extends('backend.layouts.app')

@section('title', 'Edit startup')

@push('styles')

    <link rel="stylesheet" href="{{asset('backend/plugins/bootstrap-select/css/bootstrap-select.css')}}">

@endpush


@section('content')

    <div class="block-header"></div>

    <div class="row clearfix">
        <form action="{{route('admin.wdts.update', $student->id)}}" method="POST" enctype="multipart/form-data">
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

                    <label class="form-label">Shirt size</label>
                    <div class="row">
                        <div class="form-check form-check-inline col-md-4">
                            <input class="form-check-input" type="radio" name="size" id="small" value="s" {{ $student->size == 's' ? 'checked' : '' }}>
                            <label class="form-check-label" for="incubatee">Small</label>
                        </div>
                        <div class="form-check form-check-inline col-md-4">
                            <input class="form-check-input" type="radio" name="size" id="medium" value="m" {{ $student->size == 'm' ? 'checked' : '' }}>
                            <label class="form-check-label" for="medium">Medium</label>
                        </div>
                        <div class="form-check form-check-inline col-md-4">
                            <input class="form-check-input" type="radio" name="size" id="large" value="l" {{ $student->size == 'l' ? 'checked' : '' }}>
                            <label class="form-check-label" for="large">Large</label>
                        </div>
                        <div class="form-check form-check-inline col-md-4">
                            <input class="form-check-input" type="radio" name="size" id="x-large" value="xl" {{ $student->size == 'xl' ? 'checked' : '' }}>
                            <label class="form-check-label" for="x-large">X-Large</label>
                        </div>
                        <div class="form-check form-check-inline col-md-4">
                            <input class="form-check-input" type="radio" name="size" id="xx-large" value="xxl" {{ $student->size == 'xxl' ? 'checked' : '' }}>
                            <label class="form-check-label" for="xx-large">XX-Large</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>UPLOAD PROOF OF PAYMENT </h2>
                </div>
                <div class="body">
                    <div class="form-group">
                        <img src="{{ Storage::url('blait/wdts/'.$student->pop) }}" id="image-imgsrc" class="img-responsive">
                        <input type="file" name="pop" id="image-image-input" style="display:none;">
                        <button type="button" class="btn bg-grey btn-sm waves-effect m-t-15" id="image-image-btn">
                            <i class="material-icons">image</i>
                            <span>UPLOAD GROUP IMAGE</span>
                        </button>
                    </div><hr>
                    <a href="{{route('admin.wdts.index')}}" class="btn btn-danger btn-lg m-t-15 waves-effect">
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
