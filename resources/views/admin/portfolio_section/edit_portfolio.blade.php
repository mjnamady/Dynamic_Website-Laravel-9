@extends('admin.admin_master')
@section('m-content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Add Portfolio</h4>
                        <form method="POST" action="{{route('update.portfolio')}}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{$portfolio->id}}">
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="p_name" id="p_name" value="{{$portfolio->p_name}}">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="p_title" id="p_title" value="{{$portfolio->p_title}}">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Description</label>
                                <div class="col-sm-10">
                                    <textarea id="elm1" name="p_description">{{$portfolio->p_description}}</textarea>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" name="p_image" id="image">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img id="showImage" src="{{ url($portfolio->p_image) }}" alt="avatar-5" class="rounded avatar-lg">
                                </div>
                            </div>
                            <!-- end row -->
                            
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <input class="btn btn-info btn-rounded waves-effect waves-light" type="submit" value="Update Portfolio">
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