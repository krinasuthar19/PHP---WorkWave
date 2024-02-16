<?php
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
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
  exit;
}
?>