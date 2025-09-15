<?php

require_once CONFIG . '/connect.php';

$id = $_GET['id'];

$sql = 'DELETE FROM `employees` WHERE `id` = :id';
$sth = $connect->prepare($sql);
$sth->execute([':id' => $id]);

redirect('/employees/index');