<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>Test Task for ItSupportMe</title> 
		<link rel="stylesheet" type="text/css" href="/css/style.css" />

	<!--	<script src="/js/jquery-1.6.2.js" type="text/javascript">
	</script><script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.14/angular.min.js"></script> -->

	</head>
	<body>
		<div id="wrapper">
			<div id="header">
				<div id="logo">
					<a href="/"><img src="images/logo.png"></a>
				</div>
				<div id="menu">
					<ul>
						<?php require ("menu.php"); ?>
					</ul>
					<br class="clearfix" />
				</div>
			</div>
			<div id="page">
				<div id="sidebar">
					<div class="side-box">
						<h3><?php echo MAIN_MENU ?></h3>
						<ul class="list">
							<?php require ("menu.php"); ?>
						</ul>
					</div>
				</div>
				<div id="content">
					<div class="box">
						<?php include 'application/views/'.$content_view; ?>
					</div>
					<br class="clearfix" />
				</div>
				<br class="clearfix" />
			</div>
			<div id="page-bottom">
				<div id="page-bottom-sidebar">
					<h3><?php echo MY_CONTACTS ?></h3>
					<ul class="list">
						<li>Aleksandr Krasov</li>
						<li>skype: Danshur</li>
						<li class="last">e-mail: danshur@yandex.ru</li>
					</ul>
				</div>
				<div id="page-bottom-content">
					<h3><?php echo ABOUT_ME ?></h3>
					<p>
I want to be an excellent specialist in WEB development. <br/>I am perfectionist
					</p>
				</div>
				<br class="clearfix" />
			</div>
		</div>
		<div id="footer">
			<a href="/"><?php echo COMPANY ?></a> &copy; <?php echo date('Y');?></a>
		</div>
	</body>
</html>