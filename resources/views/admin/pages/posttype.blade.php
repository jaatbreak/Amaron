@extends('admin.include.include')
@section('content')
 
<div class="container-xxl flex-grow-1 container-p-y">
                     <div class="row">
                     <div class="col-md-12 mb-4">
                           <div class="">
                              <div class="card-header d-flex justify-content-between pb-0">
                                 <div class="card-title mb-0">
                                    <h4 class="mb-0">Posttype List</h4>
                                    <small class="text-muted">See All Posttype</small>
                                 </div>
                              </div>
                              
                           </div>
                        </div>
                       
                        
                        <div class="col-12 col-xl-12 col-sm-12 order-1 order-lg-2 mb-4 mb-lg-0">
                        
                        <div class="card">
                        <div class="d-flex  justify-content-between p-3">
                                <h5>Post Type List</h5>
                                <a class="btn btn-primary" href="{{ route('admin/addposttype')}}">Add Posttype</a>
                            </div>

                        <div class="card-datatable table-responsive pt-0">
                            <table class="data-table table datatableexport  mdl-data-table dataTable  table" >
                            <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Title</th>
                                            <th>Page</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($data as $key => $val)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $val->title }}</td>
                                            <td>{{ $val->page }}</td>
                                            <td>
                                                <?php if($val->image){ ?>
                                                <img width="30px" height="30px" src="{{ asset('uploads') }}/{{ $val->image }}" alt=""></td>
                                                    <?php } ?>
                                                <td>
                                                @if($val->status == 'Y' )         
                                                    <a class="badge  bg-label-success" href="{{ url('admin/posttype/status')}}/N/{{ $val->id}}"> Y </a>    
                                                    @elseif($val->status == 'N')
                                                    <a class="badge  bg-label-danger" href="{{ url('admin/posttype/status')}}/Y/{{ $val->id}}"> N </a>        
                                                @endif
                                            </td>
                                            <td>
                                                @if ($val->is_repeat == 1)
                                                <a href="{{ route('admin/addposttype/view', $val->id) }}" class="btn btn-dark">View</a>
                                                @endif
                                                <a href="#" class="btn btn-primary">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach    
                                    </tbody>
</table>
</div>
</div>
</div>
</div>
</div>



    <script>
        @if (Session::has('add_posttype'))
            iziToast.success({
                message: '{{ Session::get('add_posttype') }}',
                position: 'topRight',
            });
        @endif
    </script>
@endsection


