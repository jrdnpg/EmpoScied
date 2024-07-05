var table_room = $('.table_room').DataTable({
	"fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
		if (aData[0] == "Room 310") {
			$('td', nRow).css('background-color', );
		}
	},
	"ajax": {
		"url": "../class/display/display",
		"type": "POST",
		"data": {
			"key": "display_room"
		}
	},
	"columns": [{
			"data": [0],
			"className": "text-center"
		},
		{
			"data": [1],
			"className": "text-center"
		},
		{
			"data": [2],
			"className": "text-center",
			"visible": false
		}
	],
	dom: "Bfrtip",
	buttons: [{
			extend: "copy",
			className: "btn-sm btn-success",
			exportOptions: {
				columns: [0]
			}
		},
		{
			extend: "csv",
			className: "btn-sm btn-success",
			exportOptions: {
				columns: [0]
			}
		},
		{
			extend: "excel",
			className: "btn-sm btn-success",
			exportOptions: {
				columns: [0]
			}
		},
		{
			extend: "pdfHtml5",
			className: "btn-sm btn-success",
			exportOptions: {
				columns: [0]
			},
		},
		{
			extend: "print",
			className: "btn-sm btn-success",
			exportOptions: {
				columns: [0]
			},
			message: '<img src="https://batstate-u.edu.ph/wp-content/uploads/2022/05/cropped-BatStateU-NEU-Logo.png" height="110px" width="119px" style="position: absolute; top: 0px; left: 30px;">\
						<center>\
						  <strong><p style="margin-top: -67px; margin-bottom: -5px; font-size: 17px; font-family: Times New Roman;">Republic of the Philippines</p></strong>\
						  <strong><p style="margin-bottom: -5px; font-size: 22px; font-family: Times New Roman; letter-spacing: 0.8px;">BATANGAS STATE UNIVERSITY</p></strong>\
						  <h4 style="margin: 0; font-size: 18px; color: red; font-family: Times New Roman;">The National Engineering University</h4>\
						  <strong><p style="margin-top: -5px; font-size: 17px; font-family: Times New Roman;">ARASOF-Nasugbu Campus</p>\
						  <strong><p style="margin-top: -15px; font-size: 13.28px; font-family: Times New Roman;">R. Martinez St., Brgy.Bucana, Nasugbu, Batangas, Philippines 4231</p></strong>\
						  <h5 style="margin-top: -10px; font-family: Times New Roman;">Telephone No. +63 416 0350 local 228</h5>\
						  <h5 style="margin-top: -12px; margin-bottom: -2px; font-family: Times New Roman;">E-mail Address: scilab.nasugbu@gmail.com | Website Address: http//www.batstate-u.edu.ph</h5>\
						  <hr style="margin-top: 3px; padding-bottom: 10px; border-width: 2.5px; border-color: black;">\
						</center>',
			customize: function(win) {
				$(win.document.body).find('table').append('<br<br/><br><br><br><h4 class="" style="font-family: Times New Roman;">Noted by:</h4><br><br><br><br><br><h4 class="" style="font-family: Times New Roman;">Prepared by:</h4>');
			}
		}
	]
});

var table_glass =  $('.display_equipment_glass').DataTable({
	"ajax":
		{
			"url": "../class/display/display",
			"type": "POST",
			"data": {
				"key": "display_equipment_glass"
			}
		},
		"columns": 
		[
			{
				"data": [0],
				"className": "text-left"
			},
			{
				"data": [1],
				"className": "text-left"
			},
			{
				"data": [2],
				"className": "text-left"
			},
			{
				"data": [3],
				"className": "text-left"
			},
			{
				"data": [4],
				"visible":false,
				"className": "text-left"
			},
			{
				"data": [5],
				"className": "text-left"
			},
			{
				"data": [6],
				"className": "text-left"
			},
			{
				"data": [7],
				"className": "text-left"
			}
		
			
			
		],
		dom: "Bfrtip",
		buttons: [
			{
				extend: "copy",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3,4,5,6]
				}
			},
			{
				extend: "csv",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3,4,5,6]
				}
			},
			{
				extend: "excel",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3,4,5,6]
				}
			},
			{
				extend: "pdfHtml5",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3,4,5,6]
				}
			},
			{
				extend: "print",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3,4,5,6]
				},
				message: '<img src="https://batstate-u.edu.ph/wp-content/uploads/2022/05/cropped-BatStateU-NEU-Logo.png" height="110px" width="119px" style="position: absolute; top: 0px; left: 30px;">\
						<center>\
						  <strong><p style="margin-top: -67px; margin-bottom: -5px; font-size: 17px; font-family: Times New Roman;">Republic of the Philippines</p></strong>\
						  <strong><p style="margin-bottom: -5px; font-size: 22px; font-family: Times New Roman; letter-spacing: 0.8px;">BATANGAS STATE UNIVERSITY</p></strong>\
						  <h4 style="margin: 0; font-size: 18px; color: red; font-family: Times New Roman;">The National Engineering University</h4>\
						  <strong><p style="margin-top: -5px; font-size: 17px; font-family: Times New Roman;">ARASOF-Nasugbu Campus</p>\
						  <strong><p style="margin-top: -15px; font-size: 13.28px; font-family: Times New Roman;">R. Martinez St., Brgy.Bucana, Nasugbu, Batangas, Philippines 4231</p></strong>\
						  <h5 style="margin-top: -10px; font-family: Times New Roman;">Telephone No. +63 416 0350 local 228</h5>\
						  <h5 style="margin-top: -12px; margin-bottom: -2px; font-family: Times New Roman;">E-mail Address: scilab.nasugbu@gmail.com | Website Address: http//www.batstate-u.edu.ph</h5>\
						  <hr style="margin-top: 3px; padding-bottom: 10px; border-width: 2.5px; border-color: black;">\
						</center>',
				customize: function ( win ) { 
					$(win.document.body).find( 'table' ).append('<br<br/><br><br><br><h4 class="">Noted by:</h4><br><br><br><br><br><h4 class="">Prepared by:</h4>');
				}
			}
		]
});	

var table_member =  $('.table_member').DataTable({
	"ajax":
		{
			"url": "../class/display/display",
			"type": "POST",
			"data": {
				"key": "display_member"
			}
		},
		"columns": 
		[
			{
				"data": [0],
				"className": "text-center"
			},
			{
				"data": [1],
				"className": "text-center"
			},
			{
				"data": [2],
				"className": "text-center",
				"visible": false
			},
			{
				"data": [3],
				"className": "text-center",
				"visible": false
			},
			{
				"data": [4],
				"className": "text-center"
			},
			{
				"data": [6],
				"className": "text-center"
			},
			{
				"data": [5],
				"className": "text-center"
			},
			{
				"data": [7],
				"className": "text-center"
			},
			{
				"data": [2],
				"className": "text-center",
				"visible": false 
			},
			{
				"data": [8],
				"className": "text-center",
				"visible": false 
			},
			{
				"data": [9],
				"className": "text-center",
				"visible": false 
			},
			{
				"data": [10],
				"className": "text-center",
				"visible": false 
			}
		],
		dom: "Bfrtip",
		buttons: [
			{
				extend: "copy",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3,4,5,6]
				}
			},
			{
				extend: "csv",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3,4,5,6]
				}
			},
			{
				extend: "excel",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3,4,5,6]
				}
			},
			{
				extend: "pdfHtml5",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3,4,5,6]
				}
			},
			{
				extend: "print",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3,4,5,6]
				},
				message: '<img src="https://batstate-u.edu.ph/wp-content/uploads/2022/05/cropped-BatStateU-NEU-Logo.png" height="110px" width="119px" style="position: absolute; top: 0px; left: 30px;">\
						<center>\
						  <strong><p style="margin-top: -67px; margin-bottom: -5px; font-size: 17px; font-family: Times New Roman;">Republic of the Philippines</p></strong>\
						  <strong><p style="margin-bottom: -5px; font-size: 22px; font-family: Times New Roman; letter-spacing: 0.8px;">BATANGAS STATE UNIVERSITY</p></strong>\
						  <h4 style="margin: 0; font-size: 18px; color: red; font-family: Times New Roman;">The National Engineering University</h4>\
						  <strong><p style="margin-top: -5px; font-size: 17px; font-family: Times New Roman;">ARASOF-Nasugbu Campus</p>\
						  <strong><p style="margin-top: -15px; font-size: 13.28px; font-family: Times New Roman;">R. Martinez St., Brgy.Bucana, Nasugbu, Batangas, Philippines 4231</p></strong>\
						  <h5 style="margin-top: -10px; font-family: Times New Roman;">Telephone No. +63 416 0350 local 228</h5>\
						  <h5 style="margin-top: -12px; margin-bottom: -2px; font-family: Times New Roman;">E-mail Address: scilab.nasugbu@gmail.com | Website Address: http//www.batstate-u.edu.ph</h5>\
						  <hr style="margin-top: 3px; padding-bottom: 10px; border-width: 2.5px; border-color: black;">\
						</center>',
				customize: function ( win ) { 
					$(win.document.body).find( 'table' ).append('<br<br/><br><br><br><h4 class="">Noted by:</h4><br><br><br><br><br><h4 class="">Prepared by:</h4>');
				}
			}
		]
});	
var table_user =  $('.table_user').DataTable({
		"ajax":
		{
			"url": "../class/display/display",
			"type": "POST",
			"data": {
				"key": "display_user"
			}
		},
		"columns": 
		[
			{
				"data": [0],
				"className": "text-center"
			},
			{
				"data": [1],
				"className": "text-center"
			},
			{
				"data": [2],
				"className": "text-center"
			},
			{
				"data": [3],
				"className": "text-center"
			},
			{
				"data": [4],
				"className": "text-center",
				"visible": false
			},
			{
				"data": [5],
				"className": "text-center",
				"visible": false
			}
		],
		dom: "Bfrtip",
		buttons: [
			{
				extend: "copy",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2]
				}
			},
			{
				extend: "csv",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2]
				}
			},
			{
				extend: "excel",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2]
				}
			},
			{
				extend: "pdfHtml5",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2]
				}
			},
			{
				extend: "print",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2]
				},
				message: '<img src="https://batstate-u.edu.ph/wp-content/uploads/2022/05/cropped-BatStateU-NEU-Logo.png" height="110px" width="119px" style="position: absolute; top: 0px; left: 30px;">\
						<center>\
						  <strong><p style="margin-top: -67px; margin-bottom: -5px; font-size: 17px; font-family: Times New Roman;">Republic of the Philippines</p></strong>\
						  <strong><p style="margin-bottom: -5px; font-size: 22px; font-family: Times New Roman; letter-spacing: 0.8px;">BATANGAS STATE UNIVERSITY</p></strong>\
						  <h4 style="margin: 0; font-size: 18px; color: red; font-family: Times New Roman;">The National Engineering University</h4>\
						  <strong><p style="margin-top: -5px; font-size: 17px; font-family: Times New Roman;">ARASOF-Nasugbu Campus</p>\
						  <strong><p style="margin-top: -15px; font-size: 13.28px; font-family: Times New Roman;">R. Martinez St., Brgy.Bucana, Nasugbu, Batangas, Philippines 4231</p></strong>\
						  <h5 style="margin-top: -10px; font-family: Times New Roman;">Telephone No. +63 416 0350 local 228</h5>\
						  <h5 style="margin-top: -12px; margin-bottom: -2px; font-family: Times New Roman;">E-mail Address: scilab.nasugbu@gmail.com | Website Address: http//www.batstate-u.edu.ph</h5>\
						  <hr style="margin-top: 3px; padding-bottom: 10px; border-width: 2.5px; border-color: black;">\
						</center>',
				customize: function ( win ) {
					$(win.document.body).find( 'table' ).append('<br<br/><br><br><br><h4 class="">Noted by:</h4><br><br><br><br><br><h4 class="">Prepared by:</h4>');
				}
			}
		]
});	

