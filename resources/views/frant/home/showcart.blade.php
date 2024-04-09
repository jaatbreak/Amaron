@extends('frant.include.include')
@section('content')

<style>
    td.product-price {
        text-align: center;
    }
    td.product-quantity {
        text-align: center;
    }
    td.product-subtotal {
        text-align: center;
    }
    .input-group a {
        position: absolute;
        top: 50%;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
        right: 1.5rem;
        padding: 0;
        width: 2.4rem;
        height: 2.4rem;
        border-radius: 50%;
        background-color: #eee;
        color: #666;
        font-size: 1.4rem;
        border: none;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .shop-table .btn-close {
        position: absolute !important;
        padding: 0;
        background: #fff;
        border: 2px solid #fff;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        -webkit-box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 0.4) !important;
        box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 0.4) !important;
        top: -14px !important;
        right: -8px !important;
        display: flex;
        justify-content: center;
        align-items: center;
        padding-top: 3px;
        padding-left: 1px;
    }
    .input-group a + a {
        margin-right: 3.3rem;
    }
    .cart .page-header, .checkout .page-header {
        background-color: #eee !important;
        margin-bottom: 30px !important;
    }
     .p_name_width a{width: 150px !important; display: block; margin: auto;}
     .p_name_widthh{width: 150px !important;  margin: auto;}
     
    @media only screen and (max-width: 600px) {
        .sticky-sidebar {
            width: auto !important;
        }
    }
    @media only screen and (max-width: 767px) {
        .p_name_width a {
            width: 100% !important;
        }
    }
   
