<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [ClientController::class, 'showLoginForm'])->name('auth.login');
Route::post('/login', [ClientController::class, 'login'])->name('auth.login.submit');
Route::get('/signup', [ClientController::class, 'showSignupForm'])->name('auth.signup');
Route::post('/signup', [ClientController::class, 'signup'])->name('auth.signup.submit');



//admin
Route::get('/admin', function () {
    return view('/Admin/adminPage');
})->name("adminDashboard");
Route::get('/admin/employee/create', function () {
    return view('/Admin/createEmployee');
})->name("adminEmployee");
Route::get('/admin/medicine/create', function () {
    return view('/Admin/createMedicine');
})->name("adminMedicine");
Route::get('/admin/clientPage', function () {
    return view('/Admin/viewClient');
})->name("adminClient");




//admin_order_routing
Route::get("/admin/orderPage", [OrderController::class, "show"])->name("adminOrder");
Route::post(
    "storeOrder",
    [OrderController::class, 'store']
)->name("store-Order");

Route::delete('deleteOrder/{id}', [OrderController::class, 'destroy'])->name('delete-Order');

Route::get(
    "editOrder/{id}",
    [OrderController::class, 'edit']
)
    ->name("edit-Order");

Route::put(
    "updateOrder/{id}",
    [OrderController::class, 'update']
)
    ->name("update-Order");
Route::get('/admin/orderPage', [OrderController::class, 'filterAndSearch'])->name('adminOrder');
