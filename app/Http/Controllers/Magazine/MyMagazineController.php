<?php

namespace App\Http\Controllers\Magazine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MagazineRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Magazine;
use App\Models\Company;

class MyMagazineController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:company');
    }

    public function index($companyid)
    {
        // DBよりmagazineテーブルの値を全て取得
        $magazines = Magazine::where('company_id', Auth::guard('company')->user()->companyID)->get();

        if($companyid==Auth::guard('company')->user()->companyID){
            // 取得した値をビュー「magazine/index」に渡す
            return view('mymagazine/index',compact('magazines'));
        }
        else{
            return redirect()->route('welcome');
        }
    }

    public function edit($companyid,$magazineid)
    {

        if($companyid==Auth::guard('company')->user()->companyID){
            // DBよりURIパラメータと同じIDを持つmagazineの情報を取得
            $magazine = Magazine::findOrFail($magazineid);

            // 取得した値をビュー「magazine/edit」に渡す
            return view('mymagazine/edit', compact('magazine'));
        }
        else{
            return redirect()->route('welcome');
        }
    }

    public function update(MagazineRequest $request,$companyid, $magazineid)
    {

        if($companyid==Auth::guard('company')->user()->companyID){
            $magazine = Magazine::findOrFail($magazineid);
            $magazine->name = $request->name;
            $magazine->price = $request->price;
            $magazine->publisher = $request->publisher;
            $magazine->save();
            return redirect()->route('mymagazine.index', ['company' => Auth::guard('company')->user()->companyID]);
        }
        else{
            return redirect()->route('welcome');
        }
    }

    public function destroy($companyid,$magazineid)
    {

        if($companyid==Auth::guard('company')->user()->companyID){
            //$magazine = magazine::where('magazineid', $magazineid)->firstOrFail();
            $magazine = magazine::findOrFail($magazineid);
            $magazine->delete();
            return redirect()->route('mymagazine.index', ['company' => Auth::guard('company')->user()->companyID]);
        }
        else{
            return redirect()->route('welcome');
        }

    }
    
    public function create($companyid)
    {

        if($companyid==Auth::guard('company')->user()->companyID){
            // 空の$magazineを渡す
            $magazine = new magazine();
            return view('mymagazine/create', compact('magazine'));
        }
        else{
            return redirect()->route('welcome');
        }
    }

    public function store(MagazineRequest $request,$companyid)
    {
        if($companyid==Auth::guard('company')->user()->companyID){
            $magazine = new magazine();
            $magazine->name = $request->name;
            $magazine->price = $request->price;
            $magazine->publisher = $request->publisher;
            $magazine->company_id = Auth::guard('company')->user()->companyID;
            $magazine->save();
    
            return redirect(route('mymagazine.index', ['company' => Auth::guard('company')->user()->companyID]));
    
        }
        else{
            return redirect()->route('welcome');
        }
    }
}
