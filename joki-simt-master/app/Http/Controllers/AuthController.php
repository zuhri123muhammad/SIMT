<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Login View
     */
    public function viewLogin() {
         if (Auth::check()) {
            if (Auth::user()->role == 'isMahasiswa') {
                return redirect()->route('home');
            }else {
                return redirect()->route('dashboard');
            }
        } else {
            return view('auth.login');
        }
    }
    /**
     * Register View
     */
    public function viewRegister() {
        if (Auth::check()) {
           if (Auth::user()->role == 'isMahasiswa') {
               return redirect()->route('home');
           }else {
               return redirect()->route('dashboard');
           }
       } else {
           return view('auth.register');
       }
    }


    /**
     * Auth Login
     */
    public function login(Request $request)
    {
        $email = $request->email;
        $pass = $request->password;

        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required|min: 8'
        ]);

        $find = User::where('email', $email)->first();
        if (!empty($find)) {
            if (Hash::check($pass, $find->password)) {
                Auth::login($find);
                // Auth::attempt(['email' => $email, 'password' => $pass]);
                $token = 'okezone';
                // Session::put('EL', $token);
                session(['EL' => $token]);
                // $request->session()->put('Elqi', $token);
                if ($find->role === 'isOperator') {
                    return redirect()->route('dashboard');
                }elseif ($find->role === 'isMahasiswa') {
                    return redirect('/');
                }

            }else{
                return redirect()->back()->withInput()->withErrors(['message' => 'password anda salah']);
            }
        }else{
            return redirect()->back()->withInput()->withErrors(['message' => 'email anda tidak terdaftar']);
        }

    }

    /**
     * Auth logout
     */
    public function logout(Request $request)
    {
        $auth = Auth::user();
        Auth::logout($auth);
        $request->session()->flush();
        return redirect('/');
    }

    /**
     * Auth Register
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:users',
            'password' => [
                'required', 
                'min:8', 
                'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.[!$#%]).*$/'
            ],
            'fullName' => 'required'
        ]);
        $email = $request->email;
        $fullName = $request->fullName;
        $password = Hash::make($request->password);

        $user = User::create([
            'name' => $fullName,
            'email' => $email,
            'password' => $password,
            'role' => 'isMahasiswa'
        ]);

        if ($user) {
            $success = Mahasiswa::create([
                'user_id' => $user->id,
                'fullName' => $fullName
            ]);
            if ($success) {
                toastr()->success('berhasil membuat akun!', 'Selamat');
                return redirect()->route('login');
            }
        }
        
    }
}
