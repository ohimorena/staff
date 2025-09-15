<?php

use App\Validator;

require_once CONFIG . '/connect.php';

$fillable = ['position', 'position_amount', 'salary'];
$data = load($fillable);

$validator = new Validator();

$validation = $validator->validate($data, [
    'position' => [
        'required' => true,
        'min' => 2,
        'max' => 100,
    ],
    'position_amount' => [
        'required' => true,
        'max' => 100,
        'num' => true
    ],
    'salary' => [
        'required' => true,
        'max' => 100,
        'num' => true
    ]
]);

if (!$validation->hasErrors()) {
    try {
      $position = $data['position'];
      $sql = "SELECT * FROM `positions` WHERE `position` = :position";
      $stmt = $connect->prepare($sql);
      $stmt->execute(['position' => $position]);
      $count = $stmt->rowCount();
      if ($count !== 0) {
        $_SESSION['error'] = 'Такая должность уже существует!';
        require_once CONTROLLERS . '/positions/create.php';
        die();
      }
      
      $sql = 'INSERT INTO `positions` (`position`, `position_amount`, `salary`)
      VALUES (:position, :position_amount, :salary)';
      $stmt = $connect->prepare($sql);
      $stmt->execute($data);
      $_SESSION['success'] = 'Новая должность успешно сохранена';
      redirect('/positions/index');
    } catch(PDOException $e) {
      $_SESSION['error'] = 'Ошибка отправки данных, попробуйте ещё раз';
      redirect('/positions/create');
    }
} else {
  require_once CONTROLLERS . '/positions/create.php';
}