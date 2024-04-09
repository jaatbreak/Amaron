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
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    use Common_trait;



      public function home(Request $req)
    {
        $data['selected_products'] = Product::where('verified','Y')->inRandomOrder()->get()->toArray();
        return view('frant.home.home',$data);
    }







}