@extends('admin.admin_master')
@section('m-content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Manage All Multi-Images</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Images</th>
                                <th>Actions</th>
                            </tr>
                            </thead>


                            <tbody>
                        @php($serialNo = 1)
                        @foreach ($allMulti_images as $image)
                            <tr>
                                <td>{{$serialNo++}}</td>
                                <td> <img src="{{ url($image->multi_image) }}" alt="Multi_image" style="width: 50px; height:50px"> </td>
                                <td>
                                    <a href="{{route('multi.image.edit', $image->id)}}" class="btn btn-primary waves-effect waves-light" title="Edit Data"><i class="fas fa-edit"></i></a>
                                    <a href="{{route('multi.image.delete', $image->id)}}" class="btn btn-danger waves-effect waves-light" id="delete" title="Delete Data"><i class="far fa-trash-alt"></i></a>
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