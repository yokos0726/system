<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Models\Product;

class SalesController extends Controller
{
    //
    public function BuyProducts(Request $request){
        $sale = new Sale();
        // $product =new Product();

        $sale->product_id = $request->id;
       
        $sale->save();

        return response()->json($sale);

        
    }

    public function DecrementProducts(Request $request){

        $product = Product::find($request->id);
        $product->decrement('stock');
        $product->save();

        if($product->stock == 0) {
            \Session::flash('flash_message', '在庫がありません');
        }

        
    }
    
}
