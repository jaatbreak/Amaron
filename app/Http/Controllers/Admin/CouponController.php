<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Traits\Common_trait;
use Illuminate\Support\Str;

class CouponController extends Controller
{
    
    use Common_trait;
    
    public function coupon(Request $req){
        $coupon = Coupon::orderBy("id", "asc")->get();
        return view('admin.pages.coupon', compact('coupon'));
    }
    
    
    public function add_coupon(Request $req){
        if($req->method()=='POST'){
            
            $validated = $req->validate(
                [
                    'coupon_code' => 'required',
                    'type' => 'required',
                    'discount' => 'required',
                    'start_date' => 'required',
                    'end_date' => 'required',
                    'image' => 'image|mimes:jpg,jpeg,png',
                ],
            );
            if($req->file('image') ) {
                $path = 'uploads' ;
                $image = $this->file( $req->file('image') , $path,);
            }
            $coupon = new Coupon();
            $coupon->coupon_code = $req->coupon_code;
            $coupon->type = $req->type;
            $coupon->discount = $req->discount;
            $coupon->min_value = $req->min_value;
            $coupon->start_date = $req->start_date;
            $coupon->end_date = $req->end_date;
            $coupon->message = $req->message;
            $coupon->desc = $req->desc;
            $coupon->image = $image ?? "";
            $coupon->save();
            $req->session()->flash('add_coupon', 'Add Coupon Successful!');
            return redirect()->route('admin/coupon');
        }
    return view('admin.pages.add_coupon');
    
        
    }

    public function delete_coupon(Request $req ){
        
            $coupon = Coupon::find($req->id);
            
            if(is_file("uploads/".$coupon->image)){
                unlink("uploads/".$coupon->image); 
            }
            
        $data = Coupon::where('id', $req->id)->delete();
        $req->session()->flash('delete_coupon', 'Delete Coupon Successful!');
        return redirect()->route('admin/coupon');
         
    }
    
    
        public function edit_coupon(Request $req , $id){
        
            $datas = Coupon::findOrFail($id);
            
            if($req->method()=='POST'){
                $validated = $req->validate(
                    [
                        'coupon_code' => 'required',
                        'type' => 'required',
                        'discount' => 'required',
                        'start_date' => 'required',
                        'end_date' => 'required',
                        'image' => 'image|mimes:jpg,jpeg,png',
                    ],
                );
                if($req->file('image')) {
                    if(is_file("uploads/".$req->old_image)){
                        unlink("uploads/".$req->old_image); 
                    }
                    
                    $path = 'uploads';
                    $coupon_image = $this->file( $req->file('image') , $path);
                }
                
                $coupon = new Coupon();
                $coupondataupdate = [
                    'coupon_code' => $req->coupon_code,
                    'type' => $req->type,
                    'discount' => $req->discount,
                    'min_value' => $req->min_value,
                    'start_date' => $req->start_date,
                    'end_date' => $req->end_date,
                    'message' => $req->message,
                    'desc' => $req->desc,
                    'image' => $coupon_image ?? '',
                ];
                $coupon::where('id',$id)->update($coupondataupdate);
                $req->session()->flash('edit_coupon', 'Edit Coupon Successful!');
                return redirect()->route('admin/coupon');
            }
            
            return view('admin.pages.edit_coupon', ['edit_coupon' => $datas,]);
            

         
    }
    
    
    
    
    
    public function coupon_status_update(Request $req, $status, $id, ){
        
        $coupon = Coupon::find($id);
        $coupon->status = $status;
        $coupon->save();
        $req->session()->flash('status', 'Status Updated Successfully.');
        return back();
        
    }
    public function excel_ei(Request $req){
        return view('admin.pages.datamanage');
        
    }


}

