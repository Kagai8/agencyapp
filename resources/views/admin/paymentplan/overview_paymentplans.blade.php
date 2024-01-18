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
							  <h3 class="box-title">Payment Plans In Place(Approved) <span class="badge badge-pill badge-danger"> {{ count($payment_plans) }} </span></h3>
							</div>
							
							<!-- /.box-header -->
							<div class="box-body">
								<div class="table-responsive">
								  <table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>PaymentPlanID</th>
											<th>Name</th>
											<th>Premium </th>
											<th>Discounted Amount</th>
											<th>Installments</th>
											<th>Balance</th>
											<th>Planned Months</th>
											<th>Months Left</th>
											<th>Due Date </th>
											<th>Commission Credited </th>
											<th>Created </th>
											<th>Updated </th>
											@if(auth()->check()&& auth()->user()->role->name === 'Admin' || auth()->user()->role->name === 'Chairman' || auth()->user()->role->name === 'Manager')
											<th>Created By </th>
											@endif
											<th>Status</th>
											
											
											
											 
										</tr>
									</thead>
										<tbody>
										 @foreach($payment_plans as $item)
										 <tr>
											 <td>PP{{ $item->id }}</td>
											 <td>{{ $item->customer_name }}</td>
											 <td>{{ $item->original_amount }}</td>
											 <td>{{ $item->discounted_amount }} </td>
											 <td> {{ $item->installment }}</td>
											 <td> {{ $item->balance }}</td>
											 <td> {{ $item->months }}</td>
											 <td> {{ $item->months_left }}</td>
											 <td> {{ $item->due_date }}</td>
											 <td> Yes</td>
											 <td> {{ $item->created_at }}</td>
											 <td> {{ $item->updated_at }}</td>
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
  

<script>
    $(document).ready(function () {
        $('#example1').DataTable({
            buttons: ['excelHtml5', 'print']
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#excelBtn').on('click', function () {
            $('#example1').DataTable().buttons('excelHtml5').trigger();
        });
    });
</script>



@endsection