@extends('admin.include.include')
@section('content')




<div class="container-xxl flex-grow-1 container-p-y">
                     <div class="row">
                     <div class="col-md-12 mb-4">
                           <div class="">
                              <div class="card-header d-flex justify-content-between pb-0">
                                 <div class="card-title mb-0">
                                    <h4 class="mb-0">Users List</h4>
                                    <small class="text-muted">See All Users</small>
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
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>State</th> 
                                    <th>PinCode</th>
                                    <th>Status</th>
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
                ajax: "{{ url('admin/user') }}",
                responsive: true,
                ordering: false,
                columns: [
                  
                    { "data": "id" },
                    { "data": "name" },
                    { "data": "phone" },
                    { "data": "email" },
                    { "data": "address" },
                    { "data": "city" },
                    { "data": "state" },
                    { "data": "pin_code" },
                    {data: 'status', name: 'status',
                            render:function (data, type, full, meta) {
                                if(full.status=='Y'){
                                    return '<a href="{{ url("admin/user_status")}}/N/'+full.id+'" class="badge  bg-label-success" >Active</a>';
                                }else{
                                    return '<a href="{{ url("admin/user_status")}}/Y/'+full.id+'" class="badge  bg-label-danger" >Deactive</a>';
                                }
                            }
                    }

                ],
            });
        });
    </script>
@endsection