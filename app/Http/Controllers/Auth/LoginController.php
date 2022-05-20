<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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

    protected function autenticar(Request $request) {
        //regras de validação
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];
    
        //as mensagens de feedback de validação
    
        $feedback = [
            'usuario.email' => 'O campo usuário(email) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório'
        ];
    
        $request->validate($regras, $feedback);
    
        $email= $request->get('usuario');
        $password= $request->get('senha');
        
        
    
        //iniciar o model user
        $user = new User();
    
        $usuario = $user->where('email', $email)->where('password', $password)->get()->first();
    
    
         if(isset($usuario->name)) {
             session_start();
             $_SESSION['name'] = $usuario->name;
             $_SESSION['email'] = $usuario->email;
    
            return redirect()->route('home');
         }else {
           
            return redirect()->back()->with('danger','Usuário ou senha incorretos.');
        }
       
         }
}
