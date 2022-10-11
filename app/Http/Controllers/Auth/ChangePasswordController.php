<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:user');
    }


    public function showChangePasswordForm()
    {
        return view('auth/passwords/change');
    }
      
    public function changePassword(ChangePasswordRequest $request)
    {
        $user = Auth::guard('user');
        $user->password =Hash::make($request->get('password'));
        $user->save();

        return redirect()->route('user/mypage')->with('status', __('Your password has been changed.'));
    }
}
