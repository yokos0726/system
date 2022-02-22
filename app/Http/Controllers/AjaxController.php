<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Company;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{
  //検索機能実装

  public function search($product_name = null , $company_id = null , $price_min = null , $price_max = null , $stock_min = null , $stock_max = null) {

    $query = DB::table('products');
    $query->select('products.id', 'products.product_name', 'products.price', 'products.stock', 'products.image', 'companies.company_name');
    $query->join('companies', 'products.company_id', '=', 'companies.id');

    // if (!is_null($product_name)) {
    //     $query->where('product_name', 'like', '%' . $product_name . '%');
    //     $products = $query->get();
      
    //   }elseif(is_null($product_name) && (!is_null($company_id)) ) {
    //     $query->where('company_id', $company_id);
    //     $products = $query->get();
    //   }
  
    if (!empty($product_name)) {
      $query->where('product_name', 'like', '%' . $product_name . '%');
    }
  
    if (!empty($company_id)) {
      $query->where('company_id', $company_id);
    }

    if(!empty($price_min)) {
      $query->whereBetween('price',[$price_min,$price_max]);
    }
  
    if(!empty($stock_min)) {
      $query->whereBetween('stock',[$stock_min,$stock_max]);
    }
    
    $products = $query->get();
  
    $result = [];
    foreach ($products as $key => $product) {
      $result[] = [
        "id" => $product->id,
        "product_name" => $product->product_name,
        "price" => $product->price,
        "stock" => $product->stock,
        "image" => $product->image,
        "company_name" => $product->company_name,
      ];
    }
  
    error_log(var_export($result, true), 3, "./debug.txt");
    return response()->json($result);
  }


  /**
   * 商品情報削除
   *@param int $id
  *@return view
  */

  public function exeDelete($id = null){
    $product = DB::table('products')->where('id',$id);
    $product->delete();
  }
    
}