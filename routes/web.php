<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\HomeSliderController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\ProductCartController;
use App\Http\Controllers\Admin\ProductListController;
use App\Http\Controllers\Admin\RevewController;
use App\Http\Controllers\Admin\SiteInfoController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\AdminController;
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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});
//Admin logout
Route::get('/logout',[AdminController::class,'Adminlogout'])->name('user.logout');
Route::prefix('admin')->group(function (){
   Route::get('/user/profile',[AdminController::class,'Userprofile'])->name('user.profile');
    Route::post('/user/profile/store',[AdminController::class,'Userprofilestore'])->name('user.profile.store');
    Route::get('/user/change/password',[AdminController::class,'Changepassword'])->name('change.password');
    Route::post('/user/update/password',[AdminController::class,'Updatepassword'])->name('update.password');

});


Route::prefix('category')->group(function (){
    Route::get('/all',[CategoryController::class,'Allcategory'])->name('all.categories');
    Route::get('/add',[CategoryController::class,'Addcategory'])->name('add.category');
    Route::post('/store',[CategoryController::class,'Storecategory'])->name('category.store');
    Route::get('/edit/{id}',[CategoryController::class,'Editcategory'])->name('category.edit');
    Route::post('/edit/{id}',[CategoryController::class,'Updatecategory'])->name('category.update');
    Route::get('/delete/{id}',[CategoryController::class,'Deletecategory'])->name('category.delete');


});
Route::prefix('subcategory')->group(function (){
    Route::get('/all',[SubCategoryController::class,'Allsubcategory'])->name('all.subcategory');
    Route::get('/add',[SubCategoryController::class,'Addsubcategory'])->name('add.subcategory');
    Route::post('/store',[SubCategoryController::class,'Storesubcategory'])->name('subcategory.store');
    Route::get('/edit/{id}',[SubCategoryController::class,'Editsubcategory'])->name('subcategory.edit');
    Route::post('/edit/{id}',[SubCategoryController::class,'Updatesubcategory'])->name('subcategory.update');
    Route::get('/delete/{id}',[SubCategoryController::class,'Deletesubcategory'])->name('subcategory.delete');
    Route::get('/ajax/{category_id}', [SubCategoryController::class, 'GetSubCategory']);


});
Route::prefix('products')->group(function (){
    Route::get('/all',[ProductListController::class,'Allproduct'])->name('all.products');
    Route::get('/add',[ProductListController::class,'Addproduct'])->name('add.product');
    Route::post('/store',[ProductListController::class,'Storeproduct'])->name('product.store');
    Route::get('/delete/{id}',[ProductListController::class,'Deleteproduct'])->name('product.delete');
    Route::get('/edit/{id}',[ProductListController::class,'Editproduct'])->name('product.edit');
    Route::post('/update/{id}',[ProductListController::class,'Updateproduct'])->name('product.update');



});

Route::prefix('order')->group(function (){
    Route::get('/pending',[ProductCartController::class,'pendingorder'])->name('pending.order');
    Route::get('/processing',[ProductCartController::class,'processingorder'])->name('processing.order');
    Route::get('/complate',[ProductCartController::class,'complateorder'])->name('complate.order');
    Route::get('/details/{id}',[ProductCartController::class,'orderdetails'])->name('order.details');
    Route::get('/status/processing/{id}',[ProductCartController::class,'pendingtoprocessing'])->name('pending.processing');
    Route::get('/status/complete/{id}',[ProductCartController::class,'processingtocomplete'])->name('processing.complete');
    Route::get('/delete/{id}',[ProductCartController::class,'orderdelete'])->name('order.delete');
});
Route::prefix('contact')->group(function (){
    Route::get('/all/messages',[ContactController::class,'allmessages'])->name('all.message');
    Route::get('/delete/{id}',[ContactController::class,'deletemessages'])->name('message.delete');

});
Route::prefix('notification')->group(function (){
    Route::get('/all/notification',[NotificationController::class,'allnotification'])->name('all.notification');
    Route::get('/add/notification',[NotificationController::class,'addnotification'])->name('add.notification');
    Route::post('/store/notification',[NotificationController::class,'storenotification'])->name('notification.store');
    Route::get('/delete/notification/{id}',[NotificationController::class,'deletenotification'])->name('notificcation.delete');
    Route::post('/update/notification',[NotificationController::class,'updatenotification'])->name('update.notificatio');


});

Route::prefix('slider')->group(function (){
    Route::get('/all/slider',[HomeSliderController::class,'allslider'])->name('all.slider');
    Route::get('/add/slider',[HomeSliderController::class,'addslider'])->name('add.slider');
    Route::post('/store/slider',[HomeSliderController::class,'storeslider'])->name('store.slider');
    Route::get('/delete/slider/{id}',[HomeSliderController::class,'deleteslider'])->name('delete.slider');
    Route::post('/update',[HomeSliderController::class,'updateslider'])->name('update.slider');



});
Route::prefix('siteinfo')->group(function(){

    Route::get('/all/information',[SiteInfoController::class, 'allinfo'])->name('all.info');
    Route::post('/update/siteinfo',[SiteInfoController::class, 'updateuiteInfo'])->name('update.info');



});
Route::prefix('review')->group(function(){

    Route::get('/all/review',[RevewController::class, 'allreview'])->name('all.review');



});
