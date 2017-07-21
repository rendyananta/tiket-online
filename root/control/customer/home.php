<?php
global $app;

$app->route(['url' => '/', 'method' => 'get'], function () {
  return page('customer.homepage');
});

$app->route(['url' => '/search', 'method' => 'get'], function () use ($app) {
  if (isset($_GET['from'], $_GET['to'], $_GET['departure'])) {
    $query = $app->query("SELECT flight_schedules.*, airlines.name as airline_name FROM flight_schedules, airlines WHERE airlines.id = flight_schedules.airline AND origin LIKE ? AND aim LIKE ? AND DATE(departure) = ?", ["%{$_GET['from']}%", "%{$_GET['to']}%", $_GET['departure']]);
    if ($query) {
      $GLOBALS['results'] = $query->fetchAll(PDO::FETCH_ASSOC);
      $_SESSION['navigation']['last_page'] = $_SERVER['REQUEST_URI'];
      return page('customer.search');
    } else {
      alert('Pencarian gagal');
      return redirect('/');
    }
  } else {
    return redirect('/');
  }
});

$app->route(['url' => '/order', 'method' => 'get'], function () use ($app) {
  if (isset($_GET['code'])) {
    $GLOBALS['schedule'] = $app->query("SELECT flight_schedules.*, airlines.name as airline_name FROM flight_schedules, airlines WHERE airlines.id = flight_schedules.airline AND flight_schedules.code = ?", [$_GET['code']])->fetch(PDO::FETCH_ASSOC);
    if(empty($GLOBALS['schedule'])) return page('notfound');

    return page('customer.order');
  } else {
    return page('notfound');
  }
});

$app->route(['url' => '/order/checkout', 'method' => 'post'], function () use ($app) {
  if (isset($_POST['name'], $_POST['id'], $_POST['code'], $_POST['email'], $_POST['phone'], $_POST['amount'], $_POST['price'])) {
    if($app->query("INSERT INTO transactions (name, email, phone, schedule, amount, total) VALUES (?, ?, ?, ?, ?, ?)", [$_POST['name'], $_POST['email'], $_POST['phone'], $_POST['id'], $_POST['amount'], $_POST['amount'] *= $_POST['price'] ])) {
      $lastId = $app->lastInsertedId();
      $code = str_replace('0', '', $_POST['code']);
      $app->query("UPDATE transactions SET code = ? WHERE id = ?", [ $code .= str_pad($lastId, 15 - strlen($code), '0', STR_PAD_LEFT), $lastId ]);
      alert('success', 'Pemesanan sukses');
      return redirect('/bukti?code=' . $code);
    }
  } else {
    alert('danger', 'Ada data form yang masih kosong');
    return redirect('/order?code=' . $_POST['coode']);
  }
});

$app->route(['url' => '/bukti', 'method' => 'get'], function () use ($app) {
  if (isset($_GET['code'])) {
    $GLOBALS['transaction'] = $app->query("SELECT flight_schedules.origin, flight_schedules.aim, flight_schedules.departure, flight_schedules.arrival, flight_schedules.price, flight_schedules.capacity, flight_schedules.available, flight_schedules.created_at as flight_schedule_created_at, flight_schedules.code as flight_schedule_code, transactions.*, airlines.name as airline_name FROM transactions, flight_schedules, airlines WHERE airlines.id = flight_schedules.airline AND flight_schedules.id = transactions.schedule AND transactions.code = ?", [ $_GET['code'] ])->fetch(PDO::FETCH_ASSOC);
    if (empty($GLOBALS['transaction'])) return page('notfound');
    return page('customer.evidence');
  } else {
    return page('notfound');
  }
});
