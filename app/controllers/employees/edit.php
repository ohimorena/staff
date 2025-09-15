<?php

require_once CONFIG . '/connect.php';
require_once VIEWS . '/layouts/nav.php';

$id = $_GET['id'];

$sql = 'SELECT `employees`.`id`, `employees`.`surname`, `employees`.`name`,`employees`.`patronymic`,`employees`.`sex`,`employees`.`date_of_birth`,`positions`.`position`, `positions`.`salary`
FROM `employees` JOIN `employee_positions`
ON `employees`.`id`=`employee_positions`.`empl_id`
JOIN `positions`
ON `employee_positions`.`posit_id` = `positions`.`id`
WHERE `employees`.`id` = :id';
$stmt = $connect->prepare($sql);
$stmt->execute([':id' => $id]);
$empl = $stmt->fetch(PDO::FETCH_ASSOC);

$sql = 'SELECT * FROM `positions`';
$posits = $connect->query($sql);

require_once VIEWS . '/employees/edit.tpl.php';

