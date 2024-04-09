@extends('frant.include.include')
@section('content')


<style>
    th.product-price {
    }
    td.product-price {
        text-align: center;
    }
    td.product-stock-status {
        text-align: center;
    }
    td.wishlist-action div {
        display: flex;
        justify-content: center;
    }
</style>

<div class="page-header">
    <div class="container">
        <h1 class="page-title mb-0">Wishlist</h1>
    </div>
</div>
<nav class="breadcrumb-nav">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{url('/admin/dashboard')}}">Home</a></li>
            <li>Wishlist</li>
        </ul>
    </div>
</nav>

            <!-- Start of PageContent -->
            <div class="page-content mt-10">
                <div class="container">
                    <h3 class="wishlist-title">My wishlist</h3>
                    <table class="shop-table wishlist-table">
                        <thead>
                            <tr>
                                <th class="product-name"><span>Product</span></th>
                                <th></th>
                                <th class="product-price"><span>Price</span></th>
                                <th class="product-stock-status"><span>Stock Status</span></th>
                                <th class="wishlist-action">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="product-thumbnail">
                                    <div class="p-relative">
                                        <a href="product-default.html">
                                            <figure>
                                                <img src="http://localhost:8000/frantend/assets/images/demos/demo12/products/1-1-2.jpg" alt="product" width="300"
                                                    height="338">
                                            </figure>
                                        </a>
                                        <button type="submit" class="btn btn-close"> <i class="fas fa-times"></i></button>
                                    </div>
                                </td>
                                <td class="product-name">
                                    <a href="#">
                                        Blue Sky Trunk
                                    </a>
                                </td>
                                <td class="product-price">
                                    <ins class="new-price">$85.00</ins>
                                </td>
                                <td class="product-stock-status">
                                    <span class="wishlist-in-stock">In Stock</span>
                                </td>
                                <td class="wishlist-action">
                                    <div class="d-lg-flex">
                                        <a href="#" class="btn btn-quickview btn-outline btn-default btn-rounded btn-sm mb-2 mb-lg-0">Quick View</a>
                                        <a href="#" class="btn btn-dark btn-rounded btn-sm ml-lg-2 btn-cart">Add to cart</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End of PageContent -->


@endsection