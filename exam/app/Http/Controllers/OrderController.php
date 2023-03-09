<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Canteen;
use App\Models\Food;
use App\Models\Foodlist;
use App\Models\User;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        $foods = Food::all();
        $foodlists = Foodlist::all();
        $canteens = Canteen::all();
        $users = User::all();
        return View('back.order.index', [
            'orders' => $orders,
            'foods' => $foods,
            'foodlists' => $foodlists,
            'canteens' => $canteens,
            'users' => $users
        ]);
    }
    public function index2()
    {
        $orders = Order::all();
        $foods = Food::all();
        $foodlists = Foodlist::all();
        $canteens = Canteen::all();
        return View('front.order.index', [
            'orders' => $orders,
            'foods' => $foods,
            'foodlists' => $foodlists,
            'canteens' => $canteens,
        ]);
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
    public function store(StoreOrderRequest $request)
    {
        $order = new Order;
        $order->user_id = $request->user_id;
        $order->many = $request->many;
        $order->food_id = $request->food_id;
        $order->save();

        return redirect()->route('order-index2');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->confirmed = $request->confirmed;
        $order->save();
        return redirect()->route('order-index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
