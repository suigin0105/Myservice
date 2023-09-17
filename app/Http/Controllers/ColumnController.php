<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Column;
use App\Models\VendingMachine;

class ColumnController extends Controller
{
    public function index()
    {
        $columns = Column::latest()->paginate(5);
        $vendingmachines = VendingMachine::all();
        
        return view('columns.index', compact('columns'))
            ->with('page_id',request()->page)
            ->with('i', (request()->input('page', 1) - 1) * 5)
            ->with('user_name',\Auth::user()->name)
            ->with('vendingmachines',$vendingmachines);
    }
    
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|max:10|unique:columns,name',
            'vending_machine_id' =>'required|integer',
        ]);
        
        $columns = new Column;
        $columns->name = $request->input(['name']);
        $columns->vending_machine = $request->input(['vending_machine_id']);
        $columns->save();
        
        return redirect('/columns');
    }

}
