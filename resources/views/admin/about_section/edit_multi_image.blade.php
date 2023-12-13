@extends('admin.admin_master')
@section('m-content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title"> Edit Image For About Section</h4><br>
                        <br>
                        <form method="POST" action="{{route('update.multi.image')}}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{$selected_image->id}}">
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"> Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" name="image" id="image" multiple>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img id="showImage" src="{{ url($selected_image->multi_image) }}" alt="avatar-5" class="rounded avatar-lg">
                                </div>
                            </div>
                            <!-- end row -->
                            
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <input class="btn btn-info btn-rounded waves-effect waves-light" type="submit" value="Edit Image">
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