<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{

/**
 * 商品一覧を表示
 *
 *@return view
 */
public function showList()
{

  $products = Product::all();



  return view('product.list', ['products' => $products]);
}

}



 ?>
