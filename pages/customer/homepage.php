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
											<div class="card" style="margin-top:12%">
													<div class="header">
															<h2 class="title"><i class="pe-7s-plane"></i> Cari Tiket</h2>
															<p class="category">Buat kesana</p>
															<br>
													</div>

													<div class="content">
                            <form action="/search">
                                <div class="form-group col-md-4" style="padding-left:6px">
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
                                <div class="form-group col-md-12">
                                  <button type="submit" class="form-control btn btn-primary btn-fill"><span class="glyphicon glyphicon-search"></span> Cari Tiket</button>
                                </div>
                                <div class="clearfix"></div>
                            </form>
													</div>
											</div>
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