var table_equipment = $('.table_equipment').DataTable({
	"ajax":
		{
			"url": "../class/display/display",
			"type": "POST",
			"data": {
				"key": "display_equipment"
			}
		},
		"columns": 
		[
			{
				"data": [0],
				"className": "text-left"
			},
			{
				"data": [1],
				"className": "text-left"
			},
			{
				"data": [2],
				"className": "text-left"
			},
			{
				"data": [8],
				"className": "text-left"
			},
			{
				"data": [3],
				"visible":false,
				"className": "text-left"
			},
			{
				"data": [4],
				"className": "text-left"
			},
			{
				"data": [5],
				"className": "text-left"
			},
			{
				"data": [6],
				"className": "text-left"
			},
			{
				"data": [7],
				"className": "text-left"
			}


		],
		dom: "Bfrtip",
		buttons: [
			{
				extend: "copy",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3]
				}
			},
			{
				extend: "csv",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3]
				}
			},
			{
				extend: "excel",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3]
				}
			},
			{
				extend: "pdfHtml5",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3]
				}
			},
			{
				extend: "print",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3,4,5,6]
				},
				message: '<img src="https://batstate-u.edu.ph/wp-content/uploads/2022/05/cropped-BatStateU-NEU-Logo.png" height="110px" width="119px" style="position: absolute; top: 0px; left: 30px;">\
						<center>\
						  <strong><p style="margin-top: -67px; margin-bottom: -5px; font-size: 17px; font-family: Times New Roman;">Republic of the Philippines</p></strong>\
						  <strong><p style="margin-bottom: -5px; font-size: 22px; font-family: Times New Roman; letter-spacing: 0.8px;">BATANGAS STATE UNIVERSITY</p></strong>\
						  <h4 style="margin: 0; font-size: 18px; color: red; font-family: Times New Roman;">The National Engineering University</h4>\
						  <strong><p style="margin-top: -5px; font-size: 17px; font-family: Times New Roman;">ARASOF-Nasugbu Campus</p>\
						  <strong><p style="margin-top: -15px; font-size: 13.28px; font-family: Times New Roman;">R. Martinez St., Brgy.Bucana, Nasugbu, Batangas, Philippines 4231</p></strong>\
						  <h5 style="margin-top: -10px; font-family: Times New Roman;">Telephone No. +63 416 0350 local 228</h5>\
						  <h5 style="margin-top: -12px; margin-bottom: -2px; font-family: Times New Roman;">E-mail Address: scilab.nasugbu@gmail.com | Website Address: http//www.batstate-u.edu.ph</h5>\
						  <hr style="margin-top: 3px; padding-bottom: 10px; border-width: 2.5px; border-color: black;">\
						</center>',
				customize: function ( win ) {
					$(win.document.body).find( 'table' ).append('<br<br/><br><br><br><h4 class="">Noted by:</h4><br><br><br><br><br><h4 class="">Prepared by:</h4>');
				}
			}
		]
});



var table_inventory_new = $('.table_inventory_new').DataTable({
		"ajax":
		{
			"url": "../class/display/display",
			"type": "POST",
			"data": {
				"key": "display_equipment_new"
			}
		},
		"columns": 
		[
			{
				"data": [0],
				"className": "text-center"
			},
			{
				"data": [1],
				"className": "text-center"
			},
			{
				"data": [2],
				"className": "text-center"
			},
			{
				"data": [3],
				"className": "text-center"
			},
			{
				"data": [4],
				"className": "text-center"
			}
		],
		dom: "Bfrtip",
		buttons: [
			{
				extend: "copy",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3,4]
				}
			},
			{
				extend: "csv",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3,4]
				}
			},
			{
				extend: "excel",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3,4]
				}
			},
			{
				extend: "pdfHtml5",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3,4]
				}
			},
			{
				extend: "print",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3,4]
				},
				message: '<img src="https://batstate-u.edu.ph/wp-content/uploads/2022/05/cropped-BatStateU-NEU-Logo.png" height="110px" width="119px" style="position: absolute; top: 0px; left: 30px;">\
						<center>\
						  <strong><p style="margin-top: -67px; margin-bottom: -5px; font-size: 17px; font-family: Times New Roman;">Republic of the Philippines</p></strong>\
						  <strong><p style="margin-bottom: -5px; font-size: 22px; font-family: Times New Roman; letter-spacing: 0.8px;">BATANGAS STATE UNIVERSITY</p></strong>\
						  <h4 style="margin: 0; font-size: 18px; color: red; font-family: Times New Roman;">The National Engineering University</h4>\
						  <strong><p style="margin-top: -5px; font-size: 17px; font-family: Times New Roman;">ARASOF-Nasugbu Campus</p>\
						  <strong><p style="margin-top: -15px; font-size: 13.28px; font-family: Times New Roman;">R. Martinez St., Brgy.Bucana, Nasugbu, Batangas, Philippines 4231</p></strong>\
						  <h5 style="margin-top: -10px; font-family: Times New Roman;">Telephone No. +63 416 0350 local 228</h5>\
						  <h5 style="margin-top: -12px; margin-bottom: -2px; font-family: Times New Roman;">E-mail Address: scilab.nasugbu@gmail.com | Website Address: http//www.batstate-u.edu.ph</h5>\
						  <hr style="margin-top: 3px; padding-bottom: 10px; border-width: 2.5px; border-color: black;">\
						</center>',
				customize: function ( win ) {
					$(win.document.body).find( 'table' ).append('<br<br/><br><br><br><h4 class="">Noted by:</h4><br><br><br><br><br><h4 class="">Prepared by:</h4>');
				}
			}
		]
});

var table_inventory_old = $('.table_inventory_old').DataTable({
		"ajax":
		{
			"url": "../class/display/display",
			"type": "POST",
			"data": {
				"key": "display_equipment_old"
			}
		},
		"columns": 
		[
			{
				"data": [0],
				"className": "text-center"
			},
			{
				"data": [1],
				"className": "text-center"
			},
			{
				"data": [2],
				"className": "text-center"
			},
			{
				"data": [3],
				"className": "text-center"
			},
			{
				"data": [4],
				"className": "text-center"
			}
		],
		dom: "Bfrtip",
		buttons: [
			{
				extend: "copy",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3,4]
				}
			},
			{
				extend: "csv",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3,4]
				}
			},
			{
				extend: "excel",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3,4]
				}
			},
			{
				extend: "pdfHtml5",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3,4]
				}
			},
			{
				extend: "print",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3,4]
				},
				message: '<img src="https://batstate-u.edu.ph/wp-content/uploads/2022/05/cropped-BatStateU-NEU-Logo.png" height="110px" width="119px" style="position: absolute; top: 0px; left: 30px;">\
						<center>\
						  <strong><p style="margin-top: -67px; margin-bottom: -5px; font-size: 17px; font-family: Times New Roman;">Republic of the Philippines</p></strong>\
						  <strong><p style="margin-bottom: -5px; font-size: 22px; font-family: Times New Roman; letter-spacing: 0.8px;">BATANGAS STATE UNIVERSITY</p></strong>\
						  <h4 style="margin: 0; font-size: 18px; color: red; font-family: Times New Roman;">The National Engineering University</h4>\
						  <strong><p style="margin-top: -5px; font-size: 17px; font-family: Times New Roman;">ARASOF-Nasugbu Campus</p>\
						  <strong><p style="margin-top: -15px; font-size: 13.28px; font-family: Times New Roman;">R. Martinez St., Brgy.Bucana, Nasugbu, Batangas, Philippines 4231</p></strong>\
						  <h5 style="margin-top: -10px; font-family: Times New Roman;">Telephone No. +63 416 0350 local 228</h5>\
						  <h5 style="margin-top: -12px; margin-bottom: -2px; font-family: Times New Roman;">E-mail Address: scilab.nasugbu@gmail.com | Website Address: http//www.batstate-u.edu.ph</h5>\
						  <hr style="margin-top: 3px; padding-bottom: 10px; border-width: 2.5px; border-color: black;">\
						</center>',
				customize: function ( win ) {
					$(win.document.body).find( 'table' ).append('<br<br/><br><br><br><h4 class="">Noted by:</h4><br><br><br><br><br><h4 class="">Prepared by:</h4>');
				}
			}
		]
});



