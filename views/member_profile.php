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
		<li class="active">
			<a href="#">
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

<div class="col-sm-10 col-sm-offset-2 col-md-10 col-md-offset-2 col-lg-10 col-lg-offset-2 main">	
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="dashboard"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li class="active"><a href="members">Borrower</a></li>

			
		</ol>
		<!-- <div class="breadcrumb">
			<button class="btn btn-primary col-sm-offset-7 add_member">
				<svg class="glyph stroked plus sign">
					<use xlink:href="#stroked-plus-sign"/>
				</svg>
				Upload CSV File
			</button>
			<button class="btn btn-primary add_student">
				<svg class="glyph stroked plus sign">
					<use xlink:href="#stroked-plus-sign"/>
				</svg>
				Add Student
			</button>
			<button class="btn btn-primary add_faculty">
				<svg class="glyph stroked plus sign">
					<use xlink:href="#stroked-plus-sign"/>
				</svg>
				Add Faculty
			</button>
		</div> -->
	</div><!--/.row-->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<table class="table table-bordered tbl_member_profile">
						<thead>
							<tr>
								<th>Borrowed Date</th>
								<th>Items Borrowed</th>
								<th>Room</th>
								<th>Status</th>
							</tr>
						</thead>
					</table>
				</div>
			</div><!-- panel -->
		</div><!-- panel -->
	</div><!-- row -->
	
</div>

<div class="right-sidebar member-side">
	<div class="sidebar-form">
		<div class="container-fluid">
			<h4 class="alert bg-success">Add Member</h4>
			<div class="form-group">
				<a class="btn btn-primary btn-block" target="_blank" download="member_format.csv" href="../assets/downloadables/member_format.csv">
					<i class="fa fa-download"></i>
					Download Format
				</a>
			</div>
			<form class="frm_addmember" enctype="multipart/form-data">
				<div class="form-group">
					<label>Upload File</label>
					<input type="file" name="file" class="form-control" required>
					<input type="hidden" name="key" value="add_member">
				</div>
				<div class="form-group">
					<button class="btn btn-danger cancel_member" type="button">Cancel</button>
					<button class="btn btn-success" type="submit">Upload</button>
				</div>
			</form>	
		</div>
	</div>
</div>

<div class="right-sidebar divedit-member">
	<div class="container-fluid">
		<br>
		<br>
		<div class="member-form"></div>
	</div>
</div>



<?php include 'footer.php'; ?>

<script type="text/javascript">
	var id = '<?php echo $_GET['id']; ?>';
	console.log(id);
	member_profile(id);
</script>