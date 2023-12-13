@extends('admin.admin_master')
@section('m-content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Manage All Blogs</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Blog Category</th>
                                <th>Blog Title</th>
                                <th>Blog Tags</th>
                                <th>Blog Image</th>
                                <th>Actions</th>
                            </tr>
                            </thead>


                            <tbody>
                        @php($serialNo = 1)
                        @foreach ($all_blogs as $blog)
                            <tr>
                                <td>{{$serialNo++}}</td>
                                <td>{{$blog['category']['category_name']}}</td>
                                <td>{{$blog->blog_title}}</td>
                                <td>{{$blog->blog_tags}}</td>
                                <td> <img src="{{ (!empty($blog->blog_image)? url($blog->blog_image) : url('uploads/no_image.png'))  }}" alt="portfolio_image" style="width: 50px; height:50px"> </td>
                                <td>
                                    <a href="{{route('edit.blog', $blog->id)}}" class="btn btn-primary waves-effect waves-light" title="Edit Portfolio"><i class="fas fa-edit"></i></a>
                                    <a href="{{route('delete.blog', $blog->id)}}" class="btn btn-danger waves-effect waves-light" id="delete" title="Delete Portfolio"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach  
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div>
</div>

@endsection