@extends('admin.vendor.include.include')
@section('content')
    

<div class="container-xxl flex-grow-1 container-p-y">
                     <div class="row">
                     <div class="col-md-12 mb-4">
                           <div class="">
                              <div class="card-header d-flex justify-content-between pb-0">
                                 <div class="card-title mb-0">
                                    <h4 class="mb-0">Product List</h4>
                                    <small class="text-muted">See All Products</small>
                                 </div>
                              </div>
                              
                           </div>
                        </div>

                        
                        
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        @if (auth()->user()->verified == 'Y')
                            <div class="card-header">
                                <div class="d-flex  justify-content-between">
                                    <h5>Product List</h5>
                                    <a class="btn btn-primary" href="{{ route('vendor/add_product') }}">Add Product</a>
                                </div>
                            </div>
                            <div class="card-body border-top">
                            <div class="card-datatable table-responsive pt-0">
                            <table class="data-table table  mdl-data-table dataTable  table" >
                            <thead>
                                <tr>
                                
                                <tr>
                                                <th>S.N.</th>
                                                <th>Title</th>
                                                <th>Qty</th>
                                                <th>Image</th>
                                                <th>Price</th>
                                                <th>Verification</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                         
                          
                        </div>
                            </div>
                        @else 
                            
                        <div class="card-body">
                            <h5 style="color:rgb(255, 1, 1)">Please Update Your Profile</h5>
                        </div>

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
        <script>
        @if (Session::has('delete_product'))
            iziToast.success({
                message: '{{ Session::get('delete_product') }}',
                position: 'topRight',
            });
        @endif
    </script>
    
    <script>
        @if (Session::has('add_product'))
            iziToast.success({
                message: '{{ Session::get('add_product') }}',
                position: 'topRight',
            });
        @endif
    </script>
    <script>
        @if (Session::has('not_product_dalete'))
            iziToast.error({
                message: '{{ Session::get('not_product_dalete') }}',
                position: 'topRight',
            });
        @endif
    </script>
@endsection



@section('datatablejs')
 <script type="text/javascript">
       $(document).ready(function() {
            $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                bLengthChange: false,
                ajax: "{{ url('vendor/product') }}",
                responsive: true,
                ordering: false,
                columns: [
                  
                    { "data": "id" },
                    { "data": "product_name" },
                    { "data": "stock_quantity" },
                    
                    
                    {data: 'product_image', name: 'product_image',
                            render:function (data, type, full, meta) {
                              if(type){
                                return '<img class="avtr" src="{{ url("/") }}/'+data+'">';
                                }
                            }
                    },
                    { "data": "product_sale_price" },
                    {data: 'verified', name: 'verified',
                            render:function (data, type, full, meta) {
                                if(full.verified=='Y'){
                                    return '<span class="badge  bg-label-success" >Verify</span>';
                                }else{
                                    return '<span class="badge  bg-label-danger" >Pending</span>';
                                }
                            }
                    },
                    {data: 'status', name: 'status',
                            render:function (data, type, full, meta) {
                                if(full.status=='Y'){
                                    return '<a href="{{ url("vendor/product/status")}}/N/'+full.id+'" class="badge  bg-label-success" >Y</a>';
                                }else{
                                    return '<a href="{{ url("vendor/product/status")}}/Y/'+full.id+'" class="badge  bg-label-danger" >N</a>';
                                }
                            }
                    },
                    

                    {data: 'status', name: 'status',
                            render:function (data, type, full, meta) {
                                var html = '<a href="{{ url("vendor/product-edit")}}/'+full.id+'" class="badge  bg-label-success" >Edit</a>';
                              html += '<form method="POST" class="d-inline-block" action="{{ route("vendor/product/delete_product") }} " ><input type="hidden" name="_token" value="{{ csrf_token() }}" /><input type="text" hidden name="id" value="'+full.id+'"><button type="submit" class="btn badge  bg-label-danger">Delete</button></form>';
                                return  html;
                            }
                    }
                    
                ],
            });
        });
    </script>
@endsection