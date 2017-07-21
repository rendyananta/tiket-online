<?php global $staffs; ?>
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
								<li class="active">
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
									<div class="col-md-8">
											<div class="card">
													<div class="header">
															<h4 class="title">Staff Perusahaan</h4>
															<p class="category">Staff Terdaftar</p>
															<br>
															<div class="form-group">
																<a href="/admin/staff/baru" class="btn btn-success btn-fill"><span class="glyphicon glyphicon-plus"></span> Baru</a>
															</div>
													</div>
													<div class="content table-responsive table-full-width">
															<table class="table table-hover table-striped">
																	<thead>
																		<th width="50">No</th>
																		<th>Nama</th>
																		<th>Username</th>
																		<th width="220">Options</th>
																	</thead>
																	<tbody>
																		<?php if (count($staffs) > 0): ?>
																			<?php foreach ($staffs as $key => $staff): ?>
																				<tr style="cursor:pointer" onclick="redirect('/admin/staff/show?username=<?= $staff['username'] ?>')">
																					<td><?= $key + 1 ?></td>
																					<td><?= $staff['name'] ?></td>
																					<td><?= $staff['username'] ?></td>
																					<td>
																						<form method="post" action="/admin/maskapai/delete">
																							<input type="hidden" name="username" value="<?= $staff['username'] ?>">
																							<a href="/admin/staff/edit?username=<?= $staff['username'] ?>" class="btn btn-fill btn-default btn-sm"><span class="glyphicon glyphicon-pencil"></span> Ubah</a>
																							<button class="btn btn-fill btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Hapus</button>
																						</form>
																					</td>
																				</tr>

																			<?php endforeach; ?>
																		<?php else: ?>
																			<tr>
																				<td colspan="4"><center>Belum ada staff ditambahkan</center></td>
																			</tr>
																		<?php endif; ?>
																	</tbody>
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
