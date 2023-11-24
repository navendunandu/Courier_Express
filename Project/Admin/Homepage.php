<?php
 include("../Assets/Connection/connection.php");
 ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Welcome To | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../Assets/Templates/Admin/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../Assets/Templates/Admin/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../Assets/Templates/Admin/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="../Assets/Templates/Admin/plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../Assets/Templates/Admin/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../Assets/Templates/Admin/css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="info-container">
                    <div class="name">John Doe</div>
                    <div class="email">john.doe@example.com</div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="Homepage.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="Branch.php">
                            <i class="material-icons">store_mall_directory</i>
                            <span>Branches</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">my_location</i>
                            <span>Location</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="pages/ui/alerts.html">District</a>
                            </li>
                            <li>
                                <a href="pages/ui/animations.html">Place</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">view_list</i>
                            <span>Basic Datas</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="pages/ui/alerts.html">Complaint Type</a>
                            </li>
                            <li>
                                <a href="pages/ui/animations.html">Courier Type</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="Branch.php">
                            <i class="material-icons">assignment</i>
                            <span>Complaints</span>
                        </a>
                    </li>
                    <li>
                        <a href="Branch.php">
                            <i class="material-icons">assessment</i>
                            <span>Feedbacks</span>
                        </a>
                    </li>
                    <li>
                        <a href="../Logout.php">
                            <i class="material-icons">settings_power</i>
                            <span>Feedbacks</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add</i>
                        </div>
                        <div class="content">
                        <?php
                            $newTask="SELECT count(consignment_id) as new from tbl_consignment where consignment_status=0";
                            $resnewTask=mysql_query($newTask);
                            $datanewTask=mysql_fetch_array($resnewTask);
                            ?>
                            <div class="text">NEW TASKS</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $datanewTask['new'] ?>" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <?php
                            $totalTask="SELECT count(consignment_id) as total from tbl_consignment";
                            $restotalTask=mysql_query($totalTask);
                            $datatotalTask=mysql_fetch_array($restotalTask);
                            ?>
                            <div class="text">COMPLETED TASK</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $datatotalTask['total'] ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">business</i>
                        </div>
                        <div class="content">
                        <?php
                            $totalBranch="SELECT count(*) as branch from tbl_branch";
                            $restotalBranch=mysql_query($totalBranch);
                            $datatotalBranch=mysql_fetch_array($restotalBranch);
                            ?>
                            <div class="text">BRANCHES</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $datatotalBranch['branch'] ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                        <?php
                            $totaluser="SELECT count(*) as user from tbl_user";
                            $restotaluser=mysql_query($totaluser);
                            $datatotaluser=mysql_fetch_array($restotaluser);
                            ?>
                            <div class="text">NEW VISITORS</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $datatotaluser['user'] ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
            

            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>BRANCHES</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>District</th>
                                            <th>Place</th>
                                            <th>Contact</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
	  $sel="select * from tbl_branch b inner join tbl_place p on p.place_id=b.place_id inner join tbl_district d on d.district_id=p.district_id";
	  $data=mysql_query($sel);
	  $i=0;
	  while($row=mysql_fetch_array($data))
	  {
		  $i++;
	  ?>
                                        <tr>
                                            <td><?php echo $i?></td>
                                            <td><?php echo $row["branch_email"]?></td>
                                            <td><?php echo $row["branch_address"]?></td>
                                            <td><?php echo $row["district_name"]?></td>
                                            <td><?php echo $row["place_name"]?></td>
                                            <td><?php echo $row["branch_contact"]?></td>
                                        </tr>
                                        <?php
	  }
	  ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
            </div>
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="../Assets/Templates/Admin/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../Assets/Templates/Admin/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../Assets/Templates/Admin/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../Assets/Templates/Admin/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../Assets/Templates/Admin/plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="../Assets/Templates/Admin/plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="../Assets/Templates/Admin/plugins/raphael/raphael.min.js"></script>
    <script src="../Assets/Templates/Admin/plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="../Assets/Templates/Admin/plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="../Assets/Templates/Admin/plugins/flot-charts/jquery.flot.js"></script>
    <script src="../Assets/Templates/Admin/plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="../Assets/Templates/Admin/plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="../Assets/Templates/Admin/plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="../Assets/Templates/Admin/plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="../Assets/Templates/Admin/plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="../Assets/Templates/Admin/js/admin.js"></script>
    <script src="../Assets/Templates/Admin/js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="../Assets/Templates/Admin/js/demo.js"></script>
</body>

</html>