var table_inventory_old = $('.table_inventory_notiff').DataTable({
    "ajax": {
        "url": "../class/display/display",
        "type": "POST",
        "data": {
            "key": "display_equipment_notiff"
        }
    },
    "columns": [
        {
            "data": [0],
            "className": "text-center"
        },
        {
            "data": [1],
            "className": "text-center"
        },
        {
            "data": [2],
            "className": "text-center"
        },
        {
            "data": [3],
            "className": "text-center"
        },
        {
            "data": [4],
            "className": "text-center"
        }
    ],
    dom: "Bfrtip",
    buttons: [
        {
            extend: "copy",
            className: "btn-sm btn-success",
            exportOptions: {
                columns: [0, 1, 2, 3, 4]
            }
        },
        {
            extend: "csv",
            className: "btn-sm btn-success",
            exportOptions: {
                columns: [0, 1, 2, 3, 4]
            }
        },
        {
            extend: "excel",
            className: "btn-sm btn-success",
            exportOptions: {
                columns: [0, 1, 2, 3, 4]
            }
        },
        {
            extend: "pdfHtml5",
            className: "btn-sm btn-success",
            exportOptions: {
                columns: [0, 1, 2, 3, 4]
            }
        },
        {
            extend: "print",
            className: "btn-sm btn-success",
            exportOptions: {
                columns: [0, 1, 2, 3, 4]
            },
            message: '<img src="https://batstate-u.edu.ph/wp-content/uploads/2022/05/cropped-BatStateU-NEU-Logo.png" height="110px" width="119px" style="position: absolute; top: 0px; left: 30px;">\
                    <center>\
                      <strong><p style="margin-top: -67px; margin-bottom: -5px; font-size: 17px; font-family: Times New Roman;">Republic of the Philippines</p></strong>\
                      <strong><p style="margin-bottom: -5px; font-size: 22px; font-family: Times New Roman; letter-spacing: 0.8px;">BATANGAS STATE UNIVERSITY</p></strong>\
                      <h4 style="margin: 0; font-size: 18px; color: red; font-family: Times New Roman;">The National Engineering University</h4>\
                      <strong><p style="margin-top: -5px; font-size: 17px; font-family: Times New Roman;">ARASOF-Nasugbu Campus</p>\
                      <strong><p style="margin-top: -15px; font-size: 13.28px; font-family: Times New Roman;">R. Martinez St., Brgy.Bucana, Nasugbu, Batangas, Philippines 4231</p></strong>\
                      <h5 style="margin-top: -10px; font-family: Times New Roman;">Telephone No. +63 416 0350 local 228</h5>\
                      <h5 style="margin-top: -12px; margin-bottom: -2px; font-family: Times New Roman;">E-mail Address: scilab.nasugbu@gmail.com | Website Address: http//www.batstate-u.edu.ph</h5>\
                      <hr style="margin-top: 3px; padding-bottom: 10px; border-width: 2.5px; border-color: black;">\
                    </center>',
            customize: function (win) {
                $(win.document.body).find('table').append('<br<br/><br><br><br><h4 class="">Noted by:</h4><br><br><br><br><br><h4 class="">Prepared by:</h4>');
            }
        }
    ]
});





var currentDate = new Date();
var formattedDate = currentDate.toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });
var table_inventory_old = $('.table_inventory_exp').DataTable({

    "ajax": {
        "url": "../class/display/display",
        "type": "POST",
        "data": {
            "key": "display_inventory_expired"
        }
    },
    "columns": [
        {
            "data": "0",
            "className": "text-center"
        },
        {
            "data": "1",
            "className": "text-center"
        },
        {
            "data": "2",
            "className": "text-center"
        },
        {
            "data": "3",
            "className": "text-center"
        },
        {
            "data": "4",
            "className": "text-center"
        },
        {
            "data": "5",
            "className": "text-center"
        },
        {
            "data": "6",
            "className": "text-center"
        }
    ],
    dom: "Bfrtip",
    buttons: [
        {
            extend: "copy",
            className: "btn-sm btn-success",
            exportOptions: {
                columns: [1, 2, 3, 4]
            }
        },
        {
            extend: "csv",
            className: "btn-sm btn-success",
            exportOptions: {
                columns: [1, 2, 3, 4]
            }
        },
        {
            extend: "excel",
            className: "btn-sm btn-success",
            exportOptions: {
                columns: [1, 2, 3, 4]
            }
        },
        {
            extend: "pdfHtml5",
            className: "btn-sm btn-success",
            exportOptions: {
                columns: [1, 2, 3, 4]
            }
        },
        {
            extend: "print",
            className: "btn-sm btn-success",
            exportOptions: {
                columns: [1, 2, 3, 5]
            },
            message: '<img src="https://batstate-u.edu.ph/wp-content/uploads/2022/05/cropped-BatStateU-NEU-Logo.png" height="110px" width="119px" style="position: absolute; top: 0px; left: 30px;">\
            		<center>\
                      <strong><p style="margin-top: -67px; margin-bottom: -5px; font-size: 17px; font-family: Times New Roman;">Republic of the Philippines</p></strong>\
                      <strong><p style="margin-bottom: -5px; font-size: 22px; font-family: Times New Roman; letter-spacing: 0.8px;">BATANGAS STATE UNIVERSITY</p></strong>\
                      <h4 style="margin: 0; font-size: 18px; color: red; font-family: Times New Roman;">The National Engineering University</h4>\
                      <strong><p style="margin-top: -5px; font-size: 17px; font-family: Times New Roman;">ARASOF-Nasugbu Campus</p></strong>\
                      <strong><p style="margin-top: -15px; font-size: 13.28px; font-family: Times New Roman;">R. Martinez St., Brgy.Bucana, Nasugbu, Batangas, Philippines 4231</p></strong>\
                      <h5 style="margin-top: -10px; font-family: Times New Roman;">Telephone No. +63 416 0350 local 228</h5>\
                      <h5 style="margin-top: -12px; margin-bottom: -2px; font-family: Times New Roman;">E-mail Address: scilab.nasugbu@gmail.com | Website Address: http//www.batstate-u.edu.ph</h5>\
                      <hr style="margin-top: 3px; padding-bottom: 10px; border-width: 2.5px; border-color: black;">\
                    </center><br><br>\
                        <body>\
                        <strong><p style="margin-top: -67px; margin-bottom: 6px; font-size: 16px; margin-left: 96px; font-family: Times New Roman;">Science Laboratories</p></strong>\
                          <p style="margin-bottom: 6px; font-size: 16px; margin-left: 96px; font-family: Times New Roman; letter-spacing: 0px;">' + formattedDate + '</p>\
                          <strong><p style="margin: 0; font-size: 16px; color: ; margin-left: 96px; font-family: Times New Roman;">Mr. JUVENAL R. ORIONDO</p></strong>\
                          <p style="font-size: 16px; margin-left: 96px; font-family: Times New Roman;">Head, Environmental Management Unit</p>\
                          <p style="font-size: 16px; margin-left: 96px; font-family: Times New Roman;">This Campus: </p>\
                          <p style="margin-bottom: 6px; font-size: 16px; margin-left: 96px; font-family: Times New Roman;">Dear Sir:</p>\
                          <p style="margin-bottom: 6px; font-size: 16px; margin-left: 96px; font-family: Times New Roman;">Greetings of peace and prosperity!</p>\
                          <p style="margin-bottom: 6px; font-size: 16px; margin-left: 96px; margin-right: 96px; font-family: Times New Roman;">This is to respectfully endorse to your good office the list of expired chemicals for disposal with details below: </p>\
                          <p style="margin-left: 96px; font-size: 16px; position: absolute; bottom: 150px; left: 0px; font-family: Times New Roman;">Noted: </p>\
                          <strong><p style="margin-left: 96px; font-size: 16px; position: absolute; bottom: 130px; left: 0px; font-family: Times New Roman;">Dr. LORISSA JOANA E. BUENAS</p></strong>\
                          <p style="margin-left: 96px; font-size: 16px; position: absolute; bottom: 185px; left: 0px; font-family: Times New Roman;">OIC-Coordinator, Science Laboratories</p>\
                          <p style="margin-left: 96px; font-size: 16px; position: absolute; bottom: 110px; left: 0px; font-family: Times New Roman;">Vice Chancellor for Academic Affairs</p>\
                          <strong><p style="margin-left: 96px; font-size: 16px; position: absolute; bottom: 205px; left: 0px; font-family: Times New Roman;">Mr. MARVIN E. ROSEL</p></strong>\
                          <p style="margin-left: 96px; font-size: 16px; position: absolute; bottom: 265px; left: 0px; font-family: Times New Roman;">Respectfully yours,</p>\
                          <p style="margin-left: 96px; font-size: 16px; position: absolute; bottom: 300px; left: 0px; font-family: Times New Roman;">Thank you very much. More power and God bless.</p>\
                          <p style="margin-left: 96px; margin-right: 96px; font-size: 16px; position: absolute; bottom: 335px; left: 0px; font-family: Times New Roman;">Should there be any concerns or inquiries, please feel free to contact the undersigned via email at scilab.nasugbu@gmail.com or thru telephone number (+63) 43 416 0350 local 228.</p>\
                        </body>',

            customize: function (win) {
                var $table = $(win.document.body).find('table');
                $table.css('font-size', '16px');
                $table.css('font-family', 'Times New Roman');
                $table.css({
                    'padding-top': '0',
                    'padding-bottom': '0',
                    'margin-top': '0',
                    'margin-bottom': '0'
                });

                $table.find('td, th').css({
                    'padding': '0',
                    'margin': '0'
                });

                var maxWidth = 165;
                $table.css('max-width', maxWidth + 'mm');
                $table.css('margin', '0 auto');

                // $(win.document.body).find('table').append('<img src="images/bsufooter.png" style="position: absolute; bottom: 0px; left: 0px;">');
            }
        }
    ]
});



// Initialize DataTables with stored selected rows
initializeDataTable('.table_inventory_lost', 'display_equipment_lost', 'selectedRows');
initializeDataTable('.table_inventory_damaged', 'display_equipment_damaged', 'selectedRowsDamaged');

