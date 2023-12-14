@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   
<div class="container-full">
		<!-- Content Header (Page header) -->
		  

		<!-- Main content -->
	<section class="content">

		<div class="box">
			<div class="box-header with-border">
			  <h5 class="box-title">Edit Employee Payroll Details </h5>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
  					<form method="post" action="{{ route('employee-update') }}" enctype="multipart/form-data" >
		 			@csrf
		 			@method('PUT')
		 			<input type="hidden" name="id" value="{{ $employees->id }}">

		 			<!-----Days Missed-->
		 			<section class="content">

			 			<div class="box-header with-border">
				  			<h4 class="box-title" style="text-decoration: underline;"> Update Days Worked </h4>
						</div>
					 	<div class="row">
							<div class="col-12">	
								<div class="row"> <!-- start 1st row  -->

									<div class="col-md-12">
	 									<div class="form-group">

											<div class="form-group">
												<h5>Days Worked:  <span class="text-danger">*</span></h5>
												<div class="controls">
												<input type="text" name="days_worked" class="form-control" required="" value="{{ $employees->days_worked }}">
											     @error('days_worked') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror
									 	  		</div>
		 									</div>
				
										</div>
									</div> <!-- end col md 4 -->

									
			
								</div> <!-- end 1st row  -->
							</div>
						</div>
					</section>
		 			<section class="content">

			 			<div class="box-header with-border">
				  			<h4 class="box-title" style="text-decoration: underline;">1. Update Employee Personal Details </h4>
						</div>
					 	<div class="row">
							<div class="col-12">	
								<div class="row"> <!-- start 1st row  -->

									<div class="col-md-6">
	 									<div class="form-group">

											<div class="form-group">
												<h5>Employee Full Name:  <span class="text-danger">*</span></h5>
												<div class="controls">
												<input type="text" name="employee_name" class="form-control" required="" value="{{ $employees->employee_name }}">
											     @error('employee_name') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror
									 	  		</div>
		 									</div>
				
										</div>
									</div> <!-- end col md 4 -->

									<div class="col-md-6">
	 									<div class="form-group">
											<div class="form-group">
												<h5>Employee Email:  <span class="text-danger">*</span></h5>
												<div class="controls">
												<input type="email" name="employee_email" class="form-control" value="{{ $employees->employee_email}}" required="">
											     @error('employee_email') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror
									 	  		</div>
		 									</div>
				
										</div>
									</div> <!-- end col md 4 -->
			
								</div> <!-- end 1st row  -->
								<div class="row"> <!-- start 2nd row  -->

									<div class="col-md-6">
	 									<div class="form-group">

											<div class="form-group">
												<h5>Employee Phone Number:  <span class="text-danger">*</span></h5>
												<div class="controls">
												<input type="phone" name="employee_phone_no" class="form-control" required="" value="{{ $employees->employee_phone_no }}">
											     @error('employee_phone_no') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror
									 	  		</div>
		 									</div>
				
										</div>
									</div> <!-- end col md 4 -->

									<div class="col-md-6">
	 									<div class="form-group">

											<div class="form-group">
												<h5>Date Joined: <span class="text-danger">*</span></h5>
												<div class="controls">
												<input type="date" name="date_joined" class="form-control" required="" value="{{ $employees->date_joined }}">
											     @error('date_joined') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror
									 	  		</div>
		 									</div>
				
										</div>
									</div> <!-- end col md 4 -->
			
								</div> <!-- end 2nd row  -->

								<div class="row"> <!-- start 3rd row  -->

									<div class="col-md-6">
	 									<div class="form-group">

											<div class="form-group">
												<h5>Employee KRA PIN: <span class="text-danger">*</span></h5>
												<div class="controls">
												<input type="text" name="employee_kra_pin" class="form-control" required="" value="{{ $employees->employee_kra_pin}}">
											     @error('employee_kra_pin') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror
									 	  		</div>
		 									</div>
				
										</div>
									</div> <!-- end col md 4 -->

									<div class="col-md-6">
	 									<div class="form-group">

											<div class="form-group">
												<h5>NHIF NO <span class="text-danger">*</span></h5>
												<div class="controls">
												<input type="text" name="nhif_no" class="form-control" required="" value="{{ $employees->nhif_no}}">
											     @error('nhif_no') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror
									 	  		</div>
		 									</div>
				
										</div>
									</div> <!-- end col md 4 -->
			
								</div> <!-- end 3rd row  -->
								<div class="row"> <!-- start 4th row  -->

									<div class="col-md-6">
	 									<div class="form-group">

											<div class="form-group">
												<h5>NSSF NO  <span class="text-danger">*</span></h5>
												<div class="controls">
												<input type="phone" name="employee_nssf_no" class="form-control" required="" value="{{ $employees->employee_nssf_no}}">
											     @error('employee_nssf_no') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror
									 	  		</div>
		 									</div>
				
										</div>
									</div> <!-- end col md 4 -->

									<div class="col-md-6">
	 									<div class="form-group">

											<div class="form-group">
												<h5>Designation <span class="text-danger">*</span></h5>
												<div class="controls">
												<input type="text" name="employee_designation" class="form-control" required="" value="{{ $employees->employee_designation}}">
											     @error('employee_designation') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror
									 	  		</div>
		 									</div>
				
										</div>
									</div> <!-- end col md 4 -->
			
								</div> <!-- end 4th row  -->
								<div class="row"> <!-- start 5th row  -->

									<div class="col-md-6">
									 	<div class="form-group">
											<h5>Gender <span class="text-danger">*</span></h5>
											<div class="controls">
												<select name="employee_gender" class="form-control" required="" >
													<option value="{{ $employees->employee_gender}}" selected="">{{ $employees->employee_gender}}</option>
													<option value="Male">Male</option>
													<option value="Female">Femaale</option>	
												</select>
												@error('employee_gender') 
											 <span class="text-danger">{{ $message }}</span>
											 @enderror 
											 </div>
										</div>
									</div> <!-- end col md 4 -->

									<div class="col-md-6">
	 									<div class="form-group">

											<div class="form-group">
												<h5>National ID <span class="text-danger">*</span></h5>
												<div class="controls">
												<input type="text" name="employee_national_id" class="form-control" required="" value="{{ $employees->employee_national_id}}">
											     @error('employee_national_id') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror
									 	  		</div>
		 									</div>
				
										</div>
									</div> <!-- end col md 4 -->

									
									
			
								</div> <!-- end 5th row  -->
						</div>
					</section>

						<!-- Bank Details -->
					<section class="content">
			 			<div class="box-header with-border">
				  			<h4 class="box-title" style="text-decoration: underline;">2. Update Bank Details </h4>
						</div>
					 	<div class="row">
							<div class="col-12">	
								<div class="row"> <!-- start 1st row  -->

									<div class="col-md-6">
	 									<div class="form-group">

											<div class="form-group">
												<h5>Bank Name:  <span class="text-danger">*</span></h5>
												<div class="controls">
												<input type="text" name="employee_bank_name" class="form-control" required="" value="{{ $employees->employee_bank_name}}">
											     @error('bank_name') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror
									 	  		</div>
		 									</div>
				
										</div>
									</div> <!-- end col md 4 -->

									<div class="col-md-6">
	 									<div class="form-group">
											<div class="form-group">
												<h5>Bank Branch:  <span class="text-danger">*</span></h5>
												<div class="controls">
												<input type="text" name="employee_bank_branch" class="form-control" required="" value="{{ $employees->employee_bank_branch}}">
											     @error('employee_bank_branch') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror
									 	  		</div>
		 									</div>
				
										</div>
									</div> <!-- end col md 4 -->
			
								</div> <!-- end 1st row  -->
								<div class="row"> <!-- start 2nd row  -->

									<div class="col-md-12">
	 									<div class="form-group">

											<div class="form-group">
												<h5>Bank Account Number:  <span class="text-danger">*</span></h5>
												<div class="controls">
												<input type="text" name="employee_bank_acc_no" class="form-control" required="" value="{{ $employees->employee_bank_acc_no}}">
											     @error('employee_bank_acc_no') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror
									 	  		</div>
		 									</div>
				
										</div>
									</div> <!-- end col md 4 -->

			
								</div> <!-- end 2nd row  -->

								
						</div>
					</section>
					<!--Salary Section-->
					<section class="content">
			 			<div class="box-header with-border">
				  			<h4 class="box-title" style="text-decoration: underline;">3. Salary and Earnings</h4>
						</div>
					 	<div class="row">
							<div class="col-12">	
								<div class="row"> <!-- start 1st row  -->

									<div class="col-md-6">
	 									<div class="form-group">

											<div class="form-group">
												<h5>Employee Basic Salary:  <span class="text-danger">*</span></h5>
												<div class="controls">
												<input type="text" name="employee_basic_salary" class="form-control" required="" value="{{ $employees->employee_basic_salary}}">
											     @error('employee_basic_salary') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror
									 	  		</div>
		 									</div>
				
										</div>
									</div> <!-- end col md 4 -->

									<div class="col-md-6">
	 									<div class="form-group">
											<div class="form-group">
												<h5>Housing Allowance:  <span class="text-danger">*</span></h5>
												<div class="controls">
												<input type="text" name="employee_housing_allowance" class="form-control" required="" value="{{ $employees->employee_housing_allowance}}">
											     @error('employee_housing_allowance') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror
									 	  		</div>
		 									</div>
				
										</div>
									</div> <!-- end col md 4 -->
			
								</div> <!-- end 1st row  -->
								<div class="row"> <!-- start 2nd row  -->

									<div class="col-md-6">
	 									<div class="form-group">

											<div class="form-group">
												<h5>Commission:  <span class="text-danger">*</span></h5>
												<div class="controls">
												<input type="text" name="employee_comission" class="form-control" required="" value="{{ $employees->employee_comission}}">
											     @error('employee_comission') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror
									 	  		</div>
		 									</div>
				
										</div>
									</div> <!-- end col md 4 -->

									<div class="col-md-6">
	 									<div class="form-group">

											<div class="form-group">
												<h5>Other Allowances: <span class="text-danger">*</span></h5>
												<div class="controls">
												<input type="text" name="other_allowances" class="form-control" required="" value="{{ $employees->other_allowances}}">
											     @error('other_allowances') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror
									 	  		</div>
		 									</div>
				
										</div>
									</div> <!-- end col md 4 -->
			
								</div> <!-- end 2nd row  -->

								<div class="row"> <!-- start 3rd row  -->

									<div class="col-md-6">
	 									<div class="form-group">

											<div class="form-group">
												<h5>Bonuses  <span class="text-danger">*</span></h5>
												<div class="controls">
												<input type="text" name="employee_bonuses" class="form-control" required="" value="{{ $employees->employee_bonuses}}">
											     @error('employee_bonuses') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror
									 	  		</div>
		 									</div>
				
										</div>
									</div> <!-- end col md 4 -->
			
								</div> <!-- end 3rd row  -->
								
								
						</div>
					</section>
					<section class="content">
			 			<div class="box-header with-border">
				  			<h4 class="box-title" style="text-decoration: underline;">4. Salary Deductions</h4>
						</div>
					 	<div class="row">
							<div class="col-12">	
								<div class="row"> <!-- start 1st row  -->

									<div class="col-md-6">
	 									<div class="form-group">

											<div class="form-group">
												<h5>PAYE:  <span class="text-danger">*</span></h5>
												<div class="controls">
												<input type="text" name="employee_paye" class="form-control" required="" value="{{ $employees->employee_paye}}">
											     @error('employee_paye') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror
									 	  		</div>
		 									</div>
				
										</div>
									</div> <!-- end col md 4 -->

									<div class="col-md-6">
	 									<div class="form-group">
											<div class="form-group">
												<h5>NSSF:  <span class="text-danger">*</span></h5>
												<div class="controls">
												<input type="text" name="employee_nssf" class="form-control" required="" value="{{ $employees->employee_nssf}}">
											     @error('employee_nssf') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror
									 	  		</div>
		 									</div>
				
										</div>
									</div> <!-- end col md 4 -->
			
								</div> <!-- end 1st row  -->
								<div class="row"> <!-- start 2nd row  -->

									<div class="col-md-6">
	 									<div class="form-group">

											<div class="form-group">
												<h5>NHIF:  <span class="text-danger">*</span></h5>
												<div class="controls">
												<input type="text" name="employee_nhif" class="form-control" required="" value="{{ $employees->employee_nhif}}">
											     @error('employee_nhif') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror
									 	  		</div>
		 									</div>
				
										</div>
									</div> <!-- end col md 4 -->

									<div class="col-md-6">
	 									<div class="form-group">

											<div class="form-group">
												<h5>COTU: <span class="text-danger">*</span></h5>
												<div class="controls">
												<input type="text" name="employee_cotu" class="form-control" required="" value="{{ $employees->employee_cotu}}">
											     @error('employee_cotu') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror
									 	  		</div>
		 									</div>
				
										</div>
									</div> <!-- end col md 4 -->
			
								</div> <!-- end 2nd row  -->

								<div class="row"> <!-- start 3rd row  -->

									<div class="col-md-6">
	 									<div class="form-group">

											<div class="form-group">
												<h5>Loans  <span class="text-danger">*</span></h5>
												<div class="controls">
												<input type="text" name="employee_loans" class="form-control" required="" value="{{ $employees->employee_loans}}">
											     @error('employee_loans') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror
									 	  		</div>
		 									</div>
				
										</div>
									</div> <!-- end col md 4 -->
			
								</div> <!-- end 3rd row  -->
								
								
						</div>
					</section>

						 
						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Generate Payslip">
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
		<!-- /.content -->
			
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