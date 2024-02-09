@extends('admin.admin_master')
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
 
 


@endsection