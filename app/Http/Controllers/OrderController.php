<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    // In your OrderController.php file
    public function storeOrder(Request $request)
    {
        // Validate the input data
        $validatedData = $request->validate([
            'cart_id' => 'required',
            'email' => 'required',
            'idgame' => 'required',
            'no_tlp' => 'required',
            'subtotal' => 'required',
        ]);
    
        // Create a new order instance
        $order = new Order();
        $order->cart_id = $validatedData['cart_id'];
        $order->email = $validatedData['email'];
        $order->idgame = $validatedData['idgame'];
        $order->no_tlp = $validatedData['no_tlp'];
        $order->subtotal = $validatedData['subtotal'];
    
        // Save the order to the database
        $order->save();
    
        // Return a success response
        return response()->json(['message' => 'Order created successfully!']);
    }
}

