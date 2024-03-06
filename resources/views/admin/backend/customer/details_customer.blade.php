@extends('admin.admin_master')
@section('title')
<title>Customer Details for {{ $customer->customer_name}}</title>
@endsection
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   
<div class="container-full">
		<!-- Content Header (Page header) -->
		  

		<!-- Main content -->
	<section class="content">

		<div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Account Details for CUST{{$customer->id  }}</h4>
			  <small class="subtitle">More description about the customer account</small>
			</div>
			  
			<!-- /.box-header -->
			<div class="box-body">
			  	<div class="row">
                    <div class="col-md-6">
                        <!-- Add details or content for the left side here -->
                        <div class="details-section" style="border-right: 1px solid #e3e3e3; padding-right: 15px;">
                            <h6>Customer Name:</h6>
                            <p>{{ $customer->customer_name}}</p>
                    	</div>
                    </div>
                    <div class="col-md-6">
                    	<div class="details-section" style="padding-left: 15px;">
                            <h6>Customer Email:</h6>
                            <p>{{ $customer->customer_email}}</p>
                    	</div>
                    </div>
               	</div>
                <div class="row">
                    <div class="col-md-6">
                        <!-- Add details or content for the left side here -->
                        <div class="details-section" style="border-right: 1px solid #e3e3e3; padding-right: 15px;">
                            <h6>Customer Phone:</h6>
                            <p>{{ $customer->customer_phone_no}}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="details-section" style="padding-left: 15px;">
                            <h6>Customer KRA pin:</h6>
                            <p>{{ $customer->customer_kra_pin}}</p>
                        </div>
                    </div>
                </div>
               	<div class="row">
                    <div class="col-md-6">
                        <!-- Add details or content for the left side here -->
                        <div class="details-section" style="border-right: 1px solid #e3e3e3; padding-right: 15px;">
                            <h6>Customer National ID:</h6>
                            <p>{{ $customer->customer_national_id}}</p>
                    	</div>
                    </div>
                    
               	</div>
               	
               	<div class="row">
                    <div class="col-md-6">
                        <!-- Add details or content for the left side here -->
                        <div class="details-section" style="border-right: 1px solid #e3e3e3; padding-right: 15px;">
                            <h6>Account Created By:</h6>
                            <p>{{ $customer->created_by}} </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="details-section" style="padding-left: 15px;">
                            <h6>Created At:</h6>
                            <p>{{ \Carbon\Carbon::parse($customer->created_at )->format('d F Y')}}  {{ \Carbon\Carbon::parse($customer->updated_at )->format('H') }} hr {{ \Carbon\Carbon::parse($customer->updated_at )->format('m')}} mins</p>
                        </div>
                    </div>
                </div>
               	
			<!-- /.box-body -->
		</div>
		  <!-- /.box -->


    		<div class="box">
        			<div class="box-header with-border">
        			  <h5 class="box-title"> Customer Contact Person Information</h5>
        			</div>
    			<!-- /.box-header -->
    			     <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Add details or content for the left side here -->
                                <div class="details-section" style="border-right: 1px solid #e3e3e3; padding-right: 15px;">
                                    <h6>Contact Person's Name:</h6>
                                    @if ($customer->customer_contact_person_name)
                                    <p> {{ $customer->customer_contact_person_name}} </p>
                                    @else
                                    <p> Not Available</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="details-section" style="padding-left: 15px;">
                                    <h6>Contact Person's Email :</h6>
                                    @if ($customer->customer_contact_person_email)
                                    <p> {{ $customer->customer_contact_person_email}} </p>
                                    @else
                                    <p> Not Available</p>
                                    @endif
                                </div>
                            </div>
                    </div>
    			  	 <div class="row">
                    <div class="col-md-6">
                        <!-- Add details or content for the left side here -->
                        <div class="details-section" style="border-right: 1px solid #e3e3e3; padding-right: 15px;">
                            <h6>Contact Person's Phone Number :</h6>
                            @if ($customer->customer_contact_person_phone)
                            <p> {{ $customer->customer_contact_person_phone}} </p>
                            @else
                            <p> Not Available</p>
                            @endif
                        </div>
                    </div>
                    
                </div>
    	               </div>
    		</div>
            
		</div>
		  <!-- /.box -->

        <div class="box">
                <div class="box-header with-border">
                  <h4 class="box-title">One Off Purchases  for {{ $customer->name}}, ID: C{{$customer->id  }}</h4>
                  <small class="subtitle">Summary for One Off Purchases details</small>
                </div>

                  
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        @if(isset($customer->onetimePurchases) && $customer->onetimePurchases->count() > 0)
                                  <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>One Time Purchase ID</th>
                                            
                                            <th>Gross Amount </th>
                                            <th>Net Amount </th>
                                            <th>Created By </th>
                                            <th>Date</th>
                                            
                                            
                                            
                                             
                                        </tr>
                                    </thead>
                                        <tbody>
                                         @foreach($customer->onetimePurchases as $item)
                                         <tr>
                                             <td>OTP{{ $item->id }}</td>
                                             
                                             <td>{{ $item->original_amount }} </td>
                                             <td>{{ $item->net_amount }} </td>
                                             <td>{{ $item->created_by }} </td>
                                             <td> {{ \Carbon\Carbon::parse($item->created_at )->format('d F Y')}}</td>
                                             
                                             


                                            
                                                                 
                                         </tr>
                                          @endforeach
                                        </tbody>
                             
                                    </table>
                                    @else
                                    <table id="example1" class="table table-bordered table-striped">
                                    
                                        <tbody>
                                         <p>No Data To Display</p>
                                        </tbody>
                                    
                                    </table>
                                    @endif
                                </div>

                </div>
                <!-- /.box-body -->
            </div>

            <div class="box">
                <div class="box-header with-border">
                  <h4 class="box-title">Payment Plans for {{ $customer->customer_name}}, ID: C{{$customer->id  }}</h4>
                  <small class="subtitle">Summary for payment plans details</small>
                </div>

                  
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        @if(isset($customer->paymentPlans) && $customer->paymentPlans->count() > 0)
                                  <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Payment Plan ID</th>
                                            <th>Gross Amount</th>
                                            <th>Net Amount </th>
                                            <th>Balance</th>
                                            <th>Approval </th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                         @foreach($customer->paymentPlans as $item)
                                         <tr>
                                             <td width="10%">PP{{ $item->id }}</td>
                                             
                                             <td>{{ $item->net_amount }} </td>
                                             <td>{{ $item->original_amount }} </td>
                                             <td> {{ $item->balance }}</td>

                                             <td>
                                                @if($item->approval == 1)
                                                <span class="badge badge-pill badge-success"> Approved </span>
                                                @else
                                               <span class="badge badge-pill badge-warning"> Pending  </span>
                                                @endif
                                             </td>
                                         </tr>
                                            @endforeach
                                        </tbody>
                             
                                    </table>
                                    @else
                                    <table id="example1" class="table table-bordered table-striped">
                                    
                                        <tbody>
                                         <p>No Data To Display</p>
                                        </tbody>
                                    
                                    </table>
                                    @endif
                                </div>

                </div>
                <!-- /.box-body -->
            </div>

            <div class="box">
                <div class="box-header with-border">
                  <h4 class="box-title">Installment History for {{ $customer->customer_name}}, ID: C{{$customer->id  }}</h4>
                  <small class="subtitle">Summary for installments </small>
                </div>

                  
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        @if(isset($customer->installments) && $customer->installments->count() > 0)
                                  <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Installment ID</th>
                                            <th>Payment Plan ID</th>
                                            
                                            <th>Installment </th>
                                            <th>Recorded By </th>
                                            <th>Created At</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                         @foreach($customer->installments as $item)
                                         <tr>
                                             <td>IM{{ $item->id }}</td>
                                             <td>PP{{ $item->payment_plan_id }}</td>
                                             
                                             <td>{{ $item->installment }} </td>
                                             <td> {{ $item->recorded_by }}</td>
                                             <td> {{ $item->created_at }}</td>
                                             <td>
                                                @if($item->status)
                                                    <span class="badge badge-success">Paid</span>
                                                @else
                                                    <span class="badge badge-danger">Unpaid</span>
                                                @endif
                                             </td>
                                         </tr>
                                            @endforeach
                                        </tbody>
                             
                                    </table>
                                    @else
                                    <table id="example1" class="table table-bordered table-striped">
                                    
                                        <tbody>
                                         <p>No Data To Display</p>
                                        </tbody>
                                    
                                    </table>
                                    @endif
                                </div>

                </div>
                <!-- /.box-body -->
            </div>
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