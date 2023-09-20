<?php
  session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="/style.css">
  <title>Персонал</title>
</head>

<body>
  <div class="container" class="row">

<?php
  require_once '../config/connect.php';

  if ($_POST['username'] && $_POST['email'] && $_POST['password'] && $_POST['password_confirmation']) {
    $username = $_POST['username'];
    $email = $_POST['email'];
      
      if ($_POST['password'] == $_POST['password_confirmation']) {
        $password = $_POST['password'];
      } else {
        ?>
      <div align="center" class="alert alert-danger" role="alert">
        <h3>Ошибка в подтверждении пароля!</h3>
      </div>
      <?php
      die;
      }
    
      $query = "SELECT * FROM `users2` WHERE `username` = '$username'";
      $stmt = mysqli_query($connect, $query);
      $count = mysqli_num_rows($stmt);
        if ($count == 0) {
          $result = mysqli_query($connect, "INSERT INTO `users2` (`username`, `email`, `password`) 
          VALUES ('$username', '$email', '$password')");
          $_SESSION['username'] = $username;
          ?>
          <div align="center" class="alert alert-info" role="alert">
            <h3>Регистрация прошла успешно</h3>
            <a href="/employees/">Перейти в аккаунт</a>
          </div>
          <?php
        } else {
          ?>
          <div align="center" class="alert alert-danger" role="alert">
            <h3>Это имя пользователя уже занято!</h3>
          </div>
          <?php
          die();
        }
  } else {
    ?>
    <div align="center" class="alert alert-danger" role="alert">
      <h3>Заполните все поля!</h3>
    </div>
    <?php
    die();
  }   
?>

  </div>

</body>
</html>

