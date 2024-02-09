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
											<th>Gross Amount</th>
											<th>Net Amount </th>
											<th>Balance</th>
											<th>Approval </th>
											
											<th>Action</th>
											
											
											 
										</tr>
									</thead>
										<tbody>
										 @foreach($payment_plans as $item)
										 <tr>
											 <td width="10%">PP{{ $item->id }}</td>
											 <td>{{ $item->customer_name }}</td>
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
											 
											 

											 <td width="20%">
												 
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
											 	<a href="{{ route('installment-history',$item->id) }}" class="btn btn-info" title="Update Installment"><i class="fa fa-money"></i> </a>
											 	@else
									      <a href="#" class="btn btn-warning" title="Can't Update Until Approval"><i class="fa fa-money"></i> </a>
									      @endif
											 	<a href="{{ route('paymentplan-details',$item->id) }}" class="btn btn-light" title="Payment Plan Details Data"><i class="fa fa-eye"></i> </a>
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