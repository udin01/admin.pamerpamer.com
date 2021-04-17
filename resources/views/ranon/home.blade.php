@extends( $base['thema_lock'].'master' )

@section('title_admin')
  @if( isset($base['regional']) )
    {!! $base['regional']->name !!} | 
  @endif
  {{ $baseApp['title'] }}
@endsection

@section('style_css')
<style>
 @media (max-width: 768px){
  .video-bg .video-foreground, .video-background iframe {
    height: calc(100vw/1.77);
    top: calc(20vh/2);
  }
}
</style>
@endsection



@section('preloader')
  @if( !isset($base['welcomeOff']) )
    <div class="preloader">
      <div class="layer"></div>
      <div class="inner">
        <figure> <img loading="lazy" src="{{ env('URL_ENDPOINT').$baseApp['loader'] }}" alt="Image"> </figure>
        <span class="typewriter" id="typewriter"></span>
      </div>
      <!-- end inner -->
    </div>
  @endif
@endsection

@section ('welcome')
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

    {{-- <div class="inner-content"> --}}
    <div class="video-bg">
      <div class="video-background">
          <div class="video-foreground video-selector">
          @php
          if( !substr_count( $baseApp['yt_welcome'], "<iframe") ){
            $baseApp['yt_welcome'] = str_replace(" ","", $baseApp['yt_welcome']);
            
            $urlVid = (substr_count( $baseApp['yt_welcome'], "https://") ) ? $baseApp['yt_welcome'] : "https://".$baseApp['yt_welcome'];
            $baseApp['yt_welcome'] = '<iframe id="iframe1" src="'.$urlVid.'?autoplay=1&controls=0&showinfo=0&rel=0&loop=1" frameborder="0" name="youtube embed" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
          }
          @endphp

            @if( $base['vid'] )
                {!!  $baseApp['yt_welcome'] !!}
            @else
                {{-- {!! str_replace("autoplay=1","autoplay=0", $baseApp['yt_welcome'] ) !!} --}}
            @endif
          </div>
      </div>
          <div class="inner" style="position: absolute;bottom: 5%;">
            <div class="container">
                <h4 class="text-light">Indonesian Property Expo 2020<h4>
                <h6>Connecting People from One Device to The World and Watch Daily Live Everyday</h6>
            </div>
            <!-- end container -->
          </div>
        <!-- end inner -->
    </div>

    <!-- end video-bg -->
  </header>
@endsection


