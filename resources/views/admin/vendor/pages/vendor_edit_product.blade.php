@extends('admin.vendor.include.include')
@section('content')
<style>
.modal-body.main_image img {
    width: 100% !important;
    height: 100%;
}
    .p_a_name {
    display: block;
    white-space: nowrap;
    margin: 0;
    padding-top: 4px;
    padding-left: 6px;
}
img.product_image {
    height: 35px;
    width: 47px;
    float: right;
    object-fit: cover;
}
.product_gallery_aside_image {
    display: inline-block;
    text-align: center;
}
.remove_product_gallery_v:hover {
    background: #000;
    color: #fff;
}
.image_thubnail img {
    width: 100%;
    border: 1px solid #e9ecef;
    margin-top: 8px;
}
.remove_product_gallery_v {
    background: #ff8145;
    width: 21px;
    display: block;
    height: 21px;
    border-radius: 100%;
    font-size: 17px;
    padding: 0;
    line-height: 1.3;
    margin: auto;
    margin-top: 4px;
    color: #ffecec;
    cursor: pointer;
}
.remove_product_gallery:hover {
    background: #000;
    color: #fff;
}
.remove_product_gallery {
    background: #ff8145;
    width: 21px;
    display: block;
    height: 21px;
    border-radius: 100%;
    font-size: 17px;
    padding: 0;
    line-height: 1.3;
    margin: auto;
    margin-top: 4px;
    color: #ffecec;
    cursor: pointer;
}
.product_gallery img {
    width: 49px;
    height: 38px;
    object-fit: contain;
    border: 1px solid #e2dfdf;
    padding: 6px;
    margin-top: 6px;
}
.product_gallery_v img {
    width: 49px;
    height: 38px;
    object-fit: contain;
    border: 1px solid #e2dfdf;
    padding: 6px;
    margin-top: 6px;
}
.product_gallery_model .modal-dialog img {
    width: 100%;
    height: 300px;
    object-fit: contain;
    border: unset;
}
.product_gallery_model .modal-dialog .modal-body {
    padding: 0 !important;
}
</style>
    

 
<div class="container-xxl flex-grow-1 container-p-y">
                     <div class="row">
                     <div class="col-md-12 mb-4">
                           <div class="">
                              <div class="card-header d-flex justify-content-between pb-0">
                                 <div class="card-title mb-0">
                                    <h4 class="mb-0">Edit Product </h4>
                                    <small class="text-muted">Edit Products</small>
                                 </div>
                              </div>
                              
                           </div>
                        </div>

        <form method="POST" enctype="multipart/form-data">
            @csrf
            
                <div class="edit-profile">
                    <div class="row justify-content-center  ">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header pb-0">
                                    <h4 class="card-title mb-0">General Information</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="mb-4">
                                                <label class="form-label">Product Name</label>
                                                <input name="product_name" class="form-control" type="text" placeholder="Product Name" value="{{ old('product_name') ?? $edit_product->product_name  }}">
                                                @error('product_name')
                                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="mb-4">
                                                <label class="form-label">Product Description</label>
                                                <textarea class="form-control" name="product_desc" id="editor1">{{ old('product_name') ?? $edit_product->product_desc  }}</textarea>
                                                @error('product_desc')
                                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="mb-4">
                                                <label class="form-label">Short Description</label>
                                                <textarea class="form-control" name="product_sort_desc" placeholder="Short Description" rows="5">{{ old('product_name') ?? $edit_product->product_sort_desc  }}</textarea>
                                                @error('product_sort_desc')
                                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="mb-4">
                                                <label class="form-label">Product Specification</label>
                                                <textarea class="form-control" name="product_specification" id="editor2">{{ old('product_specification') ?? $edit_product->product_specification  }}</textarea>
                                                @error('product_specification')
                                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                             <div class="mb-4">
                                                <label class="form-label">Product Category</label>

                                                @php
                                                // echo "<pre>";
                                                   $cat = $edit_product->product_category; 
                                                    preg_match_all('!\d+!', $cat, $matches);
                                                @endphp
   


                                                    @foreach ($category as $val)
                                                        <label class="d-block" for="{{ $val->title }}">
                                                            <input class="checkbox_animated" id="{{ $val->title }}" name="product_category[]" value="{{ $val->id }}"  @if (in_array("$val->id", $matches['0'])) checked  @endif    type="checkbox"> {{ $val->title }}
                                                        </label>
                                                    @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
                <div class="edit-profile">
                    <div class="row justify-content-center  ">
                        <div class="col-xl-4 mt-4">
                            <div class="card">
                                <div class="card-header pb-0">
                                    <h4 class="card-title mb-0">Product Image</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="mb-4">
                                                <label class="form-label">Product Image</label>
                                                <input type="file" name="product_image" id="product_image"
                                                    class="form-control">
                                                    <input type="hidden" name="old_product_image" value="<?= $edit_product->product_image ?>">
                                                @error('product_sort_desc')
                                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                                @enderror
                                                
                                                <div class="image_thubnail">
                                                    <img src="{{ asset('') }}/uploads/<?= $edit_product->product_image ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 mt-4">
                            <div class="card">
                                <div class="card-header pb-0">
                                    <h4 class="card-title mb-0">Product Gallery</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="mb-4 class="field" align="left"">
                                                <label class="form-label">Product Gallery</label>
                                                <input type="file" name="product_gallery[]" id="product_gallery" class="form-control" multiple >
                                                @error('product_sort_desc')
                                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            
                                            
                                     <div class="product_gallery">
                                    <?php
                                    if($edit_product->product_gallery){
                                        foreach(explode(',',$edit_product->product_gallery) as $p_gallery_val){ 
                                        $p_image_id = explode('.',$p_gallery_val);
                                    ?>
                                    <div class="product_gallery_aside_image" id="remove_<?= $p_image_id[0] ?>">
                                    <img src="{{ asset('') }}/uploads/<?= $p_gallery_val; ?>" class="product_gallery_images" data-bs-toggle="modal" data-bs-target="#p_gaklery_<?= $p_image_id[0] ?>">
                                     <input type="hidden" name="old_p_gallery[]"  value="<?= $p_gallery_val; ?>">
                                     <div class="remove_product_gallery" data_image="<?= $p_gallery_val; ?>" data_target="remove_<?= $p_image_id[0] ?>" >×</div>
                                     </div>
                                     
                                    
                                    <div class="modal fade" id="p_gaklery_<?= $p_image_id[0] ?>" class="modal product_gallery_model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">View Image</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body main_image">
                                          <img src="{{ asset('') }}/uploads/<?= $p_gallery_val; ?>" max-width="100%" >
                                          </div>
                                          
                                        </div>
                                      </div>
                                    </div>

                                    <?php } } ?>
                                    </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="edit-profile">
                    <div class="row justify-content-center  ">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header pb-0">
                                    <h4 class="card-title mb-0">Prices</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">Regular Price</label>
                                                <input name="product_regular_price" class="form-control" type="number"
                                                    placeholder="Regular Price"
                                                    value="{{ old('product_regular_price') ?? $edit_product->product_regular_price }}">
                                                @error('product_regular_price')
                                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">Sale Price</label>
                                                <input name="product_sale_price" class="form-control" type="number"
                                                    placeholder="Sale Price" value="{{ old('product_sale_price') ?? $edit_product->product_sale_price}}">
                                                @error('product_sale_price')
                                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--<div class="col-sm-6 col-md-6">-->
                                        <!--    <div class="mb-4">-->
                                        <!--        <label class="form-label">Regular Price ( Doller )</label>-->
                                        <!--        <input name="product_regular_price_doller" class="form-control"-->
                                        <!--            type="number" placeholder="Regular Price ( Doller )"-->
                                        <!--            value="{{ old('product_regular_price_doller') ?? $edit_product->product_regular_price_doller }}">-->
                                        <!--        @error('product_regular_price_doller')-->
                                        <!--            <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>-->
                                        <!--        @enderror-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                        <!--<div class="col-sm-6 col-md-6">-->
                                        <!--    <div class="mb-">-->
                                        <!--        <label class="form-label">Sale Price ( Doller )</label>-->
                                        <!--        <input name="product_sale_price_doller" class="form-control"-->
                                        <!--            type="number" placeholder="Sale Price ( Doller )"-->
                                        <!--            value="{{ old('product_sale_price_doller') ?? $edit_product->product_sale_price_doller}}">-->
                                        <!--        @error('product_sale_price_doller')-->
                                        <!--            <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>-->
                                        <!--        @enderror-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="edit-profile">
                    <div class="row justify-content-center  ">
                        <div class="col-xl-12 mt-4 mb-4">
                            <div class="card">
                                <div class="card-header pb-0">
                                    <h4 class="card-title mb-0">Inventory</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Stock Quantity</label>
                                                <input name="stock_quantity" class="form-control" type="number"
                                                    placeholder="Stock Quantity" value="{{ old('stock_quantity') ?? $edit_product->stock_quantity }}">
                                                @error('stock_quantity')
                                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Stock Status</label>
                                                <select name="stock_status" class="form-control">
                                                    <option value="1" <?php if($edit_product->stock_status==1){ echo 'selected'; } ?> >In Stock</option>
                                                    <option value="0" <?php if($edit_product->stock_status==0){ echo 'selected'; } ?> >Out Of Stock</option>
                                                </select>
                                                @error('stock_status')
                                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="edit-profile">
                    <div class="row justify-content-center  ">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header pb-0">
                                    <h4 class="card-title mb-0">Tax</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">SGST Rate (%)</label>
                                                <input name="sgst" class="form-control" type="number"
                                                    placeholder="SGST Rate (%)" value="{{ old('sgst') ?? $edit_product->sgst }}">
                                                @error('sgst')
                                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">CGST Rate (%)</label>
                                                <input name="cgst" class="form-control" type="number"
                                                    placeholder="CGST Rate (%)" value="{{ old('cgst') ?? $edit_product->cgst}}">
                                                @error('cgst')
                                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">IGST Rate (%)</label>
                                                <input name="igst" class="form-control" type="number"
                                                    placeholder="IGST Rate (%)" value="{{ old('igst') ?? $edit_product->igst }}">
                                                @error('igst')
                                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="edit-profile">
                    <div class="row justify-content-center  ">
                        <div class="col-xl-12 mt-4 mb-4">
                            <div class="card">
                                <div class="card-header pb-0">
                                    <h4 class="card-title mb-0">Purchase Note</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Purchase Note</label>
                                                <textarea class="form-control" name="purchase_note" placeholder="Type Your Message" rows="5"><?= $edit_product->purchase_note ?></textarea>
                                                @error('purchase_note')
                                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="edit-profile">
                    <div class="row justify-content-center  ">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header pb-0">
                                    <h4 class="card-title mb-0">More Details</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">HSN code</label>
                                                <input name="hsn" class="form-control" type="text"
                                                    placeholder="HSN code" value="{{ old('hsn') ?? $edit_product->hsn }}">
                                                @error('hsn')
                                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">Publish Product</label>
                                                <select name="publish" class="form-control">
                                                    <option value="1" <?php if($edit_product->publish==1){ echo 'selected'; } ?> >Publish</option>
                                                    <option value="0" <?php if($edit_product->publish==0){ echo 'selected'; } ?> >Draft</option>
                                                </select>
                                                @error('publish')
                                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">Is Prodduct Returnable?</label>
                                                <select name="allow_return" class="form-control">
                                                    <option value="0" <?php if($edit_product->allow_return==0){ echo 'selected'; } ?> >No</option>
                                                    <option value="1" <?php if($edit_product->allow_return==1){ echo 'selected'; } ?> >Yes</option>
                                                </select>
                                                @error('allow_return')
                                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">Allow Cash On Delivery</label>
                                                <select name="allow_cod" class="form-control">
                                                    <option value="0" <?php if($edit_product->allow_cod==0){ echo 'selected'; } ?> >No</option>
                                                    <option value="1" <?php if($edit_product->allow_cod==1){ echo 'selected'; } ?> >Yes</option>
                                                </select>
                                                @error('allow_cod')
                                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Available for sale</label>
                                                <select name="on_sale" class="form-control">
                                                    <option value="1" <?php if($edit_product->on_sale==1){ echo 'selected'; } ?> >Yes</option>
                                                    <option value="0" <?php if($edit_product->on_sale==0){ echo 'selected'; } ?> >No</option>
                                                </select>
                                                @error('on_sale')
                                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Allow Reviews</label>
                                                <select name="allow_reviews" class="form-control">
                                                    <option value="1" <?php if($edit_product->allow_reviews==1){ echo 'selected'; } ?>>Yes</option>
                                                    <option value="0" <?php if($edit_product->allow_reviews==0){ echo 'selected'; } ?>>No</option>
                                                </select>
                                                @error('allow_reviews')
                                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Product weight (KG)</label>
                                                <input type="text" name="weight" class="form-control" value="{{ $edit_product->weight }}">
                                                @error('weight')
                                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <label class="form-label">Dimesions (Centimeter)</label>
                                            <div class="row">
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="mb-4">
                                                        <input  type="text" name="height" placeholder="Height" value="{{ old('height') ?? $edit_product->height }}"  class="form-control">
                                                        @error('height')
                                                            <span
                                                                class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="mb-4">
                                                        <input type="text" name="width" placeholder="Width" value="{{ old('width') ?? $edit_product->width }}" class="form-control">
                                                        @error('width')
                                                            <span
                                                                class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="mb-4">
                                                        <input type="text" name="length" placeholder="Length" value="{{ old('length') ?? $edit_product->length }}" class="form-control">
                                                        @error('length')
                                                            <span
                                                                class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="edit-profile">
                    <div class="row justify-content-center  ">
                        <div class="col-xl-12 mt-4 mb-4">
                            <div class="card">
                                <div class="card-header pb-0">
                                    <h4 class="card-title mb-0">Product Type</h4>
                                </div>
                                <div class="card-body">
                                   
                                   
                                    
                                      <?php if($Attributes_Product){  foreach($Attributes_Product as $val){ ?>
                                            <div class="attribute_list_listing mt-3"><div class="varation_list_repeat border mt-2">
                                        <div class="product_veriant_box_header">
                                          <div class="list_header">
                                            <div class="data_header_attr d-flex">
                                           <div class="mix_use_varint_po">
                                                <label>size</label>
                                                <select class="form-control" name="attr[1][attr][size]"><option value="6">6</option><option value="7">7</option><option value="8">8</option></select>
                                            </div>
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
                                                <input name="attr_product_name" class="form-control" type="text" placeholder="Product Variable Name" value="">
                                              </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                              <div class="mb-4">
                                                <label class="form-label">Regular Price</label>
                                                <input name="attr_product_regular_price" class="form-control" type="text" placeholder="Regular Price" value="">
                                              </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                              <div class="mb-4">
                                                <label class="form-label">Sale Price</label>
                                                <input name="attr_product_sale_price" class="form-control" type="text" placeholder="Sale Price" value="">
                                              </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                              <div class="mb-4">
                                                <label class="form-label">Regular Price ( Doller )</label>
                                                <input name="attr[1][product_regular_price_doller]" class="form-control" type="text" placeholder="Regular Price ( Doller )" value="">
                                              </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                              <div class="mb-4">
                                                <label class="form-label">Sale Price ( Doller )</label>
                                                <input name="attr[1][product_sale_price_doller]" class="form-control" type="text" placeholder="Sale Price ( Doller )" value="">
                                              </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                              <div class="mb-4">
                                                <label class="form-label">Product Image</label>
                                                <input type="file" name="attr[1]" id="product_image" class="form-control">
                                              </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div></div>
                                    <?php }} ?>
                            
                                </div>
                            </div>
                            
                          
                        </div>
                    </div>
                </div>
            </div>
            <div id="varible_product" style="display: none" class="container-fluid">
                <div class="edit-profile">
                    <div class="row justify-content-center  ">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header pb-0">
                                    <h4 class="card-title mb-0">Variable Products</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                <li class="nav-item"><a class="nav-link active" id="home-tab"
                                                        data-bs-toggle="tab" href="#home" role="tab"
                                                        aria-controls="home" aria-selected="true">Attributes</a></li>
                                                <li class="nav-item"><a class="nav-link" id="profile-tabs"
                                                        data-bs-toggle="tab" href="#profile" role="tab"
                                                        aria-controls="profile" aria-selected="false">Variable</a></li>
                                            </ul>
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                                    aria-labelledby="home-tab">
                                                    <div class="mt-4">
                                                        <label class="col-form-label">Select Attributes</label>
                                                        <select name="venant_val[]"
                                                            class="js-example-placeholder-multiple col-sm-12"
                                                            multiple="multiple" id="getattibutesselectedvalue">
                                                           
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="profile" role="tabpanel"
                                                    aria-labelledby="profile-tab">
                                                    <div class="mt-3 btn btn-primary" id="add_veriant_btn">Add Veriant
                                                        Product
                                                    </div>
                                                    <div class="attribute_list_listing"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-3 mb-5">
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary d-block w-100">Save</button>
                        </div>
                    </div>
                    <div class="col-sm-3 mb-5">
                        <div class="form-footer">
                            <a href="{{ URL::previous() }}" class="btn btn-dark d-block w-100">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    
    <script>
        @if (Session::has('add_product'))
            iziToast.success({
                message: '{{ Session::get('add_product') }}',
                position: 'topRight',
            });
        @endif
    </script>
@endsection


