<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {

    }

    public function store(Request $request)
    {
        $rules = [
            'first_name' => 'required|string|max:255',
            'second_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:20',
            'delivery' => 'required|in:retrait,livraison',
            'total' => 'required|numeric|min:0',
            'deliveryFee' => 'nullable|numeric|min:0',
            'address' => 'nullable|string|max:255',
            'products' => 'required|array',

        ];

        // Validar inicialmente para acceder al campo 'delivery'
        $initial = $request->validate([
            'delivery' => 'required|in:retrait,livraison',
        ]);




        $validated = $request->validate($rules);


        // Crear orden
        $order = \App\Models\Order::create([
            'first_name'   => $validated['first_name'],
            'second_name'  => $validated['second_name'],
            'email'        => $validated['email'],
            'telephone'    => $validated['telephone'],
            'delivery'     => $validated['delivery'],
            'total'        => $validated['total'],
            'delivery_fee' => $validated['deliveryFee'] ?? 0,
            'address'      => isset($validated['address']) ? json_encode($validated['address']) : null,
        ]);


        foreach ($validated['products'] as $product) {
            $order->products()->attach($product['id'], [
                'quantity'    => $product['quantity'],
                'unit_price'  => $product['totalPrice'],
                'choix'       => isset($product['choix']) ? json_encode($product['choix']) : null,
            ]);
        }

        return response()->json(['status' => 'ok', 'message' => 'Order created successfully']);
      }








}
