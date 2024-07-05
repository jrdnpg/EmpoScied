<?php 
	include 'header.php';
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Include SweetAlert library -->

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 col-md-2 sidebar"></div>

<script>
function showExpirationNotification() {
    // Check if the notification has been shown before
    if (!localStorage.getItem('expirationNotificationShown')) {
        Swal.fire({
            title: 'Chemicals Expiration Notification',
            html: `<table class="table_inventory_old">
                        <thead>
                            <tr>
                                <th>Img</th>
                                <th>Name</th>
                                <th>Desc</th>
                                <th>Qty</th>
                                <th>Expiration</th>
                            </tr>
                        </thead>
                    </table>`,
            customClass: {
                container: 'my-swal'
            }
        });

        // Set the flag to indicate that the notification has been shown
        localStorage.setItem('expirationNotificationShown', true);
    }
}

// Show the notification every time the dashboard is opened or refreshed
showExpirationNotification();
</script>

<style>
    .my-swal {
        text-align: left;
    }

    .my-swal table {
        border-collapse: collapse;
        width: 100%;
    }

    .my-swal th, .my-swal td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    .my-swal th {
        background-color: #f2f2f2;
    }
</style>




	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 col-md-2 sidebar">
		

		<ul class="nav menu">
			<li class="">
				<a href="#">
					
					<img alt="Brand" class ="img" src="logo2.png">

				</a>
			</li>
		<ul class="nav menu">
			<li class="active">
				<a href="#">
					<i class="fa fa-tachometer" aria-hidden="true"></i>
					Dashboard
				</a>
			</li>
			<li class="parent ">
				<a href="#sub-item-1" data-toggle="collapse">
					<span data-toggle="collapse" href="#sub-item-1"><i class="fa fa-exchange" aria-hidden="true"></i></span> 
					Transaction 
				</a>
				<ul class="children collapse" id="sub-item-1">
					
