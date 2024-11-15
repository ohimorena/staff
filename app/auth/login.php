<?php
require_once '../../config/connect.php';
require_once '../../config/path.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <link rel="stylesheet" href="/style.css">
  <title>Персонал</title>
</head>

<body>
  <section>
    <div class="container">
      <form class="form-signin">
        <h2 align="center">Вход</h2>
        <input type="text" name="username" class="form-control" placeholder="username">
        <input type="password" name="password" class="form-control" placeholder="password">
        <div class="d-grid gap-2">
          <button type="submit" class="btn btn-info btn-block" id="submit">Продолжить</button>
        </div>
        <div class="message"></div>
      </form>
      <div align="center" id="login-link">
        У меня ещё <a href="<?= PATH . 'auth/register.php' ?>">нет аккаунта</a>
      </div>
    </div>
  </section>
  
  <script>
    $(function() {
      $('.form-signin').on('submit', function(event) {
        event.preventDefault();
        $.post("login_handler.php", $(this).serialize(), function(data) {
          if (data == 'success') {
            window.location.href = '/app/employees/';
          } else {
            $('.message').html(data);
          }
        });
      })
    })
  </script>

</body>
</html>


