<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Storekeeper\StorekeeperController;
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

// Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
// Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
// Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Auth::routes(['register'=>false]);
Auth::routes(['verify' => true]);
//languge
Route::get('lang/home', 'LangController@index');
Route::get('lang/change', 'LangController@change')->name('changeLang');
Route::get('user/login','FrontendController@login')->name('login.form');
Route::post('user/login','FrontendController@loginSubmit')->name('login.submit');
Route::get('user/logout','FrontendController@logout')->name('user.logout');

//Route::get('user/register','FrontendController@register')->name('register.form');
Route::get('user/register', 'Auth\RegisterController@showRegistrationForm')->name('register.form');
Route::post('user/register', 'Auth\RegisterController@register');
Route::get('user/email/verify', 'Auth\VerificationController@show')->name('verification.notice');
//Route::post('user/register','FrontendController@registerSubmit')->name('register.submit');


// Socialite
Route::get('login/{provider}/', 'Auth\LoginController@redirect')->name('login.redirect');
Route::get('login/{provider}/callback/', 'Auth\LoginController@Callback')->name('login.callback');
Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
// Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
// 

Route::get('','FrontendController@home')->name('home');

// Reset password ->middleware('verified')
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

// // Backend section start

Route::group(['prefix'=>'/salesman','middleware'=>['auth','salesman']],function(){
    Route::get('/','AdminController@index')->name('salesman');

    Route::get('/file-manager',function(){
        return view('backend.layouts.file-manager');
    })->name('file-manager');
    // user route
   Route::resource('users','AdminController');
   Route::get('users','AdminController@index1')->name('users.index1');
    // Banner
    Route::resource('banner','BannerController');
    // Brand
    Route::resource('brand','BrandController');
    // Profile``
    Route::get('/profile','AdminController@profile')->name('admin-profile');
    Route::post('/profile/{id}','AdminController@profileUpdate')->name('profile-update');
    // Category
    Route::resource('/category','CategoryController');
    // Product
    Route::resource('/product','ProductController');
    // Ajax for sub category
    Route::post('/category/{id}/child','CategoryController@getChildByParent');
    // POST category
    Route::resource('/post-category','PostCategoryController');
    // Post tag
    Route::resource('/post-tag','PostTagController');
    // Post
    Route::resource('/post','PostController');
    // Message
     Route::resource('/message','MessageController');
    Route::get('/message','MessageController@index')->name('message.index');
     Route::get('/message/five','MessageController@messageFive')->name('messages.five');

    // Order
    Route::resource('/order','OrderController');
    // Shipping
    Route::resource('/shipping','ShippingController');
    // Coupon
    Route::resource('/coupon','CouponController');
    // // Settings
     Route::get('settings','AdminController@settings')->name('settings');
    Route::post('setting/update','AdminController@settingsUpdate')->name('settings.update');

    // Notification
    Route::get('/notification/{id}','NotificationController@show')->name('admin.notification');
    Route::get('/notifications','NotificationController@index')->name('all.notification');
    Route::delete('/notification/{id}','NotificationController@delete')->name('notification.delete');
    // Password Change
    Route::get('change-password', 'AdminController@changePassword')->name('change.password.form');
    Route::post('change-password', 'AdminController@changPasswordStore')->name('change.password');
    //review
    Route::get('/user-review','ProductReviewController@index')->name('backend.review.index');
    Route::delete('/user-review/delete/{id}','ProductReviewController@destroy')->name('backend.productreview.delete');
    Route::get('/user-review/edit/{id}','ProductReviewController@edit')->name('backend.productreview.edit');
    Route::patch('/user-review/update/{id}','ProductReviewController@update')->name('backend.productreview.update');
    // commente
    Route::resource('/comment','PostCommentController');
    Route::get('order/pdf/{id}','OrderController@pdf')->name('order.pdf');
    Route::get('order1/','OrderController@orderpdf')->name('order.orderPDF');
    // Route::get('/user-post/comment','PostCommentController@index')->name('backend.post-comment.index');
    // Route::delete('/user-post/comment/delete/{id}','PostCommentController@destroy')->name('backend.post-comment.delete');
    // Route::get('/user-post/comment/edit/{id}','PostCommentController@edit')->name('backend.post-comment.edit');
    // Route::patch('/user-post/comment/udpate/{id}','PostCommentController@update')->name('backend.post-comment.update');
});





