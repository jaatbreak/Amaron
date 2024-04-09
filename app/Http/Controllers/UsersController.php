<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Traits\Common_trait;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    use Common_trait;

    public function dashboard(Request $req)
    {
        return view('admin.pages.dashboard');
    }
    public function login(Request $req){
        if($req->method()=='POST'){
            $validated = $req->validate([
                'email' => 'required',
                'password' => 'required',
            ]);
            $credentials = array('email'=>$req->email,'password'=>$req->password);
            if (Auth::attempt($credentials)) {
                $req->session()->regenerate();
                if(auth()->check() && auth()->user()->role=='admin'){
                    $req->session()->flash('status', 'Login successful!');
                    return redirect()->intended('admin/dashboard');

                  }
                  elseif (auth()->check() && auth()->user()->role=='vendor') {
                    $req->session()->flash('status', 'Login successful!');
                    return redirect()->intended('vendor/dashboard');
                  }
                else{
                    $req->session()->flash('status', 'Login successful!');
                    return redirect('/');
                  }
            }
            return back()->withErrors([
                'email' => 'Please Enter Valid Password',
                'password' => 'Please Enter Valid Password',
            ]);
        }
        return view('admin.pages.login');
    }

    public function logout(Request $req)
    {
        Auth::logout();
        $req->session()->flash('logout', 'logout successful!');
        return redirect('/admin/login');
        // return 'sajkhd';
    }

    // public function crops(Request $request){

    //     $path = 'files/';
    //     $file = $request->file('avatar_image');
    //     $new_image_name = 'UIMG'.date('Ymd'). time().'.jpg';
    //     $upload = $file->move('uploads', $new_image_name);
    //     if($upload){
    //         return response()->json(['status'=>1, 'msg'=>'Image has been cropped successfully.', 'name'=>$new_image_name]);
    //     }else{
    //           return response()->json(['status'=>0, 'msg'=>'Something went wrong, try again later']);
    //     }
    // }

  public function user_profile(Request $req)
    {
         $data = Auth::user();

         if($req->method()=='POST'){
                $validated = $req->validate([
                    'name' => 'required|max:100',
                    'email' => 'required',
                    'avatar_image' => 'image|mimes:jpg,jpeg,png'
                ]);
                $url = $req->old_avatar_image;
                if($req->file('avatar_image')) {
                    if(is_file("uploads/".$req->old_avatar_image)){
                        unlink("uploads/".$req->old_avatar_image);
                    }
                    $path = 'uploads' ;
                    $url = $this->file( $req->file('avatar_image') , $path);
                }
            $userdata = [
                'email'=>$req->email,
                'name'=>$req->name,
                'phone'=>$req->phone,
                'description'=>$req->description,
                'city'=>$req->city,
                'state'=>$req->state,
                'country'=>$req->country,
                'pin_code'=>$req->pin_code,
                'address'=>$req->address,
                'avatar_image'=> $url,
            ];
          User::where('id', $req->id)->update($userdata);
          $req->session()->flash('update_profile', 'Update Profile Successful!');
          return redirect('/admin/user-profile');
         }
        return view('admin.pages.user_profile', ['users' => $data]);
    }

 public function user_change_password(Request $req)
    {
        if($req->method()=='POST'){
            $req->validate([
                'old_password' => 'required',
                'new_password' => 'required|confirmed',
            ]);

            if(!Hash::check($req->old_password, auth()->user()->password)){
                return back()->with("old_password", "Old Password Doesn't match!");
            }

            User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($req->new_password)
            ]);
            return back()->with("update_password", "Password changed successfully!");
        }
        return view('admin.pages.user_change_password');
    }



     public function popup(Request $req)
    {
        return view('frant.popup');
    }








}