<?php 
date_default_timezone_set('Asia/Manila');
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
		<li class="parent active">
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
				<li class="active">
					<a class="" href="#">
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

<div class="col-sm-9 col-lg-10 col-md-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-3">

	<div class="row">
		<ol class="breadcrumb">
			<li><a href="dashboard"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li class="active">Borrow</li>
		</ol>
				
			<div class="row">
				<br/>
				<br/>
				
				<div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2">
					<div class="panel panel-primary custom-panel">
						<div class="panel-heading">
							<i class="fa fa-plus-circle"></i>
							Borrow Item/s
						</div>

						
					<div class="panel-body">
    <form class="frm_borrow">
        <div class="form-group">
            <label class="">Select Borrower</label>
            <select class="form-control input-lg" name="borrow_membername" required="required">
                <option></option>
            </select>
        </div>

        <div class="form-group">
            <label class="">Select Items</label>
            <select class="form-control input-lg borrowitem2" name="borrowitem[]" multiple="multiple" required="required">
                <option></option>
            </select>
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['admin_id']; ?>">
        </div>

    <!-- New input field for Quantity -->
            <div class="form-group">
                <label class="col-md-3 control-label" for="quantity">Select Quantity:</label>
                <div class="col-md-9">
                    <select class="form-control" name="quantity" id="quantity">
                        <?php
                        // Generate options from 1 to 500
                        for ($i = 1; $i <= 500; $i++) {
                            echo "<option value=\"$i\">$i</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>



        <div class="form-group">
            <label>Select Room</label>
            <select class="form-control" name="reserve_room" required></select>
        </div>

        <div class="form-group">
            <label class="">Time Limit</label>
            <input name="expected_time_of_return" id="timeLimit" type="text" class="form-control" value="<?php echo date('Y-m-d h:i A'); ?>" />
        </div>

        <div class="form-group">
            <div class="pull-right">
                <button class="btn btn-primary" type="submit">
                    Confirm Borrow
                    <i class="fa fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </form>
</div>




		<?php include 'footer.php'; ?>


		<script>
    document.addEventListener("DOMContentLoaded", function () {
        var borrowForm = document.querySelector('.frm_borrow');

        borrowForm.addEventListener('submit', function (e) {
            e.preventDefault(); // Prevent the default form submission

            // Get user-inputted quantity
            var quantityInput = document.querySelector('[name="quantity"]');
            var quantity = quantityInput.value;

            // Get form data
            var formData = new FormData(borrowForm);

            // Append the quantity to the form data
            formData.append('quantity', quantity);

            // Make an AJAX request to submit the form data
            fetch('display/display.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                // Handle the response from the server
                if (data.response === 1) {
                    // Successfully submitted
                    alert(data.message);
                    // Optionally, you can redirect or perform other actions
                } else {
                    // Failed to submit
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });
</script>


		<script type="text/javascript">
			$(document).ready(function(){
				$("#timeLimit").datetimepicker({
					minTime: '<?php echo date("H:i"); ?>',
					maxTime: '18:00',
					minDate: 0,
					maxDate: 0,
					format:'Y-m-d h:i A',
					step: 15
				});
			});
		</script>
		<script type="text/javascript">
	
	var id = '<?php echo $_GET["item"]; ?>';

	equipment_info(id);

	function getequipmentid(){
		return id;
	}
	

</script>