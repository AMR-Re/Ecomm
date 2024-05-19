<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Admin\ShippingChargeController;
use App\Http\Controllers\Admin\DiscountCodeController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PartnerController;
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
  Route::post('user/change-password',[UserController::class,'update_password']);
  Route::post('add_to_wishlist',[UserController::class,'add_to_wishlist']);
  Route::get('my_wishlist',[FProductController::class,'my_wishlist']);

 Route::post('user/make_review',[UserController::class,'make_review']);

  Route::get('user/edit-profile',[UserController::class,'edit_profile']);
  Route::post('user/edit-profile',[UserController::class,'Update_Profile']);

  Route::get('user/orders/details/{id}', [UserController::class,'order_detail']);

  Route::post('blogs/submit_comment', [HomeController::class,'submit_blog_comment']);


  
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


//pages
Route::get('admin/pages/list', [PageController::class,'list']);
Route::get('admin/pages/add', [PageController::class,'add']);
Route::post('admin/pages/add', [PageController::class,'insert']);

Route::get('admin/pages/edit/{id}', [PageController::class,'edit']);
Route::post('admin/pages/edit/{id}', [PageController::class,'update']);
Route::get('admin/pages/delete/{id}', [PageController::class,'delete']);
Route::get('admin/system-setting', [PageController::class,'system_setting']);
Route::post('admin/system-setting', [PageController::class,'update_system_setting']);


Route::get('admin/home-setting', [PageController::class,'home_setting']);
Route::post('admin/home-setting', [PageController::class,'update_home_setting']);

Route::get('admin/contactus', [PageController::class,'contactus']);
Route::get('admin/contactus/delete/{id}', [PageController::class,'contactus_delete']);

//slider
Route::get('admin/slider/list', [SliderController::class,'list']);
Route::get('admin/slider/add', [SliderController::class,'add']);
Route::post('admin/slider/add', [SliderController::class,'insert']);

Route::get('admin/slider/edit/{id}', [SliderController::class,'edit']);
Route::post('admin/slider/edit/{id}', [SliderController::class,'update']);
Route::get('admin/slider/delete/{id}', [SliderController::class,'delete']);


//partners
Route::get('admin/partner/list', [PartnerController::class,'list']);
Route::get('admin/partner/add', [PartnerController::class,'add']);
Route::post('admin/partner/add', [PartnerController::class,'insert']);

Route::get('admin/partner/edit/{id}', [PartnerController::class,'edit']);
Route::post('admin/partner/edit/{id}', [PartnerController::class,'update']);
Route::get('admin/partner/delete/{id}', [PartnerController::class,'delete']);

//blog category
Route::get('admin/blog/list', [BlogCategoryController::class,'list']);
Route::get('admin/blog/add', [BlogCategoryController::class,'add']);
Route::post('admin/blog/add', [BlogCategoryController::class,'insert']);
Route::get('admin/blog/edit/{id}', [BlogCategoryController::class,'edit']);
Route::post('admin/blog/edit/{id}', [BlogCategoryController::class,'update']);
Route::get('admin/blog/delete/{id}', [BlogCategoryController::class,'delete']);


//blog 
Route::get('admin/blogs/list', [BlogController::class,'list']);
Route::get('admin/blogs/add', [BlogController::class,'add']);
Route::post('admin/blogs/add', [BlogController::class,'insert']);
Route::get('admin/blogs/edit/{id}', [BlogController::class,'edit']);
Route::post('admin/blogs/edit/{id}', [BlogController::class,'update']);
Route::get('admin/blogs/delete/{id}', [BlogController::class,'delete']);


});
Route::get('/', [HomeController::class,'home']);
Route::post('recent_arrival_category_product', [HomeController::class,'recent_arrival_category_product']);

Route::get('contact', [HomeController::class,'contact']);
Route::post('contact', [HomeController::class,'submit_contact']);

Route::get('about', [HomeController::class,'about']);
Route::get('faq', [HomeController::class,'faq']);

Route::get('user_guide', [HomeController::class,'user_guide']);
Route::get('payment_method', [HomeController::class,'payment_method']);
Route::get('money_back_guarantee', [HomeController::class,'money_back_guarantee']);
Route::get('returns', [HomeController::class,'returns']);
Route::get('shipping', [HomeController::class,'shipping']);
Route::get('terms_and_conditions', [HomeController::class,'terms_and_conditions']);
Route::get('privacy_policy', [HomeController::class,'privacy_policy']);


Route::get('blog', [HomeController::class,'blog']);
Route::get('blog/{slug}', [HomeController::class,'blog_detail']);
Route::get('blog/category/{slug}', [HomeController::class,'blog_category']);




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
Route::post('add-to-cart', [PaymentController::class,'add_to_cart']);

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