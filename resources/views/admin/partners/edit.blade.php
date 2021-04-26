@extends('backend.layouts.app')

@section('title', 'Edit Partner')

@push('styles')


@endpush


@section('content')

    <div class="block-header">
        <a href="{{route('admin.partners.index')}}" class="waves-effect waves-light btn btn-danger right m-b-15">
            <i class="material-icons left">arrow_back</i>
            <span>BACK</span>
        </a>
    </div>
{{-- {{ dd($partner) }} --}}
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>EDIT PARTNER</h2>
                </div>
                <div class="body">
                    <form action="{{route('admin.partners.update', $partner->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" name="name" class="form-control" value="{{ $partner->name }}">
                                <label class="form-label">Name</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" name="link" class="form-control" value="{{ $partner->link }}">
                                <label class="form-label">Website link</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <img src="{{ Storage::url('partners/'.$partner->logo) }}" id="logo-imgsrc" class="img-responsive">
                            <input type="file" name="logo" id="logo-image-input" style="display:none;">
                            <button type="button" class="btn bg-grey btn-sm waves-effect m-t-15" id="logo-image-btn">
                                <i class="material-icons">image</i>
                                <span>UPLOAD LOGO</span>
                            </button>
                        </div><hr>

                        <button type="submit" class="btn btn-indigo btn-lg m-t-15 waves-effect">
                            <i class="material-icons">save</i>
                            <span>SAVE</span>
                        </button>

                    </form>
                </div>
            </div>
        </div>
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
