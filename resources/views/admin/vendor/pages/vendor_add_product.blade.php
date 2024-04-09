@extends('admin.vendor.include.include')
@section('content')


@if ($errors->any())
     @foreach ($errors->all() as $error)
         <div>{{$error}}</div>
     @endforeach
 @endif
 
 

 
<div class="container-xxl flex-grow-1 container-p-y">
                     <div class="row">
                     <div class="col-md-12 mb-4">
                           <div class="">
                              <div class="card-header d-flex justify-content-between pb-0">
                                 <div class="card-title mb-0">
                                    <h4 class="mb-0">Add Product </h4>
                                    <small class="text-muted">Add Products</small>
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
                                                
                                                <input name="product_name" class="form-control"  type="text" placeholder="Product Name" value="{{ old('product_name') }}">
                                                @error('product_name')
                                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="mb-4">
                                                <label class="form-label">Product Description</label>
                                                <textarea class="form-control" name="product_desc" id="editor1">{{ old('product_desc') }}</textarea>
                                                @error('product_desc')
                                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="mb-4">
                                                <label class="form-label">Short Description</label>
                                                <textarea class="form-control" name="product_sort_desc" placeholder="Short Description" rows="5">{{ old('product_sort_desc') }}</textarea>
                                                @error('product_sort_desc')
                                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="mb-4">
                                                <label class="form-label">Product Specification</label>
                                                <textarea class="form-control" name="product_specification" id="editor2">{{ old('product_specification') }}</textarea>
                                                @error('product_specification')
                                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="mb-4">
                                                <label class="form-label">Product Category</label>
                                                @foreach ($category as $val)
                                                    <label style="text-transform: capitalize;" class="d-block" for="{{ $val->title }}">
                                                        <input class="checkbox_animated" id="{{ $val->title }}"
                                                            name="product_category[]" value="{{ $val->id }}"
                                                            type="checkbox"> {{ $val->title }}
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
                                                @error('product_sort_desc')
                                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                                @enderror
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
                                                    value="{{ old('product_regular_price') }}">
                                                @error('product_regular_price')
                                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">Sale Price</label>
                                                <input name="product_sale_price" class="form-control" type="number"
                                                    placeholder="Sale Price" value="{{ old('product_sale_price') }}">
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
                                        <!--            value="{{ old('product_regular_price_doller') }}">-->
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
                                        <!--            value="{{ old('product_sale_price_doller') }}">-->
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
                        <div class="col-xl-12 mt-4">
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
                                                    placeholder="Stock Quantity" value="{{ old('stock_quantity') }}">
                                                @error('stock_quantity')
                                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Stock Status</label>
                                                <select name="stock_status" class="form-control">
                                                    <option value="1">In Stock</option>
                                                    <option value="0">Out Of Stock</option>
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
                        <div class="col-xl-12 mt-4 mb-4">
                            <div class="card">
                                <div class="card-header pb-0">
                                    <h4 class="card-title mb-0">Tax</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">SGST Rate (%)</label>
                                                <input name="sgst" class="form-control" type="text" placeholder="SGST Rate (%)" value="{{ old('sgst') }}">
                                                @error('sgst')
                                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">CGST Rate (%)</label>
                                                <input name="cgst" class="form-control" type="text" placeholder="CGST Rate (%)" value="{{ old('cgst') }}">
                                                @error('cgst')
                                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">IGST Rate (%)</label>
                                                <input name="igst" class="form-control" type="text" placeholder="IGST Rate (%)" value="{{ old('igst') }}">
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
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header pb-0">
                                    <h4 class="card-title mb-0">Purchase Note</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Purchase Note</label>
                                                <textarea class="form-control" name="purchase_note" placeholder="Type Your Message" rows="5"></textarea>
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
                        <div class="col-xl-12 mt-4 mb-4">
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
                                                    placeholder="HSN code" value="{{ old('hsn') }}">
                                                @error('hsn')
                                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">Publish Product</label>
                                                <select name="publish" class="form-control">
                                                    <option value="1">Publish</option>
                                                    <option value="0">Draft</option>
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
                                                    <option value="0">No</option>
                                                    <option value="1">1 Day</option>
                                                    <option value="1">2 Day</option>
                                                    <option value="1">3 Day</option>
                                                    <option value="1">4 Day</option>
                                                    <option value="1">5 Day</option>
                                                    <option value="1">6 Day</option>
                                                    <option value="1">7 Day</option>
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
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
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
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
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
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                                @error('allow_reviews')
                                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-4">
                                                <label class="form-label">Product weight (KG)</label>
                                                <input type="text" name="weight" class="form-control">
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
                                                        <input  type="text" name="height" value="{{ old('height') }}" placeholder="Height"
                                                            class="form-control">
                                                        @error('height')
                                                            <span
                                                                class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="mb-4">
                                                        <input type="text" name="width" value="{{ old('width') }}" placeholder="Width"
                                                            class="form-control">
                                                        @error('width')
                                                            <span
                                                                class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="mb-4">
                                                        <input type="text" name="length" value="{{ old('length') }}" placeholder="Length"
                                                            class="form-control">
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
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header pb-0">
                                    <h4 class="card-title mb-0">Product Type</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="mb-4">
                                                <label class="form-label">Product Type</label>
                                                <select name="variable" id="product_type" class="form-control">
                                                    <option value="simple">Simple Product</option>
                                                    <option value="varible">Variable Product</option>
                                                    <option value="grouped">Grouped Product</option>
                                                    <option value="grouped_variable ">Variable + Grouped Product</option>
                                                </select>
                                                @error('publish')
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
            <div id="varible_product" style="display: none" class="container-fluid">
                <div class="edit-profile">
                    <div class="row justify-content-center  ">
                        <div class="col-xl-12 mt-4">
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
                                                            @foreach ($attributes as $key => $value)
                                                                <option value="{{ $value->id }}">{{ $value->name }}
                                                                </option>
                                                            @endforeach
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
            <div class="container-fluid mt-4">
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