Route::group(['prefix'=>'/manager','middleware'=>['auth','manager']],function(){
    Route::get('/','ManagerController@index')->name('manager');

    Route::get('/file-manager',function(){
        return view('manager.layouts.file-manager');
    })->name('file-manager');
    // user route
   Route::resource('Musers','UsersController');
    // Banner
    Route::resource('Mbanner','BannerController');
    // Brand
    Route::resource('Mbrand','BrandController');
    // Profile``
    Route::get('/Mprofile','ManagerController@profile')->name('manager-profile');
    Route::post('/Mprofile/{id}','ManagerController@profileUpdate')->name('Mprofile-update');
    // Category
    Route::resource('/Mcategory','MCategoryController');
    // Product
    Route::resource('/Mproduct','MProductController');
    // Ajax for sub category
    Route::post('/Mcategory/{id}/child','MCategoryController@getChildByParent');
    // POST category
    Route::resource('/Mpost-category','MPostCategoryController');
    // Post tag
    Route::resource('/Mpost-tag','MPostTagController');
    // Post
    Route::resource('/Mpost','MPostController');
    // Message
    Route::resource('/Mmessage','MMessageController');
    Route::get('/Mmessage','MMessageController@index')->name('Mmessage.index');
    Route::get('/Mmessage/five','MMessageController@messageFive')->name('Mmessages.five');
Route::get('esettings','EmployeeController@settings')->name('Esettings');
    Route::post('esetting/update','EmployeeController@settingsUpdate')->name('Esettings.update');
    // Order
    Route::resource('/Morder','MOrderController');
    // Shipping
    Route::resource('/Mshipping','MShippingController');
    // Coupon
    Route::resource('/Mcoupon','MCouponController');
    // // Settings
    Route::get('Msettings','ManagerController@settings')->name('Msettings');
    Route::post('Msetting/update','ManagerController@settingsUpdate')->name('Msettings.update');

    // Notification
    Route::get('/Mnotification/{id}','MNotificationController@show')->name('manager.notification');
    Route::get('/Mnotifications','MNotificationController@index')->name('Mall.notification');
    Route::delete('/Mnotification/{id}','MNotificationController@delete')->name('Mnotification.delete');
    // Password Change
    Route::get('Mchange-password', 'ManagerController@changePassword')->name('Mchange.password.form');
    Route::post('Mchange-password', 'ManagerController@changPasswordStore')->name('Mchange.password');
    //review
    Route::get('/Muser-review','MProductReviewController@index')->name('manager.review.index');
    Route::delete('/Muser-review/delete/{id}','MProductReviewController@destroy')->name('manager.productreview.delete');
    Route::get('/Muser-review/edit/{id}','MProductReviewController@edit')->name('manager.productreview.edit');
    Route::patch('/Muser-review/update/{id}','MProductReviewController@update')->name('manager.productreview.update');
    // commente
    Route::resource('/Mcomment','MPostCommentController');
    Route::get('Morder/pdf/{id}','OrderController@pdf')->name('Morder.pdf');
    Route::get('Morder1/','OrderController@orderpdf')->name('Morder.orderPDF');
    Route::get('EPRODUCT/','ProductController@export')->name('EPRODUCT.productEXCEL');
    // Route::get('/user-post/comment','PostCommentController@index')->name('backend.post-comment.index');
    // Route::delete('/user-post/comment/delete/{id}','PostCommentController@destroy')->name('backend.post-comment.delete');
    // Route::get('/user-post/comment/edit/{id}','PostCommentController@edit')->name('backend.post-comment.edit');
    // Route::patch('/user-post/comment/udpate/{id}','PostCommentController@update')->name('backend.post-comment.update');
});




