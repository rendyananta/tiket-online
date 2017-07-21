<?php
function filter ($callback) {
  if(isset($_SESSION['user'])) {
    return redirect("/{$_SESSION['user']['role']}");
  }
  $callback(); exit();
}
