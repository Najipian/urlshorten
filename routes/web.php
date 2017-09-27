<?php
use App\Link;
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
});

Route::get('/{hash}',function($hash) {
    //First we check if the hash is from a URL from our database

    $link = Link::where('hash','=',$hash)->first();
    //If found, we redirect to the URL
    if($link) {
        return Redirect::to($link->url);
        //If not found, we redirect to index page with error message
    } else {
        //return Redirect::to('/')->with('message','Invalid Link');
        return view('notfound');
    }
});
