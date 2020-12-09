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
                            <li class="breadcrumb-item active" aria-current="page">Edit Project</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">

        <div class="col-xl-8 order-xl-1 center">

            @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{session('success')}}

            </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <form role="form" action="{{ route('project.update',$projects->id) }}" method="POST"
                        enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Title </label>
                                    <input type="text" id="input-username" name="title"
                                        class="form-control @error('title') is-invalid @enderror" placeholder="Title"
                                        value="{{ $projects->title}}">
                                    @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-lg-12">

                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Sub Title </label>
                                    <input type="text" id="input-username" name="sub_title"
                                        class="form-control @error('sub_title') is-invalid @enderror"
                                        placeholder="Sub Title"  value="{{ $projects->sub_title}}">
                                    @error('sub_title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Location</label>
                                    <input type="text" id="input-username" name="location"
                                        class="form-control @error('location') is-invalid @enderror"
                                        placeholder="Location"  value="{{ $projects->location}}">
                                    @error('location')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>

                            </div>

                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">City</label>
                                    <input type="text" id="input-username" name="city"
                                        class="form-control @error('city') is-invalid @enderror" placeholder="City"
                                        value="{{ $projects->city}}">
                                    @error('city')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Price</label>
                                    <input type="text" id="input-username" name="prech_price"
                                        class="form-control @error('prech_price') is-invalid @enderror"
                                        placeholder="Price"  value="{{ $projects->prech_price}}">
                                    @error('prech_price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>

                            </div>

                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Contact Number</label>
                                    <input type="telephone" id="input-username" name="telephone"
                                        class="form-control @error('telephone') is-invalid @enderror"
                                        placeholder="Telephone" value="{{ $projects->telephone}}">
                                    @error('telephone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>

                            </div>

                        </div>


                        <div class="row">

                            <div class="col-lg-12">

                                <div class="form-group">
                                    <label class="form-control-label" for="image">Thumbnail Picture :</label>


                                    <div class="custom-file">
                                 
                                            <input type="file" id="dropify" accept="image/x-png,image/gif,image/jpeg" name="thumb"
                                            data-default-file="{{ $projects->Thumb_image?asset('/uploads/'.$projects->Thumb_image->name):asset('img/no.jpeg') }}">

                                    </div>
                                </div><br>
                            </div>

                        </div>

                        <h6 class="heading-small text-muted mb-4">Other Images</h6>

                        <div class="row">
        
                          <div class="col-lg-12">
                            <div class="form-group">
                                <div class="input-images">
        
                                     <div class="input-field">
                                      <label class="form-control-label" for="image">Old Images</label><br>
                                           
                                             @if(count($image) != 0)
                                             @foreach ($image as $img_id)
                                                <img src='{{ asset('/uploads/'.$img_id->multiImage->name) }}'  width="75px" height="75px"  class="rounded z-depth-3">
                                             @endforeach
                                           
                                             @else
        
                                             <div class="alert alert-success" role="alert">
                                              No Old Images
                                            </div>
                                            @endif
                                    </div>
        
        
                            </div><br>
        
                            </div>
                          </div>
        
        
                        </div>


                        <div class="row">

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="input-images">

                                        <div class="input-field">
                                            <label class="active">Add New Images</label>
                                            <div class="input-images-2" style="padding-top: .5rem;"></div>
                                        </div>


                                    </div><br>

                                </div>
                            </div>
                        </div>



                        <div class="row">

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Description</label>
                                    <textarea name="description" rows="4"
                                        class="form-control @error('description') is-invalid @enderror"
                                placeholder="Description">{{ $projects->description}}</textarea>
                                    @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Facilities</label>
                                    <textarea name="facilities" rows="4"
                                        class="form-control @error('facilities') is-invalid @enderror"
                                        placeholder="Facilities">{{ $projects->facilities}}</textarea>
                                    @error('facilities')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-lg-12">
                                <div class="form-group">

                                    <div class="col-4 text-center">
                                        <button type="submit" class="btn  btn-primary">Submit</button>
                                        <a href="/admin/showPort" class="btn btn-danger">Back</a>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>

@endsection


@section('js')


<script>
    let preloaded = [

    ];

    $('.input-images-2').imageUploader({
        preloaded: preloaded,
        imagesInputName: 'multi',
        preloadedInputName: 'old'
    });


    $('#dropify').dropify();

</script>






@endsection
