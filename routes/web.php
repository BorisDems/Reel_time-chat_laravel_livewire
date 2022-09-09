<?php

use App\Http\Livewire\AdminDashboard;
use App\Http\Livewire\AllUser;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ConversationCreate;
use App\Http\Livewire\MainApp;

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
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';


Route::middleware('auth')->group(function () {

    Route::get('/friends', ConversationCreate::class)->name('friends');
    Route::get('/users', AllUser::class)->name('users'); //
    Route::get('/chatspace', MainApp::class)->name('chatspace');
    Route::get('/manager', AdminDashboard::class)->name('adminspace');
});
