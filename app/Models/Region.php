<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "created_at",
        "modified_at"
    ];

    public function districts()
    {
        return $this->hasMany(District::class);
    }
}
