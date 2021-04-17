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


@section ('welcome')
{{-- @if( !isset($base['regional']) )
<div class="embed-responsive embed-responsive-16by9">
    @php
    if( !substr_count( $baseApp['yt_welcome'], "<iframe") ){
      $baseApp['yt_welcome'] = str_replace(" ","", $baseApp['yt_welcome']);
      
      $urlVid = (substr_count( $baseApp['yt_welcome'], "https://") ) ? $baseApp['yt_welcome'] : "https://".$baseApp['yt_welcome'];
      $baseApp['yt_welcome'] = '<iframe id="iframe1" src="'.$urlVid.'?autoplay=1&controls=0&showinfo=0&rel=0&loop=1" frameborder="0" name="youtube embed" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen"></iframe>';
    }
    @endphp

      @if( $base['vid'] )
          {!!  $baseApp['yt_welcome'] !!}
      @else
          {{-!- {!! str_replace("autoplay=1","autoplay=0", $baseApp['yt_welcome'] ) !!} -!-}}
      @endif
  {{-!- <iframe frameborder="0" allowfullscreen="" src="//www.youtube.com/embed/l-epKcOA7RQ?showinfo=0&amp;wmode=opaque"></iframe> -!-}}
  <p class="custom-font-secondary custom-font-size-1 mb-0 pb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1600">Connecting People from One Device to The World and Watch Daily Live Everyday</p>
</div>
@endif --}}

    <div class="slider-container rev_slider_wrapper" style="height: 100vh;">
					<div id="revolutionSlider" class="slider rev_slider manual" data-version="5.4.8">
						<ul>

							<li data-transition="fade">
              
								<img
                  src="{{ env('URL_ENDPOINT').$baseApp['bg_login'] }}"
									alt=""
									data-bgposition="center center" 
									data-bgfit="cover" 
									data-bgrepeat="no-repeat" 
									class="rev-slidebg">

							    {{-- <div class="tp-caption custom-font-size-1 text-color-light font-weight-semibold text-uppercase"
									data-x="['left','left','left','left']"
									data-hoffset="['80','80','80','80']" 
									data-y="['center','center','center','center']"
									data-voffset="['-100','-100','-100','-50']" 
									data-start="500"
									data-paddingleft="['0', '0', '0', '0']"
									style="z-index: 5; font-size: 18px;"
									data-transform_in="y:[-300%];opacity:0;s:500;">2 Days, 23 Talks</div> --}}

								{{-- <h1 class="tp-caption text-color-light font-weight-extra-bold text-uppercase"
									data-x="['left','left','left','left']"
									data-hoffset="['75','75','75','75']" 
									data-y="['center','center','center','center']"
									data-voffset="['-45','-45','-45','5']" 
									data-fontsize="['80', '80', '70', '60']"
									data-start="800"
									data-paddingleft="['0', '0', '0', '0']"
									style="z-index: 5; font-size: 80px;"
									data-transform_in="y:[-300%];opacity:0;s:500;">{{ $base['meta_keywords'] }}</h1> --}}
                <div class="tp-caption custom-font-size-1 text-color-light font-weight-semibold text-uppercase"
									data-x="['left','left','left','left']"
									data-hoffset="['81','81','81','81']" 
									data-y="['center','center','center','center']"
									data-voffset="['5','25','25','75']" 
									data-start="800"
									data-width="85%"
									data-paddingleft="['0', '0', '0', '0']"
									data-fontsize="26"
									style="z-index: 5;"
									data-transform_in="y:[-300%];opacity:0;s:500;">

            <div class="row w-100" style="min-width:300px;">
              <form action="{{ route('expoproperty_front.searchProduct') }}" method="GET" class="mr-4 mb-3 mb-md-0 w-100">
								<div class="input-group input-group-rounded">
									<input class="form-control form-control-sm bg-light" placeholder="Search Job" name="s" id="searchJob" type="text">
									<span class="input-group-append">
										<button class="btn btn-light text-color-dark" type="submit"><strong>GO!</strong></button>
									</span>
								</div>
							</form>
            </div>
            
                </div>

								<div class="tp-caption text-color-light"
									data-x="['left','left','left','left']"
									data-hoffset="['80','80','80','80']" 
									data-y="['center','center','center','center']"
									data-voffset="['85','85','85','135']" 
									data-start="1500"
									data-paddingleft="['0', '0', '0', '0']"
									data-fontsize="26"
									style="z-index: 5;"
									data-transform_in="y:[-300%];opacity:0;s:500;">{{ $base['meta_keywords'] }}</div>

								{{-- <div class="tp-caption text-uppercase"
									data-x="['left','left','left','left']"
									data-hoffset="['80','80','80','80']" 
									data-y="['center','center','center','center']"
									data-voffset="['55','55','55','105']" 
									data-start="1500"
									data-paddingleft="['0', '0', '0', '0']"
									data-fontsize="['12', '12', '12', '18']"
									data-lineheight="['12', '12', '12', '22']"
									style="z-index: 5; color: #6acdca;"
									data-transform_in="y:[-300%];opacity:0;s:500;">
                  {{-!- <i class="fas fa-map-marker-alt"></i> -!-}}
                  {{ $base['meta_title'] }}
                </div> --}}

								<div class="tp-caption text-uppercase"
									data-x="['right','right','right','right']"
									data-hoffset="['80','80','80','80']" 
									data-y="['bottom','bottom','bottom','bottom']"
									data-voffset="['140','140','140','140']" 
									data-start="1000"
									style="z-index: 5;"
									data-transform_in="opacity:0;s:500;">

									<a href="#" class="play-video-custom custom-rev-next">
										<img src="{{ asset('onefamily/img/play-icon.png') }}" class="img-fluid" width="90" height="90" />
									</a>

								</div>

							</li>
              <li data-transition="fade">
								<img 
                  src="{{ env('URL_ENDPOINT').$baseApp['bg_login'] }}"
									alt=""
									data-bgposition="center center" 
									data-bgfit="cover" 
									data-bgrepeat="no-repeat" 
									class="rev-slidebg">

								<div class="rs-background-video-layer" 
									data-forcerewind="on" 
									data-volume="100" 
									data-videowidth="100%" 
									data-videoheight="100%" 
									data-videomp4="3d-Ub/mrs-ub.mp4" 
									data-videopreload="preload" 
									data-videoloop="none" 
									data-forceCover="1" 
									data-aspectratio="16:9" 
									data-autoplay="true" 
									data-autoplayonlyfirsttime="false" 
									data-nextslideatend="true">
								</div>

								{{-- <div class="tp-dottedoverlay tp-opacity-overlay"></div> --}}

							</li>

						</ul>
					</div>
				</div>


