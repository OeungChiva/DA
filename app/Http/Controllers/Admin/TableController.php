<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Table;


class TableController extends Controller
{
    //==================Show All Menu=======================//
    public function table() {
        $table = Table::orderByDesc('id')->get();
        $count = 1;
        return view(
            'admin.home.table.list_table',
            compact(
                'count',
                'table'
            )
        );
        //return view('admin.home.table.list_table');
    }

    //==================End Method=======================//

    //==================Show Create Menu Form=======================//
    public function create_table() {
        return view('admin.home.table.create_table');
    }

     //==================Store Create Menu =======================//
    public function create_tablePost(Request $request) {
        //return view('admin.home.users.create_users');
        $data['name'] = $request -> table_name;
        $data['guest'] = $request -> table_guest;
        $data['status'] = 'Available';
        $data['location'] = $request -> table_location;

            Table::create($data);
            //return redirect('/admin/users')->with('success', 'User Created !');
            return redirect()->back()->with("success","Table Created success!");
    }
    //==================Store Create Menu =======================//
    public function update_table($id)
    {
        $table = Table::where('id',$id)->first();
        return view('admin.home.table.update_table',['table'=>$table]);

    }
    //================== Store Update Menu=======================//
    public function update_tablePost(Request $request, $id)
    {
        $table = Table::find($id);
        $table->name=$request->table_name;
        $table->guest=$request->table_guest;
        $table->location=$request->table_location;
        $table->save();
        return redirect()->back()->with("success","Updated Table successfully!");
    }
    //==================Delete Menu=======================//
    public function delete_table($id_table) {
        $delete = Table::where('id', $id_table)->first();
        $delete->delete();
        return redirect('/admin/table')
        ->with("success","Table deleted successfully!");
    }
}

