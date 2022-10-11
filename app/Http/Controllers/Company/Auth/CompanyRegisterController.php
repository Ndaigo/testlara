<?php

namespace App\Http\Controllers\Company\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\data;
use App\Models\Company;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\CompanyRequest;
use Illuminate\Support\Facades\Auth;

class CompanyRegisterController extends Controller
{
    //protected $company_redirectTo = '/company/companyhome';

    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::COMPANY_HOME;

    public function __construct(){
        $this->middleware('guest:company');
    }

    protected function guard()
    {
        return Auth::guard('company');
    }

    public function showRegistrationForm()
    {
        return view('company/register');
    }

    /**
     * Get a validator for an incoming registration data.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    //protected function validator(array $data)
    //{
    //    return Validator::make($data, [
    //        'companyID' => ['required', 'string', 'max:255','unique:companies'],
    //        'email' => ['required', 'string', 'email', 'max:255', 'unique:companies'],
    //        'password' => ['required', 'string', 'min:5', 'confirmed'],
    //        'companyname' => ['nullable','string','max:50'],
    //    ]);
    //}

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Company
     */
    protected function create(CompanyRequest $data)
    {
        //return Company::create([
        //    'companyID' => $data['companyID'],
        //    'email' => $data['email'],
        //    'password' => Hash::make($data['password']),
        //    'companyname' => $data['companyname'],
        //]);

        $company = new Company();
        $company->companyID = $data->companyID;
        $company->email = $data->email;
        $company->password = Hash::make($data->password);
        $company->companyname = $data->companyname;
        $company->save();

        $this->guard()->login($company);

        return redirect(RouteServiceProvider::COMPANY_HOME);
    }
}
