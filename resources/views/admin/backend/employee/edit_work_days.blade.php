@extends('admin.admin_master')
@section('title')
<title>Update Work Days for {{ now()->format('F Y') }}</title>
@endsection
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   
<div class="container-full">
		<!-- Content Header (Page header) -->
		  
	<section class="content">

		<div class="box">
			<div class="box-header with-border">
			  <h5 class="box-title">Update Days Worked </h5>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
  					<form method="post" action="{{ route('employee-update-days') }}" enctype="multipart/form-data" >
		 			@csrf
		 			<input type="hidden" name="id" value="{{ $employees->id }}">
		 			

						<!-- Bank Details -->
					<section class="content">
			 			<div class="box-header with-border">
				  			<h4 class="box-title" style="text-decoration: underline;">Enter The Number Of Days Worked for Payslip for {{ $employees->employee_name }}, {{ now()->format('F Y') }} </h4>
						</div>
					 	<div class="row">
							<div class="col-12">	
								<div class="row"> <!-- start 1st row  -->

									<div class="col-md-12">
	 									<div class="form-group">

											<div class="form-group">
												<h5>Days Worked:  <span class="text-danger">*</span></h5>
												<div class="controls">
												<input type="text" name="days_worked" class="form-control"  value="{{ $employees->days_worked}}">
											     @error('days_worked') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror
									 	  		</div>
		 									</div>
				
										</div>
									</div> <!-- end col md 4 -->

									
			
								</div> <!-- end 1st row  -->
								

								
						</div>
					</section>
					<!--Salary Section-->
					
					

						 
						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Days Worked">
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		</div>
		  <!-- /.box -->
</section>
		<!-- Main content -->
		<!-- /.content -->
			<!-- ///////////////// Start Thambnail Image Update Area ///////// -->


<!-- ///////////////// End Start Thambnail Image Update Area ///////// -->









</div>
 
 <script type="text/javascript">
      $(document).ready(function() {
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{  url('/category/subcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                    	$('select[name="subsubcategory_id"]').html('');
                       var d =$('select[name="subcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });



 $('select[name="subcategory_id"]').on('change', function(){
            var subcategory_id = $(this).val();
            if(subcategory_id) {
                $.ajax({
                    url: "{{  url('/category/sub-subcategory/ajax') }}/"+subcategory_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="subsubcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name_en + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
 

    });
    </script>


<script type="text/javascript">
	function mainThamUrl(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('#mainThmb').attr('src',e.target.result).width(80).height(80);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}	
</script>


<script>
 
  $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
   
  </script>




@endsection