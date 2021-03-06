@extends('backend.layouts.app')

@section('title', 'Incubation applications')

@push('styles')

    <!-- JQuery DataTable Css -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}">

@endpush

@section('content')

    <div class="block-header">
        <a href="{{route('admin.incubation.create')}}" class="waves-effect waves-light btn right m-b-15 addbtn">
            <i class="material-icons left">add</i>
            <span>CREATE </span>
        </a>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>INCUBATION APPLICATIONS</h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Venture name</th>
                                    <th>Category</th>
                                    <th>Type</th>
                                    <th>Solution</th>
                                    <th>Motivation</th>
                                    <th>How long</th>
                                    <th>Business experience</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Age</th>
                                    <th>Favorite color</th>
                                    <th>Favorite subject</th>
                                    <th>Course</th>
                                    <th>Medium</th>
                                    <th>Team</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>SL.</th>
                                    <th>Venture name</th>
                                    <th>Category</th>
                                    <th>Type</th>
                                    <th>Solution</th>
                                    <th>Motivation</th>
                                    <th>How long</th>
                                    <th>Business experience</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Age</th>
                                    <th>Favorite color</th>
                                    <th>Favorite subject</th>
                                    <th>Course</th>
                                    <th>Medium</th>
                                    <th>Team</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach( $applications as $key => $startup )
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$startup->name}}</td>
                                    <td>{{$startup->aspect->title}}</td>
                                    <td>{{ $startup->type }}</td>
                                    <td>{{ $startup->problem }}</td>
                                    <td>{{ $startup->motivation }}</td>
                                    <td>{{ $startup->idea_duration }}</td>
                                    <td>{{ $startup->biz_experience }}</td>
                                    <td>{{ $startup->email }}</td>
                                    <td>{{ $startup->phone }}</td>
                                    <td>{{ $startup->age }}</td>
                                    <td>{{ $startup->fav_color }}</td>
                                    <td>{{ $startup->fav_subject }}</td>
                                    <td>{{ $startup->course }}</td>
                                    <td>{{ $startup->medium_aware }}</td>
                                    <td>@foreach ($startup->team as $item)
                                            <li><span>{{ $item->name }}, {{ $item->email }}, {{ $item->phone }}, {{ $item->skill }}</span></li>
                                        @endforeach
                                    </td>
                                    <td class="text-center">
                                        <a href="{{route('admin.incubation.edit',$startup->id)}}" class="btn btn-info btn-sm waves-effect">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <button type="button" class="btn btn-danger btn-sm waves-effect" onclick="deleteTag({{$startup->id}})">
                                            <i class="material-icons">delete</i>
                                        </button>
                                        <form action="{{route('admin.incubation.destroy',$startup->id)}}" method="POST" id="del-tag-{{$startup->id}}" style="display:none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('scripts')

    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('backend/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>

    <!-- Custom Js -->
    <script src="{{ asset('backend/js/pages/tables/jquery-datatable.js') }}"></script>

    <script>
        function deleteTag(id){

            swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    document.getElementById('del-tag-'+id).submit();
                    swal(
                    'Deleted!',
                    'Startup has been deleted.',
                    'success'
                    )
                }
            })
        }
    </script>


@endpush
