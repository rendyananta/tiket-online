<?php
global $app;

$app->route(['url' => '/staff/jadwal', 'method' => 'get', 'middleware' => 'staff'], function () use ($app) {
  $page = isset($_GET['page']) ? $_GET['page'] : 1;
  $order = 'depart'; $by = 'desc';
  $limit = 10;
  $offset = ((int) $page - 1) * $limit;
  $GLOBALS['schedules'] = $app->query("SELECT flight_schedules.*, airlines.name as airline_name FROM flight_schedules, airlines WHERE airlines.id = flight_schedules.airline ORDER BY ? ? LIMIT $limit OFFSET $offset ", [$order, $by])->fetchAll(PDO::FETCH_ASSOC);
  return page('staff.schedule.index');
});

$app->route(['url' => '/staff/jadwal/show', 'method' => 'get', 'middleware' => 'staff'], function () use ($app) {
  if (isset($_GET['code'])) {
    $GLOBALS['schedule'] = $app->query("SELECT flight_schedules.*, airlines.name as airline_name FROM flight_schedules, airlines WHERE airlines.id = flight_schedules.airline AND flight_schedules.code = ?", [$_GET['code']])->fetch(PDO::FETCH_ASSOC);
    return page('staff.schedule.show');
  } else {
    return page('notfound');
  }
});

$app->route(['url' => '/staff/jadwal/baru', 'method' => 'get', 'middleware' => 'staff'], function () use ($app) {
  $GLOBALS['airlines'] = $app->query("SELECT name, id FROM airlines ORDER BY name ASC")->fetchAll(PDO::FETCH_ASSOC);
  return page('staff.schedule.new');
});

$app->route(['url' => '/staff/jadwal/new', 'method' => 'post', 'middleware' => 'staff'], function () use ($app) {
   if(isset($_POST['airline'], $_POST['from'], $_POST['to'], $_POST['departure'], $_POST['arrival'], $_POST['price'], $_POST['capacity'])) {
     if ($app->query("INSERT INTO flight_schedules (airline, origin, aim, departure, arrival, price, capacity, available) VALUES (?, ?, ?, ?, ?, ?, ?, ?)", [$_POST['airline'], ucfirst($_POST['from']), ucfirst($_POST['to']), $_POST['departure'], $_POST['arrival'], $_POST['price'], $_POST['capacity'], $_POST['capacity']])) {
      $lastId = $app->lastInsertedId();
      $code = $app->query("SELECT code FROM airlines WHERE id = {$_POST['airline']}")->fetch(PDO::FETCH_ASSOC)['code'];
      $app->query("UPDATE flight_schedules SET code = ? WHERE id = {$lastId}", [ $code .= str_pad($lastId, 15 - strlen($code), '0', STR_PAD_LEFT) ]);
      alert('success', 'Data berhasil ditambahkan');
      return redirect('/staff/jadwal');
    } else {
      alert('danger', 'Data gagal ditambahkan');
      return redirect('/staff/jadwal/baru');
    }
  } else {
    alert('danger', "Ada bagian form yang masih kosong");
  }
});

$app->route(['url' => '/staff/jadwal/edit', 'method' => 'get', 'middleware' => 'staff'], function () use ($app) {
  if (isset($_GET['code'])) {
    $GLOBALS['schedule'] = $app->query("SELECT * FROM flight_schedules WHERE code = ?", [$_GET['code']])->fetch(PDO::FETCH_ASSOC);
    if (empty($GLOBALS['schedule'])) return page('notfound');

    $GLOBALS['airlines'] = $app->query("SELECT name, id FROM airlines ORDER BY name ASC")->fetchAll(PDO::FETCH_ASSOC);
    return page('staff.schedule.edit');
  } else {
    return page('notfound');
  }
});

$app->route(['url' => '/staff/jadwal/update', 'method' => 'post', 'middleware' => 'staff'], function () use ($app) {
  if(isset($_POST['code'], $_POST['airline'], $_POST['from'], $_POST['to'], $_POST['departure'], $_POST['arrival'], $_POST['price'], $_POST['capacity'])) {
    $old = $app->query("SELECT capacity, available FROM flight_schedules WHERE code = ?", [$_POST['code']])->fetch(PDO::FETCH_ASSOC);
    if ($app->query("UPDATE flight_schedules SET airline = ?, origin = ?, aim = ?, departure = ?, arrival = ?, price = ?, capacity = ?, available = ? WHERE code = ?", [$_POST['airline'], ucfirst($_POST['from']), ucfirst($_POST['to']), $_POST['departure'], $_POST['arrival'], $_POST['price'], $_POST['capacity'], $_POST['capacity'] -= ($old['capacity'] -= $old['available']) , $_POST['code']])) {
      alert('success', 'Data berhasil ditambahkan');
      return redirect('/staff/jadwal');
    } else {
      alert('danger', 'Data gagal diperbarui');
      return redirect('/staff/jadwal/baru');
    }
  } else {
    alert('danger', "Ada bagian form yang masih kosong");
    return redirect('/staff/jadwal/edit?code=' . $_GET['code']);
  }
});

$app->route(['url' => '/staff/jadwal/delete', 'method' => 'post', 'middleware' => 'staff'], function () use ($app) {
  if (isset($_POST['code'])) {
    if ($app->query("DELETE FROM flight_schedules WHERE code = ?", [$_POST['code']])) {
      alert("success", "Data sukses dihapus");
    } else {
      alert("danger", "Data gagal dihapus");
    }
    return redirect('/staff/jadwal');
  } else {
    alert('danger', "Ada bagian form yang masih kosong");
  }
});
