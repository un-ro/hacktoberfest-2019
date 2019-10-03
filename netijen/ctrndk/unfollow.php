<!--//////////////////////////////////////////////////////////////////-->
<?php
set_time_limit(0);
ignore_user_abort(1);
session_start();
require_once('lib/fungsi.php');?>
<!--//////////////////////////////////////////////////////////////////-->
<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta name="description" content="GIGABOT adalah Layanan tools Instagram free">
	<meta name="keyword" content="Tools,Instagram,Free,Gratis,Sosial Media">
	<meta name="author" content="GIGABOT">
	
	<title>GIGABOT - Unfollow Followers Target</title>
	
    <link rel="shortcut icon" href="assets/logo.png" />
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">
	
	<script src="assets/oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="assets/oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<!-- jQuery 2.2.3 -->
	<script src="assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
</head>

<body class="hold-transition skin-blue ">
	<!-- Site wrapper -->
	<div class="wrapper">

		<header class="main-header">
			<!-- Logo -->
			<a href="#" class="logo">
				<span class="logo-mini"><b>G</b>B</span>
				<span class="logo-lg"><b>GIGA</b>BOT</span>
			</a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>

				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
					</ul>
				</div>
			</nav>
		</header>

		<!-- =============================================== -->

		<!-- Left side column. contains the sidebar -->
		<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<!-- sidebar menu: : style can be found in sidebar.less -->
				<ul class="sidebar-menu">
				
					<li class="header">MAIN MENU</li>
					<li><a href="home.php"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
					<li><a href="follow.php"><i class="fa fa-users"></i> <span>Follow Followers Target</span></a></li>
					<li><a href="unfollow.php"><i class="fa fa-user btn-link"></i> <span>Unfollow Followers</span></a></li>
					<li><a href="mf.php"><i class="fa fa-users" ></i> <span>Mass Follow</span></a></li>
					<li><a href="lt.php"><i class="fa fa-heart" ></i> <span>Like Timeline</span></a></li>
					<li><a href="ct.php"><i class="fa fa-comment" ></i> <span>Comment Timeline</span></a></li>
					<li><a href="up.php"><i class="fa fa-upload" ></i> <span>Upload Photo</span></a></li>
					<li><a href="dp.php"><i class="fa fa-trash" ></i> <span>Delete All Picture</span></a></li>
					<li><a href="sm.php"><i class="fa fa-send" ></i> <span>SMS Masking</span></a></li>
					<li><a href="hub.php"><i class="fa fa-phone"></i> <span>Kontak</span></a></li>
					<li><a href="keluar.php"><i class="fa fa-sign-out"></i> <span>Keluar</span></a></li>
				</ul>
			</section>
			<!-- /.sidebar -->
		</aside>		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>Instagram Tools</h1>
				<ol class="breadcrumb">
					<li><a href="index.php"><i class="fa fa-plus"></i> GigaBot</a>
					</li>
					<li class="active">Unfollow Following</li>
				</ol>
			</section>
<!--//////////////////////////////////////////////////////////////////-->
<?
if(!$_SESSION['data']):
		?>
<!--//////////////////////////////////////////////////////////////////-->
			<!-- Main content -->
			<section class="content">				
				<div class="row">
			<!--box-->
						<div class="col-md-6">
			<!-- box -->
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title"><i class="fa fa-instagram"></i> Unfollow Following</h3>
							</div>
									<div class="box-body">
<!--//////////////////////////////////////////////////////////////////-->

