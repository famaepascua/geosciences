<?php

//
// @author  PASCUA, FATIMA MAE C. | 2143735 | Saint Louis University
// @date    AUGUST 2018
//

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
            <!-- NAV HEADER -->
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

    <!-- MAIN PAGE -->
    <div id="page-wrapper">

        <!-- PAGE HEADER -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Release Documents</h1>
            </div>
        </div>
        <!-- PAGE HEADER END -->

        <div class="row">
            <div class="col-lg-12">

                <!-- PANEL -->
                <div class="panel panel-green">

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
                                    <th>Document Date</th>
                                    <th>Code</th>
                                    <th>Applicant</th>
                                    <th>Sender</th>
                                    <th hidden>locations</th>
                                    <th>Subject</th>
                                    <th hidden>status</th>
                                    <th hidden>recordID</th>
                                    <th hidden>Inspector</th>
                                    <th hidden>Date Inspected</th>
                                    <th hidden>Folder Number</th>
                                    <th hidden>Purpose</th>
                                    <th hidden>Classification</th>
                                    <th hidden>Date Received</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                               require 'config.php';

                               $sql = "SELECT GROUP_CONCAT(CONCAT(barangay.name,',',municipality,',',province)SEPARATOR '<br>') as locations,receive.*,records.*,folderNumber,unclaim.* FROM receive INNER JOIN receivelocations on receive.receiveID = receivelocations.receiveID INNER JOIN location on receivelocations.locationID = location.locationID INNER JOIN barangay ON barangay.barangayID = location.barangayID inner JOIN records on records.receiveID = receive.receiveID
                               left join unclaim on unclaim.unclaimID = records.unclaimID where status = 'unclaim' AND archive = '0'
                               GROUP BY records.recordID";
                               $res = $db->query($sql);
                               while ($row = $res->fetch_assoc()){
                                echo "<tr style=cursor:pointer>";
                                echo "<td>" . $row['documentDate'] . "</td>";
                                echo "<td>" . $row['code'] . "</td>";
                                echo "<td>" . $row['applicant'] . "</td>";
                                echo "<td>" . $row['sender'] . "</td>";
                                echo "<td hidden>" . $row['locations']. "</td>";
                                echo "<td>" . $row['subject']."</td>";
                                echo "<td hidden>" . $row['status'] ."</td>";
                                echo "<td hidden>" . $row['recordID']."</td>";
                                echo "<td hidden>" . $row['inspector']."</td>";
                                echo "<td hidden>" . $row['dateInspected']."</td>";
                                echo "<td hidden>" . $row['folderNumber']."</td>";
                                echo "<td hidden>" . $row['purpose']."</td>";
                                echo "<td hidden>" . $row['classification']."</td>";
                                echo "<td hidden>" . $row['dateReceived']."</td>";
                                echo "</tr>";
                            }

                            ?>
                        </tbody>
                    </table>
                    <!-- TABLE END -->
                </div>
                <!-- PANEL BODY END -->
            </div>
            <!-- PANEL END -->
        </div>
        </div>
    </div>
    <!-- MAIN PAGE END -->

</div>

<form action="php/release.php" method="POST">
    <div class="modal fade" id="editRelease" role="dialog">
        <!-- MODAL CONTENT-->
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" align="center">Document Information</h4>
                </div>
                <!-- MODAL BODY -->
                <div class="modal-body">
                    <div class="panel panel-green">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div>
                                        <label>Code:</label> <span id="code"></span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div>
                                        <label>Folder No:</label> <span id="folderno"></span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
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
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="panel panel-green">
                            <div class="panel-heading" align="center">
                                <h4 class="modal-title" align="center">Release Form</h4>
                            </div>
                        <div id="releaseForm" class="row">
                            <div class="panel-body">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Date Released</label>
                                        <input name="datereleased" id="dateReleased" type="date" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Received By.</label>
                                        <input name="receiver" type="text" class="form-control"
                                        placeholder="Enter Full Name" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                        <button name="recordID" id="recordID" type="submit" class="btn btn-success">Release</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
                    <!-- MODAL FOOTER END -->
            </div>
                <!-- MODAL CONTENT END -->
        </div>
    </div>
</form>

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
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script src="js/releaseTable.js"></script>

    <script src="js/releaseMessage.js"></script>


</body>

</html>
