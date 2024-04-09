@extends('admin.include.include')
@section('content')
<style>
    .fiels_sparet {
    display: flex;
    text-transform: capitalize;
}
.list_filed {
    border: 1px solid #d8d8d8;
    margin: 2px 2px;
    padding: 5px 6px;
    text-align: center;
}
img.image_values_short {
    width: 35px;
    display: block;
    height: 35px;
    object-fit: cover;
    border-radius: 100%;
    border: 1px solid #e4e3e3;
    margin: auto;
}
span.key {
    text-transform: capitalize;
    color: #d22d3d;
}
.values_fielsd {
    display: block;
}
</style>

<div class="container-xxl flex-grow-1 container-p-y">
                     <div class="row">
                     <div class="col-md-12 mb-4">
                           <div class="">
                              <div class="card-header d-flex justify-content-between pb-0">
                                 <div class="card-title mb-0">
                                    <h4 class="mb-0">Posttype View List</h4>
                                    <small class="text-muted">View Posttype</small>
                                 </div>
                              </div>
                              <div class="badge mt-2 bg-label-success">getpostcontent(<?= $data->id ?>)</div>
                              <div class="badge mt-2 bg-label-success">getpostcontent_only_field(<?= $data->id ?>)</div>
                           </div>
                        </div>

                        <div class="col-12 col-xl-12 col-sm-12 order-1 order-lg-2 mb-4 mb-lg-0">
                        <div class="card">
                        <div class="d-flex p-3 justify-content-between">
                                <h5>{{ ucfirst($data->title) }} List</h5>
                                <a class="btn btn-primary" href="{{ route('admin/posttype/addpost', $data->id) }}">Add Post</a>      
                            </div>
                        <div class="card-datatable table-responsive pt-0">
                            <table class="data-table table  mdl-data-table dataTable  table" >
                            <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Field</th>
                                            <th>Status</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dataa as $key => $val) 
                                        
                                        <?php $images = []; ?>
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>
                                                    <div style="display: flex; justify-content: center;">
                                                  <?php 
                                                    foreach(json_decode($val['field']) as $key=>$value){
                                                        echo '<div class="list_filed">';
                                                            echo '<span class="key">'.$key.'</span>';
                                                            if($value){
                                                                $is_img = explode('.',$value);
                                                                if(end($is_img)=='png' || end($is_img)=='jpeg' || end($is_img)=='jpg' || end($is_img)=='gif'){
                                                                    $images[] = $value;
                                                                    echo '<img src="'.asset('uploads').'/'.$value.'" class="image_values_short">';
                                                                }else{
                                                                    echo '<span class="values_fielsd">'.$value.'</span>';
                                                                }
                                                            }else{
                                                               echo '<span class="values_fielsd">No value Found</span>'; 
                                                            }
                                                        echo '</div>';
                                                    }
                                                    ?>
                                                    
                                                            <?php
                                                            if(isset($images) && is_array($images) && $images){
                                                                $img= implode('and',$images);
                                                            }else{
                                                                $img  = 'no_image';
                                                            }
                                                        ?>
                                                </td>
                                                <td>
                                                    @if($val->status == 'Y' )         
                                                        <a class="approve_action_n" href="{{ url('admin/posttypeview/status')}}/N/{{ $val->id}}"> Y </a>    
                                                    @elseif($val->status == 'N')
                                                        <a class="approve_action" href="{{ url('admin/posttypeview/status')}}/Y/{{ $val->id}}"> N </a>        
                                                    @endif
                                                </td>
                                                <td>{{ $val->created_at }}</td>
                                                <td>

                                                    <a href="{{ url('admin/postcontent/edit') }}/{{ $data->id }}/{{ $val->id}}" class="btn btn-primary">Edit</a>

                                                    <form method="POST" class="d-inline-block" action="{{ route('admin/posttype/delete') }} " >
                                                        @csrf
                                                        <input type="text" hidden name="id" value=" {{ $val->id }} ">
                                                        <input type="text" hidden name="image" value=" {{  $img  }} ">
                                                        <button type="submit" onclick="return confirm('Are you sure?');"  class="btn btn-danger">Delete</button>
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
        @if (Session::has(''))
            iziToast.success({
                message: '{{ Session::get('') }}',
                position: 'topRight',
            });
        @endif
    </script>
@endsection