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
            'products' => 'required|array',
            'address.rue' => 'required_if:delivery,livraison|string|max:255',
            'address.ville' => 'required_if:delivery,livraison|string|max:255',
            'address.codepostal' => 'required_if:delivery,livraison|string|max:255',
            'province' => 'required_if:delivery,livraison|string|max:255',
            'region' => 'required_if:delivery,livraison|string|max:255',
        ];
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
            'province'     => isset($validated['province']) ? $validated['province'] : null,
            'region'       => isset($validated['region']) ? $validated['region'] : null,
            'order_status' => 'pending', // Estado inicial de la orden
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
