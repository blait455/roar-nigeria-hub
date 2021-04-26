@extends('backend.layouts.app')

@section('title', 'Settings')

@push('styles')

@endpush


@section('content')

    <div class="block-header"></div>

    <div class="row clearfix">
        <form action="{{route('admin.settings.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-indigo">
                        <h2>
                            GENERAL SETTING
                            <a href="{{route('admin.profile')}}" class="btn waves-effect waves-light right headerightbtn">
                                <i class="material-icons left">person</i>
                                <span>PROFILE </span>
                            </a>
                        </h2>
                    </div>
                    <div class="body">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="name" class="form-control" value="{{ $settings->name ? $settings->name : '' }}">
                                    <label class="form-label">Site Title</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="slogan" class="form-control" value="{{ $settings->slogan ? $settings->slogan : '' }}">
                                    <label class="form-label">Site Slogan</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="email" name="email" class="form-control" value="{{ $settings->email }}">
                                    <label class="form-label">Email</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" name="phone" class="form-control" value="{{ $settings->phone }}">
                                    <label class="form-label">Phone</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="address" class="form-control" value="{{ $settings->address }}">
                                    <label class="form-label">Address</label>
                                </div>
                                <small class="col-red font-italic">HTML Tag allowed</small>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="footer" class="form-control" value="{{ $settings->footer }}">
                                    <label class="form-label">Footer</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line">
                                    <textarea name="about" rows="4" class="form-control no-resize">{{ $settings->about }}</textarea>
                                    <label class="form-label">About Us</label>
                                </div>
                            </div>

                            <h6>Social Links</h6>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="facebook" class="form-control" value="{{ $settings->facebook }}">
                                    <label class="form-label">Facebook Handle</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="twitter" class="form-control" value="{{ $settings->twitter }}">
                                    <label class="form-label">Twitter Handle</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="linkedin" class="form-control" value="{{ $settings->linkedin }}">
                                    <label class="form-label">LinkedIn Handle</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="instagram" class="form-control" value="{{ $settings->instagram }}">
                                    <label class="form-label">Instagram Handle</label>
                                </div>
                            </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>UPLOADS </h2>
                    </div>
                    <div class="body">
                        <div class="form-group">
                            {{-- {{ dd($settings->fav) }} --}}
                            <img src="{{ Storage::url('settings/'.$settings->fav) }}" id="fav-imgsrc" class="img-responsive">
                            <input type="file" name="fav" id="fav-image-input" style="display:none;">
                            <button type="button" class="btn bg-grey btn-sm waves-effect m-t-15" id="fav-image-btn">
                                <i class="material-icons">image</i>
                                <span>UPLOAD FAVICON</span>
                            </button>
                        </div><hr>
                        <div class="form-group">
                            <img src="{{ Storage::url('settings/'.$settings->logo) }}" id="logo-imgsrc" class="img-responsive">
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
        $('#fav-image-btn').on('click', function(){
            $('#fav-image-input').click();
        });
        $('#fav-image-input').on('change', function(){
            showImage(this, '#fav-imgsrc');
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
