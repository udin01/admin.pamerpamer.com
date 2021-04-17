<!DOCTYPE html>
<html>
	<head>

		<meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
      <meta name="format-detection" content="telephone=no">
      <meta name="theme-color" content="#f03a37" />
      <title>
         @yield('title_admin')
      </title>
      <meta name="author" content="{{ $base['meta_author'] }}">
      <meta name="description" content="{{ $base['meta_description']}}">
      <meta name="keywords" content="{{ $base['meta_keywords'] }}">
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <!-- SOCIAL MEDIA META -->
      <meta property="og:description" content="{{ $base['meta_description'] }}">
      <meta property="og:image" content="{{ $base['meta_image'] }}">
      <meta property="og:site_name" content="{{ $baseApp['title'] }}">
      <meta property="og:title" content="{{ $baseApp['title'] }}">
      <meta property="og:type" content="website">
      <meta property="og:url" content="{{ $baseApp['title'] }}">

      <!-- TWITTER META -->
      <meta name="twitter:card" content="summary">
      <meta name="twitter:site" content="{{ $baseApp['title'] }}">
      <meta name="twitter:creator" content="{{ $baseApp['title'] }}">
      <meta name="twitter:title" content="{{ $baseApp['title'] }}">
      <meta name="twitter:description" content="{{ $base['meta_description']}}">
      <meta name="twitter:image" content="{{ $base['meta_image'] }}">

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light&display=swap" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{ asset('onefamily/vendor/bootstrap/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('onefamily/vendor/fontawesome-free/css/all.min.css') }}">
		<link rel="stylesheet" href="{{ asset('onefamily/vendor/animate/animate.compat.css') }}">
		<link rel="stylesheet" href="{{ asset('onefamily/vendor/simple-line-icons/css/simple-line-icons.min.css') }}">
		<link rel="stylesheet" href="{{ asset('onefamily/vendor/owl.carousel/assets/owl.carousel.min.css') }}">
		<link rel="stylesheet" href="{{ asset('onefamily/vendor/owl.carousel/assets/owl.theme.default.min.css') }}">
		<link rel="stylesheet" href="{{ asset('onefamily/vendor/magnific-popup/magnific-popup.min.css') }}">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="{{ asset('onefamily/css/theme.css') }}">
		<link rel="stylesheet" href="{{ asset('onefamily/css/theme-elements.css') }}">
		<link rel="stylesheet" href="{{ asset('onefamily/css/theme-blog.css') }}">
		<link rel="stylesheet" href="{{ asset('onefamily/css/theme-shop.css') }}">


		<!-- Skin CSS -->
		<link rel="stylesheet" href="{{ asset('onefamily/css/skins/default.css') }}"> 

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{ asset('onefamily/css/custom.css') }}">

		<!-- Head Libs -->
		<script src="{{ asset('onefamily/vendor/modernizr/modernizr.min.js') }}"></script>

	</head>
<body>

	<div class="body coming-soon">

		<div role="main" class="main" style="min-height: calc(100vh - 393px);">
			<div class="container">
				
           

				<div class="row">
					<div class="col">
						<hr class="solid my-5">
					</div>
				</div>
				<section class="http-error py-0">
					<div class="row justify-content-center py-3">
						<div class="col-6 text-center">
							<div class="http-error-main">
								<h2 class="mb-6">Sory !</h2>
								<span class="text-6 font-weight-bold text-color-dark">
                        Maintenance Mode</span>
								<p class="text-3 my-4">An unexpected error has occured. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim.</p>
							</div>
							<a href="{{route('expoproperty_front.home')}}" class="btn btn-primary btn-rounded btn-xl font-weight-semibold text-2 px-4 py-3 mt-1 mb-4"><i class="fas fa-angle-left pr-3"></i>GO BACK TO HOME PAGE</a>
						</div>
					</div>
				</section>
			</div>
		</div>

		
	</div>

	<!-- Vendor -->
	<script src="{{ asset('onefamily/vendor/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('onefamily/vendor/jquery.appear/jquery.appear.min.js') }}"></script>
	<script src="{{ asset('onefamily/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
	<script src="{{ asset('onefamily/vendor/jquery.cookie/jquery.cookie.min.js') }}"></script>
	<script src="{{ asset('onefamily/vendor/popper/umd/popper.min.js') }}"></script>
	<script src="{{ asset('onefamily/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('onefamily/vendor/common/common.min.js') }}"></script>
	<script src="{{ asset('onefamily/vendor/jquery.validation/jquery.validate.min.js') }}"></script>
	<script src="{{ asset('onefamily/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
	<script src="{{ asset('onefamily/vendor/jquery.gmap/jquery.gmap.min.js') }}"></script>
	<script src="{{ asset('onefamily/vendor/jquery.lazyload/jquery.lazyload.min.js') }}"></script>
	<script src="{{ asset('onefamily/vendor/isotope/jquery.isotope.min.js') }}"></script>
	<script src="{{ asset('onefamily/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('onefamily/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ asset('onefamily/vendor/vide/jquery.vide.min.js') }}"></script>
	<script src="{{ asset('onefamily/vendor/vivus/vivus.min.js') }}"></script>

	<!-- Theme Base, Components and Settings -->
	<script src="{{ asset('onefamily/js/theme.js') }}"></script>

	<!-- Theme Custom -->
	<script src="{{ asset('onefamily/js/custom.js') }}"></script>


	<!-- Theme Initialization Files -->
	<script src="{{ asset('onefamily/js/theme.init.js') }}"></script>

	<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-12345678-1', 'auto');
		ga('send', 'pageview');
	</script>
	 -->

</body>
</html>
