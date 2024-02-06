<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\wallet;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\hash;


class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email harus diisi',
            'password.required' => 'Password harus diisi'
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            if (Auth::user()->role == "kantin") {
                return redirect()->route('kantin.index');
            } else if (Auth::user()->role == "customer") {
                return redirect()->route('customer.index');
            } else if (Auth::user()->role == "bank") {
                return redirect()->route('bank.index');
            }
        } else {
            return redirect()->route('auth.login')->withErrors('Email dan password tidak sesuai')->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('');
    }

    public function create()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
            $str = Str::random(10);
            $request->validate(
                [
                    'nama' => 'required',
                    'email' => 'required',
                    'password' => 'required',
                ],
                [
                    'nama.required' => 'nama wajib diisi',
                    'email.required' => 'email wajib diisi',
                    'password,required' => 'password wajib diisi',
                ]
            );
            $inforegister = [
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'remember_token' => $str,
                'email_verified_at' => now(),
                'role' => 'customer',
            ];
    
            $userRegis = User::create($inforegister);
    
            $rekening = '64' . auth()->id() . now()->format('YmdHis');
            $wallet = [
                'rekening' => $rekening,
                'id_user' => $userRegis->id,
                'saldo' => 0,
                'status' => "aktif",
            ];
    
            Wallet::create($wallet);
    
            return redirect()->route('login')->with('success', 'Berhasil register');
    }

}