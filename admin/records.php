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
    <title>MGB | GEOSCIENCES DIVISION</title>

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

            <!-- NAV HEADER -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="homepage.php" style="text-shadow: 0 0 3px #FF0000;">MINES AND GEOSCIENCES BUREAU | GEOSCIENCES DIVISION</a>
            </div>
            <!-- NAV HEADER END -->

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
                            <a href="unclaim.php"><i class="fa fa-file fa-fw"></i>Receive</a>
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
                    <h1 class="page-header">Records</h1>
                </div>
            </div>
            <!-- PAGE HEADER END-->

            <!-- BODY -->
            <div class="row">
                <div class="col-lg-12">

                    <!-- PANEL -->
                    <div class="panel panel-default">

                        <!-- PANEL HEADER -->
                        <div class="panel-heading"> 
                        </div>
                        <!-- PANEL HEADER END -->
                        
                        <!-- PANEL BODY -->
                        <div class="panel-body">
                            <!-- TABLE -->
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Folder</th>
                                        <th>Date Received</th>
                                        <th>Applicant</th>
                                        <th>Sender</th>
                                        <th>Location</th>
                                        <th>Purpose</th>
                                        <th>Status</th>
                                        <th hidden>Record ID</th>
                                        <th hidden>Inspector</th>
                                        <th hidden>Date Inspected</th>
                                        <th hidden>Document Date</th>
                                        <th hidden>Subject</th>
                                        <th hidden>Classification</th>
                                        <th hidden>scanFile</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require 'config.php';

                                    $sql = "SELECT *,b.folderNumber AS bf,b.name as bn FROM actionslip JOIN receive r on actionslip.actionslipID = r.actionslipID JOIN location l on r.locationID = l.locationID JOIN barangay b on l.barangayID = b.barangayID
                                        inner join records on records.receiveID = r.receiveID
                                        left join unclaim on unclaim.unclaimID = records.unclaimID";
                                    $res = $db->query($sql);
                                    while ($row = $res->fetch_assoc()){
                                        echo "<tr style=cursor:pointer>";
                                        echo "<td>" . $row['code'] . "</td>";
                                        echo "<td>" . $row['bf'] . "</td>";
                                        echo "<td>" . $row['dateReceived'] . "</td>";
                                        echo "<td>" . $row['applicant'] . "</td>";
                                        echo "<td>" . $row['sender'] . "</td>";
                                        echo "<td>" . $row['bn']. "," . $row['municipality'] . "," . $row['province'] . "</td>";
                                        echo "<td>" . $row['purpose']."</td>";
                                        if($row['status'] == 'inspection' ){
                                            $status = 'For Inspection';
                                        }else if($row['status'] == 'unclaim'){
                                            $status = 'Unclaimed';
                                        }else{
                                            $status = 'Released';
                                        }
                                        echo "<td>" . $status ."</td>";
                                        echo "<td hidden>" . $row['recordID']."</td>";
                                        echo "<td hidden>" . $row['inspector']."</td>";
                                        echo "<td hidden>" . $row['dateInspected']."</td>";
                                        echo "<td hidden>" . $row['documentDate']."</td>";
                                        echo "<td hidden>" . $row['subject']."</td>";
                                        echo "<td hidden>" . $row['classification']."</td>";
                                        echo "<td hidden>" . $row['scanFile']."</td>";
                                        echo "</tr>";
                                    }

                                    ?>
                                </tbody>
                            </table>
                            <!-- TABLE END -->
                        </div>
                        <!-- PANEL BODY END -->

                        <!-- PANEL FOOTER -->
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-lg-10">
                                </div>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addRecord">Add Record</button>
                            </div>
                        </div>
                        <!-- PANEL FOOTER END -->
                    </div>
                    <!--PANEL END -->
                    <form method="POST" action="php/addRecords.php" enctype="multipart/form-data">
                        <!-- MODAL -->
                        <div class="modal fade" id="addRecord" role="dialog">
                            <!-- MODAL CONTENT-->
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Add New Record</h4>
                                    </div>
                                    <!-- MODAL BODY -->
                                    <div class="modal-body">
                                        <div class="row">
                                            <!-- ACTION SLIP -->
                                            <div class="col-lg-4">
                                                <div class="panel panel-default">
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
                                                            <input name="action[]" type="checkbox" value="Information and guidance please">Information and guidance please.
                                                        </label>
                                                        </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input name="action[]" type="checkbox" value="Compliance/Implementation
                                                            please">Compliance/Implementation
                                                            please.
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input name="action[]" type="checkbox" value="">Appropriate Action
                                                            please.
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input name="action[]" type="checkbox" value="">Immediate
                                                            Investigation please.
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input name="action[]" type="checkbox" value="">Comment and
                                                            recommendation please.
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input name="action[]" type="checkbox" value="">Review and inital
                                                            please.
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input name="action[]" type="checkbox" value="">Discussion/Dissemination/Posting
                                                            please.
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input name="action[]" type="checkbox" value="">Record/File
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
                                                            status/feedback please">Give me
                                                            status/feedback please.
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input name="actiondesired[]" type="checkbox" value="Please
                                                            attend to this">Please
                                                            attend to this.
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input name="actiondesired[]" type="checkbox" value="Please
                                                            represent to me">Please
                                                            represent to me.
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input name="actiondesired[]" type="checkbox" value="Please see
                                                            me about this">Please see
                                                            me about this.
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input name="actiondesired[]" type="checkbox" value="Please
                                                            prepare reply">Please
                                                            prepare reply.
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input name="actiondesired[]" type="checkbox" value="Please
                                                            submit report">Please
                                                            submit report.
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input name="actiondesired[]" type="checkbox" value="Please
                                                            inform pary concerned">Please
                                                            inform pary concerned.
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input name="actiondesired[]" type="checkbox" value="Please
                                                            schedule">Please
                                                            schedule.
                                                        </label>
                                                        <label>
                                                            <input name="actiondesired[]" type="checkbox" value="Please
                                                            respond directly">Please
                                                            respond directly.
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>OICRD</label>
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
                                                <input name="code" type="text" class="form-control" placeholder="Enter Code">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label>Folder</label>
                                                <input id="folderNo" name="folder" type="text" class="form-control"
                                                placeholder="Folder No." disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Date Received</label>
                                                <input name="date" id="date" type="date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label>Applicant</label>
                                                <input name="applicant" type="text" class="form-control"
                                                placeholder="Enter Full Name">
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


                                                $sql = "SELECT * FROM barangay ORDER BY name ASC";
                                                $res = $db->query($sql);
                                                echo "<select id='barangay' class='form-control' name='barangay'>";
                                                echo "<option selected disabled>Select Barangay</option>";
                                                while ($row = $res->fetch_assoc()) {
                                                    echo "<option value = '" . $row['barangayID'] . "'>" . $row['name'] . "</option>";
                                                }
                                                echo "</select>";


                                                ?>
                                            </div>
                                            <div class="col-lg-4">
                                                <label>For Other Barangay/Municipality</label>
                                                <input disabled name="brgyname" class="form-control" placeholder="Enter Name">
                                            </div>
                                            <div class="col-lg-8">
                                                <input name="municipality" class="form-control" placeholder="Municipality">
                                                <input name="province" class="form-control" placeholder="Province">
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
                                        <!-- MAIN FORM END -->
                                    </div>
                                    <!-- ROW -->
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Inspection Date</label>
                                                <input class="form-control" type="date" name="date" id="date" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label>Inspector</label>
                                                <input name="inspector" class="form-control" placeholder="Enter Full Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Document Date</label>
                                                <input class="form-control" type="date" name="docudate" id="date" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label>Classification</label>
                                                <select name="classification" class="form-control">
                                                    <option>Evacuation Site</option>
                                                    <option>Geohazard Assesment</option>
                                                    <option>GIR</option>
                                                    <option>Government Projects</option>
                                                    <option>OGI Report</option>
                                                    <option>Reinvestigation</option>
                                                    <option>Sanitary Landfill Site</option>
                                                    <option>Other OGI</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label>Subject</label>
                                                    <textarea name="subject" class="form-control" rows="2"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ROW END-->
                                    <!-- ROW -->
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Date Release</label>
                                                <input class="form-control" type="date" name="drelease" id="date" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label>Receive By.</label>
                                                <input name="receiver" class="form-control" placeholder="Enter Full Name">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ROW END-->
                                    <!-- ROW -->
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Upload File</label>
                                                <input type="file" name="scannedFile">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ROW END-->    
                                </div>
                                <!-- MODAL BODY END-->
                                <!-- MODAL FOOTER -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Add Record</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                                <!-- MODAL FOOTER END -->
                        </div>
                        <!-- MODAL CONTENT END -->
                    
                    </div>


                </div>
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
                                <button type="button" class="btn btn-success">Add Location</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                            <!-- MODAL FOOTER END -->
                        </div>
                        <!-- MODAL CONTENT END -->
                    </div>
                </div>
                <!-- MODAL END -->
            </form>
            <!-- MODAL END -->
        </div>
    </div>
    <!-- BODY END -->
