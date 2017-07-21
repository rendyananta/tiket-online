<?php
global $app;

$app->route(['url' => '/staff', 'method' => 'get', 'middleware' => 'staff'], function () {
  return page('staff.dashboard');
});

$app->route(['url' => '/staff-masuk', 'method' => 'get', 'middleware' => 'guest'], function () {
  return page('staff.login');
});

$app->route(['url' => '/staff-login', 'method' => 'post', 'middleware' => 'guest'], function () use ($app) {
  if ($app->authenticate(['username' => $_POST['username'], 'password' => $_POST['password']], 'staff')) {
    return redirect('/staff');
  } else {
    alert('danger', 'You Don\'t Have Power Here, Go Out!');
    return redirect('/');
  }
});