<li>
						<a class="" href="reservation">
							<svg class="glyph stroked eye">
								<use xlink:href="#stroked-eye"/>
							</svg>
							Request
						</a>
					</li>


					<li>
						<a class="" href="new">
							<svg class="glyph stroked plus sign">
								<use xlink:href="#stroked-plus-sign"/>
							</svg>
							New
						</a>
					</li>
				</ul>
					<li>
						<a class="" href="borrow">
							<i class="fa fa-retweet" aria-hidden="true"></i>
							Borrowed Items
						</a>
					</li>
					<li>
						<a class="" href="return">
							<i class="fa fa-share-square" aria-hidden="true"></i>
							Returned Items
						</a>
					</li>
				
			</li>
			<?php if($_SESSION['admin_type'] == 1){ ?>
			<li>
				<a href="items">
					<i class="glyph fa fa-flask" aria-hidden="true"></i>
					Item
				</a>
			</li>
			<li>
				<a href="members">
					<i class="fa fa-users" aria-hidden="true"></i>
					Borrower
				</a>
			</li>
			<!-- <li>
				<a href="room">
					<svg class="glyph stroked app-window">
						<use xlink:href="#stroked-app-window"></use>
					</svg>
					Room
				</a>
			</li> -->
			<li>
				<a href="inventory">
					<i class="fa fa-th-list" aria-hidden="true"></i>
					Inventory
				</a>
			</li>
			<li>
				<a href="report">
					<i class="fa fa-line-chart" aria-hidden="true"></i>
					Reports
				</a>
			</li>
			<li>
				<a href="user">
					<i class="fa fa-user" aria-hidden="true"></i>
					User
				</a>
			</li>
            <li>
                <a href="room">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    Room
                </a>
            </li>
			<?php 
				}
				($_SESSION['admin_type'] == 1) ? include('include_history.php') : false;
			 ?>
			 <li>
				<a href="setting">
					<svg class="glyph stroked gear">
						<use xlink:href="#stroked-gear"></use>
					</svg>
					Setting
				</a>
			</li> 
		</ul>
	</div><!--/.sidebar-->

	<div class="row-fluid">
		<div class="col-md-12 main">
			<div class="col-sm-9 col-lg-10 col-md-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-3">
				
				
				<div class="row">
                    <div class="col-sm-8">
                        <h1 class="page-header h2 mb-0 text-gray-800">Dashboard</h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-md-6 col-lg-3" onclick="window.location.href='reservation'">
                        <div class="panel panel-white panel-widget">
                            <div class="row no-padding">
                                <div class="col-sm-9 col-lg-7 widget-right" style="cursor: pointer;">
                                    <div class="large peding_val">120</div>
                                    <div class="text-muted">Pending Request</div>
                                </div>
                                <div class="col-sm-3 col-lg-5 widget-left" style="cursor: pointer;">
                                    <img src="images/pending1.png" alt="Pending Icon" style="width: 3em; height: 3em;"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-6 col-lg-3" onclick="window.location.href='#reservation'">
                        <div class="panel panel-white panel-widget">
                            <div class="row no-padding">
                                <div class="col-sm-9 col-lg-7 widget-right" style="cursor: pointer;">
                                    <div class="large accept_val">52</div>
                                    <div class="text-muted">To be Accepted</div>
                                </div>
                                <div class="col-sm-3 col-lg-5 widget-left" style="cursor: pointer;">
                                    <img src="images/accepted.png" alt="Accepted Icon" style="width: 3em; height: 3em;"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-6 col-lg-3" onclick="window.location.href='reservation'">
                        <div class="panel panel-white panel-widget">
                            <div class="row no-padding">
                                <div class="col-sm-9 col-lg-7 widget-right" style="cursor: pointer;">
                                    <div class="large cancel_val">24</div>
                                    <div class="text-muted">Cancelled Request</div>
                                </div>
                                <div class="col-sm-3 col-lg-5 widget-left" style="cursor: pointer;">
                                    <img src="images/cancelled.png" alt="Cancelled Icon" style="width: 3em; height: 3em;"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-6 col-lg-3" onclick="window.location.href='members'">
                        <div class="panel panel-white panel-widget">
                            <div class="row no-padding">
                                <div class="col-sm-9 col-lg-7 widget-right" style="cursor: pointer;">
                                    <div class="large active_user"></div>
                                    <div class="text-muted">No. of active clients</div>
                                </div>
                                <div class="col-sm-3 col-lg-5 widget-left" style="cursor: pointer;">
                                    <img src="images/client.png" alt="Active Users Icon" style="width: 3em; height: 3em;"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                <div class="col-xs-12 col-md-6 col-lg-3" onclick="window.location.href='items'">
                        <div class="panel panel-white panel-widget">
                            <div class="row no-padding">
                                <div class="col-sm-9 col-lg-7 widget-right" style="cursor: pointer;">
                                    <div class="large count_tool">120</div>
                                    <div class="text-muted">Tools</div>
                                </div>
                                <div class="col-sm-3 col-lg-5 widget-left" style="cursor: pointer;">
                                    <img src="images/tool.png" alt="Pending Icon" style="width: 3.5em; height: 3.5em;"/>
                                </div>
                            </div>
                        </div>
                    </div>

                     <div class="col-xs-12 col-md-6 col-lg-3" onclick="window.location.href='items'">
                        <div class="panel panel-white panel-widget">
                            <div class="row no-padding">
                                <div class="col-sm-9 col-lg-7 widget-right" style="cursor: pointer;">
                                    <div class="large count_che">52</div>
                                    <div class="text-muted">Chemicals</div>
                                </div>
                                <div class="col-sm-3 col-lg-5 widget-left" style="cursor: pointer;">
                                    <img src="images/chemicals.png" alt="Accepted Icon" style="width: 3em; height: 3em;"/>
                                </div>
                            </div>
                        </div>
                    </div>

                     <div class="col-xs-12 col-md-6 col-lg-3" onclick="window.location.href='items'">
                        <div class="panel panel-white panel-widget">
                            <div class="row no-padding">
                                <div class="col-sm-9 col-lg-7 widget-right" style="cursor: pointer;">
                                    <div class="large count_gla">52</div>
                                    <div class="text-muted">Glassware</div>
                                </div>
                                <div class="col-sm-3 col-lg-5 widget-left" style="cursor: pointer;">
                                    <img src="images/glassware.png" alt="Accepted Icon" style="width: 3em; height: 3em;"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-6 col-lg-3" onclick="window.location.href='items'">
                        <div class="panel panel-white panel-widget">
                            <div class="row no-padding">
                                <div class="col-sm-9 col-lg-7 widget-right" style="cursor: pointer;">
                                    <div class="large count_eq">52</div>
                                    <div class="text-muted">Equipments</div>
                                </div>
                                <div class="col-sm-3 col-lg-5 widget-left" style="cursor: pointer;">
                                    <img src="images/equipment.png" alt="Accepted Icon" style="width: 3em; height: 3em;"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <style>
                    .panel-widget {
                        border-left: 4px solid #A31129;
                        font-weight: bold;
                        font-size: ;
                    }
                </style>
