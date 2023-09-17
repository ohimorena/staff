<?php
  require_once '../config/connect.php';

  $id = $_POST['id'];
  $position = $_POST['position'];
  $position_amount = $_POST['position_amount'];
  $salary = $_POST['salary'];
  
  mysqli_query($connect, "UPDATE `positions2` 
  SET `position` = '$position', `position_amount` = '$position_amount', `salary` = '$salary' 
  WHERE `positions2`.`id` = '$id'");

  header('Location: /positions/');
?>