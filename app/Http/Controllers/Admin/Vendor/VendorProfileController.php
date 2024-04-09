<?php

namespace App\Http\Controllers\Admin\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Traits\Common_trait;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;


class VendorProfileController extends Controller
{
    use Common_trait;
    
    public function register(Request $req)
    {
       if(Auth::user()){
        return back();
       }
        if($req->method()=='POST'){   
            $req->validate([
                'name' => 'required',
                'phone' => 'required|numeric|digits:10|unique:users',
                'email' => 'required|unique:users|email:rfc,dns',
                'password' => 'required',
                'referral' => 'exists:users,id|nullable',
                
            ]);
            $data = [
                'name'=>$req->name,
                'email'=>$req->email,
                'phone'=>$req->phone,
                'role' => "vendor",
                'referral' => $req->referral,
                'password'=>Hash::make($req->password),
            ];

                
            
            $data = User::create($data);
            $req->session()->flash('register', 'Congratulations, Your Account Has Been Successfully Created.');
           return redirect()->route('admin/login'); 
        }
        return view('admin.vendor.pages.supplier_register');
    }

    public function logout(Request $req)
    {
        Auth::logout();
        $req->session()->flash('status', 'logout successful!');
        return redirect('/admin/login');
    }

    public function vendor_profile(Request $req)
    {
         $data = Auth::user();
         if($req->method()=='POST'){
                $validated = $req->validate([
                    'name' => 'required|max:10',
                    'email' => 'required',
                    'avatar_image' => 'image|mimes:jpg,jpeg,png',
                    'gst_certificate' => 'image|mimes:jpg,jpeg,png',
                    'cancelled_cheque' => 'image|mimes:jpg,jpeg,png',
                    'bank_account_number' => 'confirmed'
                ]);

                $url = $req->old_avatar_image;
                $url1 = $req->old_gst_certificate;
                $url2 = $req->old_cancelled_cheque;
                

                if($req->file('avatar_image')) {
                    if(is_file("uploads/".$req->old_avatar_image)){
                        unlink("uploads/".$req->old_avatar_image); 
                    }
                    $path = 'uploads' ;
                    $url = $this->file( $req->file('avatar_image') , $path);
                }
                if($req->file('gst_certificate')) {
                    if(is_file("uploads/".$req->old_gst_certificate)){
                        unlink("uploads/".$req->old_gst_certificate); 
                    }
                    $path = 'uploads' ;
                    $url1 = $this->file( $req->file('gst_certificate') , $path);
                }
                
                if($req->file('cancelled_cheque')) {
                    if(is_file("uploads/".$req->old_cancelled_cheque)){
                        unlink("uploads/".$req->old_cancelled_cheque); 
                    }
                    $path = 'uploads' ;
                    $url2 = $this->file( $req->file('cancelled_cheque') , $path);
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
                    'gst'=>$req->gst,
                    'bank_name'=>$req->bank_name,
                    'user_bank_account_name'=>$req->user_bank_account_name,
                    'bank_account_number'=>$req->bank_account_number,
                    'bank_ifsc_code'=>$req->bank_ifsc_code,
                    'bank_branch'=>$req->bank_branch,
                    'avatar_image'=> $url,
                    'gst_certificate'=> $url1,
                    'cancelled_cheque'=> $url2,
                ];


                User::where('id', $req->id)->update($userdata);
                $req->session()->flash('update_profile', 'Update Profile Successful!');
                return redirect('/vendor/vendor-profile');

            }
        return view('admin.vendor.pages.vendor_profile', ['users' => $data]);
    }

 public function vendor_change_password(Request $req)
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
        return view('admin.vendor.pages.vendor_change_password');
    }


}
