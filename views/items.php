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

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-2 col-lg-10 col-lg-offset-2">
            <div class="row">
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li><a href="dashboard"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                        <li class="active">Item</li>
                    </ol>
                </div>
                	<div class="breadcrumb">
				<button class="btn btn-primary col-sm-offset-10 add_equipment">
					<svg class="glyph stroked plus sign">
						<use xlink:href="#stroked-plus-sign"/>
					</svg> &nbsp;
					Add Item
				</button>
			</div>
            </div>

          <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills">
                <li class="active"><a href="#new" data-toggle="tab"><i class="fa-solid fa-compass-drafting" aria-hidden="true"></i>Tools</a></li>
                <li><a href="#old" data-toggle="tab"><i class="glyph fa fa-flask" aria-hidden="true"></i>Chemicals</a></li>
                <li><a href="#glass" data-toggle="tab"><i class="fa-solid fa-flask-vial"aria-hidden="true"></i>Glasswares</a></li>
                <li><a href="#equip" data-toggle="tab"><i class="glyph fa fa-microscope" aria-hidden="true"></i>Equipment</a></li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="tab-content">

                        <!-- New Tab Content -->
                        <div class="tab-pane fade in active" id="new">
                            <table class="table table-bordered table_equipment">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Item Name</th>
                                        <th>Description</th>
                                        <th>Brand</th>
                                        <th>Description</th>
                                        <th>Quantity</th>
                                        <th>Quantity Left</th>
                                        <th>Date Added</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <!-- Add your table rows (if any) here -->
                                <tbody>
                                    <!-- Your table rows go here -->
                                </tbody>
                            </table>
                        </div> <!-- Closing tag for the New Tab Content -->

                        <!-- Old Tab Content -->
                        <div class="tab-pane fade" id="old">
                            <div class="col-lg-12">
                                <table class="table table-bordered table_inventory_transfer">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Item Name</th>
                                            <th>Description</th>
                                            <th>Quantity</th>
                                            <th>Quantity Left</th>
                                            <th>Date Added</th>
                                            <th>Expiration Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <!-- Add your table rows (if any) here -->
                                    <tbody>
                                        <!-- Your table rows go here -->
                                    </tbody>
                                </table>
                            </div> <!-- Closing tag for the Old Tab Content -->
                        </div>

                        <!-- Glass Tab Content -->
                        <div class="tab-pane fade" id="glass">
                            <div class="col-lg-12">
                                <table class="table table-bordered table_inventory_pulledout">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Item Name</th>
                                            <th>Description</th>
                                            <th>Brand</th>
                                            <th>Quantity</th>
                                            <th>Quantity Left</th>
                                            <th>Date Added</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <!-- Add your table rows (if any) here -->
                                    <tbody>
                                        <!-- Your table rows go here -->
                                    </tbody>
                                </table>
                            </div>
                        </div> <!-- Closing tag for the Glass Tab Content -->

                        <!-- Equip Tab Content -->
                        <div class="tab-pane fade" id="equip">
                            <div class="col-lg-12">
                                <table class="table table-bordered table_inventory_pulled">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Item Name</th>
                                            <th>Description</th>
                                            <th>Brand</th>
                                            <th>Quantity</th>
                                            <th>Quantity Left</th>
                                            <th>Date Added</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <!-- Add your table rows (if any) here -->
                                    <tbody>
                                        <!-- Your table rows go here -->
                                    </tbody>
                                </table>
                            </div> <!-- Closing tag for the Equip Tab Content -->

                    </div> <!-- Closing tag for the tab-content -->

                </div> <!-- Closing tag for the panel-body -->
            </div> <!-- Closing tag for the panel -->
        </div> <!-- Closing tag for the col-lg-12 -->
    </div> <!-- Closing tag for the row -->
</div> <!-- Closing tag for the container-fluid -->


