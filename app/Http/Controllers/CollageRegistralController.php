<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class CollageRegistralController extends Controller
{

    public function CollageRegistralDashboard(){
        return view('collage_registral.index');
    }


    public function CollageRegistralLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect("/");
    }
    public function CollageRegistralLogin(){
        return view('login');
    }

    public function CollageRegistralProfile(){
        $id = Auth::user()->id;
        $profileData =User::find($id);

        return view('collage_registral.collage_registral_profile_view' ,compact('profileData'));

    }

    public function CollageRegistralProfileStore(Request $request){
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

    public function CollageRegistralChangePassword(){
        $id = Auth::user()->id;
        $profileData =User::find($id);
        return view('collage_registral.collage_registral_change_password',compact('profileData'));
    }

    public function CollageRegistralUpdatePassword(Request $request){

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

    public function CollageRegistralChat(){
        return view('collage_registral.collageregistralchat');
    }
    public function CollageRegistralPosts(){
        return view('collage_registral.posts');
    }
    //
}
