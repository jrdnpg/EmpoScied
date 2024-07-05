<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<title>User's Login</title>

	<!-- bootstrap -->
	<link rel="stylesheet" type="text/css" href="../assets/custom/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="../assets/custom/css/bootstrap-table.css">
	<link rel="stylesheet" type="text/css" href="../assets/custom/css/datepicker.css">
	<link rel="stylesheet" type="text/css" href="../assets/custom/css/datepicker3.css">
	<link rel="stylesheet" type="text/css" href="../assets/mycustom/css/styles.css">
	


	<!-- datatables -->
	<link rel="stylesheet" type="text/css" href="../assets/datatables/css/jquery.dataTables.min.css">

	<!-- fontawesome -->
	<link rel="stylesheet" type="text/css" href="../assets/fontawesome/css/font-awesome.min.css">

	<!-- custom -->

	<!-- toastr -->
	<link rel="stylesheet" type="text/css" href="../assets/toastr/css/toastr.css">


</head>
<body class="index-body login">
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				
				<img src="bsu-logo.png" alt="BSU Logo" style="float:left; margin-top: 7px; margin-right: 5px; height: 35px; width: 37px;">
				<a class="navbar-brand" href="#">EmpoSciEd</a>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>	

<br>
<br>

<!-- <div class="container">
	<div class="panel" style="max-width: 350px; margin:  auto;">
		<div class="panel-body">
			<div class="col-sm-10 col-md-12">
				<form class="frm_memberlogin">
					<h4 class="text-center" style="font-size: 18px;letter-spacing: 0.025em; height: 38px;border-bottom: 1px solid #eee;color: #414547;">Borrower Login</h4>
					<div class="form-group">
						<label for="id_number">Sr-Code</label>
						<input type="text" id="id_number" name="id_number" class="form-control" autofocus="on" placeholder="Please type your sr-code">
					</div>
					<div class="form-group">
						<button class="btn btn-primary btn-block">Log in</button>
					</div>
					<div class="text-center">
						<div>
							<a href="../" class="d-inline-block mb-2">Go to Admin Panel</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div> -->

<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4" style="margin-top: 150px;">
					<div class="login-panel panel panel-default">
						<center><div class="panel-heading"style="font-size: 18px;letter-spacing: 0.025em; height: 38px;border-bottom: 1px solid #eee;color: #414547;">Borrower Login</div></center>
						<div class="panel-body">
							<form class="frm_memberlogin">
								<fieldset>
									<div class="form-group">
									<label for="id_number"></label>
									<input type="text" id="id_number" name="id_number" class="form-control" autofocus="on" placeholder="Sr-Code/School ID No.">
								</div>
									<button class="btn btn-primary btn-block" style="background-color: #619829;">Log in</button>
									<br>
									<div class="text-center">
										<a href="../" class="d-inline-block mb-2">Go to Admin Panel</a>
									</div>
									<center>
                                      <p>or</p>
                                      </center>
									<div class="text-center">
										<a href="signup" class="d-inline-block mb-2">Create an Account</a>
									</div>
								</fieldset>
							</form>
						</div>
					</div>
				</div><!-- /.col-->
			</div><!-- /.col-->
		</div><!-- /.row -->	
	</div><!-- /.row -->	


			</div>

		</div>
	</div>
	
</div>



<?php include 'footer.php'; ?>

<!-- javascript -->
	<script type="text/javascript" src="assets/custom/js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="assets/custom/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/toastr/js/toastr.min.js"></script>
	<script type="text/javascript" src="assets/mycustom/js/login.js"></script>
</body>
</html>