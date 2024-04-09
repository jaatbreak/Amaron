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
                    <h4 class="card-title mb-0">Edit Attributes Values</h4>
                </div>
                <div class="card-body">
                    <div class="row align-items-end">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input class="form-control" type="text" value="{{ $attributes_value->id }}"
                                    name="attributes_id" hidden>
                                <input class="form-control" type="text" name="name" value="<?php if($attributes_value->name){echo $attributes_value->name;} ?>" placeholder="Name">
                                @error('name')
                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Icon</label>
                                <input class="form-control" type="file" name="icon" value="<?php if($attributes_value->icon){echo $attributes_value->icon;} ?>">
                                @error('icon')
                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Icon</label>
                                <input class="form-control" type="color" name="color_code" value="<?php if($attributes_value->color_code){echo $attributes_value->color_code;} ?>">
                                @error('color_code')
                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" placeholder="Description" name="desc" rows="5"><?php if($attributes_value->desc){echo $attributes_value->desc;} ?></textarea>
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
