@extends('admin.admin_master')
@section('m-content')

<div class="page-content">
    <div class="container-fluid">

        <div class="col-lg-4">
            <div class="card">
                <img class="img-thumbnail rounded-circle avatar-xl mx-auto mt-4" src="{{ (!empty($adminData->profile_image))? url('uploads/admin_images/'.$adminData->profile_image) : url('uploads/no_image.jpg') }}" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">Name: {{$adminData->name}}</h4><hr>
                    <h4 class="card-title">Username: {{$adminData->username}}</h4><hr>
                    <h4 class="card-title">Email: {{$adminData->email}}</h4><hr>
                    <a class="btn btn-info btn-rounded waves-effect waves-light" href="{{route('admin.profile.edit', $adminData->id)}}">Edit Profile</a>
                </div>
            </div>
        </div>


    </div>
</div>




@endsection