<?php

use App\Models\Book;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ProfileController;

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
    // $a=123;
    // $b=[1,2,3];
    // $c='你好';
    // $d=['id' =>1 ];

    // $books =Book::get();

    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Router指向test頁面
// 抓TestController內的index公式
Route::get('/test',[TestController::class,'index'])->middleware(['auth', 'verified']);


    // 終止並印出
    // dd($books);

//     return Inertia::render('Auth/Login');
// });


// public function index(){
//     $books =Book::get();

//     $data=[
//         'price' => 1000,
//         'title' =>'我要中樂透',
//     ];

//     return Inertia::render('test',[
//         response => $data,
//     ]);
// }


    


// return Inertia::render('test',[
//     'books' => $books,
//     'price' => 1000,
//     'title' =>'我要中樂透',
// ]);
// });


// 檔案原本ㄉ寫法
    
    // return Inertia::render('Welcome', [
    //     'canLogin' => Route::has('login'),
    //     'canRegister' => Route::has('register'),
    //     'laravelVersion' => Application::VERSION,
    //     'phpVersion' => PHP_VERSION,
    // ]);

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// middleware會進行檢查

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
