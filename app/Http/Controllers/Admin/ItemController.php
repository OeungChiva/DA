<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Menu;


class ItemController extends Controller
{
    //==================Show All Menu=======================//
    public function item() {
        $item = Item::orderByDesc('id')->get();
        $count = 1;
        return view(
            'admin.home.item.list_item',
            compact(
                'count',
                'item'
            )
        );
    }

    //==================End Method=======================//
    //==================Show Create Menu Form=======================//
    public function create_item() {
        $menu = Menu::all();
        return view('admin.home.item.create_item', compact('menu'));
    }

    //==================End Method=======================//

    //===============Store Create Items========================//
    public function create_itemPost(Request $request){
        $data['title'] = $request -> item_title;
        $data['price'] = $request -> item_price;
        $data['menu'] = $request -> item_menu;
        $data['description'] = $request -> item_description;  
        if($request->file('item_image')){
            $file = $request->file('item_image');
            $filename = date('YdmHi').$file->getClientOriginalName();
            $file -> move(public_path('upload/item_images'),$filename);
            $data['image'] = $filename;
        }              
        Item::create($data);
            //return redirect('/admin/users')->with('success', 'User Created !');
        return redirect()->back()->with("success","Item Created success!");
        
    }        
    //=====================End Method==========================//
    //==================Show Update Users Form=======================//
    public function update_item($id)
    {
        $item = Item::where('id',$id)->first();
        $menu = Menu::all();
        return view('admin.home.item.update_item',compact('item','menu'));
    }
    //=====================End Method==========================//
    //==================Store Update Item =======================//

    public function update_itemPost(Request $request, $id)
    {
        $item = Item::find($id);
        $item->title=$request->item_title;
        $item->price=$request->item_price;
        $item->menu=$request->item_menu;
        $item->description=$request->item_description;
        if($request->file('item_image')){
            $file = $request->file('item_image');
            $filename = date('YdmHi').$file->getClientOriginalName();
            $file -> move(public_path('upload/item_images'),$filename);
            $item['image'] = $filename;
        }
        $item->save();
        return redirect()->back()->with("success","Updated Item successfully!");
    }
    //=====================End Method==========================//


    //==================Delete Users=======================//
    public function delete_item($id_item)
    {
        $delete = Item::where('id', $id_item)->first();
       // File::delete(public_path().'/uploads/employees/'.$user->image);
        $delete->delete();
        return redirect('/admin/item')
        ->with("success","Item deleted successfully!");
    }
    //=====================End Method==========================//
}
