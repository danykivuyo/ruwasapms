<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YearlyIncome extends Model
{
    protected $table = "yearly_income";
    protected $fillable = [
        'cbwso',
        'district',
        'region',
        'income'
    ];
    use HasFactory;
}
