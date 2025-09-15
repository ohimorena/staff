<?php

use App\Validator;

require_once CONFIG . '/connect.php';

$fillable = ['empl_id', 'surname', 'name', 'patronymic', 'sex', 'date_of_birth', 'posit_id'];
$data = load($fillable);

$validator = new Validator();

$validation = $validator->validate($data, [
    'surname' => [
        'required' => true,
        'min' => 2,
        'max' => 190,
    ],
    'name' => [
        'required' => true,
        'min' => 2,
        'max' => 190,
    ],
    'date_of_birth' => [
        'required' => true
    ]
]);

$data_slice = array_slice($data, 0, -1);
$empl_id = $data['empl_id'];
$posit_id = $data['posit_id'];

if (!$validation->hasErrors()) {
    try {
      $sql = 'UPDATE `employees` 
      SET `surname` = :surname, `name` = :name, `patronymic` = :patronymic, `sex` = :sex, `date_of_birth` = :date_of_birth 
      WHERE `id` = :empl_id';
      $stmt = $connect->prepare($sql);
      $stmt->execute($data_slice);

      $sql = 'UPDATE `employee_positions` 
      SET `posit_id` = :posit_id
      WHERE `empl_id` = :empl_id';
      $stmt = $connect->prepare($sql);
      $stmt->execute([':posit_id' => $posit_id, ':empl_id' => $empl_id]);
      
      $_SESSION['success'] = 'Данные успешно обновлены';
      redirect('/employees/index');
    } catch(PDOException $e) {
      $_SESSION['error'] = 'Ошибка обновления данных, попробуйте ещё раз';
      redirect('/employees/index');
    }
} else {
  redirect('/employees/edit?id=' . $empl_id);
}