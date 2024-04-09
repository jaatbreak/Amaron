@extends('admin.include.include')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
                     <div class="row">
                     <div class="col-md-12 mb-4">
                           <div class="">
                              <div class="card-header d-flex justify-content-between pb-0">
                                 <div class="card-title mb-0">
                                    <h4 class="mb-0">Edit Coupon </h4>
                                    <small class="text-muted">Edit Coupon </small>
                                 </div>
                              </div>
                              
                           </div>
                        </div>
                        
            <div class="edit-profile">
                <div class="row justify-content-center  ">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header pb-0">
                                
                                <div class="card-options">
                                    <a class="card-options-collapse" href="#" data-bs-toggle="card-collapse">
                                        <i class="fe fe-chevron-up"></i></a>
                                        <a class="card-options-remove" href="#" data-bs-toggle="card-remove">
                                            <i class="fe fe-x"></i>
                                        </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data" class="row">
                                    @csrf
                                    <div class="col-sm-12 col-md-12" >
                                        <div class="mb-3">
                                            <label class="form-label">Coupon Code</label>
                                            <input name="coupon_code" class="form-control" type="text" placeholder="Coupon Code" value="{{ $edit_coupon->coupon_code }}" >
                                            @error('coupon_code')
                                                <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                     <div class="col-sm-12 col-md-12" >
                                        <div class="mb-3">
                                            <label class="form-label">Type</label>
                                            <select name="type" class="form-control">
                                                <option value="flat" @if ( $edit_coupon->type == "flat") {{ 'selected' }} @endif >Flat</option>
                                                <option value="Percent" @if ($edit_coupon->type == "Percent") {{ 'selected' }} @endif >Percent</option>   
                                            </select>
                                            @error('type')
                                                <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12" >
                                        <div class="mb-3">
                                            <label class="form-label">Discount</label>
                                            <input name="discount" class="form-control" type="number" placeholder="Discount"   value="{{ $edit_coupon->discount }}" >
                                            @error('discount')
                                                <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12" >
                                        <div class="mb-3">
                                            <label class="form-label">Min Value</label>
                                            <input name="min_value" class="form-control" type="number" placeholder="Min Price" value="{{ $edit_coupon->min_value }}"  >
                                            @error('min_value')
                                                <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6" >
                                        <div class="mb-3">
                                            <label class="form-label">Coupon Start Date</label>
                                            <input name="start_date" class="form-control" type="date" placeholder="Coupon Start Date" value="{{ $edit_coupon->start_date }}" >
                                            @error('start_date')
                                                <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6" >
                                        <div class="mb-3">
                                            <label class="form-label">Coupon End Date</label>
                                            <input name="end_date" class="form-control" type="date" placeholder="Coupon End Date" value="{{ $edit_coupon->end_date }}" >
                                            @error('end_date')
                                                <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12" >
                                        <div class="mb-3">
                                            <label class="form-label">Message</label>
                                            <input name="message" class="form-control" type="text" placeholder="Message" value="{{ $edit_coupon->message }}" >
                                            @error('message')
                                                <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                     <div class="col-sm-12 col-md-12" >
                                        <div class="mb-3">
                                            <label class="form-label">Image</label>
                                            <input name="image" class="form-control" type="file" placeholder="Image" >
                                            <input hidden name="old_image" value="{{ $edit_coupon->image }}">
                                            <div class="image_upload mt-3">
                                                <img src="{{ asset('uploads') }}/{{ $edit_coupon->image }}" alt="">
                                            </div>
                                            @error('image')
                                                <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12" >
                                        <div class="mb-3">
                                            <label class="form-label">Description</label>
                                            <input name="desc" class="form-control" type="text" placeholder="Description" value="{{ $edit_coupon->desc }}" >
                                            @error('desc')
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

        
            <div class="row mt-3">
                <div class="col-sm-3 mb-5">
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary d-block w-100">Save</button>
                    </div>
                    </form>
                </div>
                <div class="col-sm-3 mb-5">
                    <div class="form-footer">
                        <a href="{{ URL::previous() }}" class="btn btn-dark d-block w-100">Cancel</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        @if (Session::has('add_category'))
            iziToast.success({
                message: '{{ Session::get('add_category') }}',
                position: 'topRight',
            });
        @endif
    </script>
@endsection
