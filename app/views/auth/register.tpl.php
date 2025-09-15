<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <title>Персонал</title>
</head>

<body>
  <div class="container col-3 pt-5">
    <p class="h3 text-center mb-4">Регистрация</p>
    <?php get_alerts(); ?>

    <form action="/register_handler" method="POST" class="form-signin">
      <div class="row mx-0 mb-4">
        <input type="text" name="username" class="form-control" placeholder="Имя пользователя" value="<?= old('username'); ?>">
      </div>
      <?= isset($validation) ? $validation->listErrors('username') : '' ?>
      <div class="row mx-0 mb-4">
        <input type="email" name="email" class="form-control" placeholder="example@email.com" value="<?= old('email'); ?>">
      </div>
      <?= isset($validation) ? $validation->listErrors('email') : '' ?>
      <div class="row mx-0 mb-4">
        <input type="password" name="password" class="form-control" placeholder="Пароль">
      </div>
      <?= isset($validation) ? $validation->listErrors('password') : '' ?>
      <div class="row mx-0 mb-4">
        <input type="password" name="password_conf" class="form-control" placeholder="Подтверждение пароля">
      </div>
      <?= isset($validation) ? $validation->listErrors('password_conf') : '' ?>
      <div class="d-grid gap-2 mb-5">
        <button type="submit" class="btn btn-info">Продолжить</button>
      </div>
    </form>

    <p class="text-center mb-4">У меня уже есть <a href="/login">аккаунт</a></p>
  </div>
</body>
</html>