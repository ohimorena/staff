<?php
require_once '../../config/connect.php';
require_once '../../config/path.php';

$position = $_POST['position'];
$position_amount = $_POST['position_amount'];
$salary = $_POST['salary'];

$sql = 'INSERT INTO `positions2` (`position`, `position_amount`, `salary`) 
VALUES (:position, :position_amount, :salary)';
$sth = $connect->prepare($sql);
$sth->execute([':position' => $position, ':position_amount' => $position_amount, ':salary' => $salary]);

header("Location:" . PATH . "positions/");