</style>
        <!-- Start of Main -->
        
        @php
            $total_tax = 0 ;
        @endphp
        
        

        <main class="main cart">
            <div class="page-header" style="height: 180px;">
                <div class="container">
                    <h1 class="page-title mb-0">CART</h1>
                </div>
            </div>
            <!-- Start of PageContent -->
            <div class="page-content">
                <div class="container">
                    <div class="row gutter-lg mb-10">
                        <div class="col-lg-8 pr-lg-4 mb-6">
                            <table class="shop-table cart-table">
                                <thead>
                                    <tr>
                                        <th class="product-name"><span>Product</span></th>
                                        <th></th>
                                        <th class="product-price"><span>Price</span></th>
                                        <th class="product-quantity"><span>Quantity</span></th>
                                        {{-- <th class="product-quantity"><span>Tax</span></th> --}}
                                        <th class="product-subtotal"><span>Subtotal</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $discount = 0;
                                    $total_regular_price = 0;
                                    @endphp
                                    @foreach ($cartitems as $val)
                                    
                                    
                                        @foreach ($product->where('id', $val->id) as $item)

                                        @inject('commonController', 'App\Http\Controllers\CommonController')

                                        @php
                                        $item = $commonController->price_calculate($item);
                                        @endphp
                                        <tr>
                                            <td class="product-thumbnail">
                                                <div class="p-relative">
                                                    <a href="#">
                                                        <figure>
                                                            <img src="{{ asset('uploads') }}/{{ $item->product_image }}" alt="product" width="300" height="338">
                                                        </figure>
                                                    </a>
                                                    <a  href="{{ url('/removecart').'/'.$val->id; }}" class="btn btn-close"><i class="fas fa-times"></i></a>
                                                </div>
                                            </td>
                                            <td  class="product-name p_name_width">
                                                <a  href="#">
                                                    {{ $item->product_name }}
                                                </a>
                                                <div class="p_name_widthh" class="d-flex" style=" width: 150px; margin: auto; display: flex; justify-content: center;" >
                                                    <?php foreach($val['attributes'] as $key => $valk){ ?>
                                                    <label class="pr-3"><?= $key.' : '.$valk ?></label>
                                                    <?php } ?>
                                                </div>
                                            </td>
                                            <td class="product-price">
                                                <span class="amount">₹ {{ $item->product_calculate_price }} </span>
                                                {{-- @if(300 >= $item->product_sale_price)
                                                        <span class="amount">₹ {{ ceil(((8.5 / 100)*( $item->product_sale_price+5))+( $item->product_sale_price+5)) }} </span>
                                                        @elseif (500 >=  $item->product_sale_price)
                                                            <span class="amount">₹ {{ ceil(((6 / 100)*( $item->product_sale_price+5))+( $item->product_sale_price+5)) }} </span>
                                                        @elseif (1000 >=  $item->product_sale_price)
                                                            <span class="amount">₹ {{ ceil(((5 / 100)*( $item->product_sale_price+5))+( $item->product_sale_price+5)) }} </span>
                                                        @elseif (2000 >=  $item->product_sale_price)
                                                            <span class="amount">₹ {{ ceil(((4.75 / 100)*( $item->product_sale_price+5))+( $item->product_sale_price+5)) }} </span>
                                                        @elseif (3000 >=  $item->product_sale_price)
                                                            <span class="amount">₹ {{ ceil(((4.5 / 100)*( $item->product_sale_price+5))+( $item->product_sale_price+5)) }} </span>
                                                        @elseif (4000 >=  $item->product_sale_price)
                                                            <span class="amount">₹ {{ ceil(((4.25 / 100)*( $item->product_sale_price+5))+( $item->product_sale_price+5)) }} </span>
                                                        @elseif (5000 >=  $item->product_sale_price)
                                                            <span class="amount">₹ {{ ceil(((4 / 100)*( $item->product_sale_price+5))+( $item->product_sale_price+5)) }} </span>
                                                        @elseif (10000 >=  $item->product_sale_price)
                                                            <span class="amount">₹ {{ ceil(((3.5 / 100)*( $item->product_sale_price+5))+( $item->product_sale_price+5)) }} </span>
                                                        @else
                                                        <span class="amount"> ₹ {{ ceil(((3 / 100)*( $item->product_sale_price+5))+( $item->product_sale_price+5)) }} </span>
                                                        @endif --}}
                                            </td>
                                            <td class="product-quantity">
                                                <div class="input-group">
                                                    <input class=" form-control" value="{{ $val->quantity }}" type="number" min="1" max="100000">
                                                    <a href="{{ url('/updateCart').'/'.$val->id; }}/plus" class="quantity-plus w-icon-plus"></a>
                                                    <a href="{{ url('/updateCart').'/'.$val->id; }}/minus" class="quantity-minus w-icon-minus"></a>
                                                </div>
                                            </td>
                                            {{-- <td class="product-tax text-center">
                                                <span class="amount">
                                                    
                                                    @php
                                                        $total_tax += $tax = (($item->sgst + $item->cgst)*$item->product_sale_price)/100*$val->quantity ;
                                                    @endphp
                                                    
                                                    {{ $tax }}
                                                </span>
                                            </td> --}}
                                            <td class="product-subtotal">
                                                <span class="amount">₹ {{ Cart::get($val->id)->getPriceSum(); }}</span>
                                            </td>
                                        </tr>

                                        @php
                                            $total_regular_price += ($item->product_regular_calculate_price*$val->quantity);
                                            $discount += ($item->product_regular_calculate_price-$item->product_calculate_price)*$val->quantity;
                                        @endphp

                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="cart-action mb-6">
                                <a href="{{ url('/') }}" class="btn btn-dark btn-rounded btn-icon-left btn-shopping mr-auto"><i class="w-icon-long-arrow-left"></i>Continue Shopping</a>
                                <a href="{{ url('cartclear') }}" class="btn btn-rounded btn-default btn-clear" name="clear_cart" value="Clear Cart">Clear Cart</a> 
                            </div>

                            <form class="coupon">
                                <h5 class="title coupon-title font-weight-bold text-uppercase">Coupon Discount</h5>
                                <input type="text" class="form-control mb-4" placeholder="Enter coupon code here..." required="">
                                <button class="btn btn-dark btn-outline btn-rounded">Apply Coupon</button>
                            </form>
                        </div>
                        <div class="col-lg-4 sticky-sidebar-wrapper">
                            <div class="pin-wrapper" style="height: 789.175px;"><div class="sticky-sidebar" style="border-bottom: 0px none rgb(102, 102, 102); width: 393.325px;">
                                <div class="cart-summary mb-4">
                                    <h3 class="cart-title text-uppercase">Cart Totals</h3>
                                    <div class="cart-subtotal d-flex align-items-center justify-content-between">
                                        <label class="ls-25">Market Price</label>
                                        <span>₹ 
                                            <?= $total_regular_price ?>
                                            {{-- <?= Cart::getSubTotal(); ?> --}}
                                        </span>
                                    </div>

                                        
                                    <hr class="divider mb-6">
                                    <div class="order-total d-flex justify-content-between align-items-center">
                                        <label>Discount</label>
                                        <span class="ls-50">- ₹ {{ $discount }}</span>
                                    </div>
                                    
                                    {{-- <div class="order-total d-flex justify-content-between align-items-center">
                                        <label>Tax</label>
                                        <span class="ls-50">₹ {{ $total_tax }} </span>
                                    </div> --}}

                                    <hr class="divider mb-6">
                                    <div class="order-total d-flex justify-content-between align-items-center">
                                        <label>Total</label>
                                        <span class="ls-50">₹ <?= Cart::getSubTotal()+$total_tax; ?></span>
                                    </div>
                                    <a href="{{ url('checkout') }}" class="btn btn-block btn-dark btn-icon-right btn-rounded  btn-checkout">
                                        Proceed to checkout <i class="w-icon-long-arrow-right"></i>
                                    </a>
                                </div>
                            </div></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of PageContent -->
        </main>
        <!-- End of Main -->        
<script>
    @if (Session::has('add_cart'))
        iziToast.success({
            message: '{{ Session::get('add_cart') }}',
            position: 'topRight',
        });
    @endif
</script>
    

@endsection
        