<?php
  session_start();
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

<?php
  if ($_POST['username'] and $_POST['password']) {
    $username = $_POST['username'];
    $password = $_POST['password'];
  
    $query = "SELECT * FROM `users2` WHERE `username` = '$username' AND `password` = '$password'";
    $result = mysqli_query($connect, $query);
    $count = mysqli_num_rows($result);

      if ($count == 1) {
        $_SESSION['username'] = $username;
        header('Location: /employees/');
      } else {
        ?>
        <div align="center" class="alert alert-danger" role="alert">
          <h3>Неверное имя пользователя или пароль!</h3>
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


