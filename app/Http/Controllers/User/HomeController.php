<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Models\User;

class HomeController extends Controller
{
    // public function index()
    // {
    //     return view('user.index');
    // }
    //================Home==================//
    public function home()
    {
        $user = Auth::user();
        //only user with role=0 can access
        if ($user->role != 0) {
            return redirect('/login');
        }
        return view('user.index');
    }
    //================End Method==================//

    //================Menu==================//
    public function menu()
    {
        return view('user.home.subpages.menu');
    }
    //================End Method==================//

    //================About==================//
    public function about()
    {
        return view('user.home.subpages.about');
    }
    //================End Method==================//

    //================Booking==================//
    public function book()
    {
        return view('user.home.subpages.book');
    }
    //================End Method==================//

}
