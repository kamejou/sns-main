<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

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

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    // public function registerForm(){
    //     return view("auth.register");
    // }

    public function register(Request $request){
        if($request->isMethod('post')){
            $request->validate([
            'required' => ':attribute は必須です。',
            'string' => ':attribute は文字列である必要があります。',
            'min' => ':attribute は:min文字以上である必要があります。',
            'max' => ':attribute は:max文字以内である必要があります。',
            'email' => ':attribute は有効なメールアドレスである必要があります。',
            'unique' => ':attribute は既に存在します。',
            'confirmed' => 'パスワードが一致していません。',
        ],[
            'username' => 'required|string|min:2|max:10',
            'mail' => 'required|string|email|min:5|max:40|unique:users',
            'password' => 'required|string|min:8|max:20|confirmed',
            ]);

            $data = $request->input();
            $this->create($data);
            return view('auth.added', compact('data'));
        }
        return view('auth.register');
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
{
    $validator = \Illuminate\Support\Facades\Validator::make($data, [
        'username' => 'required|string|min:2|max:10',
        'mail' => 'required|string|email|min:5|max:40|unique:users',
        'password' => 'required|string|min:8|max:20|confirmed',
    ], [
        'username.required' => ':attribute は必須です。',
        'username.string' => ':attribute は文字列である必要があります。',
        'username.min' => ':attribute は:min文字以上である必要があります。',
        'username.max' => ':attribute は:max文字以内である必要があります。',
        'mail.required' => ':attribute は必須です。',
        'mail.string' => ':attribute は文字列である必要があります。',
        'mail.email' => ':attribute は有効なメールアドレスである必要があります。',
        'mail.min' => ':attribute は:min文字以上である必要があります。',
        'mail.max' => ':attribute は:max文字以内である必要があります。',
        'mail.unique' => ':attribute は既に存在します。',
        'password.required' => ':attribute は必須です。',
        'password.string' => ':attribute は文字列である必要があります。',
        'password.min' => ':attribute は:min文字以上である必要があります。',
        'password.max' => ':attribute は:max文字以内である必要があります。',
        'password.confirmed' => 'パスワードが一致していません。',
    ]);

    if ($validator->fails()) {
        throw new \Illuminate\Validation\ValidationException($validator);
    }

    return User::create([
        'username' => $data['username'],
        'mail' => $data['mail'],
        'password' => bcrypt($data['password']),
    ]);
}
}