<div class="right-sidebar equipment-side">
	<div class="sidebar-form">
		<div class="container-fluid">
			<h4 class="alert bg-success">
				<svg class="glyph stroked plus sign">
					<use xlink:href="#stroked-plus-sign"/>
				</svg>
				Add Item
			</h4>
			<form class="frm_addequipment" enctype="multipart/form-data">
    <input type="hidden" name="key" value="add_equipment">

    <div class="form-group">
        <label>Item ID</label>
        <input type="text" id="e_number" name="e_number" class="form-control" required>
    </div>

    <script>
        // Generate unique 5-digit ID
        function generateDeviceID() {
            var currentID = parseInt(localStorage.getItem("currentID")) || 11110;
            var deviceID = currentID.toString();
            localStorage.setItem("currentID", currentID + 1);
            return deviceID;
        }

        // Assign generated ID to input field on page load
        document.addEventListener("DOMContentLoaded", function () {
            var deviceIDField = document.getElementById("e_number");
            deviceIDField.value = generateDeviceID();
        });
    </script>

    <div class="form-group">
        <label>Item Name</label>
        <input type="text" name="e_model" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Type</label>
        <select type="text" name="e_category" class="form-control" required>
            <option disabled selected>Please select type</option>
            <option value="chemicals">Chemicals</option>
            <option value="tools">Tools</option>
            <option value="equipment">Equipment</option>
            <option value="glassware">Glassware</option>
        </select>
    </div>

   

    <div class="form-group">
        <label>Brand</label>
        <input type="text" name="e_brand" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Description</label>
        <textarea name="e_description" class="form-control" required></textarea>
    </div>

    <div class="form-group">
        <label>Quantity</label>
        <input type="number" name="e_stock" class="form-control" min="1" required>
    </div>

    <div class="form-group">
        <label>Grams</label>
        <input type="number" name="e_grams" class="form-control">
    </div>

    <div class="form-group">
        <label>Liters</label>
        <div class="input-group">
            <input list="liters" name="e_liter" class="form-control">
            <datalist id="liters">
                <option value="100ml">
                <option value="50ml">
            </datalist>

            <select name="e_liter" class="form-control">
                <option disabled selected hidden>Please select size</option>
                <option>100ml</option>
                <option>50ml</option>
            </select>
        </div>
    </div>

    <div class="form-group hide">
        <label>Assign Room</label>
        <select name="e_assigned" class="form-control" required></select>
    </div>

    <div class="form-group">
        <label>Type</label>
        <select type="text" name="e_type" class="form-control" required>
            <option disabled selected>Please select type</option>
            <option>Consumable</option>
            <option>Non-consumable</option>
        </select>
    </div>

    <div class="form-group">
        <label>Status</label>
        <select name="e_status" class="form-control" required>
            <option disabled selected>Please select status</option>
            <option value="1">New</option>
            <option value="2">Old</option>
        </select>
    </div>

    <div class="form-group">
        <label>Added By:</label>
        <input type="text" name="e_mr" class="form-control" value="<?php echo $_SESSION['admin_username']; ?>" required>
    </div>

    <div class="form-group">
        <label>Price</label>
        <input type="text" name="e_price" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Date Added</label>
        <input type="date" name="e_date_added" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
    </div>

    <div class="form-group" id="chemical-expiration" style="display: none;">
        <label>Date Expiration</label>
        <input type="date" name="e_date_expiration" class="form-control">
    </div>

    <script>
        // Show/hide "Date Expiration" field, set "Type" and hide "Status" based on selected category
        var categoryField = document.querySelector('select[name="e_category"]');
        var chemicalExpiration = document.getElementById("chemical-expiration");
        var typeField = document.querySelector('select[name="e_type"]');
        var statusFormGroup = document.querySelector('.form-group select[name="e_status"]').closest('.form-group');
        var gramsGroup = document.querySelector('.grams-group'); // Define gramsGroup
        var litersGroup = document.querySelector('.liters-group'); // Define litersGroup

        categoryField.addEventListener("change", function () {
            var selectedCategory = categoryField.value;

            if (selectedCategory === "chemicals") {
                chemicalExpiration.style.display = "block";
                typeField.value = "Consumable"; // Automatically set Type to Consumable for Chemicals
            } else {
                chemicalExpiration.style.display = "none";
                typeField.value = "Non-consumable"; // Automatically set Type to Non-consumable for Tools
            }

            // Automatically set Status to New when a new item is added
            if (selectedCategory === "chemicals" || selectedCategory === "tools" || selectedCategory === "glassware" || selectedCategory === "equipment") {
                gramsGroup.style.display = "block";
                litersGroup.style.display = "block";
            } else {
                gramsGroup.style.display = "none";
                litersGroup.style.display = "none";
            }
        });

        // Set the initial state
        categoryField.dispatchEvent(new Event("change"));

        // Set the initial value of Status field to "New" and hide it using CSS
        document.addEventListener("DOMContentLoaded", function () {
            var statusField = document.querySelector('select[name="e_status"]');
            statusField.value = "1"; // Set Status to New
            statusFormGroup.style.display = "none"; // Hide the entire Status form group
        });
    </script>

    <div class="form-group">
        <label>Photo</label>
        <input type="file" name="e_photo" for="inputPassword3" class="form-control" required>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <button class="btn btn-danger btn-block cancel-equipment" type="button">
                    <i class="fa fa-remove"></i>
                    CANCEL
                </button>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <button class="btn btn-primary btn-block" type="submit">
                    ADD
                    <i class="fa fa-check"></i>
                </button>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
</form>

<div class="right-sidebar equipment-view">
	<div class="sidebar-form equipment-form">
		
	</div>
</div>



<?php include 'footer.php'; ?>
</div>