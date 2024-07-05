<?php 
include 'header.php';
?>

<div id="sidebar-collapse" class="col-sm-2 col-md-2 col-lg-2 sidebar">

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
		<!-- <li class="active">
			<a href="#">
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

<div class="col-sm-10 col-sm-offset-2 col-md-10 col-md-offset-2 col-lg-10 col-lg-offset-2">	
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="dashboard"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li class="active">Rooms</li>
		</ol>
		<div class="breadcrumb">
			<button class="btn btn-primary col-sm-offset-10 add_room">
				<svg class="glyph stroked plus sign">
					<use xlink:href="#stroked-plus-sign"/>
				</svg>
				Add Room
			</button>
		</div>
	</div><!--/.row-->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<table class="table table-bordered table-hover table_room">
						<thead>
							<tr>
								<th>Room Name</th>
								<th>Action</th>
							</tr>
						</thead>
					</table>
				</div>
			</div><!-- panel -->
		</div><!-- panel -->

	</div><!-- row -->
</div>

<div class="right-sidebar room-side">
	<div class="sidebar-form">
		<div class="container-fluid">
			<form class="frm_addroom">
				<h4 class="alert bg-success"><i class="fa fa-plus"></i> Add Room</h4>
				<div class="form-group">
					<label>Room Number</label>
					<input type="number" name="room_name" min="0" class="form-control" autofocus autocomplete="off" required>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-6">
							<button class="btn btn-danger btn-block cancel_room" type="button">
								<i class="fa fa-remove"></i>
								CANCEL
							</button>
						</div>
						<div class="col-md-6">
							<button class="btn btn-primary btn-block" type="submit">
								SAVE
								<i class="fa fa-check"></i>
							</button>
						</div>
					</div>
				</div>
			</form>
			<!-- <form>
				<hr>
				<div class="form-group">
					<h4 class="alert bg-success">Upload csv file here</h4>
				</div>
				<div class="form-group">
					<a href="">Download csv format here.</a>
				</div>
				<div class="form-group">
					<input type="file" name="csv_room" class="form-control" required>
				</div>
				<div class="form-group">
					<button class="btn btn-primary">Upload File</button>
				</div>
			</form> -->
			<div class="div_editroom"></div>
		</div>
	</div>
</div>

<div class="right-sidebar editroom-side">
	<div class="sidebar-form">
		<div class="container-fluid">
			<form class="frm_editroom">
				<h4 class="alert bg-success"><i class="fa fa-edit"></i> Edit Room</h4>
				<div class="form-group">
					<label>Room Name</label>
					<input type="text" name="edit_rm_name" class="form-control" autofocus required autocomplete="off" >
					<input type="hidden" name="edit_rm_id">
				</div>
				<div class="form-group">
					<div class="col-md-6">
						<button class="btn btn-danger btn-block cancel_editroom" type="button">
							<i class="fa fa-remove"></i>
							CANCEL
						</button>
					</div>
					<div class="col-md-6">
						<button class="btn btn-primary btn-block" type="submit">
							UPDATE
							<i class="fa fa-check"></i>
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>



<?php include 'footer.php'; ?>