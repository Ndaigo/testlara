<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware('auth:user');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        //$auth = Auth::guard('user');

        return view('user/home');
    }
}
