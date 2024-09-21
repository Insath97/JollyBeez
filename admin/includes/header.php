 <!-- Header-->
 <header id="header" class="header">
     <div class="top-left">
         <div class="navbar-header">
             <a class="navbar-brand" href="./">JollyBeez</a>

             <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
         </div>
     </div>
     <div class="top-right">
         <div class="header-menu">
             <div class="header-left">

                 <div class="form-inline">
                     <form class="search-form">
                         <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                         <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                     </form>
                 </div>

                 <div class="user-area dropdown float-right">
                     <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <img class="user-avatar rounded-circle" src="assets/img/admin-icn.png" alt="User Avatar">

                     </a>

                     <div class="user-menu dropdown-menu">
                         <a class="nav-link" onclick="return confirm('Are you sure you want to Logout?')" href="backend/logout.php"><i class="fa fa-power-off"></i>Logout</a>
                     </div>
                 </div>

             </div>
         </div>

 </header>
 <script src="assets/js/main.js"></script>