<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function loginPage()
    {
        return view('pages.login-register.loginPage');
    }
    public function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:5'
            ]
        );
        // dd($request->all());
        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
            $user = Auth::user();
            return redirect('/main');
        }else{
            return redirect('/login');
        }
    }
    public function registerPage()
    {
        return view('pages.login-register.registerPage');
    }
    public function register(Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'required|max:255',
                'email' => 'required|unique:users,email',
                'password' => 'required|min:5'
            ]
        );
        $user = User::create($data);

        Auth::login($user);
        return redirect('/main');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
