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
<body >

<div class="wrapper" style="background:#3472F7">

        <div class="content">
            <div class="container-fluid">
                <div class="row" style="">
                  <div class="col-md-6 col-md-offset-3" style="margin-top:5%">
											<div class="card">
													<div class="header">
															<h4 class="title">Login</h4>
															<p class="category">Buat yang disana</p>
															<br>
													</div>

													<div class="content">
                            <form action="/staff-login" method="post">
                              <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" class="form-control" name="username" value="" required>
                              </div>
                              <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control" name="password" value="" required>
                              </div>
                              <div class="form-group pull-right">
                                <button type="submit" name="button" class="btn btn-primary btn-fill"><span class="glyphicon glyphicon-log-in"></span> Masuk gan</button>
                              </div>
                              <div class="clearfix"></div>
                            </form>
													</div>
											</div>
									</div>

            </div>
        </div>

    	</div>
</div>

</body>
</html>
