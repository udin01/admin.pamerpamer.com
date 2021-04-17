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
  <link rel="stylesheet" href="{{ asset('onefamily/skins/default.css') }}"> 

  <!-- Theme Custom CSS -->
  <link rel="stylesheet" href="{{ asset('onefamily/css/custom.css') }}">

  <!-- Head Libs -->
  <script src="{{ asset('onefamily/vendor/modernizr/modernizr.min.js') }}"></script>
<link rel="stylesheet" href="3d-Ub/vendor/reset.min.css">
<link rel="stylesheet" href="3d-Ub/style.css">
</head>
<body class="single-scene loading-overlay-showing" data-plugin-page-transition data-loading-overlay data-plugin-options="{'hideDelay': 500}">

{{-- ######################################## --}}


{{-- ./######################################## --}}

<div id="pano"></div>

<div id="sceneList">
  <ul class="scenes">
    
      <a href="javascript:void(0)" class="scene" data-id="0-covervirtual">
        <!-- <li class="text">COVERVIRTUAL</li> -->
      </a>
    
  </ul>
</div>

<div id="titleBar">
  {{-- <h1 class="sceneName"></h1> --}}
</div>

<a href="javascript:void(0)" id="autorotateToggle">
  <img class="icon off" src="3d-Ub/img/play.png">
  <img class="icon on" src="3d-Ub/img/pause.png">
</a>

<a href="javascript:void(0)" id="fullscreenToggle">
  <img class="icon off" src="3d-Ub/img/fullscreen.png">
  <img class="icon on" src="3d-Ub/img/windowed.png">
</a>

<a href="javascript:void(0)" id="sceneListToggle">
  <img class="icon off" src="3d-Ub/img/expand.png">
  <img class="icon on" src="3d-Ub/img/collapse.png">
</a>

<a href="javascript:void(0)" id="viewUp" class="viewControlButton viewControlButton-1">
  <img class="icon" src="3d-Ub/img/up.png">
</a>
<a href="javascript:void(0)" id="viewDown" class="viewControlButton viewControlButton-2">
  <img class="icon" src="3d-Ub/img/down.png">
</a>
<a href="javascript:void(0)" id="viewLeft" class="viewControlButton viewControlButton-3">
  <img class="icon" src="3d-Ub/img/left.png">
</a>
<a href="javascript:void(0)" id="viewRight" class="viewControlButton viewControlButton-4">
  <img class="icon" src="3d-Ub/img/right.png">
</a>
<a href="javascript:void(0)" id="viewIn" class="viewControlButton viewControlButton-5">
  <img class="icon" src="3d-Ub/img/plus.png">
</a>
<a href="javascript:void(0)" id="viewOut" class="viewControlButton viewControlButton-6">
  <img class="icon" src="3d-Ub/img/minus.png">
</a>

<script src="3d-Ub/vendor/screenfull.min.js" ></script>
<script src="3d-Ub/vendor/bowser.min.js" ></script>
<script src="3d-Ub/vendor/marzipano.js" ></script>

<script src="3d-Ub/data.js"></script>
<script src="{{ asset('onefamily/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('onefamily/vendor/bootstrap/js/bootstrap.min.js') }}"></script>


<script>
  var APP_DATA = {
  "scenes": [
    {
      "id": "0-covervirtual",
      "name": "COVERVIRTUAL",
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
      "faceSize": 1520,
      "initialViewParameters": {
        //"pitch": 0,
        "pitch": 0.02265933811744425,
        //"yaw": 0,
        "yaw": 2.8782701386434706,
        "fov": 1.5707963267948966
      },
      "linkHotspots": [],
      "infoHotspots": [
        {
          "yaw": 2.8782701386434706,
          "pitch": 0.02265933811744425,
          "title": "MASUK&nbsp;",
          "text": "KLIK DISINI !",
          "link": "{{ env('APP_URL_HOME')}}"
        }
      ]
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

var currWidth = '';
var currHeight = '';


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
  var body = ''
  try {
    body = document.querySelector('.zoomDiv');
  } catch{}


  if( !currWidth && body){
    currWidth = body.clientWidth;
  }
  if( !currHeight && body){
    currHeight = body.clientHeight;
  }

  if( currHeight && currWidth ){
    if(setFlagZoom){
        setFlagZoom = 0
        
        body.style.width = (currWidth + 8) + "px";
        body.style.height = (currHeight + 8) + "px";

        // body.classList.add("showlink");
    } else {
        setFlagZoom = 1
        
        body.style.width = currWidth  + "px";
        body.style.height = currHeight + "px";

        //body.classList.remove("showlink");
    }
  }

}, 500);


setTimeout(function(){
$('.bg-form').show();
}, 3000);

</script>

<script src="3d-Ub/index.js"></script>


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
