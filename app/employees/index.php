<?php
require_once '../layouts/nav.php';

$sql = 'SELECT * FROM `employees2`';
$empls = $connect->query($sql);
?>


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
        <td><a href="<?= PATH . 'employees/show.php?id=' . $empl[0] ?>">Подробнее</a></td>
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