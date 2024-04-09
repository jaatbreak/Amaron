@extends('admin.include.include')
@section('content')


<div class="container-xxl flex-grow-1 container-p-y">
                     <div class="row">
                     <div class="col-md-12 mb-4">
                           <div class="">
                              <div class="card-header d-flex justify-content-between pb-0">
                                 <div class="card-title mb-0">
                                    <h4 class="mb-0">Attributes List</h4>
                                    <small class="text-muted">Attributes List</small>
                                 </div>
                              </div>
                              
                           </div>
                        </div>
                        
                        <div class="col-xl-12">
                    <form class="card" method="POST">
                        @csrf
                        <div class="card-header pb-0">
                            <h4 class="card-title mb-0">Add Attributes</h4>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-end">
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input class="form-control" type="text" name="name"
                                            placeholder="Add Attributes">
                                        @error('name')
                                            <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <button class="btn btn-primary w-100" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                        <div class="mt-4 col-12 col-xl-12 col-sm-12 order-1 order-lg-2 mb-4 mb-lg-0">
                        <div class="card">

                                <div class="card-body">
                                <div class="card-datatable table-responsive pt-0">
                            <table class="data-table table  datatableexport mdl-data-table dataTable  table" >
                            <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Configure Terms</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($attributes as $key => $value)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->slug }}</td>
                                                <td>
                                                    <a href="{{ route('product/attributes_value', $value->id) }}">
                                                        <i class="icofont icofont-edit"></i>
                                                    </a>
                                                    @foreach (App\Models\AttributesValue::get_attr($value->id) as $val)
                                                        <span>{{ $val['name'] }}</span>,
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <a href="{{ route('product/attributes_value', $value->id) }}" class="btn btn-primary">Edit</a>
                                                    <a href="{{ route('product/deleteattr', $value->id) }}" class="btn btn-danger">Delete</a>
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
        @if (Session::has('add_attributes'))
            iziToast.success({
                message: '{{ Session::get('add_attributes') }}',
                position: 'topRight',
            });
        @endif
    </script>
@endsection
