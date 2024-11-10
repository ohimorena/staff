<?php
require_once '../../config/connect.php';
require_once '../../config/path.php';

$empl_id = $_POST['empl_id'];
$surname = $_POST['surname'];
$name = $_POST['name'];
$patronymic = $_POST['patronymic'];
$sex = $_POST['sex'];
$date_of_birth = $_POST['date_of_birth'];

$posit_id = $_POST['posit_id'];

$sql = 'UPDATE `employees2` 
SET `surname` = :surname, `name` = :name, `patronymic` = :patronymic, `sex` = :sex, `date_of_birth` = :date_of_birth 
WHERE `id` = :id';
$sth = $connect->prepare($sql);
$sth->execute([':id' => $empl_id, ':surname' => $surname, ':name' => $name, ':patronymic' => $patronymic, ':sex' => $sex, ':date_of_birth' => $date_of_birth]);

$sql = 'UPDATE `employees_positions2` 
SET `posit_id` = :posit_id
WHERE `empl_id` = :empl_id';
$sth = $connect->prepare($sql);
$sth->execute([':posit_id' => $posit_id, ':empl_id' => $empl_id]);

header("Location:" . PATH . "employees/");

