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
		  #footerfix
			{
			    background-color:black;
			    position:fixed;
			    bottom:0px;
			    left:0px;
			    right:0px;
			    height:50px;
			    margin-bottom:0px;
			}
		</style>
	</head>
	<body class="is-preload">
		<!-- Header -->
			<header id="header">
				<a class="logo" href="/">IFSC Code</a>
				<nav>
					<a href="/ifsccode">Find By IFSC Code</a>
					<a href="/">Find By Address</a>	
				</nav>
			</header>

		<!-- Banner -->
		
		<div id="theleftiframe" style="overflow:auto;width:200px;height:100%;background:#ccc;float:left;left:0;top:0">
		<p>Left Frame.</p>
		</div>
		<div style="float:right;margin-right:15%;"><a href="#" id="righticon" onclick="document.getElementById('therightiframe').style.display='none';document.getElementById('righticon').style.display='none';"><i class="fa fa-window-close" aria-hidden="true"></i></a></div>

		<div > <a href="#"  id="lefticon" onclick="document.getElementById('theleftiframe').style.display='none';document.getElementById('lefticon').style.display='none';"><i class="fa fa-window-close" aria-hidden="true"></i></a></div>	
		<div id="therightiframe" style="overflow:auto;width:200px;height:100%;background:#ccc;float:right;right:0;top:0;margin-top:-13px;">
		<p>Right Frame.</p>
		</div>
		
		<!-- Highlights -->
			<section class="wrapper">
				<div class="inner">
					@yield('content')
				</div>
			</section>

	

		<!-- Testimonials -->
		<div id="footerfix">
		    This is footer
			<input id = "btnSubmit" type="submit" value="Release"/>
			<a href="asa"></a>
		</div>
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