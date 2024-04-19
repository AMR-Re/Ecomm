<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Admin\ShippingChargeController;
use App\Http\Controllers\Admin\DiscountCodeController;
use App\Http\Controllers\ProductController as FProductController;
use App\Http\Controllers\UserController;

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

Route::get('admin', [AuthController::class,'login_admin']);
Route::post('admin', [AuthController::class,'auth_login_admin']);
Route::get('admin/logout', [AuthController::class,'logout_admin']);

Route::group(['middleware'=>'user'],function(){

  Route::get('user/dashboard',[UserController::class,'dashboard']);
  Route::get('user/orders',[UserController::class,'orders']);
  Route::get('user/change-password',[UserController::class,'change_password']);

  Route::get('user/edit-profile',[UserController::class,'edit_profile']);
  Route::post('user/edit-profile',[UserController::class,'Update_Profile']);

  Route::get('user/orders/details/{id}', [UserController::class,'order_detail']);

});

Route::group(['middleware'=>'admin'],function()
{
    Route::get('admin/dashboard',[DashboardController::class,'dashboard']);

     // refactor the admin  routes
    // Route::get('admin/dashboard', function () {
    //     return view('admin.dashboard');
    // });
    // doing the smae thing for the admins
    Route::get('admin/admin/list', [AdminController::class,'list']);
    Route::get('admin/admin/add', [AdminController::class,'add']);
    Route::post('admin/admin/add', [AdminController::class,'insert']);

    Route::get('admin/admin/edit/{id}', [AdminController::class,'edit']);
    Route::post('admin/admin/edit/{id}', [AdminController::class,'update']);
    Route::get('admin/admin/delete/{id}', [AdminController::class,'delete']);
    
    //Customer
    
    Route::get('admin/customer/list', [AdminController::class,'customer_list']);
    // Route::get('admin/customer/add', [AdminController::class,'add']);
    // Route::post('admin/customer/add', [AdminController::class,'insert']);

    // Route::get('admin/customer/edit/{id}', [AdminController::class,'edit']);
    // Route::post('admin/customer/edit/{id}', [AdminController::class,'update']);
    // Route::get('admin/customer/delete/{id}', [AdminController::class,'delete']);
    

    //Category

    Route::get('admin/category/list', [CategoryController::class,'list']);
    Route::get('admin/category/add', [CategoryController::class,'add']);
    Route::post('admin/category/add', [CategoryController::class,'insert']);

    Route::get('admin/category/edit/{id}', [CategoryController::class,'edit']);
    Route::post('admin/category/edit/{id}', [CategoryController::class,'update']);
    Route::get('admin/category/delete/{id}', [CategoryController::class,'delete']);
//order
Route::get('admin/order/list', [OrderController::class,'list']);
Route::get('admin/order/details/{id}', [OrderController::class,'order_detail']);
Route::get('admin/order_status', [OrderController::class,'order_status']);
    //sub_Category

    Route::get('admin/sub_category/list', [SubCategoryController::class,'list']);
    Route::get('admin/sub_category/add', [SubCategoryController::class,'add']);
    Route::post('admin/sub_category/add', [SubCategoryController::class,'insert']);

    Route::get('admin/sub_category/edit/{id}', [SubCategoryController::class,'edit']);
    Route::post('admin/sub_category/edit/{id}', [SubCategoryController::class,'update']);
    Route::get('admin/sub_category/delete/{id}', [SubCategoryController::class,'delete']);

    Route::post('admin/get_sub_category', [SubCategoryController::class,'get_sub_category']);


    //Product

      Route::get('admin/product/list', [ProductController::class,'list']);
      Route::get('admin/product/add', [ProductController::class,'add']);
      Route::post('admin/product/add', [ProductController::class,'insert']);
  
      Route::get('admin/product/edit/{id}', [ProductController::class,'edit']);
      Route::post('admin/product/edit/{id}', [ProductController::class,'update']);
      Route::get('admin/product/delete/{id}', [ProductController::class,'delete']);

    //Brand

      Route::get('admin/brand/list', [BrandController::class,'list']);
      Route::get('admin/brand/add', [BrandController::class,'add']);
      Route::post('admin/brand/add', [BrandController::class,'insert']);
  
      Route::get('admin/brand/edit/{id}', [BrandController::class,'edit']);
      Route::post('admin/brand/edit/{id}', [BrandController::class,'update']);
      Route::get('admin/brand/delete/{id}', [BrandController::class,'delete']);

//Color

Route::get('admin/color/list', [ColorController::class,'list']);
Route::get('admin/color/add', [ColorController::class,'add']);
Route::post('admin/color/add', [ColorController::class,'insert']);

Route::get('admin/color/edit/{id}', [ColorController::class,'edit']);
Route::post('admin/color/edit/{id}', [ColorController::class,'update']);
Route::get('admin/color/delete/{id}', [ColorController::class,'delete']);
   // refactor the admin  routes
    // Route::get('admin/admin/list', function () {
    //     return view('admin.admin.list');
    // });
    // doing the smae thing for the admins
Route::get('admin/product/image_delete/{id}', [ProductController::class,'image_delete']);
Route::post('admin/product_image_sortable', [ProductController::class,'product_image_sortable']);


//discount_code
Route::get('admin/discount_code/list', [DiscountCodeController::class,'list']);
Route::get('admin/discount_code/add', [DiscountCodeController::class,'add']);
Route::post('admin/discount_code/add', [DiscountCodeController::class,'insert']);

Route::get('admin/discount_code/edit/{id}', [DiscountCodeController::class,'edit']);
Route::post('admin/discount_code/edit/{id}', [DiscountCodeController::class,'update']);
Route::get('admin/discount_code/delete/{id}', [DiscountCodeController::class,'delete']);
//shipping_charge
Route::get('admin/shipping_charge/list', [ShippingChargeController::class,'list']);
Route::get('admin/shipping_charge/add', [ShippingChargeController::class,'add']);
Route::post('admin/shipping_charge/add', [ShippingChargeController::class,'insert']);

Route::get('admin/shipping_charge/edit/{id}', [ShippingChargeController::class,'edit']);
Route::post('admin/shipping_charge/edit/{id}', [ShippingChargeController::class,'update']);
Route::get('admin/shipping_charge/delete/{id}', [ShippingChargeController::class,'delete']);
});
Route::get('/', [HomeController::class,'home']);

