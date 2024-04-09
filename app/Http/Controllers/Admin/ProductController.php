<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attributes;
use Illuminate\Http\Request;
use App\Models\AttributesValue;
use App\Traits\Common_trait;
use App\Models\Psssroduct;
use App\Models\Product;
use App\Models\Category;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    use Common_trait;

    public function product(Request $request){
    //      if($request->method() == "POST"){
    //     if($request->vendor_id){
    //       $user = DB::table('products')->where('vendor_id', $request->vendor_id)->get();
    //       print_r($user);
    //     }
    //  }
        if ($request->ajax()) {
        $users = Product::orderBy("verified", "asc");
        return DataTables::of($users)
        ->editColumn('product_image', function ($contact){
              if($contact->product_image){ return 'uploads/'.$contact->product_image; }else{ return 'admin/1.png'; };
        })
        ->toJson();
     }
     
    

      return view('admin.pages.product');
    }

    public function product_verify(Request $request){

      
      if ($request->ajax()) {
        $users = Product::where('verified', 'N');
        return DataTables::of($users)
        ->editColumn('product_image', function ($contact){
              if($contact->product_image){ return 'uploads/'.$contact->product_image; }else{ return 'admin/1.png'; };
        })
        ->toJson();
     }


      return view('admin.pages.product_verify');
    }


    public function product_verify_update(Request $req, $verify, $id, ){

        $user = Product::find($id);
        $user->verified = $verify;
        $user->save();
        $req->session()->flash('success', 'Updated Successfully.');
        return back();


    }

    public function add_product(Request $req){
        if($req->method()=='POST'){
            $validated = $req->validate(
                [
                    'product_name' => 'required',
                    'product_sale_price' => 'required',
                    'stock_quantity' => 'required',
                    'product_image' => 'image|mimes:jpg,jpeg,png',
                    'product_gallery' => 'image|mimes:jpg,jpeg,png'
                ],
            );
            $images = [];
            if ($req->file('product_gallery')){
                foreach($req->file('product_gallery') as $image)
                {
                    $imageName = rand(1,99).'.'.$image->extension();
                    $image->move('uploads', $imageName);
                    $images[] = $imageName;
                }
            }
            $data = [
                'product_name'=>$req->product_name,
                'slug'=> $this->create_unique_slug($req->product_name,'products'),
                'product_desc'=>$req->product_desc,
                'product_sort_desc'=>$req->product_sort_desc,
                'product_category'=>json_encode($req->product_category, TRUE),
                'is_featured'=>$req->is_featured,
                'is_popular'=>$req->is_popular,
                'product_image'=>$req->product_image,
                'product_gallery'=>json_encode($images),
                'product_regular_price'=>$req->product_regular_price,
                'product_sale_price'=>$req->product_sale_price,
                'product_regular_price_doller'=>$req->product_regular_price_doller,
                'product_sale_price_doller'=>$req->product_sale_price_doller,
                'stock_quantity'=>$req->stock_quantity,
                'stock_status'=>$req->stock_status,
                'hsn'=>$req->hsn,
                'publish'=>$req->publish,
                'allow_return'=>$req->allow_return,
                'allow_cod'=>$req->allow_cod,
                'on_sale'=>$req->on_sale,
                'allow_reviews'=>$req->allow_reviews,
                'weight'=>$req->weight,
                'height'=>$req->height,
                'width'=>$req->width,
                'length'=>$req->length,
                'sgst'=>$req->sgst,
                'cgst'=>$req->cgst,
                'igst'=>$req->igst,
            ];

            $data = new Product;
            $data = Product::save($data);
            $req->session()->flash('add_product', 'Add Product Successful!');
            return redirect()->route('admin/product');
        }
        $cat_data['category'] =  Category::all();
        $data['attributes'] = Attributes::get();
        return view('admin.pages.add_product',$data , $cat_data);

    }

    public function get_attributes(Request $req){
        $header  = '';
        foreach($req->ids as $id_attr){
            $attributesid = $id_attr;
            $attributesname = Attributes::where('id', $attributesid)->first();
            $header .= '<div class="mix_use_varint_po">
                            <label>'.$attributesname->name.'</label>
                            <select class="form-control" name="">';
            $data =  AttributesValue::where('attributes_id',$attributesid)->get();
              foreach ($data as $key => $val) {
                $header .= '<option value="">'.$val->name.'</option>';
              }
          $header .= '</select>
                        </div>';
          }
        $form = '';
        $form .= '<div class="varation_list_repeat border mt-2">
                                <div class="product_veriant_box_header">
                                  <div class="list_header">
                                    <div class="data_header_attr d-flex">
                                   '.$header.'
                                   </div>
                                    <div class="action_att_list">
                                      <span class="delete_list">
                                        <i class="icofont icofont-close"></i>
                                      </span>
                                      <span class="toggle_expend">
                                        <i class="icofont icofont-simple-down"></i>
                                      </span>
                                    </div>
                                  </div>
                                </div>
                                <div class="list_form" style="display:none;">
                                  <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                      <div class="mb-4">
                                        <label class="form-label">Product Variable Name</label>
                                        <input name="product_name" class="form-control" type="text" placeholder="Product Variable Name" value="">
                                      </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                      <div class="mb-4">
                                        <label class="form-label">Product Price</label>
                                        <input name="product_name" class="form-control" type="text" placeholder="Product Price" value="">
                                      </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                      <div class="mb-4">
                                        <label class="form-label">Sale Price</label>
                                        <input name="product_name" class="form-control" type="text" placeholder="Sale Price" value="">
                                      </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                      <div class="mb-4">
                                        <label class="form-label">Product Price ( Doller )</label>
                                        <input name="product_name" class="form-control" type="text" placeholder="Product Price ( Doller )" value="">
                                      </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                      <div class="mb-4">
                                        <label class="form-label">Sale Price ( Doller )</label>
                                        <input name="product_name" class="form-control" type="text" placeholder="Sale Price ( Doller )" value="">
                                      </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                      <div class="mb-4">
                                        <label class="form-label">Product Image</label>
                                        <input type="file" name="product_image" id="product_image" class="form-control">
                                      </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                      <div class="mb-4">
                                        <label class="form-label">Product Gallery</label>
                                        <input type="file" name="product_image" id="product_image" class="form-control">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>';
           echo $form;
    }




}