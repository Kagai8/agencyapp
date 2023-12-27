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
					<h2 class="d-inline"><span class="font-size-30">Receipt</span></h2>
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
				  <strong>From</strong>	
				  <address>
					<strong class="text-blue font-size-24">Agency Company Name</strong><br>
					<strong class="d-inline">Kitale</strong><br>
					<strong>Phone: (00) 123-456-7890 &nbsp;&nbsp;&nbsp;&nbsp; Email: info@example.com</strong>  
				  </address>
				</div>
				<!-- /.col -->
				<div class="col-md-6 invoice-col text-right">
				  <strong>To</strong>
				  <address>
					<strong class="text-blue font-size-24">{{$onetime_purchase->customer->customer_name}}</strong><br>
					{{$onetime_purchase->customer->customer_gender}}<br>
					<strong>Phone: {{$onetime_purchase->customer->customer_phone_no}} &nbsp;&nbsp;&nbsp;&nbsp; Email: {{$onetime_purchase->customer->customer_email}}</strong>
				  </address>
				</div>
				<!-- /.col -->
				<div class="col-sm-12 invoice-col mb-15">
					<div class="invoice-details row no-margin">
					  <div class="col-md-6 col-lg-3"><b>Account:</b> CustID0{{$onetime_purchase->customer->id}}</div>
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
					  <th>#</th>
					  <th>Premium Amount</th>
					  <th class="text-right">Quantity</th>
					  <th class="text-right">Discount</th>
					  <th class="text-right">Generated At</th>
					  <th class="text-right">Subtotal</th>
					</tr>
					<tr>
					  <td>1</td>
					  <td>{{$onetime_purchase->original_amount}}</td>
					  <td class="text-right">1</td>
					  @if($onetime_purchase->customer->discount = 'NULL')
					  <td class="text-right">0</td>
					  @else
					  <td>{{$onetime_purchase->customer->customer_discount}}</td>
					  @endif
					  <td class="text-right">{{\Carbon\Carbon::parse($onetime_purchase->created_at )->format('d F Y')}}</td>
					  <td class="text-right">{{$onetime_purchase->original_amount}}</td>
					  
					</tr>
					
					</tbody>
				  </table>
				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->

			  <div class="row">
				<div class="col-12 text-right">
					
					<div class="total-payment">
						<h3><b>Total :</b> KES {{$onetime_purchase->original_amount}}</h3>
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