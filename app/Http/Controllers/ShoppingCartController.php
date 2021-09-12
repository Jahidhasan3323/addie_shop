<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\StockProduct;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function list()
    {
        return view('backend/shopping-cart/cart');
    }

    /**
     * @param $stockId
     * @param $productId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add($stockId, $productId)
    {
        $stock = StockProduct::with('product', 'stock')->where(['stock_id' => $stockId, 'product_id' => $productId])->first();
        $discount= ($stock->price*$stock->product->discount)/100;
        if ($stock && $stock->quantity > 1) {
            Cart::add(['id' => $productId, 'name' => $stock->product->title, 'qty' => 1, 'price' => $stock->price, 'options' => ['stock' => $stock->stock->title, 'stock_id' => $stockId, 'discount'=>$discount]]);
        }
        return redirect()->back()->with('success', 'Product added to cart');
    }

    /**
     * @param $stockId
     * @param $productId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $stock = StockProduct::with('product', 'stock')->where(['stock_id' => $request->stock_id, 'product_id' => $request->product_id])->first();
        if ($stock && $stock->quantity >= $request->qty) {
            Cart::update($request->rowId, ['qty' => $request->qty]);
        }else{
            return redirect()->back()->with('error', 'Insufficient quantity of product');
        }
        return redirect()->back()->with('success', 'Product added to cart');
    }

    /**
     * @param $rowId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove($rowId)
    {
        Cart::remove($rowId);
        return redirect()->back()->with('success', 'Product removed from cart');
    }
}
