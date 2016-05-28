var oTable1 = $('#table_negociacion').DataTable({
	"searching": false,
	"lengthChange": false,
	"order": [[ 1, "desc" ]],
	"columnDefs": [
            {
                // The `data` parameter refers to the data for the cell (defined by the
                // `data` option, which defaults to the column being worked with, in
                // this case `data: 0`.
                "render": function ( data, type, row ) {
                    return "<a href= '"+root+"/negociaciones/editar/"+data+" '>" + data + "</a>" ;
                },
                "targets": 0
            }
        ]
});
