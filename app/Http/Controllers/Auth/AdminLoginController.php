<?php

namespace App\Http\Controllers\Auth;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except([
            'logout' 
        ]);
    }
    
    /**
     * Display a login form for admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('auth.admin-login');
    }

    /**
     * Authenticate the admin.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.user')
                ->withSuccess('Selamat anda berhasil login sebagai admin!');
        }

        return back()->withErrors([
            'email' => 'Ada kesalahan saat masuk',
        ])->onlyInput('email');
    }
    public function dashboard()
    {
        if(Auth::check())
        {
            return view('auth.admin-dashboard');
        }
        
        return redirect()->route('admin.login')
            ->withErrors([
            'email' => 'Tolong Login di Dashboard.',
        ])->onlyInput('email');
    }

    /**
     * Log out the admin from application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login')
            ->withSuccess('Anda telah berhasil logout sebagai admin!');
    }
}
