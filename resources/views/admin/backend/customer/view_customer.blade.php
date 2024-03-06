@extends('admin.admin_master')
@section('title')
<title>Customer Accounts</title>
@endsection
@section('admin')


  <!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 			<section class="content">
						  	<div class="row">
								<div class="box">
									<div class="box-header">
										<p>Search Customer Name</p>

									</div>
									<div class="box-body">
			        <form method="post" action="{{ route('customer-search') }}" enctype="multipart/form-data">
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
							  <h3 class="box-title">Customer List <span class="badge badge-pill badge-danger"> {{ count($customers) }} </span></h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<div class="table-responsive">
								  <table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Name</th>
											<th>Email </th>
											<th>Phone </th>
											
											<th>KRA Pin </th>
											<th>National ID </th>
											<th>Action</th>
											 
										</tr>
									</thead>
										<tbody>
										 @foreach($customers as $item)
										 <tr>
											 <td>{{ $item->customer_name }}</td>
											 <td>{{ $item->customer_email }}</td>
											 <td>{{ $item->customer_phone_no }} </td>
											
											 <td> {{ $item->customer_kra_pin }}</td>
											 <td> {{ $item->customer_national_id }}</td>


											<td width="30%">
												 <a href="{{ route('customer-account',$item->id) }}" class="btn btn-primary" title="Customer Details Data"><i class="fa fa-eye"></i> </a>

												 <a href="{{ route('edit-customer-details',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>

												 <a href="{{ route('delete-customer-details',$item->id) }}" class="btn btn-danger" title="Delete Data" >
												 	<i class="fa fa-trash"></i></a>
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