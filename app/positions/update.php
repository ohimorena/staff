<?php
require_once '../../config/connect.php';
require_once '../../config/path.php';

$id = $_POST['id'];
$position = $_POST['position'];
$position_amount = $_POST['position_amount'];
$salary = $_POST['salary'];

$sql = 'UPDATE `positions2` 
SET `position` = :position, `position_amount` = :position_amount, `salary` = :salary 
WHERE `id` = :id';
$sth = $connect->prepare($sql);
$sth->execute([':id' => $id, ':position' => $position, ':position_amount' => $position_amount, ':salary' => $salary]);

header("Location:" . PATH . "positions/");