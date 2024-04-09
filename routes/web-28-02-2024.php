<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\UserController;
    use App\Http\Controllers\Admin\CategoryController;
    use App\Http\Controllers\Admin\ProductController;
    use App\Http\Controllers\Admin\AttributesController;
    use App\Http\Controllers\Admin\PosttypeController;
    use App\Http\Controllers\UsersController;
    use App\Http\Controllers\AccountController;
    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\CommonController;
    use App\Http\Controllers\Admin\CouponController;
    use App\Http\Controllers\Admin\Vendor\Dashboard;
    use App\Http\Controllers\Admin\Vendor\VendorProfileController;
    use App\Http\Controllers\Admin\Vendor\VendorProductController;


    // Route::match(['get', 'post'], '/crops', [UsersController::class, 'crops'])->name('admin/crops');

/*  Start Admin Route  */


    Route::group([ 'prefix' => 'admin' , 'middleware' => ['auth', 'admin']], function(){

        Route::match(['get', 'post'], '/dashboard', [UsersController::class, 'dashboard'])->name('admin/dashboard');
        Route::match(['get', 'post'], '/logout', [UsersController::class, 'logout'])->name('admin/logout');
        Route::match(['get', 'post'], '/user-profile', [UsersController::class, 'user_profile'])->name('admin/user_profile');
        Route::match(['get', 'post'], '/user-change-password', [UsersController::class, 'user_change_password'])->name('admin/user_change_password');
        Route::match(['get', 'post'], '/user', [UserController::class, 'user'])->name('admin/user');
        Route::match(['post'], '/adduser', [UserController::class, 'adduser'])->name('admin.adduser');
        Route::post('/adduser', [UserController::class, 'adduser'])->name('admin.adduser');

        /*  Start Admin Products  */
            Route::match(['get', 'post'], '/product', [ProductController::class, 'product'])->name('admin/product');
            Route::match(['get', 'post'], '/product_verify', [ProductController::class, 'product_verify'])->name('admin/product_verify');
            Route::match(['get', 'post'], '/pending_product/{verify}/{id}', [ProductController::class, 'product_verify_update'])->name('admin/pending_product');
            Route::match(['get', 'post'], '/add-product', [ProductController::class, 'add_product'])->name('admin/add_product');
            Route::match(['get', 'post'], 'product/category', [CategoryController::class, 'category'])->name('admin/product/category');
            Route::match(['get', 'post'], 'product/add_category', [CategoryController::class, 'add_category'])->name('admin/product/add_category');
            Route::match(['get', 'post'], 'product/category/edit/{id}', [CategoryController::class, 'edit_category'])->name('product/category/edit');
            Route::match(['get', 'post'], 'product/delete_category', [CategoryController::class, 'delete_category'])->name('admin/product/delete_category');
            Route::match(['get', 'post'], 'product/update_status_category', [CategoryController::class, 'update_status_category'])->name('admin/product/update_status_category');
            Route::match(['get', 'post'], 'product/attributes', [AttributesController::class, 'attributes'])->name('admin/product/attributes');
            
            Route::match(['get', 'post'], 'product/attributes_value/{id}', [AttributesController::class, 'attributes_value'])->name('product/attributes_value');
            Route::match(['get', 'post'], 'product/attributes/value/edit/{id}', [AttributesController::class, 'attributes_value_edit'])->name('edit.attributevalue');
            Route::match(['get', 'post'], 'product/attributes/value/delete/{id}', [AttributesController::class, 'attributes_value_delete'])->name('delete.attributevalue');
            Route::match(['get', 'post'], 'product/attributes/delete/{id}', [AttributesController::class, 'deleteattribute'])->name('product/deleteattr');
            
            Route::match(['get', 'post'], 'product/get_attributes', [ProductController::class, 'get_attributes'])->name('admin/product/get_attributes');
            Route::match(['get', 'post'], 'posttype', [PosttypeController::class, 'posttype'])->name('admin/posttype');
            Route::match(['get', 'post'], 'addposttype', [PosttypeController::class, 'add_posttype'])->name('admin/addposttype');
            Route::match(['get', 'post'], 'addposttype/view/{id}', [PosttypeController::class, 'posttypeview'])->name('admin/addposttype/view');
            Route::match(['get', 'post'], 'posttype/addpost/{id}', [PosttypeController::class, 'posttypeaddpost'])->name('admin/posttype/addpost');
            Route::match(['get', 'post'], 'posttype/delete', [PosttypeController::class, 'posttypedeletpost'])->name('admin/posttype/delete');
            Route::match(['get', 'post'], '/posttype/status/{status}/{id}', [PosttypeController::class, 'posttype_status_update'])->name('admin/posttype/status');
            Route::match(['get', 'post'], '/posttypeview/status/{status}/{id}', [PosttypeController::class, 'posttypeview_status_update'])->name('admin/posttypeview/status');
            Route::match(['get', 'post'], 'postcontent/edit/{posttype_id}/{id}', [PosttypeController::class, 'postcontent_edit'])->name('admin/postcontent/edit');



           Route::match(['get', 'post'], '/coupon', [CouponController::class, 'coupon'])->name('admin/coupon');
           Route::match(['get', 'post'], '/add_coupon', [CouponController::class, 'add_coupon'])->name('admin/add_coupon');
           Route::match(['get', 'post'], '/delete_coupon', [CouponController::class, 'delete_coupon'])->name('admin/delete_coupon');
           Route::match(['get', 'post'], '/coupon/status/{status}/{id}', [CouponController::class, 'coupon_status_update'])->name('admin/coupon/status');
           Route::match(['get', 'post'], '/edit_coupon/{id}', [CouponController::class, 'edit_coupon'])->name('admin/edit_coupon');
           Route::match(['get', 'post'], '/user', [AccountController::class, 'user_show'])->name('admin/user');
           Route::match(['get', 'post'], '/vendor', [AccountController::class, 'vendor_show'])->name('admin/vendor');
           Route::match(['get', 'post'], '/vendor_verification_p', [AccountController::class, 'vendor_verification_p'])->name('admin/vendor_verification_p');
           Route::match(['get', 'post'], '/vendor_verify/{verify}/{id}', [AccountController::class, 'vendor_verify'])->name('admin/vendor_verify');
           Route::match(['get', 'post'], '/user_status/{status}/{id}', [AccountController::class, 'user_status_update'])->name('admin/user_status');
           Route::match(['get', 'post'], '//user/viewuser/{id}', [AccountController::class, 'view_user'])->name('admin/view_user');
           Route::match(['get', 'post'], '/order', [CommonController::class, 'order'])->name('admin/order');
           Route::match(['get', 'post'], '/order/view/{id}', [CommonController::class, 'view_order'])->name('view_order');
            
            Route::match(['get', 'post'], '/panding-products', [CommonController::class, 'panding_product'])->name('admin/panding_product');
            Route::match(['get', 'post'], '/product-verify/{verify}/{id}', [CommonController::class, 'verify_product'])->name('admin/verify_product');


           Route::match(['get', 'post'], '/gst-check/{gst}', [CommonController::class, 'gst_check']);
          

       /*  Start Admin Products  */

    });

    Route::group([ 'prefix' => 'vendor' , 'middleware' => ['auth' , 'vendor']], function(){
         Route::match(['get', 'post'],'/upload-excel', [CommonController::class, 'uploadexcel'])->name('upload-excel');
        Route::match(['get', 'post'], '/datamanage', [CommonController::class, 'datamanage'])->name('vendor/datamanage');
        Route::match(['get', 'post'], '/logout', [VendorProfileController::class, 'logout'])->name('vendor/logout');
        Route::match(['get', 'post'], '/dashboard', [Dashboard::class, 'dashboard'])->name('vendor/dashboard');
        Route::match(['get'], '/referearn', [Dashboard::class, 'referearn'])->name('vendor/referearn');
        Route::match(['get', 'post'], '/vendor-profile', [VendorProfileController::class, 'vendor_profile'])->name('vendor/vendor_profile');
        Route::match(['get', 'post'], '/vendor-change-password', [VendorProfileController::class, 'vendor_change_password'])->name('vendor/vendor_change_password');
        Route::match(['get', 'post'], '/product', [VendorProductController::class, 'product'])->name('vendor/product');
        Route::match(['get', 'post'], '/add-product', [VendorProductController::class, 'add_product'])->name('vendor/add_product');
        Route::match(['get', 'post'], 'product/get_attributes', [VendorProductController::class, 'get_attributes'])->name('vendor/product/get_attributes');
        Route::match(['get', 'post'], 'product/delete_product', [VendorProductController::class, 'delete_product'])->name('vendor/product/delete_product');
        Route::match(['get', 'post'], 'product-edit/{id}', [VendorProductController::class, 'edit_product'])->name('vendor/product-edit');
        Route::match(['get', 'post'], 'product/status/{status}/{id}', [VendorProductController::class, 'product_status'])->name('vendor/product/status');
        Route::match(['get', 'post'], '/order', [CommonController::class, 'vendor_order'])->name('vendor/order');
        Route::match(['get', 'post'], '/order/view-order/{id}', [CommonController::class, 'view_vendor_order'])->name('view_order_vendor');

    });

    Route::match(['get', 'post'], 'supplier-register', [VendorProfileController::class, 'register'])->name('supplier_register');
    Route::match(['get', 'post'], 'popup', [UsersController::class, 'popup'])->name('popup');
    Route::match(['get', 'post'], '/', [HomeController::class, 'home'])->name('home');
    Route::match(['get', 'post'], '/login', [AccountController::class, 'login'])->name('login');
    Route::match(['get', 'post'], '/register', [AccountController::class, 'register'])->name('register');
    Route::match(['get', 'post'], '/logout', [CommonController::class, 'logout'])->name('logout');
    Route::match(['get', 'post'], '/logout_all', [CommonController::class, 'logout_all'])->name('logout_all');



