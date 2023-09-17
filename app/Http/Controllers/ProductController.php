<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view('products.index', compact('products'))
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
            'name' => 'required|max:20|unique:products,name',
            'price' => 'required|integer',
        ]);
        
        $product = new Product;
        $product->user_id = \Auth::user()->id;
        $product->name = $request->input(['name']);
        $product->price = $request->input(['price']);
        $product->save();
        
        return redirect('/products');
     
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
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'))
        ->with('page_id',request()->page_id)
        ->with('user_name',\Auth::user()->name);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
       $request->validate([
            'name' => 'required|max:20',
            'price' => 'required|integer',
        ]);
        
        $product->user_id = \Auth::user()->id;
        $product->name = $request->input(['name']);
        $product->price = $request->input(['price']);
        $product->save();
        
        return redirect('/products');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        
        return redirect('/products');
    }
}
