<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class DepartmentHeadController extends Controller
{
    public function DepartmentHeadDashboard(){
        return view('department_head.index');
    }

    public function DepartmentHeadLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect("/");
    }
    public function DepartmentHeadLogin(){
        return view('login');
    }

    public function DepartmentHeadProfile(){
        $id = Auth::user()->id;
        $profileData =User::find($id);

        return view('department_head.department_head_profile_view' ,compact('profileData'));

    }

    public function DepartmentHeadProfileStore(Request $request){
        $id = Auth::user()->id;
        $data =User::find($id);
        $data->username =$request->username;
        $data->name =$request->name;
        $data->email =$request->email;
        $data->phone =$request->phone;
        $data->address =$request->address;

        if($request->file('photo')){
            $file =$request->file('photo');
            @unlink(public_path('upload/admin_images/'.$data->photo));
            $filename =date('ymdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_image'),$filename);
            $data['photo']=$filename;
        }

        $data ->save();

        $notification =array(
            'message'=>'Collagedean profile Update Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);

    }

    public function DepartmentHeadChangePassword(){
        $id = Auth::user()->id;
        $profileData =User::find($id);
        return view('department_head.department_head_change_password',compact('profileData'));
    }

    public function DepartmentHeadUpdatePassword(Request $request){

        if(!Hash::check($request->old_password, auth::user()->password)){
            $notification =array(
                'message'=>'Old Password does not match',
                'alert-type'=>'error'
            );
            return back()->with($notification);
    
        }
        User::whereId(auth()->user()->id)->update([
            'password'=>Hash::make($request->new_password)
        ]);

        $notification =array(
            'message'=>'Password Change Successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);

    }

    public function DepartmentHeadChat(){
        return view('department_head.departmentheadchat');
    }

    public function DepartmentHeadPosts(){
        return view('department_head.posts');
    }
    //
}
