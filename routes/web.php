<?php

use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Collection;
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
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', ]
], function () {




Route::get('/', function () {
    return view('welcome');
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/welcome/{locale}/{username}', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');

Route::get('/profile/{locale}/{username}', [App\Http\Controllers\WelcomeController::class, 'profile'])->name('profile');


Route::get('/user_group', function () {

    return strtoupper(substr("add",0,1));

    if(check_right('endorsements','A'))
    {
        return 'yes';
    }
else{
    return 'no';
}



});





Route::get('/group_right', function () {
    $group = '1';
    $group = \App\Models\Group::findorfail(1);


    foreach ($group->rights as $right) {
        echo $right->TableName . '<br>';


    }
});


Route::get('/right_group', function () {
    $right = 'branches';
    $right = \App\Models\Right::where('TableName ','branches')->get();


    foreach ($right->groups as $right) {
        echo $right->TableName . '<br>';


    }
});



});