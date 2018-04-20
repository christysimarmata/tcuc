(function ($) {
    //    "use strict";


    /*  Data Table
    -------------*/




    $('#bootstrap-data-table').DataTable({
                lengthMenu: [[10, 20, 50, -1], [10, 20, 50, "All"]]
        });

    $('#bootstrap-data-table-form').DataTable({
                lengthMenu: [[10, 20, 50, -1], [10, 20, 50, "All"]]
        });

    $('#bootstrap-data-table-export-2').DataTable({
        dom: '<"topbutton"B>flrtip',
        buttons: [
                        {
                            extend: 'excel',
                            text: 'Download',
                            className: 'btn-success btn-download',
                        }
                    ],
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        columnDefs: [
        	{
        		"targets": [ 1 ],
                "visible": false,
                "searchable": false
        	},
        	{
        		"targets": [ 8 ],
                "visible": false,
                "searchable": false
        	},
        	{
        		"targets": [ 9 ],
                "visible": false,
                "searchable": false
        	}

        ]
        
    });

    $('#bootstrap-data-table-export').DataTable({
        dom: '<"topbutton"B>flrtip',
        buttons: [
                        {
                            extend: 'excel',
                            text: 'Download',
                            className: 'btn-success btn-download',
                        }
                    ],
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        columnDefs: [
        	{
        		"targets": [ 5 ],
                "visible": false,
                "searchable": false
        	},
        	{
        		"targets": [ 6 ],
                "visible": false,
                "searchable": false
        	},
        	{
        		"targets": [ 7 ],
                "visible": false,
                "searchable": false
        	},
        	{
        		"targets": [ 8 ],
                "visible": false,
                "searchable": false
        	},
        	{
        		"targets": [ 9 ],
                "visible": false,
                "searchable": false
        	},
        	{
        		"targets": [ 10 ],
                "visible": false,
                "searchable": false
        	},
            {
                "targets": [ 11 ],
                "visible": false,
                "searchable": false
            },
            {
                "targets": [ 12 ],
                "visible": false,
                "searchable": false
            },
            {
                "targets": [ 13 ],
                "visible": false,
                "searchable": false
            },
            {
                "targets": [ 14 ],
                "visible": false,
                "searchable": false
            },
            {
                "targets": [ 15 ],
                "visible": false,
                "searchable": false
            }
        ]
        
    });

    $('#bootstrap-data-table-export-4').DataTable({
        dom: '<"topbutton"B>flrtip',
        buttons: [
                        {
                            extend: 'excel',
                            text: 'Download',
                            className: 'btn-success btn-download',
                        }
                    ],
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        columnDefs: [
        	{
        		"targets": [ 4 ],
                "visible": false,
                "searchable": true
        	},
        	{
        		"targets": [ 5 ],
                "visible": false,
                "searchable": true
        	},
        	{
        		"targets": [ 6 ],
                "visible": false,
                "searchable": true
        	},
        	{
        		"targets": [ 7 ],
                "visible": false,
                "searchable": true
        	},
            {
                "targets": [ 8 ],
                "visible": false,
                "searchable": true
            },
        	{
        		"targets": [ 9 ],
                "visible": false,
                "searchable": true
        	},
        	{
        		"targets": [ 10 ],
                "visible": false,
                "searchable": true
        	},
        	{
        		"targets": [ 11 ],
                "visible": false,
                "searchable": true
        	},
        	{
        		"targets": [ 12 ],
                "visible": false,
                "searchable": true
        	},
        	{
        		"targets": [ 14 ],
                "visible": false,
                "searchable": true
        	},
        	{
        		"targets": [ 15 ],
                "visible": false,
                "searchable": true
        	},
        	{
        		"targets": [ 16 ],
                "visible": false,
                "searchable": true
        	},
            {
                "targets": [ 17 ],
                "visible": false,
                "searchable": true
            },
            {
                "targets": [ 18 ],
                "visible": false,
                "searchable": true
            },
            {
                "targets": [ 19 ],
                "visible": false,
                "searchable": true
            },
            {
                "targets": [ 20 ],
                "visible": false,
                "searchable": true
            },
            {
                "targets": [ 21 ],
                "visible": false,
                "searchable": true
            },
            {
                "targets": [ 22 ],
                "visible": false,
                "searchable": true
            },
            {
                "targets": [ 23 ],
                "visible": false,
                "searchable": true
            }
        ]
        
    });

    $('#bootstrap-data-table-export-3').DataTable({
        dom: '<"topbutton"B>flrtip',
        buttons: [
                        {
                            extend: 'excel',
                            text: 'Download',
                            className: 'btn-success btn-download',
                        }
                    ],
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        columnDefs: [
        	{
        		"targets": [ 6 ],
                "visible": false,
                "searchable": true
        	},
        	{
        		"targets": [ 7 ],
                "visible": false,
                "searchable": true
        	},
        	{
        		"targets": [ 8 ],
                "visible": false,
                "searchable": true
        	},
        	{
        		"targets": [ 9 ],
                "visible": false,
                "searchable": true
        	},
        	{
        		"targets": [ 10 ],
                "visible": false,
                "searchable": true
        	},
            {
                "targets": [ 11 ],
                "visible": false,
                "searchable": true
            },
            {
                "targets": [ 12 ],
                "visible": false,
                "searchable": true
            },
            {
                "targets": [ 13 ],
                "visible": false,
                "searchable": true
            },
            {
                "targets": [ 14 ],
                "visible": false,
                "searchable": true
            },
            {
                "targets": [ 15 ],
                "visible": false,
                "searchable": true
            }

        ]
        
    });

    
	
	$('#row-select').DataTable( {
			initComplete: function () {
				this.api().columns().every( function () {
					var column = this;
					var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
							);
	 
							column
								.search( val ? '^'+val+'$' : '', true, false )
								.draw();
						} );
	 
					column.data().unique().sort().each( function ( d, j ) {
						select.append( '<option value="'+d+'">'+d+'</option>' )
					} );
				} );
			}
		} );





})(jQuery);