<?php

namespace App\Exports;

use App\Models\PaymentPlan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;

class InstallmentsExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('admin.reports.report_installments_export', [
            'installments' =>  DB::table('installments')
        ->join('payment_plans', 'installments.payment_plan_id', '=', 'payment_plans.id')
        ->join('customers', 'installments.customer_id', '=', 'customers.id')
        ->select(
            'installments.*',
            'customers.customer_name',
            'payment_plans.id as payment_plan_id'
        )
        ->latest()
        ->get()
        ]);
    }
}
