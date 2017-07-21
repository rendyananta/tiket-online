<?php

function redirect ($route) {
  return header('Location: ' . $route);
}

function error ($code) {
  return redirect();
}

function hello () {
  phpinfo();
}

function control ($dir) {
  $controller = str_replace('.', '/', $dir);
  require_once 'root/control/' . $controller . '.php';
}

function page ($filename) {
  $page = str_replace('.', '/', $filename);
  require_once './pages/' . $page . '.php';
}

function alert ($type, $message) {
  $_SESSION['notify']['message'] = $message;
  $_SESSION['notify']['type'] = $type;
}

function selected ($val1, $val2) {
  return $val1 == $val2 ? 'selected' : '';
}
