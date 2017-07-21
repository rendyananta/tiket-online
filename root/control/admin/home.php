<?php
global $app;

$app->route(['url' => '/admin', 'method' => 'get', 'middleware' => 'admin'], function () {
  return page('admin.dashboard');
});

$app->route(['url' => '/admin-masuk', 'method' => 'get', 'middleware' => 'guest'], function () {
  return page('admin.login');
});

$app->route(['url' => '/admin-login', 'method' => 'post', 'middleware' => 'guest'], function () use ($app) {
  if ($app->authenticate(['username' => $_POST['username'], 'password' => $_POST['password']], 'admin')) {
    return redirect('/admin');
  } else {
    alert('danger', 'You Don\'t Have Power Here, Go Out!');
    return redirect('/');
  }
});
