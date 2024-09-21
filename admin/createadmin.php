<?php
include("dbconnect.php");

if (isset($_POST["submit"])) {

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $nic = $_POST["nic"];
    $phone = $_POST["phone"];
    $email = $_POST["m"];
    $city = $_POST["city"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $dateCreated = date("Y-m-d");

    $result1 = mysqli_query($conn, "SELECT * FROM `admin` WHERE username ='$username'");
    $ret = mysqli_fetch_array($result1);

    if ($ret) {
        $errorScript = "
        console.log('Session already exists:', '$username');
        Swal.fire({
            icon: 'error',
            title: 'Can\\'t Added',
            text: 'This Session already exists!',
            confirmButtonText: 'OK'
        });
        ";
    } else {
        $qry2 = "INSERT INTO `admin`(`first_name`, `last_name`, `nic`, `PhoneNumber`, `email`, `city`, `username`, `password`, `dateCreated`) 
        VALUES ('$fname','$lname','$nic','$phone','$email','$city','$username','$password','$dateCreated')";

        $result2 = mysqli_query($conn, $qry2);

        if ($result2) {
            $successScript = "
            Swal.fire({
                icon: 'success',
                title: 'Admin Added Successful',
                text: 'Admin has been Added successfully!',
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                window.location.href = 'createadmin.php';
            });
            ";
        } else {
            $errorScript = "
            Swal.fire({
                icon: 'error',
                title: 'Can't Added ',
                text: 'An error Occurred!',
                confirmButtonText: 'OK'
            });
            ";
        }
    }
}
?>
<?php

if (isset($_GET['status']) && $_GET['status'] == "success") {
    $successScript = "
    Swal.fire({
        icon: 'success',
        title: 'Admin Deleted',
        text: 'Admin has been deleted Successfully!',
        confirmButtonText: 'OK'
    }).then(() => {
        window.location.href = 'createadmin.php';
    });
    ";
}

if (isset($_GET['status']) && $_GET['status'] == "error") {
    $successScript = "
    Swal.fire({
        icon: 'error',
        title: 'Can't Deleted',
        text: 'An error Occurred!',
        confirmButtonText: 'OK'
    }).then(() => {
        window.location.href = 'createadmin.php';
    });
    ";
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
                                    <li class="active">Add Admin</li>
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
                                    <h2 align="center">Add New Administrator</h2>
                                </strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <form method="Post" action="">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="input-1">First Name</label>
                                                        <input type="text" class="form-control  w-mobile-100 " name="fname" placeholder="First Name" required>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="input-1">Last Name</label>
                                                    <input type="text" class="form-control  w-mobile-100 " name="lname" placeholder="Last Name" required>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="input-1">NIC Number</label>
                                                        <input type="text" class="form-control" name="nic" placeholder="N.I.C Number" required>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="cc-exp" class="control-label mb-1">Contact Number</label>
                                                    <input type="text" class="form-control cc-exp" name="phone" value="" Required placeholder="Contact Number">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Email</label>
                                                        <input type="email" class="form-control cc-exp" name="m" value="" Required placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">City</label>
                                                    <input type="text" class="form-control cc-exp" name="city" value="" Required placeholder="City">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Username</label>
                                                        <input type="email" class="form-control cc-exp" name="username" readonly value="<?php echo "ADM" . rand(1234, 9999); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">Password</label>
                                                    <input type="text" class="form-control cc-exp" name="password" readonly value="<?php echo "PWD" . rand(1234, 9999); ?>">
                                                </div>
                                            </div>

                                            <div>
                                                <button type="submit" name="submit" class="btn btn-success">Add Admin</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- .card -->
                    </div><!--/.col-->


                    <br><br>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">
                                    <h2 align="center">All Administrator</h2>
                                </strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Firstname</th>
                                            <th>Lastname</th>
                                            <th>NIC Number</th>
                                            <th>Contact Number</th>
                                            <th>Email</th>
                                            <th>City</th>
                                            <th>Date Added</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>

                                    <?php
                                    // `Id`, `first_name`, `last_name`, `nic`, `PhoneNumber`, `email`, `city`, `username`, `password`, `dateCreated`
                                    $qry1 = "SELECT * FROM `admin`";
                                    $ret = mysqli_query($conn, $qry1);
                                    while ($row = mysqli_fetch_array($ret)) {
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $row['Id']; ?></td>
                                            <td><?php echo $row['first_name']; ?></td>
                                            <td><?php echo $row['last_name']; ?></td>
                                            <td><?php echo $row['nic']; ?></td>
                                            <td><?php echo $row['PhoneNumber']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['city']; ?></td>
                                            <td><?php echo $row['dateCreated']; ?></td>
                                            <td><a href="updateadmin.php?updateId=<?php echo $row['Id']; ?>" title="View Admin"><i class="fa fa-edit fa-1x"></i></a></td>
                                            <td><a onclick="return confirm('Are you sure you want to delete?')" href="backend/deleteadmin.php?deleteId=<?php echo $row['Id']; ?>" title="Delete Admin"><i class="fa fa-trash fa-1x"></i></a></td>
                                        </tr>
                                    </tbody>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end of datatable -->

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