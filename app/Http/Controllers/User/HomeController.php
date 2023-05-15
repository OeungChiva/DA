<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Models\User;
use App\Models\Item;
use App\Models\Booking;



class HomeController extends Controller
{
    // public function index()
    // {
    //     return view('user.index');
    // }
    //================Home==================//
    public function home()
    {
        //$user = Auth::user();
        //only user with role=0 can access
        // if ($user->role != 0) {
        //     return redirect('/login');
        // }
        //$item = Item::paginate(6);
        $item = Item::all();
        return view('user.index',compact('item'));
    }
    //================End Method==================//

    //================Menu==================//
    public function menu()
    {
        $item = Item::all();
        return view('user.home.subpages.menu',compact('item'));
    }
    //================End Method==================//

    //================About==================//
    public function about()
    {
        return view('user.home.subpages.about');
    }
    //================End Method==================//

    //================Booking==================//
    public function booking()
    {
        return view('user.home.subpages.book');
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

}
