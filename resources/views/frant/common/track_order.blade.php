@extends('frant.include.include')
@section('content')
<!--<div class="page-header" style="height: 180px;">-->
    <div class="container">
        <h1 class="page-title mb-0">{{ $title }}</h1>
            <div class="col-sm-6 col-xs-12">
            @if(isset($shipmetndtrackinginfo) && isset($orderid))
                @foreach($shipmetndtrackinginfo as $data)
                    @if(isset($data->tracking_data->shipment_track))
                        
                        <?php
                        $delivered_date = $data->tracking_data->shipment_track[0]->delivered_date;
                        $current_order_status = $data->tracking_data->shipment_track[0]->current_status;
                        $dateTime = new DateTime($delivered_date);
                        $dayOfWeek = $dateTime->format('l');
                        $month = $dateTime->format('F');
                        $dayOfMonth = $dateTime->format('d');
                        $year = $dateTime->format('Y');
                        ?>
                        <div class="hp_cards" style="margin-top:20px;">
                            <div class="hp_cards_info">
                                <div style="padding-bottom: 10px;" class="clearfix  delievery_status">
                                    <div class="pull-left status_cont">
                                        <div class="status_check clearfix">
                                            <span class="status-css">Delivered On</span>
                                            <div class="edd_info" style="margin-bottom: 10px;">
                                              <span style="display: inline;font-size: 24px !important" class="edd_day sfproBold fs-20px " id="edd_day">{{$dayOfWeek}}</span>
                                              <span style="line-height: 14px;" class="edd_month sfproBold" id="edd_month">{{$month}}</span>
                                              <strong class="edd_date SFProSemibold fs-107px" id="edd_date">{{$dayOfMonth}}<span class="year_txt">{{$year}}</span>
                                              </strong>
                                            </div>
                                        </div>
                                          <!-- <span>Status</span> -->
                                          <!-- Delivered or RTO delivered -->
                                      <span style="margin-bottom:-10px;margin-top: 0;" class="SFProSemibold fs-16px" id="shipment_status_label">Status:</span>
                                      <p class="SFProRegular" id="shipment_status">
                                        <!--<img class="status_icon" src="https://shiprocket.co/post_order/img/tracking/delivered.svg">-->
                                        <!-- <i class="check_delievery"></i> -->
                                        <!-- undelivered -->
                                        <span style="margin-bottom: 0;" class="status_green">{{ $current_order_status }}</span>
                                        <!--<span style="font-size: 11px !important;margin-bottom: 0;" class="status_green"></span>-->
                                      </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="col-sm-12 col-xs-12 map-container">
                                <div class="mapouter">
                                    <div class="gmap_canvas">
                                      <iframe id="gmap_canvas" src="https://maps.google.com/maps?q={{$data->tracking_data->shipment_track[0]->destination}}&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                      <a href="https://yt2.org/youtube-to-mp3-ALeKk00qEW0sxByTDSpzaRvl8WxdMAeMytQ1611842368056QMMlSYKLwAsWUsAfLipqwCA2ahUKEwiikKDe5L7uAhVFCuwKHUuFBoYQ8tMDegUAQCSAQCYAQCqAQdnd3Mtd2l6"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="courier_info clearfix" style="padding-bottom: 20px;">
                              <div class="pull-left courier_logo" style="background-image: url('https://amaronshop.com/uploads/1780693751.png');background-repeat: no-repeat;"></div>
                              <div class="pull-left">
                                <span class="fs-17px SFProSemibold">
                                  <b>amaronshop</b>
                                </span>
                                <!-- <a href="#" class="tracking_id">Support?</a> -->
                              </div>
                              <div class="pull-right trackingid_mobile">
                                <span class="sfproBold" style="font-size: 13px;">
                                  <b>Tracking ID</b>
                                </span>
                                <span class="tracking_id fs-12px sfproBold">{{$data->tracking_data->shipment_track[0]->awb_code}}</span>
                              </div>
                            </div>
                            <div class="delievery_info pt-0 ulli_border">
                              <div class="delievery_list_wrap clearfix" style="margin-top: -18px">
                                <ul>
                                     @foreach ($data->tracking_data->shipment_track_activities as $status => $data1):
                                        <?php
                                        $active = '';
                                        if($status == 0):
                                            $active = 'active';
                                        endif;
                                        $time = date('h:i A', strtotime($data1->date));
                                        $date = date('d M', strtotime($data1->date));
                                        ?>
                                        <li class="{{ $active }}">
                                            <span class="fs-12px SFProMedium">
                                                <b>Activity : </b>
                                                <activity>{{ $data1->status }}</activity>
                                            </span>
                                            <span class="fs-12px SFProMedium">
                                                <b>Location : </b>
                                                <activity>{{ $data1->location }}</activity>
                                            </span>
                                            <div style="padding-left: 5px;" class="date_info_wrap fs-12px SFProMedium">
                                                <span class='date'>{{ $date }}</span>
                                                <span class='time'>{{ $time }}</span>
                                            </div>
                                            <i class="circle_icon"></i>
                                        </li>
                                    @endforeach;
                                </ul>
                              </div>
                            </div>
                        </div>
                    @endif
                @endforeach
              @else
                <p>Order Placed !! Wait till shipped.</p>
            @endif    
        </div>
        
        @if(!empty($orderid))
            <div class="col-sm-6 col-xs-12">
              <!-- order details -->
              <div class="hp_cards information_block" style="margin-top:20px;">
                <div class="hp_cards_info" style="margin-top:20px;">
                  <h5 class="fs-14px SFProSemibold">
                    <!--<i class="order_detail_icon"></i>-->
                    Order Details
                  </h5>
                  <div class="clearfix mb-20">
                    <span class="pull-left fs-12px sfproBold">
                      <b>Order ID</b>
                    </span>
                    <span class="pull-right fs-12px right_info">{{ isset($orderid->rand) ? $orderid->rand : '' }}</span>
                  </div>
                  <div class="clearfix mb-20">
                    <span class="pull-left fs-12px sfproBold">
                      <b>Order Placed On</b>
                    </span>
                    <span class="pull-right fs-12px right_info">{{ isset($orderid->created_at) ? $orderid->created_at : '' }}</span>
                  </div>
                </div>
              </div>
              <!-- order details end-->
              <div class="recommend_info text-center success_info" style="display: none;" id="courier_nps_success">
                <i class="success_icon"></i>
                <strong>Thank You</strong>
                <span>Your feedback helps us improve the service</span>
              </div>
            </div>
        @endif    
    </div>
<!--</div>-->




@endsection