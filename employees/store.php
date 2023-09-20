<?php
  require_once '../config/connect.php';
  
  $surname = $_POST['surname'];
  $name = $_POST['name'];
  $patronymic = $_POST['patronymic'];
  $sex = $_POST['sex'];
  $date_of_birth = $_POST['date_of_birth'];

  $posit_id = $_POST['posit_id'];

  mysqli_query($connect, "INSERT INTO `employees2` (`surname`, `name`, `patronymic`, `sex`, `date_of_birth`) 
  VALUES ('$surname', '$name', '$patronymic', '$sex', '$date_of_birth')");

  $empl_id = mysqli_insert_id($connect);
  
  mysqli_query($connect, "INSERT INTO `employees_positions2` (`empl_id`, `posit_id`) 
  VALUES ('$empl_id', '$posit_id')");

  header('Location: /employees/');
?>