<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  //テーブル名
  protected $table = 'products';
  //可変項目
  protected $fillable =
  [
    'product_name',
    'stock',
    'comment'
  ];

  public static $rules = [
    'product_name' => 'required',
    'company' => 'required',
    'price' => 'required',
    'stock' => 'required',
    'comment' => 'required|max: 100',
    'image' => 'image|file',

  ];
  
  public function company()
  {
    return $this->belongsTo('App\Models\Company');
  }

  public function sales()
  {
    return $this->hasMany('App\Models\Sale');
  }


}
