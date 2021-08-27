<!DOCTYPE html>
<html>
<head>

   {{-- ================================ Title =============================== --}}
   @php
      $title = $title . ' ' . ucwords( env('APP_NAME') );
   @endphp
   <title>{{ $title }}</title>
   
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
   {{-- ================================ ./Title =============================== --}}


<meta charset="utf-8">
<meta name="viewport" content="target-densitydpi=device-dpi, width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, minimal-ui" />
<style> @-ms-viewport { width: device-width; } </style>
<link rel="stylesheet" href="{{ asset( $folder_asset.'/'.'vendor/reset.min.css')}}">
<link rel="stylesheet" href="{{ asset( $folder_asset.'/'.'style.css')}}">
</head>
<body class="single-scene ">

<div id="pano"></div>

{{-- ================================== Embed Vidio =============================== --}}
<div id="iframespot" data-source="">
  {{-- <iframe id="youtube" width="1780" height="980" src="https://www.youtube.com/embed/a4YjKmsXyds?rel=0&amp;controls=0&amp;showinfo=0&amp;" frameborder="0" allowfullscreen></iframe>' --}}
  {!! $txt->sambutan !!}
</div>
{{-- ================================ ./Embed Vidio =============================== --}}

{{-- ================================== Embed Event =============================== --}}
<div id="iframespotEvent" data-source="">
  {{-- <iframe id="youtube" width="1780" height="980" src="https://www.youtube.com/embed/a4YjKmsXyds?rel=0&amp;controls=0&amp;showinfo=0&amp;" frameborder="0" allowfullscreen></iframe>' --}}
  {!! $txt->event !!}
</div>
{{-- ================================ ./Embed Event =============================== --}}

<div id="sceneList">
  <ul class="scenes">
    
      <a href="javascript:void(0)" class="scene" data-id="0-dd">
         {{-- ================================ Title App =============================== --}}
         <li class="text">{{ $title }}</li>
         {{-- ================================ ./Title App =============================== --}}
      </a>
    
  </ul>
</div>

<div id="titleBar">
  <h1 class="sceneName"></h1>
</div>

<a href="javascript:void(0)" id="autorotateToggle">
  <img class="icon off" src="{{ asset( $folder_asset.'/'.'img/play.png')}}">
  <img class="icon on" src="{{ asset( $folder_asset.'/'.'img/pause.png')}}">
</a>

<a href="javascript:void(0)" id="fullscreenToggle">
  <img class="icon off" src="{{ asset( $folder_asset.'/'.'img/fullscreen.png')}}">
  <img class="icon on" src="{{ asset( $folder_asset.'/'.'img/windowed.png')}}">
</a>

<a href="javascript:void(0)" id="sceneListToggle">
  <img class="icon off" src="{{ asset( $folder_asset.'/'.'img/expand.png')}}">
  <img class="icon on" src="{{ asset( $folder_asset.'/'.'img/collapse.png')}}">
</a>

<a href="javascript:void(0)" id="viewUp" class="viewControlButton viewControlButton-1">
  <img class="icon" src="{{ asset( $folder_asset.'/'.'img/up.png')}}">
</a>
<a href="javascript:void(0)" id="viewDown" class="viewControlButton viewControlButton-2">
  <img class="icon" src="{{ asset( $folder_asset.'/'.'img/down.png')}}">
</a>
<a href="javascript:void(0)" id="viewLeft" class="viewControlButton viewControlButton-3">
  <img class="icon" src="{{ asset( $folder_asset.'/'.'img/left.png')}}">
</a>
<a href="javascript:void(0)" id="viewRight" class="viewControlButton viewControlButton-4">
  <img class="icon" src="{{ asset( $folder_asset.'/'.'img/right.png')}}">
</a>
<a href="javascript:void(0)" id="viewIn" class="viewControlButton viewControlButton-5">
  <img class="icon" src="{{ asset( $folder_asset.'/'.'img/plus.png')}}">
</a>
<a href="javascript:void(0)" id="viewOut" class="viewControlButton viewControlButton-6">
  <img class="icon" src="{{ asset( $folder_asset.'/'.'img/minus.png')}}">
</a>

<script src="{{ asset( $folder_asset.'/'.'vendor/screenfull.min.js')}}" ></script>
<script src="{{ asset( $folder_asset.'/'.'vendor/bowser.min.js')}}" ></script>
<script src="{{ asset( $folder_asset.'/'.'vendor/marzipano.js')}}" ></script>

{{-- <script src="{{ asset( $folder_asset.'/'.'data.js')}}"></script>
<script src="{{ asset( $folder_asset.'/'.'index.js')}}"></script> --}}

</body>


{{-- =============================== DATA.js ============================== --}}
<script>
   var APP_DATA = {
  "scenes": [
    {
      "id": "0-dd",
      "name": "{{ $title }}",
      // .{{-- =============================== edit ============================== --}}
      "levels": [
        {
          "tileSize": 256,
          "size": 256,
          "fallbackOnly": true
        },
        {
          "tileSize": 512,
          "size": 512
        }
      ],
      "faceSize": 300,
      "initialViewParameters": {
        "yaw": -0.037124167514429374,
        "pitch": -0.3677258876337728,
        "fov": 1.464319800919779
      },
      "linkHotspots": [],
      "infoHotspots": [

        /* {{--
        {
          "yaw": -0.10825452308336914,
          "pitch": -0.31923970416418257,
          "title": "{{ $txt->btn_enter }}",
          "text": "MASUK BOOTH<br>",
          "link": "{{ url('/home')  }}"
        }--}}
        */
        {
          "yaw": -0.5396933206314962,
          "pitch": -0.10389114276233613,
          "title": "PT METRODATA ELECTRONIC",
          "text": "Masuk Booth",
          "link": "{{ route('expoproperty_front.dev', ['id' => '9f9562c8-adf4-451c-8533-11b170bd3793']) }}"
        },
        {
          "yaw": 0.15256645570747374,
          "pitch": -0.11631744994312854,
          "title": "PT TORRECID INDONESIA",
          "text": "Masuk Booth",
          "link": "{{ route('expoproperty_front.dev', ['id' => 'a63cde99-57c2-44c8-b9f7-d5c71374f6a5']) }}"
        },
        {
          "yaw": 0.6543195229796162,
          "pitch": -0.20788468655146808,
          "title": "LOEKITO EDUCATION GROUP",
          "text": "Masuk Booth",
          "link": "{{ route('expoproperty_front.dev', ['id' => '1c38e064-506d-42be-8613-624e46fbf79d']) }}"
        },
        {
          "yaw": 1.208367049023785,
          "pitch": -0.21947634601988142,
          "title": "PT CITRA TUBINDO TBK",
          "text": "Masuk Booth",
          "link": "{{ route('expoproperty_front.dev', ['id' => '9205a8c1-7a5b-4957-be8c-355f34ddf1a4']) }}"
        },
        {
          "yaw": 1.6364968005598897,
          "pitch": -0.23754314957881562,
          "title": "SAMSUNG RESEARCH IINDONESIA",
          "text": "Masuk Booth",
          "link": "{{ route('expoproperty_front.dev', ['id' => '6881d608-90eb-47c3-a586-d86a48572125']) }}"
        },
        {
          "yaw": 2.1302320998623987,
          "pitch": -0.2262210752692546,
          "title": "PT MALINDO FEEDMIL",
          "text": "Masuk Booth",
          "link": "{{ route('expoproperty_front.dev', ['id' => '66a9a221-a943-4eba-aafb-4d72ecd51cf8']) }}"
        },
        {
          "yaw": 2.4701503066605195,
          "pitch": -0.04615261849161634,
          "title": "EPSON",
          "text": "Masuk Booth",
          "link": "{{ route('expoproperty_front.dev', ['id' => '2bf3c81e-8eab-4b28-8360-277bb6d9f9b2']) }}"
        },
        {
          "yaw": 2.7984758534953986,
          "pitch": -0.06279176834192413,
          "title": "PARAGON TECHNOLOGI AND INNOVATION",
          "text": "Masuk Booth",
          "link": "{{ route('expoproperty_front.dev', ['id' => 'e6c6970d-ce5b-44fb-9d4a-1c502d5fe0ea']) }}"
        },
        {
          "yaw": -3.0411285520012417,
          "pitch": -0.06448044386871388,
          "title": "PT BUMITAMA GUNAJAYA AGRO",
          "text": "Masuk Booth",
          "link": "{{ route('expoproperty_front.dev', ['id' => 'b59e62b1-e889-4f01-8e8a-3a88383c7f93']) }}"
        },
        {
          "yaw": -2.6236528823505676,
          "pitch": -0.06928277595631727,
          "title": "ADIS DIMENSION FOOTWEAR",
          "text": "Masuk Booth",
          "link": "{{ route('expoproperty_front.dev', ['id' => '76178981-7ec0-4290-b7a1-a82b1a004e93']) }}"
        },
        {
          "yaw": -2.377527817741896,
          "pitch": -0.2160290308550632,
          "title": "BANK CIMB NIAGA",
          "text": "Masuk Booth",
          "link": "{{ route('expoproperty_front.dev', ['id' => 'ebaac395-7646-48dd-a88b-03e70ae0b885']) }}"
        },
        {
          "yaw": -1.9322761969181705,
          "pitch": -0.24619948365573308,
          "title": "ASIAN AGRI",
          "text": "Masuk Booth",
          "link": "{{ route('expoproperty_front.dev', ['id' => '0861e22b-1715-4a84-8489-32ffbce3dd48']) }}"
        },
        {
          "yaw": -1.4172231023813033,
          "pitch": -0.24052469248345965,
          "title": "ASTRA CREDIT CAOMPANIES",
          "text": "Masuk Booth",
          "link": "{{ route('expoproperty_front.dev', ['id' => 'aa3c47bb-be5c-409e-bfa9-139dc1802b2c']) }}"
        },
        {
          "yaw": -1.0121988095642607,
          "pitch": -0.2371423658665357,
          "title": "PT WINGS SURYA",
          "text": "Masuk Booth",
          "link": "{{ route('expoproperty_front.dev', ['id' => '31d358f4-4768-4181-9843-572214907ca5']) }}"
        }
        // {
        //   "yaw": 0.36624630626879195,
        //   "pitch": -0.5159903329205466,
        //   "title": "SAMBUTAN REKTOR<br>",
        //   "text": "UNIVERSITAS BRAWIJAYA<br>"
        // }
      ]
    }
  ],
  "name": "{{ $title }}",
  // .{{-- =============================== edit ============================== --}}
  "settings": {
    "mouseViewMode": "drag",
    "autorotateEnabled": false,
    "fullscreenButton": false,
    "viewControlButtons": false
  }
};
</script>


<style>
   .zoom-in-out-box {
      animation: zoom-in-zoom-out 1s ease infinite;
   }

   @keyframes zoom-in-zoom-out {
      0% {
         transform: scale(1, 1);
      }
      50% {
         transform: scale(1.2, 1.2);
      }
      100% {
         transform: scale(1, 1);
      }
   }
</style>
{{-- =============================== ./DATA.js ============================== --}}




{{-- =============================== INDEX.js ============================== --}}
<script>
'use strict';

// Definis Location
if (!window.loctionFile) {
  window.loctionFile =  '{{ $folder_asset }}/';
}
// ./Definis Location
// .{{-- =============================== edit ============================== --}}

(function() {
  var Marzipano = window.Marzipano;
  var bowser = window.bowser;
  var screenfull = window.screenfull;
  var data = window.APP_DATA;

  // Grab elements from DOM.
  var panoElement = document.querySelector('#pano');
  var sceneNameElement = document.querySelector('#titleBar .sceneName');
  var sceneListElement = document.querySelector('#sceneList');
  var sceneElements = document.querySelectorAll('#sceneList .scene');
  var sceneListToggleElement = document.querySelector('#sceneListToggle');
  var autorotateToggleElement = document.querySelector('#autorotateToggle');
  var fullscreenToggleElement = document.querySelector('#fullscreenToggle');

  // Detect desktop or mobile mode.
  if (window.matchMedia) {
    var setMode = function() {
      if (mql.matches) {
        document.body.classList.remove('desktop');
        document.body.classList.add('mobile');
      } else {
        document.body.classList.remove('mobile');
        document.body.classList.add('desktop');
      }
    };
    var mql = matchMedia("(max-width: 500px), (max-height: 500px)");
    setMode();
    mql.addListener(setMode);
  } else {
    document.body.classList.add('desktop');
  }

  // Detect whether we are on a touch device.
  document.body.classList.add('no-touch');
  window.addEventListener('touchstart', function() {
    document.body.classList.remove('no-touch');
    document.body.classList.add('touch');
  });

  // Use tooltip fallback mode on IE < 11.
  if (bowser.msie && parseFloat(bowser.version) < 11) {
    document.body.classList.add('tooltip-fallback');
  }

  // Viewer options.
  var viewerOpts = {
    controls: {
      mouseViewMode: data.settings.mouseViewMode
    }
  };

  // Initialize viewer.
  var viewer = new Marzipano.Viewer(panoElement, viewerOpts);

  // Create scenes.
  var scenes = data.scenes.map(function(data) {
     
    var urlPrefix = window.loctionFile+"tiles";
    // .{{-- =============================== edit ============================== --}}
    var source = Marzipano.ImageUrlSource.fromString(
      urlPrefix + "/" + data.id + "/{z}/{f}/{y}/{x}.jpg",
      { cubeMapPreviewUrl: urlPrefix + "/" + data.id + "/preview.jpg" });
    var geometry = new Marzipano.CubeGeometry(data.levels);

    var limiter = Marzipano.RectilinearView.limit.traditional(data.faceSize, 100*Math.PI/180, 120*Math.PI/180);
    var view = new Marzipano.RectilinearView(data.initialViewParameters, limiter);

    var scene = viewer.createScene({
      source: source,
      geometry: geometry,
      view: view,
      pinFirstLevel: true
    });

    
   // .{{-- =============================== edit ============================== --}}
   // Display scene.
   scene.switchTo();
   
   // Get the hotspot container for scene.
   var container = scene.hotspotContainer();

   // Create hotspot with different sources.
   container.createHotspot(
     document.getElementById('iframespot'),
    //  { yaw: 1.5705, pitch: 0.002 },
    {
        yaw: 0.340,
        // pitch: -0.5159903329205466
        pitch: -0.54,
    }, { 
      perspective: { 
        radius: 740,
        extraTransforms: "rotateY(17deg) rotateX(27deg) rotateZ(9deg)",
      }
    } );

    container.createHotspot(
     document.getElementById('iframespotEvent'),
    {
        yaw: -0.3464689031477839,
        pitch: -0.54,
    }, { 
      perspective: { 
        radius: 740,
        extraTransforms: "rotateY(-20deg) rotateX(20deg) rotateZ(351deg)",
      }
    } );


   // HTML sources.
   var hotspotHtml = {
      youtube: '<iframe id="youtube" width="1280" height="480" src="https://www.youtube.com/embed/a4YjKmsXyds?rel=0&amp;controls=0&amp;showinfo=0&amp;" frameborder="0" allowfullscreen></iframe>',
      youtubeWithControls: '<iframe id="youtubeWithControls" width="1280" height="480" src="https://www.youtube.com/embed/a4YjKmsXyds?rel=0&amp;controls=1&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>'
   };

   // .{{-- =============================== ./edit ============================== --}}

    // Create link hotspots.
    data.linkHotspots.forEach(function(hotspot) {
      var element = createLinkHotspotElement(hotspot);
      scene.hotspotContainer().createHotspot(element, { yaw: hotspot.yaw, pitch: hotspot.pitch });
    });

    // Create info hotspots.
    data.infoHotspots.forEach(function(hotspot) {
      var element = createInfoHotspotElement(hotspot);
      scene.hotspotContainer().createHotspot(element, { yaw: hotspot.yaw, pitch: hotspot.pitch });
    });

    return {
      data: data,
      scene: scene,
      view: view
    };
  });

  // Set up autorotate, if enabled.
  var autorotate = Marzipano.autorotate({
    yawSpeed: 0.03,
    targetPitch: 0,
    targetFov: Math.PI/2
  });
  if (data.settings.autorotateEnabled) {
    autorotateToggleElement.classList.add('enabled');
  }

  // Set handler for autorotate toggle.
  autorotateToggleElement.addEventListener('click', toggleAutorotate);

  // Set up fullscreen mode, if supported.
  if (screenfull.enabled && data.settings.fullscreenButton) {
    document.body.classList.add('fullscreen-enabled');
    fullscreenToggleElement.addEventListener('click', function() {
      screenfull.toggle();
    });
    screenfull.on('change', function() {
      if (screenfull.isFullscreen) {
        fullscreenToggleElement.classList.add('enabled');
      } else {
        fullscreenToggleElement.classList.remove('enabled');
      }
    });
  } else {
    document.body.classList.add('fullscreen-disabled');
  }

  // Set handler for scene list toggle.
  sceneListToggleElement.addEventListener('click', toggleSceneList);

  // Start with the scene list open on desktop.
  if (!document.body.classList.contains('mobile')) {
    showSceneList();
  }

  // Set handler for scene switch.
  scenes.forEach(function(scene) {
    var el = document.querySelector('#sceneList .scene[data-id="' + scene.data.id + '"]');
    el.addEventListener('click', function() {
      switchScene(scene);
      // On mobile, hide scene list after selecting a scene.
      if (document.body.classList.contains('mobile')) {
        hideSceneList();
      }
    });
  });

  // DOM elements for view controls.
  var viewUpElement = document.querySelector('#viewUp');
  var viewDownElement = document.querySelector('#viewDown');
  var viewLeftElement = document.querySelector('#viewLeft');
  var viewRightElement = document.querySelector('#viewRight');
  var viewInElement = document.querySelector('#viewIn');
  var viewOutElement = document.querySelector('#viewOut');

  // Dynamic parameters for controls.
  var velocity = 0.7;
  var friction = 3;

  // Associate view controls with elements.
  var controls = viewer.controls();
  controls.registerMethod('upElement',    new Marzipano.ElementPressControlMethod(viewUpElement,     'y', -velocity, friction), true);
  controls.registerMethod('downElement',  new Marzipano.ElementPressControlMethod(viewDownElement,   'y',  velocity, friction), true);
  controls.registerMethod('leftElement',  new Marzipano.ElementPressControlMethod(viewLeftElement,   'x', -velocity, friction), true);
  controls.registerMethod('rightElement', new Marzipano.ElementPressControlMethod(viewRightElement,  'x',  velocity, friction), true);
  controls.registerMethod('inElement',    new Marzipano.ElementPressControlMethod(viewInElement,  'zoom', -velocity, friction), true);
  controls.registerMethod('outElement',   new Marzipano.ElementPressControlMethod(viewOutElement, 'zoom',  velocity, friction), true);

  function sanitize(s) {
    return s.replace('&', '&amp;').replace('<', '&lt;').replace('>', '&gt;');
  }

  function switchScene(scene) {
    stopAutorotate();
    scene.view.setParameters(scene.data.initialViewParameters);
    scene.scene.switchTo();
    startAutorotate();
    updateSceneName(scene);
    updateSceneList(scene);
  }

  function updateSceneName(scene) {
    sceneNameElement.innerHTML = sanitize(scene.data.name);
  }

  function updateSceneList(scene) {
    for (var i = 0; i < sceneElements.length; i++) {
      var el = sceneElements[i];
      if (el.getAttribute('data-id') === scene.data.id) {
        el.classList.add('current');
      } else {
        el.classList.remove('current');
      }
    }
  }

  function showSceneList() {
    sceneListElement.classList.add('enabled');
    sceneListToggleElement.classList.add('enabled');
  }

  function hideSceneList() {
    sceneListElement.classList.remove('enabled');
    sceneListToggleElement.classList.remove('enabled');
  }

  function toggleSceneList() {
    sceneListElement.classList.toggle('enabled');
    sceneListToggleElement.classList.toggle('enabled');
  }

  function startAutorotate() {
    if (!autorotateToggleElement.classList.contains('enabled')) {
      return;
    }
    viewer.startMovement(autorotate);
    viewer.setIdleMovement(3000, autorotate);
  }

  function stopAutorotate() {
    viewer.stopMovement();
    viewer.setIdleMovement(Infinity);
  }

  function toggleAutorotate() {
    if (autorotateToggleElement.classList.contains('enabled')) {
      autorotateToggleElement.classList.remove('enabled');
      stopAutorotate();
    } else {
      autorotateToggleElement.classList.add('enabled');
      startAutorotate();
    }
  }

  function createLinkHotspotElement(hotspot) {

    // Create wrapper element to hold icon and tooltip.
    var wrapper = document.createElement('div');
    wrapper.classList.add('hotspot');
    wrapper.classList.add('link-hotspot');

    // Create image element.
    var icon = document.createElement('img');
    icon.src = window.loctionFile+'img/link.png';
    // .{{-- =============================== edit ============================== --}}
    icon.classList.add('link-hotspot-icon');

    // Set rotation transform.
    var transformProperties = [ '-ms-transform', '-webkit-transform', 'transform' ];
    for (var i = 0; i < transformProperties.length; i++) {
      var property = transformProperties[i];
      icon.style[property] = 'rotate(' + hotspot.rotation + 'rad)';
    }

    // Add click event handler.
    wrapper.addEventListener('click', function() {
      switchScene(findSceneById(hotspot.target));
    });

    // Prevent touch and scroll events from reaching the parent element.
    // This prevents the view control logic from interfering with the hotspot.
    stopTouchAndScrollEventPropagation(wrapper);

    // Create tooltip element.
    var tooltip = document.createElement('div');
    tooltip.classList.add('hotspot-tooltip');
    tooltip.classList.add('link-hotspot-tooltip');
    tooltip.innerHTML = findSceneDataById(hotspot.target).name;

    wrapper.appendChild(icon);
    wrapper.appendChild(tooltip);

    return wrapper;
  }

  function createInfoHotspotElement(hotspot) {

    // Create wrapper element to hold icon and tooltip.
    var wrapper = document.createElement('div');
    var wrapper = document.createElement('a');
    wrapper.href = hotspot.link
    // .{{-- =============================== edit ============================== --}}
    wrapper.classList.add('hotspot');
    wrapper.classList.add('info-hotspot');

    // Create hotspot/tooltip header.
    var header = document.createElement('div');
   header.classList.add('info-hotspot-header');
   header.classList.add('zoom-in-out-box');
   // .{{-- =============================== edit ============================== --}}

    // Create image element.
    var iconWrapper = document.createElement('div');
    iconWrapper.classList.add('info-hotspot-icon-wrapper');
    var icon = document.createElement('img');

    icon.src = window.loctionFile+'img/info.png';
    icon.classList.add('info-hotspot-icon');
    iconWrapper.appendChild(icon);

    // Create title element.
    var titleWrapper = document.createElement('div');
    titleWrapper.classList.add('info-hotspot-title-wrapper');
    var title = document.createElement('div');
    title.classList.add('info-hotspot-title');
    title.innerHTML = hotspot.title;
    titleWrapper.appendChild(title);

    // Create close element.
    var closeWrapper = document.createElement('div');
    closeWrapper.classList.add('info-hotspot-close-wrapper');
    var closeIcon = document.createElement('img');

    closeIcon.src = window.loctionFile+'img/close.png';
    // .{{-- =============================== edit ============================== --}}
    closeIcon.classList.add('info-hotspot-close-icon');
    closeWrapper.appendChild(closeIcon);

    // Construct header element.
    header.appendChild(iconWrapper);
    header.appendChild(titleWrapper);
    header.appendChild(closeWrapper);

    // Create text element.
    var text = document.createElement('div');
    text.classList.add('info-hotspot-text');
    text.innerHTML = hotspot.text;

    // Place header and text into wrapper element.
    wrapper.appendChild(header);
    wrapper.appendChild(text);

    // Create a modal for the hotspot content to appear on mobile mode.
    var modal = document.createElement('div');
    modal.innerHTML = wrapper.innerHTML;
    modal.classList.add('info-hotspot-modal');
    document.body.appendChild(modal);

    var toggle = function() {
      wrapper.classList.toggle('visible');
      modal.classList.toggle('visible');
    };

    // Show content when hotspot is clicked.
    wrapper.querySelector('.info-hotspot-header').addEventListener('click', toggle);

    // Hide content when close icon is clicked.
    modal.querySelector('.info-hotspot-close-wrapper').addEventListener('click', toggle);

    // Prevent touch and scroll events from reaching the parent element.
    // This prevents the view control logic from interfering with the hotspot.
    stopTouchAndScrollEventPropagation(wrapper);

    return wrapper;
  }

  // Prevent touch and scroll events from reaching the parent element.
  function stopTouchAndScrollEventPropagation(element, eventList) {
    var eventList = [ 'touchstart', 'touchmove', 'touchend', 'touchcancel',
                      'wheel', 'mousewheel' ];
    for (var i = 0; i < eventList.length; i++) {
      element.addEventListener(eventList[i], function(event) {
        event.stopPropagation();
      });
    }
  }

  function findSceneById(id) {
    for (var i = 0; i < scenes.length; i++) {
      if (scenes[i].data.id === id) {
        return scenes[i];
      }
    }
    return null;
  }

  function findSceneDataById(id) {
    for (var i = 0; i < data.scenes.length; i++) {
      if (data.scenes[i].id === id) {
        return data.scenes[i];
      }
    }
    return null;
  }

  // Display the initial scene.
  switchScene(scenes[0]);

})();

</script>
{{-- =============================== ./INDEX.js ============================== --}}

</html>