/*  End Admin Route  */




  Route::get('/applycartcondition', [CommonController::class, 'applycartcondition'])->name('applycartcondition');
//   Route::get('/cart', [CommonController::class, 'cart'])->name('cart');
  Route::get('/updateCart/{id}/{qty}', [CommonController::class, 'updateCart']);
  Route::get('/addtocart/{slug}', [CommonController::class, 'addtocart'])->name('addtocart');
  Route::get('/removecart/{id}', [CommonController::class, 'removecart'])->name('removecart');
  Route::get('/cart', [CommonController::class, 'showcart'])->name('show-cart');
  Route::match(['post','get'],'/checkout', [CommonController::class, 'checkout'])->name('checkout');
  Route::get('/cartclear', [CommonController::class, 'cartClear'])->name('cartclear');
  Route::match(['get', 'post'], '/product/{slug}', [CommonController::class, 'single_product_show'])->name('product');

  Route::match(['get', 'post'], '/my-account', [CommonController::class, 'my_account'])->name('my_account');
  Route::match(['get', 'post'], '/my-orders', [CommonController::class, 'my_orders'])->name('my_orders');
  Route::match(['get', 'post'], '/wishlist', [CommonController::class, 'wishlist'])->name('wishlist');
  Route::match(['get', 'post'], '/profile', [CommonController::class, 'profile'])->name('profile');
  Route::match(['get', 'post'], '/chnage-password', [CommonController::class, 'change_password']);
  Route::match(['get', 'post'], '/success', [CommonController::class, 'success']);
  Route::match(['get', 'post'], '/failed', [CommonController::class, 'failed']);

  Route::match(['get', 'post'], '/invoice/{id}', [CommonController::class, 'invoice']);
  Route::match(['get', 'post'], '/refer', [CommonController::class, 'refer']);


  Route::match(['get', 'post'], 'about-us', [CommonController::class, 'about']);
  Route::match(['get', 'post'], 'contact-us', [CommonController::class, 'contact']);
  Route::match(['get', 'post'], 'payments', [CommonController::class, 'payments']);
  Route::match(['get', 'post'], 'shipping', [CommonController::class, 'shipping']);
  Route::match(['get', 'post'], 'cancellation-returns', [CommonController::class, 'cancellation_returns']);
  Route::match(['get', 'post'], 'faq', [CommonController::class, 'faq']);
  Route::match(['get', 'post'], 'returns-policy', [CommonController::class, 'returns_policy']);
  Route::match(['get', 'post'], 'term-conditions', [CommonController::class, 'term_conditions']);
  Route::match(['get', 'post'], 'privacy-policy', [CommonController::class, 'privacy_policy']);
  Route::match(['get', 'post'], 'track-order', [CommonController::class, 'track_order']);
  Route::match(['get', 'post'], 'sitemap', [CommonController::class, 'sitemap']);
  Route::match(['get','post'], 'pay/{order_id}', [CommonController::class, 'paynow']);
  Route::match(['get','post'], 'update_order_payment_status', [CommonController::class, 'update_order_payment_status']);
  Route::match(['get','post'], 'rozar_pay_delete_order', [CommonController::class, 'rozar_pay_delete_order']);
  Route::match(['get','post'], 'callback', [CommonController::class, 'callback']);
  Route::match(['get', 'post'], '/category/{slug}', [CommonController::class, 'category']);



/*  Start Admin Login Route  */

    Route::group([ 'prefix' => 'admin' , 'middleware' => 'guest'], function(){
        Route::match(['get', 'post'], '/login', [UsersController::class, 'login'])->name('admin/login');
    });

/*  Start Admin Login Route  */













  Route::match(['get','post'], '/forgotpass', [CommonController::class, 'forgotpass'])->name('forgotpass');
  Route::match(['get','post'], '/changepass/{slug}', [CommonController::class, 'changepass'])->name('changepass');
  


// Clear application cache:
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('optimize:clear');
    return 'Application cache has been cleared';
});

//Clear route cache:
Route::get('/route-cache', function() {
	Artisan::call('route:cache');
    return 'Routes cache has been cleared';
});

//Clear config cache:
Route::get('/config-cache', function() {
 	Artisan::call('config:cache');
 	return 'Config cache has been cleared';
});

// Clear view cache:
Route::get('/view-clear', function() {
    Artisan::call('view:clear');
    return 'View cache has been cleared';
});