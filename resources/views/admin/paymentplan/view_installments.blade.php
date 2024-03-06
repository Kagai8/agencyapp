@extends('admin.admin_master')
@section('title')
<title>Installments</title>
@endsection
@section('admin')


  <!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 <section class="content">
						  	<div class="row">
								<div class="box">
									<div class="box-header">
										<p>Search Installments By Customer Name</p>

									</div>
									<div class="box-body">
			        <form method="post" action="{{ route('installment-search') }}" enctype="multipart/form-data">
			            @csrf
			            <div class="row">
			                <div class="col-md-9">
			                    <div class="form-group">
			                        <h5>Search: <span class="text-danger">*</span></h5>
			                        <div class="controls">
			                            <input type="text" name="customer_search" class="form-control" placeholder="Search by Customer Name..." required="">
			                            @error('customer_search')
			                            <span class="text-danger">{{ $message }}</span>
			                            @enderror
			                        </div>
			                    </div>
			                </div>
			                <div class="col-md-3">
			                    <div class="form-group">
			                        <label class="hidden-xs">&nbsp;</label> <!-- Empty label for spacing -->
			                        <div class="controls">
			                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value=" Search">
			                        </div>
			                    </div>
			                </div>
			            </div>
			        </form>
			    </div>
							<!-- /.col -->

						  </div>
						  <!-- /.row -->
			</section>

		<!-- Main content -->
			<section class="content">
			  	<div class="row">
					<div class="col-12">

						 <div class="box">
							<div class="box-header with-border">
							  <h3 class="box-title">Installments <span class="badge badge-pill badge-danger"> {{ count($installments) }} </span></h3>
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
											<th>Action</th> 
										</tr>
									</thead>
										<tbody>
										 @foreach($installments as $item)
										 <tr>
										 	<td>IM{{ $item->id }}</td>
											 <td>PP{{ $item->payment_plan_id }}</td>
											 <td>{{ $item->customer_name }}</td>
											 <td>{{ $item->installment }} </td>
											 <td> {{ $item->recorded_by }}</td>
											 <td> {{ $item->created_at }}</td>
											 <td>
												 <a href="{{ route('generate-installment-receipt',$item->id) }}" class="btn btn-primary" title="Print"><i class="fa fa-print"></i> </a>
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