<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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

  <!-- CSS FILES -->
  <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/fancybox.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/odometer.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/swiper.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

  <style>
  .page-header {
   background: url('{{ env('URL_ENDPOINT').$baseApp['bg_login'] }}') center;
   background-size: cover;
  }
  .error{
    color:white;
  }
  @keyframes spinner-border {
      to { transform: rotate(360deg); }
    } 
    .spinner-border{
        display: inline-block;
        width: 2rem !important;
        height: 2rem !important;
        vertical-align: text-bottom;
        border: .25em solid currentColor;
        border-right-color: transparent;
        border-radius: 50%;
        -webkit-animation: spinner-border .75s linear infinite;
        animation: spinner-border .75s linear infinite;
    }
    .spinner-border-sm{
        height: 1rem;
        border-width: .2em;
    }
    
    @keyframes zoominoutsinglefeatured {
    0% {
        transform: scale(1,1);
    }
    50% {
        transform: scale(1.2,1.2);
    }
    100% {
        transform: scale(1,1);
    }
}

    .zoomout-ani {
        animation: zoominoutsinglefeatured 1s infinite ;
    }
  </style>

</head>

<body>
  {{-- <div class="preloader">
    <div class="layer"></div>
    <div class="inner">
      <figure> <img src="{{ env('URL_ENDPOINT').$baseApp['loader'] }}" alt="Image"> </figure>
      <span class="typewriter" id="typewriter"></span>
    </div>
  </div> --}}

  <!-- end preloader -->
  <div class="navigation-menu">
    <div class="nav-bg"></div>
    <!-- end nav-bg -->
    <div class="nav-bg2"></div>
    <!-- end nav-bg2 -->
    
  </div>
  <!-- end navigation-menu -->
  <div class="transition-overlay">
    <div class="layer"></div>
    <!-- end layer -->
  </div>
  <!-- end transition-overlay -->
  <nav class="navbar">
    <div class="logo"> <a href="index.html"><img src="{{ env('URL_ENDPOINT').$base['logo'] }}" alt="Image"></a> </div>
    <!-- end logo -->
    
  </nav>
  <!-- end navbar -->
  <header class="page-header">
  
  @if( env('SOUND_SIDE', false) )
    <aside class="soundbar">
      <div class="sound">
        <div class="sound-title"> SOUND </div>
        <!-- end sound-title -->
        <div class="equalizer">
          <div class="holder"> <span></span> <span></span> <span></span> <span></span><span></span><span></span> </div>
          <!-- end holder -->
        </div>
        <!-- end equalizer -->
        <div class="sound-text"> <b>OFF<br>
            ON</b> </div>
        <!-- end sound-text -->
      </div>
      <!-- end sound -->
    </aside>
    @endif

    <!-- end soundbar -->
    {{-- <ul class="social-media">
      <li><a href="#">Facebook</a></li>
      <li><a href="#">Behance</a></li>
      <li><a href="#">Dribbble</a></li>
    </ul> --}}

      <div class="inner-content " style="justify-content: unset; padding-top: 40px;">
         <div class="inner h-100" style="overflow-x: scroll;">
            <div class="container pt-5 h-100">

                  @yield('content')

            </div>
               <!-- end container -->
         </div>
		<!-- end inner -->
		</div>
    <!-- end video-bg -->
  </header>
  <!-- end header -->
  
  <audio id="link" src="{{ asset('assets/audio/link.mp3') }}" preload="auto"></audio>

  <!-- JS FILES -->
  <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
  <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/swiper.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.stellar.js') }}"></script>
  <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
  <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.typewriter.js') }}"></script>
  <script src="{{ asset('assets/js/odometer.min.js') }}"></script>
  <script src="{{ asset('assets/js/fancybox.min.js') }}"></script>
  <script src="{{ asset('assets/js/wow.min.js') }}"></script>
  <script src="{{ asset('assets/js/scripts.js') }}"></script>
  <script>
  
  $(document).ready(function() {

    @if( env('SOUND_SIDE', false) )
          $('.soundbar').show();
          // EQUALIZER TOGGLE
          var source = "{{ asset('assets/audio/audio.mp3') }}";
          var audio = new Audio(); // use the constructor in JavaScript, just easier that way
          audio.addEventListener("load", function () {
            audio.play();
          }, true);
          audio.src = source;
          //audio.autoplay = true;
          audio.autoplay = false;
          audio.loop = true;
          audio.volume = 0.2;

          $('.equalizer').click();		
            var playing = true;		
            $('.equalizer').on('click', function(e) {
              if (playing == false) {
              audio.play();
                playing = true;

              } else {
                audio.pause();
                playing = false;
              }
          });
    @endif
  });
  </script>
  @yield('js_bottom')
</body>

</html>