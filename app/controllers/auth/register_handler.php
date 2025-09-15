<?php

use App\Validator;

require_once CONFIG . '/connect.php';

$fillable = ['username', 'email', 'password', 'password_conf'];
$data = load($fillable);

$validator = new Validator();

$validation = $validator->validate($data, [
    'username' => [
      'required' => true,
      'min' => 3,
      'max' => 190
    ],
    'email' => [
      'required' => true, 
      'email' => true,
    ],
    'password' => [
      'required' => true,
      'min' => 6,
      'max' => 190
    ],
    'password_conf' => [
      'match' => 'password'
    ]
]);

$username = $data['username'];

if (!$validation->hasErrors()) {
    try {
      $sql = "SELECT * FROM `users` WHERE `username` = :username";
      $stmt = $connect->prepare($sql);
      $stmt->execute([':username' => $username]);
      $count = $stmt->rowCount();
      if ($count !== 0) {
        $_SESSION['error'] = 'Такой пользователь уже существует!';
        require_once VIEWS . '/auth/register.tpl.php';
        die();
      }

      $email = $data['email'];
      $sql = "SELECT * FROM `users` WHERE `email` = :email";
      $stmt = $connect->prepare($sql);
      $stmt->execute([':email' => $email]);
      $count = $stmt->rowCount();
      if ($count !== 0) {
        $_SESSION['error'] = 'Пользователь с таким email уже существует!';
        require_once VIEWS . '/auth/register.tpl.php';
        die();
      }
      
      $password = password_hash($data['password'], PASSWORD_DEFAULT);
      $sql = "INSERT INTO `users` (`username`, `email`, `password`) VALUES (:username, :email, :password)";
      $stmt = $connect->prepare($sql);
      $stmt->execute([':username' => $username, ':email' => $email, ':password' => $password]);
      $_SESSION['username'] = $username;
      $_SESSION['success'] = 'Регистрация прошла успешно';
      redirect('/employees/index');
    } catch(PDOException $e) {
      $_SESSION['error'] = 'Ошибка отправки данных, попробуйте ещё раз';
      require_once VIEWS . '/auth/register.tpl.php';
    }
} else {
  require_once VIEWS . '/auth/register.tpl.php';
}