function initializeDataTable(selector, key, storageKey) {
    (function($, selector, key, storageKey) {
        var storedRows = localStorage.getItem(storageKey);
        var selectedRows = storedRows ? JSON.parse(storedRows) : [];

        var dataTable = $(selector).DataTable({
            "ajax": {
                "url": "../class/display/display",
                "type": "POST",
                "data": {
                    "key": key
                }
            },
            "columns": [
                {"data": [0], "className": "text-center gray-background"},
                {"data": [1], "className": "text-center gray-background"},
                {"data": [2], "className": "text-center gray-background"},
                {"data": [3], "className": "text-center gray-background"},
                {"data": [4], "className": "text-center gray-background"}
            ],
            "rowCallback": function(row, data, index) {
                // Add the "gray-background" class to each row
                $(row).addClass('gray-background');

                var isSelected = selectedRows.includes(index);
                if (isSelected) {
                    $(row).addClass('selected');
                }

                $(row).on('click', function() {
                    toggleSelected($(this), storageKey);
                });
            },
            "dom": "Bfrtip",
            buttons: [
                {
                    extend: "copy",
                    className: "btn-sm btn-success",
                    exportOptions:{
                        columns: [0,1,2,3,4]
                    }
                },
                {
                    extend: "csv",
                    className: "btn-sm btn-success",
                    exportOptions:{
                        columns: [0,1,2,3,4]
                    }
                },
                {
                    extend: "excel",
                    className: "btn-sm btn-success",
                    exportOptions:{
                        columns: [0,1,2,3,4]
                    }
                },
                {
                    extend: "pdfHtml5",
                    className: "btn-sm btn-success",
                    exportOptions:{
                        columns: [0,1,2,3,4]
                    }
                },
                {
                    extend: "print",
                    className: "btn-sm btn-success",
                    exportOptions:{
                        columns: [0,1,2,3,4]
                    },
                    message: '<img src="https://batstate-u.edu.ph/wp-content/uploads/2022/05/cropped-BatStateU-NEU-Logo.png" height="110px" width="119px" style="position: absolute; top: 0px; left: 30px;">\
                            <center>\
                              <strong><p style="margin-top: -67px; margin-bottom: -5px; font-size: 17px; font-family: Times New Roman;">Republic of the Philippines</p></strong>\
                              <strong><p style="margin-bottom: -5px; font-size: 22px; font-family: Times New Roman; letter-spacing: 0.8px;">BATANGAS STATE UNIVERSITY</p></strong>\
                              <h4 style="margin: 0; font-size: 18px; color: red; font-family: Times New Roman;">The National Engineering University</h4>\
                              <strong><p style="margin-top: -5px; font-size: 17px; font-family: Times New Roman;">ARASOF-Nasugbu Campus</p>\
                              <strong><p style="margin-top: -15px; font-size: 13.28px; font-family: Times New Roman;">R. Martinez St., Brgy.Bucana, Nasugbu, Batangas, Philippines 4231</p></strong>\
                              <h5 style="margin-top: -10px; font-family: Times New Roman;">Telephone No. +63 416 0350 local 228</h5>\
                              <h5 style="margin-top: -12px; margin-bottom: -2px; font-family: Times New Roman;">E-mail Address: scilab.nasugbu@gmail.com | Website Address: http//www.batstate-u.edu.ph</h5>\
                              <hr style="margin-top: 3px; padding-bottom: 10px; border-width: 2.5px; border-color: black;">\
                            </center>',
                    customize: function ( win ) {
                        $(win.document.body).find( 'table' ).append('<br<br/><br><br><br><h4 class="">Noted by:</h4><br><br><br><br><br><h4 class="">Prepared by:</h4>');
                    }
                }
            ]
        });

        function toggleSelected(element, storageKey) {
            if (element.hasClass('selected')) {
                var confirmed = confirm("Do you want to tag this student?");
                if (confirmed) {
                    element.removeClass('selected');
                    updateStoredRows(element.closest('table'), storageKey);
                }
            } else {
                var confirmed = confirm("Do you want to untag this student?");
                if (confirmed) {
                    element.addClass('selected');
                    updateStoredRows(element.closest('table'), storageKey);
                }
            }
        }

        function updateStoredRows(table, storageKey) {
            var selectedRows = [];

            table.find('tbody tr.selected').each(function() {
                var index = $(this).index();
                selectedRows.push(index);
            });

            localStorage.setItem(storageKey, JSON.stringify(selectedRows));
        }
    })(jQuery, selector, key, storageKey);
}





var table_inventory_pulled = $('.table_inventory_pulled').DataTable({
	"ajax":
		{
			"url": "../class/display/display",
			"type": "POST",
			"data": {
				"key": "display_equipment_equip"
			}
		},
		"columns": 
		[
			{
				"data": [0],
				"className": "text-center"
			},
			{
				"data": [1],
				"className": "text-center"
			},
			{
				"data": [2],
				"className": "text-center"
			},
			{
				"data": [3],
				"className": "text-center"
			},
			{
				"data": [4],
				"className": "text-center"
			},
			{
				"data": [5],
				"className": "text-center"
			},
			{
				"data": [6],
				"className": "text-center"
			},
			{
				"data": [7],
				"className": "text-center"
			}
		],
		dom: "Bfrtip",
		buttons: [
			{
				extend: "copy",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [1,2,3,4]
				}
			},
			{
				extend: "csv",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [1,2,3,4]
				}
			},
			{
				extend: "excel",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3,4]
				}
			},
			{
				extend: "pdfHtml5",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [1,2,3,4]
				}
			},
			{
				extend: "print",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [1,2,3,4]
				},
				message: '<img src="https://batstate-u.edu.ph/wp-content/uploads/2022/05/cropped-BatStateU-NEU-Logo.png" height="110px" width="119px" style="position: absolute; top: 0px; left: 30px;">\
						<center>\
						  <strong><p style="margin-top: -67px; margin-bottom: -5px; font-size: 17px; font-family: Times New Roman;">Republic of the Philippines</p></strong>\
						  <strong><p style="margin-bottom: -5px; font-size: 22px; font-family: Times New Roman; letter-spacing: 0.8px;">BATANGAS STATE UNIVERSITY</p></strong>\
						  <h4 style="margin: 0; font-size: 18px; color: red; font-family: Times New Roman;">The National Engineering University</h4>\
						  <strong><p style="margin-top: -5px; font-size: 17px; font-family: Times New Roman;">ARASOF-Nasugbu Campus</p>\
						  <strong><p style="margin-top: -15px; font-size: 13.28px; font-family: Times New Roman;">R. Martinez St., Brgy.Bucana, Nasugbu, Batangas, Philippines 4231</p></strong>\
						  <h5 style="margin-top: -10px; font-family: Times New Roman;">Telephone No. +63 416 0350 local 228</h5>\
						  <h5 style="margin-top: -12px; margin-bottom: -2px; font-family: Times New Roman;">E-mail Address: scilab.nasugbu@gmail.com | Website Address: http//www.batstate-u.edu.ph</h5>\
						  <hr style="margin-top: 3px; padding-bottom: 10px; border-width: 2.5px; border-color: black;">\
						</center>',
				customize: function ( win ) {
					$(win.document.body).find('table').append('<br<br/><br><br><br><h4 class="">Prepared by:<br><br><strong>Mr. MARVIN E. ROSEL</strong><br><p style="font-size: 16px;">OIC-Coordinator, Science Laboratories</p></h4><br><h4 class="">Noted by:</h4><br><strong>Dr. LORISSA JOANA E. BUENAS</strong><br><p style="font-size: 16px;">Vice Chancellor for Academic Affairs</p><br>');
                var $table = $(win.document.body).find('table');
                $table.css('font-size', '16px');
                $table.css('font-family', 'Times New Roman');
                $table.css({
                    'padding-top': '0',
                    'padding-bottom': '0',
                    'margin-top': '0',
                    'margin-bottom': '0'
                });

                $table.find('td, th').css({
                    'padding': '0',
                    'margin': '0'
                });

                var maxWidth = 195;
                $table.css('max-width', maxWidth + 'mm');
                $table.css('margin', '0 auto');
				}
			}
		]
});



