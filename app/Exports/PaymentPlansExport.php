<?php

namespace App\Exports;

use App\Models\PaymentPlan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;

class PaymentPlansExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('admin.reports.report_paymentplan_export', [
            'payment_plans' => DB::table('payment_plans')
            ->join('customers', 'payment_plans.customer_id', '=', 'customers.id')
            ->select('payment_plans.*', 'customers.customer_name','customers.customer_discount')
            ->latest()->get()
        ]);
    }
}
