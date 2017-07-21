<?php global $schedule; ?>
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
		<nav class="navbar navbar-default navbar-fixed" style="position:absolute;width:100%">
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
											<div class="card" style="margin-top:8%">
													<div class="header">
															<h2 class="title"><i class="pe-7s-plane"></i> <?= $schedule['airline_name'] ?></h2>
															<p class="category"><?= $schedule['origin'] . ' - ' . $schedule['aim'] ?></p>
															<br>
													</div>

													<div class="content" style="margin-top:-20px">
														<form action="/order/checkout" method="post">
															<input type="hidden" name="code" value="<?= $schedule['code'] ?>">
															<input type="hidden" name="id" value="<?= $schedule['id'] ?>">
															<input type="hidden" name="price" value="<?= $schedule['price'] ?>">
														<div class="col-md-5">
																<div class="form-group">
																	<label for="">Nama Lengkap</label>
																	<input type="text" class="form-control" name="name" value="" required>
																</div>
																<div class="form-group">
																	<label for="">Email</label>
																	<input type="text" class="form-control" name="email" value="" required>
																</div>
																<div class="form-group">
																	<label for="">Telepon</label>
																	<input type="text" class="form-control" name="phone" value="" required>
																</div>
																<div class="form-group">
																	<label for="">Jumah Tiket</label>
																	<input type="number" class="form-control" name="amount" value="" required>
																</div>

														</div>
														<div class="col-md-6 col-md-offset-1">
															<table style="margin-top:22px">
	                              <tr>
	                                <td width="200">Nama Maskapai</td>
	                                <td width="30">:</td>
	                                <td><?= $schedule['airline_name'] ?></td>
	                              </tr>
																<tr>
																	<td>Kode Jadwal Keberangkatan</td>
																	<td>:</td>
																	<td><?= $schedule['code'] ?></td>
																</tr>
																<tr>
																	<td>Kota Asal Keberangkatan</td>
																	<td>:</td>
																	<td><?= $schedule['origin'] ?></td>
																</tr>
																<tr>
																	<td>Kota Tujuan Keberangkatan</td>
																	<td>:</td>
																	<td><?= $schedule['aim'] ?></td>
																</tr>
																<tr>
																	<td>Waktu Keberangkatan</td>
																	<td>:</td>
																	<td><?= date_format(date_create($schedule['departure']), "l, d F Y - H:i") ?></td>
																</tr>
																<tr>
																	<td>Waktu Kedatangan</td>
																	<td>:</td>
																	<td><?= date_format(date_create($schedule['arrival']), "l, d F Y - H:i") ?></td>
																</tr>
																<tr>
																	<td>Harga</td>
																	<td>:</td>
																	<td><?= $schedule['price'] ?></td>
																</tr>
																<tr>
																	<td>Kapasitas</td>
																	<td>:</td>
																	<td><?= $schedule['capacity'] ?></td>
																</tr>
																<tr>
																	<td>Kapasitas Tersedia</td>
																	<td>:</td>
																	<td><?= $schedule['available'] ?></td>
																</tr>
	                              <tr>
	                                <td>Terakhir ditambahkan</td>
	                                <td>:</td>
	                                <td><?= date_format(date_create($schedule['created_at']), "l, d F Y - H:i") ?></td>
	                              </tr>
	                            </table>
														</div>
														<div class="form-group pull-left col-md-offset-1" style="margin-top:32px;margin-right:24px">
															<button type="submit" class="btn btn-fill btn-danger">Order <span class="glyphicon glyphicon-menu-right"></span></button>
														</div>
														<div class="clearfix"></div>
													</div>
											</div>
										</form>
									</div>

					<footer class="footer" style="position:absolute;bottom:0;width:100%;height:64px">
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
