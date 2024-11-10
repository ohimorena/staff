<?php
require_once '../../config/connect.php';
require_once '../../config/path.php';

$surname = $_POST['surname'];
$name = $_POST['name'];
$patronymic = $_POST['patronymic'];
$sex = $_POST['sex'];
$date_of_birth = $_POST['date_of_birth'];

$posit_id = $_POST['posit_id'];

$sql = 'INSERT INTO `employees2` (`surname`, `name`, `patronymic`, `sex`, `date_of_birth`) 
VALUES (:surname, :name, :patronymic, :sex, :date_of_birth)';
$sth = $connect->prepare($sql);
$sth->execute([':surname' => $surname, ':name' => $name, ':patronymic' => $patronymic, ':sex' => $sex, ':date_of_birth' => $date_of_birth]);

$empl_id = $connect->lastInsertId();

$sql = 'INSERT INTO `employees_positions2` (`empl_id`, `posit_id`) 
VALUES (:empl_id, :posit_id)';
$sth = $connect->prepare($sql);
$sth->execute([':empl_id' => $empl_id, ':posit_id' => $posit_id]);

header("Location:" . PATH . "employees/");