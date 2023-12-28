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
							  <h3 class="box-title">System Users List <span class="badge badge-pill badge-danger"> {{ count($users) }} </span></h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<div class="table-responsive">
								  <table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Name</th>
											<th>Email </th>
											<th>Role </th>
											<th>Action</th>
											 
										</tr>
									</thead>
										<tbody>
										 @foreach($users as $item)
										 <tr>
											 <td>{{ $item->name }}</td>
											 <td>{{ $item->email }}</td>
											 <td>{{ $item->role->name }} </td>
											 


											<td >
												 <a href="{{ route('edit-user',$item->id) }}" class="btn btn-primary" title="Edit User Details"><i class="fa fa-edit"></i> </a>

												 <a href="{{ route('delete-user',$item->id) }}" class="btn btn-danger" title="Delete User" >
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