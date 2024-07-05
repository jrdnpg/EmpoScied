<?php 
	include 'header.php';
?>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

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
			<li class="active">
				<a href="#">
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
	<div class="col-sm-9 col-lg-10 col-md-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-3">
		
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="dashboard"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Inventory</li>
			</ol>
			<div class="breadcrumb">
				<div class="row">
					<div class="col-md-12">
						<ul class="nav nav-pills">
							
							<li><a href="#old" data-toggle="tab"><i class="fa-solid fa-clock-rotate-left"></i>Expiring Chemicals</a></li>
							<li><a href="#exp" data-toggle="tab"><i class="fa-solid fa-triangle-exclamation"></i>Expired Chemicals</a></li>
							
							<li><a href="#lost" data-toggle="tab"><i class="fa-solid fa-circle-question"></i>Lost</a></li>
							<li><a href="#damaged" data-toggle="tab"><i class="fa-solid fa-heart-crack"></i>Damaged</a></li>
							<!-- <li><a href="#pulledout" data-toggle="tab"><i class=""></i>&nbsp;&nbsp;Total Items</a></li> -->
							<li><a href="#report2" data-toggle="tab"><i class="fa-solid fa-handshake"></i>Borrowed</a></li>
						</ul>
					</div>
					<!-- <div class="col-md-2">
						<button class="btn btn-primary add_equipment ">
							<svg class="glyph stroked plus sign">
								<use xlink:href="#stroked-plus-sign"/>
							</svg> &nbsp;
							Add Equipment
						</button>
					</div> -->
				</div>
			</div>
		</div><!--/.row-->


		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="tab-content">
							
							<div class="tab-pane fade in active" id="old">
								<table class="table table-bordered table_inventory_old">
									<thead>
										<tr>
											<th>Image</th>
											<th>Item Name</th>
											<th>Description</th>
											<th>Quantity</th>
											<th>Expiration Date</th>
										</tr>
									</thead>
								</table>
							</div>


							<div class="tab-pane fade" id="exp">
								<table class="table table-bordered table_inventory_exp">
									<thead>
										<tr>
											<th>Image</th>
											<th>Item Name</th>
											<th>Description</th>
											<th>Quantity</th>
											<th>Expiration Date</th>
											<th>Remarks</th>
											<th>Action</th>

										</tr>
									</thead>
								</table>
							</div>

							<div class="tab-pane fade" id="pulled">
								<table class="table table-bordered table_inventory_notiff">
									<thead>
										<tr>
											<th>Image</th>
											<th>Item Name</th>
											<th>Description</th>
											<th>Quantity</th>
											<th>Quantity Left</th>
										</tr>
									</thead>
								</table>
							</div>
							<div class="tab-pane fade" id="lost">
								<table class="table table-bordered table_inventory_lost">
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
								<table class="table table-bordered table_inventory_damaged">
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
							<!-- <div class="tab-pane fade" id="pulledout">
								<table class="table table_inventory_all">
									<thead>
										<tr>
											<th>Category</th>
											<th>New</th>
											<th>(Old / Damage / Lost / Borrowed / Transferred)</th>
											<th>Total</th>
										</tr>
									</thead>
								</table>
							</div> -->
							
							<div class="tab-pane fade" id="transferred">
								<div class="row">
									<div class="col-sm-1 pull-right">
										<div class="form-group text-right">
											<button type="button" class="btn btn-primary" id="btnReloadTransferredList">Reload List</button>
										</div>
									</div>
									<div class="col-sm-3 pull-right">
										<div class="form-group">
											<select id="selectYearTransferred" class="form-control">
												<option value="">Show All</option>
												<?php
												$currentYear = date('Y');
												for($i = $currentYear; $i >= ($currentYear - 15); $i--): 
												?>
													<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
												<?php endfor; ?>
											</select>
										</div>
									</div>
									<div class="col-sm-3 pull-right">
										<div class="form-group">
											<select id="selectMonthTransferred" class="form-control">
												<option value="">Show All</option>
												<?php 
												$monthArr = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
												for($i = 0; $i < 12; $i++): 
													$month = ($i + 1);
												?>
													<option value="<?php echo $month; ?>"><?php echo $monthArr[$i]; ?></option>
												<?php endfor; ?>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<table class="table table-bordered table_inventory_transfer">
											<thead>
												<tr>
													<th>Item Name</th>
													<th>Category</th>
													<th>Brand</th>
													<th>No. of items</th>
													<th>Room</th>
													<th>Person-in-charge</th>
													<th>User</th>
													<th>Date Transferred</th>
												</tr>
											</thead>
										</table>
									</div>
								</div>
							</div>
							
							<div class="tab-pane fade" id="report2">
								<div class="row">
									<div class="col-sm-1 pull-right">
										<div class="form-group text-right">
											<button type="button" class="btn btn-primary" id="btnReloadList">Reload List</button>
										</div>
									</div>
									<div class="col-sm-3 pull-right">
										<div class="form-group">
											<select id="selectYear" class="form-control">
												<option value="">Year</option>
												<?php
												$currentYear = date('Y');
												for($i = $currentYear; $i >= ($currentYear - 15); $i--): 
												?>
													<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
												<?php endfor; ?>
											</select>
										</div>
									</div>
									<div class="col-sm-3 pull-right">
										<div class="form-group">
											<select id="selectMonth" class="form-control">
												<option value="">Month</option>
												<?php 
												$monthArr = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
												for($i = 0; $i < 12; $i++): 
													$month = ($i + 1);
												?>
													<option value="<?php echo $month; ?>"><?php echo $monthArr[$i]; ?></option>
												<?php endfor; ?>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<table class="table tbl_return">
											<thead>										
												<tr>										 
													<th>Borrower</th>
													<th>Items</th>
													<th>Borrowed Date</th>
													<th>Returned Date</th>
													
												</tr>
											</thead>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!-- panel -->
			</div><!-- panel -->
		</div><!-- row -->


	</div>