var table_inventory_pulledout = $('.table_inventory_pulledout').DataTable({
	"ajax":
		{
			"url": "../class/display/display",
			"type": "POST",
			"data": {
				"key": "display_equipment_pulled"
			}
		},
		"columns": 
		[
			{
				"data": [0],
				"className": "text-center"
			},
			{
				"data": [1],
				"className": "text-center"
			},
			{
				"data": [2],
				"className": "text-center"
			},
			{
				"data": [3],
				"className": "text-center"
			},
			{
				"data": [4],
				"className": "text-center"
			},
			{
				"data": [5],
				"className": "text-center"
			},
			{
				"data": [6],
				"className": "text-center"
			},
			{
				"data": [7],
				"className": "text-center"
			}
		],
		dom: "Bfrtip",
		buttons: [
			{
				extend: "copy",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [1,2,3,4]
				}
			},
			{
				extend: "csv",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [1,2,3,4]
				}
			},
			{
				extend: "excel",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3,4]
				}
			},
			{
				extend: "pdfHtml5",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [1,2,3,4]
				}
			},
			{
				extend: "print",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [1,2,3,4]
				},
				message: '<img src="https://batstate-u.edu.ph/wp-content/uploads/2022/05/cropped-BatStateU-NEU-Logo.png" height="110px" width="119px" style="position: absolute; top: 0px; left: 30px;">\
						<center>\
						  <strong><p style="margin-top: -67px; margin-bottom: -5px; font-size: 17px; font-family: Times New Roman;">Republic of the Philippines</p></strong>\
						  <strong><p style="margin-bottom: -5px; font-size: 22px; font-family: Times New Roman; letter-spacing: 0.8px;">BATANGAS STATE UNIVERSITY</p></strong>\
						  <h4 style="margin: 0; font-size: 18px; color: red; font-family: Times New Roman;">The National Engineering University</h4>\
						  <strong><p style="margin-top: -5px; font-size: 17px; font-family: Times New Roman;">ARASOF-Nasugbu Campus</p>\
						  <strong><p style="margin-top: -15px; font-size: 13.28px; font-family: Times New Roman;">R. Martinez St., Brgy.Bucana, Nasugbu, Batangas, Philippines 4231</p></strong>\
						  <h5 style="margin-top: -10px; font-family: Times New Roman;">Telephone No. +63 416 0350 local 228</h5>\
						  <h5 style="margin-top: -12px; margin-bottom: -2px; font-family: Times New Roman;">E-mail Address: scilab.nasugbu@gmail.com | Website Address: http//www.batstate-u.edu.ph</h5>\
						  <hr style="margin-top: 3px; padding-bottom: 10px; border-width: 2.5px; border-color: black;">\
						</center>',
				customize: function ( win ) {
					$(win.document.body).find('table').append('<br<br/><br><br><br><h4 class="">Prepared by:<br><br><strong>Mr. MARVIN E. ROSEL</strong><br><p style="font-size: 16px;">OIC-Coordinator, Science Laboratories</p></h4><br><h4 class="">Noted by:</h4><br><strong>Dr. LORISSA JOANA E. BUENAS</strong><br><p style="font-size: 16px;">Vice Chancellor for Academic Affairs</p><br>');
                var $table = $(win.document.body).find('table');
                $table.css('font-size', '16px');
                $table.css('font-family', 'Times New Roman');
                $table.css({
                    'padding-top': '0',
                    'padding-bottom': '0',
                    'margin-top': '0',
                    'margin-bottom': '0'
                });

                $table.find('td, th').css({
                    'padding': '0',
                    'margin': '0'
                });

                var maxWidth = 195;
                $table.css('max-width', maxWidth + 'mm');
                $table.css('margin', '0 auto');
				}
			}
		]
});


	
var table_inventory_all = $('.table_inventory_all').DataTable({
							"ajax":
							{
								"url": "../class/display/display",
								"type": "POST",
								"data": {
									"key": "display_equipment_all"
								}
							},
							"columns": 
							[
								{
									"data": [0],
									"className": "text-center"
								},
								{
									"data": [1],
									"className": "text-center"
								},
								{
									"data": [2],
									"className": "text-center"
								},
								{
									"data": [3],
									"className": "text-center"
								}
							],
							dom: "Bfrtip",
									buttons: [
										{
											extend: "copy",
											className: "btn-sm btn-success",
											exportOptions:{
												columns: [0,1,2,3,4,5,6]
											}
										},
										{
											extend: "csv",
											className: "btn-sm btn-success",
											exportOptions:{
												columns: [0,1,2,3,4,5,6]
											}
										},
										{
											extend: "excel",
											className: "btn-sm btn-success",
											exportOptions:{
												columns: [0,1,2,3,4,5,6]
											}
										},
										{
											extend: "pdfHtml5",
											className: "btn-sm btn-success",
											exportOptions:{
												columns: [0,1,2,3,4,5,6]
											}
										},
										{
											extend: "print",
											className: "btn-sm btn-success",
											exportOptions:{
												columns: [0,1,2,3,4,5,6]
											},
											message: '<center><h4>REPUBLIC OF THE PHILIPPINES</h4>\
														<h5>CARLOS HILADO MEMORIAL STATE COLLEGE</h5>\
														<h6>DEPARTMENT OF INFORMATION SYSTEMS</h6>\
														</center>',
											customize: function ( win ) {
												$(win.document.body).find( 'table' ).append('<br<br/><br><br><br><h4 class="">Noted by:</h4><br><br><br><br><br><h4 class="">Prepared by:</h4>');
											}
										}
									]
});

function room_info(a,b){
	var table_roominfo = $('.table_roominfo').DataTable({
							"ajax":
								{
									"url": "../class/display/display",
									"type": "POST",
									"data": {
										"key": "display_roominfo",
										"id": b,
										"name": a
									}
								},
								"columns": 
								[
									{
										"data": [0],
										"className": "text-center"
									},
									{
										"data": [1],
										"className": "text-center"
									},
									{
										"data": [2],
										"className": "text-center"
									},
									{
										"data": [3],
										"visible":false,
										"className": "text-center"
									},
									{
										"data": [4],
										"className": "text-center"
									},
									{
										"data": [5],
										"visible":false,
										"className": "text-left"
									},
									{
										"data": [6],
										"visible":false,
										"className": "text-center"
									},
									{
										"data": [7],
										"className": "text-center"
									}
								],
								dom: "Bfrtip",
								buttons: [
									{
										extend: "copy",
										className: "btn-sm btn-success",
										exportOptions:{
											columns: [0,1,2,3,4,5,6]
										}
									},
									{
										extend: "csv",
										className: "btn-sm btn-success",
										exportOptions:{
											columns: [0,1,2,3,4,5,6]
										}
									},
									{
										extend: "excel",
										className: "btn-sm btn-success",
										exportOptions:{
											columns: [0,1,2,3,4,5,6]
										}
									},
									{
										extend: "pdfHtml5",
										className: "btn-sm btn-success",
										exportOptions:{
											columns: [0,1,2,3,4,5,6]
										}
									},
									{
										extend: "print",
										className: "btn-sm btn-success",
										exportOptions:{
											columns: [0,1,2,3,4,5,6]
										},
										message: '<center><h4>REPUBLIC OF THE PHILIPPINES</h4>\
													<h5>CARLOS HILADO MEMORIAL STATE COLLEGE</h5>\
													<h6>DEPARTMENT OF INFORMATION SYSTEMS</h6>\
													</center>',
										customize: function ( win ) {
											$(win.document.body).find( 'table' ).append('<br<br/><br><br><br><h4 class="">Noted by:</h4><br><br><br><br><br><h4 class="">Prepared by:</h4>');
										}
									}
								]
						});

	table_roominfo.on('click', '.transfer', function(e){
		e.preventDefault();

		var id = $(this).attr('data-id');
		$(".frm_transfer").find('input[name="id"]').val(id);

		$('.transfer').toggle(effect, options, duration);

		$('.frm_transfer').submit(function(e){
			e.preventDefault();

			var _this = $(this);
	
			$.ajax({
				type: 'POST',
				url: '../class/edit/edit',
				data: _this.serialize()
			})
			.done(function(data){
				console.log(data);
				// if(data == 1){
					$('.transfer').toggle(effect, options, duration);
					table_roominfo.ajax.reload(null,false);
					toastr.success(data);
				// }
			});
		});
	});

	


	table_roominfo.on('click', '.btn_return', function(e){
		e.preventDefault();
		var id = $(this).attr('data-id');
		$('.mymodal').modal('show');
		$('input[name="id"]').val(id);
	});

	$('.frm_returnroom').submit(function(e){
		e.preventDefault();
		var frm_data = $(this).serialize()+'&key=return_transfer';
			$.ajax({
				type: 'POST',
				url: '../class/edit/edit',
				data: frm_data
			})
			.done(function(data){
				console.log(data);
				table_roominfo.ajax.reload(null,false);
				toastr.success(data);
				$('.mymodal').modal('hide');
			})
	});
	
}




var tbl_newtransaction = $('.tbl_newtransaction').DataTable({
		"ajax":
		{
			"url": "../class/display/display",
			"type": "POST",
			"data": {
				"key": "display_newtransaction"
			}
		},
		"columns": 
		[
			{
				"data": [0],
				"className": "text-center"
			},
			{
				"data": [1],
				"className": "text-center"
			},
			{
				"data": [2],
				"className": "text-center"
			},
			{
				"data": [3],
				"className": "text-center"
			},
			{
				"data": [4],
				"className": "text-center"
			},
			{
				"data": [5],
				"className": "text-left"
			}
		]
	});

var tbl_borrow = $('.tbl_borrow').DataTable({
	"ajax":
		{
			"url": "../class/display/display",
			"type": "POST",
			"data": {
				"key": "display_borrow"
			}
		},
		"columns": 
		[
			{
				"data": [0],
				"className": "text-center"
			},
			{
				"data": [1],
				"className": "text-center"
			},
			{
				"data": [2],
				"className": "text-center"
			},
			{
				"data": [4],
				"className": "text-center"
			},
			{
				"data": [3],
				"className": "text-center"
			}
		],
		dom: "Bfrtip",
		buttons: [
			{
				extend: "copy",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3]
				}
			},
			{
				extend: "csv",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3]
				}
			},
			{
				extend: "excel",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3]
				}
			},
			{
				extend: "pdfHtml5",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3]
				}
			},
			{
				extend: "print",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3]
				},
				message: '<img src="https://batstate-u.edu.ph/wp-content/uploads/2022/05/cropped-BatStateU-NEU-Logo.png" height="110px" width="119px" style="position: absolute; top: 0px; left: 30px;">\
						<center>\
						  <strong><p style="margin-top: -67px; margin-bottom: -5px; font-size: 17px; font-family: Times New Roman;">Republic of the Philippines</p></strong>\
						  <strong><p style="margin-bottom: -5px; font-size: 22px; font-family: Times New Roman; letter-spacing: 0.8px;">BATANGAS STATE UNIVERSITY</p></strong>\
						  <h4 style="margin: 0; font-size: 18px; color: red; font-family: Times New Roman;">The National Engineering University</h4>\
						  <strong><p style="margin-top: -5px; font-size: 17px; font-family: Times New Roman;">ARASOF-Nasugbu Campus</p>\
						  <strong><p style="margin-top: -15px; font-size: 13.28px; font-family: Times New Roman;">R. Martinez St., Brgy.Bucana, Nasugbu, Batangas, Philippines 4231</p></strong>\
						  <h5 style="margin-top: -10px; font-family: Times New Roman;">Telephone No. +63 416 0350 local 228</h5>\
						  <h5 style="margin-top: -12px; margin-bottom: -2px; font-family: Times New Roman;">E-mail Address: scilab.nasugbu@gmail.com | Website Address: http//www.batstate-u.edu.ph</h5>\
						  <hr style="margin-top: 3px; padding-bottom: 10px; border-width: 2.5px; border-color: black;">\
						</center>',
				customize: function ( win ) {
					$(win.document.body).find( 'table' ).append('<br<br/><br><br><br><h4 class="">Noted by:</h4><br><br><br><br><br><h4 class="">Prepared by:</h4>');
				}
			}
		]
});

function selectMonthData()
{
	return $("#selectMonth").val();
}

function selectYearData()
{
	return $("#selectYear").val();
}

