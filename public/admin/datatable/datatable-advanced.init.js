

var table = $('.datatables-basic').DataTable({
    dom: 'Bfrtip',
    buttons: [
        'csv', 'excel', 'pdf', 'print'
    ],
     responsive: true,
        "ordering": false,
});

$('.buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');

