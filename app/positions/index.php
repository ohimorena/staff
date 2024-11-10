<?php
require_once '../layouts/nav.php';

$sql = 'SELECT * FROM `positions2`';
$sth = $connect->prepare($sql);
$sth->execute();
$posits = $sth->fetchAll();
?>


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
<p>
  <b>ДОЛЖНОСТЬ</b>
</p>
<p>
  <select class="form-select" name="posit_id" id="posit_id">
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
<p>
  <b>СОТРУДНИКИ</b>
</p>
<p>
  <select class="form-select" name="empl_id" id="empl_id"></select>
</p><br><br>
</div>

<script>
  $(document).ready(function(){
    $('#posit_id').change(function(){
      var posit_id = $(this).val();
      $.ajax({
        url: "empls_select_handler.php",
        method: "POST",
        data: {posit_id: posit_id},
        success:function(data)
        {
          $('#empl_id').html(data);
        }
      });
    });
  });
</script>

</body>
</html>

