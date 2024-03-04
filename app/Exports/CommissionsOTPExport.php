<?php

namespace App\Exports;

use App\Models\Commission;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;

class CommissionsOTPExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('admin.reports.report_commission_otp_export', [
            'commissions' => DB::table('commissions')
            ->join('one_time_purchases', 'commissions.onetime_purchase_id', '=', 'one_time_purchases.id')
            ->select('commissions.*', 'one_time_purchases.*', 'one_time_purchases.created_by as onetime_purchase_created_by')
            ->latest('one_time_purchases.created_at') // Specify the table for created_at column
            ->get()
        ]);
    }
}