{{-- ############################# --}}

<hr class="mt-0 mb-5">


  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-9 text-center text-lg-left">
        {!! $baseApp['text_showcase'] !!}
      </div>
      <div class="col-lg-3 text-center text-lg-right">
        <h4 class="text-4 line-height-6 font-weight-normal appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="800"><span class="opacity-6">{!! $baseApp['text_showcase2'] !!}</span></h4>
      </div>
      {{-- <div class="col-lg-2 text-center text-lg-right">
        <a class="btn btn-outline btn-rounded btn-primary btn-with-arrow mb-5 mb-lg-2 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="1100" href="#">Contact Us <span><i class="fas fa-chevron-right"></i></span></a>
      </div> --}}
    </div>

    <div class="row">
      <div class="col mb-1">
        <hr class="my-1">
      </div>
    </div>


    <div class="row" style="background-image: url({{ env('URL_ENDPOINT').$baseApp['bg_showcase'] }}); background-size: cover; background-position: center;">
      <div class="col">
        <div class="m-auto appear-animation img-booth w-50" data-appear-animation="fadeIn" data-appear-animation-delay="500">
          <div class="owl-carousel owl-theme nav-inside nav-style-1 nav-light mt-2" data-plugin-options="{'items': 1, 'margin': 10, 'nav': true, 'dots': true, 'animateOut': 'fadeOut', 'autoplay': true, 'autoplayTimeout': 8000, 'loop': true}">
            @foreach ( $perumahan as $KeyDev => $VDev)

              <div class="text-center">
                <div class="img-thumbnail border-0 p-0 d-block" style="background-color: transparent;cursor:pointer;">
                  <img onclick="document.location='{{ route('expoproperty_front.dev', ['id' => $VDev->uuid ]) }}';return false;" @if($KeyDev !== 0 || $KeyDev !== 1 ) loading="" @else loading="lazy" @endif class="img-fluid border-radius-0" @if($VDev->img_booth) src="{{ env('URL_ENDPOINT').$VDev->img_booth }}" @else src="{{ env('URL_ENDPOINT').$baseApp['default_booth'] }}" @endif alt="">
                </div>
                <span class="text-white">{{ $VDev->name }}</span>
              </div>
            @endforeach
            
          </div>
        </div>
      </div>
    </div>
    <style>
    .img-booth .owl-carousel.nav-light.nav-style-1 .owl-nav .owl-prev {
        color : #555 !important;
    }
    .img-booth .owl-carousel.nav-light.nav-style-1 .owl-nav .owl-next {
        color : #555 !important;
    }
    </style>



    
  </div>

@endsection


@section ('content')

@if( isset($base['regional']) )
<section class="section section-height-2 border-0 mt-5 mb-0 pt-5">
  
  <div class="container py-2">
    <div class="row mt-3 pb-4">
      <div class="col text-center">
        <h2 class="font-weight-semibold text-6 mb-0">{!! $base['regional']->name !!}</h2>
        {{-- <p class="lead text-4 pt-2 font-weight-normal">Porto comes with several elements options, it's easy to customize<br> and create the content of your website's pages.</p> --}}
      </div>
    </div>
  </div>

</section>
@else
<div class="row">
  <div class="col mb-1">
    <hr class="my-1">
  </div>
</div>
@endif

    @if( !isset($base['regional']) )
    <section id="portfolio" class="section section-no-border bg-color-secondary m-0">
				<div class="container">
					<div class="row">
						<div class="col">
							<h2 class="text-color-dark font-weight-extra-bold text-uppercase">Kategori</h2>
							<ul class="nav nav-pills sort-source custom-nav-sort mb-4" data-sort-id="portfolio" data-option-key="filter">

              @foreach ( $categorie as $kCat => $vCat )
                <li class="nav-item" data-option-value="*">
                  <a class="btn btn-outline btn-rounded btn-primary btn-with-arrow m-2 mb-lg-2 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="1100" href="{{ route('expoproperty_front.regionalSlug', ['slug' => $vCat->seo_url_slug_en ]) }}?vid=1">{{ $vCat->name }}<span><i class="fas fa-chevron-right"></i></span></a>
                </li>
              @endforeach

								
							</ul>
						</div>
					</div>
				</div>
		</section>

      @endif
      

      <section class="pt-4">
					<div class="container mt-4 pt-4 pb-4">

          <div class="row pt-2">
            <div class="col">
              <h2 class="text-color-dark text-uppercase font-weight-bold text-center mb-1">Participating</h2>
              <p class="custom-font-size-1 text-center mb-2">Expo Event 2021</p>
            </div>
          </div>

					<div class="row pt-2 pb-4 mb-4">
          @foreach ( $perumahan as $kPer => $vPer )
          {{-- @foreach ( $baseApp['company'] as $kPer => $vPer ) --}}
							<div class="col-md-2 col-lg-2 mt-3 mb-3 m-auto">
								<div class="custom-speaker-card bg-color-light m-auto" style="border: none;">
									<div class="speaker-photo text-center">
										{{-- <a href="#speaker-content-1" class="popup-with-zoom-anim text-decoration-none"m text-decoration-none"> --}}
                    <a href="{{ route('expoproperty_front.dev', ['id' => $vPer->uuid ]) }}">
											<img loading="lazy" @if($vPer->img_pic) src="{{ env('URL_ENDPOINT').$vPer->img_pic }}" @else src="{{ env('URL_ENDPOINT').$baseApp['default_logo_comapny'] }}" @endif  class="img-fluid" alt="" title="{{ $vPer->name }}">
										</a>
									</div>
								</div>
              </div>
          @endforeach
          </div>

					</div>
				</section>

@if( count($sponsor) )
    <section class="section-center pb-2 pt-4 section section-with-shape-divider custom-bg-color-1 border-0 m-0">
					<div class="shape-divider" style="height: 385px;">
						<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 2000 385" preserveAspectRatio="xMinYMin">
							<circle class="custom-svg-fill-color-secondary" fill="#9DA3F6" opacity="0.2" cx="57" cy="181" r="161"/>
							<circle class="custom-svg-fill-color-secondary" fill="#5349FF" opacity="0.3" cx="75.5" cy="158.5" r="169.5"/>
							<path fill="#FFFFFF" opacity="0.5" d="M-35,226c17.66,1.2,43.63,2.44,75,2c83.48-1.18,144.86-13.49,188-22c224.54-44.3,165.12-27.27,310-59
								c133.16-29.16,128.14-31.45,223-52c206.26-44.68,317.22-68.72,460-68c97.61,0.49,73.58,11.86,293,25c164.22,9.83,250.54,7.83,279,7
								c102.76-2.99,187.96-12.01,248-20c0-24.69,0-49.37,0-74.06c-694.67,0-1389.33,0-2084,0C-40.33,51.96-37.67,138.98-35,226z"/>
							<path fill="#FFFFFF" d="M-37,185c17.21,1.44,42.06,3.17,72,4c81.96,2.26,170.2-3.07,325-30c54.07-9.4,98.99-18.41,221-45
								c255.1-55.59,223.26-53.86,287-64c57.13-9.09,228.37-36.32,423-18c36.66,3.45,96.62,10.63,187,14c16.19,0.6,75.77,2.66,156,1
								c90.18-1.87,157.94-7.44,248-15c46.95-3.94,99.2-8.84,156-15c0-12.82,0-25.65,0-38.47c-692.67,0-1385.33,0-2078,0
								C-39,47.35-38,116.18-37,185z"/>
						</svg>
					</div>

        <div class="container pb-4 pt-4 mt-4">
          <div class="row pt-2">
            <div class="col">
              <h2 class="text-color-dark text-uppercase font-weight-bold text-center mb-1">Sponsors</h2>
              <p class="custom-font-size-1 text-center mb-2">Thanks to our sponsors</p>
            </div>
          </div>
          <div class="row mb-4 pb-4">
            <div class="col">
              <div class="owl-carousel owl-theme custom-dots-style-1 custom-dots-color-primary mb-0" data-plugin-options="{'items': 1, 'margin': 0, 'loop': false}">

              @foreach ( $sponsor as $kSponsor => $vSponsor )
                @if($vSponsor->img_pic) 
                <div class="carousel-logo-item" style="width: 40%;margin: auto; border:none;">
										<div class="carousel-logo-pannel carousel-logo-pb text-center">
											<img src="{{ env('URL_ENDPOINT').$vSponsor->img_pic }}" class="img-fluid" alt="">
										</div>
										<div class="carousel-logo-pannel carousel-logo-hover pt-4 pl-3 pr-3 pb-2 ">
											<p class="carousel-logo-description font-weight-normal">
                      @if($vSponsor->Prolog)
                        {{ $vSponsor->Prolog }}
                      @else
                        <h2>{{ $vSponsor->name }}</h2>
                      @endif
											</p>
										</div>
								</div>
                @endif
            @endforeach


              </div>
            </div>
          </div>
        </div>

        <div class="shape-divider shape-divider-bottom z-index-0" style="height: 260px;">
						<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 2000 260" preserveAspectRatio="xMinYMin">
							<circle class="custom-svg-fill-color-secondary" fill="#504BFD" opacity="0.2" cx="2007.7" cy="208.3" r="140.7"/>
							<circle class="custom-svg-fill-color-secondary" fill="#5349FF" opacity="0.2" cx="1975.78" cy="247.18" r="148.13"/>
							<path fill="#FFFFFF" d="M-42,42c21.03-0.71,49.03-1.3,82-1c10.06,0.09,73,0.78,147,7c95.4,8.01,191.25,23.7,278,40
								c188.62,35.43,247.14,57.2,353,79c102.08,21.02,252.74,44.36,445,46c0,22.68,0,45.35,0,68.03c-433.33,0-866.67,0-1300,0
								C-38.67,201.35-40.33,121.68-42,42z"/>
							<path class="custom-svg-fill-color-secondary" fill="#ffffff" d="M-39,233c18.45-5.57,45.76-13.68,79-23c65.89-18.48,100.28-28.12,140-36c64.67-12.83,115.09-15.35,151-17
								c72.37-3.33,126.81,0.97,200,7c21.78,1.79,35.05,3.15,147,16c185.79,21.33,205.66,24.08,252,27c85.5,5.38,150.46,4.35,168,4
								c48.7-0.96,73.47-3.33,246-19c174.43-15.84,185.89-16.75,211-18c76.46-3.81,133.48-3.48,217-3c83.26,0.48,125.58,2.59,166,6
								c37.33,3.15,68.3,7,90,10c0,28.67,0,57.35,0,86.02c-688.33,0-1376.67,0-2065,0C-37.67,259.68-38.33,246.34-39,233z"/>
						</svg>
					</div>
      </section>
  @endif



{{-- Event --}}

<div class="row mb-5">
  <div class="col mr-6">
    <hr class="solid my-5">
    <h2 class="text-color-dark text-uppercase font-weight-bold text-center mb-1">Event</h2>
  </div>
</div>
<div class="owl-carousel owl-theme full-width" data-plugin-options="{'items': 5, 'loop': false, 'nav': true, 'dots': false}">

@foreach ( $event as $kChunksEvent => $vChunksEvent )
    <div>
      <a href="{{ route('expoproperty_front.event', ['id' => $vChunksEvent->uuid ]) }}">
        <span class="thumb-info thumb-info-centered-info thumb-info-no-borders">
          <span class="thumb-info-wrapper">
            <img oading="lazy" src="{{ env('URL_ENDPOINT').$vChunksEvent->img_pic }}" alt="" class="img-fluid">
            <span class="thumb-info-title">
              <span class="thumb-info-inner">{{ $vChunksEvent->speaker }}</span>
              <span class="thumb-info-type">
                          {{ $vChunksEvent->name }}<br/>
                          {{ $vChunksEvent->tema }}
              </span>
            </span>
            {{-- <span class="thumb-info-action">
              <span class="thumb-info-action-icon"><i class="fas fa-plus"></i></span>
            </span> --}}
          </span>
        </span>
      </a>
    </div>
  @endforeach


  </div>
{{-- ./Event --}}
    

@endsection

@section ('link_js')
<script>


  $(document).ready(function() {

    /*
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
*/
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
            //$('#carouselbooth').Carousel3d('next');
          }
        }, 3000);

    });
</script>
@endsection