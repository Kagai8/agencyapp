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

        return view('admin.index',compact('commissions','payment_plans','employees','customers'));
    }
}
