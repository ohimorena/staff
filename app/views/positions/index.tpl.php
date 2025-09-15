    <p class="h4 text-center mb-4">Штатное расписание</p>

    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">№</th>
          <th scope="col">Должность</th>
          <th scope="col">Ставки</th>
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
          foreach ($posits as $posit):
        ?>
        <tr>
          <td> <?= $i ?> </td>
          <td> <?= $posit[1] ?> </td>
          <td> <?= $posit[2] ?> </td>
          <td> <?= $posit[3] ?> </td>
          <td> <?= $posit[4] ?> </td>
          <td> <?= $posit[5] ?> </td>
          <td>
            <form action="/positions/edit?id=<?= $posit[0] ?>" method="POST">
              <div class="d-flex">
                <button type="submit" class="btn btn-info col-12">Изменить</button>
              </div>
            </form>
          <td>
            <form action="/positions/destroy?id=<?= $posit[0] ?>" method="POST">
              <div class="d-flex">
                <button type="submit" class="btn btn-danger col-12">Удалить</button>
              </div>
            </form>
          </td>
        <?php
          $i++;
          endforeach;
        ?>
        </tr>
      </tbody>
    </table>
    
    <form action="/positions/create" method="GET">
      <div class="d-flex justify-content-center mb-5">
        <button type="submit" class="btn btn-info col-2">Добавить</button>
      </div>
    </form>

    <select class="form-select mb-4" name="posit_id" id="posit_id">
      <option selected disabled>Должность</option>
      <?php foreach($posits as $posit): ?>
        <option value="<?= $posit[0]?>"> <?= $posit[1] ?> </option>
      <?php endforeach; ?>
    </select>

    <select class="form-select mb-5" name="empl_id" id="empl_id">
      <option selected disabled>Сотрудники</option>
    </select>
  </div>

  <script>
    let posit = document.getElementById('posit_id');

    posit.onchange = async function () {
      let positId = posit.value;

      let response = await fetch('/positions/select_handler', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({ posit_id: positId })
      });
      let empls = await response.text();

      document.getElementById('empl_id').innerHTML = empls;
    }
  </script>
</body>
</html>

