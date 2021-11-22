<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    //ログインフォーム表示
    /**
     * @return View
     */
    public function showLogin()
    {
      return view('login.login_form');
    }

    //ログイン機能
    /**
     * @return View
     */
    public function login(Request $request)
    {

      
      
      $credentials = $request->only('email', 'password');

      if(Auth::attempt($credentials)) {
        // 認証に成功した
        return redirect()->intended('/login/products');
      }
    
      return back()->withErrors([
        'login_error' => 'メールアドレスかパスワードが間違っています。',
      ]);
    }

    

    //新規登録フォーム表示
    /**
     * @return View
     */
    public function showSignUp()
    {
      return view('signup.signup_form');
    }


  //ユーザー登録する
  
  public function exeRegister(Request $request)
  {
    // バリデーション
    $this->validate($request,[
      'user_name' => 'required',
      'email' => 'email|required|unique:users',
      'password' => 'required|confirmed',
      'password_confirmation' => 'required',
        
    ]);
     
    // DBインサート
    $user = new User([
      'user_name' => $request->input('user_name'),
      'email' => $request->input('email'),
      'password' => bcrypt($request->input('password')),
        
    ]);
     
    // 保存
    $user->save();
     
    // リダイレクト
    return redirect()->route('showLogin')->with('flash_message','新規ユーザー登録が完了しました');
  }
    
  //   public function showRegisterComp()
  // {
  //   return view('signup.register_comp');
  // }

}
