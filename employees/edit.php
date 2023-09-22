<?php
  require_once '../config/connect.php';
  require '../layouts/nav.php';
  
  $empl_id = $_GET['id'];
  $empl = mysqli_query($connect, "SELECT * FROM `employees2` WHERE `id` = $empl_id");
  $empl = mysqli_fetch_assoc($empl);

  $posits = mysqli_query($connect, "SELECT * FROM `positions2`");
  $posits = mysqli_fetch_all($posits);
  
  $empl_pivot = mysqli_query($connect, "SELECT * FROM `employees_positions2`  
  LEFT JOIN `positions2`
  ON `employees_positions2`.`posit_id`= `positions2`.`id` 
  WHERE `employees_positions2`.`empl_id` = $empl_id");
  $empl_pivot = mysqli_fetch_assoc($empl_pivot); 
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
    <title>Обновить данные</title>
</head>

<body>
  <div class="container">
  
    <p>
      <div align=center>
        <h4>Редактировать данные</h4>
      </div>
    </p>

    <form action="update.php" method="post">

    <input type="hidden" name="empl_id" value="<?= $empl_id ?>">

    <div class="row mb-3">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Фамилия</label>
      <div class="col-sm-10">
      <input type="text" name="surname" class="form-control" value="<?= $empl['surname'] ?>">
      </div>
    </div>

    <div class="row mb-3">
      <label for="inputPassword3" class="col-sm-2 col-form-label">Имя</label>
      <div class="col-sm-10">
      <input type="text" name="name" class="form-control" value="<?= $empl['name'] ?>">
      </div>
    </div>

    <div class="row mb-3">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Отчество</label>
      <div class="col-sm-10">
      <input type="text" name="patronymic" class="form-control" value="<?= $empl['patronymic'] ?>">
      </div>
    </div>

    <fieldset>
      <div class="row mb-3">
        <legend class="col-form-label col-sm-2 pt-0">Пол</legend>
        <div class="col-sm-10">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="sex" id="sex1" value="мужской" <?php if($empl['sex']=='мужской') echo 'checked="checked"' ?> >
            <label class="form-check-label" for="sex1">
              мужской
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="sex" id="sex2" value="женский" <?php if($empl['sex']=='женский') echo 'checked="checked"' ?>">
            <label class="form-check-label" for="sex2">
              женский
            </label>
          </div>
        </div>
      </div>
    </fieldset>

    <p>
      <label for="localdate">Дата рождения</label>
      <input type="date" id="localdate" name="date_of_birth" value="<?= $empl['date_of_birth'] ?>">
    </p>

    <p>
      <select class="form-select" name="posit_id">
        <option disabled>ДОЛЖНОСТЬ</option>
        <?php foreach($posits as $posit): ?>
        <option value="<?php echo $posit[0] ?>" <?php if($posit[1] == $empl_pivot['position']): ?> selected="selected" <?php endif ?> > 
        <?php echo $posit[1] ?> 
        </option>
        <?php endforeach ?>
      </select>
    </p>

    <div align="center">
      <button type="submit" class="btn btn-info">Сохранить</button>
    </div>

    </form>
  </div>

</body>
</html>
