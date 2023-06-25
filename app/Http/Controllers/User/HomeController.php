<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Item;
use App\Models\Booking;
use App\Models\Cart;
use App\Models\Menu;





class HomeController extends Controller
{
    // public function index()
    // {
    //     return view('user.index');
    // }
    //================Home==================//
    public function home()
    {
        $item = Item::paginate(9);
        //$item = Item::all();
        $user_id = Auth::id();
        $count = Cart::where('user_id',$user_id)->count();
        $menu = Menu::all();
        return view('user.index',compact('item','count','menu'));
    }
    //================End Method==================//

    //================Menu==================//
    public function menu()
    {
       // $item = Item::all();
        $item = Item::paginate(9);
        $user_id = Auth::id();
        $count = Cart::where('user_id',$user_id)->count();
        $menu = Menu::all();
        return view('user.home.subpages.menu',compact('item','count','menu'));
    }
    //================End Method==================//
    public function showMenuItems($menuId)
    {
        $user_id = Auth::id();
        $count = Cart::where('user_id',$user_id)->count();
        $item = Item::where('menu_id', $menuId)->paginate(9);
        //$item = Item::paginate(9);
        $menu = Menu::all();
        return view('user.home.subpages.menu_items', compact('count','item','menu'));
    }

    //================About==================//
    public function about()
    {
        $user_id = Auth::id();
        $count = Cart::where('user_id',$user_id)->count();
        return view('user.home.subpages.about',compact('count'));
    }
    //================End Method==================//

    //================Booking==================//
    public function booking()
    {
        $user_id = Auth::id();
        $count = Cart::where('user_id',$user_id)->count();
        return view('user.home.subpages.book',compact('count'));
    }
    //================End Method==================//
    //================BookingPost==================//
    public function bookingPost(Request $request)
    {
        $data['name'] = $request -> user_name;
        $data['email'] = $request -> user_email;
        $data['phone'] = $request -> user_phone;
        $data['guest'] = $request -> user_guest;  
        $data['date'] = $request -> user_date;  
        $data['time'] = $request -> user_time;  
        $data['message'] = $request -> user_message;  
                
        Booking::create($data);
            //return redirect('/admin/users')->with('success', 'User Created !');
        return redirect()->back()->with("success","Your Booking is confirmed!");
    }
    //================End Method==================//

    //================Search Item==================//   
    public function search(Request $request)
    {
        $user_id = Auth::id();
        $count = Cart::where('user_id', $user_id)->count();
        $menu = Menu::all();
        $search_text = $request->search;
        $item = Item::where('title', 'LIKE', "%$search_text%")
            ->orWhereHas('menus', function ($query) use ($search_text) {
                $query->where('name_menu', 'LIKE', "%$search_text%");
            })
            ->orWhere('menu_id', $search_text)
            ->paginate(6);
        return view('user.home.subpages.menu', compact('item', 'count', 'menu'));
    }
    
    
}
