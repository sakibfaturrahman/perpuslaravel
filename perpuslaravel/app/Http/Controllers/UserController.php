<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function register()
    {
        $data['title'] = 'Register';
        return view('auth.register', $data);
    }

    public function register_action(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:user',
            'phone' => 'max:225',
            'alamat' => 'required',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
        ]);

        $user = new User([
            'name' => $request->name,
            'username' => $request->username,
            'phone' => $request->phone,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
        ]);
        $user->save();

        return redirect()->route('login')->with('success', 'Registrasi Berhasil !. Silahkan Login Dengan Akun Anda');
    }


    public function login()
    {
        $data['title'] = 'Login';
        return view('auth.login', $data);
    }

    public function login_action(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
        } else {
            return back()->withErrors([
                'password' => 'Username Atau Password yang anda masukan salah!',
            ]);
        }

        // cek jika admin
        if (Auth::user()->role_id == 1) {

            Alert::toast('Selamat datang di Dashboard admin', 'success');
            return redirect()->intended('dashboard')->with('success');
        }

        //cek jika user
        if (Auth::user()->role_id == 2) {

            Alert::success('Login Success');
            return redirect()->intended('profil')->with('success');
        }
        // dd(Auth::user());
    }

    public function password()
    {
        $data['title'] = 'Change Password';
        return view('auth.password', $data);
    }

    public function password_action(Request $request)
    {
        $request->validate([
            'old_password' => 'required|current_password',
            'new_password' => 'required|confirmed',
        ]);
        $user = User::find(Auth::id());
        $user->password = Hash::make($request->new_password);
        $user->save();
        $request->session()->regenerate();
        return back()->with('success', 'Password Berhasil Diubah!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}
