@extends('admin.admin_master')
@section('title')
<title>App Suspension</title>
@endsection
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			   
		 

			<div class="col-7">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Account Suspension Settings </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Reason </th>
								<th>Updated At </th>
								<th>Status </th>
								<th>Action</th>
								 
							</tr>
						</thead>
						<tbody>
							 @foreach($settings as $item)
							 <tr>
							 	<td> {{ $item->reason }}  </td>
								<td>{{ \Carbon\Carbon::parse($item->updated_at )->format('d F Y')}}</td>
								 <td >
								 	@if($item->suspension_status == 0)
	                                <p><span class="badge badge-pill badge-success">Active</span></p>
	                                @else
	                                <p><span class="badge badge-pill badge-warning">Suspended</span></p>
	                                @endif
								 </td>
								<td>
									 @if($item->suspension_status == 1)
									 	<a href="{{ route('suspend.account',$item->id) }}" class="btn btn-warning" title="Suspend Account?"><i class="fa fa-arrow-down"></i> </a>
										 @else
										 <a href="{{ route('activate.account',$item->id) }}" class="btn btn-success" title="Update Active"><i class="fa fa-arrow-up"></i> </a>
									@endif
								</td>
													 
							 </tr>
							  @endforeach
						</tbody>
						 
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			          
			</div>
			<!-- /.col -->


<!--   ------------ Add Category Page -------- -->


          <div class="col-5">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Create Reason </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


						 <form method="post" action="{{ route('create.reason') }}" >
							 	@csrf
							  	<div class="form-group">
									<h5>Reason <span class="text-danger">*</span></h5>
									<div class="controls">
										 <input type="text"  name="reason" class="form-control" > 
										 @error('reason') 
										 <span class="text-danger">{{ $message }}</span>
										 @enderror 
									</div>
								</div>

								
											 

								<div class="text-xs-right">
										<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Record">					 
								</div>
						</form>

					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box --> 
			</div>

 


		  </div>
		  <!-- /.row -->
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
    });
    </script>



@endsection