<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //ログインフォーム
    /**
     * @return View
     */
    public function showLogin()
    {
      return view('login.login_form');
    }

    /**
     * @param App\Http\Requests\LoginFormRequest
     */
    public function login(LoginFormRequest $request)
    {
      $credentials = $request->only('email','password');

      if(Auth::attempt($credentials)) {
        $request->session()->regenerate();

        return redirect('login/products')->with('login_success','ログイン成功しました');
      }
      //入力に誤りがあったらエラーを返す
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
    /**
     * @return View
     */
    public function exeRegister(RegisterRequest $request)
    {
      //ユーザーのデータをうけとる
      $inputs = $request->all();
      //ユーザー登録
      User::create($inputs);

      \Session::flash('err_msg', 'ユーザー登録が完了しました');

      return view('login.login_form');
    }


}
