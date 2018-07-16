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
                <img src="../images/mgbcarlogo.png" width="45px" height="45px">
                <a href="homepage.php" style="text-shadow: 0 0 3px #026603; font-size: 20px">MINES AND GEOSCIENCES BUREAU | GEOSCIENCES DIVISION</a>
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
                <div class="panel panel-green">

                    <!-- PANEL HEADER -->
                    <div class="panel-heading"> 
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#saved" data-toggle="tab">Saved</a>
                            </li>
                            <li><a href="#archived" data-toggle="tab">Archived</a>
                            </li>
                        </ul>
                    </div>
                    <!-- PANEL HEADER END -->

                    <!-- PANEL BODY -->
                    <div class="panel-body">
                        <div class="tab-content">
                            <div id="saved" class="tab-pane fade in active">
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
                                            <th hidden>Date Released</th>
                                            <th hidden>Receiver </th>
                                            <th hidden>Action </th>
                                            <th hidden>Action Desired</th>
                                            <th hidden>note </th>
                                            <th hidden>OICRD </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require 'config.php';

                                        $sql = "SELECT archive,GROUP_CONCAT(CONCAT(barangay.name,',',municipality,',',province)SEPARATOR '<br>') as locations,receive.*,records.*,folderNumber,unclaim.*,actionslip.* FROM receive INNER JOIN receivelocations on receive.receiveID = receivelocations.receiveID INNER JOIN location on receivelocations.locationID = location.locationID INNER JOIN barangay ON barangay.barangayID = location.barangayID inner JOIN records on records.receiveID = receive.receiveID
                                        inner join actionslip on actionslip.actionslipID = receive.actionslipID
                                        left join unclaim on unclaim.unclaimID = records.unclaimID WHERE archive = '0'
                                        GROUP BY records.recordID";
                                        $res = $db->query($sql);
                                        while ($row = $res->fetch_assoc()){
                                            echo "<tr style=cursor:pointer>";
                                            echo "<td>" . $row['code'] . "</td>";
                                            echo "<td>" . $row['folderNumber'] . "</td>";
                                            echo "<td>" . $row['dateReceived'] . "</td>";
                                            echo "<td>" . $row['applicant'] . "</td>";
                                            echo "<td>" . $row['sender'] . "</td>";
                                            echo "<td>" . $row['locations']. "</td>";
                                            echo "<td>" . $row['purpose']."</td>";
                                            if($row['archive'] = '1'){
                                                $status = 'Archived';
                                            }else{
                                                if($row['status'] == 'inspection' ){
                                                    $status = 'For Inspection';
                                                }else if($row['status'] == 'unclaim'){
                                                    $status = 'Unclaimed';
                                                }else{
                                                    $status = 'Released';
                                                }
                                            }
                                            echo "<td>" . $status ."</td>";
                                            echo "<td hidden>" . $row['recordID']."</td>";
                                            echo "<td hidden>" . $row['inspector']."</td>";
                                            echo "<td hidden>" . $row['dateInspected']."</td>";
                                            echo "<td hidden>" . $row['documentDate']."</td>";
                                            echo "<td hidden>" . $row['subject']."</td>";
                                            echo "<td hidden>" . $row['classification']."</td>";
                                            echo "<td hidden>" . $row['scanFile']."</td>";
                                            echo "<td hidden>" . $row['releaseDate']."</td>";
                                            echo "<td hidden>" . $row['receiver']."</td>";
                                            echo "<td hidden>" . $row['action']."</td>";
                                            echo "<td hidden>" . $row['actionDesired']."</td>";
                                            echo "<td hidden>" . $row['note']."</td>";
                                            echo "<td hidden>" . $row['oicrd']."</td>";

                                            echo "</tr>";
                                        }

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div id="archived" class="tab-pane fade">
                                <!-- TABLE -->
                                <table width="100%" class="table table-striped table-bordered table-hover" id="archivedTable">
                                    <thead>
                                        <tr>
                                            <th>Code</th>
                                            <th>Folder</th>
                                            <th>Date Received</th>
                                            <th>Applicant</th>
                                            <th>Sender</th>
                                            <th>Location</th>
                                            <th>Purpose</th>
                                            <th hidden>Status</th>
                                            <th hidden>Record ID</th>
                                            <th hidden>Inspector</th>
                                            <th hidden>Date Inspected</th>
                                            <th hidden>Document Date</th>
                                            <th hidden>Subject</th>
                                            <th hidden>Classification</th>
                                            <th hidden>scanFile</th>
                                            <th hidden>Date Released</th>
                                            <th hidden>Receiver </th>
                                            <th hidden>Action </th>
                                            <th hidden>Action Desired</th>
                                            <th hidden>note </th>
                                            <th hidden>OICRD </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $sql = "SELECT GROUP_CONCAT(CONCAT(barangay.name,',',municipality,',',province)SEPARATOR '<br>') as locations,receive.*,records.*,folderNumber,unclaim.*,actionslip.* FROM receive INNER JOIN receivelocations on receive.receiveID = receivelocations.receiveID INNER JOIN location on receivelocations.locationID = location.locationID INNER JOIN barangay ON barangay.barangayID = location.barangayID inner JOIN records on records.receiveID = receive.receiveID
                                        inner join actionslip on actionslip.actionslipID = receive.actionslipID
                                        left join unclaim on unclaim.unclaimID = records.unclaimID WHERE archive = '1'
                                        GROUP BY records.recordID";
                                        $res = $db->query($sql);
                                        while ($row = $res->fetch_assoc()){
                                            echo "<tr style=cursor:pointer>";
                                            echo "<td>" . $row['code'] . "</td>";
                                            echo "<td>" . $row['folderNumber'] . "</td>";
                                            echo "<td>" . $row['dateReceived'] . "</td>";
                                            echo "<td>" . $row['applicant'] . "</td>";
                                            echo "<td>" . $row['sender'] . "</td>";
                                            echo "<td>" . $row['locations']. "</td>";
                                            echo "<td>" . $row['purpose']."</td>";



                                            echo "<td hidden>" . $row['status']."</td>";
                                            echo "<td hidden>" . $row['recordID']."</td>";
                                            echo "<td hidden>" . $row['inspector']."</td>";
                                            echo "<td hidden>" . $row['dateInspected']."</td>";
                                            echo "<td hidden>" . $row['documentDate']."</td>";
                                            echo "<td hidden>" . $row['subject']."</td>";
                                            echo "<td hidden>" . $row['classification']."</td>";
                                            echo "<td hidden>" . $row['scanFile']."</td>";
                                            echo "<td hidden>" . $row['releaseDate']."</td>";
                                            echo "<td hidden>" . $row['receiver']."</td>";
                                            echo "<td hidden>" . $row['action']."</td>";
                                            echo "<td hidden>" . $row['actionDesired']."</td>";
                                            echo "<td hidden>" . $row['note']."</td>";
                                            echo "<td hidden>" . $row['oicrd']."</td>";

                                            echo "</tr>";
                                        }

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- TABLE END -->
                    </div>
                    <!-- PANEL BODY END -->

                    <!-- PANEL FOOTER -->
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-lg-12" align="center">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addRecord">Add Record</button>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#generateReport">Generate Report</button>
                            </div>
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

                                        <div id="locDiv" class="form-group">
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
                                             <option value="Evacuation Site">Evacuation Site</option>
                                             <option value="Geohazard Assesment">Geohazard Assesment</option>
                                             <option value="GIR">GIR</option>
                                             <option value="Government Projects">Government Projects</option>
                                             <option value="OGI Report">OGI Report</option>
                                             <option value="Reinvestigation">Reinvestigation</option>
                                             <option value="Sanitary Landfill Site">Sanitary Landfill Site</option>
                                             <option value="Other OGI">Other OGI</option>
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
                            <button type="reset" class="btn btn-primary">Reset</button>
                            <button type="submit" class="btn btn-success">Add Record</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                        <!-- MODAL FOOTER END -->
                    </div>
                    <!-- MODAL CONTENT END -->
                </div>
            </div>
            <!-- ADD LOCATION MODAL -->
            <div class="modal fade" id="addLocation" role="dialog">
                <!-- MODAL CONTENT-->
                <div class="modal-dialog">
                    <div class="modal-content">
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
            <!-- ADD LOCATION MODAL END -->
        </form>
        <!-- MODAL END -->
    </div>
