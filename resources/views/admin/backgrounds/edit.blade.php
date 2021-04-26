@extends('backend.layouts.app')

@section('title', 'Create Testimonial')

@push('styles')


@endpush


@section('content')

    <div class="row clearfix">
        <form action="{{route('admin.background.update', $background->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-indigo">
                        <h2>HOME PAGE BACKGROUNDS</h2>
                    </div>
                    <div class="body">
                        <div class="form-group">
                            <img src="{{ Storage::url('background/'.$background->f3_bg) }}" id="f3_bg-imgsrc" class="img-responsive">
                            <input type="file" name="f3_bg" id="f3_bg-image-input" style="display:none;">
                            <button type="button" class="btn bg-grey btn-sm waves-effect m-t-15" id="f3_bg-image-btn">
                                <i class="material-icons">image</i>
                                <span>UPLOAD IMAGE</span>
                            </button>
                        </div><hr>
                        <div class="form-group">
                            <img src="{{ Storage::url('background/'.$background->f4_bg) }}" id="f4_bg-imgsrc" class="img-responsive">
                            <input type="file" name="f4_bg" id="f4_bg-image-input" style="display:none;">
                            <button type="button" class="btn bg-grey btn-sm waves-effect m-t-15" id="f4_bg-image-btn">
                                <i class="material-icons">image</i>
                                <span>UPLOAD IMAGE</span>
                            </button>
                        </div><hr>
                        <div class="form-group">
                            <img src="{{ Storage::url('background/'.$background->f5_bg) }}" id="f5_bg-imgsrc" class="img-responsive">
                            <input type="file" name="f5_bg" id="f5_bg-image-input" style="display:none;">
                            <button type="button" class="btn bg-grey btn-sm waves-effect m-t-15" id="f5_bg-image-btn">
                                <i class="material-icons">image</i>
                                <span>UPLOAD IMAGE</span>
                            </button>
                        </div><hr>
                    </div>
                </div>
                <div class="card">
                    <div class="header bg-indigo">
                        <h2>BLOG PAGE BACKGROUNDS</h2>
                    </div>
                    <div class="body">
                        <div class="form-group">
                            <img src="{{ Storage::url('background/'.$background->b1_bg) }}" id="b1_bg-imgsrc" class="img-responsive">
                            <input type="file" name="b1_bg" id="b1_bg-image-input" style="display:none;">
                            <button type="button" class="btn bg-grey btn-sm waves-effect m-t-15" id="b1_bg-image-btn">
                                <i class="material-icons">image</i>
                                <span>UPLOAD IMAGE</span>
                            </button>
                        </div>
                        <div class="form-group">
                            <img src="{{ Storage::url('background/'.$background->b2_bg) }}" id="b2_bg-imgsrc" class="img-responsive">
                            <input type="file" name="b2_bg" id="b2_bg-image-input" style="display:none;">
                            <button type="button" class="btn bg-grey btn-sm waves-effect m-t-15" id="b2_bg-image-btn">
                                <i class="material-icons">image</i>
                                <span>UPLOAD IMAGE</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="header bg-indigo">
                        <h2>CONTACT PAGE BACKGROUNDS</h2>
                    </div>
                    <div class="body">
                        <div class="form-group">
                            <img src="{{ Storage::url('background/'.$background->c_bg) }}" id="c_bg-imgsrc" class="img-responsive">
                            <input type="file" name="c_bg" id="c_bg-image-input" style="display:none;">
                            <button type="button" class="btn bg-grey btn-sm waves-effect m-t-15" id="c_bg-image-btn">
                                <i class="material-icons">image</i>
                                <span>UPLOAD IMAGE</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-indigo">
                        <h2>ABOUT PAGE BACKGROUNDS</h2>
                    </div>
                    <div class="body">
                        <div class="form-group">
                            <img src="{{ Storage::url('background/'.$background->a1_bg) }}" id="a1_bg-imgsrc" class="img-responsive">
                            <input type="file" name="a1_bg" id="a1_bg-image-input" style="display:none;">
                            <button type="button" class="btn bg-grey btn-sm waves-effect m-t-15" id="a1_bg-image-btn">
                                <i class="material-icons">image</i>
                                <span>UPLOAD IMAGE</span>
                            </button>
                        </div>
                        <div class="form-group">
                            <img src="{{ Storage::url('background/'.$background->a2_bg) }}" id="a2_bg-imgsrc" class="img-responsive">
                            <input type="file" name="a2_bg" id="a2_bg-image-input" style="display:none;">
                            <button type="button" class="btn bg-grey btn-sm waves-effect m-t-15" id="a2_bg-image-btn">
                                <i class="material-icons">image</i>
                                <span>UPLOAD IMAGE</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="header bg-indigo">
                        <h2>EVENTS PAGE BACKGROUNDS</h2>
                    </div>
                    <div class="body">
                        <div class="form-group">
                            <img src="{{ Storage::url('background/'.$background->e1_bg) }}" id="e1_bg-imgsrc" class="img-responsive">
                            <input type="file" name="e1_bg" id="e1_bg-image-input" style="display:none;">
                            <button type="button" class="btn bg-grey btn-sm waves-effect m-t-15" id="e1_bg-image-btn">
                                <i class="material-icons">image</i>
                                <span>UPLOAD IMAGE</span>
                            </button>
                        </div>
                        <div class="form-group">
                            <img src="{{ Storage::url('background/'.$background->e2_bg) }}" id="e2_bg-imgsrc" class="img-responsive">
                            <input type="file" name="e2_bg" id="e2_bg-image-input" style="display:none;">
                            <button type="button" class="btn bg-grey btn-sm waves-effect m-t-15" id="e2_bg-image-btn">
                                <i class="material-icons">image</i>
                                <span>UPLOAD IMAGE</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="header bg-indigo">
                        <h2>STARTUPS PAGE BACKGROUNDS</h2>
                    </div>
                    <div class="body">
                        <div class="form-group">
                            <img src="{{ Storage::url('background/'.$background->s1_bg) }}" id="s1_bg-imgsrc" class="img-responsive">
                            <input type="file" name="s1_bg" id="s1_bg-image-input" style="display:none;">
                            <button type="button" class="btn bg-grey btn-sm waves-effect m-t-15" id="s1_bg-image-btn">
                                <i class="material-icons">image</i>
                                <span>UPLOAD IMAGE</span>
                            </button>
                        </div>
                        <div class="form-group">
                            <img src="{{ Storage::url('background/'.$background->s2_bg) }}" id="s2_bg-imgsrc" class="img-responsive">
                            <input type="file" name="s2_bg" id="s2_bg-image-input" style="display:none;">
                            <button type="button" class="btn bg-grey btn-sm waves-effect m-t-15" id="s2_bg-image-btn">
                                <i class="material-icons">image</i>
                                <span>UPLOAD IMAGE</span>
                            </button>
                        </div>
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
        // f2_bg
        $('#f2_bg-image-btn').on('click', function(){
            $('#f2_bg-image-input').click();
        });
        $('#f2_bg-image-input').on('change', function(){
            showImage(this, '#f2_bg-imgsrc');
        });
        // f3_bg
        $('#f3_bg-image-btn').on('click', function(){
            $('#f3_bg-image-input').click();
        });
        $('#f3_bg-image-input').on('change', function(){
            showImage(this, '#f3_bg-imgsrc');
        });
        // f4_bg
        $('#f4_bg-image-btn').on('click', function(){
            $('#f4_bg-image-input').click();
        });
        $('#f4_bg-image-input').on('change', function(){
            showImage(this, '#f4_bg-imgsrc');
        });
        // f5_bg
        $('#f5_bg-image-btn').on('click', function(){
            $('#f5_bg-image-input').click();
        });
        $('#f5_bg-image-input').on('change', function(){
            showImage(this, '#f5_bg-imgsrc');
        });
        // b1_bg
        $('#b1_bg-image-btn').on('click', function(){
            $('#b1_bg-image-input').click();
        });
        $('#b1_bg-image-input').on('change', function(){
            showImage(this, '#b1_bg-imgsrc');
        });
        // b2_bg
        $('#b2_bg-image-btn').on('click', function(){
            $('#b2_bg-image-input').click();
        });
        $('#b2_bg-image-input').on('change', function(){
            showImage(this, '#b2_bg-imgsrc');
        });
        // c_bg
        $('#c_bg-image-btn').on('click', function(){
            $('#c_bg-image-input').click();
        });
        $('#c_bg-image-input').on('change', function(){
            showImage(this, '#c_bg-imgsrc');
        });
        // a1_bg
        $('#a1_bg-image-btn').on('click', function(){
            $('#a1_bg-image-input').click();
        });
        $('#a1_bg-image-input').on('change', function(){
            showImage(this, '#a1_bg-imgsrc');
        });
        // a2_bg
        $('#a2_bg-image-btn').on('click', function(){
            $('#a2_bg-image-input').click();
        });
        $('#a2_bg-image-input').on('change', function(){
            showImage(this, '#a2_bg-imgsrc');
        });
        // e1_bg
        $('#e1_bg-image-btn').on('click', function(){
            $('#e1_bg-image-input').click();
        });
        $('#e1_bg-image-input').on('change', function(){
            showImage(this, '#e1_bg-imgsrc');
        });
        // e2_bg
        $('#e2_bg-image-btn').on('click', function(){
            $('#e2_bg-image-input').click();
        });
        $('#e2_bg-image-input').on('change', function(){
            showImage(this, '#e2_bg-imgsrc');
        });
        // s1_bg
        $('#s1_bg-image-btn').on('click', function(){
            $('#s1_bg-image-input').click();
        });
        $('#s1_bg-image-input').on('change', function(){
            showImage(this, '#s1_bg-imgsrc');
        });
        // s2_bg
        $('#s2_bg-image-btn').on('click', function(){
            $('#s2_bg-image-input').click();
        });
        $('#s2_bg-image-input').on('change', function(){
            showImage(this, '#s2_bg-imgsrc');
        });
    })
</script>

@endpush
