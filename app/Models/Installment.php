<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function paymentPlan()
    {
        return $this->belongsTo(PaymentPlan::class);
    }

    public function recordedBy()
    {
        return $this->belongsTo(User::class, 'recorded_by');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
