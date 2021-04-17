<!doctype html>
<html lang="en">

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

  <!-- FAVICON FILES -->
  <link href="{{ env('URL_ENDPOINT').$base['favicon'] }}" rel="apple-touch-icon" sizes="144x144">
  <link href="{{ env('URL_ENDPOINT').$base['favicon'] }}" rel="apple-touch-icon" sizes="114x114">
  <link href="{{ env('URL_ENDPOINT').$base['favicon'] }}" rel="apple-touch-icon" sizes="72x72">
  <link href="{{ env('URL_ENDPOINT').$base['favicon'] }}" rel="apple-touch-icon">
  <link href="{{ env('URL_ENDPOINT').$base['favicon'] }}" rel="shortcut icon">

  <!-- Web Fonts  -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700%7CPlayfair+Display:400,700,900&display=swap" rel="stylesheet" type="text/css">

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


  <!-- Revolution Slider CSS -->
		<link rel="stylesheet" href="{{ asset('onefamily/vendor/rs-plugin/css/settings.css') }}">
		<link rel="stylesheet" href="{{ asset('onefamily/vendor/rs-plugin/css/layers.css') }}">
		<link rel="stylesheet" href="{{ asset('onefamily/vendor/rs-plugin/css/navigation.css') }}">

  <!-- Demo CSS -->
  <link rel="stylesheet" href="{{ asset('onefamily/css/demo-startup-agency.css') }}">
  <link rel="stylesheet" href="{{ asset('onefamily/css/demo-event.css') }}">

  <!-- Skin CSS -->
  <link rel="stylesheet" href="{{ asset('onefamily/skins/skin-startup-agency.css') }}"> 
  <link rel="stylesheet" href="{{ asset('onefamily/skins/skin-event.css') }}"> 

  <!-- Theme Custom CSS -->
  <link rel="stylesheet" href="{{ asset('onefamily/css/custom.css') }}">

  <!-- Head Libs -->
  <script src="{{ asset('onefamily/vendor/modernizr/modernizr.min.js') }}"></script>
    
    @yield('style_css')
    
     
     @if ($base['pixel_fb'])
         {!! $base['pixel_fb'] !!}
     @endif

