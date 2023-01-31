<?php

use App\Http\Controllers\Payment;
use App\Http\Controllers\PaymentController;
use http\Client\Curl\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyDetailsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderStatusController;
use App\Http\Controllers\SubcatController;
use App\Http\Controllers\AjaxController;

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

//frontend route
Route::get('/', [FrontendController::class,'index'])->name('home');
Route::get('/ajax-fetch', [AjaxController::class,'ajaxFetch'])->name('ajax-fetch');

Route::get('/redirect', [FrontendController::class, 'redirect']);

Route::get('/category-product/{id}', [FrontendController::class,'categoryWiseShow'])->name('category');
Route::get('/all_category', [FrontendController::class,'all_category'])->name('all-category');
Route::get('/all_product', [FrontendController::class,'all_product'])->name('all_product');
Route::post('order/store',[OrderController::class,'store'])->name('order.store');
Route::get('product/fetch/{id}',[FrontendController::class,'productFetch'])->name('product.fetch');
Route::get('order/thank-you-page/{order}',[OrderController::class,'thanks'])->name('order.thanks');
Route::get('order/checkout',[OrderController::class,'checkout'])->name('checkout');
Route::get('/product_details/{id}',[ProductController::class,'product_details'])->name('product_details');


 //end frontend route

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware'=>['auth']],function() {
    // Admin home
    Route::get('/admin', [HomeController::class, 'home'])->name('admin');

    //company details
    Route::get('company-details/index', [CompanyDetailsController::class, 'create'])->name('company-details.index');
    Route::get('company-details/index', [CompanyDetailsController::class, 'create'])->name('company-details.create');
    Route::post('company-details/store', [CompanyDetailsController::class, 'store'])->name('company-details.store');
    Route::get('company-details/edit/{id}', [CompanyDetailsController::class, 'edit'])->name('company-details.edit');
    Route::put('company-details/update', [CompanyDetailsController::class, 'update'])->name('company-details.update');
    Route::post('company-details/delete/{id}', [CompanyDetailsController::class, 'destroy'])->name('company-details.destroy');

    //Category Mangement
    Route::group(['as' => 'category.', 'prefix' => 'category'], function () {
        Route::get('/index', [CategoryController::class, 'index'])->name('index');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::post('/store', [CategoryController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [CategoryController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->name('destroy');
    });

    //Sub-category Mangement
    Route::group(['as' => 'subcat.', 'prefix' => 'subcat'], function () {
        Route::get('/index', [SubcatController::class, 'index'])->name('index');
        Route::get('/create', [SubcatController::class, 'create'])->name('create');
        Route::post('/store', [SubcatController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [SubcatController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [SubcatController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [SubcatController::class, 'destroy'])->name('destroy');
    });

    //Brand Mangement
    Route::group(['as' => 'brand.', 'prefix' => 'brand'], function () {
        Route::get('/index', [BrandController::class, 'index'])->name('index');
        Route::get('/create', [BrandController::class, 'create'])->name('create');
        Route::post('/store', [BrandController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [BrandController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [BrandController::class, 'destroy'])->name('destroy');
    });

    //Shippin Mangement
    Route::group(['as' => 'shipping.', 'prefix' => 'shipping'], function () {
        Route::get('/index', [ShippingController::class, 'index'])->name('index');
        Route::get('/create', [ShippingController::class, 'create'])->name('create');
        Route::post('/store', [ShippingController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ShippingController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [ShippingController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [ShippingController::class, 'destroy'])->name('destroy');
    });

    //PRODUCT MANAGEMENT
    Route::group(['as' => 'product.', 'prefix' => 'product'], function () {
        Route::get('/index', [ProductController::class, 'index'])->name('index');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/store', [ProductController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [ProductController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('destroy');
        Route::get('/show_gallery/{id}', [ProductController::class, 'show_gallery'])->name('product_gallery');

    });

    //Order Management
    Route::group(['as' => 'order.', 'prefix' => 'order'], function () {
        Route::get('/index', [OrderController::class, 'index'])->name('index');
        Route::get('/create', [OrderController::class, 'create'])->name('create');
        Route::get('/edit/{id}', [OrderController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [OrderController::class, 'update'])->name('update');
        Route::get('/trash', [OrderController::class, 'trash'])->name('trash');
        Route::get('/delete/{id}', [OrderController::class, 'delete'])->name('delete');
        Route::get('/restore/{id}', [OrderController::class, 'restore'])->name('restore');
        Route::get('/destroy/{id}', [OrderController::class, 'destroy'])->name('destroy');
        Route::get('view/{order_number}', [OrderController::class, 'view'])->name('view');

    });

    //Payment system
    Route::group(['as' => 'payment.', 'prefix' => 'payment'], function () {

        Route::get('/index', [PaymentController::class, 'index'])->name('index');
        Route::get('/create', [PaymentController::class, 'create'])->name('create');
        Route::post('/insert', [PaymentController::class, 'insert'])->name('insert');
        Route::get('/payment_delete/{id}', [PaymentController::class, 'payment_delete'])->name('payment_delete');
        Route::get('/edite/{id}', [PaymentController::class, 'edite'])->name('edite');
        Route::post('/edite/{id}', [PaymentController::class, 'edite'])->name('edite');
        Route::post('/update/{id}', [PaymentController::class, 'update'])->name('update');

    });

    //Order Status
    Route::group(['as' => 'order-status.', 'prefix' => 'order-status'], function () {
        Route::get('/index', [OrderStatusController::class, 'index'])->name('index');
        Route::get('/create', [OrderStatusController::class, 'create'])->name('create');
        Route::post('/store', [OrderStatusController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [OrderStatusController::class, 'edit'])->name('edit');
        Route::patch('/update', [OrderStatusController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [OrderStatusController::class, 'destroy'])->name('destroy');
        Route::get('/ajax', [OrderStatusController::class, 'ajax'])->name('ajax');
        Route::get('/order-status-assign', [OrderStatusController::class, 'OrderStatusAssign'])->name('order-status-assign');
    });
});



require __DIR__.'/auth.php';

