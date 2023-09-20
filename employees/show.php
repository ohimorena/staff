<?php
  require_once '../config/connect.php';
  require '../layouts/nav.php';
  
  $id = $_GET['id'];

  $empl = mysqli_query($connect, "SELECT * FROM `employees2` WHERE `id` = $id");
  $empl = mysqli_fetch_assoc($empl);


  $empl_posit = mysqli_query($connect, "SELECT * FROM `employees_positions2` WHERE `empl_id` = $id");
  $empl_posit = mysqli_fetch_assoc($empl_posit);
  $posit_id = $empl_posit['posit_id'];

  $posit = mysqli_query($connect, "SELECT * FROM `positions2` WHERE `id` = $posit_id");
  $posit = mysqli_fetch_assoc($posit);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Персонал</title>
</head>

<body>
  <div class="container text-center">

    <div>
      <p><a href="index.php">Назад</a></p>
    </div>

    <div>
      <table class="table table-bordered">

        <tr>
          <th>Фамилия, имя, отчество</th>
          <td><?= $empl['surname'] ?></td>
          <td><?= $empl['name'] ?></td>
          <td><?= $empl['patronymic'] ?></td>
        </tr>

        <tr>
          <th>Пол</th>
          <td><?= $empl['sex'] ?></td>
          <th>Дата рождения</th>
          <td><?= $empl['date_of_birth'] ?></td>
        </tr>
      
        <tr>
          <th>Должность</th>
          <td> <?= $posit['position'] ?> </td>
          <th>Оклад</th>
          <td> <?= $posit['salary'] ?> </td>
        </tr>

      </table>
    </div>
    <br>

    <form action="edit.php?id=<?= $empl['id'] ?>" method="post">
      <input type="submit" value="Изменить" class="btn btn-info">
    </form><br>
    
    <form action="destroy.php?id=<?= $empl['id'] ?>" method="post">
      <input type="submit" value="Удалить" class="btn btn-danger">
    </form>

  </div>

</body>
</html>