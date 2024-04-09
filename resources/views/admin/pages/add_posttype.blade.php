@extends('admin.include.include')
@section('content')
<style>
    .remove {
    background: red;
    width: 20px;
    height: 20px;
    border-radius: 100%;
    text-align: center;
    font-size: 40px;
    line-height: 13px;
    color: #fff;
    margin: 7px auto;
}

.add_to_do_list {
    margin: auto;
    width: fit-content;
    background: #4bbf4b;
    fill: #fff;
    border-radius: 100%;
}

.form_rerpeater {
    padding: 10px 0;
    background: #f3f3f3;
    margin-bottom: 9px;
    border-radius: 14px;
}
    </style>
<div class="container-xxl flex-grow-1 container-p-y">
                     <div class="row">
                     <div class="col-md-12 mb-4">
                           <div class="">
                              <div class="card-header d-flex justify-content-between pb-0">
                                 <div class="card-title mb-0">
                                    <h4 class="mb-0">Add New Post Type</h4>
                                    <small class="text-muted">Add Posttype</small>
                                 </div>
                              </div>
                              
                           </div>
                        </div>


                            
                        <div class="col-12 col-xl-12 col-sm-12 order-1 order-lg-2 mb-4 mb-lg-0">
                        
                       
                        <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" class="row" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-sm-12 col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Title*</label>
                                            <input name="title" class="form-control" type="text" placeholder="Title"
                                                value="{{ old('title') }}">
                                            @error('title')
                                                <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Page Name*</label>
                                            <input name="page" class="form-control" type="text" placeholder="Page Name"
                                                value="{{ old('page') }}">
                                            @error('page')
                                                <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">URL</label>
                                            <input name="url" class="form-control" type="text" placeholder="URL"
                                                value="{{ old('url') }}">
                                            @error('url')
                                                <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Background Color</label>
                                            <input name="bg_color" class="form-control" type="color" placeholder="Background Color"
                                                value="{{ old('bg_color') }}">
                                            @error('bg_color')
                                                <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Background Image</label>
                                            <input name="image" class="form-control" type="file" placeholder="Background Image">
                                            @error('image')
                                                <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label d-block">Use Reperter</label>
                                            <div class="bg-light py-3 px-3 mt-2">
                                                <label class="mt-0 me-2 text-dark labelk_full_view_ode" for="is_repeat_chck">Use Reperter</label>
                                                <input class="form-check-input" value="1" name="is_repeat" id="is_repeat_chck" type="checkbox"  style=" width: 20px; height: 17px; border: 1px solid #000; border-radius: 0px; ">
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="" id="show_hide_tabs" style="display: none;">
                                            <div class="col-md-12">
                                                <div class="form_outrer">
                                                    <div class="form_rerpeater row">
                                                        <div class="col-sm-6 col-md-6">
                                                            <div class="mb-0">
                                                                <label class="form-label">Input Label Name</label>
                                                                <input name="fields[0][label_name]" class="form-control" type="text" placeholder="Input Label Name" >
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 col-md-4">
                                                            <div class="mb-0">
                                                                <label class="form-label">Input Label Type</label>
                                                                <select name="fields[0][label_type]" class="form-control">
                                                                    <option value="text">Text</option>
                                                                    <option value="number">Number</option>
                                                                    <option value="textarea">Textarea</option>
                                                                    <option value="file">Media</option>
                                                                    <option value="date">Date</option>
                                                                    <option value="color">Color</option>
                                                                    <option value="editor">Editor</option>
                                                                </select>
                                                            </div>
                                                        </div> 
                                                        <div class="col-sm-2 col-md-2">
                                                            <div class="mb-0">
                                                                <label class="form-label">Required</label>
                                                                <select name="fields[0][required]" class="form-control">
                                                                    <option value="off">NO</option>
                                    	                            <option value="on">Yes</option>>
                                                                </select>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div class="add_to_do_list">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path></svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 mt-3">
                                        <div class="mb-3">
                                            <label class="form-label">Description</label>
                                            <textarea name="desc" id="editor1" class="form-control" placeholder="Description" rows="5">{{ old('desc') }}</textarea>
                                            @error('desc')
                                                <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 mt-3">
                                        <button class="btn btn-primary">Add New Post Type </button>
                                    </div>
                            </div>
                        </div>
                    </div>
</div>
</div>
</div>
</div>



              

@endsection
