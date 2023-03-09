<?php

namespace App\Http\Controllers;

use App\Models\Canteen;
use App\Models\Foodlist;
use App\Http\Requests\StoreCanteenRequest;
use App\Http\Requests\UpdateCanteenRequest;

class CanteenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $canteens = Canteen::all();
        return View('back.canteen.index', ['canteens' => $canteens]);
    }
    public function index2()
    {
        $canteens = Canteen::all();
        return View('front.canteen.index', ['canteens' => $canteens]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return View('back.canteen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCanteenRequest $request)
    {
        $canteen = new Canteen;
        $canteen->title = $request->title;
        $canteen->code = $request->code;
        $canteen->adress = $request->adress;
        $canteen->save();
        return redirect()->route('canteen-index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Canteen $canteen)
    {
        $foodlists = Foodlist::all();
        return View('back.canteen.show', ['canteen' => $canteen, 'foodlists' => $foodlists]);
    }
    public function show2(Canteen $canteen)
    {
        $foodlists = Foodlist::all();
        return View('front.canteen.show', ['canteen' => $canteen, 'foodlists' => $foodlists]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Canteen $canteen)
    {
        return View('back.canteen.edit', ['canteen' => $canteen]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCanteenRequest $request, Canteen $canteen)
    {
        $canteen->title = $request->title;
        $canteen->code = $request->code;
        $canteen->adress = $request->adress;
        $canteen->save();
        return redirect()->route('canteen-index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Canteen $canteen)
    {
        $canteen->delete();
        return redirect()->route('canteen-index');
    }
}
