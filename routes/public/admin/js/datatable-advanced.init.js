

var table = $('table').DataTable({
    dom: 'Bfrtip',
    buttons: [
        'csv', 'excel', 'pdf', 'print'
    ],
     responsive: true,
        "ordering": false,
});

$('.buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');


 $('.chnage_filter').on('change', function () {
     var col = $(this).attr('column');
        table.columns(col).search( this.value ).draw();
});

$('.chnage_filter_1').on('change', function () {
     var col = $(this).attr('column');
        table.columns(col).search( this.value ).draw();
});

$('.filtr_unset').click(function(){
   $(".chnage_filter_1").val($(".chnage_filter_1 option:first").val());
   $(".chnage_filter").val($(".chnage_filter option:first").val());
});

    