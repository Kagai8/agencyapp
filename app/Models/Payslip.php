<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payslip extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id', 'file_path', 'missed_days'];


    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