</div>

<!-- Add jQuery library if not already included -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
$(document).ready(function() {
    // Attach a click event to the disposal button
    $('.btn-dispose').click(function() {
        // Get the item ID from the data attribute
        var itemId = $(this).data('item-id');

        // Perform an AJAX request to the server to handle disposal
        $.ajax({
            type: 'POST',
            url: 'your_php_script.php', // Change to the actual path of your PHP script
            data: { item_id: itemId },
            success: function(response) {
                // Handle the response (optional)
                console.log(response);

                // Reload or update the table after successful disposal
                // You may need to customize this part based on your needs
                // For example, if you're using DataTables, you can call:
                // $('.table_equipment').DataTable().ajax.reload();
            },
            error: function(error) {
                // Handle errors (optional)
                console.error(error);
            }
        });
    });
});
</script>

<script>
$(document).ready(function () {
    // Use a class selector instead of an id selector for dynamically generated buttons
    $('.btn-dispose').on('click', function () {
        var itemId = $(this).data('item-id');

        // Send an AJAX request to handle the disposal
        $.ajax({
            url: '../class/display/display',
            type: 'POST',
            data: {
                key: 'display_inventory_expired',
                item_id: itemId
            },
            success: function (response) {
                // Handle the success response as needed
                if (response.success) {
                    console.log('Item disposed successfully'); // Log to console for debugging
                    // Reload the DataTable after successful disposal
                    $('.table_inventory_exp').DataTable().ajax.reload();
                } else {
                    console.error('Item disposal failed'); // Log to console for debugging
                    // Handle the case where the disposal was not successful
                }
            },
            error: function () {
                console.error('AJAX error'); // Log to console for debugging
                // Handle the AJAX error
            }
        });
    });
});
</script>

<style type="text/css">
    .dataTables_wrapper .table_inventory_lost thead tr {
        background-color: #ffffff !important; /* Set the header background color to white */
    }

    .dataTables_wrapper .table_inventory_lost tbody tr,
    .dataTables_wrapper .table_inventory_damaged tbody tr {
        background-color: #dddddd !important; /* Use your preferred shade of gray for the body */
    }

    .dataTables_wrapper .table_inventory_lost tr.selected,
    .dataTables_wrapper .table_inventory_lost tr.permanent-selected,
    .dataTables_wrapper .table_inventory_damaged tr.selected,
    .dataTables_wrapper .table_inventory_damaged tr.permanent-selected {
        background-color: inherit !important; /* Override the background for selected rows */
    }
</style>



<?php include 'footer.php'; ?>