</div>
<!-- MAIN PAGE END -->
</div>

<!-- MODAL -->
                    <form action="php/unclaim.php" method="POST">
                        <div class="modal fade" id="recordinfo" role="dialog">
                            <!-- MODAL CONTENT-->
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title" align="center">Document Information</h4>
                                    </div>
                                    <!-- MODAL BODY -->
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div>
                                                    <label>Code:</label> <span id="code"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div>
                                                    <label>Folder No:</label> <span id="fNo"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div>
                                                    <label>Date Received:</label> <span id="dateReceived"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div>
                                                    <label>Applicant:</label> <span id="applicant"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div>
                                                    <label>Sender:</label> <span id="sender"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div>
                                                    <label>Location/s:</label> <span id="location"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div>
                                                    <label>Purpose:</label> <span id="purpose"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div>
                                                    <label>Date Inspected:</label> <span id="dateInspected"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div>
                                                    <label>Document Date:</label> <span id="documentDate"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div>
                                                    <label>Inspector:</label> <span id="inspector"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div>
                                                    <label>Classification:</label> <span id="classification"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div>
                                                    <label>Subject:</label> <span id="subject"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div>
                                                    <label>Date Released:</label> <span id="dateReleased"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div>
                                                    <label>Receive By:</label> <span id="receiver"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div hidden id="uploadForm" class="row">
                                            <h4 class="modal-title" align="center">Upload Scanned File</h4>
                                             <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Upload File</label>
                                                <input type="file" name="scannedFile">
                                            </div>
                                            </div>
                                        </div>
                                       
                                    </div>
                                    <!-- MODAL BODY END-->
                                    <!-- MODAL FOOTER -->
                                    <div class="modal-footer">
                                        <button name="printRecord" id="printRecord" class="btn btn-success">Print</button>
                                        <button name="editRecord" id="editRecord" class="btn btn-primary">Edit</button>
                                        <button name="archiveRecord" id="archiveRecord" type="button" class="btn btn-danger" data-dismiss="modal">Archive</button>
                                    </div>
                                    <!-- MODAL FOOTER END -->
                                </div>
                                <!-- MODAL CONTENT END -->
                            </div>
                        </div>
                    </form>
                    <!-- MODAL END -->


