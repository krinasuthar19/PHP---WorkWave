<?php
if ($_SESSION['role'] != 1) {
  header("Location: auth-login.php");
  exit();
}
?>