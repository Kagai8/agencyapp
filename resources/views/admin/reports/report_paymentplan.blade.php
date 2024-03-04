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
							<div class="bb-1 clearFix">
											<div class="text-right pb-15">
					                <a href="{{ route('report-paymentplan-export') }}" class="btn btn-rounded btn-success" target="_blank">
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
											<th>Payment Plan ID</th>
											<th>Name </th>
											<th>Gross Amount</th>
											<th>Net Amount </th>
											<th>Balance</th>
											<th>Approval </th>
											<th>Planned Months</th>
											<th>Remaining months </th>
											<th>Active Status</th>
											<th>Commission Credited</th>
											<th>Commission Percentage</th>
											<th>Created By </th>
											<th>Created At</th>
											
											
											
											 
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
											 	<p> Approved </p>
											 	@else
									       <p> Pending  </p>
											 	@endif

											 </td>
											 <td>{{ $item->months }} </td>
											 <td> {{ $item->months_left }}</td>
											<td>
												@if($item->status == 1)
                            <p>Done</p>
                            @else
                            <p>Not Done</p>
                            @endif
											</td>
											<td>
												@if($item->commission_credited == 1)
                            <p>Credited</p>
                            @else
                            <p>Not Credited</p>
                            @endif
											</td>
											<td>{{$item->commission_premium}}</td>
											<td>
												{{ $item->created_by}}
											</td>
											<td>{{ \Carbon\Carbon::parse($item->created_at )->format('d F Y')}} </td>
																				 
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