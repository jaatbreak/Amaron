@extends('admin.include.include')
@section('content')


<div class="container-xxl flex-grow-1 container-p-y">
                     <div class="row">
                     <div class="col-md-12 mb-2">
                           <div class="">
                              <div class="card-header d-flex justify-content-between pb-0">
                                 <div class="card-title mb-0">
                                    <h4 class="mb-0">Order Product Info</h4>
                                 </div>
                              </div>
                              
                           </div>
                        </div>
                        
                     
                        <div class="mt-2 col-12 col-xl-12 col-sm-12 order-1 order-lg-2 mb-4 mb-lg-0">
                        <div class="card">


                                <div class="card-body">
                                <div class="card-datatable table-responsive pt-0">
                            <table class="data-table table  datatableexport mdl-data-table dataTable  table" >
                            <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Attributes</th>
                                            <th>Conditions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>{{ $data->name }}</td>
                                                <td>{{ $data->price }}</td>
                                                <td>{{ $data->quantity }}</td>
                                                <td><?php echo(json_encode($data->attributes)); ?></td>
                                                <td><?php echo(json_encode($data->conditions)); ?></td>
                                            </tr>

                                    </tbody>
                        </table>
                        </div>

                                </div>
                            </div>

                        </div>
                        </div>
          
                        
    <script>
        @if (Session::has('add_attributes'))
            iziToast.success({
                message: '{{ Session::get('add_attributes') }}',
                position: 'topRight',
            });
        @endif
    </script>
@endsection
