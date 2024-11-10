<?php
require_once '../layouts/nav.php';

$id = $_GET['id'];

$sql = 'SELECT * FROM `positions2` WHERE `id` = :id';
$sth = $connect->prepare($sql);
$sth->execute([':id' => $id]);
$posit = $sth->fetch(PDO::FETCH_ASSOC);
?>


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