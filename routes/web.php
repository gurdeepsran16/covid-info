<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\frontend\CovidInfoController;


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

Route::get('/', [CovidInfoController::class, 'index'])->name('home');
Route::get('covid/info/india', [CovidInfoController::class, 'getCovidInfoIndia'])->name('covid-info-india');

Route::get('faq', function() {
    return view('frontend.faq.list');
})->name('faq');
