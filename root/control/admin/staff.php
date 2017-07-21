<?php
global $app;

$app->route(['url' => '/admin/staff', 'method' => 'get', 'middleware' => 'admin'], function () use ($app) {
  $GLOBALS['staffs'] = $app->query('SELECT id, name, username, created_at FROM users WHERE role = ?', ['staff'])->fetchAll(PDO::FETCH_ASSOC);
  return page('admin.staff.index');
});

$app->route(['url' => '/admin/staff/show', 'method' => 'get', 'middleware' => 'admin'], function () use ($app) {
  if (isset($_GET['username'])) {
    $GLOBALS['staff'] = $app->query('SELECT id, name, username, created_at FROM users WHERE username = ?', [$_GET['username']])->fetch(PDO::FETCH_ASSOC);
    if (empty($GLOBALS['staff'])) return page('notfound');
    return page('admin.staff.show');
  } else {
    return page('notfound');
  }
});

$app->route(['url' => '/admin/staff/baru', 'method' => 'get', 'middleware' => 'admin'], function () use ($app){
  return page('admin.staff.new');
});

$app->route(['url' => '/admin/staff/new', 'method' => 'post', 'middleware' => 'admin'], function () use ($app){
  if (isset($_POST['name'], $_POST['username'], $_POST['password'])) {
    if ($app->registerUser(['name' => $_POST['name'], 'username' => $_POST['username'], 'password' => $_POST['password'], 'role' => 'staff'])) {
      alert('success', 'Data berhasil ditambahkan');
      return redirect('/admin/staff');
    } else {
      alert('danger', 'Data gagal ditambahkan');
      return redirect('/admin/staff/baru');
    }
  } else {
    alert('danger', 'Terdapat data kosong pada bidang isian');
    return redirect('/admin/staff/baru');
  }
});

$app->route(['url' => '/admin/staff/edit', 'method' => 'get', 'middleware' => 'admin'], function () use ($app) {
  if (isset($_GET['username'])) {
    $GLOBALS['staff'] = $app->query('SELECT id, name, username, created_at FROM users WHERE username = ?', [$_GET['username']])->fetch(PDO::FETCH_ASSOC);
    if (empty($GLOBALS['staff'])) return page('notfound');
    return page('admin.staff.edit');
  } else {
    return page('notfound');
  }
});

$app->route(['url' => '/admin/staff/update', 'method' => 'post', 'middleware' => 'admin'], function () use ($app) {
  if (isset($_POST['_username'])) {
    if (empty($_POST['password'])) {
      $password = '';
    } else {
      $newpass = password_hash($_POST['password'], PASSWORD_BCRYPT);
      $password = ", password = '{$newpass}' ";
    }
    if ($app->query("UPDATE users SET name = ?, username = ?" . $password . "WHERE username = ?", [$_POST['name'], $_POST['username'], $_POST['_username']])) {
      alert('success', "Data berhasil diperbarui");
      return redirect('/admin/staff/');
    } else {
      alert('danger', 'Data gagal diperbarui');
      return redirect('admin/staff/edit?username=' . $_POST['_username']);
    }
  } else {
    return page('notfound');
  }
});

$app->route(['url' => '/admin/staff/delete', 'method' => 'post', 'middleware' => 'admin'], function () use ($app) {
  if (isset($_POST['username'])) {
    if ($app->query("DELETE FROM users WHERE username = ?", [$_POST['username']])) {
      alert('success', 'Data berhasil dihapus');
      return redirect('admin/staff');
    } else {
      alert('danger', 'Data gagal dihapus');
      return redirect('admin/staff');
    }
  } else {
    return page('notfound');
  }
});
