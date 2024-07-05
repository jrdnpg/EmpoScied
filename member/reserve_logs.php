<?php 
	include 'header.php';
?>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 col-md-2 sidebar">
		<ul class="nav menu">
			<li class="">
				<a href="#">
					
					<img alt="Brand" class ="img" src="logo2.png">

				</a>
			</li>
		<form role="search">
			<div class="form-group">
				<!-- <input type="text" class="form-control" placeholder="Search"> -->
			</div>
		</form>
		<ul class="nav menu">
			<li>
				<a href="home">
					<i class="fa fa-tachometer" aria-hidden="true"></i>
					Dashboard
				</a>
			</li>
			<li class="active">
				<a href="reserve_logs">
					<i class="fa fa-user" aria-hidden="true"></i>
					Requesting Status
				</a>
			</li>
			 <li>
                <a href="liabilities">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    Liabilities
                </a>
            </li>
			
		</ul>
	</div><!--/.sidebar-->
<div class="table table-responsive">
	<div class="row-fluid">
		<div class="col-md-12 main">
			<div class="col-sm-9 col-lg-10 col-md-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-3">
				
				<div class="row">
                    <div class="col-sm-8">
                        <h1 class="page-header h2 mb-0 text-gray-800">Requesting Status</h1>
					</div>
				</div><!--/.row-->

				<div class="row">
					<div class="panel panel-default">
						<table class="table table-bordered tbluser_reservation">
							<thead>
								<tr>
									<th>Requesting Date</th>
									<th>Item Name</th>
									<th>Room Assign</th>
									
									<th>Status</th>
									<th>Remarks</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
				

			</div>
		</div>
	</div>
</div>


<?php include 'footer.php'; ?>

