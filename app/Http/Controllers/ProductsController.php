<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Company;
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

    $products = Product::with('company')->sortable()->get();



    return view('product.list', ['products' => $products]);

    
  }

  
  


  //詳細画面表示

  /**
   * 商品詳細を表示
   *@param int $id
  *@return view
  */
  public function showDetail($id)
  {

    $product = Product::find($id);

    if(is_null($product)) {
      \Session::flash('flash_message', 'データがありません');
      return redirect(route('showList'));
    }

    return view('product.detail', ['product' => $product]);
  }
  /**
   * 商品登録画面を表示
   *@return view
  */

  public function showCreate() {
    return view('product.product_create');
  }

  //商品情報登録

  public function exeStore(Request $request) {
    $this->validate($request, Product::$rules);

    if($file = $request->image) {
      $fileName = time() . $file->getClientOriginalName();
      $target_path = public_path('uploads/');
      $file->move($target_path, $fileName);
    } else {
      $fileName = "";
    }

    $product = new Product;
    $product->product_name = $request->product_name;
    $product->company_id = $request->company;
    $product->price = $request->price; 
    $product->stock = $request->stock; 
    $product->comment = $request->comment;
    $product->image = $fileName;
    $product->save();

    return redirect()->route('showCreate')->with('flash_message','登録が完了しました');

  }

  // /**
  //  * 商品情報削除
  //  *@param int $id
  // *@return view
  // */

  // public function exeDelete(Request $request, Product $product){
  //   $product = Product::findOrFail($request->product_id);
  //   $product->delete();
  // }
  // public function exeDelete($id)
  // {
  //   if(empty($id)) {
  //     \Session::flash('flash_message', 'データがありません');
  //     return redirect('product.list');
  //   }

  //   try{
  //     Product::destroy($id);
  //   } catch(\Throwable $e) {
  //     abort(500);
  //   }
  //   Product::destroy($id);

  //   \Session::flash('flash_message', '削除しました');
  //     return redirect(route('showList'));
  // }

  /**
   * 商品編集画面を表示
   *@param int $id
  *@return view
  */
  public function showEdit($id)
  {

    $product = Product::find($id);

    if(is_null($product)) {
      \Session::flash('flash_message', 'データがありません');
      return redirect(route('showList'));
    }

    return view('product.edit', ['product' => $product]);
  }

  //商品情報更新
  public function exeUpdate(Request $request) {
    $this->validate($request, Product::$rules);
    
    //  else {
    //     $fileName = "";
    //   }
    
    $product = Product::find($request->id);
    $product->product_name = $request->input('product_name');
    $product->company_id = $request->input('company');
    $product->price = $request->input('price');
    $product->stock = $request->input('stock');
    $product->comment = $request->input('comment');
      
    if($file = $request->image) {
      $fileName = time() . $file->getClientOriginalName();
      $target_path = public_path('uploads/');
      $file->move($target_path, $fileName);

      $product->image = $fileName;
      $product->save();
    }
     

    $product->save();

      
    
    return redirect()->route('showEdit', $product->id )->with('flash_message','更新が完了しました');
    
  } 
  
}



 ?>
