<?php

namespace App\Http\Controllers\Admin\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class Dashboard extends Controller
{
 
    public function dashboard(Request $req)
    {
        return view('admin.vendor.pages.dashboard');
    }
 
    public function referearn(Request $req)
    {
        $data['data'] = User::where( 'referred_by' , Auth::user()->referral )->get();
        return view('admin.vendor.pages.referearn',$data);
    }
    
}
