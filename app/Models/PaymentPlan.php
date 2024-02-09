<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentPlan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function commission()
    {
        return $this->hasOne(Commission::class);
    }

    public function installments()
    {
        return $this->hasMany(Installment::class);
    }
}
