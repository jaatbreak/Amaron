@extends('frant.include.include')
@section('content')

<div class="page-header" style="height: 180px;">
    <div class="container">
        <h1 class="page-title mb-0">{{ $title }}</h1>
    </div>
</div>

<div class="container mt-5" >
    <div class="tab-pane" id="account-details">
    <form class="form account-details-form"  method="post">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="firstname">Current Password</label>
                    <input type="text" name="old_password" class="form-control form-control-md"  placeholder="Current Password" >
                        @if(session('old_password'))
                            <span class="text-danger mt-2 d-inline-block ">{{ session('old_password') }}</span>
                        @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="firstname"> New Password </label>
                    <input type="text" class="form-control form-control-md"  name="new_password"  placeholder="New Password" >
                    @error('new_password')
                        <span class="text-danger mt-2 d-inline-block ">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="firstname">Confirm New Password</label>
                    <input type="text" class="form-control form-control-md" name="new_password_confirmation"  placeholder="Confirm New Password" >
                    @error('new_password_confirmation')
                        <span class="text-danger mt-2 d-inline-block ">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        
        <button type="submit" class="btn btn-dark btn-rounded btn-sm mb-4">Save Changes</button>
    </form>
</div>
</div>



@endsection