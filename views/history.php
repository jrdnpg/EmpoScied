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
				<li class="active">Graph</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<table class="table table_history">
							<thead>
								<tr>
									<th>User</th>
									<th>Description</th>
									<th>Date</th>
								</tr>
							</thead>
						</table>
					</div>
				</div><!-- panel -->
			</div><!-- panel -->
		</div><!-- row -->


	</div>


<?php include 'footer.php'; ?>