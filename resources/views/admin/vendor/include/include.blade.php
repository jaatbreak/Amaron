<!DOCTYPE html>
    <html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed " dir="ltr" data-theme="theme-default" data-assets-path="{{asset('admin')}}" data-template="vertical-menu-template">
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
      <title>Amaronshop Vendor Dashboard</title>
      <meta name="description" content="" />
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="keywords" content="">
      <!-- Canonical SEO -->
      <link rel="canonical" href="#">
      <!-- End Google Tag Manager -->
      <!-- Favicon -->
      <link rel="icon" type="image/x-icon" href="{{asset('admin/favicon.ico') }}" />
      <!-- Fonts -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
      <!-- Icons -->
      <link rel="stylesheet" href="{{asset('admin')}}/css/fontawesome.css" />
      <link rel="stylesheet" href="{{asset('admin')}}/css/tabler-icons.css"/>
      <link rel="stylesheet" href="{{asset('admin')}}/css/flag-icons.css" />
      <!-- Core CSS -->
      <link rel="stylesheet" href="{{asset('admin')}}/css/core.css" class="template-customizer-core-css" />
      <link rel="stylesheet" href="{{asset('admin')}}/css/theme-default.css" class="template-customizer-theme-css" />
      <link rel="stylesheet" href="{{asset('admin')}}/css/demo.css" />
      <!-- Vendors CSS -->
      <link rel="stylesheet" href="{{asset('admin')}}/css/perfect-scrollbar.css" />
   
      <!-- Page CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
   
    
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}assets/css/new_css.css">
      <link rel="stylesheet" href="{{asset('admin')}}/css/cards-advance.css" />
      <script src="{{asset('admin')}}/js/helpers.js"></script>
      <script src="{{asset('admin')}}/js/template-customizer.js"></script>
      <script src="{{asset('admin')}}/js/config.js"></script>
      <style>
         
         .cke {
    border: 1px solid gray;
}
        img.vendoravtrimage {
    width: 40px;
    height: 40px;
    object-fit: contain;
    border-radius: 100%;
    border: 1px solid #e2e1e3;
    overflow: hidden;
    padding: 2px;
}
img.avtr {
    width: 40px;
    height: 40px;
    border-radius: 100%;
    border: 1px solid #dddddd;
}
.app-brand-logo.demo {
    width: unset;
    height: unset;
}
          .main_menu_open nav {
    position: absolute !important;
    top: 5px !important;
    right: 17px !important;
    width: 36px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 100%;
    height: 54px;
    left: unset !important;
    box-shadow: unset;
}
img.vendoravtrimage {
    width: 50px;
    height: 50px;
    object-fit: contain;
    border-radius: 100%;
    border: 1px solid #e2e1e3;
    overflow: hidden;
    padding: 2px;
}

.dataTables_processing {
    position: absolute;
    top: 0;
    width: 100%;
    height: 100%;
    text-align: center;
    padding-top: 5%px;
}
.main_menu_open nav div.navbar-nav {
    margin: 0 !important;
}

.main_menu_open nav div.navbar-nav a i {
    font-size: 31px !important;
}
#template-customizer .template-customizer-open-btn {
    display: none;
}

