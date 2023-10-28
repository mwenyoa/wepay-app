<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WePayController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\LogViewerController;
use App\Http\Controllers\CardHolderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// VIEW ROUTES
Route::get('/', function () {
    return view('welcome');
});

Route::get('/onboarding', function () {
    return view('onboarding');
});


Route::get('/m', function () {
    return view('m');
});

// Checkout
  Route::get('/checkout', function(){
    return view('checkout');
  });


Route::get('/banking', function () {
    return view('banking');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/create-legal-entity', function () {
    return view('createLegalEntity');
});

Route::post('/create-legal-entity', [WePayController::class, 'createLegalEntity'])->name('legal-entity.store');

// Merchant routes
Route::get('new-merchant', function () {
    return view('merchant');
});

Route::post('create-merchant', [MerchantController::class, 'createMerchant'])->name('create-merchant.store');





Route::get('/cardholder/registration', function () {
    return view('cardholder.registration');
});

Route::post('/cardholder/create', [CardHolderController::class, 'create'])->name('cardholder.create');

Route::post('/cardholder/{cardHolderId}/create-card', [CardHolderController::class, 'createCard'])->name('cardholder.createCard');


// Display the registration form
Route::get('/cardholder/registration', function () {
    return view('cardholder.registration');
})->name('cardholder.registration');

// Handle card holder creation
Route::post('/cardholder/create', [CardHolderController::class, 'create'])->name('cardholder.create');

// Handle card creation
Route::post('/card/create/{id}', [CardHolderController::class, 'createCard'])->name('card.create');



