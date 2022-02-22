<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{
  use Sortable;
  //テーブル名
  protected $table = 'products';
  //可変項目
  protected $fillable =
  [
    'product_name',
    'stock',
    'comment'
  ];
  protected $sortable = 
  [
    'id',
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
