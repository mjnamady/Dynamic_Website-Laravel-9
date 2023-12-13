@extends('admin.admin_master')
@section('m-content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">All Messages</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Phone</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                            </thead>


                            <tbody>
                        @php($serialNo = 1)
                        @foreach ($messages as $msg)
                            <tr>
                                <td>{{$serialNo++}}</td>
                                <td>{{$msg->name}}</td>
                                <td>{{$msg->email}}</td>
                                <td>{{$msg->subject}}</td>
                                <td>{{$msg->phone}}</td>
                                <td> {{ Carbon\Carbon::parse($msg->created_at)->diffForHumans() }} </td>
                                <td>
                                    <a href="{{route('delete.message', $msg->id)}}" class="btn btn-danger waves-effect waves-light" id="delete" title="Delete Message"><i class="far fa-trash-alt"></i></a>
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