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
use Yajra\DataTables\DataTables;

class AccountController extends Controller
{
    use Common_trait;
    
    
   public function login(Request $req){
       
       if(Auth::user()){
            return back();
       }
       
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
                    return redirect('/admin/login')->with('login_msg', 'Login successful!');
                  }
            }
            return back()->withErrors([
                'email' => 'Please Enter Valid Password',
                'password' => 'Please Enter Valid Password',
            ]);
        }
        return view('frant.login');
    }
    
      public function logout(Request $req)
    {
        Auth::logout();
        $req->session()->flash('logout', 'logout successful!');
        return redirect('/admin/login');
    }



   
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
                // 'referred_by' => 'exists:users,id|nullable',
                
            ]);
            // echo ":test". $req->referred_by;exit;
            $query = User::where('referral', $req->referred_by)->count();
            // echo "test<pre>";
            // print_r($query);
            if ($query == 0){
                $alert = array(
                    'ref_message' ,'Wrong referral code passed!');
                    // 'referred_by' => 'invalid-code');
                return back()->with($alert);
            }

            $data = [
                'name'=>$req->name,
                'email'=>$req->email,
                'phone'=>$req->phone,
                'role' => "user",
                'referral' => explode('@',$req->email)[0],
                'referred_by' => $req->referred_by,
                'password'=>Hash::make($req->password),
            ];
            // print_r(print_r($data));
            // exit;
            $data = User::create($data);
            $req->session()->flash('register_user', 'Congratulations, Your Account Has Been Successfully Created.');
           return redirect()->route('login'); 
        }
        return view('frant.register');
    }

    public function user_show(Request $request){
        
        if ($request->ajax()) {
            $users = User::where("role", "user");
            return DataTables::of($users)
            ->editColumn('created_at', function ($contact){
                return date('d/m/y H:i', strtotime($contact->created_at));
            })
            ->toJson();
         }

        return view('admin.pages.user');
    }

    public function vendor_show(Request $request){
        if ($request->ajax()) {
            $users = User::where("role", "vendor")->orderBy('verified', 'asc');
            return DataTables::of($users)
            ->editColumn('created_at', function ($contact){
                return date('d/m/y H:i', strtotime($contact->created_at));
            })
            ->editColumn('avatar_image', function ($contact){
                 if($contact->avatar_image){ return 'uploads/'.$contact->avatar_image; }else{ return 'admin/1.png'; };
            })
            
            ->editColumn('aadhaar_front', function ($contact){
                 if($contact->aadhaar_front){ return 'uploads/'.$contact->aadhaar_front; }else{ return 'admin/1.png'; };
            })
            ->editColumn('aadhaar_back_side', function ($contact){
                 if($contact->aadhaar_back_side){ return 'uploads/'.$contact->aadhaar_back_side; }else{ return 'admin/1.png'; };
            })
            ->toJson();
         }

        return view('admin.pages.vendor');
    }
    
    public function view_user($id){
        $user = User::find($id);
         return view('admin.pages.view_user', compact('user'));
    }

    public function vendor_verification_p(Request $request){
        
        if ($request->ajax()) {
            $users = User::where("role", "vendor")->where("verified", "N");
            return DataTables::of($users)
            ->toJson();
         }

        return view('admin.pages.vendor_verification_p');
    }

    public function vendor_verify(Request $req, $verify, $id, ){
        $user = User::find($id);
        $user->verified = $verify;
        $user->save();
        $req->session()->flash('success', 'Updated Successfully.');
        return back();
    }
    
    public function user_status_update(Request $req, $status, $id, ){
        $user_id = $id;
        $status = $status;
        $user = User::find($user_id);
        $user->status = $status;
        $user->save();
        $req->session()->flash('status', 'Status Updated Successfully.');
        return back();
    }

    

  
    
    
    
    
    
}
