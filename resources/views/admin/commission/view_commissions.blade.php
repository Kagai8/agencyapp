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
							  <h3 class="box-title">Payment Plans In Place <span class="badge badge-pill badge-danger"> {{ count($commissions) }} </span></h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<div class="table-responsive">
								  <table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Payment Plan ID</th>
											<th>Premium </th>
											<th>Commission </th>
											<th>Date </th>
											
											 
										</tr>
									</thead>
										<tbody>
										 @foreach($commissions as $item)
										 <tr>
											 <td>PP00{{ $item->payment_plan_id }}</td>
											 <td>{{ $item->original_amount }}</td>
											 <td>{{ $item->commission }} </td>
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