<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Inertia\Inertia;
use Illuminate\Http\Request;

class TestController extends Controller
{
   public function index(){
    $books =Book::get();

    $data=[
        'books'=>$books,
        'price' => 1000,
        'title' =>'我要中樂透',
        'collect'=>2,
    ];

    // 'test'是vue頁面名稱
    return Inertia::render('test',[
        'response' => $data,
    ]);
}
}
