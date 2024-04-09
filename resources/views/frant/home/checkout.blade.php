@extends('frant.include.include')
@section('content')

<style>
label.expand::after {
    display: none;
}
.card-header {
    padding: 3px 0px;
    font-size: 1.4rem;
    color: #666;
    font-weight: 400;
    margin-left: 13px;
}
.card-header {
    padding: 3px 0px;
    font-size: 1.4rem;
    color: #666;
    font-weight: 400;
    margin-left: 13px;
}
.payment-accordion {
    margin-top: 20px !important;
}
.card-header {
    display: flex;
}
input#cod {
    margin-right: 10px;
}
input#razarpay {
    margin-right: 10px;
}
input#phonepay {
    margin-right: 10px;
}
.cart .page-header, .checkout .page-header {
    background-color: #eee !important;
    margin-bottom: 30px !important;
}
</style>

    
        @php
            $total_tax = 0 ;
        @endphp

<main class="main checkout">
    <!-- Start of Breadcrumb -->
            <div class="page-header" style="height: 180px;">
                <div class="container">
                    <h1 class="page-title mb-0">Checkout</h1>
                </div>
            </div>
    <!-- Start of PageContent -->
    <div class="page-content">
        <div class="container">
            <form class="form checkout-form" method="post">
                @csrf
                <div class="row mb-9">
                    <div class="col-lg-7 pr-lg-4 mb-4">
                        <h3 class="title billing-title text-uppercase ls-10 pt-1 pb-3 mb-0">
                            Billing Details
                        </h3>
                        <div class="row gutter-md">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>Full Name *</label>
                                    <input type="text" placeholder="Full Name" class="form-control form-control-md" name="username" required>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group mb-7">
                                    <label>Country / Region *</label>
                                    <div class="select-box">
                                        <select name="country" class="form-control form-control-md">
                                            <option value="india" >India</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>Address *</label>
                                    <input type="text" placeholder="Address" class="form-control form-control-md" name="address" required>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>Town / City *</label>
                                    <input type="text" placeholder="Town / City" class="form-control form-control-md" name="town" required>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>State *</label>
                                    <input type="text" placeholder="State" class="form-control form-control-md" name="zip" required>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>PIN Code *</label>
                                    <input type="text" placeholder="PIN Code" class="form-control form-control-md" name="zip" required>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>Phone *</label>
                                    <input type="text" placeholder="Phone" class="form-control form-control-md" name="phone" required>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group mb-7">
                                    <label>Email Address *</label>
                                    <input type="email" placeholder="Email Address" class="form-control form-control-md" name="email" required>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group mt-3">
                                    <label for="order-notes">Order notes (optional)</label>
                                    <textarea class="form-control mb-0" placeholder="Order Notes" id="order-notes" name="order-notes" cols="30" rows="4" placeholder="Notes about your order, e.g special notes for delivery"></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-5 mb-4 sticky-sidebar-wrapper">
                        <div class="order-summary-wrapper sticky-sidebar">
                            <h3 class="title text-uppercase ls-10">Your Order</h3>
                            <div class="order-summary">
                                <table class="order-table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">
                                                <b>Product</b>
                                            </th>
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
                                                <tr class="bb-no">
                                                    <td class="product-name">{{ $item->product_name }} <i
                                                            class="fas fa-times"></i> <span
                                                            class="product-quantity">{{ $val->quantity }}</span></td>
                                                    <td class="product-total">₹ {{ Cart::get($val->id)->getPriceSum(); }}</td>
                                                </tr>
                                                @php
                                                    $total_regular_price += ($item->product_regular_calculate_price*$val->quantity);
                                                    $discount += ($item->product_regular_calculate_price-$item->product_calculate_price)*$val->quantity;
                                                @endphp
                                            @endforeach
                                        @endforeach
                                        {{-- <tr class="cart-subtotal bb-no">
                                            <td>
                                                <b>Subtotal</b>
                                            </td>
                                            <td>
                                                <b>₹ {{Cart::getSubTotal()}}</b>
                                            </td>
                                        </tr> --}}
                                        <tr class="cart-subtotal bb-no">
                                            <td>
                                                <b>Market Price</b>
                                            </td>
                                            <td>
                                                <b>₹ {{ $total_regular_price }}</b>
                                            </td>
                                        </tr>
                                        <tr class="cart-subtotal bb-no">
                                            <td>
                                                <b>Discount</b>
                                            </td>
                                            <td>
                                               
                                                <b>- ₹ {{ $discount }}</b>
                                            </td>
                                        </tr>
                                        {{-- <tr class="cart-subtotal bb-no">
                                            <td>
                                                <b>Tax</b>
                                            </td>
                                            <td> 
                                            @php
                                                $total_tax += $tax = (($item->sgst + $item->cgst)*$item->product_sale_price)/100*$val->quantity ;
                                            @endphp
                                                <b>₹ {{ $tax }}</b>
                                            </td>
                                        </tr> --}}
                                        <tr class="cart-subtotal bb-no">
                                            <td style="display: flex;" >
                                                <b>Shipping Charge</b>
                                            </td>
                                            <td>
                                                ₹ <span id="ship_charge">0</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr class="order-total">
                                            <th>
                                                <b>Total</b>
                                            </th>
                                            <td>
                                                <b>₹ <span id="total_id">{{Cart::getSubTotal()}}</span></b>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="payment-methods" id="payment_method">
                                    <h4 class="title font-weight-bold ls-25 pb-0 mb-1">Payment Methods</h4>
                                    <div class="accordion payment-accordion">
                                        <div class="card">
                                            <div class="card-header">
                                                <input type="radio" required name="payment_method" value="cod" id="cod">
                                                <label for="cod" class="expand">Cash on delivery</label>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header">
                                                <input type="radio" required name="payment_method" value="razarpay" id="razarpay">
                                                <label for="razarpay" class="expand">Razar Pay</label>
                                            </div>
                                        </div>
                                        
                                        <div class="card">
                                            <div class="card-header">
                                                <input type="radio" name="payment_method" value="phonepay" id="phonepay">
                                                <label for="phonepay" class="expand">PhonePe</label>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="form-group place-order pt-6">
                                    <button type="submit" class="btn btn-dark btn-block btn-rounded">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End of PageContent -->
</main>
<script
  src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        var total = $('#total_id').text();
        $('input[name="payment_method"]').change(function(event) {
            var val = $(this).val();
            if(val == 'cod'){
                $('#ship_charge').html(25);
                $('#total_id').text(parseInt(total)+25);
            }else{
                $('#ship_charge').html(0);
                $('#total_id').text(total);
            }
        });
    });
</script>
@endsection