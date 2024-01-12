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
							<div class="box-header with-border d-flex">
							    <h3 class="box-title">Installment for PP{{$payment_plan->id}}<span class="badge badge-pill badge-danger"> {{ count($installmentHistory) }} </span></h3>
							    <a href="{{ route('generate-pdf-history',$payment_plan->id)}}" class="btn btn-primary ml-auto" title="Print"><i class="fa fa-print"></i></a>
							</div>

							<!-- /.box-header -->
							<div class="box-body">
								<div class="table-responsive">
								  <table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Installment ID</th>
											<th>Payment Plan ID</th>
											<th>Customer Name </th>
											<th>Installment </th>
											<th>Recorded By </th>
											<th>Created At</th>
											
											
											
											 
										</tr>
									</thead>
										<tbody>
										 @foreach($installmentHistory as $item)
										 <tr>
										 	<td>IM{{ $item->id }}</td>
											 <td>PP{{ $item->payment_plan_id }}</td>
											 <td>{{ $item->customer->customer_name }}</td>
											 <td>{{ $item->installment }} </td>
											 <td> {{ $item->recorded_by }}</td>
											 <td> {{ $item->created_at }}</td>																								 
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