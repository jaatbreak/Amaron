<?php

namespace App\Http\Controllers\admin\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Attributes;
use App\Models\AttributesValue;
use App\Traits\Common_trait;
use App\Models\Psssroduct;
use App\Models\Product;
use App\Models\Category;
use App\Models\Attributes_Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use Yajra\DataTables\DataTables;


class VendorProductController extends Controller
{
    use Common_trait;
    
    public function product(Request $request){
      
        if ($request->ajax()) {
          $users = Product::where('vendor_id',Auth::id())->orderBy("id", "asc");
          return DataTables::of($users)
          ->editColumn('product_image', function ($contact){
                if($contact->product_image){ return 'uploads/'.$contact->product_image; }else{ return 'admin/1.png'; };
          })
          ->toJson();
       }

       
        return view('admin.vendor.pages.vendor_product');
    }
    
    public function product_status(Request $req, $status, $id, ){
        $product = Product::find($id);
        $product->status = $status;
        $product->save();
        $req->session()->flash('status', 'Status Updated Successfully.');
        return back();
    }
    
    
    public function delete_product(Request $req){ 
        if(auth()->user()->verified == 'N'){
          return redirect()->back();
        }
        $image = Product::find($req->id);
        if($image){
        if($image->vendor_id == Auth::user()->id){
            
            if(is_file("uploads/".$image->product_image)){
                unlink("uploads/".$image->product_image); 
            }
            if($image->product_gallery){
                foreach(explode(',',$image->product_gallery) as $val){
                    if(is_file("uploads/".$val)){
                      unlink("uploads/".$val);
                    }     
                }
            }
            foreach(Attributes_Product::where('product_id', $req->id)->get()->toArray() as $val){
                if(is_file("uploads/".$val['product_image'])){
                unlink("uploads/".$val['product_image']);}
            }
       
        $data = Product::where('id', $req->id)->delete();
        $datas = Attributes_Product::where('product_id', $req->id)->delete();
        
        $req->session()->flash('delete_product', 'Delete Product Successful!');
        return redirect()->route('vendor/product');
        }else{
             $req->session()->flash('not_product_dalete', 'This Product Does Not Match Your Lists');
             return redirect()->route('vendor/product');
        }
        }else{
             $req->session()->flash('not_product_dalete', 'This Product Does Not Match Your Lists');
             return redirect()->route('vendor/product');
        }
    }
    
