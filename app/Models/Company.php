<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Company extends Model
{
  use Sortable;
  //テーブル名
  protected $table = 'companies';
  //可変項目
  protected $fillable =
  [
    'company_name',
    'street_address'
  ];
  protected $sortable = 
  [
    'company_name'

  ];

  protected $primaryKey = "id";

  public function products()
   {
       return $this->hasMany('App\Models\Product');
   }
}
