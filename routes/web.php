<?php

use App\Http\Controllers\PhoneController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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
    return view('home.admin ');
});

Route::get('/dashboard', function () {
    return view('home.dashboard');
});

Route::get('/users', function (){

    $users = DB::table('users')->get();//lay toan bo dữ liệu từ bảng user, nhớ bổ sung namespace cho DB,
    //tạm thời chưa học nên lấy dữ liệu tại file web.php nhưng sau này viết tại controller
    //var_dump($users);
    return view('user.userlist',  ['users' => $users]);
});

Route::resource('users', UserController::class);
Route::resource('profiles', ProfileController::class);

Route::resource('phones',PhoneController::class);

Route::get('/profiles/{id}/create',[ProfileController::class, 'createprofile']) -> name('create-profile');

Route::resource('providers',ProviderController::class);
Route::resource('orders',OrderController::class);


