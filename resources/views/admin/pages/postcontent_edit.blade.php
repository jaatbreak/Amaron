@extends('admin.include.include')
@section('content')
   
<div class="container-xxl flex-grow-1 container-p-y">
                     <div class="row">
                     <div class="col-md-12 mb-4">
                           <div class="">
                              <div class="card-header d-flex justify-content-between pb-0">
                                 <div class="card-title mb-0">
                                    <h4 class="mb-0">Edit Post {{ ucfirst($data->title) }}</h4>
                                    <small class="text-muted">Edit Post</small>
                                 </div>
                              </div>
                               </div>
                        </div>

                        @php

$post = json_decode($postcontent['field']); 

@endphp
                        <div class="col-12 col-xl-12 col-sm-12 order-1 order-lg-2 mb-4 mb-lg-0">
                        <div class="card">
                            <div class="card-body">
                            <form method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <?php
                                            $daa = $data->fields;   
                                            $daaaa = json_decode($daa, true);
                                            $k=0;
                                    //        print_r($daaaa);
                                    if($daaaa){
                                    ?>
                                    
                                @foreach ($daaaa as $val)
                                    <?php if($val['label_type'] =='textarea'){ ?>
                                        <div class="mb-3">
                                            <label class="form-label text-capitalize"><?= $val['label_name'] ?></label>
                                            <textarea rows="5" name="<?= $val['label_name'] ?>" class="form-control text-capitalize"  <?php if($val['required'] == 'on'){ echo 'required';} ?> type="<?= $val['label_type'] ?>" placeholder="<?= $val['label_name'] ?>"><?php $k = $val['label_name']; echo $post->$k; ?></textarea>
                                        </div>
                                        <?php }elseif($val['label_type'] =='editor'){ ?>
                                            <div class="mb-3">
                                                <label class="form-label text-capitalize"><?= $val['label_name'] ?></label>
                                                <textarea id="editor1" name="<?= $val['label_name'] ?>" class="form-control text-capitalize"  <?php if($val['required'] == 'on'){ echo 'required';} ?> type="<?= $val['label_type'] ?>" placeholder="<?= $val['label_name'] ?>"><?php $k = $val['label_name']; echo $post->$k; ?></textarea>
                                            </div>                                 
                                        <?php }elseif($val['label_type'] =='file'){ ?>
                                           
                                           
                                            <div class="mb-3">
                                                <label class="form-label text-capitalize"><?= $val['label_name'] ?></label>
                                                <input type="text" hidden name="<?= $val['label_name'] ?>" value="<?php $k = $val['label_name'];  if(isset($post->$k)){ echo $post->$k; }else{ echo $k; }  ?>">
                                                <input name="<?= $val['label_name'] ?>" value="<?php if(isset($post->$k)){ echo $post->$k; }else{ echo $k; } ?> " class="form-control text-capitalize"  <?php if($val['required'] == 'on'){ echo 'required';} ?> type="<?= $val['label_type'] ?>" placeholder="<?= $val['label_name'] ?>">
                                                <img src="{{ asset('uploads') }}/<?php if(isset($post->$k)){ echo $post->$k; }else{ echo $k; } ?>" style="width: 300px; margin-top: 10px;" alt="">
                                            </div>    
                                            
                                        <?php }else{ ?>
                                    <div class="mb-3">
                                        <label class="form-label text-capitalize"><?= $val['label_name'] ?></label>
                                        <input name="<?= $val['label_name'] ?>" value="<?php $k = $val['label_name']; echo $post->$k; ?> " class="form-control text-capitalize"  <?php if($val['required'] == 'on'){ echo 'required';} ?> type="<?= $val['label_type'] ?>" placeholder="<?= $val['label_name'] ?>">
                                    </div>
                                    <?php } ?>
                                @endforeach
                                <?php } ?>
                                <button type="submit" class="btn btn-primary d-block w-100">Save</button>
                        </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
       

                    @endsection
