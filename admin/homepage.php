<?php
session_start();
if (!isset($_SESSION['currentUser'])) {
    $m = "Please Login First";
    echo "<script type='text/javascript'>
    alert('$m');
    window.location.replace('../index.php');
    </script>";
}
if ($_SESSION['currentUserType'] == "user") {
    session_destroy();
    $m = "Unauthorized Access";
    echo "<script type='text/javascript'>
    alert('$m');
    window.location.replace('../index.php');
    </script>";
}
?> 
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="../images/mgbcarlogo.png" rel="icon" type="image/png">
    <title>MGB-CAR | GEOSCIENCES DIVISION</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div id="wrapper">

        <!-- NAVIGATION -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

            <!-- NAVBAR HEADER -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img src="../images/mgbcarlogo.png" width="45px" height="45px">
                <a href="homepage.php" style="text-shadow: 0 0 3px #026603; font-size: 20px">MINES AND GEOSCIENCES BUREAU - CORDILLERA ADMINISTRATIVE REGION | GEOSCIENCES DIVISION</a>

            </div>
            <!-- NAVBAR HEADER END -->

            <ul class="nav navbar-top-links navbar-right">
                <li><p><b>
                    <?php
                    echo strtoupper($_SESSION['currentUser']);
                    ?>
                </b></p>
            </li>

            <!-- DROPDOWN -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a></li>
                    <li class="divider"></li>

                    <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
            </li>
            <!-- DROPDOWN END -->

        </ul>

        <!-- SIDEBAR-->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">

                <ul class="nav" id="side-menu">
                    <li>
                        <a href="homepage.php"><i class="fa fa-search fa-fw"></i>For Inspection</a>
                    </li>
                    <li>
                        <a href="unclaim.php"><i class="fa fa-file fa-fw"></i>Received</a>
                    </li>
                    <li>
                        <a href="release.php"><i class="fa fa-file-text fa-fw"></i> Release</a>
                    </li>
                    <li>
                        <a href="records.php"><i class="fa fa-folder fa-fw"></i>Records</a>
                    </li>
                    <li>
                        <a href="users.php"><i class="fa fa-user fa-fw"></i>Users</a>
                    </li>
                    <li>
                        <a href="logs.php"><i class="fa fa-th-list fa-fw"></i>Logs</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- SIDEBAR END -->

    </nav>
    <!-- NAVIGATION END -->

    <!-- MAIN PAGE -->
    <div id="page-wrapper">

        <!-- PAGE HEADER -->
        <div class="row">

            <div class="col-lg-12">
                <h1 class="page-header">For Inspection Form</h1>
            </div>
        </div>
        <!-- PAGE HEADER END -->
        <!-- FORM -->
        <form action="php/addIncoming.php" method="post">
            <!-- BODY -->
            <div class="row">
                <!-- PANEL -->
                <div class="col-lg-12">
                    <div class="panel panel-green">

                        <!-- PANEL HEADER START -->
                        <div class="panel-heading">
                        </div>
                        <!-- PANEL HEADER END -->

                        <!-- PANEL BODY -->
                        <div class="panel-body">
                            <!--ROW START -->
                            <div class="row">
                                <!-- ACTION SLIP -->
                                <div class="col-lg-4">
                                    <div class="panel panel-green">
                                        <!-- ACTION SLIP PANEL HEADING -->
                                        <div class="panel-heading">
                                            DOCUMENT ACTION SLIP
                                        </div>
                                        <!-- ACTION SLIP PANEL HEADING END -->

                                        <!-- ACTION SLIP PANEL BODY -->
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <div class="checkbox">
                                                    <label>
                                                        <input name="action[]" type="checkbox" value="Information and
                                                        guidance please.">Information and
                                                        guidance please.
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input name="action[]" type="checkbox" value="Compliance/Implementation
                                                        please.">Compliance/Implementation
                                                        please.
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input name="action[]" type="checkbox" value="Appropriate Action
                                                        please.">Appropriate Action
                                                        please.
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input name="action[]" type="checkbox" value="Immediate
                                                        Investigation please.">Immediate
                                                        Investigation please.
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input name="action[]" type="checkbox" value="Comment and
                                                        recommendation please.">Comment and
                                                        recommendation please.
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input name="action[]" type="checkbox" value="Review and inital
                                                        please.">Review and inital
                                                        please.
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input name="action[]" type="checkbox" value="Discussion/Dissemination/Posting
                                                        please.">Discussion/Dissemination/Posting
                                                        please.
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input name="action[]" type="checkbox" value="Record/File
                                                        please.">Record/File
                                                        please.
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    Action Desired:
                                                </label>
                                                <div class="checkbox">
                                                    <label>
                                                        <input name="actiondesired[]" type="checkbox" value="Give me
                                                        status/feedback please.">Give me
                                                        status/feedback please.
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input name="actiondesired[]" type="checkbox" value="Please
                                                        attend to this.">Please
                                                        attend to this.
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input name="actiondesired[]" type="checkbox" value="Please
                                                        represent to me.">Please
                                                        represent to me.
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input name="actiondesired[]" type="checkbox" value="Please see
                                                        me about this.">Please see
                                                        me about this.
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input name="actiondesired[]" type="checkbox" value="Please
                                                        prepare reply.">Please
                                                        prepare reply.
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input name="actiondesired[]" type="checkbox" value="Please
                                                        submit report.">Please
                                                        submit report.
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input name="actiondesired[]" type="checkbox" value="Please
                                                        inform pary concerned.">Please
                                                        inform pary concerned.
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input name="actiondesired[]" type="checkbox" value="Please
                                                        schedule.">Please
                                                        schedule.
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input name="actiondesired[]" type="checkbox" value="Please
                                                        respond directly.">Please
                                                        respond directly.
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>OIC-RD</label>
                                                <input name="oicrd" type="text" class="form-control"
                                                placeholder="Enter Full Name">
                                            </div>
                                            <div class="form-group">
                                                <label>Note</label>
                                                <textarea name="note" class="form-control" rows="2"></textarea>
                                            </div>
                                        </div>
                                        <!-- ACTION SLIP PANEL BODY END -->

                                    </div>
                                </div>
                                <!-- ACTION SLIP END -->

                                <!-- MAIN FORM -->
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label>Code</label>
                                        <input name="code" type="text" class="form-control" placeholder="Enter Code" required>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label>Folder</label>
                                        <input id="folderNo" name="folder" type="text" class="form-control"
                                        placeholder="Folder No." disabled required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Date Received</label>
                                        <input name="date" id="date" type="date" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label>Applicant</label>
                                        <input name="applicant" type="text" class="form-control"
                                        placeholder="Enter Full Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label>Sender</label>
                                        <input name="sender" type="text" class="form-control"
                                        placeholder="Enter Full Name">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-4">
                                        <label>Location</label>
                                        <?php
                                        require 'config.php';


                                        $sql = "SELECT * FROM barangay ORDER BY name ASC";
                                        $res = $db->query($sql);
                                        echo "<select id='barangay' data-num='0' class='form-control' name='barangay[0]' required>";
                                        echo "<option val='nosel' selected disabled>Select Barangay</option>";
                                        while ($row = $res->fetch_assoc()) {
                                            echo "<option value = '" . $row['barangayID'] . "'>" . $row['name'] . "</option>";
                                        }
                                        echo "</select>";


                                        ?>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>For Other Barangay/Municipality</label>
                                        <input id="brgyname0" disabled name="brgyname[0]" class="form-control" placeholder="Enter Name" required>
                                    </div>
                                    <div class="col-lg-8">
                                        <input name="municipality[0]" id="m0" class="form-control" placeholder="Municipality" required>
                                        <input name="province[0]" id="p0" class="form-control" placeholder="Province" required>
                                        <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#addLocation">Add Location
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Purpose</label>
                                        <textarea name="purpose" class="form-control" rows="14"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- ROW END -->
                    </div>
                    <!-- PANEL BODY END -->

                    <!-- PANEL FOOTER -->
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-lg-12" align="center">
                                
                                <input type="submit" class="btn btn-success" value="Add Record"/>
                                <button type="reset" class="btn btn-primary">Reset</button>
                            </div>
                        </div>
                    </div>
                    <!-- PANEL FOOTER END -->



                </div>
            </div>
            <!-- PANEL END-->
            <!-- MODAL -->
            <div class="modal fade" id="addLocation" role="dialog">
                <!-- MODAL CONTENT-->
                <div class="modal-dialog">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add More Location</h4>
                        </div>
                        <!-- MODAL BODY -->
                        <div class="modal-body">
                            <div class="row">

                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <input id="numofinput" class="form-control" placeholder="No. of Location to Add">
                                    </div>
                                </div>
                                <button id="addlocation" type="button" class="btn btn-success">Go</button>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div id="location" class="form-group">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- MODAL BODY END-->
                        <!-- MODAL FOOTER -->
                        <div class="modal-footer">
                            <button onclick="$('#addLocation').modal()" type="button" class="btn btn-success">Add Location</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                        <!-- MODAL FOOTER END -->
                    </div>
                    <!-- MODAL CONTENT END -->
                </div>
            </div>
            <!-- MODAL END -->
        </div>
        <!-- BODY END -->
    </form>
    <!-- FORM END -->
</div>
<!-- MAIN PAGE END -->
</div>

<!-- jQuery -->
<script src="vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="vendor/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="vendor/raphael/raphael.min.js"></script>
<script src="js/bootstrap-notify.js"></script>
<script src="vendor/morrisjs/morris.min.js"></script>
<script src="data/morris-data.js"></script>

<!-- Custom Theme JavaScript -->
<script src="dist/js/sb-admin-2.js"></script>

</body>

<script src="js/addData.js"></script>

<script src="js/addMessage.js"></script>

</html>
