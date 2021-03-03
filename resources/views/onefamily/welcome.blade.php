<!DOCTYPE html>
<html>
<head>
{{-- <title>Project Title</title> --}}
<meta charset="utf-8">
<meta name="viewport" content="target-densitydpi=device-dpi, width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, minimal-ui" />
<style> @-ms-viewport { width: device-width; } </style>
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
<link rel="stylesheet" href="3d/vendor/reset.min.css">
<link rel="stylesheet" href="3d/style.css">
</head>
<body class="single-scene loading-overlay-showing" data-plugin-page-transition data-loading-overlay data-plugin-options="{'hideDelay': 500}">

{{-- ######################################## --}}

	<div class="body">

			<div role="main" class="main">

        {{-- =================================== --}}
         <section class="bg-form section section-overlay-opacity section-overlay-opacity-scale-7 border-0 m-0" style="background-image: url({{ env('URL_ENDPOINT').$baseApp['bg_login'] }}); background-size: cover; background-position: center; display:none;">
					<div class="container py-5">
						<div class="row align-items-center justify-content-center">
							<div class="col-lg-6 text-center mb-5 mb-lg-0">
								<div class="d-flex flex-column align-items-center justify-content-center h-100">
									<img src="{{ env('URL_ENDPOINT').$base['logo'] }}" class="w-100" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="50" data-plugin-options="{'minWindowWidth': 0}" alt="" />
									<p class="text-4 text-color-light font-weight-light mb-0" data-plugin-animated-letters data-plugin-options="{'startDelay': 350, 'minWindowWidth': 0}">Check out our options and features</p>
								</div>
							</div>
							<div class="col-lg-6 form-input">
								<div class="slider-contact-form-wrapper bg-primary rounded p-5" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="100" data-appear-animation-duration="1s">
									<div class="row">
										<div class="col text-center">
											<h2 class="font-weight-light text-white text-6 mb-2">
                        <strong>Buku Tamu</strong>
                      </h2>
											{{-- <p class="text-white mb-4 px-xl-5">
                        <strong>Buku Tamu</strong>
                      </p> --}}
                      <hr/>
										</div>
									</div>
									<div class="row">
										<div class="col">
    <form action="{{ route('postLogin') }}" method="post" role="form" class="row h-100 pt-2 w-100">
    
      <div class="wow fadeIn w-100" data-wow-delay="0.3s" style="background: url('@foreach ( $sponsor as $kSp => $sp ) {{ env('URL_ENDPOINT').$sp['img_pic'] }} @endforeach') no-repeat; background-size: 200px; background-position: center bottom;border-radius: 25px; margin:auto; padding-bottom: 10em !important;">
          {{-- <form action="home.php" method="POST" role="form"> --}}
        {{-- <form action="{{ route('postLogin') }}" method="post" role="form" style="margin-bottom: 50px;"> --}}
        @csrf

            {{-- Flash Error Message --}}
            @if(session('errors'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Something it's wrong:
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
            @endif
            {{-- ./Flash Error Message --}}

            <div class="form-group text-white">
                <label>Masukkan No. WhatsApp Anda </label>
                <input type="text" class="form-control height-login" name="wa" placeholder="No. WhatsApp" id="waNo" required>
                <small id="waHelp" class="form-text text-muted text-white">
                    <i class="text-white">Example: 085111111 atau 85111111 </i>
                </small>
            </div>
             <div class="form-group form-group-nama text-white" style="display:none;">
                <label><small>Masukkan Nama Anda</small></label>
                <input type="text" class="form-control height-login" name="nama" placeholder="Nama" id="namaForm">
            </div>

            {{-- <button type="submit" class="btn btn-primary height-login bg-btn-login w-100">Login</button> --}}
            <button href="javascript:void(0);" class="btn btn-dark height-login bg-btn-login w-100" onclick="waKamu();" >Login</button>
           
      </div>
      <!-- Modal -->
      <div class="modal fade" id="ModalOTP" role="dialog" tabindex="-1" role="dialog" data-backdrop="false" style="background: rgba(0,0,0,0.5);">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content" style="border-radius: 25px;">
            <div class="modal-header">
              {{-- <h5 class="modal-title">OTP Telah Dikirim</h5> --}}
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <h4>Masukan kode OTP</h4>
              <p>berupa 6 digit kode yang dikirim ke nomor WhatsApp Anda : <strong id="refNoWA"> </strong> </p>
              <div class="text-center textOTP">
                <input type="number" class="form-control text-center" name="otp" required>
                <a id="btnSendOTPLagi" href="javascript:void(0);" onclick="sendOTP()"><br>Kirim ulang kode OTP<br></a>
              </div>
              <hr>
              <div class="">
                <button type="submit" class="btn btn-primary form-control">Verifikasi</button>
              </div>

            </div>
          </div>
        </div>
      </div>

    </form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
        {{-- ./================================= --}}

         </div>
   </div>

{{-- ./######################################## --}}

<div id="pano"></div>

<div id="sceneList">
  <ul class="scenes">
    
      <a href="javascript:void(0)" class="scene" data-id="0-desain-360-gate">
        <li class="text">Pamerpamer.com</li>
      </a>
    
  </ul>
</div>

<div id="titleBar">
  <!-- <h1 class="sceneName"></h1> -->
</div>



<div id="hintspot" class="zoomDiv hint--right hint--info hint--bounce" data-hint="hint.css!">
  {{-- <a href="{{ env('APP_URL', 'pamerpamer.com') }}" target="_blank"> --}}
  <a href="javascript:void(0)" onclick="showForm();">
    <img src="3d/img/hotspot.png" >
  </a>
</div>
<style>
  #hintspot {
  width: 60px;
  height: 60px;
  margin-left: -30px;
  margin-top: -30px;

  opacity: 0.8;
  transition: opacity 0.2s;

  cursor: pointer;
  margin:auto;
}

#hintspot img {
  width: 100%;
  height: 100%;
}

#hintspot:hover {
  opacity: 1;
}
</style>



<a href="javascript:void(0)" id="autorotateToggle">
  <img class="icon off" src="3d/img/play.png">
  <img class="icon on" src="3d/img/pause.png">
</a>

<a href="javascript:void(0)" id="fullscreenToggle">
  <img class="icon off" src="3d/img/fullscreen.png">
  <img class="icon on" src="3d/img/windowed.png">
</a>

<a href="javascript:void(0)" id="sceneListToggle">
  <img class="icon off" src="3d/img/expand.png">
  <img class="icon on" src="3d/img/collapse.png">
</a>

<a href="javascript:void(0)" id="viewUp" class="viewControlButton viewControlButton-1">
  <img class="icon" src="3d/img/up.png">
</a>
<a href="javascript:void(0)" id="viewDown" class="viewControlButton viewControlButton-2">
  <img class="icon" src="3d/img/down.png">
</a>
<a href="javascript:void(0)" id="viewLeft" class="viewControlButton viewControlButton-3">
  <img class="icon" src="3d/img/left.png">
</a>
<a href="javascript:void(0)" id="viewRight" class="viewControlButton viewControlButton-4">
  <img class="icon" src="3d/img/right.png">
</a>
<a href="javascript:void(0)" id="viewIn" class="viewControlButton viewControlButton-5">
  <img class="icon" src="3d/img/plus.png">
</a>
<a href="javascript:void(0)" id="viewOut" class="viewControlButton viewControlButton-6">
  <img class="icon" src="3d/img/minus.png">
</a>

<script src="3d/vendor/screenfull.min.js" ></script>
<script src="3d/vendor/bowser.min.js" ></script>
<script src="3d/vendor/marzipano.js" ></script>

<script src="3d/data.js"></script>
<script src="{{ asset('onefamily/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('onefamily/vendor/bootstrap/js/bootstrap.min.js') }}"></script>


<script>
  var APP_DATA = {
  "scenes": [
    {
      "id": "0-desain-360-gate",
      "name": "desain-360-gate",
      "levels": [
        {
          "tileSize": 256,
          "size": 256,
          "fallbackOnly": true
        },
        {
          "tileSize": 512,
          "size": 512
        },
        {
          "tileSize": 512,
          "size": 1024
        },
        {
          "tileSize": 512,
          "size": 2048
        }
      ],
      "faceSize": 2048,
      "initialViewParameters": {
        "pitch": 0,
        "yaw": 0,
        "fov": 1.5707963267948966
      },
      "linkHotspots": [],
      "infoHotspots": []
    }
  ],
  "name": "Project Title",
  "settings": {
    "mouseViewMode": "drag",
    "autorotateEnabled": true,
    "fullscreenButton": false,
    "viewControlButtons": false
  }
};
let setFlagZoom = 1;
let setFlagZoom2 = 1;
   function zoomIn( cl ){
         var body = document.querySelector( cl );
         var currWidth = body.clientWidth;
         var currHeight = body.clientHeight;
         /*
         if(currWidth == 1000000){
            alert("Maximum zoom-in level of 1 Million reached.");
         } else{
            */
            body.style.width = (currWidth + 10) + "px";
            body.style.height = (currHeight + 10) + "px";
         // } 
   }
   function zoomOut( cl ){
         var body = document.querySelector( cl );
         var currWidth = body.clientWidth;
         var currHeight = body.clientHeight;
         /*
         if(currWidth == 100000){
            alert("Maximum zoom-out level reached.");
         } else{
            */
            body.style.width = (currWidth - 10) + "px";
            body.style.height = (currHeight - 10) + "px";
         // }
   }

   function showForm(){
      var body = document.querySelector( '.form-input' );
      if(setFlagZoom2){
      body.style.zIndex="30000";
      setFlagZoom2 = 0
      } else {
      body.style.zIndex="-1";
         setFlagZoom2 = 1
      }
   }

setInterval(function(){ 
   if(setFlagZoom){
      setFlagZoom = 0
      zoomIn('.zoomDiv');
   } else {
      setFlagZoom = 1
      zoomOut('.zoomDiv');
   }
}, 1000);

setTimeout(function(){
$('.bg-form').show();
}, 3000);

</script>

<script src="3d/index.js"></script>


<script>
    $('#waNo').change(function(){
        let wert = $('#waNo').val();
        $('#waTemp').val( wert );
        $('#refNoWA').text(wert);
    });
    function sendOTP(){
      let nowaa = $('#waNo').val();
        if(!nowaa){
          $("#ModalOTP").modal('hide');
          $('#waNo').focus();
          return false;
        }
        console.log('____', nowaa);
        $.ajax({ 
          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
          url: '{{ route('getOTPlagi') }}',type: 'post',
          data: { noWa : nowaa},
          success: function(t) {
            if( t === 'Nomer Belum terdaftar') {
              alert( 'Nomer Anda belum terdaftar lakukan Registrasi terlebih dahulu' );
              document.location = '{{ route('register') }}';
            } else if( t === 'fail' ) {
              alert( 'Maaf server ada masalah' );
            } else {
                alert( t );
                $("#btnSendOTPLagi").hide();
                $("#textOTP").append("<span>"+t+"</span>");
            }

          }, 
          error: function(t) { console.log( '___Error', t ) }
      });
    };
    function waKamu(){
        let nowaa = $('#waNo').val();
        let namaKamu = $('#namaForm').val();
        if(!nowaa){
          $('#waNo').focus();
          return false;
        }

        $.ajax({ 
          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
          url: '{{ route('waKamu') }}',type: 'post',
          data: { noWa : nowaa, nama: namaKamu},
          success: function(t) {
            if(t == 'reg'){
              alert( 'Nomer Anda belum terdaftar lakukan Registrasi terlebih dahulu, dengan memasukan Nama' );
              /*
              document.location = '{{ route('register') }}';
              */
              $(".form-group-nama").show();
              $("#namaForm").focus();
              
            } else {
              $("#ModalOTP").modal('show');
              if( t === 'login_success'){
                  location.reload();
              }
            }
          }, 
          error: function(t) { console.log( '___Error', t ) }
      });
    }

</script>

</body>
</html>