Route::group(['prefix'=>'/admin','middleware'=>['auth','admin']],function(){
    Route::get('/','EmployeeController@index')->name('admin');
    Route::get('/file-manager',function(){
        return view('employee.layouts.file-manager');
    })->name('file-manager');
    // user route
    Route::resource('users','UsersController');
    // Banner
    Route::resource('Ebanner','EBannerController');
    // Brand
    Route::resource('Ebrand','EBrandController');
    // Profile``
    Route::get('/Eprofile','EmployeeController@profile')->name('EMP-profile');
    Route::post('/Eprofile/{id}','EmployeeController@profileUpdate')->name('EMP.profile-update');
    // Category
    Route::resource('/Ecategory','ECategoryController');
    // Product
    Route::resource('/Eproduct','EProductController');
    // Ajax for sub category
    Route::post('/Ecategory/{id}/child','ECategoryController@getChildByParent');
    // POST category
    Route::resource('/Epost-category','EPostCategoryController');
    // Post tag
    Route::resource('/Epost-tag','EPostTagController');
    // Post
    Route::resource('/Epost','EPostController');
    // Message
    Route::resource('/Emessage','EMessageController');
    Route::get('/Emessage','EMessageController@index')->name('Emessage.index');
    Route::get('/Emessage/five','EMessageController@messageFive')->name('Emessages.five');

    // Order
    Route::resource('/Eorder','EOrderController');
    // Shipping
    Route::resource('/Eshipping','EShippingController');
    // Coupon
    Route::resource('/Ecoupon','ECouponController');
    // Settings
   
    // Notification
   
    Route::get('/enotification/{id}','ENotificationController@show')->name('Eadmin.notification');
    Route::get('/enotifications','ENotificationController@index')->name('Eall.notification');
    Route::delete('/enotification/{id}','ENotificationController@delete')->name('Enotification.delete');
    // Route::resource('/enotifications','ENotificationController');
    // Route::delete('/enotification/{id}','ENotificationController@delete')->name('enotifications.delete');
    // Route::get('/enotifications/{id}','ENotificationController@show')->name('enotifications.show');
    
    // Password Change
    Route::get('Echange-password', 'EmployeeController@changePassword')->name('EMP.change.password.form');
    Route::post('Echange-password', 'EmployeeController@changPasswordStore')->name('EMP.change.password');
    //review
    Route::get('/Euser-review','EProductReviewController@index')->name('EMP.review.index');
    Route::delete('/Euser-review/delete/{id}','EProductReviewController@destroy')->name('EMP.productreview.delete');
    Route::get('/Euser-review/edit/{id}','EProductReviewController@edit')->name('EMP.productreview.edit');
    Route::patch('/Euser-review/update/{id}','EProductReviewController@update')->name('EMP.productreview.update');
    // commente
    Route::resource('/Ecomment','EPostCommentController');
    Route::get('eorder/pdf/{id}','EOrderController@pdf')->name('eorder.pdf');
    Route::get('eorder/','EOrderController@orderpdf')->name('eorder.orderPDF');
//CUPON
   
    // Settings
    Route::get('esettings','EmployeeController@settings')->name('Esettings');
    Route::post('esetting/update','EmployeeController@settingsUpdate')->name('Esettings.update');
    Route::get('PRODUCT/','ProductController@export')->name('PRODUCT.productEXCEL');

    

});






