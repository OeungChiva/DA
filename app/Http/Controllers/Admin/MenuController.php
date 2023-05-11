<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    //==================Show All Menu=======================//
    public function menu() {
        $menu = Menu::orderByDesc('id')->get();
        $count = 1;
        return view(
            'admin.home.menu.list_menu',
            compact(
                'count',
                'menu'
            )
        );
        //return view('admin.home.menu.list_menu');
    }

    //==================End Method=======================//

    //==================Show Create Menu Form=======================//
    public function create_menu() {
        return view('admin.home.menu.create_menu');
    }

    //==================End Method=======================//

    //==================Store Create Menu =======================//
    public function create_menuPost(Request $request) {
        //return view('admin.home.users.create_users');
        $data['name_menu'] = $request -> menu_name;
        $data['description'] = $request -> menu_description;
            Menu::create($data);
            //return redirect('/admin/users')->with('success', 'User Created !');
            return redirect()->back()->with("success","Menu Created success!");
    }

    //==================End Method=======================//
    //==================Store Create Menu =======================//

    public function update_menu($id)
    {
        $menu = Menu::where('id',$id)->first();
        return view('admin.home.menu.update_menu',['menu'=>$menu]);

    }
    //==================End Method=======================//
    //================== Store Update Menu=======================//
    public function update_menuPost(Request $request, $id)
    {
        $menu = Menu::find($id);
        $menu->name_menu=$request->menu_name;
        $menu->description=$request->menu_description;
        $menu->save();
        return redirect()->back()->with("success","Updated Menu successfully!");
    }
    //==================End Method=======================//


    //==================Delete Menu=======================//
    public function delete_menu($id_menu) {
        $delete = Menu::where('id', $id_menu)->first();
        $delete->delete();
        return redirect('/admin/menu')
        ->with("success","User deleted successfully!");
    }

    //==================End Method=======================//
    
}