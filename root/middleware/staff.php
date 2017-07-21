<?php
function filter ($callback) {
  if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'staff') {
    $callback(); exit();
  }
  return page('unauthorized');
};
