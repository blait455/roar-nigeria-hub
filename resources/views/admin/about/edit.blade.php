@extends('backend.layouts.app')

@section('title', 'Edit about')

@push('styles')


@endpush


@section('content')

    <div class="row clearfix">
        <form action="{{route('admin.about.update', $about->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-indigo">
                        <h2>ABOUT SECTION</h2>
                    </div>
                    {{-- {{ dd($about) }} --}}
                    <div class="body">
                        <div class="form-group">
                            <img src="{{ Storage::url('about/'.$about->image) }}" id="image-imgsrc" class="img-responsive">
                            <input type="file" name="image" id="image-image-input" style="display:none;">
                            <button type="button" class="btn bg-grey btn-sm waves-effect m-t-15" id="image-image-btn">
                                <i class="material-icons">image</i>
                                <span>UPLOAD IMAGE</span>
                            </button>
                        </div><hr>
                        <div class="form-group">
                            <label for="">Body</label>
                            <textarea name="content" id="tinymce">{{$about->content}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-indigo">
                        <h2>HOME PAGE IMAGES</h2>
                    </div>
                    <div class="body">
                        <div class="form-group">
                            <img src="{{ Storage::url('about/'.$about->image1_3) }}" id="image1_3-imgsrc" class="img-responsive">
                            <input type="file" name="image1_3" id="image1_3-image-input" style="display:none;">
                            <button type="button" class="btn bg-grey btn-sm waves-effect m-t-15" id="image1_3-image-btn">
                                <i class="material-icons">image</i>
                                <span>UPLOAD IMAGE</span>
                            </button>
                        </div><hr>
                        <div class="form-group">
                            <img src="{{ Storage::url('about/'.$about->image2_3) }}" id="image2_3-imgsrc" class="img-responsive">
                            <input type="file" name="image2_3" id="image2_3-image-input" style="display:none;">
                            <button type="button" class="btn bg-grey btn-sm waves-effect m-t-15" id="image2_3-image-btn">
                                <i class="material-icons">image</i>
                                <span>UPLOAD IMAGE</span>
                            </button>
                        </div><hr>
                        <div class="form-group">
                            <img src="{{ Storage::url('about/'.$about->image3_3) }}" id="image3_3-imgsrc" class="img-responsive">
                            <input type="file" name="image3_3" id="image3_3-image-input" style="display:none;">
                            <button type="button" class="btn bg-grey btn-sm waves-effect m-t-15" id="image3_3-image-btn">
                                <i class="material-icons">image</i>
                                <span>UPLOAD IMAGE</span>
                            </button>
                        </div><hr>
                    </div>
                </div>

                <button type="submit" class="btn btn-indigo btn-lg m-t-15 waves-effect right">
                    <i class="material-icons">save</i>
                    <span>SAVE</span>
                </button>
            </div>
        </form>
    </div>

@endsection


@push('scripts')
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
        // image1_3
        $('#image1_3-image-btn').on('click', function(){
            $('#image1_3-image-input').click();
        });
        $('#image1_3-image-input').on('change', function(){
            showImage(this, '#image1_3-imgsrc');
        });
        // image2_3
        $('#image2_3-image-btn').on('click', function(){
            $('#image2_3-image-input').click();
        });
        $('#image2_3-image-input').on('change', function(){
            showImage(this, '#image2_3-imgsrc');
        });
        // image3_3
        $('#image3_3-image-btn').on('click', function(){
            $('#image3_3-image-input').click();
        });
        $('#image3_3-image-input').on('change', function(){
            showImage(this, '#image3_3-imgsrc');
        });
    })
</script>

@endpush
