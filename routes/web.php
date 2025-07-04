<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PaymentDetailsController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\OrderShippingController;
use App\Http\Controllers\PharmaciesController;

Route::get('/', function () {
    return redirect()->route('auth.login');
});
Route::get('/login', [ClientController::class, 'showLoginForm'])->name('auth.login');
Route::post('/login', [ClientController::class, 'login'])->name('auth.login.submit');
Route::get('/signup', [ClientController::class, 'showSignupForm'])->name('auth.signup');
Route::post('/signup', [ClientController::class, 'signup'])->name('auth.signup.submit');
Route::post('/logout', [ClientController::class, 'logout'])->name('auth.logout');


Route::get('/admin', function () {
    return view('Admin.adminPage');
})->name("adminDashboard");

Route::get('/admin/medicine/create', function () {
    return view('Admin.createMedicine');
})->name("adminMedicine");

Route::get('/admin/viewEmployees', function () {
    return view('Admin.viewEmployees');
})->name('adminEmployees');


// Client Routes
Route::get('admin/client/create', function () {
    return view('Admin.viewClient');
})->name('clientPage');
Route::get('/admin/clientPage', [ClientController::class, 'fetchAllClients'])->name('adminClient');
Route::get('/clients', [ClientController::class, 'index'])->name('clientPage');
Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
Route::put('/clients/{client}', [ClientController::class, 'update'])->name('clients.update');
Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');

// // Admin Routes`
Route::get('/admin/employee/create', [EmployeeController::class, 'index'])->name('adminEmployee');
Route::get('/admin/clients/create', [ClientController::class, 'create'])->name('clients.create');
Route::get('/orders/search', [OrderController::class, 'filterAndSearch'])->name('orders.search');
Route::get('/admin/orders', [OrderController::class, 'index'])->name('adminOrders');
Route::get('/admin/viewShipping', [ShippingController::class, 'index'])->name('adminShipping');
Route::get('/admin/shipping/create', [ShippingController::class, 'create'])->name('shipping.create');
Route::post('/admin/shipping', [ShippingController::class, 'store'])->name('shipping.store');
Route::get('/admin/order-shipping', [ShippingController::class, 'index'])->name('orderShipping.index');
Route::get('/admin/viewEmployees', [EmployeeController::class, 'index'])->name('adminEmployees');
Route::get('/admin/viewMedicines', [MedicineController::class, 'index'])->name('admin.medicines');


// // Send the Form of New Medecine to DataBase
// Route::post('/admin/medicine/store', [MedicineController::class, 'store'])->name('medicines.store');
// Route::get('/admin/medicine/create', [MedicineController::class, 'create'])->name('medicines.create');
Route::post('/medicine/store', [MedicineController::class, 'store'])->name('medicines.store');
Route::post('/medicines', [MedicineController::class, 'store'])->name('medicines.store');
Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
// Route::get('/admin/shipping', [ShippingController::class, 'index'])->name('shipping.index');
// Route::get('/admin/medicines', [OrderController::class, 'index'])->name('adminMedicines');
// Route::get('/admin/medicines', [MedicineController::class, 'index'])->name('adminMedicines');

Route::prefix('admin')->group(function () {
    Route::get('/medicines', [MedicineController::class, 'index'])->name('medicines.index'); // عرض جميع الأدوية
    Route::get('/medicines/{id}/edit', [MedicineController::class, 'edit'])->name('medicines.edit'); // تعديل
    Route::put('/medicines/{id}', [MedicineController::class, 'update'])->name('medicines.update'); // تحديث
    Route::delete('/medicines/{id}', [MedicineController::class, 'destroy'])->name('medicines.destroy'); // حذف
});
//admin_order_routing
Route::get("/admin/orderPage", [OrderController::class, "show"])->name("adminOrder");
Route::post(
    "storeOrder",
    [OrderController::class, 'store']
)->name("store-Order");
Route::delete(
    'deleteOrder/{id}',
    [OrderController::class, 'destroy']
)->name('delete-Order');
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

Route::get('/admin/shipping', function () {
    return view('shipping.createShipping');
})->name('shippingPage');



//employee_routing
Route::get('/admin/viewEmployees', [EmployeeController::class, 'index'])->name('adminEmployees');
Route::get('/employees/search', [EmployeeController::class, 'search'])->name('employees.search');
Route::resource('employees', EmployeeController::class);


