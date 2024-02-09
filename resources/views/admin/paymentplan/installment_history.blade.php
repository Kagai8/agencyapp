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

							    <a href="{{ route('generate-pdf-history',$payment_plan->id)}}" class="btn btn-primary ml-auto" title="Print All Installments"><i class="fa fa-print"></i></a>
							</div>
							<div class="box-header with-border d-flex">
								<h3 class="box-title">Customer Name: {{ $payment_plan->customer->customer_name }}</h3>
							</div>

							<!-- /.box-header -->
							<div class="box-body">
								<div class="table-responsive">
								  <table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Installment ID</th>
											<th>Installment </th>
											<th>Payment Method</th>
											<th>Transaction Code </th>
											<th>Due Date</th>
											<th>Status</th>
											<th>Updated At</th>
											<th>Action</th>
											
											
											
											 
										</tr>
									</thead>
										<tbody>
										 @foreach($installmentHistory as $item)
										 <tr>
										 	<td>IM{{ $item->id }}</td>
											 <td>{{ $item->installment }} </td>
											 <td>{{ $item->payment_option }} </td>
											 <td>
                          @if($item->transaction_code)
                          {{ $item->transaction_code }}
                          @else
                          No Code Yet
                          @endif
                       </td>
											 <td> {{ $item->due_date }}</td>
											 <td>
											 	@if($item->status)
                                                    <span class="badge badge-success">Paid</span>
                                                @else
                                                    <span class="badge badge-danger">Unpaid</span>
                                                @endif
											 </td>
											 <td> {{ \Carbon\Carbon::parse($item->updated_at )->format('d F Y')}}</td>
											 <td width="20%">
												 <a href="{{ route('generate-installment-receipt',$item->id) }}" class="btn btn-primary" title="Print This Installment"><i class="fa fa-print"></i> </a>
												 <a href="{{ route('edit-installment-details',$item->id) }}" class="btn btn-primary" title="Update This Installment"><i class="fa fa-pencil"></i> </a>

								
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