<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        if ($user = Auth::user()){
            if ($user->level == '1'){
                return redirect()->intended('dashboard');
            }elseif ($user->level == '2'){
                return redirect()->intended('beranda');

            }
        }

        return view('login.view_login');
    }

    public function proses(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ],
            [
                'username.required' => 'Username tidak boleh kosong',
                'password.required' => 'Password tidak boleh kosong',
            ] 
        );

        $kredensial = $request->only('username','password');

        if(Auth::attempt($kredensial)){
            $request->session()->regenerate();
            $user = Auth::user();
            if($user->level == '1'){
                return redirect()->intended('dashboard');
            }elseif($user->level == '2'){
                return redirect()->intended('beranda');

            }

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'username' => 'Maaf username atau password anda salah',
        ])->onlyInput('username');
    }

    public function logout(Request $request): RedirectResponse
{
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('/');
}
}