</div>
<!-- BODY END -->
</div>
<!-- MAIN PAGE END -->
</div>

<!-- GENERATE REPORT MODAL -->
<form method="POST" action="php/generateReport.php" enctype="multipart/form-data">
    <div class="modal fade" id="generateReport" role="dialog">
        <!-- MODAL CONTENT-->
        <div class="modal-dialog">
            <div class="modal-content modal-lg">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Generate Report</h4>
                </div>
                <!-- MODAL BODY -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <select class="form-control">
                                    <option>Barangay</option>
                                    <option>Classification</option>
                                    <option>Code</option>
                                    <option>Date Inspected</option>
                                    <option>Date Received</option>
                                    <option>Date Released</option>
                                    <option>Document Date</option>
                                    <option>Folder No.</option>
                                    <option>Municipality</option>
                                    <option>Province</option>
                                </select>
                            </div>
                        </div>
                        <div hidden class="col-lg-5">
                            <div class="form-group">
                                <input name="search" class="form-control" placeholder="Search Here">
                            </div>
                        </div>
                        <div id="date">
                         <div class="col-lg-3">
                            <div class="form-group">
                                <label>From: </label>
                                <input type="date" name="from" class="form-control" placeholder="From">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>To: </label>
                                <input type="date" name="to" class="form-control" placeholder="To">
                            </div>
                        </div>
                    </div>
                    <button id="searchrecord" type="button" class="btn btn-success">Go</button>
                </div>
                <div class="row">             
                    <div class="col-lg-12">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                            </div>

                            <div class="panel-body">
                                <div class="table-responsive table-bordered">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Code</th>
                                                <th>Folder</th>
                                                <th>Applicant</th>
                                                <th>Sender</th>
                                                <th>Location</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>

                                </div>                         
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-lg-12" align="center">
                                        <button type="button" class="btn btn-primary">Generate Report</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL BODY END-->

    </div>
    <!-- MODAL CONTENT END -->