input.form-check-input.switch_width {
            width: 40px;
            margin: auto;
            margin-left: 18px;
            height: 17px;
        }

        div.dataTables_wrapper div.dataTables_length select {
            padding: 0px 20px;
        }

        .image_upload img {
            width: 100px;
            height: 100px;
            object-fit: contain;
            margin-bottom: 10px;
            background-color: #eff7ff;
            border: solid 1px #b0b0b0;
        }

        #cke_editor1 {
            border: solid 1px #e6edef;
        }


        .product_veriant_box_header {
            background: #d3e1de;
            padding: 5px 15px;
        }

        .list_form {
            padding: 15px 15px;
            background-color: #fff;
        }

        .list_header {
            display: flex;
            justify-content: space-between;
        }

        .mix_use_varint_po {
            padding: 5px 10px;
        }

        span.delete_list {
            padding: 6px 11px;
            background: #2c323f;
            border-radius: 57px;
            cursor: pointer;
            display: inline-block;
            margin-right: 5px;
        }

        span.delete_list i {
            color: #fff;
        }

        span.toggle_expend {
            padding: 6px 11px;
            background: #2c323f;
            border-radius: 57px;
            cursor: pointer;
            display: inline-block;
        }

        .toggle_expend i {
            color: #fff;
        }

        .action_att_list {
            padding-top: 10px;
        }
        .form_rerpeater {
            background-color: aliceblue;
            padding: 20px 20px;
            border: solid 1px #000;
            margin-top: 20px;
        }
        .add_to_do_list {
            background: #24695c;
            width: 30px;
            height: 30px;
            margin: 6px auto;
            border-radius: 100%;
            text-align: center;
            fill: #fff;
            padding-top: 3px;
        }
        .remove {
            background: #ff5722;
            width: 30px;
            height: 30px;
            margin: 0px auto !important;
            border-radius: 100%;
            text-align: center;
            color: #fff;
            font-size: 34px;
            line-height: 26px;
            font-weight: 400;
            margin-top: 19px !important;
        }
        input[type="file"] {
          display: block;
        }
        .imageThumb {
          max-height: 75px;
          border: 2px solid;
          padding: 1px;
          cursor: pointer;
        }
        .pip {
          display: inline-block;
          margin: 10px 10px 0 0;
        }
        .remove {
          display: block;
          background: #444;
          border: 1px solid black;
          color: white;
          text-align: center;
          cursor: pointer;
        }
        .remove:hover {
          background: white;
          color: black;
        }
        .approve_action_n:hover {
            color: #fff;
        }
        .approve_action_n {
            background: #24695c;
            width: 57px;
            display: block;
            color: #fff;
            text-align: center;
            border-radius: 15px;
            padding: 3px;
            font-weight: bold;
            margin: auto;
        }
        a.approve_action {
            background: #ff1c04;
            width: 57px;
            display: block;
            color: #fff;
            text-align: center;
            border-radius: 15px;
            padding: 3px;
            margin: auto;
        }
        #map {
          height: 300px;
        }
        #cke_editor2 {
            border: solid 1px #e6edef;
        }
        .dataTables_wrapper .dataTables_filter input[type="search"] {
            border: 1px solid #797979 !important;
        }


      </style>
      <!--https://demos.pixinvent.com/vuexy-html-admin-template/html/vertical-menu-template/index.html-->
   
   </head>
   <body>
       <div class="main_menu_open">
           <nav class="layout-navbar navbar navbar-expand-xl " id="layout-navbar">
               <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0   d-xl-none ">
                   <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                       <i class="ti ti-menu-2 ti-sm"></i>
                   </a>
                </div>
            </nav>
        </div>
       
      <?php if(Auth::check()){ ?>
   <div class="layout-wrapper layout-content-navbar  ">
         <div class="layout-container">
            <!-- Menu -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
               <div class="app-brand demo ">
                  <a href="{{ url('vendor/dashboard') }}" class="app-brand-link">
                     <span class="app-brand-logo demo">
                        <?php if(auth()->user()->avatar_image){ ?>
                        <img class="vendoravtrimage" src="{{ asset('uploads') }}/{{ auth()->user()->avatar_image }}" alt="">
                        <?php }else{ ?>
                        <img class="vendoravtrimage" src="{{ asset('assets/images/avatar_image.png') }}" alt="">
                        <?php } ?>
                     </span>
                     <span class="app-brand-text small demo menu-text fw-bold">
                        {{ ucfirst(auth()->user()->name) }}
                        <br>
                     <span class="small ">{{ auth()->user()->phone }}</span>
                    </span>
                     
                  </a>
                  <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                  <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
                  <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
                  </a>
               </div>
               <div class="menu-inner-shadow"></div>
               <ul class="menu-inner py-1">
                  <!-- Dashboards -->
                  <li class="menu-item">
                     <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-smart-home"></i>
                        <div data-i18n="Dashboards">Dashboard</div>
                     </a>
                     <ul class="menu-sub">
                        <li class="menu-item">
                           <a href="{{ route('vendor/dashboard') }}" class="menu-link">
                              <div data-i18n="Home">Home</div>
                           </a>
                        </li>
                        <li class="menu-item">
                           <a href="{{ route('vendor/vendor_profile') }}" class="menu-link">
                              <div data-i18n="Profile">Edit  Profile</div>
                           </a>
                        </li>
                        <li class="menu-item">
                           <a href="{{ route('vendor/vendor_change_password') }}" class="menu-link">
                              <div data-i18n="Change Password">Change Password</div>
                           </a>
                        </li>
                        

                     </ul>
                  </li>
                  
                  <!-- Apps & Pages -->
                  <li class="menu-header small text-uppercase">
                     <span class="menu-header-text">Products & Orders</span>
                  </li>
                 
                 
                  
                  
                  <li class="menu-item">
                     <a href="{{ route('vendor/product') }}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-layout-kanban"></i>
                        <div data-i18n="Email">Products </div>
                     </a>
                  </li>
                  
                  
                  
                  @if (auth()->user()->verified == 'Y')
                  <li class="menu-item">
                     <a href="{{ route('vendor/order') }}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-garden-cart"></i>
                        <div data-i18n="Email">Orders List </div>
                     </a>
                  </li>
                  @endif
                  
                  
                  
                  
                  <li class="menu-item">
                     <a href="{{ url('vendor/referearn') }}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-gift"></i>
                        <div data-i18n="Email">Refer Earn </div>
                     </a>
                  </li>
                  
                  
                  
                  
                  <li class="menu-item">
                     <a href="{{ route('vendor/datamanage') }}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-refresh-dot"></i>
                        <div data-i18n="Email">Import Export </div>
                     </a>
                  </li>
                  
                  
                  
                 
                  <li class="menu-header small text-uppercase">
                     <span class="menu-header-text">Account & Login</span>
                  </li>
                  <li class="menu-item">
                     <a href="{{ route('vendor/logout') }}" class="menu-link">
                        <i class="ti ti-logout me-2 ti-sm"></i>
                        <div data-i18n="Kanban">Logout</div>
                     </a>
                  </li>
       
               </ul>
            </aside>
            <!-- / Menu -->
            <!-- Layout container -->
            <div class="layout-page">
               <!-- Navbar -->
               
               
               <!-- / Navbar -->
               <!-- Content wrapper -->
               <div class="content-wrapper">
                  <!-- Content -->
                  <?php } ?>
                  @yield('content')
                  <!-- / Content -->
                  <!-- Footer -->
                 <?php if(Auth::check()){?>
                  
                  <!-- / Footer -->
                  <div class="content-backdrop fade"></div>
               </div>
               <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
         </div>
         <!-- Overlay -->
         <div class="layout-overlay layout-menu-toggle"></div>
         <!-- Drag Target Area To SlideIn Menu On Small Screens -->
         <div class="drag-target"></div>
      </div>
      <!-- / Layout wrapper -->
      
      <?php } ?>
      <!-- Core JS -->
      <!-- build:js assets/vendor/js/core.js -->
      <script src="{{asset('admin')}}/js/jquery.js"></script>
      <script src="{{asset('admin')}}/js/popper.js"></script>
      <script src="{{asset('admin')}}/js/bootstrap.js"></script>
      <script src="{{asset('admin')}}/js/perfect-scrollbar.js"></script>
   
   
      <script src="{{asset('admin')}}/js/hammer.js"></script>
     
      <script src="{{asset('admin')}}/js/typeahead.js"></script>
      <script src="{{asset('admin')}}/js/menu.js"></script>
    
   
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('/')}}admin/datatable/datatablesetting.css"/>
<script src="{{asset('/')}}admin/datatable/jquery.datatables.min.js"></script>
<!--<script src="{{asset('/')}}admin/datatable/datatables.buttons.min.js"></script>
<script src="{{asset('/')}}admin/datatable/buttons.flash.min.js"></script>
<script src="{{asset('/')}}admin/datatable/jszip.min.js"></script>
<script src="{{asset('/')}}admin/datatable/pdfmake.min.js"></script>
<script src="{{asset('/')}}admin/datatable/buttons.html5.min.js"></script>
<script src="{{asset('/')}}admin/datatable/buttons.print.min.js"></script>-->
<!--     <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> -->
<script src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
<script src="{{asset('/')}}admin/datatable/datatable-advanced.init.js"></script>  
      <script src="{{asset('admin')}}/js/main.js"></script>
      
     
   <script src="{{ asset('') }}assets/js/image-cropper/ijaboCropTool.min.js"></script>
           <script src="{{ asset('') }}assets/ajax/customajax.js"></script>
           
           <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
           <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.3/xlsx.full.min.js"></script>
          
     <script src="https://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
       
     <script src="{{ asset('') }}assets/js/editor/ckeditor/ckeditor.js"></script>
