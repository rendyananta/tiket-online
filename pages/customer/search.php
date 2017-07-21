<?php global $results ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="/assets/images/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Tiket Pesawat Online - ADMIN</title>

	  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
		<?php include_once './pages/styles.php' ?>
		<style media="screen">
			.main-panel {
				width: 100%;
			}
			.main-panel {
		    -ms-overflow-style: none;  // IE 10+
		    overflow: -moz-scrollbars-none;  // Firefox
			}
			.main-panel::-webkit-scrollbar {
			    display: none;  // Safari and Chrome
			}
		</style>
</head>
<body style="">
	<div class="main-panel">
		<nav class="navbar navbar-default navbar-fixed">
			<div class="container-fluid">
					<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="/">Tiketku</a>
					</div>
					<div class="collapse navbar-collapse">
							<ul class="nav navbar-nav navbar-left">
									<li>
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">
													<i class="fa fa-dashboard"></i>
											</a>
									</li>
									<li>
										 <a href="">
													<i class="fa fa-search"></i>
											</a>
									</li>
							</ul>
					</div>
			</div>
	</nav>
	<div class="wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row" style="min-height:100vh">
                  <div class="col-md-10 col-md-push-1" >
											<div class="card" style="margin-top:2%">
													<div class="header">
															<h2 class="title"><i class="pe-7s-plane"></i> Cari Tiket</h2>
															<p class="category">Buat kesana</p>
															<br>
													</div>

													<div class="content">
                            <form action="/search">
                                <div class="form-group col-md-4">
                                  <label for="">Kota Asal</label>
                                  <input type="text" class="form-control" name="from" value="<?= @$_GET['from'] ?>" required>
                                </div>
                                <div class="form-group col-md-4">
                                  <label for="">Kota Tujuan</label>
                                  <input type="text" class="form-control" name="to" value="<?= @$_GET['to'] ?>" required>
                                </div>
                                <div class="form-group col-md-4" style="padding-left:15px">
                                  <label for="">Tanggal Keberangkatan</label>
                                  <input type="date" class="form-control datepicker" name="departure" value="<?= @$_GET['departure'] ?>">
                                </div>
                                <div class="form-group">
                                  <button type="submit" class="form-control btn btn-primary btn-fill"><span class="glyphicon glyphicon-search"></span> Cari Tiket</button>
                                </div>
                                <div class="clearfix"></div>
                            </form>
													</div>
											</div>
									</div>

                  <div class="col-md-12" style="">
                    <div style="padding-top:48px"></div>
											<div class="card" style="border:4px solid #3472F7;border-radius:4px">
													<div class="header">
															<h2 class="title">Hasil Pencarian</h2>
															<p class="category">Jadwal Penerbangan</p>
													</div>
													<div class="content table-responsive table-full-width">
															<table class="table table-hover table-striped">
																	<thead>
																		<th width="50">No</th>
																		<th width="120">Maskapai</th>
                                    <th>Dari</th>
                                    <th>Ke</th>
                                    <th>Berangkat</th>
																		<th>Harga</th>
																		<th width="50">Kapasitas</th>
                                    <th width="50">Tersedia</th>
                                    <th width="120">Options</th>
																	</thead>
																	<tbody>
																		<?php if (count($results) > 0): ?>
																			<?php foreach ($results as $key => $result): ?>
																			<tr style="cursor:pointer" onclick="redirect('/order?code=<?= $result['code'] ?>')">
																				<td><?= $key + 1 ?></td>
																				<td><?= $result['airline_name'] ?></td>
                                        <td><?= $result['origin'] ?></td>
                                        <td><?= $result['aim'] ?></td>
                                        <td><?= date_format(date_create($result['departure']), 'l, d F Y - H:i') ?></td>
                                        <td>Rp. <?= $result['price'] ?></td>
																				<td><?= $result['capacity'] ?></td>
																				<td><?= $result['available'] ?></td>
																				<td>
																						<a href="/order?code=<?= $result['code'] ?>" class="btn btn-fill btn-danger btn-sm">Order <span class="glyphicon glyphicon-menu-right"></span></a>
																				</td>
																			</tr>
																		<?php endforeach; ?>
																		<?php else: ?>
																			<tr>
																				<td colspan="9"><center>Tiket pesawat tidak ditemukan</center></td>
																			</tr>
																		<?php endif; ?>
																	</tbody>
															</table>

													</div>
											</div>
									</div>
            </div>
        </div>


					<footer class="footer">
						<div class="container-fluid">
							<p class="copyright pull-right">
								&copy; 2016 <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
							</p>
						</div>
					</footer>
				</div>
    	</div>
</div>
<script src="/assets/js/jquery.min.js" type="text/javascript"></script>
<script src="/assets/js/moment-with-locales.min.js"></script>
<script src="/assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script src="/assets/js/bootstrap-notify.js"></script>
<script src="/assets/js/app.js"></script>
<?php require_once './pages/scripts.php' ?>
  <script type="text/javascript">
    $(document).ready(function () {
      $('.datepicker').datetimepicker({format: 'Y-M-D'});
    });
  </script>
</body>
</html>
