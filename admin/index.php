<?php
session_start();
include("dbconnect.php");

// `Id`, `name`, `email`, `password`

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $qry = "SELECT * FROM `admin` WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $qry);
    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);

    if ($count > 0) {
        $_SESSION['Id'] = $row['Id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $row['email'];

        header("location:dashboard.php");
    } else {
        $errorScript = "
            Swal.fire({
                icon: 'error',
                title: 'Login Failed',
                text: 'Invalid username or password!',
                confirmButtonText: 'OK'
            }); ";
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
    <link rel="stylesheet" href="assets/css/style2.css">

    <!-- sweet alert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <!-- scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>
<body class="bg-light">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <!-- <img class="align-content" src="images/adminGreen.jpg" alt=""> -->
                    </a>
                </div>
                <div class="login-form">
                    <form method="Post" Action="">
                            <!-- <?php echo $errorMsg; ?>  this is the validation code-->
                               <strong><h2 align="center">Administrator Login</h2></strong><hr>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" Required class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" Required class="form-control" placeholder="Password">
                        </div>                       						
                        <button type="submit" name="login" class="btn btn-success btn-flat m-b-30 m-t-30">Log in </button>	                      				                    
                    </form>
                </div>
            </div>
        </div>
    </div>

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

</body>
</html>