<?php
require_once '../layouts/nav.php';

$sql = 'SELECT * FROM `positions2`';
$posits = $connect->query($sql);
?>


<p><div align=center>
  <h4>Добавить сотрудника</h4>
</div></p>
  
<form action="store.php" method="post">
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Фамилия</label>
      <div class="col-sm-10">
        <input type="text" name="surname" class="form-control" aria-label="Sizing example input">
      </div>
  </div>
  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Имя</label>
      <div class="col-sm-10">
        <input type="text" name="name" class="form-control">
      </div>
  </div>
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Отчество</label>
      <div class="col-sm-10">
        <input type="text" name="patronymic" class="form-control">
      </div>
  </div>
  <fieldset>
    <div class="row mb-3">
      <legend class="col-form-label col-sm-2 pt-0">Пол</legend>
        <div class="col-sm-10">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="sex" id="sex1" value="мужской" checked>
            <label class="form-check-label" for="sex1">мужской</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="sex" id="sex2" value="женский">
            <label class="form-check-label" for="sex2">женский</label>
          </div>
        </div>
    </div>
  </fieldset>
  <p>
    <label for="localdate">Дата рождения</label>
    <input type="date" id="localdate" name="date_of_birth">
  </p>
  <p>
    <select class="form-select" name="posit_id">
      <option selected disabled>ДОЛЖНОСТЬ</option>
      <?php
        foreach($posits as $posit) {
      ?>
      <option value="<?= $posit[0]?>"> <?= $posit[1] ?> </option>
      <?php
        }
      ?>
    </select>
  </p>
  <div align="center">
    <button type="submit" class="btn btn-info">Сохранить</button>
  </div>
</form>
</div>
</body>