<?php
include_once 'handler/application.php';

session_start();
$app = new Application(require_once('./config.php'));

// $app->route(['url' => '/create-admin', 'method' => 'get'], function () use ($app) {
//   $a = ['name' => 'Admin', 'username' => 'admin', 'password' => password_hash('admin123', PASSWORD_BCRYPT)];
//   $app->query("INSERT INTO users (name, username, password, role) VALUES (?, ?, ?)", [$a['username'], $a['password'], 'admin']);
// });

$app->route(['url' => '/logout', 'method' => 'get'], function () use ($app) {
  $app->logout();
  return redirect('./');
});

// Register Controller Here
control('customer.home');
control('admin.home');
control('admin.airline');
control('admin.flight_schedule');
control('admin.transaction');
control('admin.staff');
control('staff.home');
control('staff.flight_schedule');
control('staff.transaction');
