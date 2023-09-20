<?php
  require_once '../config/connect.php';
  require '../layouts/nav.php';
  
  $empls = mysqli_query($connect, "SELECT * FROM `employees2`");
  $empls = mysqli_fetch_all($empls);
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

<div class="container">
  <table class="table">

    <thead class="thead-dark">
      <tr>
        <th>№</th>
        <th>Фамилия</th>
        <th>Имя</th>
        <th>Отчество</th>
        <th>Пол</th>
        <th>Дата рождения</th>
        <th>&#128195;</th>
      </tr>
    </thead>

    <tbody>
      <?php
        $i = 1;
        foreach($empls as $empl) {
          
      ?>
        <tr>
          <th><?= $i ?></th>
          <td><?= $empl[1] ?></td>
          <td><?= $empl[2] ?></td>
          <td><?= $empl[3] ?></td>
          <td><?= $empl[4] ?></td>
          <td><?= $empl[5] ?></td>
          <td><a href="show.php?id=<?= $empl[0] ?>">Подробнее</a></td>
        </tr>
      <?php
        $i++;
        }
      ?>
    </tbody>
  </table>
</div>

</body>
</html>