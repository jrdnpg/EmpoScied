<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<title>EmpoSciEd</title>

	<!-- bootstrap -->
	<link rel="stylesheet" type="text/css" href="assets/custom/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/custom/css/bootstrap-table.css">

	<link rel="stylesheet" type="text/css" href="assets/custom/css/datepicker.css">
	<link rel="stylesheet" type="text/css" href="assets/custom/css/datepicker3.css">
	<link rel="stylesheet" type="text/css" href="assets/custom/css/styles.css">

	<!-- toastr -->
	<link rel="stylesheet" type="text/css" href="assets/toastr/css/toastr.css">

	<!-- custom -->
	<link rel="stylesheet" type="text/css" href="assets/mycustom/css/styles.css">

	<link href="views/bsu-logo.png" rel="icon">
  	<link href="views/bsu-logo.png" rel="apple-touch-icon">

    <style>
        .bodys{
            min-height: 100vh;
			width: 100%;
			background: linear-gradient(to top, rgba(0, 0, 0, 0.7)50%, rgba(0, 0, 0, 0.7)), url(assets/images/indexbg5.jpg);
			background-position: center;
			background-size: cover;
			position: relative;
        }

    </style>

</head>
<body class="bodys">
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				
				<img src="views/bsu-logo.png" alt="BSU Logo" style="float:left; margin-top: 7px; margin-right: 5px; height: 35px; width: 37px;">
				<a class="navbar-brand" href="#">EmpoSciEd</a>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>	

	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4" style="margin-top: 150px;">
					<div class="login-panel panel panel-default">
						<center><div class="panel-heading">Admin Login</div></center>
						<div class="panel-body">
							<form class="frm_index">
								<fieldset>
									<div class="form-group">
										<input class="form-control" placeholder="Username" name="username" type="username" autofocus="" autocomplete="off">
									</div>
									<div class="form-group">
										<input class="form-control" placeholder="Password" name="password" type="password" value="">
									</div>
									<br>
									<button class="btn btn-primary btn-block" style="background-color: #619829;">Log in</button>
									<br>
									<div class="text-center">
										<a href="./member/login"> Go to Borrower's Page</a>
									</div>
								</fieldset>
							</form>
						</div>
					</div>
				</div><!-- /.col-->
			</div><!-- /.col-->
		</div><!-- /.row -->	
	</div><!-- /.row -->	





	<!-- javascript -->
	<script type="text/javascript" src="assets/custom/js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="assets/custom/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/toastr/js/toastr.min.js"></script>
	<script type="text/javascript" src="assets/mycustom/js/login.js"></script>

</body>
</html>