     public function edit_product(Request $req , $id){
        if(auth()->user()->verified == 'N'){
          return redirect()->back();
        }

        $datas = Product::findOrFail($id);
        if($req->method()=='POST'){
            $validated = $req->validate(
                    [
                        'product_name' => 'required',
                        'product_sale_price' => 'required',
                        'stock_quantity' => 'required',
                        'product_image' => 'image|mimes:jpg,jpeg,png',
                        'height' => 'numeric',
                        'width' => 'numeric',
                        'length' => 'numeric',
                        
                        'product_gallery[]' => 'image|mimes:jpg,jpeg,png'
                    ],
                );
                $product_imagess = $req->old_product_image;
                if($req->file('product_image')) {
                    if(is_file("uploads/".$req->old_product_image)){
                        unlink("uploads/".$req->old_product_image); 
                    }
                    $path = 'uploads' ;
                    $product_imagess = $this->file( $req->file('product_image') , $path);
                }
                if($req->remove_image){
                    foreach($req->remove_image as $removegalleryval){
                        if(is_file("uploads/".$removegalleryval)){
                             unlink("uploads/".$removegalleryval); 
                        }
                    }
                }
                if($req->old_p_gallery){
                    $product_gallery = $req->old_p_gallery; 
                }else{
                    $product_gallery = array();
                }
                if($req->file('product_gallery')){
                    foreach($req->file('product_gallery') as $val){
                        if($val) {
                          $path = 'uploads';
                          $product_gallery[] = $this->file($val, $path);
                        }
                    }
                }
                $product = new Product;
                
                $productdataupdate = [
                'product_name' => $req->product_name,
                'vendor_id' => auth()->user()->id,
                'slug' =>  $this->create_unique_slug($req->product_name,'products'),
                'product_desc' => $req->product_desc,
                'product_sort_desc' => $req->product_sort_desc,
                'product_specification' => $req->product_specification,
                'product_category' => json_encode($req->product_category, TRUE),
                'product_image' => $product_imagess ?? '',
                'product_gallery' => implode(',',$product_gallery),
                'product_regular_price' => $req->product_regular_price,
                'product_sale_price' => $req->product_sale_price,
                'product_regular_price_doller' => $req->product_regular_price_doller,
                'product_sale_price_doller' => $req->product_sale_price_doller,
                'stock_quantity' => $req->stock_quantity,
                'stock_status' => $req->stock_status,
                'hsn' => $req->hsn,
                'publish' => $req->publish,
                'allow_return' => $req->allow_return,
                'allow_cod' => $req->allow_cod,
                'on_sale' => $req->on_sale,
                'allow_reviews' => $req->allow_reviews,
                'weight' => $req->weight,
                'height' => $req->height,
                'width' => $req->width,
                'length' => $req->length,
                'sgst' => $req->sgst,
                'cgst' => $req->cgst,
                'igst' => $req->igst
                ];
                
                
                $product::where('id',$id)->update($productdataupdate);
                
                $req->session()->flash('edit_category', 'Edit Category Successful!');
                return redirect()->route('vendor/product');
        }
        $cat_data['category'] =  Category::all();
        $dataaa['attributes'] = Attributes::get();
        $Attributes_Product = Attributes_Product::where('product_id',$id)->get()->toArray();
        return view('/admin/vendor/pages/vendor_edit_product' , ['edit_product' => $datas,'Attributes_Product'=>$Attributes_Product], $cat_data, $dataaa );
       
     }
    
    
    
    
    
    
    
    
    public function add_product(Request $req){

      if(auth()->user()->verified == 'N'){
        return redirect()->back();
      }


        if($req->method()=='POST'){
            $validated = $req->validate(
                [
                    'product_name' => 'required|max:200',
                    'product_sale_price' => 'required',
                    'stock_quantity' => 'required',
                    'product_desc' => 'max:1000',
                    'product_sort_desc' => 'max:255',
                    'product_image' => 'mimes:jpeg,jpg,png,gif',
                    'product_gallery[]' => 'mimes:jpeg,jpg,png,gif',
                    'height' => 'numeric',
                    'width' => 'numeric',
                    'length' => 'numeric',
                        
                ],
            );
            $product_gallery = array();
            if($req->file('product_gallery')){
            foreach($req->file('product_gallery') as $val){
                if($val) {
                  $path = 'uploads' ;
                  $product_gallery[] = $this->file($val, $path);
                }
            }
            }
            if($req->file('product_image') ) {
              $path = 'uploads' ;
              $product_images = $this->file( $req->file('product_image') , $path,);
            }
            
            $product = new Product();
            $product->product_name = $req->product_name;
            $product->vendor_id = auth()->user()->id;
            $product->slug =  $this->create_unique_slug($req->product_name,'products');
            $product->product_desc = $req->product_desc;
            $product->product_sort_desc = $req->product_sort_desc;
            $product->product_specification = $req->product_specification;
            $product->product_category = json_encode($req->product_category, TRUE);
            $product->product_image = $product_images ?? '';
            $product->product_gallery = implode(',',$product_gallery) ?? '';
            $product->product_regular_price = $req->product_regular_price;
            $product->product_sale_price = $req->product_sale_price;
            $product->product_regular_price_doller = $req->product_regular_price_doller;
            $product->product_sale_price_doller = $req->product_sale_price_doller;
            $product->stock_quantity = $req->stock_quantity;
            $product->stock_status = $req->stock_status;
            $product->hsn = $req->hsn;
            $product->publish = $req->publish;
            $product->allow_return = $req->allow_return;
            $product->allow_cod = $req->allow_cod;
            $product->on_sale = $req->on_sale;
            $product->allow_reviews = $req->allow_reviews;
            $product->weight = $req->weight;
            $product->height = $req->height;
            $product->width = $req->width;
            $product->length = $req->length;
            $product->sgst = $req->sgst;
            $product->cgst = $req->cgst;
            $product->igst = $req->igst;
            $product->purchase_note = $req->purchase_note;
            $product->save();
            
            if($req->post('attr')){
              foreach ( $req->post('attr') as $main_key => $value_main) {
               if($_FILES['attr']['name'][$main_key]){
                    $product_images_attr = rand().$_FILES['attr']['name'][$main_key];
                    foreach($_FILES['attr']['name'] as $attr){
                        move_uploaded_file($_FILES['attr']['tmp_name'][$main_key],'uploads/'.$product_images_attr);  
                    }
               }
                $attr = new Attributes_Product;
                $attr->product_id = $product->id;
                $attr->slug =$this->create_unique_slug($value_main['product_name'] ?? $req->product_name,'products');
                $attr->product_name =$value_main['product_name'] ?? $req->product_name;
                $attr->attributes =json_encode($value_main['attr'], true);
                $attr->product_regular_price =$value_main['product_regular_price'] ?? $req->product_regular_price;
                $attr->product_sale_price =$value_main['product_sale_price'] ?? $req->product_sale_price;
                $attr->product_regular_price_doller =$value_main['product_regular_price_doller'] ?? $req->product_regular_price_doller;
                $attr->product_sale_price_doller =$value_main['product_sale_price_doller'] ?? $req->product_sale_price_doller;
                $attr->product_image =$product_images_attr ?? '';
                $attr->save();
              }
              
            }
            $req->session()->flash('add_product', 'Add Product Successful!');
            return redirect()->route('vendor/product');
        }
        $cat_data['category'] =  Category::all();
        $data['attributes'] = Attributes::get();
        return view('admin.vendor.pages.vendor_add_product', $data , $cat_data);        
    }

