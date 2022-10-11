<?php

namespace App\Http\Controllers\Book;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\User;

class MyBookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    public function index($userid)
    {
        // DBよりBookテーブルの値を全て取得
        $books = Book::where('user_id', Auth::guard('user')->user()->userID)->get();

        if($userid==Auth::guard('user')->user()->userID){
            // 取得した値をビュー「book/index」に渡す
            return view('mybook/index',compact('books'));
        }
        else{
            return redirect()->route('welcome');
        }
    }

    public function edit($userid,$bookid)
    {

        if($userid==Auth::guard('user')->user()->userID){
            // DBよりURIパラメータと同じIDを持つBookの情報を取得
            //$book = Book::where('bookid', $bookid)->firstOrFail();
            $book = Book::findOrFail($bookid);

            // 取得した値をビュー「book/edit」に渡す
            return view('mybook/edit', compact('book'));
        }
        else{
            return redirect()->route('welcome');
        }
    }

    public function update(BookRequest $request,$userid, $bookid)
    {

        if($userid==Auth::guard('user')->user()->userID){
            //$book = Book::where('bookid', $bookid)->firstOrFail();
            $book = Book::findOrFail($bookid);
            $book->name = $request->name;
            $book->price = $request->price;
            $book->author = $request->author;
            $book->save();
            return redirect()->route('mybook.index', ['user' => Auth::guard('user')->user()->userID]);
        }
        else{
            return redirect()->route('welcome');
        }
    }

    public function destroy($userid,$bookid)
    {

        if($userid==Auth::guard('user')->user()->userID){
            //$book = Book::where('bookid', $bookid)->firstOrFail();
            $book = Book::findOrFail($bookid);
            $book->delete();
            return redirect()->route('mybook.index', ['user' => Auth::guard('user')->user()->userID]);
        }
        else{
            return redirect()->route('welcome');
        }

    }
    
    public function create($userid)
    {

        if($userid==Auth::guard('user')->user()->userID){
            // 空の$bookを渡す
            $book = new Book();
            return view('mybook/create', compact('book'));
        }
        else{
            return redirect()->route('welcome');
        }
    }

    public function store(BookRequest $request,$userid)
    {
        if($userid==Auth::guard('user')->user()->userID){
            $book = new Book();
            $book->name = $request->name;
            $book->price = $request->price;
            $book->author = $request->author;
            $book->user_id = Auth::guard('user')->user()->userID;
            $book->save();
    
            return redirect(route('mybook.index', ['user' => Auth::guard('user')->user()->userID]));
    
        }
        else{
            return redirect()->route('welcome');
        }
    }
}
