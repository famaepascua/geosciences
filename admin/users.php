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

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">

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

        <!-- MAIN PAGE -->
        <div id="page-wrapper">

            <!-- PAGE HEADER -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Users</h1>
                </div>
            </div>
            <!-- PAGE HEADER END -->

            <!-- BODY -->
            <div class="row">
                <div class="col-lg-12">
                    <!-- PANEL -->
                    <div class="panel panel-green">

                        <!-- PANEL HEADER -->
                        <div class="panel-heading"> 
                        </div>
                        <!-- PANEL HEAD END -->

                        <!-- PANEL BODY -->
                        <div class="panel-body">
                            <!-- TABLE -->
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>User Type</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Username</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require 'config.php';
                                        $sql = "SELECT * FROM users";
                                        $result = $db->query($sql);

                                        if ($result) {
                                        while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row['userType'] . "</td>";
                                        echo "<td>" . $row['firstName'] . "</td>";
                                        echo "<td>" . $row['lastName'] . "</td>";
                                        echo "<td>" . $row['username'] . "</td>";
                                        echo "</tr>";
                                }
                            }

                            ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- TABLE END -->
                        </div>
                        <!-- PANEL BODY END -->

                        <!-- PANEL FOOTER -->
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-lg-9"></div>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addUser">Add New User</button>
                                <button type="button" class="btn btn-danger">Delete</button>
                            </div>
                        </div>
                        <!-- PANEL FOOTER END -->

                    </div>
                    <!-- PANEL END -->
                    <!--FORM -->
                    <form action="php/addUser.php" method="post">
                    <!-- MODAL -->
                    <div class="modal fade" id="addUser" role="dialog">
                        <!-- MODAL CONTENT-->
                        <div class="modal-dialog">
                        <div class="modal-content ">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Add New User</h4>
                            </div>
                            <!-- MODAL BODY -->
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>User Type</label>
                                            <select name="usertype" class="form-control">
                                                <option>Admin</option>
                                                <option>User</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input name="firstname" type="text" class="form-control" placeholder="Enter First Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input name="lastname" type="text" class="form-control" placeholder="Enter Last Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input name="username" type="text" class="form-control" placeholder="Enter Username">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input name="password" type="text" class="form-control" placeholder="Enter Password">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- MODAL BODY END-->
                            <!-- MODAL FOOTER -->
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-success" Value ="Add User">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                            <!-- MODAL FOOTER END -->
                        </div>
                        <!-- MODAL CONTENT END -->
                        </div>
                     </div>
                     <!-- MODAL END -->
                     </form>
                     <!-- FORM END -->

                </div>
            </div>
            <!-- BODY END -->
            

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
    <script src="vendor/morrisjs/morris.min.js"></script>
    <script src="data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
