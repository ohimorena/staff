  <p class="text-center mb-4"><a href="/employees/index">Назад</a></p>
  
  <table class="table table-bordered text-center mb-5">
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
      <td><?= $empl['position'] ?></td>
      <th>Оклад</th>
      <td><?= $empl['salary'] ?></td>
    </tr>
  </table>

  <form action="<?= '/employees/edit?id=' . $empl['id'] ?>" method="POST">
    <div class="d-flex justify-content-center mb-3">
      <button type="submit" class="btn btn-info col-2">Изменить</button>
    </div>
  </form>

  <form action="<?= '/employees/destroy?id=' . $empl['id'] ?>" method="POST">
    <div class="d-flex justify-content-center mb-3">
      <button type="submit" class="btn btn-danger col-2">Удалить</button>
    </div>
  </form>
</body>
</html>