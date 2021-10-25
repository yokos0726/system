<?php

namespace App;


// use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable
{
    use Notifiable;
    //テーブル名
    protected $table = 'users';
    //可変項目
    protected $fillable =
    [
      'user_name',
      'email',
      'password'
    ];


}
