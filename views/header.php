<?php
	require_once 'session.php';
?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<link href="bsu-logo.png" rel="icon">
  	<link href="bsu-logo.png" rel="apple-touch-icon">

	<title></title>

	<!-- bootstrap -->
	<link rel="stylesheet" type="text/css" href="../assets/custom/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/custom/css/bootstrap-table.css">
	<link rel="stylesheet" type="text/css" href="../assets/custom/css/datepicker.css">
	<link rel="stylesheet" type="text/css" href="../assets/custom/css/datepicker3.css">
	<link rel="stylesheet" type="text/css" href="../assets/custom/css/styles.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
	<!-- datatables -->
	<link rel="stylesheet" type="text/css" href="../assets/datatables/css/jquery.dataTables.min.css">

	<!-- fontawesome -->
	<link rel="stylesheet" type="text/css" href="../assets/fontawesome/css/font-awesome.min.css">

	<!-- custom -->
	<link rel="stylesheet" type="text/css" href="../assets/mycustom/css/styles.css">

	<!-- toastr -->
	<link rel="stylesheet" type="text/css" href="../assets/toastr/css/toastr.css">

	<!-- select2 -->
	<link rel="stylesheet" type="text/css" href="../assets/select/dist/css/select2.min.css">

	<!-- amcharts -->
	<link rel="stylesheet" href="../assets/amcharts/css/export.css" media="all" />
	<link rel="stylesheet" type="text/css" href="../assets/fullcalendar/fullcalendar.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/datetimepicker/datetimepicker.css">

</head>
<body class="">


	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">

					<span class="float-end" id="current-date" style="font-size: 20px; color: white;"></span>
					<span class="float-end" id="current-time" style="font-size: 20px; color: white;"></span>

						<style>
						  @media (max-width: 576px) {
						    #current-date,
						    #current-time {
						      display: none;
						    }
						  }
						</style>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="bi bi-person-circle"></i>&nbsp;&nbsp;</i></use></svg><?php echo $_SESSION['admin_name']; ?><span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="user_profile"><i class="bi bi-person-circle"></i> Profile</a></li>
							<li><a href=#myModal class="trigger-btn" data-toggle="modal"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
					<li class="dropdown pull-right notification">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="bi bi-bell-fill"></i>
							<span id="reserveBadge" class="badge badge-primary"></span>
						</a>
						<ul class="dropdown-menu" role="menu">
							<li>
								<a href="reservation">
									<span id="reserveBadge2" class="today_reservation badge"></span> - Today's Request
								</a>
							</li>
						</ul>
					</li>
					<li class="dropdown pull-right notification">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="bi bi-alarm-fill"></i>
							<span id="dueBadge" class="badge badge-primary"></span>
						</a>
						<ul class="dropdown-menu" role="menu">
							<li>
								<a href="borrow">
									<span id="dueBorrow" class="badge"></span> - Return Deadline
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>	

	<!-- Modal HTML -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">			
				<h4 class="modal-title">Confirmation</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p>Are you sure you want to logout?</p>
			</div>
			<div class="modal-footer">
                <a href="#" class="btn btn-danger" data-dismiss="modal">Cancel</a>
				<a href="../class/logout/logout" class="btn btn-primary">Yes</a>
			</div>
		</div>
	</div>
</div>     

	<script>
    function updateCurrentTime() {
        const currentTimeElement = document.getElementById("current-time");
        const options = { hour: 'numeric', minute: 'numeric', second: 'numeric', hour12: true };
        const currentTime = new Date().toLocaleTimeString(undefined, options);
        currentTimeElement.textContent = currentTime;
    }

    function updateCurrentDate() {
        const currentDateElement = document.getElementById("current-date");
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        const currentDate = new Date().toLocaleDateString(undefined, options);
        currentDateElement.textContent = currentDate;
    }

    // Call the functions initially to display the current time and date
    updateCurrentTime();
    updateCurrentDate();

    // Refresh the time every second (adjust the interval as needed)
    setInterval(updateCurrentTime, 1000); // 1000 milliseconds = 1 second

    // Refresh the date every day at midnight
    setInterval(updateCurrentDate, 86400000); // 86400000 milliseconds = 1 day

    // Function to refresh content
    function refreshContent() {
        // Replace the following line with your actual content reload logic
        showExpirationNotification();
    }

    // Auto-refresh every 5 minutes (adjust the interval as needed)
    setInterval(refreshContent, 300000); // 300000 milliseconds = 5 minutes
</script>

</body>
</html>


