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
    <p class="h3 text-center mb-4">Войти в аккаунт</p>
    <?php get_alerts(); ?>

    <form action="/login_handler" method="POST" class="form-signin">
      <div class="row mx-0 mb-4">
        <input type="text" name="username" class="form-control" placeholder="Имя пользователя" value="<?= old('username'); ?>">
      </div>
      <?= isset($validation) ? $validation->listErrors('username') : '' ?>
      <div class="row mx-0 mb-4">
        <input type="password" name="password" class="form-control" placeholder="Пароль">
      </div>
      <?= isset($validation) ? $validation->listErrors('password') : '' ?>
      <div class="d-grid gap-2 mb-5">
        <button type="submit" class="btn btn-info">Продолжить</button>
      </div>
    </form>

    <p class="text-center mb-4">У меня ещё <a href="/register">нет аккаунта</a></p>
  </div>
</body>
</html>


