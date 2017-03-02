<?php

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

//ルーティング
Route::get('/', function () {
    return view('/signin');
})->middleware("count");

Route::group(['middleware' => ['google']], function () {
    Route::get('/start',AttendanceController::class.'@start')->middleware("count");
    Route::get('/count',AttendanceController::class.'@count')->middleware("start");
    Route::get('/end',AttendanceController::class.'@end')->middleware("start","count");
});

//ロジック
Route::get('/starttime',AttendanceController::class.'@startTime');
Route::get('/counttime',AttendanceController::class.'@countTime');
Route::post('/endtime',AttendanceController::class."@endTime");

//socialite (google)
Route::get('auth/google', GoogleAuthController::class.'@redirectToProvider');
Route::get('auth/google/callback',GoogleAuthController::class.'@handleProviderCallback');
