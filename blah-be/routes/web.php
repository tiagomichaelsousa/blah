<?php

use App\Events\BroadcastEvent;
use App\Models\User;
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
    return ['Laravel' => app()->version()];
});

Route::get('/broadcast', function () {
    $user = User::first();
    BroadcastEvent::dispatch($user);
    
    return ['Laravel' => app()->version()];
});

require __DIR__.'/auth.php';
