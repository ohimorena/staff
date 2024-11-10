<?php
require_once '../layouts/nav.php';

$id = $_GET['id'];

$sql = 'SELECT `employees2`.`id`, `employees2`.`surname`, `employees2`.`name`,`employees2`.`patronymic`,`employees2`.`sex`,`employees2`.`date_of_birth`,`positions2`.`position`, `positions2`.`salary`
FROM `employees2` JOIN `employees_positions2`
ON `employees2`.`id`=`employees_positions2`.`empl_id`
JOIN `positions2`
ON `employees_positions2`.`posit_id` = `positions2`.`id`
WHERE `employees2`.`id` = :id';
$sth = $connect->prepare($sql);
$sth->execute([':id' => $id]);
$empl = $sth->fetch(PDO::FETCH_ASSOC);

$sql = 'SELECT * FROM `positions2`';
$posits = $connect->query($sql);
?>


<p>
  <div align=center>
    <h4>Редактировать данные</h4>
  </div>
</p>
<form action="update.php" method="post">
  <input type="hidden" name="empl_id" value="<?= $id ?>">
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
      <option value="<?php echo $posit[0] ?>" <?php if($posit[1] == $empl['position']): ?> selected="selected" <?php endif ?> > 
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
