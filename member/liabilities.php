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
			<li>
				<a href="reserve_logs">
					<i class="fa fa-user" aria-hidden="true"></i>
					Requesting Status
				</a>
			</li>
			<li class="active">
                <a href="liabilities">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    Liabilities
                </a>
            </li>
			
		</ul>
	</div><!--/.sidebar-->

	<div class="breadcrumb">
				<div class="row">
					<div class="col-md-12">
						<ul class="nav nav-pills">
									<li><a href="#lost" data-toggle="tab" style="margin-left: 220px;"><i class="fa-solid fa-circle-question"></i>Lost</a></li>
							<li><a href="#damaged" data-toggle="tab"><i class="fa-solid fa-heart-crack"></i>Damaged</a></li>
<div class="table table-responsive">
	<div class="row-fluid">
		<div class="col-md-12 main">
			<div class="col-sm-9 col-lg-10 col-md-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-3">
				
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">Liabilities</h1>
					</div>
				</div><!--/.row-->
				<style>
    .disable-click {
        pointer-events: none;
    }
</style>

			<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="tab-content">
							
							<div class="tab-pane fade in active" id="lost">
								<table class="table table-bordered table_inventory_lost disable-click">
									<thead>
										<tr>
											<th>Item Name</th>
											<th>Category</th>
											<th>Brand</th>
											<th>No. of items</th>
											<th>Lost By</th>
										</tr>
									</thead>
								</table>
							</div>

							<div class="tab-pane fade" id="damaged">
								<table class="table table-bordered table_inventory_damaged disable-click">
									<thead>
										<tr>
											<th>Item Name</th>
											<th>Category</th>
											<th>Brand</th>
											<th>No. of items</th>
											<th>Damaged By</th>
										</tr>
									</thead>
								</table>
							</div>
				

			</div>
		</div>
	</div>
</div>


<?php include 'footer.php'; ?>