</head>

  
{{-- @if( !isset($base['welcomeOff']) )
<body class="alternative-font-4 loading-overlay-showing" data-plugin-page-transition data-loading-overlay data-plugin-options="{'hideDelay': 500}">
    <div class="loading-overlay">
      <div class="bounce-loader">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
      </div>
    </div>
@else --}}
{{-- <body class="alternative-font-4" data-plugin-page-transition> --}}
<body data-target="#header" data-spy="scroll" data-offset="100">
{{-- @endif --}}
  
  {{-- 	
  <div class="loading-overlay">
		<div class="bounce-loader">
			<div class="bounce1"></div>
			<div class="bounce2"></div>
			<div class="bounce3"></div>
		</div>
	</div>
   --}}


    {{-- @if ( env('GOOGLE_TAG', false) )
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{env('GOOGLE_TAG')}}"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
    @endif --}}


  @yield('preloader')

  <div class="body">
		<header id="header" class="header-transparent header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 70}">
		<div class="header-body border-top-0 bg-dark box-shadow-none">
			<div class="header-container container">
				<div class="header-row">
					<div class="header-column">
						<div class="header-row">
							<div class="header-logo">
								<a href="{{ url('/') }}">
									<img alt="" width="102" height="40" src="{{ env('URL_ENDPOINT').$base['logo_dark'] }}">
								</a>
							</div>
						</div>
					</div>
					<div class="header-column justify-content-end">
						<div class="header-row">
							<div class="header-nav header-nav-links header-nav-dropdowns-dark header-nav-light-text order-2 order-lg-1">
								<div class="header-nav-main header-nav-main-mobile-dark header-nav-main-square header-nav-main-dropdown-no-borders header-nav-main-effect-2 header-nav-main-sub-effect-1">
									<nav class="collapse">
										<ul class="nav nav-pills" id="mainNav">
											<li>
												<a class="nav-link font-weight-semibold" data-hash href="{{ route('expoproperty_front.home') }}">
													Home
												</a>
											</li>
                      <li>
												<a class="nav-link font-weight-semibold" data-hash href="{{ route('expoproperty_front.kategoriProduct') }}">
													List Jobs
												</a>
											</li>
										</ul>
									</nav>
								</div>
								<!-- <div class="buy-tickets">
									<a href="#" class="btn btn-primary custom-border-radius custom-btn-style-1 text-3 font-weight-bold text-color-light text-uppercase outline-none ml-4" href="#">Buy Tickets <i class="custom-long-arrow-right" aria-hidden="true"></i></a>
								</div> -->
								<button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
									<i class="fas fa-bars"></i>
								</button>
							</div>							
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
 
  <div role="main" class="main">
    @yield('welcome')


    @yield('content')

    <div id="pic-bg" style="display: none; position: fixed; bottom: 130px; right: 230px; z-index: 99; border: none; outline: none; padding: 15px; border-radius: 10px; font-size: 18px;">
      <div id="pic-close" onclick="closeIfrem();" style="cursor: pointer;margin-left: -65px;">
        <i class="fa fa-window-close text-danger" aria-hidden="true"></i></div>
      <div id="pic-to-pic"></div>
    </div>

  </diV>

    
    
    <footer id="footer" class="mt-0">
			<div class="container">
				<div class="row py-5">

					<div class="col-md-4">
						{!! $baseApp['footer_left'] !!}
					</div>
					<div class="col-md-4">
						{!! $baseApp['footer_right'] !!}
					</div>
					<div class="col-md-4 text-center">
						<ul class="footer-social-icons social-icons social-icons-clean social-icons-big social-icons-opacity-light social-icons-icon-light mt-1">
							@php
								$sosmed_arr = [
								'facebook' => $base['sosmed_fb'],
								'instagram' => $base['sosmed_ig'],
								'twitter' => $base['sosmed_twitter'],
								'youtube' => $base['youtube'],
								];
							@endphp
							@foreach ($sosmed_arr as $keySosmed => $sosmed)
								@if ($sosmed)
                  <li class="social-icons-{!! strtolower($keySosmed) !!}">
                  <a style="border:none;" href="http://{{ $keySosmed }}.com/{!! $sosmed !!}" target="_blank" title="{!! strtolower($keySosmed) !!}"><i class="fab fa-{!! strtolower($keySosmed) !!} fa-3x"></i></a></li>
								@endif
              @endforeach

						</ul>
					</div>
				</div>
			</div>
			<div class="footer-copyright footer-copyright-style-2">
				<div class="container py-2">
					<div class="row py-4">
						<div class="col-lg-8 text-center text-lg-left mb-2 mb-lg-0">
							<p>
								<span class="pr-0 pr-md-3 d-block d-md-inline-block"><i class="far fa-dot-circle text-color-primary top-1 p-relative"></i><span class="text-color-light opacity-7 pl-1">{{ $baseApp['alamat'] }}</span></span>
								<span class="pr-0 pr-md-3 d-block d-md-inline-block"><i class="fab fa-whatsapp text-color-primary top-1 p-relative"></i><a href="tel:{{ $baseApp['telp'] }}" class="text-color-light opacity-7 pl-1">{{ $baseApp['telp'] }}</a></span>
								<span class="pr-0 pr-md-3 d-block d-md-inline-block"><i class="far fa-envelope text-color-primary top-1 p-relative"></i><a href="mailto:{{ $baseApp['email'] }}" class="text-color-light opacity-7 pl-1">{{ $baseApp['email'] }}</a></span>
							</p>
						</div>
						<div class="col-lg-4 d-flex align-items-center justify-content-center justify-content-lg-end mb-4 mb-lg-0 pt-4 pt-lg-0">
							<p>© {{ Carbon\Carbon::now()->format('Y') }} {{ env('APP_NAME') }}.</p>
						</div>
					</div>
				</div>
			</div>
		</footer>


  </div>


  <!-- Vendor -->
  <script src="{{ asset('onefamily/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('onefamily/vendor/jquery.appear/jquery.appear.min.js')}}"></script>
  <script src="{{ asset('onefamily/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{ asset('onefamily/vendor/jquery.cookie/jquery.cookie.min.js')}}"></script>
  <script src="{{ asset('onefamily/vendor/popper/umd/popper.min.js')}}"></script>
  <script src="{{ asset('onefamily/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('onefamily/vendor/common/common.min.js')}}"></script>
  <script src="{{ asset('onefamily/vendor/jquery.validation/jquery.validate.min.js')}}"></script>
  <script src="{{ asset('onefamily/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
  <script src="{{ asset('onefamily/vendor/jquery.gmap/jquery.gmap.min.js')}}"></script>
  <script src="{{ asset('onefamily/vendor/jquery.lazyload/jquery.lazyload.min.js')}}"></script>
  <script src="{{ asset('onefamily/vendor/isotope/jquery.isotope.min.js')}}"></script>
  <script src="{{ asset('onefamily/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{ asset('onefamily/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{ asset('onefamily/vendor/vide/jquery.vide.min.js')}}"></script>
  <script src="{{ asset('onefamily/vendor/vivus/vivus.min.js')}}"></script>
  <script src="{{ asset('onefamily/vendor/kute/kute.min.js')}}"></script>

  <!-- Theme Base, Components and Settings -->
  <script src="{{ asset('onefamily/js/theme.js')}}"></script>


  <!-- Current Page Vendor and Views -->
  <script src="{{ asset('onefamily/vendor/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
  <script src="{{ asset('onefamily/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>

  <!-- Current Page Vendor and Views -->
  <script src="{{ asset('onefamily/js/views/view.contact.js')}}"></script>

  <!-- Demo -->
  <script src="{{ asset('onefamily/js/demo-startup-agency.js')}}"></script>
  <script src="{{ asset('onefamily/js/demo-event.js')}}"></script>
  

  <!-- Theme Custom -->
  <script src="{{ asset('onefamily/js/custom.js')}}"></script>


  <!-- Theme Initialization Files -->
  <script src="{{ asset('onefamily/js/theme.init.js')}}"></script>

