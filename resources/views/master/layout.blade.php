<html>
	<head>
		<title>@yield('title')</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
		<link rel="stylesheet" href=" {{URL::to('template/assets/css/main.css')}}" />
		<!-- Dropdown List -->
	    <script src='{{URL::to('select2/dist/js/select2.min.js')}}' type='text/javascript'></script>
    	<!-- CSS -->
    	<link href='{{URL::to('select2/dist/css/select2.min.css')}}' rel='stylesheet' type='text/css'>
 		<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    	<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
		<style type="text/css">
		  .select2-selection__rendered {
		    line-height: 46px !important;
		  }
		  .select2-container .select2-selection--single {
		    height: 46px !important;
		    box-sizing: border-box;
		    outline: none;
		    border: 1px solid #555;
		    border-radius:0px;
		  }
		  .select2-selection__arrow {
		    height: 44px !important;
		  }
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
					
						<section>
							@yield('footer')
						</section>
					
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