<?php
  session_start();
  session_unset($_SESSION['login']);
  header('location:index.php');
 ?>