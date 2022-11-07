<?php require 'backend/inc/session.php';
session_destroy();
header('location:login.php');
 ?>