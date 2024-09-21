<?php
include("dbconnect.php");

if (isset($_POST["submit"])) {

    $foodcode = $_POST["foodcode"];
    $foodname = $_POST["foodname"];
    $foodgategory = $_POST["foodgategory"];
    $foodimage = $_POST["foodimage"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $dateCreated = date("Y-m-d");

    // image import
    $uploaddir = '../product images/';  
    $uploadfile = $uploaddir . basename($_FILES['foodimage']['name']);
    move_uploaded_file($_FILES['foodimage']['tmp_name'], $uploadfile);
    $flname = basename($_FILES["foodimage"]["name"]);

    $result1 = mysqli_query($conn, "SELECT * FROM `product` WHERE code ='$foodcode'");
    $ret = mysqli_fetch_array($result1);

    if ($ret) {
        $errorScript = "
        console.log('Session already exists:', '$foodcode');
        Swal.fire({
            icon: 'error',
            title: 'Can\\'t Added',
            text: 'This Food already exists!',
            confirmButtonText: 'OK'
        });
        ";
    } else {

        $qry2 = "INSERT INTO `product`(`code`, `food_name`, `category`, `description`, `image`, `price`, `dateCreated`) 
        VALUES ('$foodcode','$foodname','$foodgategory','$description','$flname','$price','$dateCreated')";

        $result2 = mysqli_query($conn, $qry2);

        if ($result2) {


            $successScript = "
            Swal.fire({
                icon: 'success',
                title: 'Food Added Successful',
                text: 'Food has been Added successfully!',
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                window.location.href = 'createproduct.php';
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
        title: 'Food Deleted',
        text: 'Food has been deleted Successfully!',
        confirmButtonText: 'OK'
    }).then(() => {
        window.location.href = 'createproduct.php';
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
        window.location.href = 'createproduct.php';
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
                                    <li><a href="#">Product</a></li>
                                    <li class="active">Add Product</li>
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
                                    <h2 align="center">Add New Product</h2>
                                </strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <form method="Post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="input-1">Food Code</label>
                                                        <input type="text" class="form-control  w-mobile-100 " value="<?php echo "FOOD" . rand(1234, 9999); ?>" name="foodcode" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="input-1">Food Name</label>
                                                    <input type="text" class="form-control  w-mobile-100 " name="foodname" placeholder="Food Name" required>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="input-1">Food Category</label>
                                                    <select required name="foodgategory" class="custom-select form-control" required>
                                                        <option value="">-- Select Category --</option>
                                                        <option value="burger">Burger</option>
                                                        <option value="pizza">Pizza</option>
                                                        <option value="pasta">Pasta</option>
                                                        <option value="fries">Fries</option>
                                                    </select>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="input-1">Image</label>
                                                        <input class="form-control" type="file" id="formFile" name="foodimage">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">Description</label>
                                                    <textarea class="form-control" style="resize: none;" name="description" rows="3"></textarea>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Price</label>
                                                        <input type="number" class="form-control " name="price" Required placeholder="Foode Price">
                                                    </div>
                                                </div>

                                            </div>

                                            <div>
                                                <button type="submit" name="submit" class="btn btn-success mt-4">Add Admin</button>
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
                                    <h2 align="center">All Products</h2>
                                </strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Code</th>
                                            <th>Food Name</th>
                                            <th>Food Category</th>
                                            <th>Description</th>
                                            <th>Image</th>                                           
                                            <th>Price</th>
                                            <th>Date Added</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>

                                    <?php
                                    //`code`, `food_name`, `category`, `description`, `image`, `price`, `dateCreated`
                                    $qry1 = "SELECT * FROM `product`";
                                    $ret = mysqli_query($conn, $qry1);
                                    while ($row = mysqli_fetch_array($ret)) {
                                    ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $row['code']; ?></td>
                                                <td><?php echo $row['food_name']; ?></td>
                                                <td><?php echo $row['category']; ?></td>
                                                <td><?php echo $row['description']; ?></td>
                                                <td><img src="../product images/<?php echo $row['image'];?>" height="100" width="100" alt="" style="border-radius: 10px;"></td>
                                                <td><?php echo $row['price']; ?></td>
                                                <td><?php echo $row['dateCreated']; ?></td>
                                                <td><a href="updateproduct.php?updateId=<?php echo $row['code']; ?>" ><i class="fa fa-edit fa-1x"></i></a></td>
                                                <td><a onclick="return confirm('Are you sure you want to delete?')" href="backend/deleteproduct.php?deleteId=<?php echo $row['code']; ?>"><i class="fa fa-trash fa-1x"></i></a></td>
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