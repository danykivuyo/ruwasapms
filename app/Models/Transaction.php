<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'transaction_id',
        'app_id',
        'order_id',
        'email',
        'username',
        'amount',
        'currency',
        'message',
        'addded_date',
        'account_number',
        'reference',
        'provider',
    ];
}
