<?php

namespace App\Exports;

use App\Models\PaymentPlan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;

class OneTimePurchasesExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
     public function view(): View
    {
        return view('admin.reports.report_onetime_export', [
            'onetime_purchases' => DB::table('one_time_purchases')
            ->join('customers', 'one_time_purchases.customer_id', '=', 'customers.id')
            ->select('one_time_purchases.*', 'customers.customer_name','customers.customer_discount')
            ->latest()->get()
        ]);
    }
}
