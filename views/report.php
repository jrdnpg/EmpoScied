<?php 
    include 'header.php';
?>
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 col-md-2 sidebar">

        <ul class="nav menu">
            <li class="">
                <a href="#">
                    
                    <img alt="Brand" class ="img" src="logo2.png">

                </a>
        
        <ul class="nav menu">
            <li class="">
                <a href="dashboard">
                    <i class="fa fa-tachometer" aria-hidden="true"></i>
                    Dashboard
                </a>
            </li>
            <li class="parent ">
                <a href="#sub-item-1" data-toggle="collapse">
          <span data-toggle="collapse" href="#sub-item-1"><i class="fa fa-exchange" aria-hidden="true"></i></span> Transaction 
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
           <!--  <li>
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
            <li class="active">
                <a href="#">
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
            <?php 
                }
                ($_SESSION['admin_type'] == 1) ? include('include_history.php') : false;
             ?>
        </ul>
    </div><!--/.sidebar-->


    <div class="col-sm-9 col-lg-10 col-md-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-3 main">
        
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="dashboard"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Reports</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <br/>
            <br/>
            <div class="col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">Most Borrowed Items</h4>
        </div>
        <button id="showReportsBtn">Show Reports</button>

        <div id="reportTableContainer" style="display: none;">
            <table id="reportTable"></table>
        </div>

        <div class="panel-body">
            <div id="report"></div>

            <div class="col-md-12" id="frequency" style="height: 500px;"></div>
        </div>
    </div>
</div>


      <div class="col-md-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h4 class="panel-title">Items Inventory</h4>
          </div>
          <div class="panel-body">
            <div class="col-md-12" id="inventory1" style="height: 500px;"></div>
          </div>
        </div>
      </div>




            <div class="col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">Borrowed Items</h4>
        </div>
        <div class="panel-body">
            <div>
                <!-- Dropdowns for Date and Year -->
                <label for="dateDropdown">Select Date:</label>
                <select id="dateDropdown"></select>

                <label for="yearDropdown">Select Year:</label>
                <select id="yearDropdown"></select>
            </div>
<div id="noDataMessage" style="color: red;"></div>

            <div class="col-md-12" id="chartdivs" style="height: 500px;"></div>
        </div>
    </div>
</div>


            

        </div>

    </div>


<?php include 'footer.php'; ?>

<script type="text/javascript">
    $.ajax({
        type: "POST",
        url: "../class/display/display",
        data: {
            key: "chart_borrow"
        }
    })
    .done(function(data){
        console.log(data);
        var provider = JSON.parse(data);
        var chart = AmCharts.makeChart("chartdiv", {
            "type": "serial",
            "theme": "light",
            "marginRight": 40,
            "marginLeft": 40,
            "autoMarginOffset": 20,
            "mouseWheelZoomEnabled": true,
            "dataDateFormat": "YYYY-MM-DD",
            "valueAxes": [{
                "id": "v1",
                "axisAlpha": 0.2,
                "position": "left",
                "ignoreAxisWidth": true
            }],
            "balloon": {
                "borderThickness": 1,
                "shadowAlpha": 0
            },
            "graphs": [{
                "id": "g1",
                "bullet": "round",
                "bulletBorderAlpha": 1,
                "bulletColor": "#FF6600", // Customize the marker color
                "bulletSize": 8,
                "hideBulletsCount": 50,
                "lineThickness": 2,
                "title": "Borrowed Count",
                "useLineColorForBulletBorder": true,
                "valueField": "value",
                "balloonText": "<span style='font-size:18px;'>[[value]]</span>",
                "bullet": "round", // Use a round marker
                "bulletBorderThickness": 2 // Adjust the marker border thickness
            }],
            "chartScrollbar": {
                "graph": "g1",
                "oppositeAxis": false,
                "offset": 30,
                "scrollbarHeight": 80,
                "backgroundAlpha": 0,
                "selectedBackgroundAlpha": 0.1,
                "selectedBackgroundColor": "#888888",
                "graphFillAlpha": 0,
                "graphLineAlpha": 0.5,
                "selectedGraphFillAlpha": 0,
                "selectedGraphLineAlpha": 1,
                "autoGridCount": true,
                "color": "#AAAAAA"
            },
            "chartCursor": {
                "pan": true,
                "valueLineEnabled": true,
                "valueLineBalloonEnabled": true,
                "cursorAlpha": 1,
                "cursorColor": "#258cbb",
                "limitToGraph": "g1",
                "valueLineAlpha": 0.2,
                "valueZoomable": true,
                "categoryBalloonDateFormat": "YYYY-MM-DD", // Display date in the tooltip
                "valueBalloonsEnabled": true // Show tooltips
            },
            "valueScrollbar": {
                "oppositeAxis": false,
                "offset": 50,
                "scrollbarHeight": 10
            },
            "categoryField": "date",
            "categoryAxis": {
                "parseDates": true,
                "dashLength": 1,
                "minorGridEnabled": true,
                "title": "Date", // Axis title
                "labelRotation": 45, // Rotate date labels for better readability
                "minPeriod": "DD", // Set the minimum display period to "day"
                "autoGridCount": true // Automatically determine grid count
            },
            "export": {
                "enabled": true
            },
            "dataProvider": provider
        });

        chart.addListener("rendered", zoomChart);

        zoomChart();

        function zoomChart() {
            chart.zoomToIndexes(chart.dataProvider.length - 40, chart.dataProvider.length - 1);
        }
    });
