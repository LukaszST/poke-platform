<?php

use App\Http\Controllers\GetAllCardsFromAllSetsForPokemon;
use App\Http\Controllers\MyCollections;
use App\Http\Controllers\PokemonSetController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TradeCard;
use App\Livewire\AddCardToCollection;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('homepage');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/set/{name}', [PokemonSetController::class, 'getSet']);
Route::get('/sets', [PokemonSetController::class, 'setList']);

Route::get('/my-collections', [MyCollections::class, 'getMyCardCollection'])
    ->middleware(['auth', 'verified']);

Route::get('/prices/{name}', [PriceController::class, 'showPriceForCard']);

Route::get('/card/{pokemonName}', [GetAllCardsFromAllSetsForPokemon::class, 'getAllCardsForPokemon'])->name('card.search');

Route::get('/trade', [TradeCard::class, 'listCardsOpenForTrade'])->name('trade');
Route::get('/trade/new', [TradeCard::class, 'addTOpenTrade']);
Route::get('/trade/bid/{id}', [TradeCard::class, 'bidTrade']);
Route::get('/trade/{id}', [TradeCard::class, 'listBidsForTrade']);

require __DIR__.'/auth.php';
