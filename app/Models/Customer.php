<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $guarded = [];

    // app/Models/Customer.php

public function paymentPlans()
{
    return $this->hasMany(PaymentPlan::class);
}

}