</script>

<script type="text/javascript">
    $.ajax({
    type: "POST",
    url: "../class/display/display",
    data: {
        key: "chart_combined"
    }
})
.done(function (data) {
    console.log(data);
    var provider = JSON.parse(data);

    var chart = AmCharts.makeChart("chartdivs", {
        "type": "serial",
        "theme": "light",
        "marginRight": 40,
        "marginLeft": 40,
        "autoMarginOffset": 20,
        "dataDateFormat": "YYYY-MM-DD",
        "valueAxes": [{
            "id": "v1",
            "axisAlpha": 0.2,
            "position": "left",
            "ignoreAxisWidth": true
        }],
        "graphs": [{
            "id": "g1",
            "type": "column",
            "fillAlphas": 0.9,
            "lineAlpha": 0.2,
            "title": "Borrowed Count",
            "valueField": "borrowed_count",
            "balloonText": "<span style='font-size:18px;'>[[value]]</span>"
        }, {
            "id": "g2",
            "type": "column",
            "fillAlphas": 0.9,
            "lineAlpha": 0.2,
            "title": "Returned Count",
            "valueField": "returned_count",
            "balloonText": "<span style='font-size:18px;'>[[value]]</span>"
        }],
        "categoryField": "date",
        "categoryAxis": {
            "parseDates": true,
            "dashLength": 1,
            "minorGridEnabled": true,
            "title": "Date",
            "labelRotation": 45,
            "minPeriod": "DD",
            "autoGridCount": true
        },
        "export": {
            "enabled": true
        },
        "dataProvider": provider
    });

    // Populate Date Dropdown with Months
    var dateDropdown = $("#dateDropdown");
    dateDropdown.append($("<option>", { value: "All", text: "All" }));
    var months = [
        "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"
    ];
    months.forEach(function (month, index) {
        dateDropdown.append($("<option>", {
            value: (index + 1).toString(), // Months are 1-based in JavaScript Date object
            text: month
        }));
    });

    // Populate Year Dropdown
    var yearDropdown = $("#yearDropdown");
    yearDropdown.append($("<option>", { value: "All", text: "All" }));
    var uniqueYears = Array.from(new Set(provider.map(item => item.date.substring(0, 4))));
    uniqueYears.forEach(function (year) {
        yearDropdown.append($("<option>", {
            value: year,
            text: year
        }));
    });

    // Event listener for dropdown changes
$("select").on("change", function () {
    var selectedDate = $("#dateDropdown").val();
    var selectedYear = $("#yearDropdown").val();

    // Filter the data based on selected values
    var filteredData = provider.filter(function (item) {
        // Assuming item.date is in the format "YYYY-MM-DD"
        var itemDate = new Date(item.date);

        return (selectedDate === "All" || itemDate.getMonth() + 1 == selectedDate) &&
            (selectedYear === "All" || itemDate.getFullYear().toString() == selectedYear);
    });

    // Update the chart data
    chart.dataProvider = filteredData;
    chart.validateData();

    // Check if there is no data after filtering
    if (filteredData.length === 0) {
        // If no data, display a message
        $("#noDataMessage").text("No data available for the selected month or year.");
    } else {
        // If there is data, hide the message
        $("#noDataMessage").text("");
    }
});


    chart.addListener("rendered", zoomChart);

    function zoomChart() {
        // No zooming for this configuration
    }
})
.fail(function (jqXHR, textStatus, errorThrown) {
    console.error("AJAX Request Failed:", textStatus, errorThrown);
});

