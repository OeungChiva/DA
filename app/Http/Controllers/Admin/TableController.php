<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Table;


class TableController extends Controller
{
    //==================Show All Table=======================//
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
        
    }
    //==================End Method=======================//

    //==================Show Create Table Form=======================//
    public function create_table() {
        return view('admin.home.table.create_table');
    }

     //==================Store Create Table =======================//
    public function create_tablePost(Request $request) {
        $data['name'] = $request -> table_name;
        $data['guest'] = $request -> table_guest;
        $data['status'] = $request -> table_status;
        $data['location'] = $request -> table_location;
            Table::create($data);
            return redirect()->back()->with("success","Table Created success!");
    }
    //==================Show Create Table Form=======================//
    public function update_table($id)
    {
        $table = Table::where('id',$id)->first();
        return view('admin.home.table.update_table',['table'=>$table]);
    }
    //================== Store Update Table=======================//
    public function update_tablePost(Request $request, $id)
    {
        $table = Table::find($id);
        $table->name=$request->table_name;
        $table->guest=$request->table_guest;
        $table->location=$request->table_location;
        $table->status=$request->table_status;
        $table->save();
        return redirect()->back()->with("success","Updated Table successfully!");
    }
    //==================Delete Table=======================//
    public function delete_table($id_table) {
        $delete = Table::where('id', $id_table)->first();
        $delete->delete();
        return redirect('/admin/table')
        ->with("success","Table deleted successfully!");
    }
}