var tbl_return = $('.tbl_return').DataTable({
	"ajax":
		{
			"url": "../class/display/display",
			"type": "POST",
			"data": function(d){
		        d.key = "display_return";
		        d.month = selectMonthData();
		        d.year = selectYearData();
	      	}
		},
		"columns": 
		[
			{
				"data": [0],
				"className": "text-center"
			},
			{
				"data": [1],
				"className": "text-center"
			},
			{
				"data": [3],
				"className": "text-center"
			},
			{
				"data": [2],
				"className": "text-center"
			}
		],
		dom: "Bfrtip",
		buttons: [
			{
				extend: "copy",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2]
				}
			},
			{
				extend: "csv",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2]
				}
			},
			{
				extend: "excel",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2]
				}
			},
			{
				extend: "pdfHtml5",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2]
				}
			},
			{
				extend: "print",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2]
				},
				message: '<img src="https://batstate-u.edu.ph/wp-content/uploads/2022/05/cropped-BatStateU-NEU-Logo.png" height="110px" width="119px" style="position: absolute; top: 0px; left: 30px;">\
						<center>\
						  <strong><p style="margin-top: -67px; margin-bottom: -5px; font-size: 17px; font-family: Times New Roman;">Republic of the Philippines</p></strong>\
						  <strong><p style="margin-bottom: -5px; font-size: 22px; font-family: Times New Roman; letter-spacing: 0.8px;">BATANGAS STATE UNIVERSITY</p></strong>\
						  <h4 style="margin: 0; font-size: 18px; color: red; font-family: Times New Roman;">The National Engineering University</h4>\
						  <strong><p style="margin-top: -5px; font-size: 17px; font-family: Times New Roman;">ARASOF-Nasugbu Campus</p>\
						  <strong><p style="margin-top: -15px; font-size: 13.28px; font-family: Times New Roman;">R. Martinez St., Brgy.Bucana, Nasugbu, Batangas, Philippines 4231</p></strong>\
						  <h5 style="margin-top: -10px; font-family: Times New Roman;">Telephone No. +63 416 0350 local 228</h5>\
						  <h5 style="margin-top: -12px; margin-bottom: -2px; font-family: Times New Roman;">E-mail Address: scilab.nasugbu@gmail.com | Website Address: http//www.batstate-u.edu.ph</h5>\
						  <hr style="margin-top: 3px; padding-bottom: 10px; border-width: 2.5px; border-color: black;">\
						</center>',
				customize: function ( win ) {
					$(win.document.body).find( 'table' ).append('<br<br/><br><br><br><h4 class="">Noted by:</h4><br><br><br><br><br><h4 class="">Prepared by:</h4>');
				}
			}
		]
});

$("#btnReloadList").on('click', function(){
	tbl_return.ajax.reload();
});

var tbl_pendingres = $('.tbl_pendingres').DataTable({
		"ajax":
			{
				"url": "../class/display/display",
				"type": "POST",
				"data": {
					"key": "pending_reservation"
				}
			},
		"columns": 
		[
			{
				"data": [0],
				"className": "text-center"
			},
			{
				"data": [1],
				"className": "text-center"
			},
			{
				"data": [2],
				"className": "text-center"
			},
			{
				"data": [3],
				"className": "text-center"
			},
			{
				"data": [4],
				"className": "text-center"
			}
		],
		dom: "Bfrtip",
		buttons: [
			{
				extend: "copy",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3]
				}
			},
			{
				extend: "csv",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3]
				}
			},
			{
				extend: "excel",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3]
				}
			},
			{
				extend: "pdfHtml5",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3]
				}
			},
			{
			extend: "print",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3]
				},
				message: '<img src="https://batstate-u.edu.ph/wp-content/uploads/2022/05/cropped-BatStateU-NEU-Logo.png" height="110px" width="119px" style="position: absolute; top: 0px; left: 30px;">\
						<center>\
						  <strong><p style="margin-top: -67px; margin-bottom: -5px; font-size: 17px; font-family: Times New Roman;">Republic of the Philippines</p></strong>\
						  <strong><p style="margin-bottom: -5px; font-size: 22px; font-family: Times New Roman; letter-spacing: 0.8px;">BATANGAS STATE UNIVERSITY</p></strong>\
						  <h4 style="margin: 0; font-size: 18px; color: red; font-family: Times New Roman;">The National Engineering University</h4>\
						  <strong><p style="margin-top: -5px; font-size: 17px; font-family: Times New Roman;">ARASOF-Nasugbu Campus</p>\
						  <strong><p style="margin-top: -15px; font-size: 13.28px; font-family: Times New Roman;">R. Martinez St., Brgy.Bucana, Nasugbu, Batangas, Philippines 4231</p></strong>\
						  <h5 style="margin-top: -10px; font-family: Times New Roman;">Telephone No. +63 416 0350 local 228</h5>\
						  <h5 style="margin-top: -12px; margin-bottom: -2px; font-family: Times New Roman;">E-mail Address: scilab.nasugbu@gmail.com | Website Address: http//www.batstate-u.edu.ph</h5>\
						  <hr style="margin-top: 3px; padding-bottom: 10px; border-width: 2.5px; border-color: black;">\
						</center>',
				customize: function ( win ) {
					$(win.document.body).find( 'table' ).append('<br<br/><br><br><br><h4 class="">Noted by:</h4><br><br><br><br><br><h4 class="">Prepared by:</h4>');
				}
			}
		]
});

var tbl_reserved = $('.tbl_reserved').DataTable({
		"ajax":
			{
				"url": "../class/display/display",
				"type": "POST",
				"data": {
					"key": "accept_reservation"
				}
			},
		"columns": 
		[
			{
				"data": [0],
				"className": "text-center"
			},
			{
				"data": [1],
				"className": "text-center"
			},
			{
				"data": [2],
				"className": "text-center"
			},
			{
				"data": [3],
				"className": "text-center"
			},
			{
				"data": [4],
				"className": "text-center"
			}
		],
		dom: "Bfrtip",
		buttons: [
			{
				extend: "copy",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3]
				}
			},
			{
				extend: "csv",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3]
				}
			},
			{
				extend: "excel",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3]
				}
			},
			{
				extend: "pdfHtml5",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3]
				}
			},
			{
			extend: "print",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3]
				},
				message: '<img src="https://batstate-u.edu.ph/wp-content/uploads/2022/05/cropped-BatStateU-NEU-Logo.png" height="110px" width="119px" style="position: absolute; top: 0px; left: 30px;">\
						<center>\
						  <strong><p style="margin-top: -67px; margin-bottom: -5px; font-size: 17px; font-family: Times New Roman;">Republic of the Philippines</p></strong>\
						  <strong><p style="margin-bottom: -5px; font-size: 22px; font-family: Times New Roman; letter-spacing: 0.8px;">BATANGAS STATE UNIVERSITY</p></strong>\
						  <h4 style="margin: 0; font-size: 18px; color: red; font-family: Times New Roman;">The National Engineering University</h4>\
						  <strong><p style="margin-top: -5px; font-size: 17px; font-family: Times New Roman;">ARASOF-Nasugbu Campus</p>\
						  <strong><p style="margin-top: -15px; font-size: 13.28px; font-family: Times New Roman;">R. Martinez St., Brgy.Bucana, Nasugbu, Batangas, Philippines 4231</p></strong>\
						  <h5 style="margin-top: -10px; font-family: Times New Roman;">Telephone No. +63 416 0350 local 228</h5>\
						  <h5 style="margin-top: -12px; margin-bottom: -2px; font-family: Times New Roman;">E-mail Address: scilab.nasugbu@gmail.com | Website Address: http//www.batstate-u.edu.ph</h5>\
						  <hr style="margin-top: 3px; padding-bottom: 10px; border-width: 2.5px; border-color: black;">\
						</center>',
				customize: function ( win ) {
					$(win.document.body).find( 'table' ).append('<br<br/><br><br><br><h4 class="">Noted by:</h4><br><br><br><br><br><h4 class="">Prepared by:</h4>');
				}
			}
		]
});



var tbl_cancelled = $('.tbl_cancelled').DataTable({
		"ajax":
			{
				"url": "../class/display/display",
				"type": "POST",
				"data": {
					"key": "cancelled_reservation"
				}
			},
		"columns": 
		[
			{
				"data": [0],
				"className": "text-center"
			},
			{
				"data": [1],
				"className": "text-center"
			},
			{
				"data": [2],
				"className": "text-center"
			},
			{
				"data": [4],
				"className": "text-center"
			},
			{
				"data": [3],
				"className": "text-center"
			}
		],
		dom: "Bfrtip",
		buttons: [
			{
				extend: "copy",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3]
				}
			},
			{
				extend: "csv",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3]
				}
			},
			{
				extend: "excel",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3]
				}
			},
			{
				extend: "pdfHtml5",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3]
				}
			},
			{
			extend: "print",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3]
				},
				message: '<img src="https://batstate-u.edu.ph/wp-content/uploads/2022/05/cropped-BatStateU-NEU-Logo.png" height="110px" width="119px" style="position: absolute; top: 0px; left: 30px;">\
						<center>\
						  <strong><p style="margin-top: -67px; margin-bottom: -5px; font-size: 17px; font-family: Times New Roman;">Republic of the Philippines</p></strong>\
						  <strong><p style="margin-bottom: -5px; font-size: 22px; font-family: Times New Roman; letter-spacing: 0.8px;">BATANGAS STATE UNIVERSITY</p></strong>\
						  <h4 style="margin: 0; font-size: 18px; color: red; font-family: Times New Roman;">The National Engineering University</h4>\
						  <strong><p style="margin-top: -5px; font-size: 17px; font-family: Times New Roman;">ARASOF-Nasugbu Campus</p>\
						  <strong><p style="margin-top: -15px; font-size: 13.28px; font-family: Times New Roman;">R. Martinez St., Brgy.Bucana, Nasugbu, Batangas, Philippines 4231</p></strong>\
						  <h5 style="margin-top: -10px; font-family: Times New Roman;">Telephone No. +63 416 0350 local 228</h5>\
						  <h5 style="margin-top: -12px; margin-bottom: -2px; font-family: Times New Roman;">E-mail Address: scilab.nasugbu@gmail.com | Website Address: http//www.batstate-u.edu.ph</h5>\
						  <hr style="margin-top: 3px; padding-bottom: 10px; border-width: 2.5px; border-color: black;">\
						</center>',
				customize: function ( win ) {
					$(win.document.body).find( 'table' ).append('<br<br/><br><br><br><h4 class="">Noted by:</h4><br><br><br><br><br><h4 class="">Prepared by:</h4>');
				}
			}
		]
});

