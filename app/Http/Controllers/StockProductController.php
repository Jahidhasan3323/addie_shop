<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock;
use App\Models\StockProduct;
use Illuminate\Http\Request;

class StockProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $products= StockProduct::with('product')->where('stock_id',$id)->get();
        return view('backend.stock.productList', ['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products=Product::get();
        $stocks=Stock::get();
        return view('backend.stock.productAdd',['products'=>$products,'stocks'=>$stocks]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'stock_id' => 'required',
            'product_id' => 'required',
            'price' => 'required | numeric',
            'quantity' => 'required | numeric'
        ]);
        $data = $request->all();
        try {
            StockProduct::create($data);
            return redirect()->back()->with('success', 'Product added in stock successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StockProduct  $stockProduct
     * @return \Illuminate\Http\Response
     */
    public function show(StockProduct $stockProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StockProduct  $stockProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(StockProduct $stockProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StockProduct  $stockProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StockProduct $stockProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StockProduct  $stockProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(StockProduct $stockProduct)
    {
        //
    }
}
