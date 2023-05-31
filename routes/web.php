<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\AuthUserController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\PaymentController;
use App\Http\Controllers\User\ItemDetailController;
use App\Http\Controllers\User\OrderHistoryController;
use App\Http\Controllers\User\ReviewController;



use App\Http\Controllers\Admin\AuthAdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\BookingController;




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

// Route::get('/', function () {
//     return view('user.index');
// })->name('home');
//=======================================================================//
//==============================User Route Here==========================//
//=======================================================================//
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    
});
/*============= User Auth route ==================*/
Route::controller(AuthUserController::class)->group(function () {
    Route::get('/login', 'user_login')->name('user_login');
    Route::post('/login', 'user_loginPost')->name('user_login.post');
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'registerPost')->name('register.post');
    Route::post('/logout', 'user_logout')->name('user_logout');
    Route::get('/signup', 'signup')->name('signup');

});

//================Profile Details Route=========================//
Route::controller(ProfileController::class)->middleware('authuser')->group(function () {
    Route::get('/profile', 'profile')->name('user.profile');
    Route::post('/profile', 'profilePost')->name('user_profile.post');
    
});

//================Subpages Route=========================//
Route::controller(HomeController::class)->group(function () {
    Route::get('/menu', 'menu')->name('user.menu');
    Route::get('/menu/{menuId}', 'showMenuItems')->name('user.menu_items');
    Route::get('/about', 'about')->name('user.about'); 
    Route::get('/booking', 'booking')->name('user.book'); 
    Route::post('/booking', 'bookingPost')->name('user.bookingPost'); 

});
//================Cart Route=========================//

// Route::controller(CartController::class)->group(function () {
//     Route::post('/addcart/{id}', 'addcartPost')->name('user.addcartPost');
//     Route::get('/cart', 'cart')->name('user.cart');
//     Route::get('/cart/{id}', 'delete_cart')->name('user.delete_cart');
//     Route::patch('/update_cart', 'update_cart')->name('user.update_cart');
// });

Route::controller(CartController::class)->middleware('authuser')->group(function () {
    Route::post('/addcart/{id}', 'addcartPost')->name('user.addcartPost');
    Route::get('/cart', 'cart')->name('user.cart');
    Route::get('/cart/{id}', 'delete_cart')->name('user.delete_cart');
    Route::patch('/update_cart', 'update_cart')->name('user.update_cart');
});
//================Cart Route=========================//
Route::controller(PaymentController::class)->middleware('authuser')->group(function () {
    Route::get('/card', 'card')->name('user.card');
    Route::post('/card', 'cardPost')->name('user.cardPost');
   // Route::get('/cash', 'cash')->name('user.cash');
    Route::get('/checkout', 'checkout')->name('user.checkout');
    Route::post('/checkout', 'checkoutPost')->name('user.checkoutPost');
});

Route::controller(ItemDetailController::class)->group(function () {
    Route::get('/item_detail/{itemId}', 'item_detail')->name('user.item_detail');
    Route::post('/add_cart/{id}', 'addcart')->name('user.addcart');

});

// Route::controller(OrderHistoryController::class)->group(function () {
//     Route::get('/order_history', 'order_history')->name('user.order_history');
//     Route::get('/invoice/{orderId}', 'invoice')->name('user.invoice');

// });
//================Order History and Invoice Route=========================//
Route::controller(OrderHistoryController::class)->middleware('authuser')->group(function () {
    Route::get('/order_history', 'order_history')->name('user.order_history');
    Route::get('/invoice/{orderId}', 'invoice')->name('user.invoice');
});

Route::controller(ReviewController::class)->middleware('authuser')->group(function () {
    Route::get('/review/{Orderid}', 'review')->name('user.review');
    Route::post('/review/{Orderid}', 'reviewPost')->name('user.reviewPost');

});



//=======================================================================//
//==============================End User Route Here======================//
//=======================================================================//

//=======================================================================//
//==============================Admin Route Here==========================//
//=======================================================================//

/*============= Admin Auth route ==================*/
Route::controller(AuthAdminController::class)->group(function () {
    Route::get('/admin', 'admin_login')->name('admin_login');
    Route::post('/admin', 'admin_loginPost')->name('admin_login.post');
    Route::get('/admin/logout', 'logout');
});



//================Admin Dashboard Route=========================//

Route::controller(DashboardController::class)->middleware('authadmin')->group(function () {
    Route::get('/admin/dashboard', 'dashboard')->name('dashboard'); 
    //Route::get('/admin/dashboard', 'userChart')->name('admin.userChart'); 
    });


//================Admin Management Route=========================//
Route::controller(AdminController::class)->middleware('authadmin')->group(function () {
    Route::get('/admin/check_current_password', 'check_current_password');
    Route::match(['get','post'],'/admin/update_password', 'update_password');
    Route::match(['get','post'],'/admin/update_details', 'update_details');  
    });

//================Admin Users Management Route=========================//
Route::controller(UserController::class)->middleware('authadmin')->group(function () {
    Route::get('/admin/users', 'users')->name('admin.users');
    Route::get('/admin/create_users', 'create_user')->name('admin.create_users');
    Route::post('/admin/create_users', 'create_userPost')->name('admin.create_users.post');
    Route::get('/admin/update_users/{id}', 'update_user')->name('admin.update_users');
    Route::post('/admin/update_users/{id}', 'update_userPost')->name('admin.update_users.post');
    Route::get('/admin/users/{id}', 'delete')->name('admin.delete_users');   
});
//================Admin Menus Management Route=========================//
Route::controller(MenuController::class)->middleware('authadmin')->group(function () {
    Route::get('/admin/menu', 'menu')->name('admin.menu');
    Route::get('/admin/create_menu', 'create_menu')->name('admin.create_menu');
    Route::post('/admin/create_menu', 'create_menuPost')->name('admin.create_menu.post');
    Route::get('/admin/update_menu/{id}', 'update_menu')->name('admin.update_menu');
    Route::post('/admin/update_menu/{id}', 'update_menuPost')->name('admin.update_menu.post');
    Route::get('/admin/menu/{id}', 'delete_menu')->name('admin.delete_menu');   
});

//================Admin Items Management Route=========================//
Route::controller(ItemController::class)->middleware('authadmin')->group(function () {
    Route::get('/admin/item', 'item')->name('admin.item');
    Route::get('/admin/create_item', 'create_item')->name('admin.create_item');
    Route::post('/admin/create_item', 'create_itemPost')->name('admin.create_item.post');
    Route::get('/admin/update_item/{id}', 'update_item')->name('admin.update_item');
    Route::post('/admin/update_item/{id}', 'update_itemPost')->name('admin.update_item.post');
    Route::get('/admin/item/{id}', 'delete_item')->name('admin.delete_item');   
});
//================Admin Items Management Route=========================//
Route::controller(BookingController::class)->middleware('authadmin')->group(function () {
    Route::get('/admin/reservation', 'booking')->name('admin.booking');
});




    

//=======================================================================//
//==============================End Admin Route==========================//
//=======================================================================//