<!-- jQuery -->
<script src="vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="vendor/metisMenu/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="dist/js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $('#addlocation').click(function(){
        var numberOfInputs = $('#numofinput').val();
        var label = '<label>Location</label>';
        var input = '<input class="form-control" placeholder="Barangay">'+
        '<input class="form-control" placeholder="Province">'+
        '<input class="form-control" placeholder="Municipality">';
        for(i=1; i <= numberOfInputs; i++){
            $('#location').append(label+input);
        }

    })
</script>

</body>
<script>
    $(document).ready(function () {
        var table = $('#dataTables-example').DataTable({
            responsive: true
        });
          $('#dataTables-example tbody').on( 'click', 'tr', function () {
            var data = table.row( this ).data();
            if(data[14]){
                $('#releaseForm').removeAttr('hidden');
                $('#uploadForm').attr('hidden','hidden');
            }else{
                $('#uploadForm').removeAttr('hidden');
                $('#releaseForm').attr('hidden','hidden');
            }
            $('#code').html(data[0]);
            $('#fNo').html(data[1]);
            $('#dateReceived').html(data[2]);
            $('#applicant').html(data[3]);
            $('#sender').html(data[4]);
            $('#location').html(data[5]);
            $('#purpose').html(data[6]);
            $('#recordID').val(data[8]);
            $('#inspector').html(data[9]);
            $('#dateInspected').html(data[10]);
            $('#documentDate').html(data[11]);
            $('#subject').html(data[12]);
            $('#classification').html(data[13]);
            $('#editUnclaim').modal();
        } );
        $('#barangay').change(function () { $id = $(this).val();
            $.ajax({
                url: 'folderNo.php',
                data: {barangay: $id},
                dataType: 'JSON',
                success: function (data) {
                    console.log(data);
                    $('#folderNo').val(data[0]);
                }
            });
            $.ajax({
                url: 'getLocation.php',
                data: {barangay: $id},
                dataType: 'JSON',
                success: function (data) {
                    if(data != false){
                        var municipality = data[0];
                        var province = data[1];
                        $('input[name=municipality]').val(municipality);
                        $('input[name=province]').val(province);
                    }else{
                        $('input[name=municipality]').val('');
                        $('input[name=province]').val('');
                    }
                }
            });
            if($id == '54' || $id == '56'){
                $('input[name=brgyname]').removeAttr('disabled');
                $('#folderNo').removeAttr('disabled');
            }else{
                $('input[name=brgyname]').attr('disabled', 'disabled');
                $('#folderNo').attr('disabled', 'disabled');
            }
        });
    });
</script>

</html>
