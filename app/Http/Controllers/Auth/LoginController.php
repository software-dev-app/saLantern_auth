<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    //redirects to login page
    function login(){
        return view('auth.login');
    }



    function check(Request $request){
        //validate user requests
        $request->validate([
             'email'=>'required|email',
             'password'=>'required|min:6'
        ]);


        $userInfo = User::where('email','=', $request->email)->first();

        //check user credentials
        if (Auth::attempt($request->only('email', 'password'))){
            //if correct loggs in with session
            $request->session()->put('LoggedUser', $userInfo->id);
            //json success response
            return response()->json(Auth::user(), 200);
        }
        //if incorrect combination of credentials was entered
        throw ValidationException::withMessages([
            'password' =>['The provided credentials is incorect.']
        ]);
    }

    //ends our session loggs us out and redirects to login page
    function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/auth/login');
        }
    }
}
