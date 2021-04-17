<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
  <meta name="format-detection" content="telephone=no">
  <meta name="theme-color" content="#f03a37" />
  <title>@yield('title')</title>
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

  <!-- FAVICON FILES -->
  <link href="{{ env('URL_ENDPOINT').$base['favicon'] }}" rel="apple-touch-icon" sizes="144x144">
  <link href="{{ env('URL_ENDPOINT').$base['favicon'] }}" rel="apple-touch-icon" sizes="114x114">
  <link href="{{ env('URL_ENDPOINT').$base['favicon'] }}" rel="apple-touch-icon" sizes="72x72">
  <link href="{{ env('URL_ENDPOINT').$base['favicon'] }}" rel="apple-touch-icon">
  <link href="{{ env('URL_ENDPOINT').$base['favicon'] }}" rel="shortcut icon">



  <!-- Web Fonts  -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light%7CPlayfair+Display:400&display=swap" rel="stylesheet" type="text/css">

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

  {{-- background: url('{{ env('URL_ENDPOINT').$baseApp['bg_login'] }}') center; --}}
  {{-- <div class="logo"> <a href="index.html"><img src="{{ env('URL_ENDPOINT').$base['logo'] }}" alt="Image"></a> </div> --}}
  
</head>

<body>
  {{-- <div class="preloader">
    <div class="layer"></div>
    <div class="inner">
      <figure> <img src="{{ env('URL_ENDPOINT').$baseApp['loader'] }}" alt="Image"> </figure>
      <span class="typewriter" id="typewriter"></span>
    </div>
  </div> --}}

  <body class="loading-overlay-showing" data-plugin-page-transition data-loading-overlay data-plugin-options="{'hideDelay': 500}">
		<div class="loading-overlay">
			<div class="bounce-loader">
				<div class="bounce1"></div>
				<div class="bounce2"></div>
				<div class="bounce3"></div>
			</div>
		</div>

		<div class="body">

			<div role="main" class="main">

        @yield('content')

      </div>
      <footer id="footer" class="mt-0">
				<div class="footer-copyright">
					<div class="container py-2">
						<div class="row py-4">
							<div class="col text-center">
								{{-- <ul class="footer-social-icons social-icons social-icons-clean social-icons-icon-light mb-3">
									<li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
									<li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
									<li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
								</ul> --}}
								<p>© {{ Carbon\Carbon::now()->format('Y') }} {{ env('APP_NAME') }}</p>
							</div>
						</div>
					</div>
				</div>
			</footer>

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

		<!-- Current Page Vendor and Views -->


		<!-- Current Page Vendor and Views -->
		<script src="{{ asset('onefamily/js/views/view.contact.js') }}"></script>

		<!-- Theme Custom -->
		<script src="{{ asset('onefamily/js/custom.js') }}"></script>


		<!-- Theme Initialization Files -->
		<script src="{{ asset('onefamily/js/theme.init.js') }}"></script>

		{{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script> --}}
		<script>

			/*
			Map Settings

				Find the Latitude and Longitude of your address:
					- https://www.latlong.net/
					- http://www.findlatitudeandlongitude.com/find-address-from-latitude-and-longitude/

			*/

			// Map Markers
			var mapMarkers = [{
				address: "New York, NY 10017",
				html: "<strong>New York Office</strong><br>New York, NY 10017",
				icon: {
					image: "img/pin.png",
					iconsize: [26, 46],
					iconanchor: [12, 46]
				},
				popup: true
			}];

			// Map Initial Location
			var initLatitude = 40.75198;
			var initLongitude = -73.96978;

			// Map Extended Settings
			var mapSettings = {
				controls: {
					draggable: (($.browser.mobile) ? false : true),
					panControl: true,
					zoomControl: true,
					mapTypeControl: true,
					scaleControl: true,
					streetViewControl: true,
					overviewMapControl: true
				},
				scrollwheel: false,
				markers: mapMarkers,
				latitude: initLatitude,
				longitude: initLongitude,
				zoom: 16
			};

			var map = $('#googlemaps').gMap(mapSettings),
				mapRef = $('#googlemaps').data('gMap.reference');

			// Styles from https://snazzymaps.com/
			var styles = [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}];

			var styledMap = new google.maps.StyledMapType(styles, {
				name: 'Styled Map'
			});

			mapRef.mapTypes.set('map_style', styledMap);
			mapRef.setMapTypeId('map_style');

		</script>

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
     
  
  
  @yield('js_bottom')
</body>

</html>