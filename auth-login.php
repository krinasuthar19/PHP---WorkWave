<?php
// Initialize the session
session_start();
require "layouts/session.php";
require_once "layouts/config.php";

// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Check if email is empty
  if (empty(trim($_POST["email"]))) {
    $email_err = "Please enter email.";
  } else {
    $email = trim($_POST["email"]);
  }

  // Check if password is empty
  if (empty(trim($_POST["password"]))) {
    $password_err = "Please enter your password.";
  } else {
    $password = trim($_POST["password"]);
  }

  if (empty($email_err) && empty($password_err)) {
    $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
    $result = mysqli_query($link, $sql);
    $numRows = mysqli_num_rows($result);
    if ($numRows == 1) {
      $row = mysqli_fetch_assoc($result);
      // if (password_verify($password, $row['password'])) {
      if ($password===$row['password']) {
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['u_id'] = $row['u_id'];
        $_SESSION['role'] = $row['role'];
        $_SESSION['d_id'] = $row['d_id'];
        $_SESSION['email'] = $email;

        switch ($_SESSION['role']) {
          case 1:
            header("location: index.php");
            break;
          case 2:
            header("location: index.php");
            break;
          case 3:
            header("location: index.php");
            break;
          case 4:
            header("location: index.php");
            break;

          default:
            header("location: auth-login.php");
            break;
        }
      }
    }
    header("location: auth-login.php");
  }

  // Close connection
  mysqli_close($link);
}
?>
<?php include 'layouts/head-main.php'; ?>

<head>

  <title>Login | Minia - Admin & Dashboard Template</title>
  <?php include 'layouts/head.php'; ?>

  <?php include 'layouts/head-style.php'; ?>

</head>

<?php include 'layouts/body.php'; ?>
<div class="auth-page">
  <div class="container-fluid p-0">
    <div class="row g-0">
      <div class="col-xxl-3 col-lg-4 col-md-5">
        <div class="auth-full-page-content d-flex p-sm-5 p-4">
          <div class="w-100">
            <div class="d-flex flex-column h-100">
              <div class="mb-4 mb-md-5 text-center">
                <a href="index.php" class="d-block auth-logo">
                  <img src="assets/images/logo-sm.svg" alt="" height="28"> <span class="logo-txt">WorkWave</span>
                </a>
              </div>
              <div class="auth-content my-auto">
                <div class="text-center">
                  <h5 class="mb-0">Welcome Back !</h5>
                  <p class="text-muted mt-2">Sign in to continue to WorkWave.</p>
                </div>
                <form class="mt-4 pt-2" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                  <div class="mb-3 <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                    <label class="form-label" for="email">Email</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" autocomplete="off">
                    <span class="text-danger"><?php echo $email_err; ?></span>
                  </div>
                  <div class="mb-3 <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <div class="d-flex align-items-start">
                      <div class="flex-grow-1">
                        <label class="form-label" for="password">Password</label>
                      </div>
                      <div class="flex-shrink-0">
                        <div class="">
                          <a href="auth-recoverpw.php" class="text-muted">Forgot password?</a>
                        </div>
                      </div>
                    </div>

                    <div class="input-group auth-pass-inputgroup">
                      <input type="password" class="form-control" placeholder="Enter password" name="password" aria-label="Password" aria-describedby="password-addon" autocomplete="off">
                      <span class="text-danger"><?php echo $password_err; ?></span>
                      <button class="btn btn-light ms-0" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remember-check">
                        <label class="form-check-label" for="remember-check">
                          Remember me
                        </label>
                      </div>
                    </div>

                  </div>
                  <div class="mb-3">
                    <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Log In</button>
                  </div>
                </form>

                <div class="mt-4 pt-2 text-center">
                  <div class="signin-other-title">
                    <h5 class="font-size-14 mb-3 text-muted fw-medium">- Sign in with -</h5>
                  </div>

                  <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                      <a href="javascript:void()" class="social-list-item bg-primary text-white border-primary">
                        <i class="mdi mdi-facebook"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="javascript:void()" class="social-list-item bg-info text-white border-info">
                        <i class="mdi mdi-twitter"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="javascript:void()" class="social-list-item bg-danger text-white border-danger">
                        <i class="mdi mdi-google"></i>
                      </a>
                    </li>
                  </ul>
                </div>

                <div class="mt-5 text-center">
                  <p class="text-muted mb-0">Don't have an account ? <a href="auth-register.php" class="text-primary fw-semibold"> Signup now </a> </p>
                </div>
              </div>
              <div class="mt-4 mt-md-5 text-center">
                <p class="mb-0">© <script>
                    document.write(new Date().getFullYear())
                  </script> Minia . Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
              </div>
            </div>
          </div>
        </div>
        <!-- end auth full page content -->
      </div>
      <!-- end col -->
      <div class="col-xxl-9 col-lg-8 col-md-7">
        <div class="auth-bg pt-md-5 p-4 d-flex">
          <div class="bg-overlay bg-primary"></div>
          <ul class="bg-bubbles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
          </ul>
          <!-- end bubble effect -->
          <div class="row justify-content-center align-items-center">
            <div class="col-xl-7">
              <div class="p-0 p-sm-4 px-xl-0">
                <div id="reviewcarouselIndicators" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-indicators carousel-indicators-rounded justify-content-start ms-0 mb-0">
                    <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                  </div>
                  <!-- end carouselIndicators -->
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <div class="testi-contain text-white">
                        <i class="bx bxs-quote-alt-left text-success display-6"></i>

                        <h4 class="mt-4 fw-medium lh-base text-white">“Unity is strength. 
                          When there is teamwork and collaboration, 
                          wonderful things can be achieved.” ― Mattie Stepanek”
                        </h4>
                      </div>
                    </div>

                    <div class="carousel-item">
                      <div class="testi-contain text-white">
                        <i class="bx bxs-quote-alt-left text-success display-6"></i>

                        <h4 class="mt-4 fw-medium lh-base text-white">“Many ideas grow better when
                           transplanted into another mind than 
                           the one where they sprang up.” – Oliver Wendell Holmes”</h4>
                      </div>
                    </div>

                    <div class="carousel-item">
                      <div class="testi-contain text-white">
                        <i class="bx bxs-quote-alt-left text-success display-6"></i>

                        <h4 class="mt-4 fw-medium lh-base text-white">“Collaboration is a key part of the success of any organization,
                          executed through a clearly defined vision and mission and
                           based on transparency and constant communication." — Dinesh Paliwal”</h4>
                      </div>
                    </div>
                  </div>
                  <!-- end carousel-inner -->
                </div>
                <!-- end review carousel -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end col -->
    </div>
    <!-- end row -->
  </div>
  <!-- end container fluid -->
</div>


<!-- JAVASCRIPT -->

<?php include 'layouts/vendor-scripts.php'; ?>
<!-- password addon init -->
<script src="assets/js/pages/pass-addon.init.js"></script>

</body>

</html>