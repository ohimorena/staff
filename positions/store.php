<?php
  require_once '../config/connect.php';

  $position = $_POST['position'];
  $position_amount = $_POST['position_amount'];
  $salary = $_POST['salary'];

  mysqli_query($connect, "INSERT INTO `positions2` (`position`, `position_amount`, `salary`) 
  VALUES ('$position', '$position_amount', '$salary')");

  header('Location: /positions/');
?>