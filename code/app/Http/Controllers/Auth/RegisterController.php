<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user_id' => ['required', 'string', 'min:4','max:20','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
        ],[
            'user_id.min' => ':attributeは4文字以上20文字以内で入力してください。',
            'user_id.max' => ':attributeは4文字以上20文字以内で入力してください。',
            'user_id.unique' => ':attributeは既に使用されています。',
            'email.max' => ':attributeは255文字以上で入力してください。',
            'password.min' => ':attributeは4文字以上で入力してください。',
            'password.confirmed' => ':attributeが確認用と一致しません。',
        ],[
            'user_id' => 'ユーザID',
            'email' => 'メールアドレス',
            'password' => 'パスワード'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'user_id' => $data['user_id'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'adminFlag' => 0,
        ]);
    }
}
