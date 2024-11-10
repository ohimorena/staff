<?php
require_once '../../config/connect.php';
require_once '../../config/path.php';

session_start();
if (!isset($_SESSION['username'])) {
  header("Location:" . PATH . "auth/login.php");
  exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <title>Персонал</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <h5 align="right"> <?= $_SESSION['username'] ?> </h5>
      <h6 align="right"><a href="/app/auth/logout.php">Выйти из аккаунта</a></h6>
      <nav>
        <ul>
          <li><a href="<?= PATH . 'employees' ?>">Список сотрудников</a></li>
          <li><a href="<?= PATH . 'employees/create.php' ?>">Создать нового сотрудника</a></li>
          <li><a href="<?= PATH . 'positions/index.php' ?>">Штатное расписание</a></li>
        </ul>
      </nav>
    </div>