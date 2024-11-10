<?php
$dsn = 'mysql:host=localhost;dbname=staff';
$user = 'root';
$password = '';

$connect = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);