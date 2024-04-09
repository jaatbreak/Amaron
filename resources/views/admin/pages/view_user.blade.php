@extends('admin.include.include')
@section('content')




<div class="container-xxl flex-grow-1 container-p-y">
                     <div class="row">
                     <div class="col-md-12 mb-4">
                           <div class="">
                              <div class="card-header d-flex justify-content-between pb-0">
                                 <div class="card-title mb-0">
                                    <h4 class="mb-0">User Info</h4>
                                    <!--<small class="text-muted">See All Vendor</small>-->
                                 </div>
                              </div>
                              
                           </div>
                        </div>
                        
                        
                        
                       
                        
                        <div class="col-12 col-xl-12 col-sm-12 order-1 order-lg-2 mb-4 mb-lg-0">
                        <div class="card p-3">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="border p-2 rounded p-md-3 ">
                                    <div class="d-flex justify-content-between mb-1">
                                        <div class="h-tittle fw-bold">Name</div>
                                        <div class="h-details">{{$user->name}}</div>
                                    </div>
                                     <div class="d-flex justify-content-between mb-1">
                                        <div class="h-tittle fw-bold">Phone</div>
                                        <div class="h-details">{{$user->phone}}</div>
                                    </div>
                                    
                                     <div class="d-flex justify-content-between mb-1">
                                        <div class="h-tittle fw-bold">Email</div>
                                        <div class="h-details">{{$user->email}}</div>
                                    </div>
                                    
                                     <div class="d-flex justify-content-between mb-2 align-items-center">
                                        <div class="h-tittle fw-bold">Avtar Image</div>
                                        <div class="h-details">
                                            <img src="{{url('')}}/uploads/{{$user->avatar_image}}" style="width:40px;height:40px;border-radius:100%">
                                        </div>
                                    </div>
                                    
                                    <div class="d-flex justify-content-between mb-2 align-items-center">
                                        <div class="h-tittle fw-bold">Aadhar Front</div>
                                        <div class="h-details">
                                            <?php if($user->aadhaar_front){ ?>
                                            <img src="{{url('')}}/uploads/{{$user->aadhaar_front}}" style="width:40px;height:40px;border-radius:100%">
                                            <?php } else{?>
                                            <img src="{{url('')}}/admin/1.png" style="width:40px;height:40px;border-radius:100%">
                                            <?php } ?>
                                        </div>
                                    </div>
                                    
                                    
                                      <div class="d-flex justify-content-between mb-2 align-items-center">
                                        <div class="h-tittle fw-bold">Aadhar Back</div>
                                        <div class="h-details">
                                            <?php if($user->aadhaar_back_side){ ?>
                                            <img src="{{url('')}}/uploads/{{$user->aadhaar_back_side}}" style="width:40px;height:40px;border-radius:100%">
                                            <?php } else{?>
                                            <img src="{{url('')}}/admin/1.png" style="width:40px;height:40px;border-radius:100%">
                                            <?php } ?>
                                        </div>
                                    </div>
                                    
                                  
                                      <div class="d-flex justify-content-between mb-1">
                                        <div class="h-tittle fw-bold">Verification</div>
                                        <div class="h-details">
                                            <?php if($user->verified == "Y"){ ?>
                                            <a href="{{ url("admin/vendor_verify")}}/N/{{$user->id}}" class="badge  bg-label-success" >Verify</a>
                                            <?php } else{?>
                                            <a href="{{ url("admin/vendor_verify")}}/Y/{{$user->id}}" class="badge  bg-label-danger" >Pending</a>
                                            <?php } ?>
                                            
                                        </div>
                                    </div>
                                    
                                       <div class="d-flex justify-content-between mb-1">
                                        <div class="h-tittle fw-bold">GST No.</div>
                                         <div class="h-details">
                                                {{$user->gst}}
                                                  <?php $html = $user->gst.'';
                                        
                                        if($user->gst){ ?>
                                       
                                        <a href="{{ url("admin/gst-check")}}/{{$user->gst}}" class="badge  bg-label-success" >Check</a>
                                                <?php } ?>
                                                </div>
                                      
                                    </div>
                                    
                                    
                                    <div class="d-flex justify-content-between mb-1">
                                        <div class="h-tittle fw-bold">Address</div>
                                         <div class="h-details">{{$user->address}}</div>
                                      
                                    </div>
                                    
                                      <div class="d-flex justify-content-between mb-1">
                                        <div class="h-tittle fw-bold">City</div>
                                         <div class="h-details">{{$user->city}}</div>
                                      
                                    </div>
                                      
                                      <div class="d-flex justify-content-between mb-1">
                                        <div class="h-tittle fw-bold">State</div>
                                         <div class="h-details">{{$user->state}}</div>
                                      
                                    </div>
                                     
                                      <div class="d-flex justify-content-between mb-1">
                                        <div class="h-tittle fw-bold">Pin Code</div>
                                         <div class="h-details">{{$user->pin_code}}</div>
                                        </div>
                                        
                                        <div class="d-flex justify-content-between mb-1">
                                        <div class="h-tittle fw-bold">Status</div>
                                         <div class="h-details">
                                             <?php if($user->status == "Y"){ ?>
                                             <a href="{{ url("admin/user_status")}}/N/{{$user->id}}" class="badge  bg-label-success" >Y</a>
                                             <?php  }else{ ?>
                                             <a href="{{ url("admin/user_status")}}/Y/{{$user->id}}" class="badge  bg-label-danger" >N</a>
                                             <?php } ?>
                                         </div>
                                        </div>
                                    
                                    
                                    
                                    
                                    
                                    
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>
                        <!--/ Projects table -->
                     </div>
                  </div>

@endsection