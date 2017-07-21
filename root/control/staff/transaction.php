<?php
global $app;

$app->route(['url' => '/staff/transaksi', 'method' => 'get', 'middleware' => 'staff'], function () use ($app) {
  $GLOBALS['dates'] = $app->query("SELECT DISTINCT DATE_FORMAT(created_at, '%Y-%m') AS formatted FROM transactions ORDER BY DATE(created_at) DESC")->fetchAll(PDO::FETCH_ASSOC);
  return page('staff.transaction.index');
});

$app->route(['url' => '/staff/transaksi/laporan', 'method' => 'get', 'middleware' => 'staff'], function () use ($app) {
  if (isset($_GET['tanggal'])) {
    $GLOBALS['reports'] = $app->query("SELECT flight_schedules.origin, flight_schedules.aim, flight_schedules.departure, flight_schedules.arrival, flight_schedules.price, flight_schedules.capacity, flight_schedules.available, flight_schedules.created_at as flight_schedule_created_at, flight_schedules.code as flight_schedule_code, transactions.*, airlines.name as airline_name FROM transactions, flight_schedules, airlines WHERE airlines.id = flight_schedules.airline AND flight_schedules.id = transactions.schedule AND transactions.created_at LIKE ? ORDER BY transactions.created_at ASC", [ $_GET['tanggal'] .= '%'])->fetchAll(PDO::FETCH_ASSOC);
    return page('staff.transaction.report');
  } else {
    return page('notfound');
  }
});
;
