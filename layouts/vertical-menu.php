<header id="page-topbar">
  <?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
  } ?>
  <div class="navbar-header">
    <div class="d-flex">
      <!-- LOGO -->
      <div class="navbar-brand-box">
        <a href="index.php" class="logo logo-dark">
          <span class="logo-sm">
            <img src="assets/images/logo.png" alt="" height="26">
          </span>
          <span class="logo-lg">
            <img src="assets/images/wwlogo.jpeg" alt="" height="26"> <span class="logo-txt">Work Wave</span>
          </span>
        </a>

        <a href="index.php" class="logo logo-light">
          <span class="logo-sm">
            <img src="assets/images/logo-sm.svg" alt="" height="26">
          </span>
          <span class="logo-lg">
            <img src="assets/images/wwlogo.jpeg" alt="" height="26"> <span class="logo-txt">Work Wave</span>
          </span>
        </a>
      </div>

      <!-- <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
      </button> -->
      </form>
    </div>

    <div class="d-flex">

      <!-- night mode button -->
      <!-- <div class="dropdown d-none d-sm-inline-block">
        <button type="button" class="btn header-item" id="mode-setting-btn">
          <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
          <i data-feather="sun" class="icon-lg layout-mode-light"></i>
        </button>
      </div> -->

      <div class="dropdown d-inline-block">
        <button type="button" class="btn header-item bg-light-subtle border-start border-end"
          id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-1.jpg" alt="Header Avatar">
          <span class="d-none d-xl-inline-block ms-1 fw-medium">
            <?php echo $language["Shawn_L"]; ?>.
          </span>
          <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-end">
          <!-- item-->
          <!-- <a class="dropdown-item" href="apps-contacts-profile.php"><i class="mdi mdi mdi-face-man font-size-16 align-middle me-1"></i> <?php echo $language["Profile"]; ?></a> -->
          <!-- <a class="dropdown-item" href="auth-lock-screen.php"><i class="mdi mdi-lock font-size-16 align-middle me-1"></i> <?php echo $language["Lock_screen"]; ?> </a> -->
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php"><i class="mdi mdi-logout font-size-16 align-middle me-1"></i>
            <?php echo $language["Logout"]; ?>
          </a>
        </div>
      </div>

    </div>
  </div>
</header>

