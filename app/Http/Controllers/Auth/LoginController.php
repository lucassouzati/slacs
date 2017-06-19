<?php

namespace App\Http\Controllers\Auth;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        if (\Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
            // Authentication passed...
            $colaborador = \Auth::user();
            
            if(!$colaborador->aprovacao_cadastro)
            {
                \Auth::logout();
                return redirect()->back()
                ->withErrors(['email' => 'Seu cadastrado ainda não foi aprovado. Tente novamente mais tarde'])
                ->withInput();           
            }
            elseif($colaborador->ativo)
            {
                return redirect('/home');    
            }
            else
            {
                \Auth::logout();
                return redirect()->back()
                ->withErrors(['email' => 'Usuário desativado! Entre em contato com um administrador.'])
                ->withInput();        
            }
            
        }
        else
        {
           return redirect()->back()
                ->withErrors(['email' => 'Login ou senha inválidos!'])
                ->withInput(); 
        }   
    }
}
