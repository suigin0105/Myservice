<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Sale;
use App\Models\Column;
use App\Models\VendingMachine;
use App\Models\Product;

class SaleController extends Controller
{
    public function index(Sale $sale)
    {
        $vendingmachines = VendingMachine::all();
        $columns = Column::all();
        $products = Product::all();
        
        $result = DB::table('sales')
            ->select('vending_machine_id')
            ->selectRaw('SUM(solds) AS total_solds')
            ->groupBy('vending_machine_id')
            ->get();
        
        return view('sales.index')
            ->with(['sales' => $sale->get()])
            ->with('vendingmachines',$vendingmachines)
            ->with('columns',$columns)
            ->with('products',$products)
            ->with('result',$result)
            ->with('user_name',\Auth::user()->name);
    }
    
    public function show(Sale $sale)
    {
        return view('sales.show')
           ->with(['sale' => $sale]);
    }
    
    public function create(Column $column, Vendingmachine $vendingmachine)
    {
        return view('sales.create')
           ->with(['columns' => $column->get()])
           ->with(['vendingmachines' => $vendingmachine->get()])
           ->with('user_name',\Auth::user()->name);
    }
    
    public function store(Request $request, Sale $sale)
    {
         $request->validate([
            'year' => 'required|integer|min:1900',
            'month' => 'required|integer|max:12|min:1',
            'dates' => 'required|integer|max:31|min:1',
            'vendingmachine_id' => 'required',
            'column_id' => 'required',
            'product_id' => 'required',
            'solds' => 'required|integer',
            'discards' => 'required|integer',
        ]);
        
        $sales = new Sale;
        $sales->user_id = \Auth::user()->id;
        $sales->year = $request->input(['year']);
        $sales->month = $request->input(['month']);
        $sales->date = $request->input(['dates']);
        $sales->vending_machine_id =$request->input(['vendingmachine_id']);
        $sales->column_id =$request->input(['column_id']);
        $sales->product_id =$request->input(['product_id']);
        $sales->solds =$request->input(['solds']);
        $sales->discards =$request->input(['discards']);
        $sales->save();
        
        return redirect('/sales');
    }

}
