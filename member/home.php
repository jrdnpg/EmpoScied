<?php 
date_default_timezone_set('Asia/Manila');
include 'header.php';
?>

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 col-md-2 sidebar">
    <ul class="nav menu">
        <li class="">
            <a href="#">
                <img alt="Brand" class="img" src="logo2.png">
            </a>
        </li>
        <form role="search">
            <div class="form-group">
                <!-- <input type="text" class="form-control" placeholder="Search"> -->
            </div>
        </form>
        <ul class="nav menu">
            <li class="active">
                <a href="#">
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
    </ul>
</div><!--/.sidebar-->

<div class="row-fluid">
    <div class="col-md-12 main">
        <div class="col-sm-9 col-lg-10 col-md-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-3">

            <div class="row">
                    <div class="col-sm-8">
                        <h1 class="page-header h2 mb-0 text-gray-800">Categories</h1>
                    </div>
                </div><!--/.row-->
               <br>
               <br>
               <br>
               <br>
               <br>
               <br>
          <div class="row">
                    <div class="col-xs-12 col-md-6 col-lg-3" onclick="window.location.href='tools'">
                        <div class="panel panel-white panel-widget">
                            <div class="row no-padding">
                                <div class="col-sm-9 col-lg-7 widget-right" style="cursor: pointer;">
                                    <div class="large count_tool">120</div>
                                    <div class="text-muted">Tools</div>
                                </div>
                                <div class="col-sm-3 col-lg-5 widget-left" style="cursor: pointer;">
                                    <img src="images/tool.png" alt="Pending Icon" style="width: 3.5em; height: 3.5em;"/>
                                </div>
                            </div>
                        </div>
                    </div>

  <div class="col-xs-12 col-md-6 col-lg-3" onclick="window.location.href='chemicals'">
                        <div class="panel panel-white panel-widget">
                            <div class="row no-padding">
                                <div class="col-sm-9 col-lg-7 widget-right" style="cursor: pointer;">
                                    <div class="large count_che">52</div>
                                    <div class="text-muted">Chemicals</div>
                                </div>
                                <div class="col-sm-3 col-lg-5 widget-left" style="cursor: pointer;">
                                    <img src="images/chemicals.png" alt="Accepted Icon" style="width: 3em; height: 3em;"/>
                                </div>
                            </div>
                        </div>
                    </div>

    <div class="col-xs-12 col-md-6 col-lg-3" onclick="window.location.href='glasssware'">
                        <div class="panel panel-white panel-widget">
                            <div class="row no-padding">
                                <div class="col-sm-9 col-lg-7 widget-right" style="cursor: pointer;">
                                    <div class="large count_che">52</div>
                                    <div class="text-muted">Glassware</div>
                                </div>
                                <div class="col-sm-3 col-lg-5 widget-left" style="cursor: pointer;">
                                    <img src="images/glassware.png" alt="Accepted Icon" style="width: 3em; height: 3em;"/>
                                </div>
                            </div>
                        </div>
                    </div>

<div class="col-xs-12 col-md-6 col-lg-3" onclick="window.location.href='equip'">
                        <div class="panel panel-white panel-widget">
                            <div class="row no-padding">
                                <div class="col-sm-9 col-lg-7 widget-right" style="cursor: pointer;">
                                    <div class="large count_che">52</div>
                                    <div class="text-muted">Equipments</div>
                                </div>
                                <div class="col-sm-3 col-lg-5 widget-left" style="cursor: pointer;">
                                    <img src="images/equipment.png" alt="Accepted Icon" style="width: 3em; height: 3em;"/>
                                </div>
                            </div>
                        </div>
                    </div>


            <hr/>

            <?php include 'footer.php'; ?>

            <script type="text/javascript">
            $(document).ready(function(){
                $("#timeLimit").datetimepicker({
                    minTime: '<?php echo date("H:i"); ?>',
                    maxTime: '18:00',
                    minDate: 0,
                    format:'Y-m-d h:i A',
                    step: 15
                });
            });
            </script>
