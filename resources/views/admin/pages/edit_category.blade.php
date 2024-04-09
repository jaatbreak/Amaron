@extends('admin.include.include')
@section('content')

<style>
    .image_upload img {
    width: 200px;
    height: 200px;
    object-fit: contain;
    border: 1px solid #dfdfdf;
    border-radius: 12px;
    overflow: hidden;
}
    </style>

<div class="container-xxl flex-grow-1 container-p-y">
                     <div class="row">
                     <div class="col-md-12 mb-4">
                           <div class="">
                              <div class="card-header d-flex justify-content-between pb-0">
                                 <div class="card-title mb-0">
                                    <h4 class="mb-0">Edit Category</h4>
                                    <small class="text-muted">Edit Category</small>
                                 </div>
                              </div>
                              
                           </div>
                        </div>
                        <div class="col-12 col-xl-12 col-sm-12 order-1 order-lg-2 mb-4 mb-lg-0">
                        <div class="card">
                            <div class="card-body">

                            <form method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $edit_category->title }}"?>
                                    <div class="mb-3">
                                        <label class="form-label">Title</label>
                                        <input class="" type="text" hidden value="$edit_category->id">
                                        <input name="title" class="form-control" type="text" placeholder="Title"
                                            value="{{ old('title') ?? $edit_category->title }}">
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
                                                    @if (old('parent')) {{ old('parent', $val->id) == $val->id ? 'selected' : '' }} @endif
                                                    @if ($edit_category->parent) {{ old('parent', $edit_category->parent) == $val->id ? 'selected' : '' }} @endif >
                                                    {{ $val->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('parent')
                                            <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <div class="image_upload">
                                            <img src="{{ asset('uploads') }}/{{ $edit_category->thumbnail }}" alt="">
                                        </div>
                                        <label class="form-label">Thumbnail Image</label>
                                        <input hidden name="old_thumbnail" value="{{ $edit_category->thumbnail }}">
                                        <input name="thumbnail" class="form-control" type="file" placeholder="Thumbnail Image">
                                        @error('thumbnail')
                                            <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <div class="image_upload">
                                            <img src="{{ asset('uploads') }}/{{ $edit_category->banner_image }}" alt="">
                                        </div>
                                        <label class="form-label">Banner Image</label>
                                        <input hidden name="old_banner_image" value="{{ $edit_category->banner_image }}">
                                        <input name="banner_image" class="form-control" type="file" placeholder="Banner Image">
                                        @error('banner_image')
                                            <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea name="desc" class="form-control" placeholder="Description" rows="5">{{ old('desc') ?? $edit_category->desc }}</textarea>
                                        @error('desc')
                                            <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="card-header p-0">
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
                                            placeholder="Meta Title"
                                            value="{{ old('meta_title') ?? $edit_category->meta_title }}">
                                        @error('meta_title')
                                            <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Meta Content</label>
                                        <input name="meta_content" class="form-control" type="text"
                                            placeholder="Meta Content"
                                            value="{{ old('meta_content') ?? $edit_category->meta_content }}">
                                        @error('meta_content')
                                            <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Meta Keyword</label>
                                        <textarea name="meta_keyword" class="form-control" placeholder="Meta Keyword" rows="4">{{ old('meta_keyword') ?? $edit_category->meta_keyword }}</textarea>
                                        @error('meta_keyword')
                                            <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                        @enderror
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


@endsection
