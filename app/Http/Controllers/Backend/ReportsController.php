<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\PaymentPlan;
use App\Models\Commission;
use App\Models\OneTimePurchase;
use App\Models\Employee;
use App\Models\Installment;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Pdf;
use App\Exports\EmployeesExport;
use App\Exports\CommissionsOTPExport;
use App\Exports\CommissionsPPExport;
use App\Exports\PaymentPlansExport;
use App\Exports\OneTimePurchasesExport;
use App\Exports\InstallmentsExport;
use Maatwebsite\Excel\Facades\Excel;

class ReportsController extends Controller
{
    public function EmployeeFullReport(){

    // Retrieve all sheep profiles
        $employees = Employee::latest()->get();

        return view('admin.reports.report_employee',compact('employees'));
    }

    public function ExportEmployeeFullReport(){

    // Retrieve all sheep profiles
        return Excel::download(new EmployeesExport, 'employees.xlsx');
    }

    public function ExportCommissionOTPFullReport(){

    // Retrieve all sheep profiles
        $commissions = DB::table('commissions')
            ->join('one_time_purchases', 'commissions.onetime_purchase_id', '=', 'one_time_purchases.id')
            ->select('commissions.*', 'one_time_purchases.*', 'one_time_purchases.created_by as onetime_purchase_created_by')
            ->latest('one_time_purchases.created_at') // Specify the table for created_at column
            ->get();

        return view('admin.reports.report_commission_otp',compact('commissions'));
    }

    public function ExportExportCommissionOTPFullReport(){

    // Retrieve all sheep profiles
        return Excel::download(new CommissionsOTPExport, 'commission_onetime_purchases.xlsx');
    }

    public function ExportCommissionPPFullReport(){

    // Retrieve all sheep profiles
        $commissions = DB::table('commissions')
            ->join('payment_plans', 'commissions.payment_plan_id', '=', 'payment_plans.id')
            ->select('commissions.*', 'payment_plans.*', 'payment_plans.created_by as payment_plan_created_by')
            ->latest('payment_plans.created_at') // Specify the table for created_at column
            ->get();

        return view('admin.reports.report_commission_pp',compact('commissions'));
    }

    public function ExportExportCommissionPPFullReport(){

    // Retrieve all sheep profiles
        return Excel::download(new CommissionsPPExport, 'commission_payment_plans.xlsx');
    }

    public function PaymentPlanFullReport(){

    // Retrieve all sheep profiles
        $payment_plans = DB::table('payment_plans')
            ->join('customers', 'payment_plans.customer_id', '=', 'customers.id')
            ->select('payment_plans.*', 'customers.customer_name','customers.customer_discount')
            ->latest()->get();

        return view('admin.reports.report_paymentplan',compact('payment_plans'));
    }

    public function ExportPaymentPlanFullReport(){

    // Retrieve all sheep profiles
        return Excel::download(new PaymentPlansExport, 'payment_plans.xlsx');
    }

    public function OneTimePurchaseFullReport(){

    // Retrieve all sheep profiles
        $onetime_purchases = DB::table('one_time_purchases')
            ->join('customers', 'one_time_purchases.customer_id', '=', 'customers.id')
            ->select('one_time_purchases.*', 'customers.customer_name','customers.customer_discount')
            ->latest()->get();

        return view('admin.reports.report_onetime',compact('onetime_purchases'));
    }

    public function ExportOneTimePurchaseFullReport(){

    // Retrieve all sheep profiles
        return Excel::download(new OneTimePurchasesExport, 'one_off_purchases.xlsx');
    }

    public function InstallmentsFullReport(){

    // Retrieve all sheep profiles
        $installments = DB::table('installments')
        ->join('payment_plans', 'installments.payment_plan_id', '=', 'payment_plans.id')
        ->join('customers', 'installments.customer_id', '=', 'customers.id')
        ->select(
            'installments.*',
            'customers.customer_name',
            'payment_plans.id as payment_plan_id'
        )
        ->latest()
        ->get();

        return view('admin.reports.report_installments',compact('installments'));
    }

    public function ExportInstallmentsFullReport(){

    // Retrieve all sheep profiles
        return Excel::download(new InstallmentsExport, 'installments.xlsx');
    }
}
