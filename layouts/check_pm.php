<?php
if ($_SESSION['role'] != 3) {
  header("Location: auth-login.php");
  exit();
}
