<header class="main-nav">
    <div class="sidebar-user text-center">
        <img class="img-90 rounded-circle" src="{{ asset('uploads') }}/{{ auth()->user()->avatar_image }}" alt="">
        <div class="badge-bottom"><span class="badge badge-primary">{{ auth()->user()->name }}</span></div><a
            href="#">
            <h6 class="mt-3 f-14 f-w-600">{{ auth()->user()->name }}</h6>
        </a>
        <p class="mb-0 font-roboto">{{ auth()->user()->email }}</p>
    </div>
    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                aria-hidden="true"></i></div>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i
                                data-feather="home"></i><span>Profile</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{ route('admin/dashboard') }}"> Home </a></li>
                            <li><a href="{{ route('admin/user_profile') }}"> Profile Edit </a></li>
                            <li><a href="{{ route('admin/user_change_password') }}"> Change Password </a></li>
                            <li><a href="{{ route('admin/logout') }}"> Logout </a></li>
                        </ul>
                    </li>
                    <li class="dropdown mt-2"><a class="nav-link menu-title" href="javascript:void(0)"><i
                                data-feather="users"></i><span>User</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{ route('admin/user') }}">User</a></li>
                            <li><a href="{{ route('admin/vendor') }}">Vendor</a></li>
                            <li><a href="{{ route('admin/vendor_verification_p') }}">Vendor Verification Pending</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown mt-2">
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="layout"></i>
                            <span>Developer Option</span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{ route('admin/posttype') }}">Post Type CMS</a></li>
                        </ul>
                    </li>
                    <li class="dropdown mt-2"><a class="nav-link menu-title" href="javascript:void(0)"><i
                                data-feather="shopping-bag"></i><span>Products</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{ route('admin/product') }}">Products</a></li>
                            <li><a href="{{ route('admin/product_verify') }}">Verify Pending Product </a></li>
                            <li><a href="{{ route('admin/product/category') }}">Category</a></li>
                            <li><a href="{{ route('admin/product/attributes') }}"> Attributes </a></li>
                        </ul>
                    </li>
                    <li class="dropdown mt-2">
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="feather"></i>
                            <span>Coupon Management</span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{ route('admin/coupon') }}">Coupon Management</a></li>
                        </ul>
                    </li>
                    <li class="dropdown mt-2">
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="box"></i>
                            <span>Orders Management</span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{ route('admin/order') }}">Orders List</a></li>
                        </ul>
                    </li>

                    <li class="dropdown mt-2">
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="box"></i>
                            <span>Import Export</span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{ route('admin/datamanage') }}">Import Export</a></li>
                        </ul>
                    </li>

                    <li class="dropdown mt-2">
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="box"></i>
                            <span>Panding Product</span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{ route('admin/panding_product') }}">Pending Product</a></li>
                        </ul>
                    </li>


                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>
