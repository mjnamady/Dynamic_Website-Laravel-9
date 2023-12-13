@extends('admin.admin_master')
@section('m-content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Manage All Blog Categories</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Blog Category Name</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                        {{-- @php($serialNo = 1) --}}
                        @foreach ($all_blogCat as $key => $category)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$category->category_name}}</td>
                                <td>
                                    <a href="{{route('edit.blog.category', $category->id)}}" class="btn btn-primary waves-effect waves-light" title="Edit Category"><i class="fas fa-edit"></i></a>
                                    <a href="{{route('delete.blog.category', $category->id)}}" class="btn btn-danger waves-effect waves-light" id="delete" title="Delete Category"><i class="far fa-trash-alt"></i></a>
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