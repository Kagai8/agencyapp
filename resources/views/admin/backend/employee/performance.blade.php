@extends('admin.admin_master')
@section('admin')

<section class="invoice printableArea">
			
			  <!-- title row -->
			  <div class="row">
				<div class="col-12 exclude-from-print">
					<style>
        @media print {
            .exclude-from-print {
                display: none;
            }
        }
    </style>
				  <div class="bb-1 clearFix">
					<div class="text-right pb-15">
						
						<button id="print2" class="btn btn-rounded btn-warning" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
					</div>	
				  </div>
				</div>
				<div class="col-12">
				  <div class="page-header">
					<h2 class="d-inline"><span class="font-size-30">Employee Performance Report</span></h2>
					<div class="pull-right text-right">
						<h3>{{ \Carbon\Carbon::now()->format('d F Y')}}</h3>
					</div>	
				  </div>
				</div>
				<!-- /.col -->
			  </div>
			  <!-- info row -->
			  <div class="row invoice-info">
				<div class="col-md-6 invoice-col">
				  <strong>For:</strong>	
				  <address>
					<strong class="text-blue font-size-24">{{$employee->employee_name}}</strong><br>
					<strong class="d-inline">{{$employee->employee_gender}}</strong><br>
					<strong>Phone: {{$employee->employee_phone_no}} &nbsp;&nbsp;&nbsp;&nbsp; Email: {{$employee->employee_email}}</strong>  
				  </address>
				</div>
				<!-- /.col -->
				<div class="col-md-6 invoice-col text-right">
				  

				  <img src="{{ asset($employee->employee_image) }}" alt="Employee Image" style="max-width: 150px;">
				  
				</div><br>
				<br>
				<!-- /.col -->
				<div class="col-sm-12 invoice-col mb-15">
					<div class="invoice-details row no-margin">
					  <div class="col-md-6 col-lg-3"><b>Employee Account:</b> EMP0{{$employee->id}}</div>
					</div>
				</div>
			  <!-- /.col -->
			  </div>
			  <!-- /.row -->

			  <!-- Table row -->
			  <div class="row">
				<div class="col-12 table-responsive">
				  <table class="table table-bordered">
					<tbody>
					<tr>
					  <th></th>
					  <th>Areas</th>
					  <th>Comment</th>
					  
					</tr>
					<tr>
					  <td>1</td>
					  <td>Employee Strenghts</td>
					  <td></td>
					  
					</tr>
					<tr>
					  <td>2</td>
					  <td>Employee Weaknesses</td>
					  <td></td>
					  
					</tr>
					<tr>
					  <td>3</td>
					  <td>How can {{$employee->employee_name}} use their positive attributes to excel?</td>
					  <td></td>
					  
					</tr>

					<tr>
					  <td>4</td>
					  <td>Where can {{$employee->employee_name}} improve?</td>
					  <td></td>
					  
					</tr>
					
					
					</tbody>
				  </table>
				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->

			  <div class="row">
				<div class="col-12">
			        <div class="signature-line">
			            <hr>
			            <p>Signature: ________________________</p>
			            <p>Signed by: ________________________</p>
			        </div>
			    </div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->

			  <!-- this row will not appear when printing -->
			  
				
		</section>
		<script>
        document.getElementById('print2').addEventListener('click', function() {
            window.print();
        });
    </script>
@endsection