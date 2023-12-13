@extends('admin.admin_master')
@section('m-content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">About Section Edit</h4>
                        <form method="POST" action="{{route('about.section.update')}}" enctype="multipart/form-data">
                            @csrf

                            <input class="form-control" type="hidden" name="id" value="{{$aboutInfo->id}}">
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="title" value="{{$aboutInfo->title}}" id="title">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Sub Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="sub_title" value="{{$aboutInfo->sub_title}}" id="sub_title">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Short Description</label>
                                <div class="col-sm-10">
                                    <textarea name="short_description" id="short_description" class="form-control" maxlength="225">
                                        {{$aboutInfo->short_description}}
                                    </textarea>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Long Description</label>
                                <div class="col-sm-10">
                                    <textarea id="elm1" name="long_description">
                                        {{$aboutInfo->long_description}}
                                    </textarea>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Banner Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" name="about_image" id="image">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img id="showImage" src="{{(!empty($aboutInfo->about_img))? url($aboutInfo->about_img) : url('uploads/no_image.jpg') }}" alt="avatar-5" class="rounded avatar-lg">
                                </div>
                            </div>
                            <!-- end row -->
                            
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <input class="btn btn-info btn-rounded waves-effect waves-light" type="submit" value="Update About">
                                </div>
                            </div>
                            <!-- end row -->
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>


    </div>
</div>

@endsection