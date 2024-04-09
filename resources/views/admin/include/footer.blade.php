           <!-- footer start-->
           <footer class="footer">
               <div class="container-fluid">
                   <div class="row">
                       <div class="col-md-6 footer-copyright">
                           <p class="mb-0">Copyright 2022 © Ait All rights reserved.</p>
                       </div>
                       <div class="col-md-6">
                           <!-- <p class="pull-right mb-0">Hand crafted & made with <i class="fa fa-heart font-secondary"></i></p> -->
                       </div>
                   </div>
               </div>
           </footer>
           </div>
           </div>
           <!-- latest jquery-->
           <script src="{{ asset('') }}assets/js/jquery-3.5.1.min.js"></script>
           <!-- feather icon js-->
           <script src="{{ asset('') }}assets/js/icons/feather-icon/feather.min.js"></script>
           <script src="{{ asset('') }}assets/js/icons/feather-icon/feather-icon.js"></script>
           <!-- Sidebar jquery-->


           <script src="{{ asset('') }}assets/js/sidebar-menu.js"></script>
           <script src="{{ asset('') }}assets/js/config.js"></script>
           <!-- Bootstrap js-->
           <script src="{{ asset('') }}assets/js/bootstrap/popper.min.js"></script>
           <script src="{{ asset('') }}assets/js/bootstrap/bootstrap.min.js"></script>
           <!-- Plugins JS start-->
           <script src="{{ asset('') }}assets/js/editor/ckeditor/ckeditor.js"></script>
           <!-- Plugins JS Ends-->
           <!-- Theme js-->
           <script src="{{ asset('') }}assets/js/script.js"></script>
           <script src="{{ asset('') }}assets/js/theme-customizer/customizer.js"></script>
           <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
           <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
           <script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
           <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
           <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

           <script src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
           <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
           <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
           <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
           <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>
           <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
           <script src="https://cdn.datatables.net/datetime/1.4.0/js/dataTables.dateTime.min.js"></script>



           <script src="{{ asset('') }}assets/js/image-cropper/ijaboCropTool.min.js"></script>
           <script src="{{ asset('') }}assets/ajax/customajax.js"></script>
           <script src="{{ asset('') }}assets/js/select2/select2.full.min.js"></script>
           <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
           <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.3/xlsx.full.min.js"></script>
           <script src="https://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
           <script>
               document.getElementById("exportButton").addEventListener("click", function() {
                   $("#myTable").table2excel({
                       name: "TableToExcel",
                       filename: "my_data"
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
