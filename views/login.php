<!DOCTYPE html>
<html>
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
	<link rel="stylesheet" type="text/css" href="<?= __URLS__ ?>assets/css/login.css">
	<link rel="stylesheet" type="text/css" href="<?= __URLS__ ?>assets/css/toastr.min.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row no-gutter">
			<div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
			<div class="col-md-8 col-lg-6" style="background-image: linear-gradient(#5433ff,#20bdff,#a5fecb);">
				<div class="login d-flex align-items-center py-5">
					<div class="container">
						<div class="row">
							<div class="col-md-9 col-lg-8 mx-auto">
								<h3 class="login-heading mb-4"><img src="<?= __URLS__ ?>assets/images/logo.png" height="48" width="48" class="d-inline-block align-top"> <span style="line-height: 48px;">Hoşgeldiniz!</span></h3>
								<form id="login" action="" class="was-validated">
									<div class="form-label-group">
										<input type="text" id="inputUsername" name="inputUsername" class="form-control" placeholder="Kullanıcı Adı" minlength="3" maxlength="20" required="">
										<label for="inputUsername">Kullanıcı Adı</label>
									</div>

									<div class="form-label-group">
										<input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Şifre" minlength="3" maxlength="20" required="">
										<label for="inputPassword">Şifre</label>
									</div>
									
									<input type="hidden" id="type" name="type" value="login">
									<button type="submit" class="btn btn-lg btn-success btn-block btn-login text-uppercase font-weight-bold mb-2" id="mw_signin_button" name="mw_signin_button">Giriş Yap</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript" src="<?= __URLS__ ?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?= __URLS__ ?>assets/js/bootstrap.js"></script>
<script type="text/javascript" src="<?= __URLS__ ?>assets/js/toastr.min.js"></script>
<script type="text/javascript" src="<?= __URLS__ ?>assets/js/login-general.js"></script>
</html>