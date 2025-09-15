<?php

require_once VIEWS . '/layouts/nav.php';
require_once CONFIG . '/connect.php';

$id = $_GET['id'];

$sql = 'SELECT `employees`.`id`, `employees`.`surname`, `employees`.`name`,`employees`.`patronymic`,`employees`.`sex`,`employees`.`date_of_birth`,`positions`.`position`, `positions`.`salary`
FROM `employees` JOIN `employee_positions`
ON `employees`.`id`=`employee_positions`.`empl_id`
JOIN `positions`
ON `employee_positions`.`posit_id` = `positions`.`id`
WHERE `employees`.`id` = :id';
$sth = $connect->prepare($sql);
$sth->execute([':id' => $id]);
$empl = $sth->fetch(PDO::FETCH_ASSOC);

require_once VIEWS . '/employees/show.tpl.php';