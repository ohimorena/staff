<?php
require_once '../../config/connect.php';

session_start();

if (!empty(trim($_POST['username'])) && !empty(trim($_POST['email'])) && !empty(trim($_POST['password'])) && !empty(trim($_POST['password_confirmation']))) {
  if (mb_strlen($_POST['username']) < 3) {
    echo ('<div class="alert alert-danger" role="alert">Логин должен быть более 2 символов!</div>');
    die();
  }
  $username = trim($_POST['username']);
  $email = trim($_POST['email']);

  if ($_POST['password'] !== $_POST['password_confirmation']) {
    echo ('<div class="alert alert-danger" role="alert">Введённые пароли не совпадают!</div>');
    die();
  }
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  
  $sql = "SELECT * FROM `users2` WHERE `username` = :username";
  $stmt = $connect->prepare($sql);
  $stmt->execute([':username' => $username]);
  $count = $stmt->rowCount();
  if ($count !== 0) {
    echo ('<div class="alert alert-danger" role="alert">Такой пользователь уже существует!</div>');
    die();
  }

  $sql = "SELECT * FROM `users2` WHERE `email` = :email";
  $stmt = $connect->prepare($sql);
  $stmt->execute([':email' => $email]);
  $count = $stmt->rowCount();
  if ($count !== 0) {
    echo ('<div class="alert alert-danger" role="alert">Пользователь с таким почтовым адресом уже существует!</div>');
    die();
  }

  $sql = "INSERT INTO `users2` (`username`, `email`, `password`) VALUES (:username, :email, :password)";
  $stmt = $connect->prepare($sql);
  $stmt->execute([':username' => $username, ':email' => $email, ':password' => $password]);
  $_SESSION['username'] = $username;
  echo ('<div class="alert alert-success" role="alert">Регистрация прошла успешно!</div>');
} else {
  echo ('<div class="alert alert-danger" role="alert">Заполните все поля!</div>');
  die();
}