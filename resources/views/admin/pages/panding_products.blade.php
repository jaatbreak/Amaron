@extends('admin.include.include')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
                     <div class="row">
                     <div class="col-md-12 mb-4">
                           <div class="">
                              <div class="card-header d-flex justify-content-between pb-0">
                                 <div class="card-title mb-0">
                                    <h4 class="mb-0">Pending Products </h4>
                                    <small class="text-muted">Pending Products </small>
                                 </div>
                              </div>
                              
                           </div>
                        </div>
                        
                        

                        
                        <div class="col-12 col-xl-12 col-sm-12 order-1 order-lg-2 mb-4 mb-lg-0">
                        <div class="card">
                        <div class="card-datatable table-responsive pt-0">
                            <table class="data-table table  mdl-data-table dataTable  table" >
                            <thead>
                                <tr>
                                <th>S.N.</th>
                                            <th>Title</th>
                                            <th>Qty</th>
                                            <th>Image</th>
                                            <th>Sale Price</th>
                                            <th>Verification</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                         
                          
                        </div>
                        </div>
                        </div>
                        <!--/ Projects table -->
                     </div>
                  </div>




@endsection


@section('datatablejs')
 <script type="text/javascript">
       $(document).ready(function() {
            $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                bLengthChange: false,
                ajax: "{{ url('admin/panding-products') }}",
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
                                    return '<a href="{{ url("admin/pending_product")}}/N/'+full.id+'" class="badge  bg-label-success" >Verify</a>';
                                }else{
                                    return '<a href="{{ url("admin/pending_product")}}/Y/'+full.id+'" class="badge  bg-label-danger" >Pending</a>';
                                }
                            }
                    },
                    
                    

                ],
            });
        });
    </script>
@endsection