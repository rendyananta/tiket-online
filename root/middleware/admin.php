<?php
function filter ($callback) {
  if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin') {
    $callback(); exit();
  }
  return page('unauthorized');
};
