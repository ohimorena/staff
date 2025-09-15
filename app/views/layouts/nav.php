<?php
  if (empty($_SESSION['username'])) {
    redirect('/login');
  }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <title>Персонал</title>
</head>

<body>
  <div class="container">
    <div class="row py-3">
      <p class="h5 text-end"><?= $_SESSION['username'] ?></p>
      <p class="h6 text-end"><a href="/logout">Выйти из аккаунта</a></p>
      <nav>
        <ul class="list-unstyled">
          <li><a href="/employees/index">Список сотрудников</a></li>
          <li><a href="/employees/create">Создать нового сотрудника</a></li>
          <li><a href="/positions/index">Штатное расписание</a></li>
        </ul>
      </nav>
    </div>
    <?php get_alerts(); ?>