//storekeeper
Route::group(['prefix'=>'/storekeeper','middleware'=>['auth','storekeeper']],function(){
    Route::get('/','StorekeeperController@index')->name('storekeeper');
    // Route::get('/file-manager',function(){
    //     return view('storekeeper.layouts.file-manager');
    // })->name('file-manager');
    // user route
   // Route::resource('SKusers','UsersController');
    // Banner
    Route::resource('SKbanner','SKBannerController');
    // Brand
    Route::resource('SKbrand','SKBrandController');
    // Profile``
    Route::get('/SKprofile','StorekeeperController@profile')->name('SK-profile');
    Route::post('/Eprofile/{id}','StorekeeperController@profileUpdate')->name('SK.profile-update');
    // Category
    Route::resource('/SKcategory','SKCategoryController');
    // Product
    Route::resource('/SKproduct','SKProductController');
    // Ajax for sub category
    Route::post('/SKcategory/{id}/child','SKCategoryController@getChildByParent');
    // POST category
    Route::resource('/SKpost-category','SKPostCategoryController');
    // Post tag
    Route::resource('/SKpost-tag','SKPostTagController');
    // Post
    Route::resource('/SKpost','SKPostController');
    // Message
    Route::resource('/SKmessage','SKMessageController');
    Route::get('/SKmessage','SKMessageController@index')->name('SKmessage.index');
    Route::get('/SKmessage/five','SKMessageController@messageFive')->name('SKmessages.five');

    // Order
    Route::resource('/SKorder','SKOrderController');
    // Shipping
    Route::resource('/SKshipping','SKShippingController');
    // Coupon
    Route::resource('/SKcoupon','SKCouponController');
    // Settings
    Route::get('product1/','SKProductController@PDF')->name('SKproduct.PDF');
    Route::get('product2/','SKProductController@export')->name('productEXCEL');
    // Notification
    Route::resource('/SKnotifications','SKNotificationController');
    Route::delete('/SKnotification/{id}','SKNotificationController@delete')->name('SKnotifications.delete');
    Route::get('/SKnotification/{id}','SKNotificationController@show')->name('SKnotifications.show');
    
    // Password Change
    Route::get('SKchange-password', 'StorekeeperController@changePassword')->name('SK.change.password.form');
    Route::post('SKchange-password', 'StorekeeperController@changPasswordStore')->name('SK.change.password');
    //review
    Route::get('/SKuser-review','SKProductReviewController@index')->name('SK.review.index');
    Route::delete('/SKuser-review/delete/{id}','SKProductReviewController@destroy')->name('SK.productreview.delete');
    Route::get('/SKuser-review/edit/{id}','SKProductReviewController@edit')->name('SK.productreview.edit');
    Route::patch('/SKuser-review/update/{id}','SKProductReviewController@update')->name('SK.productreview.update');
    // commente
    Route::resource('/SKcomment','SKPostCommentController');
    Route::get('SKorder/pdf/{id}','SKOrderController@pdf')->name('SKorder.pdf');
    Route::get('SKorder/','SKOrderController@orderpdf')->name('SKorder.orderPDF');
//CUPON
   // Route::resource('/coupon','CouponController');
    // Settings
    Route::get('SKsettings','StorekeeperController@settings')->name('SKsettings');
    Route::post('SKsetting/update','StorekeeperController@settingsUpdate')->name('SKsettings.update');


});









