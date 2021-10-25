<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
  //テーブル名
  protected $table = 'sales';

  public function product()
   {
       return $this->belongsTo('App\Product');
   }

}
