<?php

namespace App\Exports;

use App\Models\Commission;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;

class CommissionsPPExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('admin.reports.report_commission_pp_export', [
            'commissions' => DB::table('commissions')
            ->join('payment_plans', 'commissions.payment_plan_id', '=', 'payment_plans.id')
            ->select('commissions.*', 'payment_plans.*', 'payment_plans.created_by as payment_plan_created_by')
            ->latest('payment_plans.created_at') // Specify the table for created_at column
            ->get()
        ]);
    }
}
