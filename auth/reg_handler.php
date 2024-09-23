<?php
session_start();

if (!empty(trim($_POST['username'])) && !empty(trim($_POST['email'])) && !empty(trim($_POST['password'])) && !empty(trim($_POST['password_confirmation']))) {
  $username = trim($_POST['username']);
  $email = trim($_POST['email']);
  if ($_POST['password'] == $_POST['password_confirmation']) {
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  } else {
    echo ('<div class="alert alert-danger" role="alert">Введённые пароли не совпадают!</div>');
    die();
  }
  $connect = new PDO('mysql:host=localhost;dbname=staff', 'root', '');
  $param = [
    'username' => $username,
    'email' => $email,
    'password' => $password
  ];
  $sql = "SELECT * FROM `users2` WHERE `username` = :username";
  $stmt = $connect->prepare($sql);
  $stmt->execute(['username' => $username]);
  $count = $stmt->rowCount();
  if ($count == 0) {
    $sql = "INSERT INTO `users2` (`username`, `email`, `password`) VALUES (:username, :email, :password)";
    $stmt = $connect->prepare($sql);
    $stmt->execute($param);
    $_SESSION['username'] = $username;
    echo ('<div class="alert alert-success" role="alert">Регистрация прошла успешно!</div>');
  } else {
    echo ('<div class="alert alert-danger" role="alert">Такой пользователь уже существует!</div>');
    die();
  }
} else {
  echo ('<div class="alert alert-danger" role="alert">Заполните все поля!</div>');
  die();
}