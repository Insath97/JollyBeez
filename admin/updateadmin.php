<?php
include("dbconnect.php"); 

if (isset($_POST["submit"])) {

    $id = $_POST["id"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $nic = $_POST["nic"];
    $phone = $_POST["phone"];
    $email = $_POST["m"];
    $city = $_POST["city"];
    $dateCreated = date("Y-m-d");

    $qry2 = "UPDATE `admin` SET `first_name`='$fname',`last_name`='$lname',`nic`='$nic',`phoneNumber`='$phone',`email`='$email',`city`='$city',`dateCreated`='$dateCreated' WHERE Id='$id'";

    $result2 = mysqli_query($conn, $qry2);

    if ($result2) {
        $successScript = "
            Swal.fire({
                icon: 'success',
                title: 'Admin Update Successful',
                text: 'Admin has been Update successfully!',
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                window.location.href = 'viewadmin.php';
            });
            ";
    } else {
        $errorScript = "
            Swal.fire({
                icon: 'error',
                title: 'Can't Update ',
                text: 'An error Occurred!',
                confirmButtonText: 'OK'
            });
            ";
    }
}
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

    <!-- sweet alert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <!-- scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
</head>

<body>

    <!-- Left Panel -->
    <?php
    include("includes/sidebar.php");
    ?>
    <!-- /#left-panel -->

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php
        include("includes/header.php");
        ?>
        <!-- Header end -->

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">

                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Admin</a></li>
                                    <li class="active">Update Admin</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">
                                    <h2 align="center">Update Administrator</h2>
                                </strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                    <?php
                                        $id = $_GET['updateId'];
                                        // `Id`, `first_name`, `last_name`, `nic`, `PhoneNumber`, `email`, `city`, `username`, `password`, `dateCreated`
                                        $select_qry = "SELECT * FROM `admin` WHERE Id='$id'";
                                        $select_qry_exe = mysqli_query($conn, $select_qry);
                                        while ($row = mysqli_fetch_array($select_qry_exe)) {
                                        ?>
                                        <form method="Post" action="">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="input-1">First Name</label>
                                                        <input type="text" class="form-control  w-mobile-100 " value="<?php echo $row['first_name'];?>" name="fname" placeholder="First Name" required>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="input-1">Last Name</label>
                                                    <input type="text" class="form-control  w-mobile-100 " value="<?php echo $row['last_name'];?>" name="lname" placeholder="Last Name" required>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="input-1">NIC Number</label>
                                                        <input type="text" class="form-control" value="<?php echo $row['nic'];?>" name="nic" placeholder="N.I.C Number" required>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="cc-exp" class="control-label mb-1">Contact Number</label>
                                                    <input type="text" class="form-control cc-exp" name="phone" value="<?php echo $row['PhoneNumber'];?>" Required placeholder="Contact Number">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Email</label>
                                                        <input type="email" class="form-control cc-exp" name="m" value="<?php echo $row['email'];?>" Required placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">City</label>
                                                    <input type="text" class="form-control cc-exp" name="city" value="<?php echo $row['city'];?>" Required placeholder="City">
                                                    <input type="hidden" name="id" value="<?php echo $row1['Id']; ?>">
                                                </div>
                                            </div>

                                           <div>
                                                <button type="submit" name="submit" class="btn btn-success">Update Admin</button>
                                            </div>
                                        </form>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- .card -->
                    </div><!--/.col-->
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

        <div class="clearfix"></div>
        <?php
        include("includes/footer.php");
        ?>
    </div>
    <!-- /#right-panel -->

    <!-- alert popup -->
    <?php if (isset($successScript)) : ?>
        <script>
            <?php echo $successScript; ?>
        </script>
    <?php endif; ?>

    <?php if (isset($errorScript)) : ?>
        <script>
            <?php echo $errorScript; ?>
        </script>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

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