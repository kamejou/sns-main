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
        'username' => 'required|string|min:2|max:10',
        'mail' => 'required|string|email|min:5|max:40|unique:users',
        'password' => 'required|string|min:8|max:20|confirmed',
    ], [
        'username.required' => 'ユーザー名は必須です。',
        'username.string' => 'ユーザー名は文字列である必要があります。',
        'username.min' => 'ユーザー名は:min文字以上である必要があります。',
        'username.max' => 'ユーザー名は:max文字以内である必要があります。',
        'mail.required' => 'メールアドレスは必須です。',
        'mail.string' => 'メールアドレスは文字列である必要があります。',
        'mail.email' => '有効なメールアドレスを使用してください。',
        'mail.min' => 'メールアドレスは:min文字以上である必要があります。',
        'mail.max' => 'メールアドレスは:max文字以内である必要があります。',
        'mail.unique' => '既に存在するメールアドレスです。',
        'password.required' => 'パスワードは必須です。',
        'password.string' => 'パスワードは文字列である必要があります。',
        'password.min' => 'パスワードは:min文字以上である必要があります。',
        'password.max' => 'パスワードは:max文字以内である必要があります。',
        'password.confirmed' => 'パスワードが一致していません。',
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
        'username.required' => 'ユーザー名は必須です。',
        'username.string' => 'ユーザー名は文字列である必要があります。',
        'username.min' => 'ユーザー名は:min文字以上である必要があります。',
        'username.max' => 'ユーザー名は:max文字以内である必要があります。',
        'mail.required' => 'メールアドレスは必須です。',
        'mail.string' => 'メールアドレスは文字列である必要があります。',
        'mail.email' => '有効なメールアドレスを使用してください。',
        'mail.min' => 'メールアドレスは:min文字以上である必要があります。',
        'mail.max' => 'メールアドレスは:max文字以内である必要があります。',
        'mail.unique' => '既に存在するメールアドレスです。',
        'password.required' => 'パスワードは必須です。',
        'password.string' => 'パスワードは文字列である必要があります。',
        'password.min' => 'パスワードは:min文字以上である必要があります。',
        'password.max' => 'パスワードは:max文字以内である必要があります。',
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
