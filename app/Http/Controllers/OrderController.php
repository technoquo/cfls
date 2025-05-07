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
        $data = $request->validate([
            'prenom' => 'required|string',
            'nom' => 'required|string',
            'email' => 'required|email',
            'tel' => 'required|string',
            'delivery' => 'required|string',
            'total' => 'required|numeric',
            'produits' => 'required|array',
        ]);

        $commande = \App\Models\Order::create([
            'user_id' => auth()->id(),
            'first_name' => $data['prenom'],
            'second_name' => $data['nom'],
            'email' => $data['email'],
            'telephone' => $data['tel'],
            'delivery' => $data['delivery'] === 'livraison',
            'address' => $request->input('address'),
            'total' => $data['total'],
        ]);

        foreach ($data['produits'] as $produit) {
            $commande->products()->attach($produit['id'], [
                'quantity' => $produit['quantity'],
                'unit_price' => $produit['price'],
            ]);
        }

        return response()->json(['success' => true]);
    }
}
