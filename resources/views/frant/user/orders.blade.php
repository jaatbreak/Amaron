@extends('frant.include.include')
@section('content')

<style>
    .icon-box-light .icon-box-title {
        font-size: 2rem;
    }
    .icon-box.icon-box-side.icon-box-light {
        display: flex;
        justify-content: flex-start !important;
    }
    td.order-date {
        text-align: center;
    }
    td.order-status {
        text-align: center;
    }
    td.order-total {
        text-align: center;
    }
</style>


<div class="page-header">
    <div class="container">
        <h1 class="page-title mb-0">My Orders</h1>
    </div>
</div>
<nav class="breadcrumb-nav">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{url('/admin/dashboard')}}">Home</a></li>
            <li>My Orders</li>
        </ul>
    </div>
</nav>

<div class="container mt-5">
    <div class="tab-pane mb-4 active in" id="account-orders">
        <div class="icon-box icon-box-side icon-box-light">
            <span class="icon-box-icon icon-orders">
                <i class="w-icon-orders"></i>
            </span>
            <div class="icon-box-content">
                <h4 class="icon-box-title text-capitalize ls-normal mb-0">Orders</h4>
            </div>
        </div>

        <table class="shop-table account-orders-table mb-6">
            <thead>
                <tr>
                    <th style="text-align: left;" class="order-id">Order</th>
                    <th class="order-date">Date</th>
                    <th class="order-total">Total</th>
                    <th class="order-actions">Actions</th>
                    <th class="order-actions">Track Order</th>
                </tr>
            </thead>
            <tbody>
                
            @foreach ($order as $key => $val)
                @if($val->rand == $val->rand)
                    <tr>
                        <td class="order-id">#{{ $val->id }}</td>
                        <td class="order-date">{{ $val->date }}</td>
                        <td class="order-total"> <span class="order-price"> {{ $val->grand_total }} </td>
                        <td class="order-action">
                            <a href="{{ url('/invoice')}}/{{ $val->id }}" class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                        </td>
                        <td class="order-action">
                            <a href="{{ url('/track-order')}}/{{ $val->id }}" class="btn btn-outline btn-default btn-block btn-sm btn-rounded">Track Order</a>
                        </td>
                    </tr>
                @endif
            @endforeach
                
            </tbody>
        </table>

        <a href="{{ url('/') }}" class="btn btn-dark btn-rounded btn-icon-right">Go Shop<i class="w-icon-long-arrow-right"></i></a>
    </div>
</div>






@endsection