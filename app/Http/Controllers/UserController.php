<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;

use Session;

use Hash;

class UserController extends Controller
{
    public function getIndex()
    {
    	return view('Auth.signin');
    }

    public function signin(Request $request)
    {
    	if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']]))
    	{
    		return redirect()->action('PageController@getIndex');
    	}
    	return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->action('PageController@getIndex'); 
    }

    public function getChangePassword()
    {
        return view ('Auth.changePassword');
    }

    public function changePassword(Request $request)
    {
        $user = Auth::user();

        if ($request['newPass'] != $request['confPass'])
        {
            Session::flash('error', 'Passwords dont match');
            return redirect()->back();
        }

        $user->password = Hash::make($request['newPass']);
        $user->save();
        return redirect('/');
    }
}
