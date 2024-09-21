<?php

use LDAP\Result;

include("dbconnect.php");
include("backend/count.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>JollyBeez</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">

    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style2.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>

    <!-- Left Panel -->
     <?php
        include("includes/sidebar.php"); 
        ?>
    <!-- /#left-panel -->

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">

        <!-- Header start -->
        <!-- Header-->
        <?php
        include("includes/header.php"); 
        ?>
        <!-- Header end -->

        <!-- Content -->
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 align="center"><b>Admin Panel</b></h3>
                            </div>
                        </div>
                    </div>

                    <!-- 1st column -->
                    <div class="col-sm-6 col-lg-3">
                        <div class="card text-white bg-flat-color-2">
                            <div class="card-body">
                                <div class="card-left pt-1 float-left">
                                    <h3 class="mb-0 fw-r">
                                        <span class="currency float-left mr-1"></span>
                                        <?php
                                        $qry1 = "SELECT  COUNT(`username`) as adminCount FROM `admin`";
                                        $result = mysqli_query($conn,$qry1);
                                        $count = mysqli_num_rows($result);
                                        ?>
                                        <span class="count">
                                            <!-- ithula irukkura ella ati count a kattum -->
                                            <?php echo $count; ?>
                                        </span>
                                    </h3>
                                    <p class="text-light mt-1 m-0">Products</p>
                                </div><!-- /.card-left -->
                                <div class="card-right float-right text-right">
                                    <i class="icon fade-5 icon-lg pe-7s-keypad"></i>
                                </div><!-- /.card-right -->
                            </div>
                        </div>
                    </div>

                    <!-- 2nd column -->
                    <div class="col-sm-6 col-lg-3">
                        <div class="card text-white bg-flat-color-3">
                            <div class="card-body">
                                <div class="card-left pt-1 float-left">
                                    <h3 class="mb-0 fw-r">
                                        <span class="currency float-left mr-1"></span>
                                        <?php
                                        $qry1 = "SELECT  COUNT(`username`) as adminCount FROM `admin`";
                                        $result = mysqli_query($conn,$qry1);
                                        $count = mysqli_num_rows($result);
                                        ?>
                                        <span class="count">
                                            <?php echo $count; ?>
                                        </span>
                                    </h3>
                                    <p class="text-light mt-1 m-0">Admin</p>
                                    <!-- Log on to codeastro.com for more projects! -->
                                </div><!-- /.card-left -->

                                <div class="card-right float-right text-right">
                                    <i class="icon fade-5 icon-lg pe-7s-users"></i>                                  
                                </div><!-- /.card-right -->

                            </div>

                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="card text-white bg-flat-color-5">
                            <div class="card-body">
                                <div class="card-left pt-1 float-left">
                                    <h3 class="mb-0 fw-r">
                                        <span class="currency float-left mr-1"></span>
                                        <?php
                                        $qry1 = "SELECT  COUNT(`Id`) as userCount FROM `user`";
                                        $result = mysqli_query($conn,$qry1);
                                        $count = mysqli_num_rows($result);
                                        ?>
                                        <span class="count">
                                        <?php echo $count; ?>
                                        </span>
                                    </h3>
                                    <p class="text-light mt-1 m-0">Customers</p>
                                </div><!-- /.card-left -->

                                <div class="card-right float-right text-right">
                                <i class="icon fade-5 icon-lg pe-7s-network"></i>
                                </div><!-- /.card-right -->

                            </div>

                        </div>
                    </div>


                    <div class="col-sm-6 col-lg-3">
                        <div class="card text-white bg-flat-color-1">
                            <div class="card-body">
                                <div class="card-left pt-1 float-left">
                                    <h3 class="mb-0 fw-r">
                                        <span class="currency float-left mr-1"></span>
                                        <span class="count">
                                            23
                                        </span>
                                    </h3>
                                    <p class="text-light mt-1 m-0">Orders</p>                               
                                </div><!-- /.card-left -->

                                <div class="card-right float-right text-right">
                                    <i class="icon fade-5 icon-lg pe-7s-notebook"></i>
                                </div><!-- /.card-right -->

                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>

        <div class="clearfix"></div>

        <?php
        include("includes/footer.php");
        ?>
    </div>
    <!-- /#right-panel -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="../assets/js/main.js"></script>

    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/init/datatables-init.js"></script>

    <script>
        // Menu Trigger
        $('#menuToggle').on('click', function(event) {
            var windowWidth = $(window).width();
            if (windowWidth < 1010) {
                $('body').removeClass('open');
                if (windowWidth < 760) {
                    $('#left-panel').slideToggle();
                } else {
                    $('#left-panel').toggleClass('open-menu');
                }
            } else {
                $('body').toggleClass('open');
                $('#left-panel').removeClass('open-menu');
            }

        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table-export').DataTable();
        });
    </script>

</body>

</html>