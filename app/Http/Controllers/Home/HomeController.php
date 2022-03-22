<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{

    //Upon successfull login user is redirected to profile page
    function profile(Request $request){

        //authenticated user with session opened
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];

        //calculates and displays authenticates users age base on date of birth with
        $birth = Auth::user()->date_of_birth;
        $age = Carbon::parse($birth)->diff(Carbon::now())->format("Your are %y years, %m months, %d days, %m minutes and %s seconds old");
        return view('dashboard.profile', compact('age'));
    }


    public function update_profile(Request $request){
        //validate user inputs
        $this->validate($request,[
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,'.auth()->user()->id,
            'date_of_birth' => 'required|date'
        ]);

        //updates user profile
        $user = User::find(auth()->user()->id);
        $user->first_name  = $request->first_name ;
        $user->last_name  = $request->last_name ;
        $user->email = $request->email;
        $user->date_of_birth = $request->date_of_birth;
        $user->save();

    }

    public function update_pass(Request $request){

        //vaildate user password inputs
        $this->validate($request,[
            'password' => 'required|min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required|min:6'
        ]);

        //updates users password
        $user = User::find(auth()->user()->id);
        $user->password = Hash::make($request->password);
        $user->save();
    }

}
