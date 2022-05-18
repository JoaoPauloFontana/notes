<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/painel';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index(){
        return view('auth.login');
    }

    public function authenticate(Request $req){
        $data = $req->only([
            'email',
            'password'
        ]);

        $remember = $req->input('remember', false);

        $validator = $this->validator($data, $remember);

        if($validator->fails()){
            return redirect()->route('painel.login')
            ->withErrors($validator)
            ->withInput();
        }

        if(Auth::attempt($data)){
            return redirect()->route('painel.home');
        }else{
            $validator->errors()->add('password', 'Email e/ou senha incorretos!');

            return redirect()->route('painel.login')
                ->withErrors($validator)
                ->withInput();
        }
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('painel.login');
    }

    protected function validator(array $data){
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:100'],
            'password' => ['required', 'string', 'min:8']
        ]);
    }
}
