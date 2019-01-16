<?php
include('../db/config.php');
$sqlcountrow=mysqli_query($con,"SELECT * FROM `law_report` WHERE `status`='In Process'"); 
$countrow=mysqli_num_rows($sqlcountrow);
$sqlcountsatt=mysqli_query($con,"SELECT * FROM `law_report` WHERE `status`='Sattaled'"); 
$countsatt=mysqli_num_rows($sqlcountsatt);
?>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
         
          <li class="nav-item">
            <a class="nav-link" href="index">
              <i class="menu-icon mdi mdi-television text-warning"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="inprocess-case">
              <i class="menu-icon mdi mdi mdi-sync text-success "></i>
              <span class="menu-title">In Process Cases</span>
              <span class="badge badge-pill badge-danger"><?php echo $countrow; ?></span>
               
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sattaled-case">
              <i class="menu-icon mdi mdi mdi-sync-alert text-warning "></i>
              <span class="menu-title">Sattaled Cases</span>
              <span class="badge badge-pill badge-danger"><?php echo $countsatt; ?></span>
               
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="closed-case">
              <i class="menu-icon mdi mdi mdi-sync-off text-danger "></i>
              <span class="menu-title">Closed Cases</span>
             
               
            </a>
          </li>


         <!--  <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#report_section" aria-expanded="false" aria-controls="report_section">
              <i class="menu-icon mdi mdi-file text-info"></i>
              <span class="menu-title">Report Section</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="report_section">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">

                  <a class="nav-link" href="report-all"> <i class="menu-icon mdi mdi-book-multiple-variant text-info"> </i> All Report </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="report-byDate"><i class="menu-icon mdi mdi-book-variant text-info"> </i> Date Wise Report</a>
                </li>
              </ul>
            </div>
          </li> -->

          <li class="nav-item">
            <a class="nav-link" href="report-all">
              <i class="menu-icon mdi mdi-file text-success"></i>
              <span class="menu-title">Report All</span>
            </a>
          </li>

          
          <li class="nav-item">
            <a class="nav-link" href="report_add">
              <i class="menu-icon mdi mdi-at text-success"></i>
              <span class="menu-title">Report Add</span>
            </a>
          </li>

          
        
<!-- Advisor Add Section -->
           <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#advisor_section" aria-expanded="false" aria-controls="advisor_section">
              <i class="menu-icon mdi mdi-account-multiple-plus text-success"></i>
              <span class="menu-title">Advisor Section</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="advisor_section">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="advisor-all"><i class="menu-icon mdi mdi-clipboard-check text-success"></i> All Advisor Info </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="advisor-add"><i class="menu-icon mdi mdi-pen text-success"></i> Add Advisor</a>
                </li>
                  
              </ul>
            </div>
          </li>



<!--   Notice Add Section -->
           <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#notice_section" aria-expanded="false" aria-controls="notice_section">
              <i class="menu-icon mdi mdi-bell-ring-outline text-warning"></i>
              <span class="menu-title">Notice Section</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="notice_section">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="notice-all"><i class="menu-icon mdi mdi-bell-outline text-success"></i> All Notice </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="notice-add"><i class="menu-icon mdi mdi-pen text-success"></i> Add Notice</a>
                </li>
                  
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="case-dept-add">
              <i class="menu-icon mdi mdi-at text-success"></i>
              <span class="menu-title">Case Department Add</span>
            </a>
          </li>

      



        </ul>
      </nav>