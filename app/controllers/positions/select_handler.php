<?php

require_once CONFIG . '/connect.php';

$json = file_get_contents("php://input");
$data = json_decode($json, true);

$sql = 'SELECT `id`, `surname`, `name` FROM `employees` 
JOIN `employee_positions` 
ON `employees`.`id` = `employee_positions`.`empl_id` 
WHERE `posit_id` = :posit_id';
$stmt = $connect->prepare($sql);
$stmt->execute($data);
$empls = $stmt->fetchAll();
$res = $stmt->rowCount();

if($res > 0) {
  foreach($empls as $empl) {
    echo '<option value="'.$empl[0].'">'.$empl[1]." ".$empl[2].'</option>';
  }
}