@extends('backend.layouts.app')

@section('title', 'Show Event')

@push('styles')


@endpush


@section('content')

    <div class="block-header"></div>

    <div class="row clearfix">

        <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
            <div class="card">

                <div class="header bg-indigo">
                    <h2>SHOW EVENT</h2>
                </div>

                <div class="header">
                    <h2>
                        {{$event->title}}
                        <br>
                        <small>Posted on {{$event->created_at->toFormattedDateString()}}</small>
                    </h2>
                </div>

                <div class="body">
                    <h5>Description</h5>
                    {!!$event->description!!}
                </div>
            </div>

            @if(!$event->gallery->isEmpty())
            <div class="card">
                <div class="header bg-red">
                    <h2>GALLERY IMAGE</h2>
                </div>
                <div class="body">
                    <div class="gallery-box">
                        @foreach($event->gallery as $gallery)
                        <div class="gallery-image">
                            <img class="img-responsive" src="{{Storage::url('gallery/events/'.$gallery->name)}}" alt="{{$event->title}}">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-amber">
                    <h2>FEATURED IMAGE</h2>
                </div>
                <div class="body">

                    <img class="img-responsive thumbnail" src="{{Storage::url('events/'.$event->image)}}" alt="{{$event->title}}">

                    <a href="{{route('admin.events.index')}}" class="btn btn-danger btn-lg waves-effect">
                        <i class="material-icons left">arrow_back</i>
                        <span>BACK</span>
                    </a>
                    <a href="{{route('admin.events.edit',$event->id)}}" class="btn btn-info btn-lg waves-effect">
                        <i class="material-icons">edit</i>
                        <span>EDIT</span>
                    </a>

                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')

@endpush
