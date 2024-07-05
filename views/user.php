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
		<li class="parent">
			<a href="#">
				<span data-toggle="collapse" href="#sub-item-1">
					<i class="fa fa-exchange" aria-hidden="true"></i>
				</span>
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
		<li class="active">
			<a href="#">
				<i class="fa fa-user" aria-hidden="true"></i>
				Users
			</a>
		</li>
		<?php 
			}
			($_SESSION['admin_type'] == 1) ? include('include_history.php') : false;
		 ?>
	</ul>
</div><!--/.sidebar-->
<div class="table table-responsive">
<div class="col-sm-9 col-lg-10 col-md-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-3">

	<div class="row">
		<ol class="breadcrumb">
			<li><a href="dashboard"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li class="active">Users</li>
		</ol>
		<div class="breadcrumb">
			<button class="btn btn-primary col-sm-offset-10 add_user">
				<svg class="glyph stroked plus sign">
					<use xlink:href="#stroked-plus-sign"/>
				</svg>
				Add User
			</button>
		</div>
	</div><!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<table class="table table-bordered table_user">
						<thead>
							<tr>
								<th>Name</th>
								<th>Type</th>
								<th>Username</th>
								<th>Action</th>
							</tr>
						</thead>
					</table>
				</div>
			</div><!-- panel -->
		</div><!-- panel -->

	</div><!-- row -->

	
</div>

<div class="right-sidebar user-side">
	<div class="sidebar-form">
		<div class="container-fluid">
			<form class="frmadd_users">
				<h4 class="alert bg-success">Add User</h4>
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="u_fname" class="form-control" required="required">
				</div>
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="u_username" class="form-control" required="required">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="u_password" class="form-control" required="required">
				</div>
				<div class="form-group">
					<label>User Type</label>
					<select class="form-control" name="u_type" required="required">
						<option disabled selected>Please select user type</option>
						<option value="1">Administrator</option>
						<option value="2">Lab Technician</option>
						
					</select>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-6">
							<button class="btn btn-danger btn-block cancel_user" type="button">
								CANCEL
							</button>
						</div>
						<div class="col-md-6">
							<button class="btn btn-primary btn-block" type="submit">
								SAVE
							</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="right-sidebar userdiv">
	<div class="container-fluid">
		<div class="edit-userside"></div>
	</div>
</div>
</div>

<?php include 'footer.php'; ?>