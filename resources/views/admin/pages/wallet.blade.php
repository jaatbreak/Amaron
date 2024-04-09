@extends('admin.include.include')
@section('content')




<div class="container-xxl flex-grow-1 container-p-y">
                     <div class="row">
                     <div class="col-md-12 mb-4">
                           <div class="">
                              <div class="card-header d-flex justify-content-between pb-0">
                                 <div class="card-title mb-0">
                                    <h4 class="mb-0">Wallet List</h4>
                                    <small class="text-muted">See All Wallet</small>
                                 </div>
                              </div>
                              
                           </div>
                        </div>
                        
                        
                        
                       
                        
                        <div class="col-12 col-xl-12 col-sm-12 order-1 order-lg-2 mb-4 mb-lg-0">
                        <div class="d-flex p-3 justify-content-between align-items-center">
                                <h5 class="m-0">Add New</h5>
                                <a class="btn btn-primary" href="{{ route('admin/wallet/add') }}">Add Into Wallet</a>      
                            </div>
                        <div class="card">
                        <div class="card-datatable table-responsive pt-0">
                            <table class="data-table table  mdl-data-table dataTable  table" >
                            <thead>
                                <tr>
                                <th>S.N.</th>
                                            <th>User</th>
                                            <th>Reference</th>
                                            <th>Debit</th>
                                            <th>Credit</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                            
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
                ajax: "{{ url('admin/wallet') }}",
                responsive: true,
                ordering: false,
                columns: [
                  
                    { "data": "id" },
                    { "data": "user_id" },
                    { "data": "reference" },
                    { "data": "debit" },
                    { "data": "credit" },
                    
                    
                    
                    // {data: 'thumbnail', name: 'thumbnail',
                    //         render:function (data, type, full, meta) {
                    //           if(type){
                    //             return '<img class="avtr" src="{{ url("/") }}/'+data+'">';
                    //             }
                    //         }
                    // },
                    
                    // {data: 'banner_image', name: 'banner_image',
                    //         render:function (data, type, full, meta) {
                    //           if(type){
                    //             return '<img class="avtr" src="{{ url("/") }}/'+data+'">';
                    //             }
                    //         }
                    // },
                    
                    
                    
                    { "data": "created_at" },
                    
                    {data: 'id', name: 'id',
                            render:function (data, type, full, meta) {
                              var html = '<a href="{{ url("admin/wallet/edit")}}/'+full.id+'" class="badge  bg-label-success" >Edit</a>';
                              html += '<form method="POST" class="d-inline-block" action="{{ route("admin/wallet/delete") }} " ><input type="hidden" name="_token" value="{{ csrf_token() }}" /><input type="text" hidden name="id" value="'+full.id+'"><button type="submit" class="btn badge  bg-label-danger">Delete</button></form>';
                                return  html;
                            }
                    },
                    
                    
                    

                ],
            });
        });
    </script>

<script>
        @if (Session::has('edit_wallet'))
            iziToast.success({
                message: '{{ Session::get('edit_wallet') }}',
                position: 'topRight',
            });
        @endif
    </script>
    <script>
        @if (Session::has('delete_wallet'))
            iziToast.success({
                message: '{{ Session::get('delete_wallet') }}',
                position: 'topRight',
            });
        @endif
    </script>
    <script>
        @if (Session::has('add_wallet'))
            iziToast.success({
                message: '{{ Session::get('add_wallet') }}',
                position: 'topRight',
            });
        @endif
    </script>
@endsection