<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Cbwso extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "tarrif",
        "region",
        "district",
        "comment",
        "daily_income",
        "monthly_income",
        "yearly_income",
    ];

    public function meters()
    {
        return $this->hasMany(Meter::class);
    }

    public function getFormattedDateAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->format('Y/m/d');
    }
}
