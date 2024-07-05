<?php 
	include 'header.php';
?>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 col-md-2 sidebar">
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
			<li>
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

	<div class="row-fluid">
		<div class="col-md-12 main">
			<div class="col-sm-9 col-lg-10 col-md-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-3">
				
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">Inbox</h1>
					</div>
				</div><!--/.row-->

				<div class="row">
					<div class="panel panel-default">
						<table class="table table-bordered tbluser_inbox">
							<thead>
								<tr>
									<th>BorrowCode</th>
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



<?php include 'footer.php'; ?>

