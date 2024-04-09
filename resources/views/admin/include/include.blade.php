<!DOCTYPE html>
    <html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed " dir="ltr" data-theme="theme-default" data-assets-path="{{asset('admin')}}" data-template="vertical-menu-template">
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
      <title>Amaronshop Dashboard</title>
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
   
      <link rel="stylesheet" href="{{asset('admin')}}/css/cards-advance.css" />
      <script src="{{asset('admin')}}/js/helpers.js"></script>
      <script src="{{asset('admin')}}/js/template-customizer.js"></script>
      <script src="{{asset('admin')}}/js/config.js"></script>
      <style>
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

img.avtr {
    width: 36px;
    height: 36px;
    border-radius: 100%;
    overflow: hidden;
    border: 1px solid #00000012;
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

.cke {
    border: 1px solid gainsboro !important;
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
                  <a href="{{ url('admin/dashboard') }}" class="app-brand-link">
                     <span class="app-brand-logo demo">
                        <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" clip-rule="evenodd" d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z" fill="#7367F0" />
                           <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd" d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z" fill="#161616" />
                           <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd" d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z" fill="#161616" />
                           <path fill-rule="evenodd" clip-rule="evenodd" d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z" fill="#7367F0" />
                        </svg>
                     </span>
                     <span class="app-brand-text demo menu-text fw-bold">Admin</span>
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
                           <a href="{{ route('admin/dashboard') }}" class="menu-link">
                              <div data-i18n="Home">Home</div>
                           </a>
                        </li>
                        <li class="menu-item">
                           <a href="{{ route('admin/user_profile') }}" class="menu-link">
                              <div data-i18n="Profile">Edit  Profile</div>
                           </a>
                        </li>
                        <li class="menu-item">
                           <a href="{{ route('admin/user_change_password') }}" class="menu-link">
                              <div data-i18n="Change Password">Change Password</div>
                           </a>
                        </li>
                        

                     </ul>
                  </li>
                  
                  <!-- Apps & Pages -->
                  <li class="menu-header small text-uppercase">
                     <span class="menu-header-text">User & Data</span>
                  </li>
                 
                  <li class="menu-item">
                     <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons  ti ti-users"></i>
                        <div data-i18n="Wallet Management">Users List</div>
                     </a>
                     <ul class="menu-sub">
                        <li class="menu-item">
                           <a href="{{ route('admin/user') }}" class="menu-link">
                              <div data-i18n="Credit">Users </div>
                           </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('admin/vendor') }}" class="menu-link">
                                <div data-i18n="Players">Vendors</div>
                            </a>
                        </li>
                        <li class="menu-item">
                           <a href="{{ route('admin/wallet') }}" class="menu-link">
                              <div data-i18n="Credit">Wallet </div>
                           </a>
                        </li>
                        <li class="menu-item">
                           <a href="{{ route('admin/vendor_verification_p') }}" class="menu-link">
                              <div data-i18n="Players">Vendor Verification Pending</div>
                           </a>
                        </li>
                     </ul>
                  </li>
                  
                  
                  </li>
                  
                  
                  <li class="menu-item">
                     <a href="{{ route('admin/posttype') }}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-text-wrap-disabled"></i>
                        <div data-i18n="Email">Developer Option </div>
                     </a>
                  </li>
                  
                  <li class="menu-item">
                     <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-layout-kanban"></i>
                        <div data-i18n="Game Challange">Products</div>
                     </a>
                     <ul class="menu-sub">
                        <li class="menu-item">
                           <a href="{{ route('admin/product') }}" class="menu-link">
                              <div data-i18n="All">Products</div>
                           </a>
                        </li>
                        <li class="menu-item">
                           <a href="{{ route('admin/product_verify') }}" class="menu-link">
                              <div data-i18n="Complete">Verify Pending Product</div>
                           </a>
                        </li>
                        <li class="menu-item">
                           <a href="{{ route('admin/product/category') }}" class="menu-link">
                              <div data-i18n="Pending">Category</div>
                           </a>
                        </li>
                        </li>
                        <li class="menu-item">
                           <a href="{{ route('admin/product/attributes') }}" class="menu-link">
                              <div data-i18n="cancel">Attributes</div>
                           </a>
                        </li>
                        

                     </ul>
                  </li>
                  
                  <li class="menu-item">
                     <a href="{{ route('admin/coupon') }}" class="menu-link">
                        <i class="menu-icon tf-icons  ti ti-wallet"></i>
                        <div data-i18n="Email">Coupon Management </div>
                     </a>
                  </li>
                 
                  
                  <li class="menu-item">
                     <a href="{{ route('admin/order') }}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-garden-cart"></i>
                        <div data-i18n="Email">Orders Management </div>
                     </a>
                  </li>
                 
                  
                  <li class="menu-item">
                     <a href="{{ route('admin/panding_product') }}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-calendar-time"></i>
                        <div data-i18n="Email">Panding Product </div>
                     </a>
                  </li>
                 
                  <li class="menu-header small text-uppercase">
                     <span class="menu-header-text">Account & Login</span>
                  </li>
                  <li class="menu-item">
                     <a href="{{ route('admin/logout') }}" class="menu-link">
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
      <script src="{{ asset('') }}assets/js/editor/ckeditor/ckeditor.js"></script>
     
   <script src="{{ asset('') }}assets/js/image-cropper/ijaboCropTool.min.js"></script>
           <script src="{{ asset('') }}assets/ajax/customajax.js"></script>
           <script src="{{ asset('') }}assets/js/select2/select2.full.min.js"></script>
           <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
           <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.3/xlsx.full.min.js"></script>
          
     <script src="https://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
       
      <!-- Page JS -->
      <!-- <script src="{{asset('admin')}}/js/tables-datatables-basic.js"></script> -->
