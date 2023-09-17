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
    
    <form class="form-signin" action="reg_handler.php" method="post">
      <h2 align="center">Регистрация</h2>

      <input type="text" name="username" class="form-control" placeholder="username">
      <input type="email" name="email" class="form-control" placeholder="example@email.com">
      <input type="password" name="password" class="form-control" placeholder="password">
      <input type="password" name="password_confirmation" class="form-control" placeholder="password confirmation">
      
      <div class="d-grid gap-2">
        <button type="submit" class="btn btn-info btn-block" id="submit">Продолжить</button>
      </div>
    </form>

    <p align="center">У меня уже есть <a href="login.php">аккаунт</a></p>
  </div>
  
</body>
</html>