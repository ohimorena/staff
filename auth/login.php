<?php
  require_once '../config/connect.php'; 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="/style.css">
    <title>Персонал</title>
</head>

<body>
  <div class="container">

    <form class="form-signin" action="login_handler.php" method="post">
      <h2 align="center">Вход</h2>

      <input type="text" name="username" class="form-control" placeholder="username">
      <input type="password" name="password" class="form-control" placeholder="password">
      
      <div class="d-grid gap-2">
        <button type="submit" class="btn btn-info btn-block" id="submit">Продолжить</button>
      </div>
    </form>

    <p align="center">У меня еще нет <a href="register.php">аккаунта</a></p>
  </div>

</body>
</html>


