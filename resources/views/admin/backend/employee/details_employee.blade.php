@extends('admin.admin_master')
@section('title')
<title>Employee Details for {{ $employee->employee_name}}</title>
@endsection
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   
<div class="container-full">
		<!-- Content Header (Page header) -->
		  

		<!-- Main content -->
	<section class="content">

		<div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">1. Account Details for E{{$employee->id  }}</h4>
			  <small class="subtitle">More description about the employee account</small>
			</div>
			  
			<!-- /.box-header -->
			<div class="box-body">
			  	<div class="row">
                    <div class="col-md-6">
                        <!-- Add details or content for the left side here -->
                        <div class="details-section" style="border-right: 1px solid #e3e3e3; padding-right: 15px;">
                            <h6>Employee Name:</h6>
                            <p>{{ $employee->employee_name}}</p>
                    	</div>
                    </div>
                    <div class="col-md-6">
                    	<div class="details-section" style="padding-left: 15px;">
                            <h6>Employee Email:</h6>
                            <p>{{ $employee->employee_email}}</p>
                    	</div>
                    </div>
               	</div>
                <div class="row">
                    <div class="col-md-6">
                        <!-- Add details or content for the left side here -->
                        <div class="details-section" style="border-right: 1px solid #e3e3e3; padding-right: 15px;">
                            <h6>Employee Phone:</h6>
                            <p>{{ $employee->employee_phone_no}}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <!-- Add details or content for the left side here -->
                        <div class="details-section" style="border-right: 1px solid #e3e3e3; padding-right: 15px;">
                            <h6>Date Joined:</h6>
                            <p>{{ $employee->date_joined}}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="details-section" style="padding-left: 15px;">
                            <h6>Employment Period:</h6>
                            @php
                                $dateJoined = \Carbon\Carbon::parse($employee->date_joined);
                                $now = \Carbon\Carbon::now();
                                $diff = $dateJoined->diff($now);
                                $years = $diff->y;
                                $months = $diff->m;
                                $days = $diff->d;
                            @endphp
                            <p>{{ $years }} years, {{ $months }} months, and {{ $days }} days</p>
                        </div>
                    </div>
                </div>
                    
                
               	<div class="row">
                    <div class="col-md-6">
                        <!-- Add details or content for the left side here -->
                        <div class="details-section" style="border-right: 1px solid #e3e3e3; padding-right: 15px;">
                            <h6>Employee National ID:</h6>
                            <p>{{ $employee->employee_national_id}}</p>
                    	</div>
                    </div>
                    <div class="col-md-6">
                        <div class="details-section" style="padding-left: 15px;">
                            <h6>Employee KRA pin:</h6>
                            <p>{{ $employee->employee_kra_pin}}</p>
                        </div>
                    </div>
                    
               	</div>
                <div class="row">
                    <div class="col-md-6">
                        <!-- Add details or content for the left side here -->
                        <div class="details-section" style="border-right: 1px solid #e3e3e3; padding-right: 15px;">
                            <h6>Employee NSSF NO:</h6>
                            <p>{{ $employee->employee_nssf_no}}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="details-section" style="padding-left: 15px;">
                            <h6>Employee NHIF NO:</h6>
                            <p>{{ $employee->nhif_no}}</p>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <!-- Add details or content for the left side here -->
                        <div class="details-section" style="border-right: 1px solid #e3e3e3; padding-right: 15px;">
                            <h6>Employee Gender:</h6>
                            <p>{{ $employee->employee_gender}}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="details-section" style="padding-left: 15px;">
                            <h6>Employee Designation:</h6>
                            <p>{{ $employee->employee_designation}}</p>
                        </div>
                    </div>
                    
                </div>
               	
               	<div class="row">
                    <div class="col-md-6">
                        <!-- Add details or content for the left side here -->
                        <div class="details-section" style="border-right: 1px solid #e3e3e3; padding-right: 15px;">
                            <h6>Account Created By:</h6>
                            <p>{{ $employee->created_by}} </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="details-section" style="padding-left: 15px;">
                            <h6>Created At:</h6>
                            <p>{{ \Carbon\Carbon::parse($employee->created_at )->format('d F Y')}}  {{ \Carbon\Carbon::parse($employee->updated_at )->format('H') }} hr {{ \Carbon\Carbon::parse($employee->updated_at )->format('m')}} mins</p>
                        </div>
                    </div>
                </div>
               	
			<!-- /.box-body -->
		</div>
		  <!-- /.box -->


    		<div class="box">
        			<div class="box-header with-border">
        			  <h5 class="box-title">2. Bank Information</h5>
        			</div>
    			<!-- /.box-header -->
    			     <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Add details or content for the left side here -->
                                <div class="details-section" style="border-right: 1px solid #e3e3e3; padding-right: 15px;">
                                    <h6>Bank Name:</h6>
                                    <p> {{ $employee->employee_bank_name}} </p>
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="details-section" style="padding-left: 15px;">
                                    <h6>Bank Branch:</h6>
                                    <p> {{ $employee->employee_bank_branch}} </p>
                                </div>
                            </div>
                    </div>
    			  	 <div class="row">
                    <div class="col-md-6">
                        <!-- Add details or content for the left side here -->
                        <div class="details-section" style="border-right: 1px solid #e3e3e3; padding-right: 15px;">
                            <h6>Bank Account Number :</h6>
                             <p>{{ $employee->employee_bank_acc_no}} </p>
                            
                        </div>
                    </div>
                    
                </div>
    	               </div>
    		</div>

            <div class="box">
                    <div class="box-header with-border">
                      <h5 class="box-title"> Basic Salary and other Earningd</h5>
                    </div>
                <!-- /.box-header -->
                     <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Add details or content for the left side here -->
                                <div class="details-section" style="border-right: 1px solid #e3e3e3; padding-right: 15px;">
                                    <h6>Basic Salary:</h6>
                                    <p> {{ $employee->employee_basic_salary}} </p>
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="details-section" style="padding-left: 15px;">
                                    <h6>Housing Allowances:</h6>
                                    <p> {{ $employee->employee_housing_allowance}} </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Add details or content for the left side here -->
                                <div class="details-section" style="border-right: 1px solid #e3e3e3; padding-right: 15px;">
                                    <h6>Other Allowances :</h6>
                                     <p>{{ $employee->other_allowances}} </p>
                                    
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="details-section" style="padding-left: 15px;">
                                    <h6>Employee Bonuses:</h6>
                                    <p> {{ $employee->employee_bonuses}} </p>
                                </div>
                            </div>
                    
                        </div>
                        
                    </div>
            </div>

            <div class="box">
                    <div class="box-header with-border">
                      <h5 class="box-title">4. PAYE and Other Deductions</h5>
                    </div>
                <!-- /.box-header -->
                     <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Add details or content for the left side here -->
                                <div class="details-section" style="border-right: 1px solid #e3e3e3; padding-right: 15px;">
                                    <h6>Employee PAYE:</h6>
                                    <p> {{ $employee->employee_paye}} </p>
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="details-section" style="padding-left: 15px;">
                                    <h6>Employee NSSF:</h6>
                                    <p> {{ $employee->employee_nssf}} </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Add details or content for the left side here -->
                                <div class="details-section" style="border-right: 1px solid #e3e3e3; padding-right: 15px;">
                                    <h6>Employee NHIF :</h6>
                                     <p>{{ $employee->employee_nhif}} </p>
                                    
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="details-section" style="padding-left: 15px;">
                                    <h6>Employee COTU:</h6>
                                    <p> {{ $employee->employee_cotu}} </p>
                                </div>
                            </div>
                    
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Add details or content for the left side here -->
                                <div class="details-section" style="border-right: 1px solid #e3e3e3; padding-right: 15px;">
                                    <h6>Loans :</h6>
                                     <p>{{ $employee->employee_loans}} </p>
                                    
                                </div>
                            </div>

                            
                    
                        </div>

                        <div class="box">
                            <div class="box-header with-border">
                              <h5 class="box-title">Image for {{ $employee->employee_name}}, ID: E0{{$employee->id  }}</h5>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="card-body d-flex justify-content-center align-items-center" >
                                        <img src="{{ asset($employee->employee_image) }}" alt="Goat Image" class="card-img-top" style="height: 340px; width: 390px;">
                                </div>
                            </div>
                        </div>
                        
                    </div>
            </div>
            
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