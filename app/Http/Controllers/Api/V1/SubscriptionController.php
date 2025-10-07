<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\SubscritpionResource;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {



        $result = Subscription::create($request->all());

        return new SubscritpionResource($result);
    }

    /**
     * Display the specified resource.
     */
    public function show($user_id)
    {
        $subscriptions = Subscription::with('plan')
            ->where('user_id', $user_id)
            ->where('status', 'active')
            ->get();

        return SubscritpionResource::collection($subscriptions);
    }

    public function active($user_id)
    {
        $subscriptions = Subscription::with('plan')
            ->where('user_id', $user_id)
            ->where('status', 'active')
            ->get();

        return SubscritpionResource::collection($subscriptions);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subscription $subscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {



        $subscription = Subscription::where('user_id', $request->input('user_id'))
            ->where('status', 'active')
            ->first();



        if ($subscription->plan_id !== $request->input('plan_id')) {



            Subscription::where('user_id', $request->input('user_id'))
                ->where('plan_id', $subscription->plan_id)
                ->where('status', 'active')
                ->update([
                    'status' => 'cancelled',
                    'ends_at' => now(),
                ]);

//            Subscription::where('user_id', $request->input('user_id')                -
//                ->where('plan_id', $subscription->plan_id)
//                ->update(['status' => 'cancelled']);
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subscription $subscription)
    {
        //
    }

    public function cancel(Request $request)
    {


        $subscription = Subscription::where('user_id', $request->input('user_id'))
            ->where('id', $request->input('subscription_id'))
            ->where('status', 'active')
            ->first();


        $subscription->status = 'cancelled';
        $subscription->ends_at = now();
        $subscription->save();

        return response()->json(['message' => 'Subscription canceled successfully.']);
    }
}
