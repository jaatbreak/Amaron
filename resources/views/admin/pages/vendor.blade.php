@extends('admin.include.include')
@section('content')




<div class="container-xxl flex-grow-1 container-p-y">
                     <div class="row">
                     <div class="col-md-12 mb-4">
                           <div class="">
                              <div class="card-header d-flex justify-content-between pb-0">
                                 <div class="card-title mb-0">
                                    <h4 class="mb-0">Vendor List</h4>
                                    <small class="text-muted">See All Vendor</small>
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
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Avtar Image</th>
                                    <th>Aadhaar Front</th>
                                    <th>Aadhaar Back</th>
                                    <th>Verification</th>
                                    <th>GST No.</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>State</th> 
                                    <th>Pin Code</th>
                                    <th>Status</th>
                                    <th>View</th>
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
                ajax: "{{ url('admin/vendor') }}",
                responsive: true,
                ordering: false,
                columns: [
                  
                    { "data": "id" },
                    { "data": "name" },
                    { "data": "phone" },
                    { "data": "email" },
                    
                    {data: 'avatar_image', name: 'avatar_image',
                            render:function (data, type, full, meta) {
                              if(type){
                                return '<img class="avtr" src="{{ url("/") }}/'+data+'">';
                                }
                            }
                    },
                    {data: 'aadhaar_front', name: 'aadhaar_front',
                            render:function (data, type, full, meta) {
                              if(type){
                                return '<img class="avtr" src="{{ url("/") }}/'+data+'">';
                                }
                            }
                    },
                    {data: 'aadhaar_back_side', name: 'aadhaar_back_side',
                            render:function (data, type, full, meta) {
                              if(type){
                                return '<img class="avtr" src="{{ url("/") }}/'+data+'">';
                                }
                            }
                    },
                    {data: 'verified', name: 'verified',
                            render:function (data, type, full, meta) {
                                if(full.verified=='Y'){
                                    return '<a href="{{ url("admin/vendor_verify")}}/N/'+full.id+'" class="badge  bg-label-success" >Verify</a>';
                                }else{
                                    return '<a href="{{ url("admin/vendor_verify")}}/Y/'+full.id+'" class="badge  bg-label-danger" >Pending</a>';
                                }
                            }
                    },
                    {data: 'gst', name: 'gst',
                            render:function (data, type, full, meta) {
                                var html = full.gst+' ';  
                              if(full.gst){
                                    html += '<a href="{{ url("admin/gst-check")}}/'+full.gst+'" class="badge  bg-label-success" >Check</a>';
                                }
                                return html;
                            }
                    },
                    { "data": "address" },
                    { "data": "city" },
                    { "data": "state" },
                    { "data": "pin_code" },
                    {data: 'status', name: 'status',
                            render:function (data, type, full, meta) {
                                if(full.status=='Y'){
                                    return '<a href="{{ url("admin/user_status")}}/N/'+full.id+'" class="badge  bg-label-success" >Y</a>';
                                }else{
                                    return '<a href="{{ url("admin/user_status")}}/Y/'+full.id+'" class="badge  bg-label-danger" >N</a>';
                                }
                            }
                    },
                     {data: 'status', name: 'status',
                            render:function (data, type, full, meta) {
                                    return '<a href="{{ url("admin/user/viewuser")}}/'+full.id+'" class="btn btn-primary" >View</a>';

                            }
                    },

                ],
            });
        });
    </script>
@endsection