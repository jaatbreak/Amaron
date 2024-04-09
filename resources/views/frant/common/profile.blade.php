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
                  <input type="text" name="id" value="{{Auth::user()->id }}"  hidden >
            <div class="col-md-6">
                <div class="form-group">
                    <label for="firstname">Mobile Number</label>
                    <input type="text" placeholder="{{Auth::user()->phone }}" class="form-control form-control-md" disabled>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="firstname">Email</label>
                    <input type="text" placeholder="{{Auth::user()->email }}" class="form-control form-control-md" disabled>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="firstname">Full Name</label>
                    <input type="text" name="name" placeholder="Full Name" value="{{Auth::user()->name }}" class="form-control form-control-md">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="firstname">Address</label>
                    <input type="text" name="address" placeholder="Address" value="{{Auth::user()->address }}" class="form-control form-control-md">
                </div>
            </div>
        </div>
        
        <button type="submit" class="btn btn-dark btn-rounded btn-sm mb-4">Save Changes</button>
    </form>
</div>
</div>



@endsection