<!-- Plugins JS Ends-->

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDkGm1Sy6FOJvm4PBgpUcIv56Jbxu5RZ1w&callback=initMap&v=weekly" defer ></script>

 
 
 <script>
        // The following example creates a marker in Stockholm, Sweden using a DROP
        // animation. Clicking on the marker will toggle the animation between a BOUNCE
        // animation and no animation.
        let marker;
        
        function initMap() {
          const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 13,
            center: { lat: 59.325, lng: 18.07 },
          });
        
          marker = new google.maps.Marker({
            map,
            draggable: true,
            animation: google.maps.Animation.DROP,
            position: { lat: 59.327, lng: 18.067 },
          });
          marker.addListener("click", toggleBounce);
        }
        
        function toggleBounce() {
          if (marker.getAnimation() !== null) {
            marker.setAnimation(null);
          } else {
            marker.setAnimation(google.maps.Animation.BOUNCE);
          }
        }
        
        window.initMap = initMap;
 </script>
 

<!-- login js-->
<!-- Plugin used-->
<script>
    $(document).ready(function() {
        var table = $('#data_table_user').DataTable({
            rowReorder: {
                selector: 'td:nth-child(2)'
            },
            responsive: true
        });
    });
</script>

{{-- <script>
$('#avatar_image').ijaboCropTool({
 preview : '.image-previewer',
 setRatio:1,
 allowedExtensions: ['jpg', 'jpeg','png'],
 buttonsText:['CROP','QUIT'],
 buttonsColor:['#30bf7d','#ee5155', -15],
 processUrl:'{{ route("admin/crops") }}',
 withCSRF:['_token','{{ csrf_token() }}'],
 onSuccess:function(message, element, status){
    alert(message);
 },
 onError:function(message, element, status){
   alert(message);
 }
});
</script> --}}


