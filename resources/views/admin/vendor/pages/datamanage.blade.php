@extends('admin.vendor.include.include')
@section('content')
    
<div class="container-xxl flex-grow-1 container-p-y">
                     <div class="row">
                     <div class="col-md-12 mb-4">
                           <div class="">
                              <div class="card-header d-flex justify-content-between pb-0">
                                 <div class="card-title mb-0">
                                    <h4 class="mb-0">Import & Export </h4>
                                    <small class="text-muted">Import & Export </small>
                                 </div>
                              </div>
                              
                           </div>
                        </div>
                        
                        
                        
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex  justify-content-between">
                                <h5>Data Management</h5>
                                <div class="button_d_i">
                                    <a href="<?= asset('assets/images/upload_product.csv') ?>" class="button-export btn btn-primary " Download 
                                        >Export Sample</a>
                                </div>
                            </div>
                        </div>



                        <div class="card-body">
                            <form action="{{ route('upload-excel') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="upload-csv-file">
                                    <div class="form">
                                        <label for="csv">Import File</label>
                                        <input type="file" name="csv_file" id="csv" class="form-control">
                                    </div>
                                    <button type="submit" class="button-export btn btn-primary mt-3">Import</button>

                                </div>
                            </form>
                            <hr>
                            <div class="mt-3 card-datatable table-responsive pt-0">
                                    <table class="data-table table  datatableexport mdl-data-table dataTable  table" >
                                   <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Title</th>
                                            <th>Qty</th>
                                            <th>Image</th>
                                            <th>Sale Price</th>
                                            <th>Gallery</th>
                                            <th>Verification</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($product as $key => $val)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ Str::limit($val->product_name), 10 }}</td>
                                                <td>{{ $val->stock_quantity }}</td>
                                                <td>
                                                    <?php if($val->product_image){?>
                                                    <a href="{{ asset('uploads') }}/{{ $val->product_image }}"
                                                        target="_blank">
                                                        <img width="30px" height="30px"
                                                            src="{{ asset('uploads') }}/{{ $val->product_image }}"
                                                            alt="">
                                                    </a>
                                                    <?php } ?>
                                                </td>
                                                <td>{{ $val->product_sale_price }}</td>
                                                <td>

                                                </td>
                                                <td style="text-align: center;">

                                                    @if ($val->verified == 'Y')
                                                        <a class="badge  bg-label-success"
                                                            style="color: #fff;"
                                                            href="#">Verify</a>
                                                    @elseif($val->verified == 'N')
                                                        <a class="badge  bg-label-danger"
                                                            style="color: #fff;"
                                                            href="#">Pending</a>
                                                    @endif


                                                </td>
                                                <td>
                                                    
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
    </div>
@endsection
