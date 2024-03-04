<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Viewcontroller;
use App\Http\Controllers\Usercontroller;

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

//Route::get('/', function () {
   // return view('welcome');
//});



							//View//
		Route::get('/',[Viewcontroller::class,'halaman_utama']);
		Route::get('/login',[Viewcontroller::class,'login']);
		Route::get('/register',[Viewcontroller::class,'register']);

 					   		//Proses//
		Route::post('/sign_in', [Usercontroller::class, 'login']);
		Route::post('/sign_up',[Usercontroller::class,'register']);


Route::middleware('login')->group(function(){
						//View setelah Login//
		Route::get('/masuk',[Viewcontroller::class,'index_masuk']);
		Route::get('/create',[Viewcontroller::class,'create']);
		Route::get('/fotocreate',[Viewcontroller::class,'foto']);
		Route::get('/album',[Viewcontroller::class,'album']);
		Route::get('/profile',[Viewcontroller::class,'profile']);
		Route::get('/view/{id}',[Usercontroller::class,'detail']);
		Route::get('/viewAlbum/{id}',[Usercontroller::class,'viewalbum']);
		Route::get('/explore',[Viewcontroller::class,'explore']);
		Route::get('/edit',[Viewcontroller::class,'edit']);
		Route::get('/editprofile',[Viewcontroller::class,'editprofile']);
		Route::get('/editalbum/{id}',[Viewcontroller::class,'formeditalbum']);
		Route::get('/ubahfoto/{id}',[Viewcontroller::class,'formedit']);


						//Proses setelah Login//
		Route::get('/logout',[Usercontroller::class,'logout']);
		Route::post('/upload',[Usercontroller::class,'uploadfoto']);
		Route::post('/create_album',[Usercontroller::class,'createalbum']);
		Route::post('/changepassword',[Usercontroller::class,'ubahpassword']);
		Route::post('/profileedit',[Usercontroller::class,'editprofile']);
		Route::post('/addkomentar',[Usercontroller::class,'komen']);
		Route::post('/likefoto',[Usercontroller::class,'like']);
		Route::get('/cari',[Usercontroller::class,'search']);
		Route::get('/hapusfoto/{id}',[Usercontroller::class,'deletfoto']);
		Route::post('/editalbum/{id}',[Usercontroller::class,'updatealbum']);
		Route::get('/hapusalbum/{id}',[Usercontroller::class,'deletalbum']);
});