<hr/>

				<div class="row">

					<div class="col-md-12 col-xs-12 col-sm-12">
						<div class="panel panel-responsive">
							<div class="panel-heading">
								<h4 class="text-black">Inventory item Lost or Damage Tools</h4>
							</div>
							<div class="panel-body">
								<div class="col-md-12" id="inventory" style="height: 500px;"></div>
							</div>
						</div>
					</div>
			</div>


		<div class="col-md-12 col-xs-12 col-sm-12">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h4 class="panel-title">Items Inventory-Chemicals</h4>
    </div>
    <div class="panel-body">
      <div class="col-md-12" id="inventory1" style="height: 500px;"></div>
    </div>
  </div>
</div>

 <div class="col-md-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h4 class="panel-title">Items Inventory - Glassware</h4>
          </div>
          <div class="panel-body">
            <div class="col-md-12" id="inventory2" style="height: 500px;"></div>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h4 class="panel-title">Items Inventory - Equipment</h4>
          </div>
          <div class="panel-body">
            <div class="col-md-12" id="inventory3" style="height: 500px;"></div>
          </div>
        </div>
      </div>

		</div>
		
	</div>

<?php include 'footer.php'; ?>
<script type="text/javascript">
	$(document).ready(function() {
		$('#calendar').fullCalendar({
	      header: {
	        left: 'prev,next today',
	        center: 'title',
	        right: 'month,agendaWeek,agendaDay'
	      },
	      buttonText: {
	        today: 'today',
	        month: 'month',
	        week: 'week',
	        day: 'day'
	      },
	      events: {
	      	url: '../class/display/display',
	      	type: "POST",
	      	data: {
	      		key: "load_reservations_json"
	      	}
	      },
	      editable: false,
	      droppable: false
	    });
	});
</script>

<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
  <script src="https://www.amcharts.com/lib/3/serial.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script type="text/javascript">