@if ( env('GOOGLE_TAG', false) )
  <!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', '{{ env('GOOGLE_TAG', false) }}', 'auto');
    ga('send', 'pageview');
  </script>
    -->
@endif


  <!-- end main -->
  <script>
    let flagPlayVid = false;


    /*
    var cssLink = document.createElement("link");
    cssLink.href = "https://admin.{{ env('URL_ENDPOINT_NAME') }}/iframeStyle.css"; 
    cssLink.rel = "stylesheet"; 
    cssLink.type = "text/css"; 
    frames['iframe1'].document.head.appendChild(cssLink);
    */
    
  $(document).ready(function() {
      /*
      jQuery(document).ready(function( $ ) {
        $('.video-selector iframe')[0].contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
      });
      $('.video-container').on('click', function(){
        $('video-selector iframe')[0].contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
        // add other code here to swap a custom image, etc
      });
      */
  });



  function closeIfrem() {
    /* $('.video-selector iframe').each( y => {
        y.contentWindow.postMessage('{"event":"command","func":"' + 'pauseVideo' + '","args":""}', '*')
    }); */
    $('#pic-bg').hide();
    
    let rty = $('#profileVideo_dev').attr('src');
    let allow = $('#profileVideo_dev').attr('allow');
    console.log('___ rty', rty);
    console.log('___ allow', allow);

    rty = rty.replace("autoplay=1", "");
    allow = allow.replace("autoplay;", "");
    $('#profileVideo_dev').attr("src", rty);
    $('#profileVideo_dev').attr("allow", allow);

    $('#profileVideo_dev').appendTo("#pic-to-pic");
  }
  function alertSize( rty = 0) {
      var myWidth = 0, myHeight = 0;
      if( typeof( window.innerWidth ) == 'number' ) {
        //Non-IE
        myWidth = window.innerWidth;
        myHeight = window.innerHeight;
      } else if( document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight ) ) {
        //IE 6+ in 'standards compliant mode'
        myWidth = document.documentElement.clientWidth;
        myHeight = document.documentElement.clientHeight;
      } else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) {
        //IE 4 compatible
        myWidth = document.body.clientWidth;
        myHeight = document.body.clientHeight;
      }
      // console.log( 'Width = ' + myWidth );
      // console.log( 'Height = ' + myHeight );
      return myHeight - rty ;
    }

   function gooAnalytic( q ) {
      $.ajax({ 
          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
          url: '{{ route('expoproperty_front.gooAnalytic') }}',type: 'post',
          data: q,
          success: function(t) { console.log( t ) }, 
          error: function(t) { console.log( '___Error', t ) }
      });
    }
  </script>

  @yield('link_js')
</body>

</html>