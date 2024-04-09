@extends('admin.include.include')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
                     <div class="row">
                     <div class="col-md-12 mb-4">
                           <div class="">
                              <div class="card-header d-flex justify-content-between pb-0">
                                 <div class="card-title mb-0">
                                    <h4 class="mb-0">Add Category</h4>
                                    <small class="text-muted">Add Category</small>
                                 </div>
                              </div>
                              
                           </div>
                        </div>

                           
                        <div class="col-12 col-xl-12 col-sm-12 order-1 order-lg-2 mb-4 mb-lg-0">
                        <div class="card">
                            <div class="card-body">
                            <form method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Title</label>
                                        <input name="title" class="form-control" type="text" placeholder="Title"
                                            value="{{ old('title') }}">
                                        @error('title')
                                            <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Parent Category</label>
                                        <select class="form-control" name="parent">
                                            <option value="">Parent Category</option>
                                            @foreach ($category as $val)
                                                <option value="{{ $val->id }}"
                                                    @if (old('parent')) {{ old('parent', $val->id) == $val->id ? 'selected' : '' }} @endif>
                                                    {{ $val->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('parent')
                                            <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Thumbnail Image</label>
                                        <input name="thumbnail" class="form-control" type="file"
                                            placeholder="Thumbnail Image">
                                        @error('thumbnail')
                                            <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Banner Image</label>
                                        <input name="banner_image" class="form-control" type="file"
                                            placeholder="Banner Image">
                                        @error('banner_image')
                                            <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea name="desc" class="form-control" placeholder="Description" rows="5">{{ old('desc') }}</textarea>
                                        @error('desc')
                                            <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="card0">
                            <div class="card-header p-0 mb-2">
                                <h4 class="card-title mb-0">Seo Tool</h4>
                                <div class="card-options"><a class="card-options-collapse" href="#"
                                        data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a
                                        class="card-options-remove" href="#" data-bs-toggle="card-remove"><i
                                            class="fe fe-x"></i></a></div>
                            </div>
                            <div class="card-body p-0">
                                <form method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Meta Title</label>
                                        <input name="meta_title" class="form-control" type="text"
                                            placeholder="Meta Title" value="{{ old('meta_title') }}">
                                        @error('meta_title')
                                            <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Meta Content</label>
                                        <input name="meta_content" class="form-control" type="text"
                                            placeholder="Meta Content" value="{{ old('meta_content') }}">
                                        @error('meta_content')
                                            <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Meta Keyword</label>
                                        <textarea name="meta_keyword" class="form-control" placeholder="Meta Keyword" rows="4"> @if (old('meta_keyword'))
                                        {{ old('meta_keyword') }}
                                        @endif </textarea>
                                        @error('meta_keyword')
                                            <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                <div class="col-sm-3 ">
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary d-block w-100">Save</button>
                    </div>
                    </form>
                </div>
                <div class="col-sm-3 ">
                    <div class="form-footer">
                        <a href="{{ URL::previous() }}" class="btn btn-dark d-block w-100">Cancel</a>
                    </div>
                    </form>
                </div>
            </div>

                                </form>
                            </div>
                        </div>
                        </div>
                        </div>
</div>


    <script>
        @if (Session::has('add_category'))
            iziToast.success({
                message: '{{ Session::get('add_category') }}',
                position: 'topRight',
            });
        @endif
    </script>
@endsection
