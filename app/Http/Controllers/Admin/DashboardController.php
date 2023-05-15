<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Validated;
use Intervention\Image\Facades\Image;
use App\Models\User;
use App\Models\Menu;
use App\Models\Item;


class DashboardController extends Controller
{
    //======Ensure that only authenticated admin users can access====//
    public function __construct()
    {
        $this->middleware('authadmin');
    }
    //=========================End Method============================//

    //==========================Dashboard Admin======================//
    public function dashboard()
    {
        $menus_count = Menu::all()->count();
        $items_count = Item::all()->count();
        $users_count = User::where('role', '0')->count();
        $users = User::where('role', '0')->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();
        $labels = [];
        $data = [];
        $colors = ['#EEE418','#18EE22','#EE8D18','#18EEDE','#18A3EE','#18EEB7',
            '#8618EE','#C418EE','#EE18AD','#EE1818','#18EEBA','#EE7318'];
        for ($i=1; $i<13; $i++) {
            $month = date('F', mktime(0,0,0,$i,1));
            $count = 0;
            foreach ($users as $user) {
                if ($user->month == $i) {
                    $count = $user->count;
                    break;
                }
            }
            array_push($labels, $month);
            array_push($data, $count);
        }
        $datasets = [
            [
                'label' => 'Users',
                'data' => $data,
                'backgroundColor' => $colors
            ]   
        ];
        return view('admin.home.dashboard', compact('menus_count','items_count', 'users_count', 'datasets', 'labels'));
    }
    //=========================End Method============================//   

    //==========================User Chart======================//
    // public function userChart()
    // {
    //     $users = User::where('role', '0')->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
    //     ->whereYear('created_at',date('Y'))
    //     ->groupBy('month')
    //     ->orderBy('month')
    //     ->get();
    //     $labels = [];
    //     $data = [];
    //     $colors = ['#EEE418','#18EE22','#EE8D18','#18EEDE','#18A3EE','#18EEB7',
    //     '#8618EE','#C418EE','#EE18AD','#EE1818','#18EEBA','#EE7318'];
    //     for($i=1;$i<13;$i++){
    //         $month = date('F',mktime(0,0,0,$i,1));
    //         $count = 0;
    //         foreach($users as $user){
    //             if($user->month == $i){
    //                 $count = $user->count;
    //                 break;
    //             }
    //         }
    //         array_push($labels,$month);
    //         array_push($data,$count);
    //     }
    //     $datasets = [
    //         [
    //             'label' => 'Users',
    //             'data' => $data,
    //             'backgroundColor' => $colors
    //         ]   
    //     ];
    //     return view('admin.home.dashboard',compact('datasets','labels'));
        
    // }
    //=========================End Method============================//   


}
