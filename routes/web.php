<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AUTH\AuthController;

use App\Http\Controllers\ADMIN\AdminController;

// use App\Http\Controllers\home\HomeController;
use App\Http\Controllers\VolunteerController;








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

Route::get('/', [VolunteerController::class,'index'])->name('home');
Route::get('/about', [VolunteerController::class,'about'])->name('about');

Route::get('/search', [VolunteerController::class,'search'])->name('search');
Route::get('/cap/{cap}', [VolunteerController::class,'getCap'])->name('getCap');
Route::get('/goal/{goal}', [VolunteerController::class,'getGoal'])->name('getGoal');




// Route::group(['prefix' => ''], function () {
//     Voyager::routes();
// });


Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');
// Route::get('/register', function () {
//     return view('register');
// })->name('register');

Route::post('/login', [AuthController::class,'login'])->name('login.post');
Route::post('/register', [AuthController::class,'register'])->name('register.post');
Route::get('/logout', [AuthController::class,'logout'])->name('logout');

Route::group(['prefix'=>'admin','middleware'=>['auth','is_admin_or_undp']], function(){

    Route::get('/home',[AdminController::class,'index'])->name('admin.home');

    Route::group(['middleware'=>['is_admin']], function(){
        Route::get('/climate-backstop',[AdminController::class,'climateBackstop'])->name('admin.climateBackstop');
    });
    
    
    Route::get('/volunteers',[AdminController::class,'volunteers'])->name('admin.volunteers');

    Route::group(['prefix'=>'cap'], function(){
        Route::get('/',[AdminController::class,'cap'])->name('admin.cap');
        Route::get('/{cap}',[AdminController::class,'capDetails'])->name('admin.cap.details');
        Route::get('/goal/{goal}',[AdminController::class,'goalDetails'])->name('admin.goal.details');
    });

    // comments
   
    Route::get('comments',[AdminController::class,'comments'])->name('admin.comments');

    // logout
    Route::get('/logout',[AdminController::class,'logout'])->name('admin.logout');
   
});
