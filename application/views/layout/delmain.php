<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>SMA Sanjaya XIV Nanggulan</title>
	<link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/responsive.css') ?>" rel="stylesheet">
	<link rel="icon" href="<?= base_url('assets/images/fevicon.png') ?>" type="image/gif"/>
	<link href="<?= base_url('assets/css/jquery.mCustomScrollbar.min.css') ?>" rel="stylesheet">
	<style>
		li a, .dropbtn {
			display: inline-block;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		}
		li.dropdown {
			position: relative;
			display: inline-block;
		}

		.dropdown-content {
			display: none;
			position: absolute;
			background-color: orange;
			min-width: 80%||30%;
		}

		.dropdown-content a {
			text-decoration: none;
			display: block;
			text-align: left;
		}

		.dropdown-content a:hover {background-color: #f1f1f1;}

		.dropdown:hover .dropdown-content {
			display: block;
		}
	</style>
</head>

<body class="main-layout">
<?php error_reporting(E_ERROR); ?>
<!-- header -->
<div class="loader_bg">
	<div class="loader"><img src="<?= base_url('assets/images/loading2.gif') ?>" alt="#"/></div>
</div>

<header class="sticky-top">
	<!-- header inner -->
	<!-- header inner -->
	<div class="header">
		<div class="container">
			<div class="row">
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
					<div class="full">
						<div class="align-left m-1">
							<?php foreach ($gambarone as $gb): ?>
								<img class="img-fluid" style="max-width: 20%" src="<?= base_url('uploads/' . $gb->foto) ?>" alt="">
							<?php endforeach; ?>
						</div>
					</div>
				</div>
				<div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
					<div class="menu-area">
						<div class="limit-box">
							<nav class="main-menu">
								<ul class="menu-area-main">
									<li><a href="<?= base_url() ?>">Home</a></li>
									<li><a href="#about">About</a></li>
									<li><a href="<?= base_url('/staff') ?>">Staff</a></li>
									<li><a href="#about">Galeri</a></li>
									<li><a href="#service">Prestasi</a></li>
									<li class="dropdown">
										<a href="javascript:void(0)" class="dropbtn">Lain-lain ><</a>
										<div class="rounded dropdown-content">
											<a class="rounded p-3" href="#">Berita</a>
											<a class="rounded p-3" href="#">Pengumuman</a>
											<a class="rounded p-3" href="<?= base_url('/dokumen') ?>">Unduh</a>
											<a class="rounded p-3" href="#">Kontak</a>
										</div>
									</li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
