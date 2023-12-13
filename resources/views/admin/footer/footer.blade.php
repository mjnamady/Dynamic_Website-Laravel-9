@extends('admin.admin_master')
@section('m-content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Update Footer Section</h4>
                        <form method="POST" action="{{route('update.footer')}}">
                            @csrf

                            <input type="hidden" name="id" value="{{$footer->id}}">
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Phone Number</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="phone" value="{{$footer->phone}}">
                                    @error('phone')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Short Description</label>
                                <div class="col-sm-10">
                                    <textarea id="textarea" class="form-control" maxlength="225" rows="3" name="short_description">
                                        {{$footer->short_description}}
                                    </textarea>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="address" value="{{$footer->address}}">
                                    @error('p_title')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="email" value="{{$footer->email}}">
                                    @error('p_title')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Social Info</label>
                                <div class="col-sm-10">
                                    <textarea id="textarea" class="form-control" maxlength="225" rows="3" name="social_info">
                                        {{$footer->social_info}}
                                    </textarea>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Facebook</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="facebook" value="{{$footer->facebook}}">
                                    @error('p_title')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Twitter</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="twitter" value="{{$footer->twitter}}">
                                    @error('p_title')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Instagram</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="instagram" value="{{$footer->instagram}}">
                                    @error('p_title')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">CopyRight</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="copyright" value="{{$footer->copyright}}">
                                    @error('p_title')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->
                            
                            
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <input class="btn btn-info btn-rounded waves-effect waves-light" type="submit" value="Update Footer">
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