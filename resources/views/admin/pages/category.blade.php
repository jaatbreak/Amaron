@extends('admin.include.include')
@section('content')




<div class="container-xxl flex-grow-1 container-p-y">
                     <div class="row">
                     <div class="col-md-12 mb-4">
                           <div class="">
                              <div class="card-header d-flex justify-content-between pb-0">
                                 <div class="card-title mb-0">
                                    <h4 class="mb-0">Category List</h4>
                                    <small class="text-muted">See All Category</small>
                                 </div>
                              </div>
                              
                           </div>
                        </div>
                        
                        
                        
                       
                        
                        <div class="col-12 col-xl-12 col-sm-12 order-1 order-lg-2 mb-4 mb-lg-0">
                        <div class="d-flex p-3 justify-content-between align-items-center">
                                <h5 class="m-0">Add New</h5>
                                <a class="btn btn-primary" href="{{ route('admin/product/add_category') }}">Add New Category</a>      
                            </div>
                        <div class="card">
                        <div class="card-datatable table-responsive pt-0">
                            <table class="data-table table  mdl-data-table dataTable  table" >
                            <thead>
                                <tr>
                                <th>S.N.</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Thumbnail</th>
                                            <th>Banner Image</th>
                                            <th>Status</th>
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
                ajax: "{{ url('admin/product/category') }}",
                responsive: true,
                ordering: false,
                columns: [
                  
                    { "data": "id" },
                    { "data": "title" },
                    { "data": "desc" },
                    
                    
                    {data: 'thumbnail', name: 'thumbnail',
                            render:function (data, type, full, meta) {
                              if(type){
                                return '<img class="avtr" src="{{ url("/") }}/'+data+'">';
                                }
                            }
                    },
                    
                    {data: 'banner_image', name: 'banner_image',
                            render:function (data, type, full, meta) {
                              if(type){
                                return '<img class="avtr" src="{{ url("/") }}/'+data+'">';
                                }
                            }
                    },
                    
                    {data: 'status', name: 'status',
                            render:function (data, type, full, meta) {
                              if(type){
                                var print = '';
                                if(full.status=='Y'){
                                     var print='checked';
                                } 
                                return '<div class="form-check form-switch p-0"><input class="form-check-input switch_width js-switch" data-id="'+full.id+'" '+print+' type="checkbox" role="switch"></div>';
                                }
                            }
                    },
                    {data: 'slug', name: 'slug',
                            render:function (data, type, full, meta) {
                              var html = '<a href="{{ url("admin/product/category/edit")}}/'+full.id+'" class="badge  bg-label-success" >Edit</a>';
                              html += '<form method="POST" class="d-inline-block" action="{{ route("admin/product/delete_category") }} " ><input type="hidden" name="_token" value="{{ csrf_token() }}" /><input type="text" hidden name="id" value="'+full.id+'"><button type="submit" class="btn badge  bg-label-danger">Delete</button></form>';
                                return  html;
                            }
                    },
                    
                    
                    
                    

                ],
            });
        });
    </script>

<script>
        @if (Session::has('add_category'))
            iziToast.success({
                message: '{{ Session::get('add_category') }}',
                position: 'topRight',
            });
        @endif
    </script>
    <script>
        @if (Session::has('delete_category'))
            iziToast.success({
                message: '{{ Session::get('delete_category') }}',
                position: 'topRight',
            });
        @endif
    </script>
    <script>
        @if (Session::has('register_user'))
            iziToast.success({
                message: '{{ Session::get('register_user') }}',
                position: 'topRight',
            });
        @endif
    </script>
@endsection