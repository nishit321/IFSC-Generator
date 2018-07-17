<!DOCTYPE HTML>
<html>
	<head>
		<title>@yield('title')</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
		<link rel="stylesheet" href=" {{URL::to('template/assets/css/main.css')}}" />
		<style type="text/css">
		</style>
	</head>
	<body class="is-preload">

		<!-- Header -->
			<header id="header">
				<a class="logo" href="index.html">IFSC Code</a>
				<nav>
					<a href="/ifsccode">Find By IFSC Code</a>
					<a href="/">Find By Address</a>	
				</nav>
			</header>

		<!-- Banner -->


		<!-- Highlights -->
			<section class="wrapper">
				<div class="inner">
					@yield('content')
				</div>
			</section>

	

		<!-- Testimonials -->
		
		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<div class="content">
						<section>
							<h3>Accumsan montes viverra</h3>
							<p>Nunc lacinia ante nunc ac lobortis. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus ornare mi ut ante amet placerat aliquet. Volutpat eu sed ante lacinia sapien lorem accumsan varius montes viverra nibh in adipiscing. Lorem ipsum dolor vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing sed feugiat eu faucibus. Integer ac sed amet praesent. Nunc lacinia ante nunc ac gravida.</p>
						</section>
						<section>
							<h4>Site Map</h4>
							<ul class="alt">
								<li><a href="/ifsccode">Find By IFSC Code</a></li>
								<li><a href="/">Find By Address</a></li>
							</ul>
						</section>
						<section>
							<h4>Magna sed ipsum</h4>
							<ul class="plain">
								<li><a href="#"><i class="icon fa-twitter">&nbsp;</i>Twitter</a></li>
								<li><a href="#"><i class="icon fa-facebook">&nbsp;</i>Facebook</a></li>
								<li><a href="#"><i class="icon fa-instagram">&nbsp;</i>Instagram</a></li>
								<li><a href="#"><i class="icon fa-github">&nbsp;</i>Github</a></li>
							</ul>
						</section>
					</div>
					<div class="copyright">
						&copy;  
					</div>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="{{URL::to('template/assets/js/jquery.min.js')}}"></script>
			<script src="{{URL::to('template/assets/js/breakpoints.min.js')}}"></script>
			<script src="{{URL::to('template/assets/js/util.js')}}"></script>
			<script src="{{URL::to('template/assets/js/main.js')}}"></script>

	</body>
</html>