$.ajax({
    type: "POST",
    url: "../class/display/display",
    data: {
        key: "chart_inventory_tools"
    }
})
.done(function(data){
    console.log(data);
    var provider = JSON.parse(data);

    // Predefined colors for pie chart slices (lighter shades of red)
    var sliceColors = ["#FFCDD2", "#EF9A9A", "#E57373", "#EF5350", "#F44336", "#E53935", "#D32F2F", "#C62828", "#B71C1C", "#FF8A80", "#FF5252", "#FF1744", "#D50000"];

    // Assign predefined colors to each data point
    provider.forEach(function(item, index) {
        item.color = sliceColors[index % sliceColors.length];
    });

    var chart = AmCharts.makeChart("inventory", {
        "type": "pie",
        "startDuration": 0,
        "theme": "light",
        "addClassNames": true,
        "legend": {
            "position": "right",
            "marginRight": 100,
            "autoMargins": false
        },
        "innerRadius": "30%",
        "defs": {
            "filter": [{
                "id": "shadow",
                "width": "200%",
                "height": "200%",
                "feOffset": {
                    "result": "offOut",
                    "in": "SourceAlpha",
                    "dx": 0,
                    "dy": 0
                },
                "feGaussianBlur": {
                    "result": "blurOut",
                    "in": "offOut",
                    "stdDeviation": 5
                },
                "feBlend": {
                    "in": "SourceGraphic",
                    "in2": "blurOut",
                    "mode": "normal"
                }
            }]
        },
        "dataProvider": provider,
        "valueField": "litres",
        "titleField": "country",
        "colors": sliceColors, // Set predefined colors for pie chart slices
        "export": {
            "enabled": true
        }
    });

    // Make the chart responsive
    chart.responsive = {
        enabled: true
    };

    chart.addListener("init", handleInit);

    chart.addListener("rollOverSlice", function(e) {
        handleRollOver(e);
    });

    function handleInit(){
        chart.legend.addListener("rollOverItem", handleRollOver);
    }

    function handleRollOver(e){
        var wedge = e.dataItem.wedge.node;
        wedge.parentNode.appendChild(wedge);
    }
});



</script>

<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
  <script src="https://www.amcharts.com/lib/3/serial.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $.ajax({
      type: "POST",
      url: "../class/display/display",
      data: {
        key: "chart_inventory_chemical"
      }
    })
    .done(function(data) {
      console.log(data);
      var provider = JSON.parse(data);

      // Assign colors based on the number of items
      for (var i = 0; i < provider.length; i++) {
        var numItems = provider[i].litres;

        if (numItems <= 25) {
          provider[i].color = "#FF0000"; // Red for low
          provider[i].legendTitle = "Low";
        } else if (numItems <= 50) {
          provider[i].color = "#FFFF00"; // Yellow for moderate
          provider[i].legendTitle = "Medium";
        } else {
          provider[i].color = "#00FF00"; // Green for many
          provider[i].legendTitle = "High";
        }
      }

      // Create the chart
      var chart = AmCharts.makeChart("inventory1", {
        "type": "serial",
        "theme": "light",
        "dataProvider": provider,
        "valueAxes": [{
          "gridColor": "#FFFFF",
          "gridAlpha": 0.2,
          "dashLength": 0
        }],
        "gridAboveGraphs": true,
        "startDuration": 1,
        "graphs": [{
          "balloonText": "[[category]]: <b>[[value]]</b>",
          "fillColorsField": "color", // Color field based on your value
          "fillAlphas": 1,
          "lineAlpha": 0.2,
          "type": "column",
          "valueField": "litres",
          "title": "Inventory"
        }],
        "depth3D": 20,
        "angle": 30,
        "rotate": false,
        "categoryField": "country",
        "categoryAxis": {
          "gridPosition": "start",
          "gridAlpha": 0,
          "tickPosition": "start",
          "tickLength": 20,
          "labelRotation": 45 // Set the label rotation angle
        },
        "export": {
          "enabled": true
        },
        "legend": {
          "position": "right",
          "data": [{
            "title": "Low",
            "color": "#FF0000"
          }, {
            "title": "Medium",
            "color": "#FFFF00"
          }, {
            "title": "High",
            "color": "#00FF00"
          }]
        }
      });
    });
  });
</script>


