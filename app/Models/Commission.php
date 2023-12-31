<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function paymentPlans()
    {
        return $this->belongsTo(PaymentPlan::class);
    }

    public function onetimePurchases()
    {
        return $this->belongsTo(OneTimePurchase::class);
    }
}
