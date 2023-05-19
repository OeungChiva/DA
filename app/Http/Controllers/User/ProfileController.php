<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use App\Models\User;
use App\Models\Cart;


class ProfileController extends Controller
{
    //====================Show Profile Details=====================//
    public function profile(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        $user_id = Auth::id();
        $count = Cart::where('user_id',$user_id)->count();
        return view('user.home.subpages.profile',compact('profileData','count'));
    } 
    //====================End Method===============================//
    //===============Store update Profile Details==================//
    public function profilePost(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data -> name = $request-> user_name;
        $data -> email = $request-> user_email;
        $data -> phone = $request-> user_phone;
        $data -> address = $request-> user_address;
        if($request->file('user_image')){
            $file = $request->file('user_image');
            $filename = date('YdmHi').$file->getClientOriginalName();
            $file -> move(public_path('frontend/user_images'),$filename);
            $data['image'] = $filename;
        }
        $data->save();
        return redirect()->back()->with("success","Update Profile success!");
    }
    //====================End Method===============================//

}
