<?php
  require_once '../config/connect.php';

  $empl_id = $_POST['empl_id'];
  $surname = $_POST['surname'];
  $name = $_POST['name'];
  $patronymic = $_POST['patronymic'];
  $sex = $_POST['sex'];
  $date_of_birth = $_POST['date_of_birth'];

  $posit_id = $_POST['posit_id'];
  
  mysqli_query($connect, "UPDATE `employees2` 
  SET `surname` = '$surname', `name` = '$name', `patronymic` = '$patronymic', `sex` = '$sex', `date_of_birth` = '$date_of_birth' 
  WHERE `employees2`.`id` = '$empl_id'");

  mysqli_query($connect, "UPDATE `employees_positions2` 
  SET `posit_id` = $posit_id 
  WHERE `employees_positions2`.`empl_id` = $empl_id");

  header('Location: /employees/');
?>