<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

  <?php
  $user_role = $_SESSION['role'];
  ?>

  <div data-simplebar class="h-100">

    <!--- Sidemenu -->
    <div id="sidebar-menu">
      <!-- Left Menu Start -->
      <ul class="metismenu list-unstyled" id="side-menu">

        <li class="menu-title" data-key="t-menu">
          <?php echo $language["Menu"]; ?>
        </li>
        <li>
          <a href="index.php">
            <i data-feather="home"></i>
            <span data-key="t-dashboard">
              <?php echo "Dashboard"; ?>
            </span>
          </a>
        </li>

        <?php if ($user_role == 1) { ?>
          <li>
            <a href="add_emp.php">
              <i data-feather="user-plus"></i>
              <span data-key="t-dashboard">
                <?php echo "Add Employees" ?>
              </span>
            </a>
          </li>
          <li>
            <a href="view_emp.php">
              <i data-feather="users"></i>
              <span data-key="t-dashboard">
                <?php echo "View Employees" ?>
              </span>
            </a>
          </li>
          <li>
            <a href="attendance.php">
              <i data-feather="calendar"></i>
              <span data-key="t-dashboard">
                <?php echo "Attendance" ?>
              </span>
            </a>
          </li>
          <li>
            <a href="add_task.php">
              <i data-feather="plus-square"></i>
              <span data-key="t-dashboard">
                <?php echo "Add Task" ?>
              </span>
            </a>
          </li>
          <li>
            <a href="task_list.php">
              <i data-feather="file-text"></i>
              <span data-key="t-dashboard">
                <?php echo "View Tasks" ?>
              </span>
            </a>
          </li>
          <li>
            <a href="leave_history.php">
              <i data-feather="file-text"></i>
              <span data-key="t-dashboard">
                <?php echo "Leave History" ?>
              </span>
            </a>
          </li>
          <li>
            <a href="admin_salary_confirm.php">
              <i data-feather="check-circle"></i>
              <span data-key="t-dashboard">
                <?php echo "Confirm Salary" ?>
              </span>
            </a>
          </li>
          <li>
            <a href="payslip_list.php">
              <i data-feather="file-text"></i>
              <span data-key="t-dashboard">
                <?php echo "Payslip List" ?>
              </span>
            </a>
          </li>
          
          
          <li>
            <a href="profile.php">
              <i data-feather="check-circle"></i>
              <span data-key="t-dashboard">
                <?php echo "Profile" ?>
              </span>
            </a>
          </li>

        <?php } elseif ($user_role == 2) { ?>

          <li>
            <a href="view_emp.php">
              <i data-feather="users"></i>
              <span data-key="t-dashboard">
                <?php echo "View Employees" ?>
              </span>
            </a>
          </li>
          <li>
            <a href="approve_leave.php">
              <i data-feather="user-check"></i>
              <span data-key="t-dashboard">
                <?php echo "Employee Leave" ?>
              </span>
            </a>
          </li>
          <li>
            <a href="attendance.php">
              <i data-feather="calendar"></i>
              <span data-key="t-dashboard">
                <?php echo "Attendance" ?>
              </span>
            </a>
          </li>
          <li>
            <a href="confirm_salary.php">
              <i data-feather="check-circle"></i>
              <span data-key="t-dashboard">
                <?php echo "Confirm Salary" ?>
              </span>
            </a>
          </li>
          
          <li>
            <a href="payslip_list.php">
              <i data-feather="file-text"></i>
              <span data-key="t-dashboard">
                <?php echo "Payslip List" ?>
              </span>
            </a>
          </li>
          <li>
            <a href="pending_salary_list.php">
              <i data-feather="file-text"></i>
              <span data-key="t-dashboard">
                <?php echo "Pending Salary List" ?>
              </span>
            </a>
          </li>
        <?php } elseif ($user_role == 3) { ?>


          <li>
            <a href="attendance.php">
              <i data-feather="calendar"></i>
              <span data-key="t-dashboard">
                <?php echo "Attendance" ?>
              </span>
            </a>
          </li>
          <li>
            <a href="add_leave.php">
              <i data-feather="plus-circle"></i>
              <span data-key="t-dashboard">
                <?php echo "add leave" ?>
              </span>
            </a>
          </li>
          <li>
            <a href="leave_status.php">
              <i data-feather="file"></i>
              <span data-key="t-dashboard">
                <?php echo " leave status" ?>
              </span>
            </a>
          </li>
          <li>
            <a href="task.php">
              <i data-feather="file-text"></i>
              <span data-key="t-dashboard">
                <?php echo "Tasks" ?>
              </span>
            </a>
          </li>

          <li>
            <a href="view_emp.php">
              <i data-feather="users"></i>
              <span data-key="t-dashboard">
                <?php echo "View Other Employees" ?>
              </span>
            </a>
          </li>
        <?php } else { ?>



          <li>
            <a href="attendance.php">
              <i data-feather="calendar"></i>
              <span data-key="t-dashboard">
                <?php echo "Attendance" ?>
              </span>
            </a>
          </li>
          <li>
            <a href="add_leave.php">
              <i data-feather="plus-circle"></i>
              <span data-key="t-dashboard">
                <?php echo "add leave" ?>
              </span>
            </a>
          </li>
          <li>
            <a href="leave_status.php">
              <i data-feather="file"></i>
              <span data-key="t-dashboard">
                <?php echo " leave status" ?>
              </span>
            </a>
          </li>


          <li>
            <a href="view_task.php">
              <i data-feather="file-text"></i>
              <span data-key="t-dashboard">
                <?php echo "View Tasks" ?>
              </span>
            </a>
          </li>
          <li>
            <a href="view_emp.php">
              <i data-feather="users"></i>
              <span data-key="t-dashboard">
                <?php echo "View Other Employees" ?>
              </span>
            </a>
          </li>

        <?php } ?>

      </ul>

    </div>
    <!-- Sidebar -->
  </div>
</div>
<!-- Left Sidebar End -->