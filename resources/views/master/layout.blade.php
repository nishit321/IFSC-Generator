<html>
	<head>
		<title>@yield('title')</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
		<link rel="stylesheet" href=" {{URL::to('template/assets/css/main.css')}}" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
		<!-- Dropdown List -->
	    <script src='{{URL::to('select2/dist/js/select2.min.js')}}' type='text/javascript'></script>
    	<!-- CSS -->
    	<link href='{{URL::to('select2/dist/css/select2.min.css')}}' rel='stylesheet' type='text/css'>
 		<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    	<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.12/clipboard.min.js"></script>

    	<!-- ads -->
    	<script async="async" src="https://www.google.com/adsense/search/ads.js"></script>
		<!-- other head elements from your page -->
		<script type="text/javascript" charset="utf-8">
		(function(g,o){g[o]=g[o]||function(){(g[o]['q']=g[o]['q']||[]).push(
		  arguments)},g[o]['t']=1*new Date})(window,'_googCsa');
		</script>


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
		  .leftpanel{
		  	position: fixed;
		  	background:#ccc;
		  	width:12%;
		  	height:100%;

		  }
		  .rightpanel{
		  	margin-left: 87%;
		  	background:#ccc;
		  	width:12%;
		  	height:100%;
		  	position: fixed;
		  }
		</style>
	</head>
	<body class="is-preload" >
		<!-- Header -->
			<header id="header">
				<a class="logo" href="/">IFSC Code</a>
				<nav>
					<a href="/ifsccode">Find By IFSC Code</a>
					<a href="/">Find By Address</a>	
				</nav>
			</header>



		<span id="theleftiframe" class="leftpanel">
	
		</span>
		<a href="#" id="lefticon" style="float:left;position:relative" onclick="document.getElementById('theleftiframe').style.display='none';document.getElementById('lefticon').style.display='none';"><i class="fa fa-window-close" aria-hidden="true"></i></a>

		<span id="therightiframe" class="rightpanel">
			
		</span>
		<a href="#" style="float:right; position: relative;" id="righticon" onclick="document.getElementById('therightiframe').style.display='none';document.getElementById('righticon').style.display='none';"><i class="fa fa-window-close" aria-hidden="true"></i></a>
		<!-- Highlights -->
			<section class="wrapper" style="margin-left:9%;margin-right:9%">
				<div class="inner">
					@yield('content')
				</div>
			</section>

	

		<!-- Footer -->
			<footer id="footer" >
				<div class="inner" >
						<section style="margin-left:5%;margin-right:5%">
							@yield('footer')
						</section>
					<div class="copyright">
						&copy;  
					</div>
				</div>
			</footer>
		<!-- Scripts -->
			<script type="text/javascript">
				$(document).ready(function() {
				    $("#btnSubmit").click(function(){
						$('#footerfix').remove();
				        alert("button");
				    }); 
				});	
			</script>
			<script src="{{URL::to('template/assets/js/jquery.min.js')}}"></script>
			<script src="{{URL::to('template/assets/js/breakpoints.min.js')}}"></script>
			<script src="{{URL::to('template/assets/js/util.js')}}"></script>
			<script src="{{URL::to('template/assets/js/main.js')}}"></script>

	</body>
</html>