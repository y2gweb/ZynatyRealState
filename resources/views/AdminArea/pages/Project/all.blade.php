
@extends('AdminArea/layouts.app-common')

@section('header')
<div class="header pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-black d-inline-block mb-0">Project Management</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('home')}}">Dashboards</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Project Management</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">

                    <a href="{{ route('project.create')}}" class="btn btn-sm btn-info"><i class="ni ni-fat-add"></i>Add New</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{session('success')}}
            </div>
        @endif
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">

                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table id="datatableid" class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">#</th>

                                <th scope="col" class="sort" data-sort="budget">Title</th>
                                <th scope="col" class="sort" data-sort="budget">Thumbnail</th>
                                <th scope="col" class="sort" data-sort="budget">City</th>

                                <th scope="col" class="sort" data-sort="status">Status</th>
                                <th scope="col">Created Date</th>
                                <th scope="col" class="sort" data-sort="completion">Action</th>


                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach($projects as $pro)
                            <tr>
                                <th scope="row">
                                    <div class="media align-items-center">

                                        <div class="media-body">
                                        <span class="name mb-0 text-sm">{{$pro->id}}</span>
                                        </div>
                                </div>
                                </th>
                                <td class="budget">
                                    {{$pro->title}}
                                </td>
                                <td>
                                    {{-- <img src="{{ $pro->Thumb_id?Config::get('images.upload_path').$pro->Thumb_image->name:asset('MemberArea/images/avatar.png') }}"
                                    alt="Profile Image"  width="75px" height="75px"  class="rounded z-depth-3"> --}}

                                    <img src="{{ $pro->Thumb_id?asset('/uploads/'.$pro->Thumb_image->name):asset('MemberArea/images/avatar.png') }}"
                                    alt="Profile Image"  width="75px" height="75px"  class="rounded z-depth-3">
                                </td>

                                <td class="budget">
                                    {{$pro->city}}
                                </td>



                                <td>

                            <input type="checkbox" data-id="{{$pro->id}}" class="toggle-class" data-toggle="toggle" data-on="Show" data-off="Hide" data-onstyle="primary" data-offstyle="danger" {{ $pro->status ? 'checked' : '' }}>

                                </td>
                                <td>
                                {{$pro->created_at}}
                                </td>

                                <td>
                                    <div class="dropdown">

                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                                        <a class="dropdown-item" href="{{route('project.edit',$pro->id)}}">
                                        <i class="fas fa-user-edit text-primary"></i>&nbsp;Edit
                                        </a>


                                        <div class="dropdown-divider responsive-moblile"></div>
                                        <form action="{{route('project.delete',$pro->id)}}" method="post">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <button class="dropdown-item" type="submit">
                                                <i class="fas fa-users text-danger"></i>&nbsp;Delete
                                            </button>
                                        </form>

                                        </div>

                                     </div>

                                </td>



                            </tr>
                                @endforeach
                        </tbody>
                    </table>
                    <table cellspacing="0" cellpadding="0" border="0">
                        <tbody>
                        <tr>
                            <td class="gutter">
                                <div class="line number1 index0 alt2" style="display: none;">1</div>
                            </td>
                            <td class="code">
                                <div class="container" style="display: none;">
                                    <div class="line number1 index0 alt2" style="display: none;">&nbsp;</div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>






</div>


@endsection


@section('js')

<script>
 $(document).ready(function () {



$('.table').DataTable({
    language: {
        paginate: {
            next: '<i class="ni ni-bold-right"></i>',
            previous: '<i class="ni ni-bold-left"></i>'
        }
    },
});


});

</script>


<script type="text/javascript">
    $(".alert").delay(2000).slideUp(200, function () {
        $(this).alert('close');
    });

</script>



@endsection
