@extends('admin.admin_master')
@section('m-content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit A Blog Category</h4> <br><br>
                        <form method="POST" action="{{route('update.blog.category')}}">
                            @csrf
                            <input type="hidden" name="id" value="{{$category->id}}">
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" value="{{$category->category_name}}" type="text" name="category_name" id="p_name">
                                    @error('category_name')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <input class="btn btn-info btn-rounded waves-effect waves-light" type="submit" value="Update Blog Category">
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