<?php

namespace App\Http\Controllers\Cidadao\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/cidadao/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest.cidadaos', ['except' => 'logout']);
    }

    public function showLoginForm()
    {
        return view('cidadao.auth.login');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return \Auth::guard('cidadao');
    }

    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
   /* public function authenticate($dados)
    {
        dd("teste");
        if (Auth::attempt(['cnpj' => $dados['cnpj'], 'password' => $dados['password']])) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        }
    }*/

    public function login(Request $request)
    {
        //dd("teste");
        $dados = $request->all();
        if (\Auth::guard('cidadao')->attempt(['email' => $dados['email'], 'password' => $dados['password']])) {
            // Authentication passed...
            return redirect()->route('cidadao.home');
        }else{
            return back()->withErrors(['email' => 'Login ou senha inválidos!']);
        }
        
    }
}
