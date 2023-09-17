<?php
  require_once '../config/connect.php';
  require '../layouts/nav.php';
  
  $id = $_GET['id'];
  
  $posit = mysqli_query($connect, "SELECT * FROM `positions2` WHERE `id` = $id");
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
  <div class="container">

    <p>
      <div align=center>
        <h4>Редактировать данные</h4>
      </div>
    </p>
    
    <form action="update.php" method="post">

      <input type="hidden" name="id" value="<?= $id ?>">

      <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Должность</label>
        <div class="col-sm-10">
        <input type="text" name="position" class="form-control" value="<?= $posit['position'] ?>">
        </div>
      </div>

      <div class="row mb-3">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Количество ставок</label>
        <div class="col-sm-10">
        <input type="text" name="position_amount" class="form-control" value="<?= $posit['position_amount'] ?>">
        </div>
      </div>

      <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Оклад</label>
        <div class="col-sm-10">
        <input type="text" name="salary" class="form-control" value="<?= $posit['salary'] ?>">
        </div>
      </div>

      <div align="center">
        <button type="submit" class="btn btn-info">Сохранить</button>
      </div>
    </form>

  </div>
</body>
