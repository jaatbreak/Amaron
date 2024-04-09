@extends('admin.vendor.include.include')
@section('content')

<?php 

// echo "<pre>";
// print_r($users);

?>

   


<div class="container-xxl flex-grow-1 container-p-y">
                     <div class="row">
                     <div class="col-md-12 mb-4">
                           <div class="">
                              <div class="card-header d-flex justify-content-between pb-0">
                                 <div class="card-title mb-0">
                                    <h4 class="mb-0">Profile Update</h4>
                                    <small class="text-muted">Profile Update</small>
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
                                    
                                    <div class="card-options">
                                        <a class="card-options-collapse" href="#" data-bs-toggle="card-collapse">
                                            <i class="fe fe-chevron-up"></i>
                                        </a>
                                        <a class="card-options-remove" href="#" data-bs-toggle="card-remove">
                                            <i class="fe fe-x"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-2">
                                        <div class="profile-title pb-4">
                                            <div class="media text-center justify-content-center">
                                                <img style="width:100px; border: solid 4px #d3e1de; padding: 10px;" class="img-70 rounded-circle" alt="" src="{{ asset('uploads') }}/{{ $users->avatar_image }} ">
                                                <div class="media-body" style="flex: none">
                                                    <h3 class="mb-1 f-20 txt-primary"> {{ $users->name }} </h3>
                                                    <p class="f-12">{{ $users->email }} </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Upload Image</label>
                                                <input hidden name="old_avatar_image" value="{{ $users->avatar_image }}" >
                                                <input class="form-control" name="avatar_image" id="avatar_image" type="file" placeholder="Name" >
                                                <img style="width: 100px; margin-top: 10px; margin-bottom: 10px;" alt="" src="{{ asset('uploads') }}/{{ $users->avatar_image }} ">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 ">
                                            <div class="mb-3">
                                                <label class="form-label">Gst Certificate</label>
                                                <input hidden name="old_gst_certificate" value="{{ $users->gst_certificate }}">
                                                <input class="form-control" name="gst_certificate" value="{{ $users->gst_certificate }}" id="gst_certificate" type="file" placeholder="gst_certificate">
                                                <img style="width: 100px; margin-top: 10px; margin-bottom: 10px;" alt="" src="{{ asset('uploads') }}/{{ $users->gst_certificate }} ">
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        <div class="col-sm-6 col-md-6 ">
                                            <div class="mb-3">
                                                <label class="form-label">Cancelled Cheque</label>
                                                <input hidden name="old_cancelled_cheque" value="{{ $users->cancelled_cheque }}">
                                                <input class="form-control" name="cancelled_cheque" value="{{ $users->cancelled_cheque }}" id="cancelled_cheque" type="file" placeholder="gst_certificate">
                                                <img style="width: 100px; margin-top: 10px; margin-bottom: 10px;" alt="" src="{{ asset('uploads') }}/{{ $users->cancelled_cheque }} ">
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        <div class="col-sm-12 col-md-12 ">
                                            <div class="mb-3">
                                                <label class="form-label">Name</label>
                                                <input hidden class="form-control" name="id" value="{{ $users->id }}"
                                                placeholder="Name">
                                                <input class="form-control" name="name" value="{{ old('name') ?? $users->name }}"
                                                placeholder="Name">
                                                @error('name')
                                                <span class="text-danger mt-2 d-inline-block ">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Firm Name</label>
                                                <input class="form-control" name="firm_name" value="{{ old('firm_name') ?? $users->firm_name }}"
                                                placeholder="Firm Name">
                                                @error('firm_name')
                                                <span class="text-danger mt-2 d-inline-block ">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 ">
                                            <div class="mb-3">
                                                <label class="form-label">Phone Number</label>
                                                <input class="form-control" name="phone" value="{{ old('phone') ?? $users->phone }}" type="number" placeholder="Phone Number">
                                                @error('phone')
                                                <span class="text-danger mt-2 d-inline-block ">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 ">
                                            <div class="mb-3">
                                                <label class="form-label">Email</label>
                                                <input name="email" class="form-control" type="email"
                                                value="{{ old('email') ?? $users->email }}">
                                                @error('email')
                                                <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 ">
                                            <div class="mb-3">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" rows="7" placeholder="Description" name="description">{{ old('description') ?? $users->description }}</textarea>
                                                @error('description')
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
            
                <div class="edit-profile mt-4">
                    <div class="row justify-content-center  ">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header pb-0">
                                    <h4 class="card-title mb-0">Address or Location</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">City</label>
                                                <input name="city" class="form-control" placeholder="City" type="text"
                                                    value="{{ old('city') ?? $users->city }}">
                                                @error('city')
                                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                                @enderror
                                            </div> 
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">State</label>
                                                <input name="state" class="form-control" placeholder="State" type="text"
                                                    value="{{ old('state') ?? $users->state }}">
                                                @error('state')
                                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Country</label>
                                                <input name="country" class="form-control" placeholder="Country" type="text"
                                                    value="{{ old('country') ?? $users->country }}">
                                                @error('country')
                                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Pin Code</label>
                                                <input name="pin_code" class="form-control" placeholder="Pin Code" type="text"
                                                    value="{{ old('pin_code') ?? $users->pin_code }}">
                                                @error('pin_code')
                                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--<div class="col-sm-12 col-md-12">-->
                                        <!--    <div class="mb-3">-->
                                        <!--        <label class="form-label">Choose Your Location</label>-->
                                        <!--           <div id="map" name="map" >-->
                                                       
                                        <!--           </div>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                        <div class="col-sm-12 col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Address</label>
                                                <textarea class="form-control" rows="7" placeholder="Address" name="address">{{ old('address') ?? $users->address }}</textarea>
                                                @error('address')
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
                                    <h4 class="card-title mb-0">Submit Your Bank Details</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">GST</label>
                                                <input name="gst" class="form-control" placeholder="GST" type="text" value="{{ old('gst') ?? $users->gst }}">
                                                @error('gst')
                                                <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div> 
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Name Of Bank</label>
                                                <input name="bank_name" class="form-control" placeholder="Name Of Bank" type="text" value="{{ old('bank_name') ?? $users->bank_name }}">
                                                @error('bank_name')
                                                <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div> 
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Your Name ( in bank account )</label>
                                                <input name="user_bank_account_name" class="form-control" placeholder="Your Name ( in bank account )" type="text" value="{{ old('user_bank_account_name') ?? $users->user_bank_account_name }}">
                                                @error('user_bank_account_name')
                                                <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Bank Account Number</label>
                                                <input name="bank_account_number" class="form-control" placeholder="Bank Account Number" type="number" value="{{ old('bank_account_number') ?? $users->bank_account_number }}">
                                                @error('bank_account_number')
                                                <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div> 
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Confirm Bank Account Number</label>
                                                <input  name="bank_account_number_confirmation" class="form-control" placeholder="Bank Account Number" type="number" value="{{ old('bank_account_number_confirmation') ?? $users->bank_account_number }}">
                                                @error('bank_account_number_confirmation')
                                                <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div> 
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Bank IFSC Code</label>
                                                <input name="bank_ifsc_code" class="form-control" placeholder="Bank IFSC Code" type="text" value="{{ old('bank_ifsc_code') ?? $users->bank_ifsc_code }}">
                                                @error('bank_ifsc_code')
                                                <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div> 
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Branch Name</label>
                                                <input name="bank_branch" class="form-control" placeholder="Branch Name" type="text" value="{{ old('bank_branch') ?? $users->bank_branch }}">
                                                @error('bank_branch')
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
            <div class="container-fluid mt-4">
                <div class="row">
                    <div class="col-sm-3 mb-5">
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary d-block w-100">Save</button>
                        </div>
                    </div>
                    
                </div>
            </div>
      </form>
    </div>


    <script>
        @if (Session::has('update_profile'))
            iziToast.success({
                message: '{{ Session::get('update_profile') }}',
                position: 'topRight',
            });
        @endif
    </script>
@endsection