</div>
<!-- MODAL END -->
</form>
<!-- GENERATE REPORT MODAL END -->

<!--VIEW RECORDS MODAL -->
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
                <div id="actionPanel" class="panel panel-green">
                    <!-- ACTION SLIP PANEL HEADING -->
                    <div class="panel-heading" align="center">
                        ACTION SLIP
                    </div>
                    <!-- ACTION SLIP PANEL HEADING END -->
                    <div class="panel-body">
                        <div class="col-lg-6">
                            <div>
                                <label>Action:</label> <span id="action"></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div>
                                <label>Action Desired:</label> <span id="actiondesired"></span>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label>OICRD:</label> <span id="oicrd"></span>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label>Note:</label> <span id="note"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-green">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div>
                                    <label>Code:</label> <span class="text" id="code"></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div>
                                    <label>Folder No:</label> <span class="text" id="fNo"></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div>
                                    <label>Date Received:</label> <span class="date" id="dateReceived"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <label>Applicant:</label> <span class="text" id="applicant"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <label>Sender:</label> <span class="text" id="sender"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <label>Location/s:</label> <span class="locSelect" id="loc"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <label>Purpose:</label> <span class="textarea" id="purpose"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <label>Date Inspected:</label> <span class="date" id="dateInspected"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <label>Document Date:</label> <span class="date" id="documentDate"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <label>Inspector:</label> <span class="text" id="inspector"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <label>Classification:</label> <span class="classif" id="classification"></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div>
                                    <label>Subject:</label> <span class="text" id="subject"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <label>Date Released:</label> <span class="date" id="dateReleased"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <label>Receive By:</label> <span class="text" id="receiver"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form id="" action="php/uploadScannedFile.php" method="POST" enctype="multipart/form-data">
                    <div id="uploadPanel" class="panel panel-green">
                        <div class="panel-body">
                            <div id="uploadForm" class="row">
                               <div class="col-lg-12" align="center">
                                <div class="form-group">
                                    <label>Upload File</label>
                                    <input type="file" name="scannedFile">
                                </div>
                            </div>
                            <div class="col-lg-12" align="center">
                                <button name="recordID" id="recordID" class="btn btn-outline btn-success">Save</button>
                            </div>
                        </div>
                        <div hidden id="scannedFile" class="row">
                           <div class="col-lg-12" align="center">
                               <a id="viewfile" href="" class="text-success">View Scanned File</a> | <a href="#" id="editFile">Edit File</a>
                           </div>
                       </div>
                   </div>
               </div>
           </form>

       </div>
       <!-- MODAL BODY END-->
       <!-- MODAL FOOTER -->
       <div class="modal-footer">
        <button name="editRecord" id="editRecord" class="btn btn-primary">Edit</button>
        <button name="saveRecord" id="saveRecord" class="hidden btn btn-success">Save</button>
        <button id="archbtn" type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
            Archive
        </button>
        <button id="rvrtbtn" type="button" class="hidden btn btn-success" data-toggle="modal" data-target="#revertRecord">
            Revert
        </button>
        <button id="dltbtn" type="button" class="hidden btn btn-danger" data-toggle="modal" data-target="#deleteRecord">
            Delete
        </button>

    </div>
    <!-- MODAL FOOTER END -->