@yield('datatablejs')


            




<script>
                            
                            
                            $(document).ready(function() {
                   $('.datatableexport').DataTable({
                       responsive: true,
                       dom: 'Bfrtip',
                   });
               });

                     </script>
                     
           <!-- login js-->
           <!-- Plugin used-->
           <script>
            
               $(document).ready(function() {
                   var table = $('#data_table_user').DataTable({
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

           <script>
               $(document).ready(function() {
                   var table = $('#data_table_vendor').DataTable({
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
           <script>
               var minDate, maxDate;
               // Custom filtering function which will search data in column four between two values
               $.fn.dataTable.ext.search.push(
                   function(settings, data, dataIndex) {
                       var min = minDate.val();
                       var max = maxDate.val();
                       var date = new Date(data[4]);

                       if (
                           (min === null && max === null) ||
                           (min === null && date <= max) ||
                           (min <= date && max === null) ||
                           (min <= date && date <= max)
                       ) {
                           return true;
                       }
                       return false;
                   }
               );
               $(document).ready(function() {
                   // Create date inputs
                   minDate = new DateTime($('#min'), {
                       format: 'MMMM Do YYYY'
                   });
                   maxDate = new DateTime($('#max'), {
                       format: 'MMMM Do YYYY'
                   });

                   // DataTables initialisation
                   var table = $('#data_table_user').DataTable();

                   // Refilter the table
                   $('#min, #max').on('change', function() {
                       table.draw();
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
                   //var value = $('#getattibutesselectedvalue').children("option:selected").val();
                   var values = [];
                   var $selectedOptions = $('#getattibutesselectedvalue').find('option:selected');
                   $selectedOptions.each(function() {
                       values.push($(this).val());
                   });
                   if (values.length > 0) {

                       send_request_to_backend(values);

                   } else {
                       alert('Please Select A Attirbutes');
                   }
               });

               function send_request_to_backend(attr) {
                   $.ajax({
                       type: "POST",
                       url: '{{ route('admin/product/get_attributes') }}',
                       data: {
                           'ids': attr
                       },
                       success: function(data) {
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
                   if (this.checked) {
                       $('#show_hide_tabs').show();
                       $('#show_hide_tabs input').attr('required', 'required');
                   } else {
                       $('#show_hide_tabs input').removeAttr('required');
                       $('#show_hide_tabs').hide();
                   }
               });
           </script>
           <script>
               $('.add_to_do_list').click(function() {
                   var count = Math.floor((Math.random() * 100) + 1);
                   var html =
                       '<div class="form_rerpeater row"> <div class="col-sm-6 col-md-6"> <div class="mb-0"> <label class="form-label">Input Label Name</label> <input name="fields[' +
                       count +
                       '][label_name]" class="form-control" type="text" placeholder="Input Label Name" > </div> </div> <div class="col-sm-4 col-md-4"> <div class="mb-0"> <label class="form-label">Input Label Type</label> <select name="fields[' +
                       count +
                       '][label_type]" class="form-control"> <option value="text">Text</option> <option value="number">Number</option> <option value="textarea">Textarea</option> <option value="file">Media</option> <option value="date">Date</option> <option value="color">Color</option> <option value="editor">Editor</option> </select> </div> </div> <div class="col-sm-2 col-md-2"> <div class="mb-0"> <label class="form-label">Required</label> <select  name="fields[' +
                       count +
                       '][required]"  class="form-control"> <option value="off">NO</option> <option value="on">Yes</option>> </select> </div> </div><div class="col-md-12"><div class="remove">-</div></div></div>';
                   $('.form_outrer').append(html);
               });
               $(document).on("click", ".remove", function() {
                   $(this).parent().parent().remove();
               });
           </script>
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

           <script>
               function open_model(element) {
                   element.classList.toggle('image_model');
                   element.childNodes[1].classList.add('d-block');
               }

               function close_model(closer) {
                   closer.parentNode.classList.remove('image_model');
               }
           </script>

           <script>
               //create CSV file data in an array
               var csvFileData = [
                //   ['product_name', 'Singer'],
                //   ['Cristiano Ronaldo', 'Footballer'],
                //   ['Saina Nehwal', 'Badminton Player'],
                //   ['Arijit Singh', 'Singer'],
                //   ['Terence Lewis', 'Dancer']
               ];

               //create a user-defined function to download CSV file
               function download_csv_file() {

                   //define the heading for each row of the data
                   var csv = 'product_name,image,product price,Sale price,category,product_gallary,product sort discraption,product long discraption,vandor_id,quantity';

                   //merge the data with CSV
                   csvFileData.forEach(function(row) {
                       csv += row.join(',');
                       csv += "\n";
                   });

                   var hiddenElement = document.createElement('a');
                   hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(csv);
                   hiddenElement.target = '_blank';

                   //provide the name for the CSV file to be downloaded
                   hiddenElement.download = 'upload_product.csv';
                   hiddenElement.click();
               }
           </script>



           </body>

           </html>
