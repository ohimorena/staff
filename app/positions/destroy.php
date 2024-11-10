<?php
require_once '../../config/connect.php';
require_once '../../config/path.php';

$id = $_GET['id'];

$sql = 'DELETE FROM `positions2` WHERE `id` = :id';
$sth = $connect->prepare($sql);
$sth->execute([':id' => $id]);

header("Location:" . PATH . "positions/");