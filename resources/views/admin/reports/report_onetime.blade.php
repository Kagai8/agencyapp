@extends('admin.admin_master')
@section('admin')


  <!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 		
		<!-- Main content -->
			<section class="content">
			  	<div class="row">
					<div class="col-12">

						 <div class="box">
							<div class="box-header with-border">
							  <h3 class="box-title">One Off Purchases <span class="badge badge-pill badge-danger"> {{ count($onetime_purchases) }} </span></h3>
							</div>
							<div class="bb-1 clearFix">
											<div class="text-right pb-15">
					                <a href="{{ route('report-onetime-export') }}" class="btn btn-rounded btn-success" target="_blank">
							        		<span><i class="fa fa-file-excel-o"></i>Excel</span>
							    				</a>
			                </div>
					  			</div>
							<!-- /.box-header -->
							<div class="box-body">
								<div class="table-responsive">
								  <table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>One Time Purchase ID</th>
											<th>Name </th>
											<th>Gross Amount </th>
											
											<th>Created By </th>
											<th>Created At</th>
											<th>Date</th>
											
											
											
											 
										</tr>
									</thead>
										<tbody>
										 @foreach($onetime_purchases as $item)
										 <tr>
											 <td>OTP{{ $item->id }}</td>
											 <td>{{ $item->customer_name }}</td>
											 <td>{{ $item->original_amount }} </td>
											 <td>{{ $item->net_amount }} </td>

											 
											 <td>{{ $item->created_by }} </td>
											
											 <td> {{ \Carbon\Carbon::parse($item->created_at )->format('d F Y')}}</td>
											 
											 


											
																 
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

	 
	 


			  </div>
			  <!-- /.row -->
			</section>
		<!-- /.content -->
	  
	  </div>
  



@endsection