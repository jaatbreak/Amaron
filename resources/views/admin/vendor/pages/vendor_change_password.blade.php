@extends('admin.vendor.include.include')
@section('content')




<div class="container-xxl flex-grow-1 container-p-y">
                     <div class="row">
                     <div class="col-md-12 mb-4">
                           <div class="">
                              <div class="card-header d-flex justify-content-between pb-0">
                                 <div class="card-title mb-0">
                                    <h4 class="mb-0">Change Password</h4>
                                    <small class="text-muted">Change Password</small>
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
                                    <h4 class="card-title mb-0">Change Password</h4>
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
                                    <div class="row">
                                        <div class="col-sm-4 col-md-4 mt-3">
                                            <div class="mb-3">
                                                <label class="form-label">Current Password</label>
                                                <input class="form-control" name="old_password"  type="text"  placeholder="Current Password">
                                                @if(session('old_password'))
                                                <span class="text-danger mt-2 d-inline-block ">{{ session('old_password') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-md-4 mt-3">
                                            <div class="mb-3">
                                                <label class="form-label">New Password</label>
                                                <input class="form-control" name="new_password"  type="text"  placeholder="New Password">
                                                @error('new_password')
                                                    <span class="text-danger mt-2 d-inline-block ">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-md-4 mt-3">
                                            <div class="mb-3">
                                                <label class="form-label">Confirm New Password</label>
                                                <input class="form-control" name="new_password_confirmation"  type="text"  placeholder="Confirm New Password">
                                                @error('new_password_confirmation')
                                                    <span class="text-danger mt-2 d-inline-block ">{{ $message }}</span>
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
            
                <div class="row mt-4">
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
        @if (Session::has('update_password'))
            iziToast.success({
                message: '{{ Session::get('update_password') }}',
                position: 'topRight',
            });
        @endif
    </script>
@endsection
