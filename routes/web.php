<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomeController::class,"home"])->name("home");
Route::get("/dashboard", [HomeController::class,"login_home"])->name("dashboard")->middleware(['auth', 'verified']);
Route::get("/dashboard/productdetails/{id}", [HomeController::class,"product_details"])->name("productDetails")->middleware(['auth', 'verified']);
Route::get("add_cart/{id}", [HomeController::class,"addCart"])->name("addCart")->middleware(['auth', 'verified']);
Route::get("mycart", [HomeController::class,"myCart"])->name("myCart")->middleware(['auth', 'verified']);
Route::delete("mycart/deletecart/{id}", [HomeController::class,"removeCart"])->name("removeCart")->middleware(['auth', 'verified']);
Route::post("mycart/order", [HomeController::class,"placeOrder"])->name("placeOrder")->middleware(['auth', 'verified']);
Route::get("myorder", [HomeController::class,"myOrder"])->name("myOrders")->middleware(['auth', 'verified']);
Route::get("/dashboard/Profile/{id}", [HomeController::class,"myProfile"])->name("myProfile")->middleware(['auth', 'verified']);
Route::put("/dashboard/editProfile/{id}", [HomeController::class,"editProfile"])->name("editProfile")->middleware(['auth', 'verified']);
Route::get("/dashboard/resetPassword/{id}", [HomeController::class,"changePass"])->name("changePass")->middleware(['auth', 'verified']);
Route::put("/dashboard/resetPassword/{id}", [HomeController::class,"resetPassword"])->name("resetPassword")->middleware(['auth', 'verified']);
Route::post("/dashboard/contactUs", [HomeController::class,"contactUs"])->name("contactUs");
Route::get("stripe/{value}", [HomeController::class,"stripe"])->name("stripe");
Route::post("stripe/{value}", [HomeController::class,"stripePost"])->name("stripe.post");

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::get('admin/dashboard',[HomeController::class,'index'])->name('admin.dashboard')->middleware(['auth','admin']);
Route::get('admin/category',[AdminController::class,'View_category'])->name('view.category')->middleware(['auth','admin']);
Route::get('admin/guestUsers',[AdminController::class,'guestUsers'])->name('guestUsers')->middleware(['auth','admin']);
Route::post('admin/addcategory',[AdminController::class,'add_category'])->name('addCategory')->middleware(['auth','admin']);
Route::get('admin/editcategory/{id}',[AdminController::class,'edit'])->name('admin.editCategory')->middleware(['auth','admin']);
Route::put('admin/editcategory/{id}',[AdminController::class,'update'])->name('admin.updateCategory')->middleware(['auth','admin']);
Route::delete('admin/deletecategory/{id}',[AdminController::class,'delete'])->name('deleteCategory')->middleware(['auth','admin']);
Route::get('admin/addproduct',[AdminController::class,'add_product'])->name('addProduct')->middleware(['auth','admin']);
Route::post('admin/uploadproduct',[AdminController::class,'upload_product'])->name('upload_product')->middleware(['auth','admin']);
Route::get('admin/viewproduct',[AdminController::class,'showProducts'])->name('showProduct')->middleware(['auth','admin']);
Route::get('admin/editproduct/{id}',[AdminController::class,'editProducts'])->name('editProduct')->middleware(['auth','admin']);
Route::put('admin/updateproduct/{id}',[AdminController::class,'updateProducts'])->name('updateProduct')->middleware(['auth','admin']);
Route::delete('admin/deleteproduct/{id}',[AdminController::class,'destroyProducts'])->name('deleteProduct')->middleware(['auth','admin']);
Route::get('admin/confirmorder',[HomeController::class,'confirmOrders'])->name('confirmOrders')->middleware(['auth','verified']);
Route::get('admin/vieworder',[AdminController::class,'viewOrders'])->name('viewOrders')->middleware(['auth','admin']);
Route::get('admin/ontTheWay/{id}',[AdminController::class,'ontTheWay'])->name('ontTheWay')->middleware(['auth','admin']);
Route::get('admin/delivered/{id}',[AdminController::class,'delivered'])->name('delivered')->middleware(['auth','admin']);
Route::get('admin/printpdf/{id}',[AdminController::class,'printPDF'])->name('printPDF')->middleware(['auth','admin']);
Route::get('admin/viewUsers',[AdminController::class,'viewUsers'])->name('viewUsers')->middleware(['auth','admin']);
Route::delete('admin/viewUsers/{id}',[AdminController::class,'deleteUsers'])->name('deleteUser')->middleware(['auth','admin']);
Route::get('admin/resetPassword/{id}',[AdminController::class,'changePass'])->name('changePass')->middleware(['auth','admin']);
Route::put("admin/resetPassword/{id}", [AdminController::class,"resetPassword"])->name("resetPassword")->middleware(['auth', 'admin']);

