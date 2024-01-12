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
							  <h3 class="box-title">Payment Plans In Place <span class="badge badge-pill badge-danger"> {{ count($payment_plans) }} </span></h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<div class="table-responsive">
								  <table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Payment Plan ID</th>
											<th>Name </th>
											<th>Amount </th>
											<th>Installment </th>
											<th>Balance</th>
											<th>Months </th>
											<th>Due Date </th>
											<th>Approval </th>
											@if(auth()->check()&& auth()->user()->role->name === 'Admin' || auth()->user()->role->name === 'Chairman' || auth()->user()->role->name === 'Manager')
											<th>Created By </th>
											@endif
											<th>Status</th>
											<th width="30%">Action</th>
											
											
											 
										</tr>
									</thead>
										<tbody>
										 @foreach($payment_plans as $item)
										 <tr>
											 <td>PP{{ $item->id }}</td>
											 <td>{{ $item->customer_name }}</td>
											 <td>{{ $item->discounted_amount }} </td>
											 <td> {{ $item->installment }}</td>
											 <td> {{ $item->balance }}</td>
											 <td> {{ $item->months }}</td>
											 <td> {{ $item->due_date }}</td>

											 <td>
											 	@if($item->approval == 1)
											 	<span class="badge badge-pill badge-success"> Approved </span>
											 	@else
									           <span class="badge badge-pill badge-warning"> Pending Approval </span>
											 	@endif

											 </td>
											 @if(auth()->check()&& auth()->user()->role->name === 'Admin' || auth()->user()->role->name === 'Chairman' || auth()->user()->role->name === 'Manager')
											 <td>{{ $item->created_by }} </td>
											 @endif
											 <td>
											 	@if($item->status == 0)
											 	<span class="badge badge-pill badge-success"> Active </span>
											 	@else
									           <span class="badge badge-pill badge-danger"> Plan Completed </span>
											 	@endif

											 </td>

											 <td>
												 
												 	@if($item->status == 1)
												 	<a href="{{ route('paymentplan.inactive',$item->id) }}" class="btn btn-danger" title="Inactive Now"><i class="fa fa-arrow-down"></i> </a>
													 @else
												 <a href="{{ route('paymentplan.active',$item->id) }}" class="btn btn-success" title="Active Now"><i class="fa fa-arrow-up"></i> </a>
												 @endif
												 <a href="{{ route('invoice.payment',$item->id) }}" class="btn btn-primary" title="Print"><i class="fa fa-print"></i> </a>
												 @if(auth()->check()&& auth()->user()->role->name === 'Chairman')
												 @if($item->approval == 0)
												 	<a href="{{ route('paymentplan.approved',$item->id) }}" class="btn btn-warning" title="Aprrove Now"><i class="fa fa-arrow-down"></i> </a>
													 @else
												 <a href="#" class="btn btn-Light" title="Already Approved "><i class="fa fa-arrow-up"></i> </a>
												 @endif
												 @endif
												 @if($item->approval == 1)
											 	<a href="{{ route('edit-balance',$item->id) }}" class="btn btn-warning" title="Add Installment"><i class="fa fa-money"></i> </a>
											 	@else
									      <a href="#" class="btn btn-warning" title="Can't Edit Until Approval"><i class="fa fa-money"></i> </a>
											 	@endif
											 	<a href="{{ route('installment-history',$item->id) }}" class="btn btn-info" title="Installment History"><i class="fa fa-history"></i> </a>
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

	 
	 


			  </div>
			  <!-- /.row -->
			</section>
		<!-- /.content -->
	  
	  </div>
  



@endsection