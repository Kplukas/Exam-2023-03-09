<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Http\Requests\StoreFoodRequest;
use App\Http\Requests\UpdateFoodRequest;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($foodlist)
    {
        
        return View('back.food.create', ['foodlist' => $foodlist]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFoodRequest $request)
    {
        $food = new Food;
        $food->list_id = $request->list_id;
        $food->title = $request->title;
        $food->description = $request->description;
        $food->save();

        return redirect()->route('foodlist-show', $food->list_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Food $food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Food $food)
    {
        return View('back.food.edit', ['food' => $food]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFoodRequest $request, Food $food)
    {
        $food->list_id = $request->list_id;
        $food->title = $request->title;
        $food->description = $request->description;
        $food->save();

        return redirect()->route('foodlist-show', $food->list_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Food $food)
    {
        $list = $food->list_id;
        $food->delete();
        return redirect()->route('foodlist-show', $list);
    }
}
