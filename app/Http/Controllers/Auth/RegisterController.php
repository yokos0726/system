<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    public function exeRegister(Request $request){
        // バリデーション
        $this->validate($request,[
          'name' => 'required',
          'email' => 'email|required|unique:users',
          'password' => 'required|min:4',
          
        ]);
       
        // DBインサート
        $user = new User([
          'name' => $request->input('name'),
          'email' => $request->input('email'),
          'password' => bcrypt($request->input('password')),
          
        ]);
       
        // 保存
        $user->save();
       
        // リダイレクト
        return redirect()->route('register_comp');
      }
      

      public function showRegisterComp()
    {
      return view('signup.register_comp');
    }



//     use RegistersUsers;

//     /**
//      * Where to redirect users after registration.
//      *
//      * @var string
//      */
//     protected $redirectTo = '/home';

//     /**
//      * Create a new controller instance.
//      *
//      * @return void
//      */
//     public function __construct()
//     {
//         $this->middleware('guest');
//     }

//     /**
//      * Get a validator for an incoming registration request.
//      *
//      * @param  array  $data
//      * @return \Illuminate\Contracts\Validation\Validator
//      */
//     protected function validator(array $data)
//     {
//         return Validator::make($data, [
//             'name' => ['required', 'string', 'max:255'],
//             'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//             'password' => ['required', 'string', 'min:8', 'confirmed'],
//         ]);
//     }

//     /**
//      * Create a new user instance after a valid registration.
//      *
//      * @param  array  $data
//      * @return \App\User
//      */
//     protected function create(array $data)
//     {
//         return User::create([
//             'name' => $data['name'],
//             'email' => $data['email'],
//             'password' => Hash::make($data['password']),
//         ]);
//     }
}
