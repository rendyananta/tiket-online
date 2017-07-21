<?php global $staff ?>
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
                <li class="active">
                    <a href="/admin/maskapai">
                        <i class="pe-7s-plane"></i>
                        <p>Maskapai</p>
                    </a>
                </li>
								<li>
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
									<div class="col-md-6">
											<div class="card">
													<div class="header">
															<h4 class="title">Maskapai Penerbangan</h4>
															<p class="category">Maskapai Terdaftar</p>
															<br>
															<a href="/admin/staff" class="btn btn-primary btn-fill"><span class="glyphicon glyphicon-chevron-left"></span> Kembali</a>
													</div>

													<div class="content">
														<form action="/admin/staff/update" method="post">
															<input type="hidden" name="_username" value="<?= $staff['username'] ?>">
                              <div class="form-group">
                                <label for="">Nama Staff</label>
                                <input type="text" class="form-control" name="name" value="<?= $staff['name'] ?>" required>
                              </div>
                              <div class="form-group">
                                <label for="">Username Akun Staff</label>
                                <input type="text" class="form-control" name="username" value="<?= $staff['username'] ?>" required>
                              </div>
                              <div class="form-group">
                                <label for="">Sandi Akun Staff (Kosongi jika tidak ingin mengganti kata sandi)</label>
                                <input type="password" class="form-control" name="password" value="">
                              </div>
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

</body>
<?php include_once './pages/scripts.php' ?>
</html>
