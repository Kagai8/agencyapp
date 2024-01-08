<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\PaymentPlan;
use App\Models\Commission;
use App\Models\Employee;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        
        $commissions = Commission::sum('commission');
        $payment_plans = PaymentPlan::latest()->get();
        $employees = Employee::latest()->get();
        $customers = Customer::latest()->get();
        $totalCommissionPaymentPlan = Commission::join('payment_plans', 'commissions.payment_plan_id', '=', 'payment_plans.id')
        ->where('payment_plans.created_by', auth()->user()->name)
        ->sum('commissions.commission');
        $totalCommissionOneTimePurchase = Commission::join('one_time_purchases', 'commissions.onetime_purchase_id', '=', 'one_time_purchases.id')
        ->where('one_time_purchases.created_by', auth()->user()->name)
        ->sum('commissions.commission');

        $totalCommission = $totalCommissionPaymentPlan + $totalCommissionOneTimePurchase;

        return view('admin.index',compact('commissions','payment_plans','employees','customers','totalCommission'));
    }
}
