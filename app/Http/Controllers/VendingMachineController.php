<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VendingMachine;

class VendingMachineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendingmachines = Vendingmachine::latest()->paginate(5);
        return view('vending_machines.index', compact('vendingmachines'))
            ->with('page_id',request()->page)
            ->with('i', (request()->input('page', 1) - 1) * 5)
            ->with('user_name',\Auth::user()->name);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|max:20|unique:vending_machines,name',
        ]);
        
        $vendingmachines = new VendingMachine;
        $vendingmachines->user_id = \Auth::user()->id;
        $vendingmachines->name = $request->input(['name']);
        $vendingmachines->save();
        
        return redirect('/vending_machines');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(VendingMachine $vendingmachine)
    {
        return view('vending_machines.edit', compact('vendingmachine'))
        ->with('user_name',\Auth::user()->name);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VendingMachine $vendingmachine)
    {
        $request->validate([
            'name' => 'required|max:20',
        ]);
        
        $vendingmachine->user_id = \Auth::user()->id;
        $vendingmachine->name = $request->input(['name']);
        $vendingmachine->save();
        
        return redirect('/vending_machines');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(VendingMachine $vendingmachine)
    {
        $vendingmachine->delete();
        
        return redirect('/vending_machines');
    }
}
