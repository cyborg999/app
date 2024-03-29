<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProfileController;
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

Route::get('/user/profile', function () {
    $url = route('profile');  
    return 'The URL is ' . $url;
})->name('profile');


Route::get("/", [UserController::class, "index"]);
Route::get("register", [UserController::class, "register"]);
Route::get("login", [UserController::class, "login"])->name("login");
Route::post("login", [UserController::class, "authenticate"]);
Route::post("register", [UserController::class, "signup"]);
// Route::get("dashboard", [UserController::class, "dashboard"])->middleware("auth");
Route::get("logout",[UserController::class, "logout"]);
Route::post("product/add", [ProductController::class, "add"])->middleware("auth");
Route::get("products/add", [ProductController::class, "show"])->middleware("auth");
Route::get("product/edit", [ProductController::class, "edit"])->middleware("auth");
Route::get("products", [ProductController::class, "all"])->middleware("auth");
Route::get("inventory", [InventoryController::class, "index"])->middleware("auth");
Route::post("inventory/add", [InventoryController::class, "add"])->middleware("auth");
Route::post("pos/search", [PosController::class, "search"])->middleware("auth");
Route::post("pos/scan", [PosController::class, "scan"])->middleware("auth");
Route::get("pos", [PosController::class, "index"])->middleware("auth");
Route::post("pos/getById", [PosController::class, "getById"])->middleware("auth");
Route::post("pos/print", [PosController::class, "print"])->middleware("auth");
Route::get("profile", [ProfileController::class, "index"])->middleware("auth");
Route::post("profile/update", [ProfileController::class, "update"])->middleware("auth");

Route::controller(ImageController::class)->group(function(){
    Route::get('image-upload', 'index');
    Route::post('image-upload', 'store')->name('image.store');
});

Route::get('/test-connection', function () {
    try {
        DB::connection()->getPdo();
        return "Database connection established successfully!";
    } catch (Exception $e) {
        return "Unable to connect to the database. Error: " . $e->getMessage();
    }
});

Route::middleware(['role:admin', "auth"])->group(function () {
    Route::get("dashboard", [UserController::class, "dashboard"]);
    Route::get("/users", [UserController::class, "users"]);
    Route::get("/users/add", [UserController::class, "add"]);
    Route::post("/user/update", [UserController::class, "update"]);
    Route::get("products", [ProductController::class, "all"]);
});

// Route::middleware(['role:user', "auth"])->group(function () {
// });