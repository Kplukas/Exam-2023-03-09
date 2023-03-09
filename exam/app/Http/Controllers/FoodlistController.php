<?php

namespace App\Http\Controllers;

use App\Models\Foodlist;
use App\Models\Canteen;
use App\Models\Food;
use App\Http\Requests\StoreFoodlistRequest;
use App\Http\Requests\UpdateFoodlistRequest;

class FoodlistController extends Controller
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
    public function create()
    {
        $canteens = Canteen::all();
        return View('back.foodlist.create', ['canteens' => $canteens]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFoodlistRequest $request)
    {
        $foodlist = new Foodlist;
        $foodlist->title = $request->title;
        $foodlist->canteen_id= $request->canteen_id;
        $foodlist->save();

        return redirect()->route('canteen-index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Foodlist $foodlist)
    {
        $canteens = Canteen::all();
        $foods = Food::all();
        return View('back.foodlist.show', ['foodlist' => $foodlist, 'canteens' => $canteens, 'foods' => $foods]);
    }
    public function show2(Foodlist $foodlist)
    {
        $canteens = Canteen::all();
        $foods = Food::all();
        return View('front.foodlist.show', ['foodlist' => $foodlist, 'canteens' => $canteens, 'foods' => $foods]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Foodlist $foodlist)
    {
        $canteens = Canteen::all();
        return View('back.foodlist.edit', ['foodlist' => $foodlist, 'canteens' => $canteens]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFoodlistRequest $request, Foodlist $foodlist)
    {
        $foodlist->title = $request->title;
        $foodlist->canteen_id= $request->canteen_id;
        $foodlist->save();

        return redirect()->route('canteen-index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Foodlist $foodlist)
    {
        $foodlist->delete();
        return redirect()->route('foodlist-index');
    }
}
