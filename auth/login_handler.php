<?php
session_start();

if (!empty(trim($_POST['username'])) && !empty(trim($_POST['password']))) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $connect = new PDO('mysql:host=localhost;dbname=staff', 'root', '');
  $sql = "SELECT * FROM `users2` WHERE `username` = :username";
  $stmt = $connect->prepare($sql);
  $stmt->execute(['username' => $username]);
  $count = $stmt->rowCount();
  if ($count == 1) {
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if (password_verify($password, $result['password'])) {
      $_SESSION['username'] = $username;
      echo 'success';
    } else {
      echo ('<div class="alert alert-danger" role="alert">Неверный пароль!</div>');
      die();
    }
  } else {
    echo ('<div class="alert alert-danger" role="alert">Неверное имя пользователя!</div>');
    die();
  }
} else {
  echo ('<div class="alert alert-danger" role="alert">Заполните все поля!</div>');
  die();
}