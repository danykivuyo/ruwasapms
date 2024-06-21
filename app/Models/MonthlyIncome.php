<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyIncome extends Model
{
    protected $table = "monthly_income";

    protected $fillable = [
        'cbwso',
        'district',
        'region',
        'income'
    ];
    use HasFactory;
}
