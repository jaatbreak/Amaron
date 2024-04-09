@extends('frant.include.include')
@section('content')



<div class="container" >
    
    <div class="order" >
        <div class="order-details-wrapper mb-5">
                                    <h4 class="title text-uppercase ls-25 mb-5">Order Details</h4>
                                    <table class="order-table">
                                        <thead>
                                            <tr>
                                                <th class="text-dark">Product</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <a href="#">Palm Print Jacket</a>&nbsp;<strong>x 1</strong><br>
                                                    Vendor : <a href="#">Vendor 1</a>
                                                </td>
                                                <td>$40.00</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#">Brown Backpack</a>&nbsp;<strong>x 1</strong><br>
                                                    Vendor : <a href="#">Vendor 1</a>
                                                </td>
                                                <td>$60.00</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Subtotal:</th>
                                                <td>$100.00</td>
                                            </tr>
                                            <tr>
                                                <th>Shipping:</th>
                                                <td>Flat rate</td>
                                            </tr>
                                            <tr>
                                                <th>Payment method:</th>
                                                <td>Direct bank transfor</td>
                                            </tr>
                                            <tr class="total">
                                                <th class="border-no">Total:</th>
                                                <td class="border-no">$100.00</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
    </div>
</div>




@endsection