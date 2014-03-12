<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>Test Task for ItSupportMe</title> 
		<link rel="stylesheet" type="text/css" href="/css/style.css" />
		<script src="//code.jquery.com/jquery-1.9.1.js"></script>
		<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
		<script src="/js/func.js" type="text/javascript"></script>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
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
						<!--
						<h2>Welcome to Accumen</h2>
						<img class="alignleft" src="images/pic01.jpg" width="200" height="180" alt="" />
						<p>
							This is <strong>Accumen</strong>, a free, fully standards-compliant CSS template by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a>. The images used in this template are from <a href="http://fotogrph.com/">Fotogrph</a>. This free template is released under a <a href="http://creativecommons.org/licenses/by/3.0/">Creative Commons Attributions 3.0</a> license, so you are pretty much free to do whatever you want with it (even use it commercially) provided you keep the footer credits intact. Aside from that, have fun with it :)
						</p>
						-->
					</div>
					<br class="clearfix" />
				</div>
				<br class="clearfix" />
			</div>
			<div id="page-bottom">
				<div id="page-bottom-sidebar">
					<h3>Наши контакты</h3>
					<ul class="list">
						<li class="first">icq: 199199538</li>
						<li>skypeid: vitalyswipe</li>
						<li class="last">email: vitalyswipe@gmail.com</li>
					</ul>
				</div>
				<div id="page-bottom-content">
					<h3>О Компании</h3>
					<p>
Вот дом.
Который построил Джек.

А это пшеница.
Которая в тёмном чулане хранится
В доме,
Который построил Джек.

А это весёлая птица-синица,
Которая ловко ворует пшеницу,
Которая в тёмном чулане хранится
В доме,
Который построил Джек.

Вот кот,
Который пугает и ловит синицу,
Которая ловко ворует пшеницу,
Которая в тёмном чулане хранится
В доме,
Который построил Джек.
					</p>
				</div>
				<br class="clearfix" />
			</div>
		</div>
		<div id="footer">
			<a href="/">ГИИ МЧС РБ</a> &copy; <?php echo date('Y');?></a>
		</div>
	</body>
</html>