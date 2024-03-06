@extends('admin.admin_master')
@section('title')
<title>One Off Purchases</title>
@endsection
@section('admin')


  <!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 		<section class="content">
						  	<div class="row">
								<div class="box">
									<div class="box-header">
										<p>Search One Off Purchases By Customer Name</p>

									</div>
									<div class="box-body">
			        <form method="post" action="{{ route('onetime-purchase-search') }}" enctype="multipart/form-data">
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
							  <h3 class="box-title">One Off Purchases <span class="badge badge-pill badge-danger"> {{ count($onetime_purchases) }} </span></h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body">
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
										 @foreach($onetime_purchases as $item)
										 <tr>
											 <td>OTP{{ $item->id }}</td>
											 <td>{{ $item->customer_name }}</td>
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