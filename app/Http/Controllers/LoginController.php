<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    function login(Request $request)
    {
        return view('login');
    }

    function register(Request $request)
    {
        return view('register');
    }

    function userCreate(Request $request)
    {

        User::create($request->only('name','email','password'));
        return redirect('/login');
    }

    function authentication(Request $request)
    {
        $fields = $request->only('email', 'password');
        Auth::attempt($fields);
        return redirect('/');
    }

    function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
