<?php
global $app;

$app->route(['url' => '/admin/maskapai', 'method' => 'get', 'middleware' => 'admin'], function () use ($app) {
  $GLOBALS['airlines'] = $app->query('SELECT * FROM airlines ORDER BY name ASC')->fetchAll(PDO::FETCH_ASSOC);
  return page('admin.airlines.index');
});

$app->route(['url' => '/admin/maskapai/show', 'method' => 'get', 'middleware' => 'admin'], function () use ($app) {
  if (isset($_GET['id'])) {
    $GLOBALS['airline'] = $app->query('SELECT * FROM airlines WHERE id = ?', [$_GET['id']])->fetch(PDO::FETCH_ASSOC);
    if (empty($GLOBALS['airline'])) {
      return page('notfound');
    }
    return page('admin.airlines.show');
  } else {
    return page('notfound');
  }
});

$app->route(['url' => '/admin/maskapai/baru', 'method' => 'get', ], function () {
  return page('admin.airlines.new');
});

$app->route(['url' => '/admin/maskapai/new', 'method' => 'post', 'middleware' => 'admin'], function () use ($app) {
  if (isset($_POST['nama'])) {
    if ($app->query('INSERT INTO airlines (name, code) VALUES ( ?, ? )', [$_POST['nama'], strtoupper($_POST['kode']) ])) {
      alert('success', "Data sukses ditambahkan");
    } else {
      alert("danger", "Gagal menambahkan data");
    }
    return redirect('/admin/maskapai');
  } else {
    alert('danger', "Ada bagian form yang masih kosong");
    return redirect('/admin/maskapai/new');
  }
});

$app->route(['url' => '/admin/maskapai/edit', 'method' => 'get', 'middleware' => 'admin'], function () use ($app){
  if (isset($_GET['id'])) {
    $GLOBALS['airline'] = $app->query("SELECT * FROM airlines WHERE id = ?", [$_GET['id']])->fetch(PDO::FETCH_ASSOC);
    if (empty($GLOBALS['airline'])) {
      return page('notfound');
    }
    return page('admin.airlines.edit');
  } else {
    return page('notfound');
  }
});

$app->route(['url' => '/admin/maskapai/update', 'method' => 'post', 'middleware' => 'admin'], function () use ($app){
  if (isset($_POST['id'])) {
    if ($app->query('UPDATE airlines SET name = ?, code = ? WHERE id = ?', [$_POST['nama'], strtoupper($_POST['kode']), $_POST['id']])) {
      alert("success", 'Data berhasil diupdate');
      return redirect('/admin/maskapai');
    } else {
      alert("danger", "Data gagal diupdate");
      return redirect('/admin/maskapai/edit?id=' . $_POST['id']);
    }
    return page('admin.airlines.edit');
  } else {
    return page('notfound');
  }
});

$app->route(['url' => '/admin/maskapai/delete', 'method' => 'post', 'middleware' => 'admin'], function () use ($app) {
  if (isset($_POST['id'])) {
    if ($app->query("DELETE FROM airlines WHERE id = ?", [$_POST['id']])) {
      alert("success", "Data sukses dihapus");
    } else {
      alert("danger", "Data gagal dihapus");
    }
    return redirect('/admin/maskapai');
  } else {
    alert('danger', "Ada bagian form yang masih kosong");
  }
});
