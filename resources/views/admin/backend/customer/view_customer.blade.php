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
											<th>Gender </th>
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
											 <td> {{ $item->customer_gender }}</td>
											 <td> {{ $item->customer_kra_pin }}</td>
											 <td> {{ $item->customer_national_id }}</td>


											<td width="30%">
												 <a href="{{ route('edit-customer-details',$item->id) }}" class="btn btn-primary" title="Customer Details Data"><i class="fa fa-eye"></i> </a>

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