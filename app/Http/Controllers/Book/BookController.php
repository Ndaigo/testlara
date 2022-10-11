<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
//use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\User;


class BookController extends Controller
{
    public function index()
    {
        // DBよりBookテーブルの値を全て取得
        $books = Book::all();
        $users = User::all();

        // 取得した値をビュー「book/index」に渡す
        return view('book/index')->with(['books'=>$books,'users'=>$users]);
    }
    
    
    public function show($bookid)
    {   
        $book = Book::findOrFail($bookid);
        //$book = Book::where('bookid', $bookid)->firstOrFail();
        $user = User::findOrFail($book->user_id);
        return view('book/show')->with(['book'=>$book,'user'=>$user]);
    }
}
