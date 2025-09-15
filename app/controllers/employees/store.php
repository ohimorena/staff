<?php

use App\Validator;

require_once CONFIG . '/connect.php';

$fillable = ['surname', 'name', 'patronymic', 'sex', 'date_of_birth', 'posit_id'];
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
$posit_id = $data['posit_id'];

if (!$validation->hasErrors()) {
    try {
      $sql = 'INSERT INTO `employees` (`surname`, `name`, `patronymic`, `sex`, `date_of_birth`) VALUES (:surname, :name, :patronymic, :sex, :date_of_birth)';
      $stmt = $connect->prepare($sql);
      $stmt->execute($data_slice);

      $empl_id = $connect->lastInsertId();

      $sql = 'INSERT INTO `employee_positions` (`empl_id`, `posit_id`) VALUES (:empl_id, :posit_id)';
      $stmt = $connect->prepare($sql);
      $stmt->execute([':empl_id' => $empl_id, ':posit_id' => $posit_id]);
      
      $_SESSION['success'] = 'Новый сотрудник успешно сохранён';
      redirect('/employees/index');
    } catch(PDOException $e) {
      $_SESSION['error'] = 'Ошибка отправки данных, попробуйте ещё раз';
      redirect('/employees/create');
    }
} else {
  require_once CONTROLLERS . '/employees/create.php';
}