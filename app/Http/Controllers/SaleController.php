<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;

class SaleController extends Controller
{
    public function index(Sale $sale)
    {
        return view('sales.index')->with(['sales' => $sale->get()]);
    }
    
    public function show(Sale $sale)
    {
        return view('sales.show')->with(['sale' => $sale]);
    }
    
}
