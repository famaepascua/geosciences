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

            <!-- NAVBAR HEADER -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="homepage.php" style="text-shadow: 0 0 3px #FF0000;">GEOSCIENCES DIVISION</a>

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
            <h1 class="page-header">For Inspection Form</h1>
        </div>
    </div>
    <!-- PAGE HEADER END -->

    <!-- BODY -->
    <div class="row">
        <!-- PANEL -->
        <div class="col-lg-12">
            <div class="panel panel-default">

                <!-- PANEL HEADER START -->
                <div class="panel-heading">
                </div>
                <!-- PANEL HEADER END -->

                <!-- FORM -->
                <form action="php/addIncoming.php" method="post">
                    <!-- PANEL BODY -->
                    <div class="panel-body">
                        <!--ROW START -->
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
                                                    <input name="action[]" type="checkbox" value="Information and
                                                    guidance please">Information and
                                                    guidance please.
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
                                    require 'config.php';


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

                    </div>
                    <!-- ROW END -->
                </div>
                <!-- PANEL BODY END -->

                <!-- PANEL FOOTER -->
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-lg-9">
                        </div>
                        <input type="submit" class="btn btn-success" value="Add Record"/>
                        <button type="button" class="btn btn-primary">Reset</button>
                    </div>
                </div>
                <!-- PANEL FOOTER END -->
            </form>
            <!-- FORM END -->


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
<script src="js/bootstrap-notify.js"></script>
<script src="vendor/morrisjs/morris.min.js"></script>
<script src="data/morris-data.js"></script>

<!-- Custom Theme JavaScript -->
<script src="dist/js/sb-admin-2.js"></script>

<script>
    $('#addlocation').click(function(){
        var numberOfInputs = $('#numofinput').val();
        var label = '<label>Location</label>';
        var input = '<input class="form-control" placeholder="Barangay">'+
        '<input class="form-control" placeholder="Municipality">'+
        '<input class="form-control" placeholder="Province">';
        for(i=1; i <= numberOfInputs; i++){
            $('#location').append(label+input);
        }

    })
</script>

</body>

<script>
    $(document).ready(function () {
        $('#barangay').change(function () {
            $id = $(this).val();
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
                message: "Successfully added a new record!"
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
