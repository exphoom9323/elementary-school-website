<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
// use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest');   //สมัครเสร็จให้ค่าหน้า login
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
            'studentcode' => ['required', 'integer','digits_between:4,4'],
            'idcard' => ['required', 'integer','digits_between:13,13'],
            'studentyear' => ['required'],
            'titlename' => ['required'],
            'firstname' => ['required','string'],
            'lastname' => ['required','string'],
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
            'studentcode' => $data['studentcode'],
            'idcard' => $data['idcard'],
            'studentyear' => $data['studentyear'],
            'titlename' => $data['titlename'],
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'password' => Hash::make($data['idcard']),
        ]);
    }
}
