<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class MeterLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'time',
        'message',
        'status',
        'meter',
        'meter_id'
    ];

    public function meter()
    {
        return $this->belongsTo(Meter::class);
    }

    public function getFormattedDateAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->format('Y/m/d');
    }
}
