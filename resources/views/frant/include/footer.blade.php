       
       
       
       <!-- Start of Footer -->
        <footer class="footer appear-animate" data-animation-options="{ 'name': 'fadeIn' }">
            {{-- <div class="footer-newsletter bg-primary">
                <div class="container">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-xl-5 col-lg-6">
                            <div class="icon-box icon-box-side text-white">
                                <div class="icon-box-icon d-inline-flex">
                                    <i class="w-icon-envelop3"></i>
                                </div>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title text-white text-uppercase font-weight-bold">Subscribe To
                                        Our Newsletter</h4>
                                    <p class="text-white">Get all the latest information on Events, Sales and Offers.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6 col-md-9 mt-4 mt-lg-0 ">
                            <form action="#" method="get"
                                class="input-wrapper input-wrapper-inline input-wrapper-rounded">
                                <input type="email" class="form-control mr-2 bg-white" name="email" id="email"
                                    placeholder="Your E-mail Address" />
                                <button class="btn btn-dark btn-rounded" type="submit">Subscribe<i
                                        class="w-icon-long-arrow-right"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="container">
                <div class="footer-top">
                    <div class="row">
                        <div class="col-lg-4 col-sm-6">
                            <div class="widget widget-about mt-0 mb-4">
                                <a href="/" class="logo-footer">
                                    @foreach (array_slice(getpostcontent_only_field(1),0, 1) as $val)
                                        <img src="{{ asset('uploads') }}/{{ $val->footer_logo }}" alt="logo-footer" width="145" height="45" />
                                    @endforeach
                                </a>
                                <div class="widget-body" style="width: 90%;">
                                    <p class="widget-about-desc">
                                            <?= getposttype(9)->desc ?>
                                    </p>

                                    <div class="social-icons social-icons-colored">
                                        @if (getpostcontent_only_field(7))
                                            @foreach (getpostcontent_only_field(7) as $val)
                                             <a href="{{ $val->url }}" class="social-icon  {{ $val->icon }}" style="border-color: {{ $val->color }}; background-color: {{ $val->color }};"></a>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="widget">
                                <h3 class="widget-title">About & Help</h3>
                                <ul class="widget-body">
                                    <li><a href="{{url('')}}/about-us">About Us</a></li>
                                    <li><a href="{{url('')}}/contact-us">Help & Contact</a></li>
                                    <li><a href="{{url('')}}/payments">Payments</a></li>
                                    <li><a href="{{url('')}}/shipping">Shipping</a></li>
                                    <li><a href="{{url('')}}/cancellation-returns">Cancellation & Returns</a></li>
                                    <li><a href="{{url('')}}/faq">FAQ</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="widget">
                                <h4 class="widget-title">Customer Policies</h4>
                                <ul class="widget-body">
                                    <li><a href="{{url('')}}/track-order">Track My Order</a></li>
                                    <li><a href="{{url('')}}/returns-policy">Returns Policy</a></li>
                                    <li><a href="{{url('')}}/term-conditions">Term and Conditions</a></li>
                                    <li><a href="{{url('')}}/privacy-policy">Privacy Policy</a></li>
                                    <li><a href="{{url('')}}/sitemap">Sitemap</a></li>
                                    @if(!Auth::user())
                                        <li><a style="color: #9a2948; font-weight: bold;" href="{{url('')}}/login">Sign In</a></li>
                                         <li><a style="color: #9a2948; font-weight: bold;" href="{{url('')}}/supplier-register">Become a Supplier</a></li>
                                    @endif
                                    
                                    @if(Auth::user())
                                        @if(Auth::user()->role == 'admin')
                                           <li><a style="color: #9a2948; font-weight: bold;" href="{{url('')}}/admin/dashboard">Dashboard</a></li>
                                        @endif
                                    @endif
                                    @if(Auth::user())
                                        @if(Auth::user()->role == 'vendor')
                                           <li><a style="color: #9a2948; font-weight: bold;" href="{{url('')}}/vendor/dashboard">Dashboard</a></li>
                                        @endif
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="widget">
                                <h4 class="widget-title">Contact Us</h4>
                                @foreach (array_slice(getpostcontent_only_field(11),0, 1) as $val)
                                    <ul class="widget-body">
                                        <li><a style="line-height: 25px;" href="#">{{ $val->address }}</a></li>
                                        <li><a href="#"><strong>CIN:</strong> {{ $val->cin_no }}</a></li>
                                        <li><a href="#"><strong>E-mail: </strong>{{ $val->email }}</a></li>  
                                    </ul>
                                @endforeach    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="footer-left">
                        <p class="copyright">Copyright © 2023 Amaron Shop. All Rights Reserved.</p>
                    </div>
                    <div class="footer-right">
                        <span class="payment-label mr-lg-8">We're using safe payment for</span>
                        <figure class="payment">
                            <img src="{{ asset('') }}frantend/assets/images/payment.png" alt="payment" width="159" height="25" />
                        </figure>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->
    </div>
    <!-- End of Page-wrapper -->

    <!-- Start of Sticky Footer -->
    <div class="sticky-footer sticky-content fix-bottom">
        <a href="/" class="sticky-link active">
            <i class="w-icon-home"></i>
            <p>Home</p>
        </a>
        <a href="{{ url('/shop') }}" class="sticky-link">
            <i class="w-icon-category"></i>
            <p>Shop</p>
        </a>
        <a href="{{ url('/my-account') }}" class="sticky-link">
            <i class="w-icon-account"></i>
            <p>Account</p>
        </a>
        <div class="cart-dropdown dir-up">
            <a href="{{ url('/cart') }}" class="sticky-link">
                <i class="w-icon-cart"></i>
                <p>Cart</p>
            </a>
            <!-- End of Dropdown Box -->
        </div>
    </div>
    <!-- End of Sticky Footer -->

    <!-- Start of Scroll Top -->
    <a id="scroll-top" class="scroll-top" href="#top" title="Top" role="button"> <i class="w-icon-angle-up"></i> <svg
            version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70 70">
            <circle id="progress-indicator" fill="transparent" stroke="#000000" stroke-miterlimit="10" cx="35" cy="35"
                r="34" style="stroke-dasharray: 16.4198, 400;"></circle>
        </svg> </a>
    <!-- End of Scroll Top -->

    <!-- Start of Mobile Menu -->
    <div class="mobile-menu-wrapper">
        <div class="mobile-menu-overlay"></div>
        <!-- End of .mobile-menu-overlay -->

        <a href="#" class="mobile-menu-close"><i class="close-icon"></i></a>
        <!-- End of .mobile-menu-close -->

        <div class="mobile-menu-container scrollable">
            <form action="#" method="get" class="input-wrapper">
                <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Search"
                    required />
                <button class="btn btn-search" type="submit">
                    <i class="w-icon-search"></i>
                </button>
            </form>
            <!-- End of Search Form -->
            <div class="tab">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="#categories" class="nav-link active" >Categories</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane active in" id="categories">
                    <ul class="mobile-menu">
                        
                    @foreach (getcategory()->slice(0, 11) as $val)        
                        <li>
                            <a href="{{ url('') }}/category/{{ $val->slug }}">
                               {{ $val->title }}
                            </a>
                        </li>
                    @endforeach
                    
                    @if(Auth::user())
                        <li>
                                <a style="color: #9a2948;"  href="{{url('')}}/logout_all">
                                   Logout
                                </a>
                        </li>
                    @else
                        <li>
                                <a  style="color: #9a2948;"  href="{{url('')}}/login">
                                  Sign In
                                </a>
                        </li>
                    @endif
                    
                    
                        <!--<li>-->
                        <!--    <a href="demo12-shop.html" class="font-weight-bold text-primary text-uppercase ls-25">-->
                        <!--        View All Categories<i class="w-icon-angle-right"></i>-->
                        <!--    </a>-->
                        <!--</li>-->
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Mobile Menu -->

     <!-- Root element of PhotoSwipe. Must have class pswp -->
     <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

        <!-- Background of PhotoSwipe. It's a separate element as animating opacity is faster than rgba(). -->
        <div class="pswp__bg"></div>

        <!-- Slides wrapper with overflow:hidden. -->
        <div class="pswp__scroll-wrap">

            <!-- Container that holds slides.
			PhotoSwipe keeps only 3 of them in the DOM to save memory.
			Don't modify these 3 pswp__item elements, data is added later on. -->
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>

            <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
            <div class="pswp__ui pswp__ui--hidden">

                <div class="pswp__top-bar">

                    <!--  Controls are self-explanatory. Order can be changed. -->

                    <div class="pswp__counter"></div>

                    <button class="pswp__button pswp__button--close" aria-label="Close (Esc)"></button>
                    <button class="pswp__button pswp__button--zoom" aria-label="Zoom in/out"></button>

                    <div class="pswp__preloader">
                        <div class="loading-spin"></div>
                    </div>
                </div>

                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div>

                <button class="pswp__button--arrow--left" aria-label="Previous (arrow left)"></button>
                <button class="pswp__button--arrow--right" aria-label="Next (arrow right)"></button>

                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of PhotoSwipe -->
    
    
<style>
    .download_app {
    position: fixed;
    width: 510px;
    background: #30cb30;
    align-items: center;
    justify-content: space-around;
    max-width: 100%;
    bottom: 0;
    z-index: 999999 !important;

}

.download_app svg {
    width: 21px;
}

.download_app h6 {
    font-size: 18px;
    color: #fff;
}

.download_app {
    padding: 12px 6px;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
    cursor: pointer;
}
</style>
    
    
<div id="download_app" class="download_app" onclick="pwaInstall.install()">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19 13H5V20H19V13ZM19 11C19 7.13401 15.866 4 12 4C8.13401 4 5 7.13401 5 11H19ZM6.38231 3.9681C7.92199 2.73647 9.87499 2 12 2C14.125 2 16.078 2.73647 17.6177 3.9681L19.0711 2.51472L20.4853 3.92893L19.0319 5.38231C20.2635 6.92199 21 8.87499 21 11V21C21 21.5523 20.5523 22 20 22H4C3.44772 22 3 21.5523 3 21V11C3 8.87499 3.73647 6.92199 4.9681 5.38231L3.51472 3.92893L4.92893 2.51472L6.38231 3.9681ZM9 9C8.44772 9 8 8.55228 8 8C8 7.44772 8.44772 7 9 7C9.55228 7 10 7.44772 10 8C10 8.55228 9.55228 9 9 9ZM15 9C14.4477 9 14 8.55228 14 8C14 7.44772 14.4477 7 15 7C15.5523 7 16 7.44772 16 8C16 8.55228 15.5523 9 15 9Z" fill="rgba(255,255,255,1)"></path></svg>
<h6 class="mb-0" >Download App</h6>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M3 19H21V21H3V19ZM13 13.1716L19.0711 7.1005L20.4853 8.51472L12 17L3.51472 8.51472L4.92893 7.1005L11 13.1716V2H13V13.1716Z" fill="rgba(255,255,255,1)"></path></svg>
</div>


    
    

    <!-- Plugin JS File -->
    
    <script src="{{ asset('') }}frantend/assets/logopwa/pwa-install.bundle.js"></script>
    
    <script src="{{ asset('') }}frantend/assets/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('') }}frantend/assets/vendor/sticky/sticky.js"></script>
    <script src="{{ asset('') }}frantend/assets/vendor/jquery.plugin/jquery.plugin.min.js"></script>
    <script src="{{ asset('') }}frantend/assets/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('') }}frantend/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('') }}frantend/assets/vendor/zoom/jquery.zoom.js"></script>
    <script src="{{ asset('') }}frantend/assets/vendor/photoswipe/photoswipe.js"></script>
    <script src="{{ asset('') }}frantend/assets/vendor/photoswipe/photoswipe-ui-default.js"></script>
    <script src="{{ asset('') }}frantend/assets/vendor/parallax/parallax.min.js"></script>

    <script src="{{ asset('') }}frantend/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="{{ asset('') }}frantend/assets/vendor/skrollr/skrollr.min.js"></script>
    <script src="{{ asset('') }}frantend/assets/vendor/jquery.countdown/jquery.countdown.min.js"></script>

    <script src="{{ asset('') }}frantend/assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS -->
    <script src="{{ asset('') }}frantend/assets/js/main.min.js"></script>
    
    
    <script type="text/javascript">
		var pwaInstall = document.getElementById("pwa-install");
		if (window.matchMedia('(display-mode: standalone)').matches) {
		var sele = document.getElementById('download_app').style.display='none';
		var sele = document.getElementById('download_appp').style.display='none';
		}
	</script>

    
    <script>
        @if (Session::has('login_msg'))
            iziToast.success({
                message: '{{ Session::get('login_msg') }}',
                position: 'topRight',
            });
        @endif
    </script>
    <script>
        @if (Session::has('error'))
            iziToast.error({
                message: '{{ Session::get('error') }}',
                position: 'topRight',
            });
        @endif
    </script>
    
    <script>
        @if (Session::has('success'))
            iziToast.success({
                message: '{{ Session::get('success') }}',
                position: 'topRight',
            });
        @endif
    </script>
    <script>
            if ('canShare' in navigator) {
          const share = async function(shareimg, shareurl, sharetitle, sharetext) {
            try {
              const response = await fetch(shareimg);
              const blob = await response.blob();
              const file = new File([blob], 'rick.jpg', {type: blob.type});
        
              await navigator.share({
                url: shareurl,
                title: sharetitle,
                text: sharetext,
                files: [file]
              });
            } catch (err) {
              console.log(err.name, err.message);
            }
          };
        
         
            $('.sharenow').click(function(){
                var url = $(this).attr('href');
                var title = $(this).attr('name');
                var image = $(this).attr('src');
                share(
                  image,
                  url,
                  title,
                  title
                );
            })  
        }
            
    </script>
    
</body>


<!-- Mirrored from portotheme.com/html/wolmart/demo12.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 29 Jan 2023 15:46:55 GMT -->
</html>