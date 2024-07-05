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
			<li class="active">
				<a href="#">
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

<div class="table table-responsive">
	<div class="col-sm-9 col-lg-10 col-md-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-3 main">
		
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="dashboard"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class=""><a href="items">Items</a></li>
				<li class="active">Items Information</li>
			</ol>
			<div class="breadcrumb">
				<button class="btn btn-primary item-add" type="button">
					<i class="fa fa-plus"></i>
					Add Quantity
				</button>
				<button class="btn btn-primary item-edit" type="button">
					<i class="fa fa-edit"></i>
					Edit Item
				</button>
				<button class="btn btn-primary item-change" type="button">
					<i class="fa fa-arrows-alt"></i>
					Change Status
				</button>
			</div>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<table class="table ">
							<thead>
							
							</thead>
							<tbody>
								<tr>
									<td style="text-align:center;" class="e_photo" ></td>
								</tr>
								<tr>
									<td class="success col-sm-6">Item ID</td>
									<td class="e_id"></td>
								</tr>
								<tr>
									<td class="col-sm-6">Item Name</td>
									<td class="e_model"></td>
								</tr>
								<tr>
									<td class="success col-sm-6">Category</td>
									<td class="e_category"></td>
								</tr>
								<tr>
									<td class="col-sm-6">Brand</td>
									<td class="e_brand"></td>
								</tr>
								<tr>
									<td class="success col-sm-6">Description</td>
									<td class="e_description"></td>
								</tr>
								<tr>
									<td class="col-sm-6">Quantity</td>
									<td class="e_stock"></td>
								</tr>
								<tr>
									<td class="success col-sm-6">Quantity Left</td>
									<td class="e_stockleft"></td>
								</tr>
								<!-- <tr>
									<td class="col-sm-6">Assign Room</td>
									<td class="e_assign"></td>
								</tr> -->
								<tr>
									<td class="col-sm-6">Type</td>
									<td class="e_type"></td>
								</tr>
								<tr>
									<td class="success col-sm-6">Status</td>
									<td class="e_status"></td>
								</tr>
								<tr>
									<td class="col-sm-6">Added by</td>
									<td class="e_mr"></td>
								</tr>
								<tr>
									<td class="success col-sm-6">Price per Item</td>
									<td class="e_price"></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div><!-- panel -->
			</div><!-- panel -->
		</div>
	</div>


<div class="right-sidebar equipment-info">
	<div class="sidebar-form">
		<div class="container-fluid equipment-forminfo"></div>
		
	</div>
</div>
</div>


<?php include 'footer.php'; ?>

<script type="text/javascript">
	
	var id = '<?php echo $_GET["item"]; ?>';

	equipment_info(id);

	function getequipmentid(){
		return id;
	}
	

</script>