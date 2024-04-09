@extends('admin.vendor.include.include')
@section('content')

   
<div class="container-xxl flex-grow-1 container-p-y">
                     <div class="row">
                     <div class="col-md-12 mb-4">
                           <div class="">
                              <div class="card-header d-flex justify-content-between pb-0">
                                 <div class="card-title mb-0">
                                    <h4 class="mb-0">Orders List </h4>
                                    <small class="text-muted">Orders List</small>
                                 </div>
                              </div>
                              
                           </div>
                        </div>

                        
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex  justify-content-between">
                                <h5>Order List</h5>
                            </div>
                        </div>
                        <div class="card-body">
                        <div class="card-datatable table-responsive pt-0">
                            <table class="data-table datatableexport table  mdl-data-table dataTable  table" >
                              <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Order No.</th>
                                            <th>User Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Pin Code</th>
                                            <th>City</th>
                                            <th>Address</th>
                                            <th>Payment Mode</th>
                                            <th>Price</th>
                                            <th>Shipment ID</th>
                                            <th>Date</th>
                                            <th>View</th>
                                            <th>Order Label</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $a= 1; ?>
                                        @foreach ($order as $key => $val)
                                            <tr>
                                                <td>{{ $a }}</td>
                                                <td>{{ $val->id }}</td>
                                                <td>{{ $val->username }}</td>
                                                <td>{{ $val->email }}</td>
                                                <td>{{ $val->mobile }}</td>
                                                <td>{{ $val->pin_code }}</td>
                                                <td>{{ $val->city }}</td>
                                                <td>{{ $val->address }}</td>
                                                <td>{{ $val->payment_mode }}</td>
                                                <td>{{ $val->grand_total }}</td>
                                                <td>{{ !empty($val->shipment_id) ? $val->shipment_id : 0 }}</td>
                                                <td>{{ $val->created_at }}</td>
                                                <td>
                                                    <a class="btn btn-primary" href="{{route('view_order_vendor',$val->id)}}">View Order</a>
                                                </td>
                                                @foreach($label_data as $labelkey => $labelvalue)
                                                    @if($val->id == $labelkey)
                                                        @if($labelvalue)
                                                            <td>
                                                                <a class="btn btn-primary" href="{{$labelvalue}}">Download Order Label</a>
                                                            </td>
                                                        @else
                                                            <td>
                                                                Label not created
                                                            </td>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </tr>
                                            <?php $a++; ?>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