//payment_routing
Route::get('/payment-details', [PaymentDetailsController::class, 'index'])->name('payment-details.index');
Route::get('/payment-details/create', [PaymentDetailsController::class, 'create'])->name('payment-details.create');
Route::post('/payment-details', [PaymentDetailsController::class, 'store'])->name('payment-details.store');
Route::get('/payment-details/{id}', [PaymentDetailsController::class, 'show'])->name('payment-details.show');
Route::get('/payment-details/{id}/edit', [PaymentDetailsController::class, 'edit'])->name('payment-details.edit');
Route::put('/payment-details/{id}', [PaymentDetailsController::class, 'update'])->name('payment-details.update');
Route::delete('/payment-details/{id}', [PaymentDetailsController::class, 'destroy'])->name('payment-details.destroy');



// //shipping_routing

Route::get('/shippings/{id}/edit', [ShippingController::class, 'edit'])->name('shippings.edit');
Route::delete('/shippings/{id}', [ShippingController::class, 'destroy'])->name('shippings.destroy');
Route::put('/shippings/{id}', [ShippingController::class, 'update'])->name('shippings.update');


// Employee CRUD
Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
Route::put('/employees/{id}', [EmployeeController::class, 'update'])->name('employees.update');



// Medicine CRUD
Route::get('/medicines', [MedicineController::class, 'index'])->name('medicines.index');
Route::get('/medicines/{id}/edit', [MedicineController::class, 'edit'])->name('medicines.edit');
Route::delete('/medicines/{id}', [MedicineController::class, 'destroy'])->name('medicines.destroy');


Route::get('/admin/medicines/create', [MedicineController::class, 'create'])->name('medicines.create');
// Route::post('/admin/medicines', [MedicineController::class, 'store'])->name('medicines.store');

// Admin Routes for Employee CRUD
Route::get('/admin/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
Route::post('/admin/employees/store', [EmployeeController::class, 'store'])->name('employees.store');



//SET UP ROUTES
Route::get('/admin/medicines/create', [MedicineController::class, 'create'])->name('medicines.create');
Route::post('/admin/medicines/store', [MedicineController::class, 'store'])->name('medicines.store');
Route::get('/admin/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
Route::post('/admin/employees/store', [EmployeeController::class, 'store'])->name('employees.store');


// Show the create medicine form
Route::get('/medicines/create', [MedicineController::class, 'create'])->name('medicines.create');

// Handle the form submission
Route::post('/medicines', [MedicineController::class, 'store'])->name('medicines.store');


// Route to show the form to add a new medicine
Route::get('/medicines/create', [MedicineController::class, 'create'])->name('medicines.create');

// Route to handle the form submission and store the new medicine
Route::post('/medicines', [MedicineController::class, 'store'])->name('medicines.store');




//Employee Side
Route::get('/login/employee', [EmployeeController::class, 'showLoginForm'])->name('auth_login_emp');
Route::post('/login/employees', [EmployeeController::class, 'login'])->name('auth_login_submit_emp');
Route::get('/employeeSide', [EmployeeController::class, 'fetchAllMedicines'])->name('EmployeePage');
Route::get('/employeeSide/search', [EmployeeController::class, 'searchMedicines'])->name('employee.medicines.search');
Route::delete('/employee/medicines/{id}', [EmployeeController::class, 'destroyMedicine'])
    ->name('EmployeeDeleteMedicine');
//Client Side
Route::get('/clientSide', [MedicineController::class, 'fetchMedicines'])->name('clientPage');
Route::get('/clientSide/medicines', [MedicineController::class, 'fetchAllMedicines'])->name('MedicinesList');
Route::post('/cart/add/{medicine}', [ClientController::class, 'add'])->name('cart.add');
Route::get('/medicines/{medicine}', [ClientController::class, 'show'])->name('medicines.show');
// Cart Routes
Route::get('/cart', [OrderController::class, 'cart'])->name('cart.index');
Route::post('/cart/add/{id}', [OrderController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update', [OrderController::class, 'updateCart'])->name('cart.update');
Route::get('/cart/remove/{id}', [OrderController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::get('/my-orders', [OrderController::class, 'myOrders'])->name('orders.my');
//Pharmacies Routes
Route::get('/pharmacies', [PharmaciesController::class, 'index'])->name('pharmacies');
Route::get('/pharmacies/{pharmacy}', [PharmaciesController::class, 'show'])->name('pharmacies.show');
