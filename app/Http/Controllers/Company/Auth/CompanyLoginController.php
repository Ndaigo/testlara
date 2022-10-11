<?php

namespace App\Http\Controllers\Company\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CompanyRequest;

class CompanyLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::COMPANY_HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:company')->except('logout');
    }

    protected function guard()
    {
        return Auth::guard('company');
    }

    public function showLoginForm()
    {
        return view('company/login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'companyID' => 'required|string|max:225', 
            'password' => 'required',
        ]);

        $credentials = $request->only(['companyID', 'password']);

        if (Auth::guard('company')->attempt($credentials)) {

            
            return redirect(RouteServiceProvider::COMPANY_HOME); // ログインしたらリダイレクト

        }

        return back()->withInput($request->only('companyID'))
            ->withErrors([
                'companyID' => ['認証情報が記録と一致しません。']
            ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('company')->logout();
        return $this->loggedOut($request);
    }

    public function loggedOut(Request $request)
    {
        return redirect()->route('welcome');
    }
}
