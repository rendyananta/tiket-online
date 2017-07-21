<?php global $airlines; global $schedule ?>
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
</head>
<body>

<div class="wrapper">
	<div class="sidebar" data-color="red" data-image="/assets/images/sidebar-4.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="/" class="simple-text">
                    Admin
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="/admin">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
								<li>
										<a href="/admin/staff">
												<i class="pe-7s-users"></i>
												<p>Staff</p>
										</a>
								</li>
                <li>
                    <a href="/admin/maskapai">
                        <i class="pe-7s-plane"></i>
                        <p>Maskapai</p>
                    </a>
                </li>
								<li class="active">
									<a href="/admin/jadwal">
										<i class="pe-7s-date"></i>
										<p>Jadwal Penerbangan</p>
									</a>
								</li>
                <li>
                    <a href="/admin/transaksi">
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
									<div class="col-md-8">
											<div class="card">
													<div class="header">
															<h4 class="title">Jadwal Penerbangan</h4>
															<p class="category">Baru</p>
															<br>
															<a href="/admin/jadwal" class="btn btn-primary btn-fill"><span class="glyphicon glyphicon-chevron-left"></span> Kembali</a>
													</div>

													<div class="content">
                            <form action="/admin/jadwal/update" method="post">
															<input type="hidden" name="code" value="<?= $schedule['code'] ?>">
                              <div class="form-group">
                                <label for="">Nama Maskapai</label>
                                <select class="form-control" name="airline" required>
																	<option value="">Pilih Maskapai</option>
																	<?php foreach ($airlines as $key => $airline): ?>
																		<option value="<?= $airline['id'] ?>" <?= selected($airline['id'], $schedule['airline']) ?>><?= $airline['name'] ?></option>
																	<?php endforeach; ?>
                                </select>
                              </div>
															<div class="form-group">
																<label for="">Kota Asal</label>
																<input type="text" class="form-control" name="from" value="<?= $schedule['origin'] ?>" placeholder="Asal" required>
															</div>
															<div class="form-group">
																<label for="">Kota Tujuan</label>
																<input type="text" class="form-control" name="to" value="<?= $schedule['aim'] ?>" placeholder="Tujuan" required>
															</div>
															<div class="form-group">
																<label for="">Waktu Berangkat</label>
																<input type="text" class="form-control datetimepicker" name="departure" value="<?= $schedule['departure'] ?>" placeholder="Tujuan" required>
															</div>
															<div class="form-group">
																<label for="">Waktu Datang</label>
																<input type="text" class="form-control datetimepicker" name="arrival" value="<?= $schedule['arrival'] ?>" placeholder="Tujuan" required>
															</div>
															<div class="form-group">
																<label for="">Harga (Rp)</label>
																<input type="text" class="form-control" name="price" value="<?= $schedule['price'] ?>" required>
															</div>
															<div class="form-group">
																<label for="">Kapasitas</label>
																<input type="number" class="form-control" name="capacity" value="<?= $schedule['capacity'] ?>" required>
															</div>
															<div class="clearfix"></div>
                              <div class="form-group">
                                <button type="submit" name="button" class="btn btn-warning btn-fill"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan Perubahan</button>
                              </div>
                            </form>
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
	<?php include_once './pages/scripts.php' ?>
</body>
</html>
