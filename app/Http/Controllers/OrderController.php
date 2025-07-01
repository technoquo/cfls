<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
            'address' => 'required_if:delivery,livraison|string|max:255',
            'postal_code' => 'required_if:delivery,livraison|string|max:255',
            'province' => 'required_if:delivery,livraison|string|max:255',
            'region' => 'required_if:delivery,livraison|string|max:255',
            'society' => 'nullable|string|max:255',
        ];

        $validated = $request->validate($rules);

        // Crear usuario invitado si no está autenticado
        if (!Auth::check()) {
            $user = User::firstOrCreate(
                ['email' => $validated['email']],
                [
                    'name' => $validated['first_name'] . ' ' . $validated['second_name'],
                    'password' => bcrypt(Str::random(12)),
                    'role' => 'guest', // Asignar un rol de invitado
                    'telephone'    => $validated['telephone'],
                    'address'      => $validated['address'] ?? null,
                    'postal_code'   => $validated['postal_code'] ?? null,
                    'province'     => $validated['province'] ?? null,
                    'region'       => $validated['region'] ?? null,
                    'society'      => $validated['society'] ?? null,
                ]
            );

            // Iniciar sesión automáticamente con el usuario recién creado
            Auth::login($user);
        } else {
            $user = Auth::user();
        }

        // Crear orden
        $order = Order::create([
            'user_id'      => $user->id, // ahora se relaciona la orden con el usuario
            'delivery'     => $validated['delivery'],
            'total'        => $validated['total'],
            'delivery_fee' => $validated['deliveryFee'] ?? 0,
            'order_status' => 'pending',
        ]);

        // Asociar productos
        foreach ($validated['products'] as $product) {
            $order->products()->attach($product['id'], [
                'quantity'    => $product['quantity'],
                'unit_price'  => $product['totalPrice'],
                'choix'       => isset($product['choix']) ? json_encode($product['choix']) : null,
            ]);
        }

        return response()->json([
            'status' => 'ok',
            'message' => 'Order created successfully',
            'user_id' => $user->id,
        ]);
    }








}
