<?php

namespace App\Http\Controllers;

use App\Models\User;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthCOntroller extends Controller
{
    //
    public function register(Request $request)
    {
        $User = new User();
        $User->name = $request->name;
        $User->email = $request->email;
        $User->Usertype = $request->Usertype;
        $User->password = Hash::make($request->password);
        $User->save();
        $User->assignRole($User->Usertype);
    
        return 1;
    }
    public function login(Request $request)
    {

        $credetails = [
            'email' => $request->email,
            'password' => $request->password,
            'Usertype' => $request->Usertype,
        ];
        if (Auth::attempt($credetails)) {
            // return Auth::user();
            return 1;
        } else {
            return "Inavalid Credetails";
        }
    }
    public function Logout()
    {
        Auth::logout();
        return 1;

    }
    public function read(Request $request)
    {
        $user = Auth::user();
        if ($user->hasRole('Admin')) {

            $results = User::all();
            return $results;
        } else {
            return "Aceess Denied";
        }


    }
    public function delete(Request $request)
    {
        if (Auth::user()->hasRole('Admin')) {
            $user = User::where('name', $request->input('name'))->orWhere('email', $request->input('email'))->first();

            if ($user) {

                $user->delete();
                $user->roles()->detach();
                $user->permissions()->detach();
                return 1;


            }
            else 
            {
                return '"Aceess Denied"';
            }
        }
    }
  

}