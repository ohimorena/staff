    <p class="h4 text-center mb-4">Добавить должность</p>

    <form action="/positions/store" method="POST">
      <div class="row mb-3">
        <label for="position" class="col-sm-2 col-form-label">Должность</label>
        <div class="col-sm-10">
          <input type="text" id="position" name="position" class="form-control" value="<?= old('position'); ?>">
        </div>
        <?= isset($validation) ? $validation->listErrors('position') : '' ?>
      </div>
      <div class="row mb-3">
        <label for="position_amount" class="col-sm-2 col-form-label">Количество ставок</label>
        <div class="col-sm-10">
          <input type="text" id="position_amount" name="position_amount" class="form-control" value="<?= old('position_amount'); ?>">
        </div>
        <?= isset($validation) ? $validation->listErrors('position_amount') : '' ?>
      </div>
      <div class="row mb-4">
        <label for="salary" class="col-sm-2 col-form-label">Оклад</label>
        <div class="col-sm-10">
          <input type="text" id="salary" name="salary" class="form-control" value="<?= old('salary'); ?>">
        </div>
        <?= isset($validation) ? $validation->listErrors('salary') : '' ?>
      </div>
      <div class="d-flex justify-content-center mb-5">
        <button type="submit" class="btn btn-info col-2">Сохранить</button>
      </div>
    </form>
  </div>
</body>
</html>