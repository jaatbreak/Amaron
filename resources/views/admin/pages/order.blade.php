@extends('admin.include.include')
@section('content')




<div class="container-xxl flex-grow-1 container-p-y">
                     <div class="row">
                     <div class="col-md-12 mb-4">
                           <div class="">
                              <div class="card-header d-flex justify-content-between pb-0">
                                 <div class="card-title mb-0">
                                    <h4 class="mb-0">Order List</h4>
                                    <small class="text-muted">Order List</small>
                                 </div>
                              </div>
                              
                           </div>
                        </div>
                        
                        
                        
                       
                       <form method="post">
                           @csrf
                            <div class="row mb-4 align-items-end">
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-lg-4 mb-2 mb-lg-0">
                                        <div class="form-group">
                                            <label>By Vendor id</label>
                                            <input type="text" class="form-control" name="vendor_id">
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-4 mb-2 mb-lg-0">
                                        <div class="form-group">
                                            <label>By Date</label>
                                            <input type="date" class="form-control" name="date">
                                        </div>
                                    </div>
                                    
                                    
                                     <div class="col-lg-4 mb-2 mb-lg-0">
                                        <div class="form-group">
                                            <label>By Status</label>
                                            <select name="status" class="form-select">
                                                <option value="Y">Yes</option>
                                                <option value="N">No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="button-submit">
                                    <button class="btn btn-primary d-inline-block">View Data</button>
                                </div>
                            </div>
                        </div>
                       </form>
                        <div class="col-12 col-xl-12 col-sm-12 order-1 order-lg-2 mb-4 mb-lg-0">
                        <div class="card">
                        <div class="card-datatable table-responsive-new-table pt-0">
                            <table class="data-table table  mdl-data-table dataTable  table table-responsive-new-table" >
                            <thead>
                                <tr>
                                            <th style="min-width: 130px !important;">Order No.</th>
                                            <th>User Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th style="min-width: 122px;">Pin Code</th>
                                            <th>City</th>
                                            <th style="min-width: 200px;">Address</th>
                                            <th style="min-width: 165px;">Payment Mode</th>
                                            <th>Price</th>
                                            <th>Shipment ID</th>
                                            <th>Date</th>
                                            <th style="min-width: 170px;">View</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php foreach ($users as $key => $value) {?>
                                <tr>
                                    <td>{{$value->id}}</td>
                                    <td>{{$value->username}}</td>
                                    <td>{{$value->email}}</td>
                                    <td>{{$value->mobile}}</td>
                                    <td>{{$value->pin_code}}</td>
                                    <td>{{$value->city}}</td>
                                    <td>{{$value->address}}</td>
                                    <td>{{$value->payment_mode}}</td>
                                    <td>{{$value->grand_total}}</td>
                                    <td>{{ !empty($value->shipment_id) ? $value->shipment_id : 0 }}</td>
                                    <td>{{$value->created_at}}</td>
                                    <td><a class="btn btn-primary" href="{{route('view_order',$value->id)}}">View Order</a></td>
                                </tr>
                                
                                <?php } ?>
                                
                                
                            </tbody>
                        </table>
                         
                          
                        </div>
                        </div>
                        </div>
                        <!--/ Projects table -->
                     </div>
                  </div>
                  
                  <style>
                      .table-responsive-new-table{
                          overflow-x:auto !important;
                      }
                      

.table-responsive-new-table::-webkit-scrollbar ,.table-responsive-new-table::-webkit-scrollbar-track ,.table-responsive-new-table::-webkit-scrollbar-thumb, .table-responsive-new-table::-webkit-scrollbar-thumb:hover {
  display: none;
}



                  </style>
@endsection

@section('datatablejs')
 <script type="text/javascript">
      /* $(document).ready(function() {
            $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                bLengthChange: false,
                ajax: "{{ url('admin/order') }}",
                responsive: true,
                ordering: false,
                columns: [
                  
                    { "data": "id" },
                    { "data": "username" },
                    { "data": "email" },
                    { "data": "mobile" },
                    { "data": "pin_code" },
                    { "data": "city" },
                    { "data": "address" },
                    { "data": "payment_mode" },
                    { "data": "grand_total" },
                    { "data": "created_at" },
                    
                    
                    
                    
                    {data: 'status', name: 'status',
                            render:function (data, type, full, meta) {
                                    return '<a class="btn btn-primary" href="#">View Order</a>';
                            }
                    },

                ],
            });
        });
    </script>
@endsection