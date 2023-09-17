<?php
  require_once '../config/connect.php';

  $id = $_GET['id'];

  mysqli_query($connect, "DELETE FROM `positions2` WHERE `positions2`.`id` = $id");
  header('Location: /positions/');
?>