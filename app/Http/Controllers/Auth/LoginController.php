<?php



namespace App\Http\Controllers\Auth;



use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;



class LoginController extends Controller

{



    use AuthenticatesUsers;



    protected $redirectTo = '/';

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {

        $this->middleware('guest')->except('logout');

    }



    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function login(Request $request)

    {

        $input = $request->all();

        $this->validate($request, [

            'studentcode' => 'required',

            'password' => 'required',

        ]);

        if(auth()->attempt(['studentcode' => $input['studentcode'], 'password' =>  $input['password']])){
            return redirect()->route('welcome');
        }else{
            return redirect()->route('welcome');
        }



                // user and e-mail login

        // $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        //
        // if(auth()->attempt(array($fieldType => $input['username'], 'password' => $input['password'])))
        //
        // {
        //
        //     return redirect()->route('home');
        //
        // }else{
        //
        //     return redirect()->route('login');
        //
        // }



    }

}