@section ('content')
    <section class="works">
      <div class="container">
        <div class="works-title wow fadeIn">
          {!! $baseApp['text_showcase'] !!}
        </div>
        <!-- end works-title -->
      </div>
    </section>

    @if( isset($base['regional']) )
     <section class="works pt-0" style="margin-bottom: 2em;">
      <div class="container text-center">
        <div class="works-title wow fadeIn text-center w-100" style="margin:auto;">
          <div style="border-bottom: 1px solid #000000;"></div>
          <h3 style="margin-top: -15px;">
            <b style="padding: 0 15px;background: #ffff;">{!! $base['regional']->name !!}</b>
          </h3>
        </div>
        <!-- end works-title -->
      </div>
    </section>
    @endif
  
    <section class="side-content-block bg-image" data-background="{{ env('URL_ENDPOINT').$baseApp['bg_showcase'] }}" style="background-attachment: unset;">
    <div class="container" style="
          padding-left: 0px !important;
          padding-right: 0px !important;
          margin-left: 0px !important;
          margin-right: 0px !important;
          max-width: 100%;
        ">
      <div class="inner w-100" id="inner-courusel">
        <div class="holder wow fadeIn mt-6  mb-5" style="max-width: 100%;"> 
            
                <div class="row justify-content-md-center">
                    <div class="col-12">
                  

                  <div id="carouselbooth" data-carousel-3d >
                     @foreach ( $perumahan as $KeyDev => $VDev)
                            @if($VDev->img_booth)
                              {{-- <a href="{{ route('expoproperty_front.dev', ['id' => $VDev->uuid ]) }}"> --}}
                              <img class="d-block w-100 img-booth" src="{{ env('URL_ENDPOINT').$VDev->img_booth }}" alt="{{ $VDev->name }}" @if($KeyDev == 0) selected @endif onclick="document.location='{{ route('expoproperty_front.dev', ['id' => $VDev->uuid ]) }}';return false;" >
                              {{-- </a> --}}
                            @else
                              {{-- <a href="{{ route('expoproperty_front.dev', ['id' => $VDev->uuid ]) }}"> --}}
                                 <img class="d-block w-100" src="{{ env('URL_ENDPOINT').$base['logo'] }}" alt="{{ $VDev->name }}" @if($KeyDev == 0) selected @endif  onclick="document.location='{{ route('expoproperty_front.dev', ['id' => $VDev->uuid ]) }}';return false;" >
                              {{-- </a> --}}
                            @endif
                    @endforeach
                </div>
                <style>
                #inner-courusel{
                  margin: 150px 0 -15px 0;
                  padding: unset;
                }
                #carouselbooth{
                  background: none !important;
                  border: none !important;
                  margin: auto;
                }
                .img-booth{
                  cursor: pointer;
                }
                [data-child-frame] {
                  border: none !important;
                }
              [data-carousel-3d] [data-children-wrapper] {
                width: 100%;
                margin: auto;
                right: 0;
                left: 0;
              }
              /* 
              [data-carousel-3d] > [data-children-wrapper] > [data-child] {
                width: 150%;
              }
              [data-content-wrapper] > img {
                width: 100% !important;
              }
              [data-content-wrapper] {
                width: 100% !important;
              }
              */
              @media (max-width: 768px){

                #carouselbooth {
                  height: 200%;
                }
                #inner-courusel{
                  margin: 0 0 50% 0;
                  padding: unset;
                }
              }

                </style>



                {{-- <div id="carouselbooth" class="carousel slide" data-ride="carousel" >
                        <ol class="carousel-indicators" style="bottom: -30px;">
                          @for ($i = 0 ; $i < count($perumahan); $i++)
                            <li data-target="#carouselbooth" data-slide-to="0" @if($i == 0)class="active"@endif></li>
                          @endfor
                        </ol>
                        <div class="carousel-inner" style="position: relative;width: 80%;overflow: hidden;text-align: center;margin: auto;">

                          @foreach ( $perumahan as $KeyDev => $VDev)
                            @if($VDev->img_booth)
                            <div class="carousel-item @if($KeyDev == 0) active @endif">
                              <a href="{{ route('expoproperty_front.dev', ['id' => $VDev->uuid ]) }}">
                                 <img loading="lazy" class="d-block w-100" src="{{ env('URL_ENDPOINT').$VDev->img_booth }}" alt="{{ $VDev->name }}">
                              </a>
                            </div>
                            @else
                            <div class="carousel-item @if($KeyDev == 0) active @endif">
                              <a href="{{ route('expoproperty_front.dev', ['id' => $VDev->uuid ]) }}">
                                 <img loading="lazy" class="d-block w-100" src="{{ env('URL_ENDPOINT').$base['logo'] }}" alt="{{ $VDev->name }}">
                              </a>
                            </div>
                            @endif
                          @endforeach

                        </div>
                        <a class="carousel-control-prev" href="#carouselbooth" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselbooth" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div> --}}
                    </div>
                  </div>
        </div>
        <!-- end holder --> 
      </div>
      <!-- end inner --> 
      </div>
      <!-- end container -->
    </section>

    {{-- <section class="clients" style="background-color: #313434;">
      <div class="container wow fadeIn text-light">
        <h6>Developers & Sponsors</h6>
        <h2>Participating</h2>
        <ul>
          
          @foreach ( $perumahan as $kDev => $vDev )
              @if($vDev->img_pic)
                  <li class="wow fadeIn" data-wow-delay="0.{{ $kDev }}s" style="border:none;">
                    <figure><img loading="lazy" src="{{ env('URL_ENDPOINT').$vDev->img_pic }}" alt="{{ $vDev->name }}">
                      <h6>{{ $vDev->name }}</h6>
                    </figure>
                  </li>
              @endif
          @endforeach
          <style>
          .clients ul:before {
            background: none;
          }
          </style>
          
        </ul>
      </div>
    </section> --}}

    @if( !isset($base['regional']) )
    <section class="services-content-block" style="background: none;">
      <div class="container">
        <div class="works-title wow fadeIn text-center">
          <h2>Wilayah</h2>
          <br/>
        </div>
        
      <div class="row">

      @foreach ( $categorie as $kCat => $vCat )
            <div class="col-md-4 wow fadeIn my-3 text-center">

              <a href="{{ route('expoproperty_front.regionalSlug', ['slug' => $vCat->seo_url_slug_en ]) }}?vid=1">
              {{-- <div class="content-box" style="background: #bbb;"> --}}
              <div class="content-box text-center pb-1 pt-4">
                <figure><img loading="lazy" src="{{ env('URL_ENDPOINT').$vCat->icon }}" alt="{{ $vCat->name }}"></figure>
                <h5 class="text-center w-100">{{ $vCat->name }}</h5>
              </div>
              </a>

            </div>
      @endforeach
        
        </div>
      </div>
    </section>
    @endif

    <section class="services-content-block" style="background: none;">
      <div class="container">
       <div class="works-title wow fadeIn">
          <h2>Participating Developers</h2>
        </div>
      <div class="row">

      @foreach ( $perumahan as $kPer => $vPer )
          @if($vPer->img_pic && $vPer->id !== 1)
                <div class="col-md-3 wow fadeIn my-3">

                  <a href="{{ route('expoproperty_front.dev', ['id' => $vPer->uuid ]) }}">
                  {{-- <div class="content-box" style="background: #bbb;"> --}}
                  <div class="content-box py-3">
                    <figure><img loading="lazy" src="{{ env('URL_ENDPOINT').$vPer->img_pic }}" alt="{{ $vPer->name }}"></figure>
                  </div>
                  </a>

                </div>
          @endif
      @endforeach
        
        </div>
        <!-- end row -->
      </div>
      <!-- end container -->
    </section>

    <section class="works-single pt-2">
      <div class="container text-center">
        <div class="works-title wow fadeIn text-center" style="margin: auto;">
          <h2>Sponsors</h2>
        </div>
      </div>
        <ul style="text-align: center; margin: auto;">
         @foreach ( $sponsor as $kSponsor => $vSponsor )
            @if($vSponsor->img_pic)

            @if($kSponsor == 0 )
              <div class="row">
            @endif

                  <li class="wow fadeIn col-md-6" data-wow-delay="0s"
                  @if($kSponsor == 0 ) style="margin: auto;width: auto;" @endif
                  >
                    <a href="{{ route('expoproperty_front.dev', ['id' => '37584c05-c679-4629-ae25-3388ecf0f313' ]) }}">
                    <img loading="lazy" @if($kSponsor == 0 ) class="w-70" @endif src="{{ env('URL_ENDPOINT').$vSponsor->img_pic }}" alt="{{ $vSponsor->name }}">
                    </a>
                  </li>
            @if($kSponsor == 0 )
              </div>
            @endif

            @endif
        @endforeach
          </ul>
      </section>
    
  
    <section class="works-single py-0">
      <div class="container text-center">
        <div class="works-title wow fadeIn text-center" style="margin: auto;">
          <h2>Event</h2>
        </div>
      </div>

      <div class="container text-right">
      <button class="btn btn-small text-white"
        onclick="$('#myCarousel').carousel('prev');return false;"
        style="border-radius: 0;background: #878d94;">
          <i class="fa fa-chevron-circle-left"></i>
      </button>
      <button class="btn btn-small text-white"
        onclick="$('#myCarousel').carousel('next');return false;"
        style="margin-left: -4px;border-radius: 0;background: #878d94;">
            <i class="fa fa-chevron-circle-right"></i>
      </button>
      </div>
    </section>
     <section class="icon-content-block" id="myCarousel" class="carousel slide" data-ride="carousel">


     {{-- ##### --}}

          <div class="carousel-inner row w-100 mx-auto">

            @foreach ( $event as $kevent => $vevent )
            <div class="carousel-item col-md-4 my-2 @if($kevent == 0) active @endif">
              <div class="card">
                @if($vevent->img_pic)
                <a href="{{ route('expoproperty_front.event', ['id' => $vevent->uuid ]) }}">
                  <img class="card-img-top img-fluid" loading="lazy" src="{{ env('URL_ENDPOINT').$vevent->img_pic }}" alt="{{ $vevent->name }}">
                </a>
                @endif

                <div class="card-body">

                <a href="{{ route('expoproperty_front.event', ['id' => $vevent->uuid ]) }}">
                  <h4 class="card-title">{{ $vevent->name }} </h4>
                  <p class="card-text"><i>{{ $vevent->speaker }} </i> <br/>{{ $vevent->tema }} </p>
                  <p class="card-text"><small class="text-muted">{{ $vevent->start_event }}</small></p>
                </a>

                </div>
              </div>
            </div>
            @endforeach

          </div>
        

     {{-- ./##### --}}

       {{-- <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="row">

      @foreach ( $event as $kevent => $vevent )
          <div class="content-box wow fadeIn" data-wow-delay="0s" onclick="window.location.href = '{{ route('expoproperty_front.event', ['id' => $vevent->uuid ]) }}';" style="cursor: pointer;">
            @if($vevent->img_pic)
              <figure>
              <img loading="lazy" class="w-100 h-100" src="{{ env('URL_ENDPOINT').$vevent->img_pic }}" alt="{{ $vevent->name }}">
              </figure>
            @endif
            <h4>{{ $vevent->name }} / {{ $vevent->tema }} </h4>
            <p>
           {{ $vevent->speaker }}  <br/>
           {{ $vevent->start_event }} - {{ $vevent->end_event }}
            </p>
            <a href="{{ route('expoproperty_front.event', ['id' => $vevent->uuid ]) }}">
              <img loading="lazy" src="{{ asset('assets/images/icon-dots.svg') }}" alt="{{ $vevent->name }}">
            </a>
          </div>
      @endforeach

      </div>
      </div>
      </div> --}}

    </section>
    <style>
      @media (min-width: 768px) {
          /* show 3 items */
          .carousel-inner .active,
          .carousel-inner .active + .carousel-item,
          .carousel-inner .active + .carousel-item + .carousel-item {
            display: block;
          }

          .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left),
          .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item,
          .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item + .carousel-item {
            transition: none;
          }

          .carousel-inner .carousel-item-next,
          .carousel-inner .carousel-item-prev {
            position: relative;
            transform: translate3d(0, 0, 0);
          }

          .carousel-inner .active.carousel-item + .carousel-item + .carousel-item + .carousel-item {
            position: absolute;
            top: 0;
            right: -33.3333%;
            z-index: -1;
            display: block;
            visibility: visible;
          }

          /* left or forward direction */
          .active.carousel-item-left + .carousel-item-next.carousel-item-left,
          .carousel-item-next.carousel-item-left + .carousel-item,
          .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item,
          .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item + .carousel-item {
            position: relative;
            transform: translate3d(-100%, 0, 0);
            visibility: visible;
          }

          /* farthest right hidden item must be abso position for animations */
          .carousel-inner .carousel-item-prev.carousel-item-right {
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
            display: block;
            visibility: visible;
          }

          /* right or prev direction */
          .active.carousel-item-right + .carousel-item-prev.carousel-item-right,
          .carousel-item-prev.carousel-item-right + .carousel-item,
          .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item,
          .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item + .carousel-item {
            position: relative;
            transform: translate3d(100%, 0, 0);
            visibility: visible;
            display: block;
            visibility: visible;
          }
        }

    </style>

@endsection

@section ('link_js')
<script>


  $(document).ready(function() {

    $("#myCarousel").on("slide.bs.carousel", function(e) {
    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 3;
    var totalItems = $(".carousel-item").length;

    if (idx >= totalItems - (itemsPerSlide - 1)) {
      var it = itemsPerSlide - (totalItems - idx);
      for (var i = 0; i < it; i++) {
        // append slides to end
        if (e.direction == "left") {
          $(".carousel-item")
            .eq(i)
            .appendTo(".carousel-inner");
        } else {
          $(".carousel-item")
            .eq(0)
            .appendTo($(this).find(".carousel-inner"));
        }
      }
    }
  });

        let hight = alertSize();
        let flagPic = true;
        let pauseCorusel = false;

        /*
        $(window).scroll(function (event) {
            var scroll = $(window).scrollTop();

            if( scroll >= hight && flagPic){
              flagPic = false;
              $('#pic-bg').show();
              $('.video-foreground').appendTo("#pic-to-pic");
            }
            if( scroll <= hight && !flagPic){
              flagPic = true;
              $('#pic-bg').hide();
              $('.video-foreground').appendTo(".video-background");
            }
            // Do something
        });
        */

        $('#carouselbooth').hover(function(){
            pauseCorusel = true;
          }, function(){
            pauseCorusel = false;
        });
        setInterval(function(){
          // $('#carouselbooth').Carousel3d('prev');
          if( !pauseCorusel ){
            $('#carouselbooth').Carousel3d('next');
          }
        }, 3000);

    });
</script>
@endsection