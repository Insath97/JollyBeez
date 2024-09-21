<?php
session_start();
include("dbconnect.php");

?>
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <?php
                if (isset($_SESSION['name'])) {
                ?>
                    <li class="menu-title">ADMIN: &nbsp;&nbsp;&nbsp;<?php echo  $_SESSION['name']; ?> </li>
                <?php } ?>
                <li class="">
                    <a href="dashboard.php"><i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>

                <li class="menu-title">Customer section</li>
                <li class="menu-item-has-children dropdown ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Products</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-plus"></i> <a href="createproduct.php">Add New Products</a></li>
                        <li><i class="fa fa-eye"></i> <a href="viewproduct.php">View Products</a></li>
                    </ul>           
                </li>

                <li class="menu-item-has-children dropdown ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user-circle"></i>Customers</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-plus"></i> <a href="#">Add New Products</a></li>
                        <li><i class="fa fa-eye"></i> <a href="viewcustomer.php">View Products</a></li>
                    </ul>
                </li>

                <li class="menu-title">Employee section</li>
                <li class="menu-item-has-children dropdown ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Admin</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-plus"></i> <a href="createadmin.php">Add Admin</a></li>
                        <li><i class="fa fa-eye"></i> <a href="viewadmin.php">View Admin</a></li>
                    </ul>
                </li>

                <li class="menu-title">Account</li>
                <li>
                    <a onclick="return confirm('Are you sure you want to Logout?')" href="backend/logout.php"> <i class="menu-icon fa fa-power-off"></i>Logout </a>
                </li>
            </ul>

            </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>