<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\HorseController;
use App\Http\Controllers\BidController;
use Illuminate\Support\Facades\Route;

Route::get("/", [HorseController::class, "welcome"])->name("horse.welcome");

Route::get("/horses", [HorseController::class, "list"])->name("horse.list");

Route::get("/horse/{id}", [HorseController::class, "one"])->name("horse.one");

Route::get("/edit-horse/{id}", [HorseController::class, "edit"])->name("horse.edit");
Route::post("/edit-horse/{id}", [HorseController::class, "update"])->name("horse.update");

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('checkAdmin')->group(function () {
    Route::get('/admin/horses', [HorseController::class, 'adminAll'])->name('horse.admin.all');

    Route::get("/admin/add-horse", [HorseController::class, "create"])->name("horse.admin.create");
    Route::post("/admin/add-horse", [HorseController::class, "store"])->name("horse.admin.store");

    Route::get("/admin/bids", [BidController::class, "adminAll"])->name("bid.admin.all");

    Route::get("/admin/add-bid", [BidController::class, "createAdmin"])->name("bid.admin.create");
    Route::post("/admin/add-bid", [BidController::class, "storeAdmin"])->name("bid.admin.store");

    Route::get("/admin/delete-horse/{id}", [HorseController::class, "delete"])->name("horse.admin.delete");
});

Route::middleware('checkAuthUser')->group(function () {
    Route::get("/place-bid/{id}", [BidController::class, "create"])->name("bid.create");
    Route::post("/place-bid/{id}", [BidController::class, "store"])->name("bid.store");
});

require __DIR__ . '/auth.php';
