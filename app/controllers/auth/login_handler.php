<?php

use App\Validator;

require_once CONFIG . '/connect.php';

$fillable = ['username', 'password'];
$data = load($fillable);

$validator = new Validator();

$validation = $validator->validate($data, [
    'username' => [
        'required' => true,
        'max' => 190
    ],
    'password' => [
        'required' => true,
        'max' => 190
    ]
]);

$username = $data['username'];
$password = $data['password'];

if (!$validation->hasErrors()) {
    try {
      $sql = "SELECT * FROM `users` WHERE `username` = :username";
      $stmt = $connect->prepare($sql);
      $stmt->execute(['username' => $username]);
      $count = $stmt->rowCount();
      if ($count !== 1) {
        $_SESSION['error'] = 'Неверное имя пользователя!';
        require_once VIEWS . '/auth/login.tpl.php';
        die();
      }

      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      if (!(password_verify($password, $result['password']))) {
        $_SESSION['error'] = 'Неверный пароль!';
        require_once VIEWS . '/auth/login.tpl.php';
        die();
      }

      $_SESSION['username'] = $username;
      redirect('/employees/index');
    } catch(PDOException $e) {
      $_SESSION['error'] = 'Ошибка отправки данных, попробуйте ещё раз';
      require_once VIEWS . '/auth/login.tpl.php';
    }
} else {
  require_once VIEWS . '/auth/login.tpl.php';
}