<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#adduser0").submit(function(e) {
        e.preventDefault();

        var formData = new FormData(this);
        //console.log(bio);
        $.ajax({
            url: "{{ route('admin.adduser') }}",
            method: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(res) {
                if (res.status == 'success') {

                    $("#usermodal").modal('hide');
                    $("#adduser0")[0].reset();
                    iziToast.success({
                        title: 'success',
                        message: 'Add Data successful!',
                        position: 'topRight',
                    });
                    $('.data_table_user_page').load(location.href + ' .data_table_user_page');
                    // location.reload();
                }
            },
            error: function(err) {
                var error = err.responseJSON;
                $.each(error.errors, function(index, value) {
                    $(".error_" + index).append('<span>' + value + '</span>')
                });
            }
        });

    });
</script>

<script>
    $(document).ready(function() {
        $('.js-switch').change(function() {
            let status = $(this).prop('checked') === true ? 'Y' : 'N';
            let id = $(this).data('id');
            $.ajax({
                type: "POST",
                dataType: "json",
                url: '{{ route('admin/product/update_status_category') }}',
                data: {
                    'status': status,
                    'id': id
                },
                success: function(data) {
                    iziToast.success({
                        message: data.message,
                        position: 'topRight',
                    });
                }
            });
        });
    });
</script>

<script>
    CKEDITOR.replace('editor1', {
        on: {
            contentDom: function(evt) {
                // Allow custom context menu only with table elemnts.
                evt.editor.editable().on('contextmenu', function(contextEvent) {
                    var path = evt.editor.elementPath();

                    if (!path.contains('table')) {
                        contextEvent.cancel();
                    }
                }, null, null, 5);
            }
        }
    });
</script>
<script>
    CKEDITOR.replace('editor2', {
        on: {
            contentDom: function(evt) {
                // Allow custom context menu only with table elemnts.
                evt.editor.editable().on('contextmenu', function(contextEvent) {
                    var path = evt.editor.elementPath();

                    if (!path.contains('table')) {
                        contextEvent.cancel();
                    }
                }, null, null, 5);
            }
        }
    });
</script>
<script>
    "use strict";
    setTimeout(function() {
        (function($) {
            "use strict";
            // Single Search Select
            $(".js-example-basic-single").select2();
            $(".js-example-disabled-results").select2();

            // Multi Select
            $(".js-example-basic-multiple").select2();

            // With Placeholder
            $(".js-example-placeholder-multiple").select2({
                placeholder: "Select Your Name"
            });

            //Limited Numbers
            $(".js-example-basic-multiple-limit").select2({
                maximumSelectionLength: 2
            });

            //RTL Suppoort
            $(".js-example-rtl").select2({
                dir: "rtl"
            });
            // Responsive width Search Select
            $(".js-example-basic-hide-search").select2({
                minimumResultsForSearch: Infinity
            });
            $(".js-example-disabled").select2({
                disabled: true
            });
            $(".js-programmatic-enable").on("click", function() {
                $(".js-example-disabled").prop("disabled", false);
            });
            $(".js-programmatic-disable").on("click", function() {
                $(".js-example-disabled").prop("disabled", true);
            });
        })(jQuery);
    }, 350);
</script>

