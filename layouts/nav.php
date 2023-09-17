<?php
  session_start();
  if (!isset($_SESSION['username'])) {
    header('Location: /auth/login.php');
    exit();
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Персонал</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <h5 align="right"> <?= $_SESSION['username'] ?> </h5>
      <h6 align="right"><a href="/auth/logout.php">Выйти из аккаунта</a></h6>

      <nav>
        <ul>
          <li><a href="http://staff/employees">Список сотрудников</a></li>
          <li><a href="http://staff/employees/create.php">Создать нового сотрудника</a></li>
          <li><a href="http://staff/positions/index.php">Штатное расписание</a></li>
        </ul>
      </nav>
    </div>
  </div>
</body>
</html>