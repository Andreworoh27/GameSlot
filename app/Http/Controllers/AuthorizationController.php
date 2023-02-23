<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;

class AuthorizationController extends Controller
{
    //
    public function signUp(Request $request)
    {

        $this->validate($request, [
            "name" => "required",
            "email" => "required|unique:users,email",
            "password" => "required",
            "gender" => "required",
            "dob" => "required"
        ]);

        $diff = abs(strtotime(now()) - strtotime($request->dob));
        $yearsdiff = floor($diff / (365 * 60 * 60 * 24));

        if ($yearsdiff < 13) {
            return redirect()->back()->withErrors(new MessageBag(['Must be more than 13 years old']));
        }

        $name = $request->name;
        $password = $request->password;
        $gender = $request->gender;
        $email = $request->email;
        $dob = $request->dob;
        DB::table('users')->insert([
            'name' => $name,
            'password' => bcrypt($password),
            'gender' => $gender,
            'email' => $email,
            'dob' => $dob,
            'email_verified_at' => now(),
            'created_at' => now(),
            'role' => 'Member'
        ]);
        return redirect('signIn');
    }

    public function signIn(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($credentials, $request->remember_me)) {
            return redirect('/game');
        }
        return back()->withErrors([
            'your email or password is incorrect'
        ]);
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
