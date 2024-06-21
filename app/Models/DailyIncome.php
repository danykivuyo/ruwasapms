<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyIncome extends Model
{
    protected $table = "daily_income";

    protected $fillable = [
        'cbwso',
        'district',
        'region',
        'income'
    ];
    use HasFactory;
}
