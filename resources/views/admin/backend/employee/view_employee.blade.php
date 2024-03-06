@extends('admin.admin_master')
@section('title')
<title>Employee Accounts</title>
@endsection
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
							  <h3 class="box-title">Employees List <span class="badge badge-pill badge-danger"> {{ count($employees) }} </span></h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<div class="table-responsive">
								  <table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Image </th>
											<th>Name</th>
											<th>Email </th>
											<th>Designation </th>
											<th>Phone </th>
											<th>Gender </th>
											<th>Action</th>
											 
										</tr>
									</thead>
										<tbody>
										 @foreach($employees as $item)
										 <tr>
											<td> <img src="{{ asset($item->employee_image) }}" style="width: 60px; height: 50px;">  </td>
											<td>{{ $item->employee_name }}</td>
											 <td>{{ $item->employee_email }}</td>
											 <td>{{ $item->employee_designation }} </td>
											 <td> {{ $item->employee_phone_no }}</td>
											 <td> {{ $item->employee_gender }}</td>


											<td width="30%" >
												 <a href="{{ route('employee.details',$item->id) }}" class="btn btn-primary" title="employee Details Data"><i class="fa fa-eye"></i> </a>

												 <a href="{{ route('employee.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>

												 

												 <a href="{{ route('employee.delete',$item->id) }}" class="btn btn-danger" title="Delete Data" >
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