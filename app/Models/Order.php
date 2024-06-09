<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order'; // Change to 'orders' if your table name is 'orders'
    protected $fillable = [
        'cart_id',
        'email',
        'idgame',
        'no_tlp',
        'subtotal'
    ];

    // Define relationships or other methods here
}

