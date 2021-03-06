<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
    	return view('auth.login');
    }

    public function postlogin(Request $request)
    {
    	if(Auth::attempt($request->only('email', 'password'))){
    		return redirect('/');
    	}

    	return redirect('/login')->with('gagal', 'Email atau Password salah!');
    }

    public function logout()
    {
    	Auth::logout();

    	return redirect('/');
    }

    public function register()
    {
    	return view('auth.register');
    }

    public function postregister(Request $request)
    {
    	// dd($request->all());
        $validatedData = Validator::make($request->all(), [
	        'email' => 'unique:users|max:255',
	    ]);

        $validatedPass = Validator::make($request->all(), [
            'password' => 'min:8',
        ]);

	    if ($validatedData->fails()) {
	        return redirect('/register')->with('gagal', 'Email sudah terdaftar!');
	    } else if($validatedPass->fails()){
            return redirect('/register')->with('gagal', 'Password kurang dari 8 karakter!');
        } else{
	    	$user = User::create($request->all());
	    	$user->password = bcrypt($request->password);
	    	$user->role = "user";
	    	$user->remember_token = $request->_token;
	    	$user->save();

	    	return redirect('/login')->with('sukses', 'Register Berhasil! Silakan Login!');
	    }
    }
}
