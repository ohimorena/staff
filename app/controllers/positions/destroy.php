<?php

require_once CONFIG . '/connect.php';

$id = $_GET['id'];

$sql = 'DELETE FROM `positions` WHERE `id` = :id';
$stmt = $connect->prepare($sql);
$stmt->execute([':id' => $id]);

redirect('/positions/index');