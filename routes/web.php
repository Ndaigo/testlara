<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Book\BookController;
use App\Http\Controllers\Book\MyBookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Company\CompanyhomeController;
use App\Http\Controllers\Company\Auth\CompanyRegisterController;
use App\Http\Controllers\Company\Auth\CompanyLoginController;
use App\Http\Controllers\Magazine\MagazineController;
use App\Http\Controllers\Magazine\MyMagazineController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('book', [BookController::class,'index'])->name('book.index');

Route::get('book/{book}', [BookController::class,'show']);

Route::group(['prefix' => 'user/{user}/book', 'as' => 'mybook.'], function() {

    Route::get('/', [MyBookController::class,'index'])->name('index');

    Route::get('{book}/edit', [MyBookController::class,'edit'])->name('edit');
    
    Route::put('{book}', [MyBookController::class,'update']);
    
    Route::delete('{book}', [MyBookController::class,'destroy']);
    
    Route::get('create', [MyBookController::class,'create'])->name('create');
    
    Route::post('/', [MyBookController::class,'store']);
});


Route::get('magazine', [MagazineController::class,'index'])->name('magazine.index');

Route::get('magazine/{magazine}', [MagazineController::class,'show']);

Route::group(['prefix' => 'company/{company}/magazine', 'as' => 'mymagazine.'], function() {

    Route::get('/', [MyMagazineController::class,'index'])->name('index');

    Route::get('{magazine}/edit', [MyMagazineController::class,'edit'])->name('edit');
    
    Route::put('{magazine}', [MyMagazineController::class,'update']);
    
    Route::delete('{magazine}', [MyMagazineController::class,'destroy']);
    
    Route::get('create', [MyMagazineController::class,'create'])->name('create');
    
    Route::post('/', [MyMagazineController::class,'store']);
});


/*
Route::get('/home', function () {
    return view('home');
});*/

Route::get('/password/change', [ChangePasswordController::class,'showChangePasswordForm'])->name('password.form');
Route::post('/password/change', [ChangePasswordController::class,'ChangePassword'])->name('password.change');


Route::group(['prefix' => 'company', 'as' => 'company.'],function(){

    //ログイン認証
    Auth::routes([
        'register' => true,
        'reset' => false,
        'verify' => false,
    ]);

    Route::get('/register', [CompanyRegisterController::class,'showRegistrationForm'])->name('register');
    Route::post('/register', [CompanyRegisterController::class,'create'])->name('register');
    Route::get('/login', [CompanyLoginController::class,'showLoginForm'])->name('login');
    Route::post('/login', [CompanyLoginController::class,'login'])->name('login');
    Route::post('/logout', [CompanyLoginController::class,'logout'])->name('logout');


    //ログイン認証後
    Route::middleware('auth:company')->group(function(){

        //TOPページ表示
        Route::get('home',[CompanyhomeController::class,'index'])->name("home");

    });
});

Auth::routes();
Route::group(['prefix' => 'user','as' => 'user.'],function(){

    //ログイン認証
    //Auth::routes(); 

    //ログイン認証後
    Route::middleware('auth:user')->group(function(){

        //TOPページ表示
        Route::get('home', [App\Http\Controllers\User\HomeController::class, 'index'])->name('home');
        

        Route::get('{user}', [App\Http\Controllers\User\MypageController::class,'index'])->name('mypage');

        Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');
    });
});
