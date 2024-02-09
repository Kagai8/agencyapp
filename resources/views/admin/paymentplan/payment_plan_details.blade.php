@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   
<div class="container-full">
		<!-- Content Header (Page header) -->
		  

		<!-- Main content -->
	<section class="content">

		<div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">In Depth Details for PaymentPlan PP{{$payment_plan->id  }}</h4>
			  <small class="subtitle">More description about the payment plan</small>
			</div>
			  
			<!-- /.box-header -->
			<div class="box-body">
			  	<div class="row">
                    <div class="col-md-6">
                        <!-- Add details or content for the left side here -->
                        <div class="details-section" style="border-right: 1px solid #e3e3e3; padding-right: 15px;">
                            <h6>Customer Name:</h6>
                            <p>{{ $payment_plan->customer->customer_name}}</p>
                    	</div>
                    </div>
                    <div class="col-md-6">
                    	<div class="details-section" style="padding-left: 15px;">
                            <h6>Customer Email:</h6>
                            <p>{{ $payment_plan->customer->customer_email}}</p>
                    	</div>
                    </div>
               	</div>
                <div class="row">
                    <div class="col-md-6">
                        <!-- Add details or content for the left side here -->
                        <div class="details-section" style="border-right: 1px solid #e3e3e3; padding-right: 15px;">
                            <h6>Customer Phone:</h6>
                            <p>{{ $payment_plan->customer->customer_phone_no}}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="details-section" style="padding-left: 15px;">
                            <h6>Customer KRA pin:</h6>
                            <p>{{ $payment_plan->customer->customer_kra_pin}}</p>
                        </div>
                    </div>
                </div>
               	<div class="row">
                    <div class="col-md-6">
                        <!-- Add details or content for the left side here -->
                        <div class="details-section" style="border-right: 1px solid #e3e3e3; padding-right: 15px;">
                            <h6>Gross Amount::</h6>
                            <p>Ksh {{ $payment_plan->original_amount}}</p>
                    	</div>
                    </div>
                    <div class="col-md-6">
                    	<div class="details-section" style="padding-left: 15px;">
                            <h6>Net Amount(After Levy):</h6>
                            <p>Ksh {{ $payment_plan->net_amount}}</p>
                    	</div>
                    </div>
               	</div>
               	<div class="row">
                    <div class="col-md-6">
                        <!-- Add details or content for the left side here -->
                        <div class="details-section" style="border-right: 1px solid #e3e3e3; padding-right: 15px;">
                            <h6>Planned Months:</h6>
                            <p>{{ $payment_plan->months}} months</p>
                    	</div>
                    </div>
                    <div class="col-md-6">
                    	<div class="details-section" style="padding-left: 15px;">
                            <h6>Remaining months:</h6>
                            <p>{{ $payment_plan->months_left}} months</p>
                    	</div>
                    </div>
               	</div>
                <div class="row">
                    <div class="col-md-6">
                        <!-- Add details or content for the left side here -->
                        <div class="details-section" style="border-right: 1px solid #e3e3e3; padding-right: 15px;">
                            <h6>Balance:</h6>
                            <p>Ksh {{ $payment_plan->net_amount}}</p>
                        </div>
                    </div>
                    
                </div>

               	<div class="row">
                    <div class="col-md-6">
                        <!-- Add details or content for the left side here -->
                        <div class="details-section" style="border-right: 1px solid #e3e3e3; padding-right: 15px;">
                            <h6>Active Status:</h6>
                            @if($payment_plan->status == 0)
                            <p><span class="badge badge-pill badge-info">Payment Plan Active</span></p>
                            @else
                            <p><span class="badge badge-pill badge-success">Payment Plan Fully Paid</span></p>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="details-section" style="padding-left: 15px;">
                            <h6>Approval Status:</h6>
                            @if($payment_plan->approval == 1)
                            <p><span class="badge badge-pill badge-success">Approved</span></p>
                            @else
                            <p><span class="badge badge-pill badge-warning">Pending Approval</span></p>
                            @endif
                        </div>
                    </div>
                </div>
               	<div class="row">
                    <div class="col-md-6">
                        <!-- Add details or content for the left side here -->
                        <div class="details-section" style="border-right: 1px solid #e3e3e3; padding-right: 15px;">
                            <h6>Plan Created By:</h6>
                            <p>{{ $payment_plan->created_by}} </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="details-section" style="padding-left: 15px;">
                            <h6>Created At:</h6>
                            <p>{{ \Carbon\Carbon::parse($payment_plan->created_at )->format('d F Y')}}  {{ \Carbon\Carbon::parse($payment_plan->updated_at )->format('H') }} hr {{ \Carbon\Carbon::parse($payment_plan->updated_at )->format('m')}} mins</p>
                        </div>
                    </div>
                </div>
               	
			<!-- /.box-body -->
		</div>
		  <!-- /.box -->


    		<div class="box">
        			<div class="box-header with-border">
        			  <h5 class="box-title"> Commission Information</h5>
        			</div>
    			<!-- /.box-header -->
    			     <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Add details or content for the left side here -->
                                <div class="details-section" style="border-right: 1px solid #e3e3e3; padding-right: 15px;">
                                    <h6>Commission Percentage:</h6>
                                    <p> {{ $payment_plan->commission_premium}} %</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="details-section" style="padding-left: 15px;">
                                    <h6>Commission Commission:</h6>
                                    @if ($payment_plan->commission)
                                        <p>Ksh {{ $payment_plan->commission->commission }}</p>
                                    @else
                                        <p>No commission available until approved</p>
                                    @endif
                                </div>
                            </div>
                    </div>
    			  	 <div class="row">
                    <div class="col-md-6">
                        <!-- Add details or content for the left side here -->
                        <div class="details-section" style="border-right: 1px solid #e3e3e3; padding-right: 15px;">
                            <h6>Commission Status:</h6>
                            @if($payment_plan->commission_credited == 1)
                            <p><span class="badge badge-pill badge-success">Commission Credited</span></p>
                            @else
                            <p><span class="badge badge-pill badge-danger">Commission Not Credited</span></p>
                            @endif
                        </div>
                    </div>
                    
                </div>
    	               </div>
    		</div>
            <div class="box">
                <div class="box-header with-border">
                  <h5 class="box-title"> Installemt Information</h5>
                </div>
                <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Installment Amount</th>
                                        <th>Due Date</th>
                                        <th>Mode of Payment</th>
                                        <th>Transaction Code</th>
                                        <th>Updated By</th>
                                        <th>Updated At</th>
                                        <th>Status</th>

                                                                                <!-- Add more columns if needed -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($payment_plan->installments as $installment)
                                        <tr>
                                            <td>{{ $installment->installment }}</td>
                                            <td>{{ $installment->due_date }}</td>
                                            <td>{{ $installment->payment_option }}</td>
                                           
                                            <td>
                                                @if($installment->transaction_code)
                                                {{ $installment->transaction_code }}
                                                @else
                                                No Code Yet
                                                @endif
                                            </td>
                                            
                                            <td>
                                                @if($installment->updated_by)
                                                {{ $installment->updated_by }}
                                                @else
                                                N/A
                                                @endif
                                            </td>
                                            <td>
                                                @if($installment->updated_at)
                                                {{ \Carbon\Carbon::parse($installment->updated_at )->format('d F Y')}} 
                                                @else
                                                N/A
                                                @endif
                                            </td>
                                            <td>
                                                @if($installment->status)
                                                    <span class="badge badge-success">Paid</span>
                                                @else
                                                    <span class="badge badge-danger">Unpaid</span>
                                                @endif
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
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