<?php

require_once CONFIG . '/connect.php';
require_once VIEWS . '/layouts/nav.php';

$id = $_GET['id'];

$sql = 'SELECT * FROM `positions` WHERE `id` = :id';
$sth = $connect->prepare($sql);
$sth->execute([':id' => $id]);
$posit = $sth->fetch(PDO::FETCH_ASSOC);

require_once VIEWS . '/positions/edit.tpl.php';