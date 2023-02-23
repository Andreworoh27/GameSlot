<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function updateProfile(Request $request)
    {
        $validation = null;
        if ($request->email == Auth::getUser()->email) {
            $validation = Validator::make($request->all(), [
                'name' => 'required',
                'userpic' => 'image',
            ]);
        } else {
            $validation = Validator::make($request->all(), [
                'name' => 'required',
                'userpic' => 'image',
                'email' => 'required|email|unique:users,email',
            ]);
        }
        if ($validation->fails()) {
            return back()->withErrors($validation);
        }

        $Photo = $request->file('userpic');
        $user = User::find(auth()->user()->id);

        if ($Photo != null) {
            if (Storage::exists('public/Profile Image/' . $user->image)) {
                Storage::delete('public/Profile Image/' . $user->image);
            }
            $Photo = $request->getClientOriginalName();
            Storage::putFileAs('/public/Profile Image', $Photo, $Photo->getClientOriginalName());
            $user->image = $Photo;
        }

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        return redirect('/');
    }
    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'newpassword' => 'required|same:password_confirmation',
            'password_confirmation' => 'required',
        ]);
    }
}
