<?php
require_once '../../config/connect.php';
require_once '../../config/path.php';

session_start();
session_destroy();
header("Location:" . PATH . "auth/login.php");
exit;