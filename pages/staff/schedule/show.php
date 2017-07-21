<?php global $schedule ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="/assets/images/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Tiket Pesawat Online - STAFF</title>

	  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
		<?php include_once './pages/styles.php' ?>
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="/assets/images/sidebar-2.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

		<div class="sidebar-wrapper">
					<div class="logo">
							<a href="/" class="simple-text">
									Staff
							</a>
					</div>

					<ul class="nav">
							<li>
									<a href="/staff">
											<i class="pe-7s-graph"></i>
											<p>Dashboard</p>
									</a>
							</li>
							<li class="active">
								<a href="/staff/jadwal">
									<i class="pe-7s-date"></i>
									<p>Jadwal Penerbangan</p>
								</a>
							</li>
							<li>
									<a href="/staff/transaksi">
											<i class="pe-7s-news-paper"></i>
											<p>Laporan Transaksi</p>
									</a>
							</li>
							<li>
									<a href="#">
											<i class="pe-7s-bell"></i>
											<p>Logs</p>
									</a>
							</li>
					</ul>
		</div>
    </div>

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
                    <a class="navbar-brand" href="#">Dashboard</a>
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

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                               Account
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    Dropdown
                                    <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                              </ul>
                        </li>
                        <li>
                            <a href="/logout">
                                Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
									<div class="col-md-6">
											<div class="card">
													<div class="header">
															<h4 class="title">Maskapai Penerbangan</h4>
															<p class="category">Maskapai Terdaftar</p>
															<br>
															<div class="form-group">
																<a href="/staff/jadwal" class="btn btn-primary btn-fill"><span class="glyphicon glyphicon-chevron-left"></span> Kembali</a>
																<a href="/staff/jadwal/edit?code=<?= $schedule['code'] ?>" class="btn btn-success btn-fill"><span class="glyphicon glyphicon-pencil"></span>  Ubah</a>
															</div>
													</div>
													<div class="content">
                            <h3><?= $schedule['airline_name'] ?></h3>
                            <br>
                            <table>
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

</body>
<?php include_once './pages/scripts.php' ?>
</html>
