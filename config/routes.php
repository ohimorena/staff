<?php

$routes = [
  'login' => function() {
    require_once CONTROLLERS . '/auth/login.php';
  },
  'login_handler' => function() {
    require_once CONTROLLERS . '/auth/login_handler.php';
  },
  'register' => function() {
    require_once CONTROLLERS . '/auth/register.php';
  },
  'register_handler' => function() {
    require_once CONTROLLERS . '/auth/register_handler.php';
  },
  'logout' => function() {
    require_once CONTROLLERS . '/auth/logout.php';
  },
  '' => function() {
    require_once CONTROLLERS . '/employees/index.php';
  },
  'employees/index' => function() {
    require_once CONTROLLERS . '/employees/index.php';
  },
  'employees/create' => function() {
    require_once CONTROLLERS . '/employees/create.php';
  },
  'employees/store' => function() {
    require_once CONTROLLERS . '/employees/store.php';
  },
  'employees/show' => function() {
    require_once CONTROLLERS . '/employees/show.php';
  },
  'employees/edit' => function() {
    require_once CONTROLLERS . '/employees/edit.php';
  },
  'employees/update' => function() {
    require_once CONTROLLERS . '/employees/update.php';
  },
  'employees/destroy' => function() {
    require_once CONTROLLERS . '/employees/destroy.php';
  },
  'positions/index' => function() {
    require_once CONTROLLERS . '/positions/index.php';
  },
  'positions/select_handler' => function() {
    require_once CONTROLLERS . '/positions/select_handler.php';
  },
  'positions/create' => function() {
    require_once CONTROLLERS . '/positions/create.php';
  },
  'positions/store' => function() {
    require_once CONTROLLERS . '/positions/store.php';
  },
  'positions/edit' => function() {
    require_once CONTROLLERS . '/positions/edit.php';
  },
  'positions/update' => function() {
    require_once CONTROLLERS . '/positions/update.php';
  },
  'positions/destroy' => function() {
    require_once CONTROLLERS . '/positions/destroy.php';
  }
];