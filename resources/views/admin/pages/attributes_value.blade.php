@extends('admin.include.include')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Attributes List</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item">Attributes Values List</li>
                        </ol>
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <form class="card" method="POST">
                @csrf
                <div class="card-header pb-0">
                    <h4 class="card-title mb-0">Add Attributes Values</h4>
                </div>
                <div class="card-body">
                    <div class="row align-items-end">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input class="form-control" type="text" value="{{ $attributes_value->id }}"
                                    name="attributes_id" hidden>
                                <input class="form-control" type="text" name="name" placeholder="Name">
                                @error('name')
                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Icon</label>
                                <input class="form-control" type="file" name="icon">
                                @error('icon')
                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Icon</label>
                                <input class="form-control" type="color" name="color_code">
                                @error('color_code')
                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" placeholder="Description" rows="5"></textarea>
                                @error('desc')
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex  justify-content-between">
                                <h5>Attributes List</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="dt-ext table-responsive">
                                <table id="data_table_user" class="display nowrap data_table_user_page" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Configure Terms</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($value as $key => $val)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $val->name }}</td>
                                                <td>{{ $val->slug }}</td>
                                                <td>
                                                    <a href="{{route('edit.attributevalue', $val->id)}}" class="btn btn-primary">Edit</a>
                                                    <a href="{{route('delete.attributevalue', $val->id)}}" class="btn btn-danger">Delete</a>
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
    <script>
        @if (Session::has('add_attributes_value'))
            iziToast.success({
                message: '{{ Session::get('add_attributes_value') }}',
                position: 'topRight',
            });
        @endif
    </script>
@endsection
