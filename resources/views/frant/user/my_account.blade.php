@extends('frant.include.include')
@section('content')

<style>
    .tab-vertical .tab-content {
        width: 100% !important;
        border: none !important;
    }
    .icon-box.text-center i {
        display: block;
        font-size: 6rem !important;
        color: #333;
        -webkit-transition: -webkit-transform 0.4s;
        transition: -webkit-transform 0.4s;
        transition: transform 0.4s;
        transition: transform 0.4s, -webkit-transform 0.4s;
    }
</style>


<div class="page-header">
    <div class="container">
        <h1 class="page-title mb-0">My Account</h1>
    </div>
</div>


<nav class="breadcrumb-nav">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{url('/admin/dashboard')}}">Home</a></li>
            <li>My account</li>
        </ul>
    </div>
</nav>
            <!-- Start of PageContent -->
            <div class="page-content pt-2">
                <div class="container">
                    <div class="tab tab-vertical row gutter-lg">
                        <div class="tab-content mb-6">
                            <div class="tab-pane active in" id="account-dashboard">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                        <a href="{{url('/my-orders')}}" class="link-to-tab">
                                            <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-orders">
                                                    <i class="w-icon-orders"></i>
                                                </span>
                                                <div class="icon-box-content">
                                                    <p class="text-uppercase mb-0">Orders</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                        <a href="{{ url('/profile') }}" class="link-to-tab">
                                            <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-account">
                                                    <i class="w-icon-user"></i>
                                                </span>
                                                <div class="icon-box-content">
                                                    <p class="text-uppercase mb-0">Account Details</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <!--<div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">-->
                                    <!--    <a href="{{url('/wishlist')}}" class="link-to-tab">-->
                                    <!--        <div class="icon-box text-center">-->
                                    <!--            <span class="icon-box-icon icon-wishlist">-->
                                    <!--                <i class="w-icon-heart"></i>-->
                                    <!--            </span>-->
                                    <!--            <div class="icon-box-content">-->
                                    <!--                <p class="text-uppercase mb-0">Wishlist</p>-->
                                    <!--            </div>-->
                                    <!--        </div>-->
                                    <!--    </a>-->
                                    <!--</div>-->
                                    <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                        <a href="{{url('/chnage-password')}}" class="link-to-tab">
                                            <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-wishlist">
                                                    <i class="w-icon-user "></i>
                                                </span>
                                                <div class="icon-box-content">
                                                    <p class="text-uppercase mb-0">Update Password</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                        <a href="{{ url('/logout_all') }}">
                                            <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-logout">
                                                    <i class="w-icon-logout"></i>
                                                </span>
                                                <div class="icon-box-content">
                                                    <p class="text-uppercase mb-0">Logout</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                        <a href="{{ url('/refer') }}">
                                            <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-logout">
                                                    <i style="color: #ff0046;" class="w-icon-gift"></i>
                                                </span>
                                                <div class="icon-box-content">
                                                    <p style="color: #ff0046;" class="text-uppercase mb-0">
                                                        Refer and Earn
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!-- End of PageContent -->


@endsection