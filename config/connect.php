<?php

$dsn = 'mysql:host=mysql-5.7;dbname=staff';
$user = 'root';
$password = '';

$connect = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);