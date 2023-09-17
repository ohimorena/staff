<?php
    require_once '../config/connect.php';

    $id = $_GET['id'];
    mysqli_query($connect, "DELETE FROM `employees2` WHERE `employees2`.`id` = $id");
    header('Location: /employees/');
?>