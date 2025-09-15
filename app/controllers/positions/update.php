<?php

use App\Validator;

require_once CONFIG . '/connect.php';

$fillable = ['position', 'position_amount', 'salary'];
$data = load($fillable);

$validator = new Validator();

$validation = $validator->validate($data, [
    'position' => [
        'required' => true,
        'min' => 3,
        'max' => 100,
    ],
    'position_amount' => [
        'required' => true,
        'max' => 100
    ],
    'salary' => [
        'required' => true,
        'max' => 100
    ]
]);

$id = $_POST['id'];
$data['id'] = $id;

if (!$validation->hasErrors()) {
    try {
      $sql = 'UPDATE `positions` 
      SET `position` = :position, `position_amount` = :position_amount, `salary` = :salary 
      WHERE `id` = :id';
      $sth = $connect->prepare($sql);
      $sth->execute($data);
      $_SESSION['success'] = 'Данные успешно обновлены';
      redirect('/positions/index');
    } catch(PDOException $e) {
      $_SESSION['error'] = 'Ошибка обновления данных, попробуйте ещё раз';
      redirect('/positions/edit?id=' . $id);
    }
} else {
  redirect('/positions/edit?id=' . $id);
}