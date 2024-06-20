<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'meter_id',
        'name',
        'phone',
        'house_number',
        'tag_id',
        'control_number',
        'balance'
    ];

    public function getFormattedDateAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->format('Y/m/d');
    }
}