//user Register
Route::post('auth_register', [AuthController::class,'auth_register']);
Route::get('activate/{id}', [AuthController::class,'activate_email']);
Route::get('reset/{token}', [AuthController::class,'reset']);
Route::post('reset/{token}', [AuthController::class,'auth_reset']);



//user Login
Route::post('auth_login', [AuthController::class,'auth_login']);
Route::get('forgot_password', [AuthController::class,'forgot_password']);
Route::post('forgot_password', [AuthController::class,'auth_forgot_password']);




Route::get('search', [FProductController::class,'getProductSearch']);

Route::post('product/add-to-cart', [PaymentController::class,'add_to_cart']);
Route::get('cart', [PaymentController::class,'cart']);
Route::post('update_cart', [PaymentController::class,'cart_update']);
Route::get('checkout', [PaymentController::class,'checkout']);

Route::post('checkout/apply_discount_code', [PaymentController::class,'apply_discount_code']);
Route::post('checkout/place_order', [PaymentController::class,'place_order']);



Route::get('checkout/payment', [PaymentController::class,'checkout_payment']);
Route::get('paypal/payment-success', [PaymentController::class,'paypal_payment_success']);
Route::get('stripe/payment-success', [PaymentController::class,'stripe_payment_success']);




Route::get('cart/delete/{id}', [PaymentController::class,'removeItem']);



Route::post('get_filter_product_ajax', [FProductController::class,'getFilterProductAjax']);

Route::get('{category?}/{subcategory?}', [FProductController::class,'getCategory']);




// Route::get('/', function () {
//     return view('welcome');
// });