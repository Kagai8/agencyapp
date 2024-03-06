@extends('admin.admin_master')
@section('title')
<title>Dashboard</title>
@endsection
@section('admin')


<div class="container-full">

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xl-3 col-6">
					<div class="box overflow-hidden pull-up">
						<div class="box-body">							
		<div class="icon bg-primary-light rounded w-60 h-60">
			<i class="text-primary mr-0 font-size-24 mdi mdi-account-multiple"></i>
		</div>
		<div>
			@if(auth()->check()&& auth()->user()->role->name === 'User')
			<p class="text-mute mt-20 mb-0 font-size-16">Payment Plans By You</p>
			<h3 class="text-white mb-0 font-weight-500">{{App\Models\PaymentPlan::where('created_by','=', auth()->user()->name)->count()}}<small class="text-success"></small></h3>
			@else
			<p class="text-mute mt-20 mb-0 font-size-16">Total Payment Plans </p>
			<h3 class="text-white mb-0 font-weight-500">{{App\Models\PaymentPlan::count()}}<small class="text-success"></small></h3>
			@endif
		</div>
	</div>
</div>
</div>
<div class="col-xl-3 col-6">
<div class="box overflow-hidden pull-up">
	<div class="box-body">							
		<div class="icon bg-warning-light rounded w-60 h-60">
			<i class="text-warning mr-0 font-size-24 mdi mdi-car"></i>
		</div>
		<div>
			@if(auth()->check()&& auth()->user()->role->name === 'User')
			<p class="text-mute mt-20 mb-0 font-size-16">Cust Accs You Created</p>
			<h3 class="text-white mb-0 font-weight-500">{{App\Models\Customer::where('created_by','=', auth()->user()->name)->count()}} <small class="text-success"></small></h3>
			@else
			<p class="text-mute mt-20 mb-0 font-size-16">Customer Accs</p>
			<h3 class="text-white mb-0 font-weight-500">{{App\Models\Customer::count()}} <small class="text-success"></small></h3>
			@endif
		</div>
	</div>
</div>
</div>
<div class="col-xl-3 col-6">
<div class="box overflow-hidden pull-up">
	<div class="box-body">							
		<div class="icon bg-info-light rounded w-60 h-60">
			<i class="text-info mr-0 font-size-24 mdi mdi-sale"></i>
		</div>
		<div>
			@if(auth()->check()&& auth()->user()->role->name === 'User')
			<p class="text-mute mt-20 mb-0 font-size-16">One Time Purchases </p>
			<h3 class="text-white mb-0 font-weight-500">{{App\Models\OneTimePurchase::where('created_by','=', auth()->user()->name)->count()}} <small class="text-danger"> </small></h3>
			@else
			<p class="text-mute mt-20 mb-0 font-size-16">One Time Purchases </p>
			<h3 class="text-white mb-0 font-weight-500">{{App\Models\OneTimePurchase::count()}} <small class="text-danger"> </small></h3>
			@endif
		</div>
	</div>
</div>
</div>
<div class="col-xl-3 col-6">
<div class="box overflow-hidden pull-up">
	<div class="box-body">							
		<div class="icon bg-danger-light rounded w-60 h-60">
			<i class="text-danger mr-0 font-size-24 mdi mdi-phone-incoming"></i>
		</div>
		<div>@if(auth()->check()&& auth()->user()->role->name === 'User')
			<p class="text-mute mt-20 mb-0 font-size-16">Commisson By You</p>
			<h3 class="text-white mb-0 font-weight-500">KES {{ $totalCommissionUser }} <small class="text-danger"></small></h3>
			@else
			<p class="text-mute mt-20 mb-0 font-size-16">Total Comission</p>
			<h3 class="text-white mb-0 font-weight-500">KES {{ $totalCommissions }} <small class="text-danger"></small></h3>
			@endif
		</div>
	</div>
</div>
</div>
 
 <div class="box">
                <div class="box-header with-border">
                  <h5 class="box-title"> Installemts Overdue Information</h5>
                </div>
                <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Installment Amount</th>
                                        <th>Due Date</th>
                                        <th>Customer Name</th>
                                        <th>Status</th>
                                        <th>Track</th>

                                                                                <!-- Add more columns if needed -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($installmentsOverdues as $installment)
                                    @php
                                        $dueDate = \Carbon\Carbon::parse($installment->due_date);
                                        $currentDate = \Carbon\Carbon::now();
                                        $daysDifference = $currentDate->diffInDays($dueDate);
                                        
                                        if ($installment->status == 1) {
                                            $status = 'Paid on time';
                                            $badgeClass = 'badge-success';
                                        } elseif ($dueDate->lt($currentDate)) {
                                            $status = 'Overdue';
                                            $badgeClass = 'badge-danger';
                                        } elseif ($dueDate->gte($currentDate) && $daysDifference < 3) {
                                            $status = 'Less than 3 days';
                                            $badgeClass = 'badge-warning';
                                        } else {
                                            $status = 'On Track';
                                            $badgeClass = 'badge-success';
                                        }
                                    @endphp
                                        <tr>
                                            <td >{{ $installment->installment }}</td>
                                            <td>{{ $installment->due_date }}</td>
                                            <td >{{ $installment->customer->customer_name }}</td>
                                           
                                           
                                            <td >
                                                @if($installment->status)
                                                    <span class="badge badge-success">Paid</span>
                                                @else
                                                    <span class="badge badge-danger">Unpaid</span>
                                                @endif
                                            </td>
                                            <td >
                                                    <span class="badge {{ $badgeClass }}">{{ $status }}</span>
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
            </div>
 
 <div class="box">
                <div class="box-header with-border">
                  <h5 class="box-title"> Installemts Soon Overdue Information</h5>
                </div>
                <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Installment Amount</th>
                                        <th>Due Date</th>
                                        <th>Customer Name</th>
                                        <th>Status</th>
                                        <th>Track</th>

                                                                                <!-- Add more columns if needed -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($installmentsSoonOverdues as $installment)
                                    @php
                                        $dueDate = \Carbon\Carbon::parse($installment->due_date);
                                        $currentDate = \Carbon\Carbon::now();
                                        $daysDifference = $currentDate->diffInDays($dueDate);
                                        
                                        if ($installment->status == 1) {
                                            $status = 'Paid on time';
                                            $badgeClass = 'badge-success';
                                        } elseif ($dueDate->lt($currentDate)) {
                                            $status = 'Overdue';
                                            $badgeClass = 'badge-danger';
                                        } elseif ($dueDate->gte($currentDate) && $daysDifference < 3) {
                                            $status = 'Less than 3 days';
                                            $badgeClass = 'badge-warning';
                                        } else {
                                            $status = 'On Track';
                                            $badgeClass = 'badge-success';
                                        }
                                    @endphp
                                        <tr>
                                            <td >{{ $installment->installment }}</td>
                                            <td>{{ $installment->due_date }}</td>
                                            <td >{{ $installment->customer->customer_name }}</td>
                                           
                                           
                                            <td >
                                                @if($installment->status)
                                                    <span class="badge badge-success">Paid</span>
                                                @else
                                                    <span class="badge badge-danger">Unpaid</span>
                                                @endif
                                            </td>
                                            <td >
                                                    <span class="badge {{ $badgeClass }}">{{ $status }}</span>
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
            </div>

@endsection