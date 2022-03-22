<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    //redirects to register page
    function register(){
        return view('auth.register');
    }



    function save(Request $request){
        //validate all input fields
        $request->validate([
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'date_of_birth' => 'required|date',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required|min:6'
        ]);

        //creates new user inserts into our database
        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->first_name,
            'date_of_birth' =>Carbon::parse($request->date_of_birth),
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
    }
}
