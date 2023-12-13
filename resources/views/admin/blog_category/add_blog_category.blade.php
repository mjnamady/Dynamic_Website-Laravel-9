@extends('admin.admin_master')
@section('m-content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Add A Blog Category</h4> <br><br>
                        <form method="POST" id="myForm" action="{{route('store.blog.category')}}">
                            @csrf

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category Name</label>
                                <div class="form-group col-sm-10">
                                    <input class="form-control" type="text" name="category_name" id="p_name">
                                </div>
                            </div>
                            <!-- end row -->
                            
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <input class="btn btn-info btn-rounded waves-effect waves-light" type="submit" value="Insert Blog Category">
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

{{-- <script type="text/javascript">
jQuery(function() { 
    $('#myForm').validate({
            rules: {
                category_name : {
                    required : true,
                },
            },
            messages : {
                category_name : {
                    required : 'Please Enter Blog Category',
                },
            },
            errorElement : 'span',
            errorPlacement : function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
    
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
</script> --}}
@endsection
