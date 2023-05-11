<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

use App\Models\User;


class UserController extends Controller
{
    //==================Show All Users=======================//
    public function users(){
        $users = User::orderByDesc('id')->where('role', '0')->get();
        $count = 1;
        return view(
            'admin.home.users.list_users',
            compact(
                'count',
                'users'
            )
        );
        // return view('admin.home.user');
    }
    //==================Show Create Users Form=======================//
    public function create_user() {
        return view('admin.home.users.create_users');
    }
    //=====================End Method==========================//

    //===============Store Create Users========================//
    public function create_userPost(Request $request){
        $data['name'] = $request -> user_name;
        $data['email'] = $request -> user_email;
        $data['password'] = Hash::make($request -> user_password) ;
        $data['phone'] = $request -> user_phone;
        $data['address'] = $request -> user_address;             
            if($request->file('user_image')){
                $file = $request->file('user_image');
                $filename = date('YdmHi').$file->getClientOriginalName();
                $file -> move(public_path('frontend/user_images'),$filename);
                $data['image'] = $filename;
            }
            User::create($data);
            //return redirect('/admin/users')->with('success', 'User Created !');
            return redirect()->back()->with("success","User Created success!");
        
    }        
    //=====================End Method==========================//

    //==================Show Update Users Form=======================//
    public function update_user($id)
    {
        $user = User::where('id',$id)->first();
        return view('admin.home.users.update_users',['user'=>$user]);

    }
    //=====================End Method==========================//


    //==================Store Update Users =======================//

    // public function updatePost(Request $request, $id_user)
    // {

    //     $update_user = User::where('id', $id_user)->first();
    //     $img_user = $update_user->user_image;

    //     $update_user->name = $request->input('user_name');
    //     $update_user->email = $request->input('user_email');
    //     $update_user->phone = $request->input('user_phone');
    //     $update_user->address = $request->input('user_address');

    //     if ($request->hasFile('user_image')) {
    //         $img_path = 'public/frontend/user_images/' . $img_user;
    //         if (File::exists($img_path)) {
    //             File::delete($img_path);
    //         }
    //         $destination_path = 'public/frontend/user_images/';
    //         $image = $request->file('user_image');
    //         $image_name = $image->getClientOriginalName();
    //         $image->storeAs($destination_path, $image_name);

    //         $update_user['user_image'] = $image_name;
    //     }

    //     $update_user->update();

    //     return redirect('/admin/users')->with("success","User updated successfully!");
    // }
    public function update_userPost(Request $request, $id)
    {
        $user = User::find($id);
        $user->name=$request->user_name;
        $user->email=$request->user_email;
        $user->phone=$request->user_phone;
        $user->address=$request->user_address;
        if($request->file('user_image')){
            $file = $request->file('user_image');
            $filename = date('YdmHi').$file->getClientOriginalName();
            $file -> move(public_path('frontend/user_images'),$filename);
            $user['image'] = $filename;
        }
        $user->save();
        return redirect()->back()->with("success","Updated User successfully!");
    }
    //=====================End Method==========================//


    //==================Delete Users=======================//
    public function delete($id_user)
    {
        $delete = User::where('id', $id_user)->first();
       // File::delete(public_path().'/uploads/employees/'.$user->image);
        $delete->delete();
        return redirect('/admin/users')
        ->with("success","User deleted successfully!");
    }
    //=====================End Method==========================//
    

}