    public function get_attributes(Request $req){
        $header  = '';
        $nn = $req->num;
        foreach($req->ids as $id_attr){
            $attributesid = $id_attr;
            $attributesname = Attributes::where('id', $attributesid)->first();    
            $header .= '<div class="mix_use_varint_po">
                            <label>'.$attributesname->name.'</label>
                            <select class="form-control" name="attr['.$nn.'][attr]['.$attributesname->name.']">';
            $data =  AttributesValue::where('attributes_id',$attributesid)->get();
              foreach ($data as $key => $val) {
                $header .= '<option value="'.$val->name.'">'.$val->name.'</option>';
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
                                        <i class="menu-icon tf-icons ti  ti-arrows-cross"></i>
                                      </span>
                                      <span class="toggle_expend">
                                        <i class="menu-icon tf-icons ti ti-arrow-bar-down"></i>
                                      </span>
                                    </div>
                                  </div>
                                </div>
                                <div class="list_form" style="display:none;">
                                  <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                      <div class="mb-4">
                                        <label class="form-label">Product Variable Name</label>
                                        <input name="attr['.$nn.'][product_name]"  class="form-control" type="text" placeholder="Product Variable Name" value="">
                                      </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                      <div class="mb-4">
                                        <label class="form-label">Regular Price</label>
                                        <input name="attr['.$nn.'][product_regular_price]" class="form-control" type="text" placeholder="Regular Price" value="">
                                      </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                      <div class="mb-4">
                                        <label class="form-label">Sale Price</label>
                                        <input name="attr['.$nn.'][product_sale_price]" class="form-control" type="text" placeholder="Sale Price" value="">
                                      </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                      <div class="mb-4">
                                        <label class="form-label">Product Image</label>
                                        <input type="file" name="attr['.$nn.']" id="product_image" class="form-control">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>';
           echo $form;
    }
    
}
