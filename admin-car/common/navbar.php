    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="index">
          <img src="images/cpb.carpool.gif" alt="CPB.CarPool" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="index.html">
          <img src="images/cpb.carpool.gif" alt="CPB.CarPool" />
        </a>
        
      </div>



      <div class="navbar-menu-wrapper d-flex align-items-center">
  <?php 
$admin_id= $_SESSION['admin_id'];
$query=mysqli_query($con,"SELECT `admin_name`, `admin_img` FROM `admin` WHERE `admin_id`='$admin_id'");
$row=$query->fetch_assoc();
 ?>
  <span class="profile-text">Hello, <b style="color: dimgray; text-transform: capitalize;"> <?php echo $row['admin_name']; ?> </b> </span>



        <ul class="navbar-nav navbar-nav-right">


<?php if (strlen($_SESSION['admin-redirect']) !=0 ) 
{?>
 <a href="../admin/project_direct/"><button class="btn btn-danger">Home</button></a>
<?php }?>



          <li class="nav-item dropdown d-none d-xl-inline-block">

            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <?php 
              $admin= $_SESSION['admin-car-login'];
              $query=mysqli_query($con,"SELECT `admin_img` FROM `admin` WHERE `admin_login`='$admin'");
             $row=$query->fetch_assoc();
               ?>
              <img class="img-xs rounded-circle" src="../pimages/admin/<?php echo $row['admin_img']; ?>" alt="Image">
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              
              
              <a href="change-password" class="dropdown-item"><i class="menu-icon mdi mdi-account-key text-success"></i>
                Change Password
              </a>
              
              <a href="logout" class="dropdown-item"><i class="menu-icon mdi mdi-close-network text-danger"></i>
                Sign Out
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
