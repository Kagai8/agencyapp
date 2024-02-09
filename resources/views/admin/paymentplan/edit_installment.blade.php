@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   
<div class="container-full">
		<!-- Content Header (Page header) -->
		  

		<!-- Main content -->
	<section class="content">

		<div class="box">
			<div class="box-header with-border">
			  <h5 class="box-title">Installment IMT{{ $installment->id }}</h5>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
  					<form method="post" action="{{ route('update-installment-details', ['id' => $installment->id]) }}" enctype="multipart/form-data">
		 			@csrf
		 			<input type="hidden" name="id" value="{{ $installment->id }}">
			 			<div class="box-header with-border">
				  			<h4 class="box-title" style="text-decoration: underline;">Add Installment </h4>
						</div>
					 	<div class="row">
							<div class="col-md-6">
	 									<div class="form-group">

											<div class="form-group">
												<h5>Installment Amount:  <span class="text-danger">*</span></h5>
												<div class="controls">
												
                        						<input type="text" class="form-control" id="installmentAmount" name="installment" required value="{{$installment->installment}}">
											     @error('installment') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror
									 	  		</div>
		 									</div>
				
										</div>
							</div> <!-- end col md 4 -->

									<div class="col-md-6">
	 									<div class="form-group">

											<div class="form-group">
												<h5>Payment Method: <span class="text-danger">*</span></h5>
												<div class="controls">
												<select name="payment_option" class="form-control" required="" >
														
														  <option value="Mpesa" {{ $installment->payment_option === 'Mpesa' ? 'selected' : '' }}>Mpesa</option>
												          <option value="Cash" {{ $installment->payment_option === 'Cash' ? 'selected' : '' }}>Cash</option>
												          <option value="Cheque" {{ $installment->payment_option === 'Cheque' ? 'selected' : '' }}>Cheque</option>	
																	
														
													</select>
											     @error('payment_option') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror
									 	  		</div>
		 									</div>
				
										</div>
							</div> <!-- end col md 4 -->
						</div>
						<div class="row">
							<div class="col-md-6">
	 									<div class="form-group">

											<div class="form-group">
												<h5>Transaction Code:  <span class="text-danger">*</span></h5>
												<div class="controls">
												
                        						<input type="text" class="form-control" id="transactionCodes" name="transaction_code">
											     @error('transaction_code') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror
									 	  		</div>
		 									</div>
				
										</div>
							</div> <!-- end col md 4 -->

									<div class="col-md-6">
	 									<div class="form-group">

											<div class="form-group">
												<h5>Status: <span class="text-danger">*</span></h5>
												<div class="controls">
												<select name="status" class="form-control" required="" >
														
														  		<option value="1" {{ $installment->payment_option == 1 ? 'selected' : '' }}>Paid</option>
												          <option value="0" {{ $installment->payment_option == 2 ? 'selected' : '' }}>Unpaid</option>
												          
																	
														
													</select>
											     @error('status') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror
									 	  		</div>
		 									</div>
				
										</div>
							</div> <!-- end col md 4 -->
						</div>
					
						 
						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Installment">
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