</script>



<script type="text/javascript">
    $.ajax({
        type: "POST",
        url: "../class/display/display",
        data: {
            key: "chart_return"
        }
    })
    .done(function(data){
        console.log(data);
        var provider = JSON.parse(data);
        var chart = AmCharts.makeChart("returndiv", {
            "type": "serial",
            "theme": "light",
            "marginRight": 40,
            "marginLeft": 40,
            "autoMarginOffset": 20,
            "mouseWheelZoomEnabled": true,
            "dataDateFormat": "YYYY-MM-DD",
            "valueAxes": [{
                "id": "v1",
                "axisAlpha": 0,
                "position": "left",
                "ignoreAxisWidth": true
            }],
            "balloon": {
                "borderThickness": 1,
                "shadowAlpha": 0,
                "fontSize": 14 // Adjust the font size
            },
            "graphs": [{
                "id": "g1",
                "balloonText": "<span style='font-size:14px;'>[[category]]<br>Count: [[value]]</span>",
                "bullet": "round",
                "bulletBorderAlpha": 1,
                "bulletColor": "#FFFFFF",
                "bulletSize": 5,
                "hideBulletsCount": 50,
                "lineThickness": 2,
                "title": "Returned Equipment",
                "useLineColorForBulletBorder": true,
                "valueField": "value"
            }],
            "chartScrollbar": {
                "graph": "g1",
                "oppositeAxis": false,
                "offset": 30,
                "scrollbarHeight": 80,
                "backgroundAlpha": 0,
                "selectedBackgroundAlpha": 0.1,
                "selectedBackgroundColor": "#888888",
                "graphFillAlpha": 0,
                "graphLineAlpha": 0.5,
                "selectedGraphFillAlpha": 0,
                "selectedGraphLineAlpha": 1,
                "autoGridCount": true,
                "color": "#AAAAAA"
            },
            "chartCursor": {
                "pan": true,
                "valueLineEnabled": true,
                "valueLineBalloonEnabled": true,
                "cursorAlpha": 1,
                "cursorColor": "#258cbb",
                "limitToGraph": "g1",
                "valueLineAlpha": 0.2,
                "valueZoomable": true,
                "categoryBalloonDateFormat": "YYYY-MM-DD", // Display date in the tooltip
                "valueBalloonsEnabled": true // Show tooltips
            },
            "valueScrollbar": {
                "oppositeAxis": false,
                "offset": 50,
                "scrollbarHeight": 10
            },
            "categoryField": "date",
            "categoryAxis": {
                "parseDates": true,
                "dashLength": 1,
                "minorGridEnabled": true,
                "title": "Date", // Axis title
                "labelRotation": 45, // Rotate date labels for better readability
                "minPeriod": "DD", // Set the minimum display period to "day"
                "autoGridCount": true // Automatically determine grid count
            },
            "export": {
                "enabled": true
            },
            "dataProvider": provider
        });

        chart.addListener("rendered", zoomChart);

        zoomChart();

        function zoomChart() {
            chart.zoomToIndexes(chart.dataProvider.length - 40, chart.dataProvider.length - 1);
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



 <!-- JavaScript code -->
<script>
    // Array to store reports
    var reports = [];

    // Function to update the chart based on the selected report
    function updateChart(selectedReport) {
        // Extract month and year from the selected report
        var matches = selectedReport.match(/(\d{1,2})\/(\d{4})/);
        if (!matches) return;

        var selectedMonth = matches[1];
        var selectedYear = matches[2];

        // Filter the data based on the selected month and year
        var filteredData = provider.filter(function (item) {
            var itemMonth = new Date(item.date_borrow).getMonth() + 1; // Month is zero-based
            var itemYear = new Date(item.date_borrow).getFullYear();

            return (selectedMonth === "All" || itemMonth.toString() === selectedMonth) &&
                (selectedYear === "All" || itemYear.toString() === selectedYear);
        });

        // Update the chart data
        chart.dataProvider = filteredData;
        chart.validateData();
    }

    $(document).ready(function () {
        // Event listener for dropdown changes
        $("#reportDropdown").on("change", function () {
            var selectedReport = $(this).val();
            updateChart(selectedReport);
        });

        // Show reports button click event
        $("#showReportsBtn").on("click", function () {
            // Display reports in an HTML table
            var $reportTable = $("#reportTable");
            $reportTable.empty(); // Clear previous reports

            var headerRow = $("<tr>").append("<th>Date</th><th>Report</th>");
            $reportTable.append(headerRow);

            reports.forEach(function (report, index) {
                var matches = report.match(/(\d{1,2}\/\d{4})/);
                var date = matches ? matches[1] : "N/A";

                var row = $("<tr>").append("<td>" + date + "</td><td>" + report + "</td>");
                $reportTable.append(row);
            });

            // Toggle the visibility of the report table container
            $("#reportTableContainer").toggle();
        });
    });

    $.ajax({
        type: "POST",
        url: "../class/display/display",
        data: {
            key: "chart_most_borrowed"
        },
        success: function (data) {
            console.log(data);
            var provider = JSON.parse(data);

            // Predefined colors for pie chart slices (lighter shades of red)
            var sliceColors = ["#FFCDD2", "#EF9A9A", "#E57373", "#EF5350", "#F44336", "#E53935", "#D32F2F", "#C62828", "#B71C1C", "#FF8A80", "#FF5252", "#FF1744", "#D50000"];

            // Create an object to store data for each borrowed item
            var itemData = {};

            // Iterate through the data and group by item
            provider.forEach(function (item) {
                if (!itemData[item.i_model]) {
                    itemData[item.i_model] = {
                        "title": item.i_model,
                        "count": 0,
                        "dates": []
                    };
                }
                itemData[item.i_model].count++;
                itemData[item.i_model].dates.push({
                    "date": new Date(item.date_borrow), // Assuming date is in the correct format
                    "value": item.numberborrow
                });
            });

            // Create an array of data objects for the chart with assigned colors
            var chartData = Object.values(itemData).map(function (item, index) {
                return {
                    "title": item.title,
                    "count": item.count,
                    "color": sliceColors[index % sliceColors.length],
                    "dates": item.dates
                };
            });

            // Create the chart
            var chart = AmCharts.makeChart("frequency", {
                "type": "pie",
                "theme": "light",
                "legend": {
                    "position": "right",
                    "autoMargins": false
                },
                "dataProvider": chartData,
                "titleField": "title",
                "valueField": "count",
                "colorField": "color",  // Specify the color field
                "startDuration": 1,
                "labelRadius": 15,
                "pullOutRadius": 20,
                "depth3D": 10,
                "angle": 15,
                "export": {
                    "enabled": true
                }
            });

            // Display the most borrowed item and count for the current month
            var currentMonth = new Date().getMonth() + 1;
            var currentYear = new Date().getFullYear();

            var mostBorrowedItem = chartData.reduce(function (prev, current) {
                return (prev.count > current.count) ? prev : current;
            });

            if (mostBorrowedItem) {
                var reportText = "The most borrowed item for the month of " + currentMonth + "/" + currentYear +
                    " is " + mostBorrowedItem.title + " with a borrow count of " + mostBorrowedItem.count + ".";

                // Store the report in the array
                reports.push(reportText);

                // Update the dropdown list
                var $reportDropdown = $("#reportDropdown");
                $reportDropdown.empty();

                reports.forEach(function (report, index) {
                    var option = $("<option>").text(report);
                    $reportDropdown.append(option);
                });

                // Update the chart with the latest report
                updateChart(reportText);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.error("AJAX Request Failed:", textStatus, errorThrown);
        }
    });
</script>
