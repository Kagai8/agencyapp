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
							  <h3 class="box-title">One Time Purchase <span class="badge badge-pill badge-danger"> {{ count($one_time_purchases) }} </span></h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								@if(isset($one_time_purchases) && $one_time_purchases->count() > 0)
								<div class="table-responsive">
								  <table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>One Time Purchase ID</th>
											<th>Name </th>
											<th>Gross Amount </th>
											<th>Net Amount </th>
											@if(auth()->check()&& auth()->user()->role->name === 'Admin' || auth()->user()->role->name === 'Chairman' || auth()->user()->role->name === 'Manager')
											<th>Created By </th>
											@endif
											<th>Date</th>
											<th>Print Receipt</th>
											
											
											 
										</tr>
									</thead>
										<tbody>
										 @foreach($one_time_purchases as $item)
										 <tr>
											 <td>OTP{{ $item->id }}</td>
											 <td>{{ $item->customer->customer_name }}</td>
											 <td>{{ $item->original_amount }} </td>
											 <td>{{ $item->net_amount }} </td>

											 @if(auth()->check()&& auth()->user()->role->name === 'Admin' || auth()->user()->role->name === 'Chairman' || auth()->user()->role->name === 'Manager')
											 <td>{{ $item->created_by }} </td>
											 @endif

											 <td> {{ \Carbon\Carbon::parse($item->created_at )->format('d F Y')}}</td>
											 <td width="10%">
												 <a href="{{ route('test.details',$item->id) }}" class="btn btn-primary" title="Print"><i class="fa fa-print"></i> </a>
											</td>
											 


											
																 
										 </tr>
										  @endforeach
										</tbody>
							 
						  			</table>
								</div>
								@else
								<div class="table-responsive">

								  <table id="example1" class="table table-bordered table-striped">
									<thead>
										<h3>Oops...</h3>
									</thead>
										<tbody>
										 <p>No search results</p>
										</tbody>
							 
						  			</table>
						  			@endif
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