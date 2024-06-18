<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Meter extends Model
{
    use HasFactory;

    protected $fillable = [
        'meter_id',
        'meter_number',
        'cbwso',
        'region',
        'district',
        'balance',
        'type',
        'lat',
        'lon',
        'comment'
    ];

    public function cbwso()
    {
        return $this->belongsTo(Cbwso::class);
    }

    public function meterlogs()
    {
        return $this->hasMany(MeterLog::class);
    }

    public function getFormattedDateAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->format('Y/m/d');
    }
}