var tbluser_reservation = $('.tbluser_reservation').DataTable({
		"ajax":
			{
				"url": "../class/display/display",
				"type": "POST",
				"data": {
					"key": "tbluser_reservation",
				}
			},
		"columns": 
		[
			{
				"data": [0],
				"className": "text-center"
			},
			{
				"data": [1],
				"className": "text-center"
			},
			{
				"data": [2],
				"className": "text-center"
			},
			{
				"data": [4],
				"className": "text-center"
			},
			{
				"data": [3],
				"className": "text-center"
			}
		],
		dom: "Bfrtip",
		buttons: [
			{
				extend: "copy",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2]
				}
			},
			{
				extend: "csv",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2]
				}
			},
			{
				extend: "excel",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2]
				}
			},
			{
				extend: "pdfHtml5",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2]
				}
			},
			{
			extend: "print",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2]
				},
				message: '<img src="https://batstate-u.edu.ph/wp-content/uploads/2022/05/cropped-BatStateU-NEU-Logo.png" height="110px" width="119px" style="position: absolute; top: 0px; left: 30px;">\
						<center>\
						  <strong><p style="margin-top: -67px; margin-bottom: -5px; font-size: 17px; font-family: Times New Roman;">Republic of the Philippines</p></strong>\
						  <strong><p style="margin-bottom: -5px; font-size: 22px; font-family: Times New Roman; letter-spacing: 0.8px;">BATANGAS STATE UNIVERSITY</p></strong>\
						  <h4 style="margin: 0; font-size: 18px; color: red; font-family: Times New Roman;">The National Engineering University</h4>\
						  <strong><p style="margin-top: -5px; font-size: 17px; font-family: Times New Roman;">ARASOF-Nasugbu Campus</p>\
						  <strong><p style="margin-top: -15px; font-size: 13.28px; font-family: Times New Roman;">R. Martinez St., Brgy.Bucana, Nasugbu, Batangas, Philippines 4231</p></strong>\
						  <h5 style="margin-top: -10px; font-family: Times New Roman;">Telephone No. +63 416 0350 local 228</h5>\
						  <h5 style="margin-top: -12px; margin-bottom: -2px; font-family: Times New Roman;">E-mail Address: scilab.nasugbu@gmail.com | Website Address: http//www.batstate-u.edu.ph</h5>\
						  <hr style="margin-top: 3px; padding-bottom: 10px; border-width: 2.5px; border-color: black;">\
						</center>',
				customize: function ( win ) {
					$(win.document.body).find( 'table' ).append('<br<br/><br><br><br><h4 class="">Noted by:</h4><br><br><br><br><br><h4 class="">Prepared by:</h4>');
				}
			}
		]
});


var table_history = $('.table_history').DataTable({
		"ajax":
			{
				"url": "../class/display/display",
				"type": "POST",
				"data": {
					"key": "table_history",
				}
			},
		"columns": 
		[
			{
				"data": [0],
				"className": "text-center"
			},
			{
				"data": [1],
				"className": "text-center"
			},
			{
				"data": [2],
				"className": "text-center"
			}
		],
		dom: "Bfrtip",
		buttons: [
			{
				extend: "copy",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2]
				}
			},
			{
				extend: "csv",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2]
				}
			},
			{
				extend: "excel",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2]
				}
			},
			{
				extend: "pdfHtml5",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2]
				}
			},
			{
			extend: "print",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2]
				},
				message: '<img src="https://batstate-u.edu.ph/wp-content/uploads/2022/05/cropped-BatStateU-NEU-Logo.png" height="110px" width="119px" style="position: absolute; top: 0px; left: 30px;">\
						<center>\
						  <strong><p style="margin-top: -67px; margin-bottom: -5px; font-size: 17px; font-family: Times New Roman;">Republic of the Philippines</p></strong>\
						  <strong><p style="margin-bottom: -5px; font-size: 22px; font-family: Times New Roman; letter-spacing: 0.8px;">BATANGAS STATE UNIVERSITY</p></strong>\
						  <h4 style="margin: 0; font-size: 18px; color: red; font-family: Times New Roman;">The National Engineering University</h4>\
						  <strong><p style="margin-top: -5px; font-size: 17px; font-family: Times New Roman;">ARASOF-Nasugbu Campus</p>\
						  <strong><p style="margin-top: -15px; font-size: 13.28px; font-family: Times New Roman;">R. Martinez St., Brgy.Bucana, Nasugbu, Batangas, Philippines 4231</p></strong>\
						  <h5 style="margin-top: -10px; font-family: Times New Roman;">Telephone No. +63 416 0350 local 228</h5>\
						  <h5 style="margin-top: -12px; margin-bottom: -2px; font-family: Times New Roman;">E-mail Address: scilab.nasugbu@gmail.com | Website Address: http//www.batstate-u.edu.ph</h5>\
						  <hr style="margin-top: 3px; padding-bottom: 10px; border-width: 2.5px; border-color: black;">\
						</center>',
				customize: function ( win ) {
					$(win.document.body).find( 'table' ).append('<br<br/><br><br><br><h4 class="">Noted by:</h4><br><br><br><br><br><h4 class="">Prepared by:</h4>');
				}
			}
		]
});

var table_dashboard = $('.table_dashboard').DataTable({
	"ajax":
			{
				"url": "../class/display/display",
				"type": "POST",
				"data": {
					"key": "table_dashboard",
				}
			},
		"columns": 
		[
			{
				"data": [0],
				"className": "text-center"
			},
			{
				"data": [1],
				"className": "text-center"
			},
			{
				"data": [2],
				"className": "text-center"
			},
			{
				"data": [3],
				"visible":false,
				"className": "text-center"
			},
			{
				"data": [4],
				"className": "text-center"
			},
			{
				"data": [5],
				"className": "text-center"
			}
		],
	dom: "Bfrtip",
		buttons: [
			{
				extend: "copy",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3,4,5]
				}
			},
			{
				extend: "csv",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3,4,5]
				}
			},
			{
				extend: "excel",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3,4,5]
				}
			},
			{
				extend: "pdfHtml5",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3,4,5]
				}
			},
			{
			extend: "print",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3,4,5]
				},
				message: '<img src="https://batstate-u.edu.ph/wp-content/uploads/2022/05/cropped-BatStateU-NEU-Logo.png" height="110px" width="119px" style="position: absolute; top: 0px; left: 30px;">\
						<center>\
						  <strong><p style="margin-top: -67px; margin-bottom: -5px; font-size: 17px; font-family: Times New Roman;">Republic of the Philippines</p></strong>\
						  <strong><p style="margin-bottom: -5px; font-size: 22px; font-family: Times New Roman; letter-spacing: 0.8px;">BATANGAS STATE UNIVERSITY</p></strong>\
						  <h4 style="margin: 0; font-size: 18px; color: red; font-family: Times New Roman;">The National Engineering University</h4>\
						  <strong><p style="margin-top: -5px; font-size: 17px; font-family: Times New Roman;">ARASOF-Nasugbu Campus</p>\
						  <strong><p style="margin-top: -15px; font-size: 13.28px; font-family: Times New Roman;">R. Martinez St., Brgy.Bucana, Nasugbu, Batangas, Philippines 4231</p></strong>\
						  <h5 style="margin-top: -10px; font-family: Times New Roman;">Telephone No. +63 416 0350 local 228</h5>\
						  <h5 style="margin-top: -12px; margin-bottom: -2px; font-family: Times New Roman;">E-mail Address: scilab.nasugbu@gmail.com | Website Address: http//www.batstate-u.edu.ph</h5>\
						  <hr style="margin-top: 3px; padding-bottom: 10px; border-width: 2.5px; border-color: black;">\
						</center>',
				customize: function ( win ) {
					$(win.document.body).find( 'table' ).append('<br<br/><br><br><br><h4 class="">Noted by:</h4><br><br><br><br><br><h4 class="">Prepared by:</h4>');
				}
			}
		]
});

function member_profile(id)
{

	var tbl_member_profile = $('.tbl_member_profile').DataTable({
		"ajax":
			{
				"url": "../class/display/display",
				"type": "POST",
				"data": {
					"key": "tbl_member_profile",
					"id": id
				}
			},
		"columns": 
		[
			{
				"data": [0],
				"className": "text-center"
			},
			{
				"data": [1],
				"className": "text-center"
			},
			{
				"data": [2],
				"className": "text-center"
			},
			{
				"data": [3],
				"className": "text-center"
			}
		],
		dom: "Bfrtip",
			buttons: [
				{
					extend: "copy",
					className: "btn-sm btn-success",
					exportOptions:{
						columns: [0,1,2,3]
					}
				},
				{
					extend: "csv",
					className: "btn-sm btn-success",
					exportOptions:{
						columns: [0,1,2,3]
					}
				},
				{
					extend: "excel",
					className: "btn-sm btn-success",
					exportOptions:{
						columns: [0,1,2,3]
					}
				},
				{
					extend: "pdfHtml5",
					className: "btn-sm btn-success",
					exportOptions:{
						columns: [0,1,2,3]
					}
				},
				{
				extend: "print",
					className: "btn-sm btn-success",
					exportOptions:{
						columns: [0,1,2,3]
					},
				message: '<img src="https://batstate-u.edu.ph/wp-content/uploads/2022/05/cropped-BatStateU-NEU-Logo.png" height="110px" width="119px" style="position: absolute; top: 0px; left: 30px;">\
						<center>\
						  <strong><p style="margin-top: -67px; margin-bottom: -5px; font-size: 17px; font-family: Times New Roman;">Republic of the Philippines</p></strong>\
						  <strong><p style="margin-bottom: -5px; font-size: 22px; font-family: Times New Roman; letter-spacing: 0.8px;">BATANGAS STATE UNIVERSITY</p></strong>\
						  <h4 style="margin: 0; font-size: 18px; color: red; font-family: Times New Roman;">The National Engineering University</h4>\
						  <strong><p style="margin-top: -5px; font-size: 17px; font-family: Times New Roman;">ARASOF-Nasugbu Campus</p>\
						  <strong><p style="margin-top: -15px; font-size: 13.28px; font-family: Times New Roman;">R. Martinez St., Brgy.Bucana, Nasugbu, Batangas, Philippines 4231</p></strong>\
						  <h5 style="margin-top: -10px; font-family: Times New Roman;">Telephone No. +63 416 0350 local 228</h5>\
						  <h5 style="margin-top: -12px; margin-bottom: -2px; font-family: Times New Roman;">E-mail Address: scilab.nasugbu@gmail.com | Website Address: http//www.batstate-u.edu.ph</h5>\
						  <hr style="margin-top: 3px; padding-bottom: 10px; border-width: 2.5px; border-color: black;">\
						</center>',
				customize: function ( win ) {
					$(win.document.body).find( 'table' ).append('<br<br/><br><br><br><h4 class="">Noted by:</h4><br><br><br><br><br><h4 class="">Prepared by:</h4>');
				}
				}
			]
	});

}

