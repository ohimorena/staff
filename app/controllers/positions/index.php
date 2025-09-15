<?php

require_once CONFIG . '/connect.php';
require_once VIEWS . '/layouts/nav.php';

$sql = 'SELECT * FROM `positions`';
$stmt = $connect->prepare($sql);
$stmt->execute();
$posits = $stmt->fetchAll();

require_once VIEWS . '/positions/index.tpl.php';