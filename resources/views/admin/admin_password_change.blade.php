@extends('admin.admin_master')
@section('m-content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Admin Password Change</h4>
                       
                        @unless (count($errors) == 0)
                        @foreach ($errors->all() as $error)
                            <p class="alert alert-danger alert-dismissible fade show">{{$error}}</p>
                        @endforeach
                        @endunless

                        <form method="POST" action="{{route('admin.update.password')}}">
                            @csrf
                            {{-- Old Password  --}}
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Old Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password" name="oldPassword" placeholder="Old Password" id="oldPassword">
                                </div>
                            </div>
                            <!-- end row -->

                            {{-- New Password  --}}
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">New Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password" name="newPassword" placeholder="New Password" id="newPassword">
                                </div>
                            </div>
                            <!-- end row -->

                             {{-- Confirem Password  --}}
                             <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Confirem Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password" name="confirmPassword" placeholder="Confirem Password" id="confirmPassword">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <input class="btn btn-info btn-rounded waves-effect waves-light" type="submit" value="Change Password">
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