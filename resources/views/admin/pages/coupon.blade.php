@extends('admin.include.include')
@section('content')



<div class="container-xxl flex-grow-1 container-p-y">
                     <div class="row">
                     <div class="col-md-12 mb-4">
                           <div class="">
                              <div class="card-header d-flex justify-content-between pb-0">
                                 <div class="card-title mb-0">
                                    <h4 class="mb-0">Coupon List</h4>
                                    <small class="text-muted">Coupon List</small>
                                 </div>
                              </div>
                              
                           </div>
                        </div>
                        

                        <div class=" col-12 col-xl-12 col-sm-12 order-1 order-lg-2 mb-4 mb-lg-0">
                        <div class="card">

                                <div class="card-body">
                                <div class="d-flex  justify-content-between">
                                <h5>Coupon List</h5>
                                <a class="btn btn-primary" href="{{ route('admin/add_coupon') }}">Add Coupon</a>
                            </div>
                                <div class="">
                                    <table class="data-table datatableexport table  mdl-data-table dataTable  table" >
                                    <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Coupon Code</th>
                                            <th>Type</th>
                                            <th>Discount</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Min Value</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                               
                                    
                                    <tbody>
                                        @foreach ($coupon as $key => $val)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $val->coupon_code }}</td>
                                                <td>{{ $val->type }}</td>
                                                <td>{{ $val->discount }}</td>
                                                <td>{{ $val->start_date }}</td>
                                                <td>{{ $val->end_date }}</td>
                                                <td>{{ $val->min_value }}</td>
                                                <td>
                                                    <img width="30px" height="30px" src="{{ asset('uploads') }}/{{ $val->image }}" alt="">
                                                </td>
                                                <td>
                                                    @if($val->status == 'Y' )         
                                                        <a class="approve_action_n" href="{{ url('admin/coupon/status')}}/N/{{ $val->id}}"> Y </a>    
                                                    @elseif($val->status == 'N')
                                                        <a class="approve_action" href="{{ url('admin/coupon/status')}}/Y/{{ $val->id}}"> N </a>        
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin/edit_coupon', $val->id) }}" class="btn btn-primary">Edit</a>
                                                    <form method="POST" class="d-inline-block" action="{{ route('admin/delete_coupon') }}">
                                                        @csrf 
                                                        <input type="text" hidden name="id" value="{{ $val->id }}"> 
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
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
                                </div>

                                <script>
        @if (Session::has('add_coupon'))
            iziToast.success({
                message: '{{ Session::get('add_coupon') }}',
                position: 'topRight',
            });
        @endif
    </script>
    <script>
        @if (Session::has('delete_coupon'))
            iziToast.success({
                message: '{{ Session::get('delete_coupon') }}',
                position: 'topRight',
            });
        @endif
    </script>
    <script>
        @if (Session::has('edit_coupon'))
            iziToast.success({
                message: '{{ Session::get('edit_coupon') }}',
                position: 'topRight',
            });
        @endif
    </script>
@endsection