var tbluser_inbox = $('.tbluser_inbox').DataTable({
	"ajax":
			{
				"url": "../class/display/display",
				"type": "POST",
				"data": {
					"key": "tbluser_inbox",
				}
			},
		"columns": 
		[
			{
				"data": [0],
				"visible":false,	
				"className": "text-center"
			},
			{
				"data": [1],
				"className": "text-center"
			},
			{
				"data": [2],
				"className": "text-center"
			}
		],
		dom: "Bfrtip",
			buttons: [
				{
					extend: "copy",
					className: "btn-sm btn-success",
					exportOptions:{
						columns: [0,1,2]
					}
				},
				{
					extend: "csv",
					className: "btn-sm btn-success",
					exportOptions:{
						columns: [0,1,2]
					}
				},
				{
					extend: "excel",
					className: "btn-sm btn-success",
					exportOptions:{
						columns: [0,1,2]
					}
				},
				{
					extend: "pdfHtml5",
					className: "btn-sm btn-success",
					exportOptions:{
						columns: [0,1,2]
					}
				},
				{
				extend: "print",
					className: "btn-sm btn-success",
					exportOptions:{
						columns: [0,1,2]
					},
				message: '<img src="https://batstate-u.edu.ph/wp-content/uploads/2022/05/cropped-BatStateU-NEU-Logo.png" height="110px" width="119px" style="position: absolute; top: 0px; left: 30px;">\
						<center>\
						  <strong><p style="margin-top: -67px; margin-bottom: -5px; font-size: 17px; font-family: Times New Roman;">Republic of the Philippines</p></strong>\
						  <strong><p style="margin-bottom: -5px; font-size: 22px; font-family: Times New Roman; letter-spacing: 0.8px;">BATANGAS STATE UNIVERSITY</p></strong>\
						  <h4 style="margin: 0; font-size: 18px; color: red; font-family: Times New Roman;">The National Engineering University</h4>\
						  <strong><p style="margin-top: -5px; font-size: 17px; font-family: Times New Roman;">ARASOF-Nasugbu Campus</p>\
						  <strong><p style="margin-top: -15px; font-size: 13.28px; font-family: Times New Roman;">R. Martinez St., Brgy.Bucana, Nasugbu, Batangas, Philippines 4231</p></strong>\
						  <h5 style="margin-top: -10px; font-family: Times New Roman;">Telephone No. +63 416 0350 local 228</h5>\
						  <h5 style="margin-top: -12px; margin-bottom: -2px; font-family: Times New Roman;">E-mail Address: scilab.nasugbu@gmail.com | Website Address: http//www.batstate-u.edu.ph</h5>\
						  <hr style="margin-top: 3px; padding-bottom: 10px; border-width: 2.5px; border-color: black;">\
						</center>',
				customize: function ( win ) {
					$(win.document.body).find( 'table' ).append('<br<br/><br><br><br><h4 class="">Noted by:</h4><br><br><br><br><br><h4 class="">Prepared by:</h4>');
				}
				}
			]
});

function selectMonthTransferData()
{
	return $("#selectMonthTransferred").val();
}

function selectYearTransferData()
{
	return $("#selectYearTransferred").val();
}

var table_inventory_transfer = $('.table_inventory_transfer2').DataTable({
	"ajax":
		{
			"url": "../class/display/display",
			"type": "POST",
			"data": function(d){
		        d.key = "display_equipment_glass";
		        d.month = selectMonthTransferData();
		        d.year = selectYearTransferData();
	      	}
		},
		"columns": 
		[
			{
				"data": [0],
				"className": "text-center"
			},
			{
				"data": [1],
				"className": "text-center"
			},
			{
				"data": [2],
				"className": "text-center"
			},
			{
				"data": [3],
				"className": "text-center"
			},
			{
				"data": [4],
				"className": "text-center"
			},
			{
				"data": [6],
				
				"className": "text-center"
			},
			{
				"data": [5],
				
				"className": "text-center"
			},
			{
				"data": [7],
				
				"className": "text-center"
			}
			
		],
		dom: "Bfrtip",
		buttons: [
			{
				extend: "copy",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3,4]
				}
			},
			{
				extend: "csv",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3,4]
				}
			},
			{
				extend: "excel",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3,4]
				}
			},
			{
				extend: "pdfHtml5",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3,4]
				}
			},
			{
				extend: "print",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3,4]
				},
				message: '<img src="https://batstate-u.edu.ph/wp-content/uploads/2022/05/cropped-BatStateU-NEU-Logo.png" height="110px" width="119px" style="position: absolute; top: 0px; left: 30px;">\
						<center>\
						  <strong><p style="margin-top: -67px; margin-bottom: -5px; font-size: 17px; font-family: Times New Roman;">Republic of the Philippines</p></strong>\
						  <strong><p style="margin-bottom: -5px; font-size: 22px; font-family: Times New Roman; letter-spacing: 0.8px;">BATANGAS STATE UNIVERSITY</p></strong>\
						  <h4 style="margin: 0; font-size: 18px; color: red; font-family: Times New Roman;">The National Engineering University</h4>\
						  <strong><p style="margin-top: -5px; font-size: 17px; font-family: Times New Roman;">ARASOF-Nasugbu Campus</p>\
						  <strong><p style="margin-top: -15px; font-size: 13.28px; font-family: Times New Roman;">R. Martinez St., Brgy.Bucana, Nasugbu, Batangas, Philippines 4231</p></strong>\
						  <h5 style="margin-top: -10px; font-family: Times New Roman;">Telephone No. +63 416 0350 local 228</h5>\
						  <h5 style="margin-top: -12px; margin-bottom: -2px; font-family: Times New Roman;">E-mail Address: scilab.nasugbu@gmail.com | Website Address: http//www.batstate-u.edu.ph</h5>\
						  <hr style="margin-top: 3px; padding-bottom: 10px; border-width: 2.5px; border-color: black;">\
						</center>',
				customize: function ( win ) {
					$(win.document.body).find( 'table' ).append('<br<br/><br><br><br><h4 class="">Noted by:</h4><br><br><br><br><br><h4 class="">Prepared by:</h4>');
				}
			}
		]
});

$("#btnReloadTransferredList").on('click', function(){
	table_inventory_transfer.ajax.reload();
});
// function member_profile(id)
// {
// 	$.ajax({
// 		type: "POST",
// 		url: "../class/display/display",
// 		data: {
// 			key: "tbl_member_profile",
// 			id: id
// 		}
// 	})
// 	.done(function(data){
// 		console.log(data);
// });
// }


var table_inventory_transfer = $('.table_inventory_transfer').DataTable({
	"ajax":
		{
			"url": "../class/display/display",
			"type": "POST",
			"data": function(d){
		        d.key = "display_inventory_transfer";
		        d.month = selectMonthTransferData();
		        d.year = selectYearTransferData();
	      	}
		},
		"columns": 
		[
			{
				"data": [0],
				"className": "text-center"
			},
			{
				"data": [1],
				"className": "text-center"
			},
			{
				"data": [2],
				"className": "text-center"
			},
			{
				"data": [3],
				"className": "text-center"
			},
			{
				"data": [4],
				"className": "text-center"
			},
			{
				"data": [6],
				
				"className": "text-center"
			},
			{
				"data": [5],
				
				"className": "text-center"
			},
			{
				"data": [7],
				
				"className": "text-center"
			}
			
		],
		dom: "Bfrtip",
		buttons: [
			{
				extend: "copy",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3,4]
				}
			},
			{
				extend: "csv",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3,4]
				}
			},
			{
				extend: "excel",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3,4]
				}
			},
			{
				extend: "pdfHtml5",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3,4]
				}
			},
			{
				extend: "print",
				className: "btn-sm btn-success",
				exportOptions:{
					columns: [0,1,2,3,4]
				},
				message: '<img src="https://batstate-u.edu.ph/wp-content/uploads/2022/05/cropped-BatStateU-NEU-Logo.png" height="110px" width="119px" style="position: absolute; top: 0px; left: 30px;">\
						<center>\
						  <strong><p style="margin-top: -67px; margin-bottom: -5px; font-size: 17px; font-family: Times New Roman;">Republic of the Philippines</p></strong>\
						  <strong><p style="margin-bottom: -5px; font-size: 22px; font-family: Times New Roman; letter-spacing: 0.8px;">BATANGAS STATE UNIVERSITY</p></strong>\
						  <h4 style="margin: 0; font-size: 18px; color: red; font-family: Times New Roman;">The National Engineering University</h4>\
						  <strong><p style="margin-top: -5px; font-size: 17px; font-family: Times New Roman;">ARASOF-Nasugbu Campus</p>\
						  <strong><p style="margin-top: -15px; font-size: 13.28px; font-family: Times New Roman;">R. Martinez St., Brgy.Bucana, Nasugbu, Batangas, Philippines 4231</p></strong>\
						  <h5 style="margin-top: -10px; font-family: Times New Roman;">Telephone No. +63 416 0350 local 228</h5>\
						  <h5 style="margin-top: -12px; margin-bottom: -2px; font-family: Times New Roman;">E-mail Address: scilab.nasugbu@gmail.com | Website Address: http//www.batstate-u.edu.ph</h5>\
						  <hr style="margin-top: 3px; padding-bottom: 10px; border-width: 2.5px; border-color: black;">\
						</center>',
				customize: function ( win ) {
					$(win.document.body).find( 'table' ).append('<br<br/><br><br><br><h4 class="">Noted by:</h4><br><br><br><br><br><h4 class="">Prepared by:</h4>');
				}
			}
		]
});

$("#btnReloadTransferredList").on('click', function(){
	table_inventory_transfer.ajax.reload();
});