</div>
<!-- MODAL CONTENT END -->
</div>
</div>
<!-- VIEW RECORDS MODAL END -->
<!-- Modal -->
<form action="php/archive.php" method="POST">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    Are you sure you want to archive this record?

                </div>
                <div class="modal-footer">
                    <button id="btnArch" name="recordID" type="submit" class="btn btn-success">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Modal -->
<form action="php/deleteRecord.php" method="POST">
    <div class="modal fade" id="deleteRecord" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    WARNING: Deleting will remove the record permanently from the database!!
                    Are you sure you want to delete this record?

                </div>
                <div class="modal-footer">
                    <button id="btnDel" name="recordID" type="submit" class="btn btn-success">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Modal -->
<form action="php/revertRecord.php" method="POST">
    <div class="modal fade" id="revertRecord" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    Record will be reverted. Do you want to continue ?

                </div>
                <div class="modal-footer">
                    <button id="btnRev" name="recordID" type="submit" class="btn btn-success">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!--EDIT RECORDS MODAL -->
<!--*same as add record*-->
<!-- EDIT RECORDS MODAL END -->


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
<script src="js/bootstrap-notify.js"></script>
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
        $('#editFile').on('click',function(e){
            $('#scannedFile').attr('hidden','hidden');
            $('#uploadForm').removeAttr('hidden');
        })

        $('#exampleModal').on('show.bs.modal',function(){
            $('#btnArch').val($('#recordID').val());
        });

        var table = $('#dataTables-example').DataTable({
            responsive: true
        });
        var tableArch = $('#archivedTable').DataTable({
            responsive: true
        });
        $('#saveRecord').click(function(){
            $(this).toggleClass('hidden');
            $('#editRecord').toggleClass('hidden');
            var text = $('.toSpanText');
            var date = $('.toSpanDate');
            var textarea = $('.toSpanTextArea');
            var classif = $('.classif');
            var data = {};
            text.each(function(){
                var $span = $('<span>',{
                    text: $(this).val(),
                    class: 'text',
                    id: $(this).attr('name')
                })
                $(this).replaceWith($span);
                data[$(this).attr('name')] = $(this).val();

            })
            date.each(function(){
                var $span = $('<span>',{
                    text: $(this).val(),
                    class: 'date',
                    id: $(this).attr('name')
                })
                $(this).replaceWith($span);
                data[$(this).attr('name')] = $(this).val();

            })
            textarea.each(function(){
                var $span = $('<span>',{
                    text: $(this).val(),
                    class: 'textarea',
                    id: $(this).attr('name')
                })
                $(this).replaceWith($span);
                data[$(this).attr('name')] = $(this).val();

            })
            classif.each(function(){
                var $span = $('<span>',{
                    text: $(this).val(),
                    class: 'classif',
                    id: $(this).attr('name')
                })
                $(this).replaceWith($span);
                data[$(this).attr('name')] = $(this).val();

            })
            var recordID = $('#recordID').val();

            $.ajax({
              type: "POST",
              url: 'php/updateRecord.php',
              data: {data: data, recordID: recordID },
              success: function(data){

              }
          });
            $.ajax({
                url: 'php/getScannedFile.php',
                success: function(link){
                    $('#viewfile').attr('href','../admin/uploads/'+link);
                },
            });
        })
        $('#editRecord').click(function(){
            $(this).toggleClass('hidden');
            $('#saveRecord').toggleClass('hidden');
            var text = $('#recordinfo').find('span.text');
            var date = $('#recordinfo').find('span.date');
            var textarea = $('#recordinfo').find('span.textarea');
            var classif = $('.classif');
            var locSelect = $('.locSelect');
            var disabled = "";
            text.each(function(){
                var $input = $('<input>',{
                    val: $(this).text(),
                    type: "text",
                    class: 'form-control toSpanText',
                    name: $(this).attr('id')
                })
                if(!$(this).text().trim()){
                    $input.attr('disabled','disabled');
                }
                $(this).replaceWith($input);
            })
            date.each(function(){
                var $input = $('<input>',{
                    val: $(this).text(),
                    type: "date",
                    class: 'form-control toSpanDate',
                    name: $(this).attr('id')
                })
                if(!$(this).text().trim()){
                    $input.attr('disabled','disabled');
                }
                $(this).replaceWith($input);
            })
            textarea.each(function(){
                var $input = $('<input>',{
                    val: $(this).text(),
                    type: "textarea",
                    class: 'form-control toSpanTextArea',
                    name: $(this).attr('id')
                })
                if(!$(this).text().trim()){
                    $input.attr('disabled','disabled');
                }
                $(this).replaceWith($input);
            });

            classif.each(function(){
                var $classification = $('select[name=classification]').clone().addClass('classif').val($(this).text());
                if(!$(this).text().trim()){
                    $classification.attr('disabled','disabled');
                }
                $(this).replaceWith($classification);
            });

            // var locations = locSelect.html().split('<br>');
            // locations.each(function(){

            // });
            // console.log($('#locDiv').clone());

        })

        $('table tbody').on( 'click', 'tr', function () {
            $('#deleteRecord').on('show.bs.modal',function(){
                $('#btnDel').val($('#recordID').val());
            });
             $('#revertRecord').on('show.bs.modal',function(){
                $('#btnRev').val($('#recordID').val());
            });

            if($('.tab-pane.fade.in.active').attr('id')=='saved'){
                var data = table.row( this ).data();
            }else{
                var data = tableArch.row( this ).data();
                $('#editRecord').toggleClass('hidden');
                $('#rvrtbtn').toggleClass('hidden');
                $('#dltbtn').toggleClass('hidden');
                $('#archbtn').toggleClass('hidden');
                $('#uploadPanel').addClass('hidden');
                $('#actionPanel').addClass('hidden');

            }
            $('#code').html(data[0]);
            $('#fNo').html(data[1]);
            $('#dateReceived').html(data[2]);
            $('#applicant').html(data[3]);
            $('#sender').html(data[4]);
            $('#loc').html(data[5]);
            $('#purpose').html(data[6]);
            $('#dateInspected').html(data[10]);
            $('#documentDate').html(data[11]);
            $('#recordID').val(data[8]);
            $('#inspector').html(data[9]);
            $('#subject').html(data[12]);
            $('#classification').html(data[13]);
            $('#dateReleased').html(data[15]);
            $('#receiver').html(data[16]);
            $('#action').html(data[17]);
            $('#actiondesired').html(data[18]);
            $('#note').html(data[19]);
            $('#oicrd').html(data[20]);
            $('#viewfile').attr('href','../admin/uploads/'+data[14]);
            $('#recordinfo').modal();

            if(data[14]){
                $('#uploadForm').attr('hidden','hidden');
                $('#scannedFile').removeAttr('hidden');
            }else{
                $('#scannedFile').attr('hidden','hidden');
                $('#uploadForm').removeAttr('hidden');
            }
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

<script>
    $(document).ready(function () {
        if(location.hash === '#success'){
            $.notify({
                icon: 'glyphicon glyphicon-star',
                message: "Scanned files Successfully Saved!"
            },{
                type: 'success',
                animate: {
                    enter: 'animated fadeInUp',
                    exit: 'animated fadeOutRight'
                },
                placement: {
                    from: "top",
                    align: "center"
                },
                offset: 10,
                spacing: 10,
                z_index: 1031,
            });
            window.location.replace(location.href.split('#')[0]+'#');
        }

        if(location.hash === '#failed'){
            $.notify({
                icon: 'glyphicon glyphicon-star',
                message: "Failed to add data!,Contact Administrator"
            },{
                type: 'danger',
                animate: {
                    enter: 'animated fadeInUp',
                    exit: 'animated fadeOutRight'
                },
                placement: {
                    from: "top",
                    align: "center"
                },
                offset: 10,
                spacing: 10,
                z_index: 1031,
            });
            window.location.replace(location.href.split('#')[0]+'#');
        }

    })


</script>


</html>
