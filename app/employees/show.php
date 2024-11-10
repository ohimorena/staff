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
?>


<div class="text-center">
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
        <td> <?= $empl['position'] ?> </td>
        <th>Оклад</th>
        <td> <?= $empl['salary'] ?> </td>
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
</div>
</body>
</html>