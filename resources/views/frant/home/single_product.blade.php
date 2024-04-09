@extends('frant.include.include')
@section('content')

<style>
    .product-single .btn-cart0 {
    -webkit-box-flex: 1;
        -ms-flex: 1;
            flex: 1;
    margin-bottom: 0px;
    padding-left: 0;
    padding-right: 0;
    min-width: 14rem;
  }
  .product-single .btn-cart0 i {
    margin: 0 0.4rem 0.2rem 0;
    font-size: 1.7rem;
  }
  .product-single .product-qty-form {
    margin-bottom: 0;
}
</style>
  <!-- Start of Main -->
        <main class="main mb-10 pb-1">
            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav container">
                <ul class="breadcrumb bb-no">
                    <li><a href="{{ asset('/') }}">Home</a></li>
                    <li>Product</li>
                    <li>{{ $product->product_name }}</li>
                </ul>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- Start of Page Content -->
            <div class="page-content">
                <div class="container">
                    <div class="row gutter-lg">
                        <div class="main-content" style="max-width: 100% !important;" >
                            <div class="product product-single row">
                                <div class="col-md-6 mb-6">
                                    <div class="product-gallery product-gallery-sticky">
                                        <div class="swiper-container product-single-swiper swiper-theme nav-inner" data-swiper-options="{
                                            'navigation': {
                                                'nextEl': '.swiper-button-next',
                                                'prevEl': '.swiper-button-prev'
                                            }
                                        }">
                                            <div class="swiper-wrapper row cols-1 gutter-no">
                                                <div class="swiper-slide">
                                                    <figure class="product-image">
                                                        <img src="{{ url('/').'/uploads/'.$product->product_image }}" data-zoom-image="{{ url('/').'/uploads/'.$product->product_image }}" alt="{{ $product->product_name }}" width="800" height="900">
                                                    </figure>
                                                </div>

                                                @foreach (explode(',',$product->product_gallery) as $val)
                                                    <div class="swiper-slide">
                                                        <figure class="product-image">
                                                            <img src="{{ url('/').'/uploads/'.$val }}" data-zoom-image="{{ url('/').'/uploads/'.$val }}" alt="{{ $product->product_name }}" width="800" height="900">
                                                        </figure>
                                                    </div>
                                                @endforeach

                                            </div>
                                            <button class="swiper-button-next"></button>
                                            <button class="swiper-button-prev"></button>
                                            <a href="#" class="product-gallery-btn product-image-full">
                                                <i class="w-icon-zoom"></i>
                                            </a>
                                        </div>
                                        <div class="product-thumbs-wrap swiper-container" data-swiper-options="{
                                            'navigation': {
                                                'nextEl': '.swiper-button-next',
                                                'prevEl': '.swiper-button-prev'
                                            }
                                        }">
                                            <div class="product-thumbs swiper-wrapper row cols-4 gutter-sm">

                                                <div class="product-thumb swiper-slide">
                                                    <img src="{{ url('/').'/uploads/'.$product->product_image }}" alt="{{ $product->product_name }}" width="800" height="900">
                                                </div>

                                                @foreach (explode(',',$product->product_gallery) as $val)
                                                    <div class="product-thumb swiper-slide">
                                                        <img src="{{ url('/').'/uploads/'.$val }}" alt="{{ $product->product_name }}" width="800" height="900">
                                                    </div>
                                                @endforeach

                                            <button class="swiper-button-next"></button>
                                            <button class="swiper-button-prev"></button>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-6 mb-4 mb-md-6">
                                    <div class="product-details" data-sticky-options="{'minWidth': 767}">
                                        <h1 class="product-title">{{ $product->product_name }}</h1>
                                        <div class="product-bm-wrapper">
                                            <div class="product-meta">
                                                <div class="product-sku">
                                                    SKU: <span style="text-transform: uppercase;">{{ $product->hsn }}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="product-divider">

                                        <div class="product-price"> 
                                            <ins class="new-price">₹ {{ $product->product_calculate_price }} </ins> 
                                            <del class="old-price">₹ {{ $product->product_regular_calculate_price }} </del>

                                        {{-- @if(300 >= $product->product_sale_price)
                                            <ins class="new-price">₹ {{ ceil(
                                                ((8.5 / 100)*($product->product_sale_price+5))+($product->product_sale_price+5)
                                                ) }} </ins> 
                                            <del class="old-price">₹ {{ ceil(((8.5 / 100)*($product->product_regular_price+5))+($product->product_regular_price+5)) }} </del>
                                        @elseif (500 >= $product->product_sale_price)
                                            <ins class="new-price">₹ {{ ceil(
                                                ((6 / 100)*($product->product_sale_price+5))+($product->product_sale_price+5)
                                                ) }} </ins> 
                                            <del class="old-price">₹ {{ ceil(((6 / 100)*($product->product_regular_price+5))+($product->product_regular_price+5)) }} </del>
                                        @elseif (1000 >= $product->product_sale_price)
                                            <ins class="new-price">₹ {{ ceil(((5 / 100)*($product->product_sale_price+5))+($product->product_sale_price+5)) }} </ins> 
                                            <del class="old-price">₹ {{ ceil(((5 / 100)*($product->product_regular_price+5))+($product->product_regular_price+5)) }} </del>
                                        @elseif (2000 >= $product->product_sale_price)
                                            <ins class="new-price">₹ {{ ceil(((4.75 / 100)*($product->product_sale_price+5))+($product->product_sale_price+5)) }} </ins> 
                                            <del class="old-price">₹ {{ ceil(((4.75 / 100)*($product->product_regular_price+5))+($product->product_regular_price+5)) }} </del>
                                        @elseif (3000 >= $product->product_sale_price)
                                            <ins class="new-price">₹ {{ ceil(((4.5 / 100)*($product->product_sale_price+5))+($product->product_sale_price+5)) }} </ins> 
                                            <del class="old-price">₹ {{ ceil(((4.5 / 100)*($product->product_regular_price+5))+($product->product_regular_price+5)) }} </del>
                                        @elseif (4000 >= $product->product_sale_price)
                                            <ins class="new-price">₹ {{ ceil(((4.25 / 100)*($product->product_sale_price+5))+($product->product_sale_price+5)) }} </ins> 
                                            <del class="old-price">₹ {{ ceil(((4.25 / 100)*($product->product_regular_price+5))+($product->product_regular_price+5)) }} </del>
                                        @elseif (5000 >= $product->product_sale_price)
                                            <ins class="new-price">₹ {{ ceil(((4 / 100)*($product->product_sale_price+5))+($product->product_sale_price+5)) }} </ins> 
                                            <del class="old-price">₹ {{ ceil(((4 / 100)*($product->product_regular_price+5))+($product->product_regular_price+5)) }} </del>
                                        @elseif (10000 >= $product->product_sale_price)
                                            <ins class="new-price">₹ {{ ceil(((3.5 / 100)*($product->product_sale_price+5))+($product->product_sale_price+5)) }} </ins> 
                                            <del class="old-price">₹ {{ ceil(((3.5 / 100)*($product->product_regular_price+5))+($product->product_regular_price+5)) }} </del>
                                        @else
                                            <ins class="new-price">₹ {{ ceil(((3 / 100)*($product->product_sale_price+5))+($product->product_sale_price+5)) }} </ins> 
                                            <del class="old-price">₹ {{ ceil(((3 / 100)*($product->product_regular_price+5))+($product->product_regular_price+5)) }} </del>
                                        @endif --}}
                                            
                                        <span class="price_off" style=" float: none; color: #ff905a; letter-spacing: 0.5px !important; font-weight: 600; font-size: 16px !important; text-transform: uppercase; "> ( {{ round(( $product->product_regular_calculate_price - $product->product_calculate_price )/$product->product_regular_calculate_price * 100) }} % 0ff ) </span>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 80%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="#product-tab-reviews" class="rating-reviews scroll-to">(3
                                                Reviews)</a>
                                        </div>

                                        <div class="product-short-desc">
                                            <?= $product->product_sort_desc  ?>
                                        </div>
                                        <form action="{{url('')}}/addtocart/{{ $product->slug }}" >
                                            <div class="d-flex my-3 pb-5">
                                        <?php 
                                            $newarray = [];
                                            foreach($attributes as $apv){
                                                $data = json_decode($apv);
                                                foreach($data as $key => $val){
                                                    if($val){
                                                        $newarray[$key][] = $val;
                                                    }
                                                }
                                            }
                                           foreach($newarray as $akey => $aval){ ?>  
                                            <div class="form-group mr-3">
                                                <h3 class="text-capitalize"><?= $akey ?></h3>
                                                <select name="<?= $akey ?>" class="form-control" required>
                                                    <?php foreach($aval as $mm){ ?>
                                                    <option value="<?= $mm ?>"><?= $mm ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                           <?php }
                                        ?>
                                        </div>
                                        
                                        <!--<hr class="product-divider">-->
                                        <div class="product-variation-price_product">
                                        </div>
                                        <div class="sticky-content-wrapper">
                                            <div class="fix-bottom product-sticky-content sticky-content">
                                                <div class="product-form container">
                                                    <div class="product-qty-form">
                                                        <div class="input-group">
                                                            <input class="quantity form-control" type="number" min="1" max="{{ $product->stock_quantity }}">
                                                            <button class="quantity-plus w-icon-plus"></button>
                                                            <button class="quantity-minus w-icon-minus"></button>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary btn-cart0 "> <i class="w-icon-cart"> </i> <span>Add to Cart</span> </button>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                        <div class="social-links-wrapper">
                                            <div class="social-links">
                                                <div class="social-icons social-no-color border-thin">
                                                    <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                                    <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                                    <a href="#"
                                                        class="social-icon social-pinterest fab fa-pinterest-p"></a>
                                                    <a href="#" class="social-icon social-whatsapp fab fa-whatsapp"></a>
                                                    <a href="#"
                                                        class="social-icon social-youtube fab fa-linkedin-in"></a>
                                                </div>
                                            </div>
                                            <span class="divider d-xs-show"></span>
                                            <div class="product-link-wrapper d-flex">
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart "><span></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab tab-nav-boxed tab-nav-underline product-tabs">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a href="#product-tab-description" class="nav-link active">Description</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#product-tab-specification" class="nav-link">Specification</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#product-tab-reviews" class="nav-link">Customer Reviews</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="product-tab-description">
                                        <?= $product->product_sort_desc  ?>
                                    </div>
                                    <div class="tab-pane " id="product-tab-specification">
                                        <?= $product->product_specification  ?>
                                    </div>
                                    <div class="tab-pane" id="product-tab-reviews">
                                        <div class="row mb-4">
                                            <div class="col-xl-4 col-lg-5 mb-4">
                                                <div class="ratings-wrapper">
                                                    <div class="avg-rating-container">
                                                        <h4 class="avg-mark font-weight-bolder ls-50">3.3</h4>
                                                        <div class="avg-rating">
                                                            <p class="text-dark mb-1">Average Rating</p>
                                                            <div class="ratings-container">
                                                                <div class="ratings-full">
                                                                    <span class="ratings" style="width: 60%;"></span>
                                                                    <span class="tooltiptext tooltip-top"></span>
                                                                </div>
                                                                <a href="#" class="rating-reviews">(3 Reviews)</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-8 col-lg-7 mb-4">
                                                <div class="review-form-wrapper">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
            
            <!-- End of Page Content -->
        </main>
        <!-- End of Main -->

















        
@endsection        