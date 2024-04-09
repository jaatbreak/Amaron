@extends('frant.include.include')
@section('content')

        <!-- Start of Main -->
        <main class="main login-page">
            <!-- Start of Page Header -->
            <div class="page-header">
                <div class="container">
                    <h1 class="page-title mb-0">Login</h1>
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
                                        <label>Email Address</label>
                                        <input type="text" class="form-control" name="email" id="email"  >
                                        @error('email')
                                          <div class="messsage_login w-100 text-right text-danger pt-1" style="text-align: right; color: #ff0000;">  <span> {{ $message }} </span></div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-0">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" id="password" >
                                         @error('password')
                                          <div class="messsage_login w-100 text-right text-danger pt-1" style="text-align: right; color: #ff0000; " > <span> {{ $message }} </span></div>
                                        @enderror
                                    </div>
                                    <div class="form-checkbox d-flex align-items-center justify-content-between">
                                        <a href="#">Last your password?</a>
                                    </div>
                                    <button  class="btn btn-primary btn-block" type="submit" >Sign In</button>
                                    
                                    <p style="font-size: 1.2rem; text-transform: capitalize;" class="mt-2" >you have no Account?  <a class="font-size-sm" href="{{ route('register') }}">Sign Up</a> </p>
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
        
        
<script>
    @if (Session::has('register_user'))
        iziToast.success({
            message: '{{ Session::get('register_user') }}',
            position: 'topRight',
        });
    @endif
</script>
    

@endsection
        