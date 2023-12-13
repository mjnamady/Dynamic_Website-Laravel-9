@extends('admin.admin_master')
@section('m-content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Add Blog</h4>
                        <form method="POST" action="{{route('store.blog')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="blog_category_id" aria-label="Default select example">
                                        <option selected="">Open this select menu</option>
                                        @foreach ($categories as $cat)
                                        <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                                        @endforeach
                                        </select>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Blog Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="blog_title" id="p_title">
                                    @error('p_title')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Blog Tags</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="Facebook,React" name="blog_tags" data-role="tagsinput">
            
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Blog Description</label>
                                <div class="col-sm-10">
                                    <textarea id="elm1" name="blog_description"></textarea>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" name="blog_image" id="image">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img id="showImage" src="{{ url('uploads/no_image.jpg') }}" alt="avatar-5" class="rounded avatar-lg">
                                </div>
                            </div>
                            <!-- end row -->
                            
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <input class="btn btn-info btn-rounded waves-effect waves-light" type="submit" value="Post Blog">
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