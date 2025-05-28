<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\HorseController;
use App\Http\Controllers\BidController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get("/", [HorseController::class, "welcome"])->name("horse.welcome");

Route::get("/horses", [HorseController::class, "list"])->name("horse.list");

Route::get("/horse/{id}", [HorseController::class, "one"])->name("horse.one");

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/dashboard', [BidController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

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

    Route::get("/admin/edit-horse/{id}", [HorseController::class, "edit"])->name("horse.admin.edit");
    Route::post("/admin/edit-horse/{id}", [HorseController::class, "update"])->name("horse.admin.update");

    Route::get("/admin/edit-bid/{id}", [BidController::class, "edit"])->name("bid.admin.edit");
    Route::post("/admin/edit-bid/{id}", [BidController::class, "update"])->name("bid.admin.update");

    Route::get("/admin/delete-bid/{id}", [BidController::class, "delete"])->name("bid.admin.delete");

    Route::get('/admin/users', [UserController::class, 'adminAll'])->name('user.admin.all');

    Route::get("/admin/add-user", [UserController::class, "createAdmin"])->name("user.admin.create");
    Route::post("/admin/add-user", [UserController::class, "storeAdmin"])->name("user.admin.store");

    Route::get("/admin/delete-user/{id}", [UserController::class, "delete"])->name("user.admin.delete");

    Route::get("/admin/edit-user/{id}", [UserController::class, "edit"])->name("user.admin.edit");
    Route::post("/admin/edit-user/{id}", [UserController::class, "update"])->name("user.admin.update");
});

Route::middleware('checkAuthUser')->group(function () {
    Route::get("/place-bid/{id}", [BidController::class, "create"])->name("bid.create");
    Route::post("/place-bid/{id}", [BidController::class, "store"])->name("bid.store");
});

require __DIR__ . '/auth.php';
