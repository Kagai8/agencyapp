@extends('admin.admin_master')
@section('title')
<title>Commissions List</title>
@endsection
@section('admin')


  <!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		@if(auth()->check()&& auth()->user()->role->name === 'User')
			<section class="content">
			  	<div class="row">
					<div class="col-12">

						 <div class="box">
							<div class="box-header with-border">
							  <h3 class="box-title">Commission from Payment Plans In Place By {{auth()->user()->name}} <span class="badge badge-pill badge-danger"> {{ count($commission_payment_plans_by_current_user) }} </span></h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<div class="table-responsive">
								  <table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Payment Plan ID</th>
											<th>Gross Amount</th>
											<th>Net Amount</th>
											<th>Commission </th>
											<th>Date </th>
											@if(auth()->check()&& auth()->user()->role->name === 'Admin' || auth()->user()->role->name === 'Chairman' || auth()->user()->role->name === 'Manager')
											<th>Initiated By </th>
											@endif
											
											 
										</tr>
									</thead>
										<tbody>
										 @foreach($commission_payment_plans_by_current_user as $item)
										 <tr>
											 <td>PP{{ $item->payment_plan_id }}</td>
											 <td>{{ $item->original_amount }}</td>
											 <td>{{ $item->net_amount }}</td>
											 <td>{{ $item->commission }} </td>
											 <td> {{ \Carbon\Carbon::parse($item->created_at )->format('d F Y')}}</td>
											 @if(auth()->check()&& auth()->user()->role->name === 'Admin' || auth()->user()->role->name === 'Chairman' || auth()->user()->role->name === 'Manager')
											 <td>{{ $item->created_by }} </td>
											 @endif
											 
											
											
																 
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

			<section class="content">
			  	<div class="row">
					<div class="col-12">

						 <div class="box">
							<div class="box-header with-border">
							  <h3 class="box-title">Commission from One Time Purchases By {{auth()->user()->name}} <span class="badge badge-pill badge-danger"> {{ count($commission_onetime_purchases_by_current_user) }} </span></h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<div class="table-responsive">
								  <table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Payment Plan ID</th>
											<th>Gross Amount</th>
											<th>Net Amount</th>
											<th>Commission</th>
											<th>Date </th>
											@if(auth()->check()&& auth()->user()->role->name === 'Admin' || auth()->user()->role->name === 'Chairman' || auth()->user()->role->name === 'Manager')
											<th>Initiated By </th>
											@endif
											
											 
										</tr>
									</thead>
										<tbody>
										 @foreach($commission_onetime_purchases_by_current_user as $item)
										 <tr>
											 <td>OTP{{ $item->onetime_purchase_id }}</td>
											 <td>{{ $item->original_amount }}</td>
											 <td>{{ $item->net_amount }}</td>
											 <td>{{ $item->commission }} </td>
											 <td> {{ \Carbon\Carbon::parse($item->created_at )->format('d F Y')}}</td>
											 @if(auth()->check()&& auth()->user()->role->name === 'Admin' || auth()->user()->role->name === 'Chairman' || auth()->user()->role->name === 'Manager')
											 <td>{{ $item->created_by }} </td>
											 @endif
											
																 
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

			@else
			<section class="content">
			  	<div class="row">
					<div class="col-12">

						 <div class="box">
							<div class="box-header with-border">
							  <h3 class="box-title">Commission from Payment Plans In Place <span class="badge badge-pill badge-danger"> {{ count($commission_payment_plans) }} </span></h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<div class="table-responsive">
								  <table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Payment Plan ID</th>
											<th>Gross Amount</th>
											<th>Net Amount</th>
											<th>Commission </th>
											<th>Date </th>
											@if(auth()->check()&& auth()->user()->role->name === 'Admin' || auth()->user()->role->name === 'Chairman' || auth()->user()->role->name === 'Manager')
											<th>Initiated By </th>
											@endif
											
											 
										</tr>
									</thead>
										<tbody>
										 @foreach($commission_payment_plans as $item)
										 <tr>
											 <td>PP{{ $item->payment_plan_id }}</td>
											 <td>{{ $item->original_amount }}</td>
											 <td>{{ $item->net_amount }}</td>
											 <td>{{ $item->commission }} </td>
											 <td> {{ \Carbon\Carbon::parse($item->created_at )->format('d F Y')}}</td>
											 @if(auth()->check()&& auth()->user()->role->name === 'Admin' || auth()->user()->role->name === 'Chairman' || auth()->user()->role->name === 'Manager')
											 <td>{{ $item->created_by }} </td>
											 @endif
											 
											
											
																 
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

			<section class="content">
			  	<div class="row">
					<div class="col-12">

						 <div class="box">
							<div class="box-header with-border">
							  <h3 class="box-title">Commission from One Time Purchases <span class="badge badge-pill badge-danger"> {{ count($commission_onetime_purchases) }} </span></h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<div class="table-responsive">
								  <table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Payment Plan ID</th>
											<th>Gross Amount</th>
											<th>Net Amount</th>
											<th>Commission </th>
											<th>Date </th>
											@if(auth()->check()&& auth()->user()->role->name === 'Admin' || auth()->user()->role->name === 'Chairman' || auth()->user()->role->name === 'Manager')
											<th>Initiated By </th>
											@endif
											
											 
										</tr>
									</thead>
										<tbody>
										 @foreach($commission_onetime_purchases as $item)
										 <tr>
											 <td>OTP{{ $item->onetime_purchase_id }}</td>
											 <td>{{ $item->original_amount }}</td>
											 <td>{{ $item->net_amount }}</td>
											 <td>{{ $item->commission }} </td>
											 <td> {{ \Carbon\Carbon::parse($item->created_at )->format('d F Y')}}</td>
											 @if(auth()->check()&& auth()->user()->role->name === 'Admin' || auth()->user()->role->name === 'Chairman' || auth()->user()->role->name === 'Manager')
											 <td>{{ $item->created_by }} </td>
											 @endif
											
																 
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
			@endif

			
		<!-- /.content -->
	  
	  </div>
  



@endsection