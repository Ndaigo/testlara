<?php

namespace App\Http\Controllers\Magazine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Magazine;
use App\Models\Company;

class MagazineController extends Controller
{
    public function index()
    {
        // DBよりmagazineテーブルの値を全て取得
        $magazines = Magazine::all();
        $companies = Company::all();

        // 取得した値をビュー「magazine/index」に渡す
        return view('magazine/index')->with(['magazines'=>$magazines,'companies'=>$companies]);
    }
    
    
    public function show($magazineid)
    {   
        $magazine = Magazine::findOrFail($magazineid);
        $company = Company::findOrFail($magazine->company_id);
        return view('magazine/show')->with(['magazine'=>$magazine,'company'=>$company]);
    }
}