// User section start
Route::group(['prefix'=>'/user','middleware'=>['user']],function(){

    Route::get('/','FrontendController@home')->name('home');

    // Frontend Routes
    Route::resource('/home', 'FrontendController');
    Route::get('/about-us','FrontendController@aboutUs')->name('about-us');
    Route::get('/contact','FrontendController@contact')->name('contact');
    Route::post('/contact/message','MessageController@store')->name('contact.store');
    Route::get('product-detail/{slug}','FrontendController@productDetail')->name('product-detail');
    Route::post('/product/search','FrontendController@productSearch')->name('product.search');
    Route::get('/product-cat/{slug}','FrontendController@productCat')->name('product-cat');
    Route::get('/product-sub-cat/{slug}/{sub_slug}','FrontendController@productSubCat')->name('product-sub-cat');
    Route::get('/product-brand/{slug}','FrontendController@productBrand')->name('product-brand');
    // Cart section
    Route::get('/add-to-cart/{slug}','CartController@addToCart')->name('add-to-cart');
    Route::post('/add-to-cart','CartController@singleAddToCart')->name('single-add-to-cart');
    Route::get('cart-delete/{id}','CartController@cartDelete')->name('cart-delete');
    Route::post('cart-update','CartController@cartUpdate')->name('cart.update');
    
    Route::get('/cart',function(){
        return view('frontend.pages.cart');
    })->name('cart');
    Route::get('/checkout','CartController@checkout')->name('checkout');
    // Wishlist
    Route::get('/wishlist',function(){
        return view('frontend.pages.wishlist');
    })->name('wishlist');
    Route::get('/wishlist/{slug}','WishlistController@wishlist')->name('add-to-wishlist');
    Route::get('wishlist-delete/{id}','WishlistController@wishlistDelete')->name('wishlist-delete');
    Route::post('cart/order','OrderController@store')->name('cart.order');
    //Route::get('order/pdf/{id}','OrderController@pdf')->name('order.pdf');
    Route::get('/income','OrderController@incomeChart')->name('product.order.income');
    // Route::get('/user/chart','AdminController@userPieChart')->name('user.piechart');
    Route::get('/product-grids','FrontendController@productGrids')->name('product-grids');
    Route::get('/product-lists','FrontendController@productLists')->name('product-lists');
    Route::match(['get','post'],'/filter','FrontendController@productFilter')->name('shop.filter');
    // Order Track
    Route::get('/product/track','OrderController@orderTrack')->name('order.track');
    Route::post('product/track/order','OrderController@productTrackOrder')->name('product.track.order');
    // Blog
    Route::get('/blog','FrontendController@blog')->name('blog');
    Route::get('/blog-detail/{slug}','FrontendController@blogDetail')->name('blog.detail');
    Route::get('/blog/search','FrontendController@blogSearch')->name('blog.search');
    Route::post('/blog/filter','FrontendController@blogFilter')->name('blog.filter');
    Route::get('blog-cat/{slug}','FrontendController@blogByCategory')->name('blog.category');
    Route::get('blog-tag/{slug}','FrontendController@blogByTag')->name('blog.tag');
    
    // NewsLetter
    Route::post('/subscribe','FrontendController@subscribe')->name('subscribe');
    
    // Product Review
    Route::resource('/review','ProductReviewController');
    Route::post('product/{slug}/review','ProductReviewController@store')->name('review.store');
    
    // Post Comment
    Route::post('post/{slug}/comment','PostCommentController@store')->name('post-comment.store');
    Route::resource('/comments','PostCommentController');
    // Coupon
    Route::post('/coupon-store','CouponController@couponStore')->name('coupon-store');
    // Payment
    Route::get('payment', 'PayPalController@payment')->name('payment');
    Route::get('cancel', 'PayPalController@cancel')->name('payment.cancel');
    Route::get('payment/success', 'PayPalController@success')->name('payment.success');
    Route::post('paymentcallback', 'ChapaController@success')->name('payment.success');
    Route::get('pay', 'ChapaController@initialize')->name('pay');
    Route::get('paymentcallback', 'ChapaController@success')->name('payment.success');

    // The callback url after a payment
    Route::get('callback/{reference}', 'ChapaController@callback')->name('callback');

   // Route::resource('user','UsersController')->name('user');

    Route::get('/','FrontendController@home')->name('user');
//     //  Profile
     Route::get('/profile','HomeController@profile')->name('user-profile');
     Route::post('/profile/{id}','HomeController@profileUpdate')->name('user-profile-update');
    //  Order
    Route::get('/order',"HomeController@orderIndex")->name('user.order.index');
    Route::get('/order/show/{id}',"HomeController@orderShow")->name('user.order.show');
    Route::get('/order/edit/{id}',"HomeController@orderedit")->name('user.order.edit');
    Route::patch('/order/update/{id}',"HomeController@orderupdate")->name('user.order.update');
    Route::delete('/order/delete/{id}','HomeController@userOrderDelete')->name('user.order.delete');
    // Product Review
    Route::get('/user-review','HomeController@productReviewIndex')->name('user.productreview.index');
    Route::delete('/user-review/delete/{id}','HomeController@productReviewDelete')->name('user.productreview.delete');
    Route::get('/user-review/edit/{id}','HomeController@productReviewEdit')->name('user.productreview.edit');
    Route::patch('/user-review/update/{id}','HomeController@productReviewUpdate')->name('user.productreview.update');

    // Post comment
    Route::get('/user-post/comment','HomeController@userComment')->name('user.post-comment.index');
    Route::delete('/user-post/comment/delete/{id}','HomeController@userCommentDelete')->name('user.post-comment.delete');
    Route::get('/user-post/comment/edit/{id}','HomeController@userCommentEdit')->name('user.post-comment.edit');
    Route::patch('/user-post/comment/udpate/{id}','HomeController@userCommentUpdate')->name('user.post-comment.update');

    // Password Change
    Route::get('change-password', 'HomeController@changePassword')->name('user.change.password.form');
    Route::post('change-password', 'HomeController@changPasswordStore')->name('user.change.password');

});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

