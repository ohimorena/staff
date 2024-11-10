<?php
require_once '../../config/connect.php';

$posit_id = $_POST["posit_id"];

$sql = 'SELECT `id`, `surname`, `name` FROM `employees2` 
JOIN `employees_positions2` 
ON `employees2`.`id` = `employees_positions2`.`empl_id` 
WHERE `posit_id` = :posit_id';
$sth = $connect->prepare($sql);
$sth->execute([':posit_id' => $posit_id]);
$empls = $sth->fetchAll();
$res = $sth->rowCount();

if($res > 0) {
  foreach($empls as $empl) {
    echo '<option value="'.$empl[0].'">'.$empl[1]." ".$empl[2].'</option>';
  }
}