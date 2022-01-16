<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;

class UserController extends Controller
{
    function login(UserLoginRequest $request){
       
        $credentials = $request->validated();
        

        if( Auth::attempt(['email'=>$request->email, 'password'=>$request->password, 'is_admin'=>0])){
            $request->session()->regenerate();
            return redirect()->route('profile');
        }
   
        return back()->withErrors([
            'invalid' => 'Hibás belépési adatok!',
        ]);
    }

    function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    function profile(){
        $user = User::find(auth()->user()->id);
        if($user->has('employeeidentity') && isset( $user->employeeidentity->id ))
            dd([ 'Alkalmazotti/account adatai' => $user->employeeidentity, 'Foglalkoztató adatai'     =>Company::where('id', $user->employeeidentity->company_id)->first(),
            'Kilépés' => route('logout')]);
        elseif( $user->has('companyidentity') && isset($user->companyidentity->id) ){
            dd([ 'Account adatai' => $user, 
            'Cége adatai'     =>$user->companyidentity,
            'Kilépés' => route('logout')
        ]);
        }

    }
}
