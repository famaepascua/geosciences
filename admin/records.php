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
                <a class="navbar-brand" href="index.html">MINES AND GEOSCIENCES BUREAU | GEOSCIENCES DIVISION</a>
            </div>
            <!-- NAV HEADER END -->

            <ul class="nav navbar-top-links navbar-right">

                <!-- DROPDOWN -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="../index.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                                        <th>Subject</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                require 'config.php';

                                $sql = "SELECT *,b.folderNumber AS bf,b.name as bn FROM actionslip JOIN receive r on actionslip.actionslipID = r.actionslipID JOIN location l on r.locationID = l.locationID JOIN barangay b on l.barangayID = b.barangayID";
                                $res = $db->query($sql);
                                while ($row = $res->fetch_assoc()){
                                    echo "<tr>";
                                    echo "<td>" . $row['code'] . "</td>";
                                    echo "<td>" . $row['bf'] . "</td>";
                                    echo "<td>" . $row['dateReceived'] . "</td>";
                                    echo "<td>" . $row['applicant'] . "</td>";
                                    echo "<td>" . $row['sender'] . "</td>";
                                    echo "<td>" . $row['bn']. "," . $row['municipality'] . "," . $row['province'] . "</td>";
                                    echo "<td>" . $row['purpose']."</td>";
                                    echo "<td>" . " " ."</td>";
                                    echo "<td>" . "For Inspection" ."</td>";
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
                                <button  type="button" class="btn btn-primary">View</button>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addRecord">Add Record</button>
                            </div>
                        </div>
                        <!-- PANEL FOOTER END -->
                    </div>
                    <!--PANEL END -->
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
                                                    <input type="checkbox" value="">Information and guidance please.
                                                </label>
                                                </div>
                                                <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Compliance/Implementation please.
                                                </label>
                                                </div>
                                                <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Appropriate Action please.
                                                </label>
                                                </div>
                                                <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Immediate Investigation please.
                                                </label>
                                                </div>
                                                <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Comment and recommendation please.
                                                </label>
                                                </div>
                                                <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Review and inital please.
                                                </label>
                                                </div>
                                                <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Discussion/Dissemination/Posting please.
                                                </label>
                                                </div>
                                                <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Record/File please.
                                                </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    Action Desired:
                                                </label>
                                                <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Give me status/feedback please.
                                                </label>
                                                </div>
                                                <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Please attend to this.
                                                </label>
                                                </div>
                                                <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Please represent to me.
                                                </label>
                                                </div>
                                                <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Please see me about this.
                                                </label>
                                                </div>
                                                <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Please prepare reply.
                                                </label>
                                                </div>
                                                <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Please submit report.
                                                </label>
                                                </div>
                                                <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Please inform pary concerned.
                                                </label>
                                                </div>
                                                <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Please schedule.
                                                </label>
                                                <label>
                                                    <input type="checkbox" value="">Please respond directly.
                                                </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>OICRD</label>
                                                <input class="form-control" placeholder="Enter Full Name">
                                            </div>
                                            <div class="form-group">
                                                <label>Note</label>
                                                <textarea class="form-control" rows="2"></textarea>
                                            </div>
                                        </div>
                                    <!-- ACTION SLIP PANEL BODY END -->
                                    </div>
                                </div>
                                <!-- ACTION SLIP END -->

                                <!-- MAIN FORM -->
                                <div class="col-lg-8">
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                            <label>Code</label>
                                            <input class="form-control" placeholder="Enter Code">
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
                                            <input class="form-control" type="date" name="date" id="date" required>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group">
                                            <label>Applicant</label>
                                            <input class="form-control" placeholder="Enter Full Name">
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group">
                                            <label>Sender</label>
                                            <input class="form-control" placeholder="Enter Full Name">
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
                                        <input name="province" class="form-control" placeholder="Province">
                                        <input name="municipality" class="form-control" placeholder="Municipality">
                                        <button type="button" class="btn btn-success" data-toggle="modal"
                                                data-target="#addLocation">Add Location
                                        </button>
                                </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group">
                                            <div class="form-group">
                                            <label>Purpose</label>
                                            <textarea class="form-control" rows="15"></textarea>
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
                                            <input class="form-control" placeholder="Enter Full Name">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                            <label>Document Date</label>
                                            <input class="form-control" type="date" name="date" id="date" required>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group">
                                            <label>Classification</label>
                                            <select class="form-control">
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
                                            <textarea class="form-control" rows="2"></textarea>
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
                                            <input class="form-control" type="date" name="date" id="date" required>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group">
                                            <label>Receive By.</label>
                                            <input class="form-control" placeholder="Enter Full Name">
                                    </div>
                                </div>
                            </div>
                            <!-- ROW END-->
                            <!-- ROW -->
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Upload File</label>
                                        <input type="file">
                                    </div>
                                </div>
                            </div>
                            <!-- ROW END-->    
                            </div>
                            <!-- MODAL BODY END-->
                            <!-- MODAL FOOTER -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success">Add Record</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                            <!-- MODAL FOOTER END -->
                        </div>
                        <!-- MODAL CONTENT END -->
                        </div>
                     </div>
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
                                            <input class="form-control" placeholder="No. of Location to Add">
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-success">Go</button>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Location</label>
                                            <input class="form-control" placeholder="Barangay">
                                            <input class="form-control" placeholder="Province">
                                            <input class="form-control" placeholder="Municipality">
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

    <!-- DataTables JavaScript -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

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
