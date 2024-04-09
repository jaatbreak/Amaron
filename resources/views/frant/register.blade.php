@extends('frant.include.include')
@section('content')

        <!-- Start of Main -->
        <main class="main login-page">
            <!-- Start of Page Header -->
            <div class="page-header">
                <div class="container">
                    <h1 class="page-title mb-0">Register</h1>
                </div>
            </div>
            <!-- End of Page Header -->

            <div class="page-content">
                <div class="container">
                    <form class="theme-form login-form" method="POST" >
                        @csrf
                    <div class="login-popup">
                        <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
                            <div class="tab-content">
                                <div class="tab-pane active" id="sign-in">
                                    <div class="form-group">
                                        <label>Your Name</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" >
                                        @error('name')
                                          <div class="messsage_login w-100 text-right text-danger pt-1" style="text-align: right; color: #ff0000;">  <span> {{ $message }} </span></div>
                                        @enderror
                                    </div>
                                    <div class="form-group ">
                                        <label>Mobile Number</label>
                                        <input type="number" class="form-control" name="phone" id="phone" placeholder="Enter Mobile Number" >
                                         @error('phone')
                                          <div class="messsage_login w-100 text-right text-danger pt-1" style="text-align: right; color: #ff0000; " > <span> {{ $message }} </span></div>
                                        @enderror
                                    </div>
                                     <div class="form-group ">
                                        <label>Email Address</label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" >
                                         @error('email')
                                          <div class="messsage_login w-100 text-right text-danger pt-1" style="text-align: right; color: #ff0000; " > <span> {{ $message }} </span></div>
                                        @enderror
                                    </div>
                                     <div class="form-group ">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="*********" >
                                         @error('password')
                                          <div class="messsage_login w-100 text-right text-danger pt-1" style="text-align: right; color: #ff0000; " > <span> {{ $message }} </span></div>
                                        @enderror
                                    </div>
                                     <div class="form-group ">
                                        <label>Referral Id</label>
                                        <input type="number" class="form-control" name="referral" id="referral"  value="{{ Request::get('referral') }}"  >
                                         @error('referral')
                                          <div class="messsage_login w-100 text-right text-danger pt-1" style="text-align: right; color: #ff0000; " > <span> {{ $message }} </span></div>
                                        @enderror
                                    </div>
                                    <button  class="btn btn-primary btn-block" type="submit" >Sign In</button>
                                    
                                    <p style="font-size: 1.2rem; text-transform: capitalize;" class="mt-2" >you have no Account?  <a class="font-size-sm" href="{{ route('login') }}">Sign Up</a> </p>
                                </div>
                            </div>
                            <!--<p class="text-center">Sign in with social account</p>-->
                            <!--<div class="social-icons social-icon-border-color d-flex justify-content-center">-->
                            <!--    <a href="#" class="social-icon social-facebook w-icon-facebook"></a>-->
                            <!--    <a href="#" class="social-icon social-twitter w-icon-twitter"></a>-->
                            <!--    <a href="#" class="social-icon social-google fab fa-google"></a>-->
                            <!--</div>-->
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </main>
        <!-- End of Main -->

@endsection
        