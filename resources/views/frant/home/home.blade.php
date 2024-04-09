@extends('frant.include.include')
@section('content')
<style>
.link-banner-newsletter {
    padding: 7.9rem 0 3.8rem 0 !important;
}
@media only screen and (max-width: 600px) {
  .category.category-ellipse {
    padding: 0px 5px !important;
    }
    .category .category-media {
        width: 70px !important;
    }
    .category-wrapper .category .category-media {
        min-width: unset !important;
    }
    .icon-box.icon-colored-circle .icon-box-icon {
        width: 70px !important;
        height: 70px !important;
    }
}

</style>
        <!-- Start of Main -->
        <main class="main">
            <div class="container pb-2">
                <div class="category-wrapper row cols-12 pt-0 pt-sm-4">
                    @foreach (getcategory()->slice(0, 11) as $val)
                    <div class="category category-ellipse ">
                        <figure class="category-media">
                            <a href="{{ url('') }}/category/{{ $val->slug }}">
                                <img src="{{ asset('uploads') }}/{{ $val->thumbnail }}" alt="" alt="Categroy" width="190"
                                    height="190" />
                            </a>
                        </figure>
                        <div class="category-content">
                            <h4 class="category-name">
                                <a href="{{ url('') }}/category/{{ $val->slug }}">{{ $val->title }}</a>
                            </h4>
                        </div>
                    </div>
                    @endforeach
                    <div class="category category-ellipse ">
                        <div class="icon-box icon-colored-circle">
                            <span class="icon-box-icon mb-0 text-white">
                                <i class="w-icon-hamburger"></i>
                            </span>
                        </div>
                        <div class="category-content">
                            <h4 class="category-name">
                                <a href="demo12-shop.html">Categories</a>
                            </h4>
                        </div>
                    </div>
                </div>
                <!-- End Of Category Wrapper -->
                <div class="intro-section d-none d-lg-block ">
                    <div class="row">
                        <div class="intro-wrapper col-lg-12 ">
                            <div style="height: 280px" class="swiper-container swiper-theme pg-inner pg-white animation-slider" data-swiper-options="{ 'spaceBetween': 20, 'slidesPerView': 3, 'autoplay': { 'delay': 5000 } }">
                                <div class="swiper-wrapper row gutter-no cols-1">
                                    @foreach (getpostcontent_only_field(6) as $val)
                                            <div class="swiper-slide " style="background-image: url({{ asset('uploads') }}/{{ $val->image }}); background-color: #3F3E3A;"> </div>
                                    @endforeach
                                </div>
                                <div style="bottom: 0.9rem !important;" class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <div class="intro-section d-lg-none">
                    <div class="row">
                        <div class="intro-wrapper col-lg-12 phone_intro">
                            <div style="height: auto" class="swiper-container swiper-theme pg-inner pg-white animation-slider" data-swiper-options="{ 'spaceBetween': 0, 'slidesPerView': 1, 'autoplay': { 'delay': 5000 } }">
                                <div class="swiper-wrapper row gutter-no cols-1">
                                    @foreach (getpostcontent_only_field(6) as $val)
                                            <div class="swiper-slide " >
                                                <img src="{{ asset('uploads') }}/{{ $val->image }}" />
                                            </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <div class="container "  style="padding: 0px;">
                    <div class="row">
                        <?php foreach($selected_products as $key => $val){ ?>
                            <div class="col-md-3 col-6 mt-2 mb-2" >
                                <?= single_item($val['id']); ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>


            @foreach (array_slice(getpostcontent_only_field(10), 0 , 1) as $val)
                <div id="download_appp" class="banner link-banner-newsletter d-flex mb-8 align-items-center row gutter-no br-sm mt-2  appear-animate" style="background-image: url({{ asset('uploads') }}/{{ $val->image }}); background-color: #27393D;">
                    <div class="col-xl-5 col-lg-4 mr-auto">
                    </div>
                    <div class="banner-content col-xl-5 col-lg-6 col-sm-8 mb-4">
                        <h2 class="banner-title text-white text-capitalize font-secondary font-weight-bolder">{{ $val->heading }}</h2>
                        <p>{{ $val->desc }}</p>
                    </div>
                    <div class="col-lg-2 col-sm-4 newsletter-button">
                        <a href="{{ $val->google_play_store_link }}">
                            <img src="{{ asset('') }}frantend/assets/images/demos/demo12/banner/button-1.jpg" class="mb-4" alt="Button" width="141" height="41" style="background-color: #121315" />
                        </a>
                        <a href="{{ $val->app_store_store_link }}">
                            <img src="{{ asset('') }}frantend/assets/images/demos/demo12/banner/button-2.jpg" alt="Button" width="141" height="41" style="background-color: #121315" />
                        </a>
                    </div>
                </div>
            @endforeach  

                <div class="swiper-container swiper-theme icon-box-wrapper br-sm mt-0 mb-8 appear-animate"
                    data-swiper-options="{
                        'slidesPerView': 1,
                            'breakpoints': {
                                '576': {
                                    'slidesPerView': 2
                                },
                                '992': {
                                    'slidesPerView': 3
                                },
                                '1200': {
                                    'slidesPerView': 4
                                }
                            }
                    }">
                    <div class="swiper-wrapper row cols-md-4 cols-sm-3 cols-1">
                        <div class="swiper-slide icon-box icon-box-side text-dark">
                            <span class="icon-box-icon icon-shipping">
                                <i class="w-icon-truck"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title font-weight-bolder">Free Shipping &amp; Returns</h4>
                                <p class="text-default">For all orders over $99</p>
                            </div>
                        </div>
                        <div class="swiper-slide icon-box icon-box-side text-dark">
                            <span class="icon-box-icon icon-payment">
                                <i class="w-icon-bag"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title font-weight-bolder">Secure Payment</h4>
                                <p class="text-default">We ensure secure payment</p>
                            </div>
                        </div>
                        <div class="swiper-slide icon-box icon-box-side text-dark icon-box-money">
                            <span class="icon-box-icon icon-money">
                                <i class="w-icon-money"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title font-weight-bolder">Money Back Guarantee</h4>
                                <p class="text-default">Any back within 30 days</p>
                            </div>
                        </div>
                        <div class="swiper-slide icon-box icon-box-side text-dark icon-box-chat mt-0">
                            <span class="icon-box-icon icon-chat">
                                <i class="w-icon-chat"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title font-weight-bolder">Customer Support</h4>
                                <p class="text-default">Call or email us 24/7</p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!-- End of Container -->

        </main>
        <!-- End of Main -->

 



@endsection