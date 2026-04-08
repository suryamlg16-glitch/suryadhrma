<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Tampilkan halaman login admin
     */
    public function showLoginForm()
    {
        // Jika sudah login dan role admin, redirect ke dashboard
        if (Auth::check() && Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        
        return view('admin.login');
    }
    
    /**
     * Proses login admin (menggunakan email)
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        
        if (Auth::attempt($credentials, $request->remember)) {
            $user = Auth::user();
            
            // Cek apakah user memiliki role admin
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }
            
            // Jika bukan admin, logout
            Auth::logout();
            return back()->with('error', 'Anda tidak memiliki akses sebagai admin');
        }
        
        return back()->with('error', 'Email atau password salah')->withInput($request->except('password'));
    }
    
    /**
     * Logout admin
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/admin/login');
    }
}