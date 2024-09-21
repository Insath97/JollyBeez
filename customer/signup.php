<?php
include("dbconnect.php");

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['em'];
  $password = $_POST['password'];

  $qry = "INSERT INTO `user`(`name`, `email`, `password`) 
    VALUES ('$name','$email','$password')";

  $result = mysqli_query($conn, $qry);

  if ($result) {
    $successScript = "
        Swal.fire({
            icon: 'success',
            title: 'Registration Successful',
            text: 'You have been registered successfully!',
            showConfirmButton: false,
            timer: 1500
        }).then(() => {
            window.location.href = 'signup.php';
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

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <link rel="shortcut icon" href="images/favicon.png" type="">

  <!-- Style -->
  <link rel="stylesheet" href="css/style-login.css">

  <!-- sweet alert -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
  <!-- scripts -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>

  <title>Jollybeez</title>
</head>

<body>

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('images/login-burger.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3>Login to <strong>Jollybeez</strong></h3>
            <p class="mb-4">Welcome to Jollybeez! Discover the juiciest handcrafted burgers, classic to gourmet.</p>
            <form method="post">

              <div class="form-group first">
                <label for="username">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Name">
              </div>

              <div class="form-group first">
                <label for="username">Email</label>
                <input type="email" class="form-control" name="em" placeholder="Email address" id="username">
              </div>

              <div class="form-group last mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Your Password" id="password">
              </div>


              <button type="submit" class="submit-login btn btn-block btn-primary" name="submit">Signup</button>

            </form>
            <p class="mt-4 text-center">Already have an account? <a href="index.php">Login here</a></p>

          </div>
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

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  </script>
</body>

</html>