    <p class="h4 text-center mb-4">Добавить сотрудника</p>
      
    <form action="/employees/store" method="POST">
      <div class="row mb-3">
        <label for="surname" class="col-sm-2 col-form-label">Фамилия</label>
        <div class="col-sm-10">
          <input type="text" id="surname" name="surname" class="form-control" value="<?= old('surname'); ?>">
        </div>
        <?= isset($validation) ? $validation->listErrors('surname') : '' ?>
      </div>
      <div class="row mb-3">
        <label for="name" class="col-sm-2 col-form-label">Имя</label>
        <div class="col-sm-10">
          <input type="text" id="name" name="name" class="form-control" value="<?= old('name'); ?>">
        </div>
        <?= isset($validation) ? $validation->listErrors('name') : '' ?>
      </div>      
      <div class="row mb-3">
        <label for="patronymic" class="col-sm-2 col-form-label">Отчество</label>
        <div class="col-sm-10">
          <input type="text" id="patronymic" name="patronymic" class="form-control" value="<?= old('patronymic'); ?>">
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
      <div class="mb-4">
        <label for="date_of_birth">Дата рождения</label>
        <input type="date" id="date_of_birth" name="date_of_birth" value="<?= old('date_of_birth'); ?>">
        <?= isset($validation) ? $validation->listErrors('date_of_birth') : '' ?>
      </div>      
      <div class="mb-4">
        <select class="form-select" name="posit_id">
          <option selected disabled>ДОЛЖНОСТЬ</option>
          <?php foreach($posits as $posit): ?>
            <option value="<?= $posit[0]?>"> <?= $posit[1] ?> </option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="d-flex justify-content-center mb-5">
        <button type="submit" class="btn btn-info col-2">Сохранить</button>
      </div>
    </form>
  </div>
</body>
</html>