jQuery(function() { 
    // AUTOMATIC LOAD IMAGE
    $('#image').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#showImage').attr('src', e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
    });


    // FORM VALIDATION

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