<? 	if(!$_POST['username']||!$_POST['password']){ }else{
		$ua = generate_useragent();
		$devid = generate_device_id();
		$login = proccess(1, $ua, 'accounts/login/', 0, hook('{"device_id":"'.$devid.'","guid":"'.generate_guid().'","username":"'.trim($_POST['username']).'","password":"'.($_POST['password']).'","Content-Type":"application/x-www-form-urlencoded; charset=UTF-8"}'));
		$data = json_decode($login[1]);
		if($data->status<>ok)
			print '<div class="alert alert-warning">
                                Username/Password Salah!
                            </div>';
		else{
			preg_match_all('%Set-Cookie: (.*?);%',$login[0],$d);$cookie = '';
			for($o=0;$o<count($d[0]);$o++)$cookie.=$d[1][$o].";";
			$_SESSION['data'] = array('cookies' => $cookie, 'useragent' => $ua, 'device_id' => $devid, 'username' => $data->logged_in_user->username, 'id' => $data->logged_in_user->pk);
			print '<div class="alert alert-success">
                                Sukses! Anda akan dialihkan..
            </div><script>window.location.replace(\'?\');</script>';
		}
} ?>

<!--//////////////////////////////////////////////////////////////////-->
<form role="form" method="POST">
	<fieldset>
		<div class="form-group">
		<label>Username</label>
		<input type="text" class="form-control" name="username" placeholder="Username" required/>
		</div>
		<div class="form-group">
		<label>Password</label>
		<input type="password" class="form-control" name="password" placeholder="password" required/><br>
		<button type="submit" name="submit" class="btn btn-primary pull-right"><i class="fa fa-sign-in"></i>   Login</button>
		</div>
	</fieldset>
</form>
		</div>
			</div>
						<!-- /.box -->
					</div>
					<!-- /.box-->
					<div class="col-md-6 pull-right">
						<!-- box -->
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title"><i class="fa fa-info"></i> Result </h3>
							</div>
							<div class="box-body">

<!--//////////////////////////////////////////////////////////////////-->
<?
else:
	if(!$_POST['submit']): ?>
<!--//////////////////////////////////////////////////////////////////-->
<form role="form" method="POST">
	<fieldset>
		<button type="submit" name="submit" class="btn btn-lg btn-primary" value="submit">Login</button>
		</div>
	</fieldset>
</form>	
<!--//////////////////////////////////////////////////////////////////-->
	<? else: ?>
<?
	$data_session = $_SESSION['data'];
	$c = 0;
	$listids = array();
	do{
		$parameters = ($c>0) ? '?max_id='.$c : '';
		$req = proccess(1, $data_session['useragent'], 'friendships/'.$data_session['id'].'/following/'.$parameters, $data_session['cookies']);
		$req = json_decode($req[1]);
		for($i=0;$i<count($req->users);$i++):
			if(count($listids)<=$limit)
				$status = proccess($data_session['useragent'], 'friendships/show/'.$req->users[$i]->pk.'/', $data_session['cookies']);
				$status = json_decode($status[1]);
				if(!$status->followed_by)
					$listids[count($listids)] = $req->users[$i]->pk;
		endfor;
		$c = (isset($req->next_max_id)) ? $req->next_max_id : 0;
	}while($c>0);
	for($i=0;$i<count($listids);$i++):
			$cross = proccess(1, $data_session['useragent'], 'friendships/destroy/'.$listids[$i].'/', $data_session['cookies'], hook('{"user_id":"'.$listids[$i].'"}'));
			$cross = json_decode($cross[1]);
			print $i.'. <b>@'.$data_session['username'].'</b> <font color="green">Sukses Unfollow => </font><b style="color:gray;">[ @'.$listids[$i].' ]</b><br>';
			flush();
	endfor;
endif;	endif;?>
<!--//////////////////////////////////////////////////////////////////-->
							</div>
							<!-- /.box-body -->

						</div>
						<!-- /.box -->
						
					</div>

				</div>
				
			</section>
			<!-- /.content -->
			<!-- Content Header (Page header) -->
		
		</div>
		<!-- /.content-wrapper -->
		<footer class="main-footer">
				<div class="pull-right hidden-xs">
					<span class="label label-danger pull-right"> BETA </span>
				</div>
				<strong>Get Tools.</strong>
		</footer>

	</div>
	<!-- ./wrapper -->

	<!-- Bootstrap 3.3.6 -->
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- SlimScroll -->
	<script src="assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script src="assets/plugins/fastclick/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="assets/dist/js/app.min.js"></script>
	<script src="assets/plugins/plugins.js"></script>
</body>

</html>