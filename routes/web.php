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

use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;

use App\Http\Controllers\Admin\AuthAdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\TableController;






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
    //Route::match(['get','post'],'/change_password', 'change_password')->name('user.change_password');

    Route::get('/change_password', 'changePassword')->name('user.change-password');
    Route::post('/change_password', 'updatePassword')->name('user.update-password');


    
});

//================Subpages Route=========================//
Route::controller(HomeController::class)->group(function () {
    Route::get('/menu', 'menu')->name('user.menu');
    Route::get('/menu/{menuId}', 'showMenuItems')->name('user.menu_items');
    Route::get('/about', 'about')->name('user.about'); 
    Route::get('/booking', 'booking')->name('user.book'); 
    Route::post('/booking', 'bookingPost')->name('user.bookingPost'); 
    Route::get('/search', 'search')->name('user.search'); 


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
    Route::get('/cancel/{id}', 'cancel')->name('user.cancel');

});

Route::controller(ReviewController::class)->middleware('authuser')->group(function () {
    Route::get('/review/{orderId}', 'review')->name('user.review');
    Route::post('/review/{orderId}', 'reviewPost')->name('user.reviewPost');

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
//================Admin Bookings Management Route=========================//
Route::controller(BookingController::class)->middleware('authadmin')->group(function () {
    Route::get('/admin/booking', 'booking')->name('admin.booking');
    Route::get('/admin/create_booking', 'create_booking')->name('admin.create_booking');
    Route::post('/admin/create_booking', 'create_bookingPost')->name('admin.create_booking.post');
    Route::get('/admin/update_booking/{id}', 'update_booking')->name('admin.update_booking');
    Route::post('/admin/update_booking/{id}', 'update_bookingPost')->name('admin.update_booking.post');
    Route::get('/admin/booking/{id}', 'delete_booking')->name('admin.delete_booking');


});

//================Admin Orders Management Route=========================//
Route::controller(OrderController::class)->middleware('authadmin')->group(function () {
    Route::get('/admin/order', 'order')->name('admin.order');
    Route::get('/admin/create_order', 'create_order')->name('admin.create_order');
    Route::post('/admin/create_order', 'create_orderPost')->name('admin.create_order.post');
    Route::get('/admin/update_order/{id}', 'update_order')->name('admin.update_order');
    Route::post('/admin/update_order/{id}', 'update_orderPost')->name('admin.update_order.post');
    Route::post('/admin/update-order-status', 'updateOrderStatus')->name('admin.updateOrderStatus');
    Route::get('/admin/invoice/{id}', 'invoice')->name('admin.invoice');
    Route::get('/admin/order/{id}', 'delete_order')->name('admin.delete_order');   
    Route::get('/admin/invoice_pdf/{id}', 'invoice_pdf')->name('admin.invoice_pdf');

});

//================Admin Tables Management Route=========================//
Route::controller(TableController::class)->middleware('authadmin')->group(function () {
    Route::get('/admin/table', 'table')->name('admin.table');
    Route::get('/admin/create_table', 'create_table')->name('admin.create_table');
    Route::post('/admin/create_table', 'create_tablePost')->name('admin.create_table.post');
    Route::get('/admin/update_table/{id}', 'update_table')->name('admin.update_table');
    Route::post('/admin/update_table/{id}', 'update_tablePost')->name('admin.update_table.post');
    Route::get('/admin/table/{id}', 'delete_table')->name('admin.delete_table');   
});


    

//=======================================================================//
//==============================End Admin Route==========================//
//=======================================================================//
