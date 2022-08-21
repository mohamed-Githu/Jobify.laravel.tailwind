<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
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

// get all
Route::get('/', [ListingController::class, 'index']);

// form page to create
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// store the data from the form
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// edit form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// update listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// delete listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

// manage listing
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

Route::get('/listings/{listing}', [ListingController::class, 'show']);

// registration
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

Route::post('/users', [UserController::class, 'store'])->middleware('guest');

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

Route::post('/users/authenicate', [UserController::class, 'authenicate'])->middleware('guest');

// old code

// Route::get('/listings/{id}', function ($id) {
//     $listing = Listing::find($id);

//     if ($listing) {
//         return view('listings', [
//             'listings' => $listing,
//         ]);
//     } else {
//         abort(404);
//     }
// });
