<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';
    protected $fillable = [
        'user_id',
        'no_invoice',
        'status_cart',
        'status_pembayaran',
        'status_pengiriman',
        'no_resi',
        'ekspedisi',
        'subtotal',
        'ongkir',
        'diskon',
        'total',
    ];

    public function user() {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function detail() {
        return $this->hasMany('App\Models\CartDetail', 'cart_id');
    }

    public function updatetotal($itemcart, $subtotal) {
        \Log::info("Updating total. Current subtotal: {$itemcart->subtotal}, Adding: {$subtotal}");
        $this->subtotal = $itemcart->subtotal + $subtotal;
        $this->total = $itemcart->total + $subtotal;
        $this->save();
    }
    
}
