<?php
if ($_SESSION['role'] != 2) {
  header("Location: auth-login.php");
  exit();
}