<script type="text/javascript">
    $("#product_type").change(function() {
        var value = $(this).children("option:selected").val();
        $('#varible_product').hide();
        $('#grouped_product').hide();
        $('#grouped_variable').hide();
        if (value == 'varible') {
            $('#varible_product').show();
        }
        if (value == 'grouped') {
            $('#grouped_product').show();
        }
        if (value == 'grouped_variable') {
            $('#varible_product').show();
            $('#grouped_product').show();
        }
    });


    $("#add_veriant_btn").click(function() {
        if(localStorage.getItem("num")){
        localStorage.setItem("num", 1+parseInt(localStorage.getItem("num")));
        }else{
            localStorage.setItem("num", 1)
        }
        var num = localStorage.getItem("num");
        //console.log(num);
        //var value = $('#getattibutesselectedvalue').children("option:selected").val();
        var values = [];
        var $selectedOptions = $('#getattibutesselectedvalue').find('option:selected');
        $selectedOptions.each(function() {
            values.push($(this).val());
        });
        if (values.length > 0) {

            send_request_to_backend(values,num);

        } else {
            alert('Please Select A Attirbutes');
        }
    });

    function send_request_to_backend(attr,num) {
        $.ajax({
            type: "POST",
            url: '{{ route('vendor/product/get_attributes') }}',
            data: {
                'ids': attr,
                'num':num
            },
            success: function(data) {
                alert('done');
                console.log(data);
                $('.attribute_list_listing').append(data);
            }
        });
    }
</script>

<script type="text/javascript">
    $('body').on('click', '.action_att_list span.toggle_expend', function() {
        $(this).parent().parent().parent().parent().children('.list_form').slideToggle();
    });
</script>
<script type="text/javascript">
    $('body').on('click', '.action_att_list span.delete_list', function() {
        $(this).parent().parent().parent().parent().remove();
    });
</script>
<script>
    $('#is_repeat_chck').change(function() {
       // alert($(this).val());
        if(this.checked) {
            $('#show_hide_tabs').show();
            $('#show_hide_tabs input').attr('required','required');
        }else{
            $('#show_hide_tabs input').removeAttr('required');
            $('#show_hide_tabs').hide();
        }     
    });
</script>
<script>
$('.add_to_do_list').click(function(){
    var count = Math.floor((Math.random()* 100)+1);
    var html = '<div class="form_rerpeater row"> <div class="col-sm-6 col-md-6"> <div class="mb-0"> <label class="form-label">Input Label Name</label> <input name="fields['+count+'][label_name]" class="form-control" type="text" placeholder="Input Label Name" > </div> </div> <div class="col-sm-4 col-md-4"> <div class="mb-0"> <label class="form-label">Input Label Type</label> <select name="fields['+count+'][label_type]" class="form-control"> <option value="text">Text</option> <option value="number">Number</option> <option value="textarea">Textarea</option> <option value="file">Media</option> <option value="date">Date</option> <option value="color">Color</option> <option value="editor">Editor</option> </select> </div> </div> <div class="col-sm-2 col-md-2"> <div class="mb-0"> <label class="form-label">Required</label> <select  name="fields['+count+'][required]"  class="form-control"> <option value="off">NO</option> <option value="on">Yes</option>> </select> </div> </div><div class="col-md-12"><div class="remove">-</div></div></div>';
    $('.form_outrer').append(html);
});
$(document).on("click",".remove",function() {
   $(this).parent().parent().remove();
});
</script>

<script>
    $('.remove_product_gallery').click(function(){
       var id_remove = $(this).attr('data_target');
       var remove_img = $(this).attr('data_image');
         $('.product_gallery').append('<input type="hidden" name="remove_image[]" value="'+remove_img+'">');
        $('#'+id_remove).remove();
    });
</script>


      <!-- Page JS -->
      <!-- <script src="{{asset('admin')}}/js/tables-datatables-basic.js"></script> -->

                  <script>
                            
                            
                            $(document).ready(function() {
                   var table = $('.datatableexport').DataTable({
                       rowReorder: {
                           selector: 'td:nth-child(2)'
                       },
                       responsive: true,
                       dom: 'Bfrtip',
                       buttons: [
                           'copyHtml5',
                           'excelHtml5',
                           'csvHtml5',
                           'pdfHtml5'
                       ]
                   });
               });

                     </script>

@yield('datatablejs')


            
<script>
               @if (Session::has('status'))
                   iziToast.success({
                       message: '{{ Session::get('status') }}',
                       position: 'topRight',
                   });
               @endif
           </script>
           <script>
               @if (Session::has('success'))
                   iziToast.success({
                       message: '{{ Session::get('success') }}',
                       position: 'topRight',
                   });
               @endif
           </script>



           </body>

           </html>
