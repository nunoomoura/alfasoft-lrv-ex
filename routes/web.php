<?php

use App\Http\Controllers\ContactController;
use App\Models\Contact;
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
    return view('dashboard', ['contacts' =>  Contact::paginate(10)]);
})->name('dashboard');

Route::middleware('auth')->prefix('contacts')->name('contacts.')->group(function () {
    Route::get('/create', [ContactController::class, 'create'])->name('create');
    Route::post('/store', [ContactController::class, 'store'])->name('store');
    Route::get('{contact}', [ContactController::class, 'show'])->name('show');
    Route::put('{contact}/update', [ContactController::class, 'update'])->name('update');
    Route::delete('{contact}/delete', [ContactController::class, 'delete'])->name('delete');
});


require __DIR__.'/auth.php';