<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
  <script src="https://www.amcharts.com/lib/3/serial.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $.ajax({
      type: "POST",
      url: "../class/display/display",
      data: {
        key: "chart_inventory"
      }
    })
    .done(function(data) {
      console.log(data);
      var provider = JSON.parse(data);

      // Assign colors based on the number of items
      for (var i = 0; i < provider.length; i++) {
        var numItems = provider[i].litres;

        if (numItems <= 25) {
          provider[i].color = "#FF0000"; // Red for low
          provider[i].legendTitle = "Low";
        } else if (numItems <= 50) {
          provider[i].color = "#FFFF00"; // Yellow for moderate
          provider[i].legendTitle = "Medium";
        } else {
          provider[i].color = "#00FF00"; // Green for many
          provider[i].legendTitle = "High";
        }
      }

      // Create the chart
      var chart = AmCharts.makeChart("inventory2", {
        "type": "serial",
        "theme": "light",
        "dataProvider": provider,
        "valueAxes": [{
          "gridColor": "#FFFFF",
          "gridAlpha": 0.2,
          "dashLength": 0
        }],
        "gridAboveGraphs": true,
        "startDuration": 1,
        "graphs": [{
          "balloonText": "[[category]]: <b>[[value]]</b>",
          "fillColorsField": "color", // Color field based on your value
          "fillAlphas": 1,
          "lineAlpha": 0.2,
          "type": "column",
          "valueField": "litres",
          "title": "Inventory"
        }],
        "depth3D": 20,
        "angle": 30,
        "rotate": false,
        "categoryField": "country",
        "categoryAxis": {
          "gridPosition": "start",
          "gridAlpha": 0,
          "tickPosition": "start",
          "tickLength": 20,
          "labelRotation": 45 // Set the label rotation angle
        },
        "export": {
          "enabled": true
        },
        "legend": {
          "position": "right",
          "data": [{
            "title": "Low",
            "color": "#FF0000"
          }, {
            "title": "Medium",
            "color": "#FFFF00"
          }, {
            "title": "High",
            "color": "#00FF00"
          }]
        }
      });
    });
  });
</script>


<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
  <script src="https://www.amcharts.com/lib/3/serial.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $.ajax({
      type: "POST",
      url: "../class/display/display",
      data: {
        key: "chart_equipment"
      }
    })
    .done(function(data) {
      console.log(data);
      var provider = JSON.parse(data);

      // Assign colors based on the number of items
      for (var i = 0; i < provider.length; i++) {
        var numItems = provider[i].litres;

        if (numItems <= 25) {
          provider[i].color = "#FF0000"; // Red for low
          provider[i].legendTitle = "Low";
        } else if (numItems <= 50) {
          provider[i].color = "#FFFF00"; // Yellow for moderate
          provider[i].legendTitle = "Medium";
        } else {
          provider[i].color = "#00FF00"; // Green for many
          provider[i].legendTitle = "High";
        }
      }

      // Create the chart
      var chart = AmCharts.makeChart("inventory3", {
        "type": "serial",
        "theme": "light",
        "dataProvider": provider,
        "valueAxes": [{
          "gridColor": "#FFFFF",
          "gridAlpha": 0.2,
          "dashLength": 0
        }],
        "gridAboveGraphs": true,
        "startDuration": 1,
        "graphs": [{
          "balloonText": "[[category]]: <b>[[value]]</b>",
          "fillColorsField": "color", // Color field based on your value
          "fillAlphas": 1,
          "lineAlpha": 0.2,
          "type": "column",
          "valueField": "litres",
          "title": "Inventory"
        }],
        "depth3D": 20,
        "angle": 30,
        "rotate": false,
        "categoryField": "country",
        "categoryAxis": {
          "gridPosition": "start",
          "gridAlpha": 0,
          "tickPosition": "start",
          "tickLength": 20,
          "labelRotation": 45 // Set the label rotation angle
        },
        "export": {
          "enabled": true
        },
        "legend": {
          "position": "right",
          "data": [{
            "title": "Low",
            "color": "#FF0000"
          }, {
            "title": "Medium",
            "color": "#FFFF00"
          }, {
            "title": "High",
            "color": "#00FF00"
          }]
        }
      });
    });
  });
</script>
