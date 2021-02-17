<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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

  <!-- CSS FILES -->
  <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/fancybox.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/odometer.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/swiper.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
   <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

  <link rel="stylesheet" href="{{ asset('assets/carousel-3d/styles/jquery.carousel-3d.default.css') }}"/>

  <style>
    .side-content-block {
      background-position: center;
    }
    * {
      box-sizing: border-box;
    }
    .video-background {
      background: #000;
      position: fixed;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      z-index: -99;
    }
    .video-foreground,
    .video-background iframe {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      /* pointer-events: none; */
    }
    #vidtop-content {
      top: 0;
      color: #fff;
    }
    .vid-info {
      position: absolute;
      top: 0;
      right: 0;
      width: 33%;
      background: rgba(0, 0, 0, 0.3);
      color: #fff;
      padding: 1rem;
      font-family: Avenir, Helvetica, sans-serif;
    }
    .vid-info h1 {
      font-size: 2rem;
      font-weight: 700;
      margin-top: 0;
      line-height: 1.2;
    }
    .vid-info a {
      display: block;
      color: #fff;
      text-decoration: none;
      background: rgba(0, 0, 0, 0.5);
      transition: 0.6s background;
      border-bottom: none;
      margin: 1rem auto;
      text-align: center;
    }
    
    @media (min-aspect-ratio: 16/9) {
      .video-foreground {
        /* height: 300%;
        top: -100%; */
      }
    }
    @media (max-aspect-ratio: 16/9) {
      .video-foreground {
        /*width: 300%;
        left: -100%;*/
        width: 100%;
      }
    }
    @media all and (max-width: 600px) {
      .vid-info {
        width: 50%;
        padding: 0.5rem;
      }
      .vid-info h1 {
        margin-bottom: 0.2rem;
      }
    }
    @media all and (max-width: 500px) {
      .vid-info .acronym {
        display: none;
      }
    }
  </style>
    
    @yield('style_css')


    @if ( env('GOOGLE_TAG', false) )
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-TR6QXRM0BR"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-TR6QXRM0BR');
        </script>
        {{-- ======================================= --}}

        
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','{{ env('GOOGLE_TAG') }}');</script>
    @endif
    
     
     @if ($base['pixel_fb'])
         {!! $base['pixel_fb'] !!}
     @endif

</head>

<body>
    @if ( env('GOOGLE_TAG', false) )
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{env('GOOGLE_TAG')}}"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
    @endif


  @yield('preloader')



  <!-- end preloader -->
  <div class="navigation-menu">
    <div class="nav-bg"></div>
    <!-- end nav-bg -->
    <div class="nav-bg2"></div>
    <!-- end nav-bg2 -->
    <div class="inner">
      <address>
        {!! $base['description'] !!}
      </address>
      <ul>
          <li style="white-space: nowrap;">
            <a href="{{ route('expoproperty_front.home') }}">Home</a>
          </li>
          {{-- <li style="white-space: nowrap;">
            <a href="https://pamerpamer.com/blogs">Berita</a>
          </li> --}}
          <li style="white-space: nowrap;">
            <a href="#">Jadwal Tayang</a>
          </li>
          <li style="white-space: nowrap;">
            <a href="{{ route('expoproperty_front.myAccount') }}">Akun Anda</a>
          </li>
          <li style="white-space: nowrap;">
            <a href="{{ route('logout') }}">Logout</a>
          </li>
      </ul>
    </div>
    <!-- end inner -->
  </div>
  <!-- end navigation-menu -->
  <div class="transition-overlay">
    <div class="layer"></div>
    <!-- end layer -->
  </div>
  <!-- end transition-overlay -->
  <nav class="navbar">
    <div class="logo"> <a href="{{ route('expoproperty_front.home') }}"><img src="{{ env('URL_ENDPOINT').$base['logo'] }}" alt="Image"></a> </div>
    <!-- end logo -->
    <div class="sandwich-nav">
      <div class="sandwich-text"><b>MENU<br>
          CLOSE</b> </div>
      <!-- end sandwich-text -->
      <div class="sandwich-btn" id="sandwich-btn"> <span></span> <span></span> </div>
      <!-- end sandwich-btn -->
    </div>
    <!-- end sandwich-nav -->
  </nav>
 

  @yield('welcome')

  <!-- end header -->
  <main>

    @yield('content')

    
    
    <!-- end clients -->
    <footer class="footer">
      <div class="container">
        <div class="content-box wow fadeIn" data-wow-delay="0s">
          {!! $baseApp['footer_left'] !!}
        </div>
        <!-- end content-box -->
        
        <!-- end content-box -->
        <div class="content-box wow fadeIn" data-wow-delay="0.2s">
          {!! $baseApp['footer_right'] !!}
        </div>
        <!-- end content-box -->
      </div>
      <!-- end container -->
    </footer>
    <!-- end footer -->
    <footer class="sub-footer">
      <div class="container wow fadeIn"><small> © {{ Carbon\Carbon::now()->format('Y') }} {{ env('APP_NAME') }}</small>
        <ul>
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
                <li>
                  <a  target="_blank" href="http://{{ $keySosmed }}.com/{!! $sosmed !!}">
                    <i class="fa fa-{!! strtolower($keySosmed) !!}"></i>
                  </a>
                </li>
              @endif
            @endforeach

        </ul>
      </div>
      <!-- end container -->
    </footer>
    <!-- end sub-footer -->
  </main>
  <div id="pic-bg" style="display: none; position: fixed; bottom: 130px; right: 230px; z-index: 99; border: none; outline: none; padding: 15px; border-radius: 10px; font-size: 18px;">
    <div id="pic-close" onclick="closeIfrem();" style="cursor: pointer;margin-left: -65px;">
      <i class="fa fa-window-close text-danger" aria-hidden="true"></i></div>
    <div id="pic-to-pic"></div>
  </div>
  <!-- end main -->
  <audio id="link" src="{{ asset('assets/audio/link.mp3') }}" preload="auto"></audio>

  <!-- JS FILES -->
  {{-- <script src="{{ asset('assets/js/jquery.min.js') }}"></script> --}}
  <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/swiper.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.stellar.js') }}"></script>
  <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
  <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.typewriter.js') }}"></script>
  <script src="{{ asset('assets/js/odometer.min.js') }}"></script>
  <script src="{{ asset('assets/js/fancybox.min.js') }}"></script>
  <script src="{{ asset('assets/js/wow.min.js') }}"></script>

  <script src="{{ asset('assets/carousel-3d/jquery.resize.js') }}"></script>
  <script src="{{ asset('assets/carousel-3d/jquery.waitforimages.js') }}"></script>
  <script src="{{ asset('assets/carousel-3d/modernizr.js') }}"></script>
  <script src="{{ asset('assets/carousel-3d/jquery.carousel-3d.js') }}"></script>

  <script src="{{ asset('assets/js/scripts.js') }}"></script>
  <script>
    let flagPlayVid = false;


    /*
    var cssLink = document.createElement("link");
    cssLink.href = "https://admin.pamerpamer.com/iframeStyle.css"; 
    cssLink.rel = "stylesheet"; 
    cssLink.type = "text/css"; 
    frames['iframe1'].document.head.appendChild(cssLink);
    */
    
  $(document).ready(function() {

    @if( env('SOUND_SIDE', false) )
        // EQUALIZER TOGGLE
        var source = "{{ asset('assets/audio/audio.mp3') }}";
        var audio = new Audio(); // use the constructor in JavaScript, just easier that way
        audio.addEventListener("load", function () {
          audio.play();
        }, true);
        audio.src = source;
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