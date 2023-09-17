<?php
  require_once '../config/connect.php';
  require '../layouts/nav.php';
  
  $posits = mysqli_query($connect, "SELECT * FROM `positions2`");
  $posits = mysqli_fetch_all($posits);
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

    <p>
      <h3 align="center">Штатное расписание</h3>
    </p>
    
    <div>
      <table class="table">

        <thead class="thead-dark">
          <tr>
            <th scope="col">№</th>
            <th scope="col">Должность</th>
            <th scope="col">Количество ставок</th>
            <th scope="col">Оклад</th>
            <th scope="col">Создано</th>
            <th scope="col">Обновлено</th>
            <th scope="col">&#9998;</th>
            <th scope="col">&#10008;</th>
          </tr>
        </thead>
  
        <tbody>
          <?php
            $i = 1;
            foreach ($posits as $posit) {
          ?>
          <tr>
            <td> <?= $i ?> </td>
            <td> <?= $posit[1] ?> </td>
            <td> <?= $posit[2] ?> </td>
            <td> <?= $posit[3] ?> </td>
            <td> <?= $posit[4] ?> </td>
            <td> <?= $posit[5] ?> </td>
            <td>
              <form action="edit.php?id=<?= $posit[0] ?>" method="post">
                <input type="submit" value="Изменить" class="btn btn-info">
              </form>
            <td>
              <form action="destroy.php?id=<?= $posit[0] ?>" method="post">
                <input type="submit" value="Удалить" class="btn btn-danger">
              </form>
            </td>
          <?php
            $i++;
            }
          ?>
          </tr>
        </tbody>
      </table>
    </div>
    <br>
  
    <div align="center">
      <form action="create.php" method="get">
        <input type="submit" value="Добавить" class="btn btn-info">
      </form>
    </div>
    <br>
  </div>

</body>
</html>

