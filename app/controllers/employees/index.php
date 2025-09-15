<?php

require_once CONFIG . '/connect.php';
require_once VIEWS . '/layouts/nav.php';

$sql = 'SELECT * FROM `employees`';
$empls = $connect->query($sql);

require_once VIEWS . '/employees/index.tpl.php';