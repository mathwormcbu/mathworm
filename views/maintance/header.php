<?php 
	if($key === 0)
	{
		header("location:" . __URLS__ . "login");
	}
?>

<!DOCTYPE html>
<html xml:lang="tr" lang="tr" xmlns="https://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8" />
	<title><?= $title; ?></title>
	<base href="<?= __URLS__ ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="application-name" content="<?= $title; ?>">
	
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="#3243bd">
	<meta name="apple-mobile-web-app-title" content="<?= $title; ?>">

	<meta name="robots" content="all, index, follow, noodp, noydir, archive">

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Asap+Condensed:500">

	<meta name="msapplication-tap-highlight" content="no">
	<meta name="msapplication-navbutton-color" content="#3243bd">
	<meta name="msapplication-TileColor" content="#3243bd">
	<meta name="generator" content="MVC Yapı">
	<meta name="country" content="tr">
	<meta name="copyright" content="© ">
	<meta name="author" content="<?= $title; ?>">
	<script> var path = '<?= __URLS__ ?>'; var ajaxUrl = '<?= __URLS__ . 'ajax' ?>'; </script>
	<link rel="stylesheet" type="text/css" href="<?= __URLS__ ?>assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="<?= __URLS__ ?>assets/css/toastr.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css">
</head>

<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="<?= __URLS__ ?>assets/images/logo.png" height="48" width="48" class="d-inline-block align-top">
					<span style="line-height: 48px;"> Math Worm</span>
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav ml-auto">
						<ul class="nav-item">
							<a href="<?= __URLS__ ?>cikis" style="color:red;">Çıkış Yap</a>
						</ul>
					</ul>
				</div>
			</div>
		</nav>
	</header>