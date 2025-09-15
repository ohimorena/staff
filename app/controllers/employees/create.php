<?php

require_once CONFIG . '/connect.php';
require_once VIEWS . '/layouts/nav.php';

$sql = 'SELECT * FROM `positions`';
$posits = $connect->query($sql);

require_once VIEWS . '/employees/create.tpl.php';