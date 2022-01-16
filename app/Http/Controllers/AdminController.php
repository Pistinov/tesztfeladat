<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function login(LoginRequest $request){
       
        $credentials = $request->validated();
        
        if( Auth::attempt([ 'email'=>$request->email, 'password'=>$request->password, 'is_admin'=>1])){
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }
   
        return back()->withErrors([
            'invalid' => 'Hibás belépési adatok!',
        ]);
    }

    function logout(){
        Auth::logout();
        return redirect()->route('admin-login');
    }

}
