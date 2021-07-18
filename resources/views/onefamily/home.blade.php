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
@if( !isset($base['regional']) )
<div class="embed-responsive embed-responsive-16by9">
    @php
    if( !substr_count( $baseApp['yt_welcome'], "<iframe") ){
      $baseApp['yt_welcome'] = str_replace(" ","", $baseApp['yt_welcome']);
      
      $urlVid = (substr_count( $baseApp['yt_welcome'], "https://") ) ? $baseApp['yt_welcome'] : "https://".$baseApp['yt_welcome'];
      $baseApp['yt_welcome'] = '<iframe id="iframe1" src="'.$urlVid.'?autoplay=1&controls=1&showinfo=0&rel=0&loop=1&t=0" frameborder="0" name="youtube embed" loading="lazy" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen"></iframe>';
    }
    @endphp

      @if( $base['vid'] )
          {!!  $baseApp['yt_welcome'] !!}
      @else
          {{-- {!! str_replace("autoplay=1","autoplay=0", $baseApp['yt_welcome'] ) !!} --}}
      @endif
  {{-- <iframe frameborder="0" allowfullscreen="" src="//www.youtube.com/embed/l-epKcOA7RQ?showinfo=0&amp;wmode=opaque"></iframe> --}}
  <p class="custom-font-secondary custom-font-size-1 mb-0 pb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1600">Connecting People from One Device to The World and Watch Daily Live Everyday</p>
</div>
@endif


 {{-- @include( $base['thema_lock'].'sectionHomeWelcome', ['base' => $base, 'baseApp' => $baseApp ]) --}}
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

{{-- <section class="section section-with-shape-divider custom-bg-color-1 border-0 m-0" style="background-image: url({{ env('URL_ENDPOINT').$baseApp['bg_showcase'] }});background-size: cover;background-position: center;background-repeat: no-repeat"> --}}
<section class="section section-with-shape-divider border-0 m-0" style="background: #000;">
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
    
			<div class="container">
				<div class="row py-4 my-5">
					<div class="col py-3">
						<div class="owl-carousel owl-theme mb-0" data-plugin-options="{'responsive': {'0': {'items': 1}, '476': {'items': 1}, '768': {'items': 1}, '992': {'items': 1}, '1200': {'items': 1}}, 'autoplay': true, 'autoplayTimeout': 4000, 'dots': true}">
              @foreach ( $perumahan as $KeyDev => $VDev)
                      @if($VDev->img_booth)
                        {{-- <a href="{{ route('expoproperty_front.dev', ['id' => $VDev->uuid ]) }}"> --}}
                        <div class="text-center m-7 p-7 prt_img" style="width: 80%;margin: auto;">
                          <img class="d-block img-booth" @if($KeyDev !== 0 || $KeyDev !== 1 ) data-x="1" @else loading="lazy" @endif src="{{ env('URL_ENDPOINT').$VDev->img_booth }}" alt="{{ $VDev->name }}" @if($KeyDev == 0) selected @endif onclick="document.location='{{ route('expoproperty_front.dev', ['id' => $VDev->uuid ]) }}';return false;" />
                          <span class="text-white">{{ $VDev->name }}</span>
                        </div>
                        {{-- </a> --}}
                      @else
                        {{-- <a href="{{ route('expoproperty_front.dev', ['id' => $VDev->uuid ]) }}"> --}}
                        <div class="text-center m-7 p-7">
                            <img class="d-block" @if($KeyDev !== 0 || $KeyDev !== 1 ) data-x="1" @else loading="lazy" @endif src="{{ env('URL_ENDPOINT').$base['logo'] }}" alt="{{ $VDev->name }}" @if($KeyDev == 0) selected @endif  onclick="document.location='{{ route('expoproperty_front.dev', ['id' => $VDev->uuid ]) }}';return false;" />
                            <span class="text-white">{{ $VDev->name }}</span>
                        </div>
                        {{-- </a> --}}
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
        <path class="custom-svg-fill-color-secondary" fill="#504BFD" d="M-39,233c18.45-5.57,45.76-13.68,79-23c65.89-18.48,100.28-28.12,140-36c64.67-12.83,115.09-15.35,151-17
          c72.37-3.33,126.81,0.97,200,7c21.78,1.79,35.05,3.15,147,16c185.79,21.33,205.66,24.08,252,27c85.5,5.38,150.46,4.35,168,4
          c48.7-0.96,73.47-3.33,246-19c174.43-15.84,185.89-16.75,211-18c76.46-3.81,133.48-3.48,217-3c83.26,0.48,125.58,2.59,166,6
          c37.33,3.15,68.3,7,90,10c0,28.67,0,57.35,0,86.02c-688.33,0-1376.67,0-2065,0C-37.67,259.68-38.33,246.34-39,233z"/>
      </svg>
    </div>
    </section>

    @if( !isset($base['regional']) )

    @if($categorie && count($categorie) )
    <section class="our-services  section section-with-shape-divider border-0 m-0 p-relative" style="    background-color:#504BFD;">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-10 text-center text-white">
								{{-- <span class="d-block positive-ls-2 font-weight-normal custom-font-size-2 opacity-6 mb-1">Kategori</span> --}}
								<h2 class="font-weight-bold text-white text-10 mb-4">Kategori</h2>
								{{-- <p class="custom-font-size-2 font-weight-light text-color-light mb-4 pb-3">Vestibulum auctor felis eget orci semper vestibulum. Pellentesque ultricies nibh gravida, accumsan libero luctus, molestie nunc. In nibh ipsum, blandit id faucibus ac, finibus vitae dui.</p> --}}
							</div>
						</div>
					</div>
					<div class="container-fluid px-0 pb-5 mb-5">
						<div class="row" style="margin: auto;">
              
              
              @foreach ( $categorie as $kCat => $vCat )
                      <div class="col-xl-6 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="100">
												<a href="{{ route('expoproperty_front.regionalSlug', ['slug' => $vCat->seo_url_slug_en ]) }}?vid=1" class="text-decoration-none">
                          <div class="service-card mb-4 bg-white bg-color-hover-primary text-color-hover-light w-100 font-weight-semibold custom-text-6 line-height-6 p-relative text-dark">
														<h2>{{ $vCat->name }}</h2>
													</div>
												</a>
											</div>
              @endforeach

						</div>
					</div>
					<div class="shape-divider shape-divider-bottom" style="height: 109px;">
						<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 2000 109" preserveAspectRatio="xMinYMin">
							<path fill="#FFFFFF" d="M-29,0c16.91,7.69,40.41,17.74,69,28c24.89,8.93,114.79,39.95,247,52c89.7,8.18,157.69,3.87,215,0
								c81.39-5.5,81.96-11.49,233-29c82.16-9.52,140.49-16.18,220-20c40.62-1.95,100.38-4.7,178-2c45.11,1.57,62.48,3.8,212,18
								c122.78,11.66,184.77,17.53,214,19c80.47,4.06,142.71,3.13,219,2c68.63-1.02,116.48,0.48,182-6c32.74-3.24,59.69-7.11,78-10
								c0,24.39,0,48.78,0,73.17c-691.67,0-1383.33,0-2075,0C-34.33,83.45-31.67,41.72-29,0z"/>
						</svg>
					</div>
				</section>
        @endif
        
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
          @if($vPer->img_pic && $vPer->id !== 1)
							<div class="col-md-3 col-lg-3 mt-3 mb-3" style="margin:auto;">
								<div class="custom-speaker-card bg-color-light m-auto">
									<div class="speaker-photo text-center">
										{{-- <a href="#speaker-content-1" class="popup-with-zoom-anim text-decoration-none"m text-decoration-none"> --}}
                    <a href="{{ route('expoproperty_front.dev', ['id' => $vPer->uuid ]) }}">
											<img loading="lazy" src="{{ env('URL_ENDPOINT').$vPer->img_pic }}" class="img-fluid" alt="{{ $vPer->name }}" style="max-width: 180px;max-height: 180px;">
										</a>
									</div>
								</div>
              </div>
              @endif
          @endforeach
          </div>

					</div>
				</section>

    @if($sponsor && count($sponsor) )
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
                <div class="carousel-logo-item" style="width: 40%;margin: auto;">
                  <div class="carousel-logo-pannel carousel-logo-pb text-center">
                    <a href="{{ route('expoproperty_front.dev', ['id' => '37584c05-c679-4629-ae25-3388ecf0f313' ]) }}">
                      <img loading="lazy" src="{{ env('URL_ENDPOINT').$vSponsor->img_pic }}" class="img-fluid" alt="{{ $vSponsor->name }}">
                    </a>
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





      <section class="section-center pb-2 pt-4">
        <div class="container pb-4 pt-4 mt-4">
          <div class="row pt-2">
            <div class="col">
              <h2 class="text-color-dark text-uppercase font-weight-bold text-center mb-1">Event</h2>
            </div>
          </div>
          <div class="row mb-4 pb-4 mt-3">
            <div class="col">
              @php
                $chunksEvent = $event->chunk(4);
              @endphp

              <div class="owl-carousel owl-theme custom-dots-style-1 custom-dots-color-primary mb-0" data-plugin-options="{'responsive': {'0': {'items': 1}, '476': {'items': 1}, '768': {'items': 2}, '992': {'items': 2}, '1200': {'items': 2}}, 'autoplay': false, 'autoplayTimeout': 6000, 'dots': true}">
              

            @foreach ( $chunksEvent as $kChunksEvent => $vChunksEvent )
              <div class="item">
								{{-- <div class="custom-circle-date bg-color-primary no-border text-color-light text-center ml-4 mb-4">
									<div class="circle-dotted">
										<div class="circle-center">
											<span class="custom-font-size-6 text-color-light font-weight-bold text-uppercase mb-0">Day-1</span>
											<span class="text-color-light font-weight-normal">July-7</span>
										</div>
									</div>
								</div>
                @dump($vChunksEvent) --}}

              @foreach ( $vChunksEvent as $kEvent => $vEvent )
								<div class="timeline-balloon pb-4 mb-2 mx-2">
									<div class="balloon-cell balloon-time pt-4">
										<span class="time-text text-color-dark font-weight-bold custom-font-size-3">
                      {!! \Carbon\Carbon::parse($vEvent->start_event)->format("M d,") !!}
                      <br/>
                      {!! \Carbon\Carbon::parse($vEvent->start_event)->format("Y") !!}
                      <br/><br/>
                      {!! \Carbon\Carbon::parse($vEvent->start_event)->format("H:m") !!}
                    </span>
										<div class="time-dot bg-color-light"></div>
									</div>
									<div class="balloon-cell appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="0">

                  
                  <a href="{{ route('expoproperty_front.event', ['id' => $vEvent->uuid ]) }}">
										<div class="balloon-content bg-color-light text-color-quaternary p-2 pr-2">
											<span class="balloon-arrow bg-color-light"></span>
											
                      @if($vEvent->img_pic)
                      <div class="balloon-photo">
												<div class="photo-radius">
													<img loading="lazy" src="{{ env('URL_ENDPOINT'). str_replace(".","-150x150.", $vEvent->img_pic ) }}" alt="{{ $vEvent->name }}" class="img-fluid">
												</div>
											</div>
                      @endif

											<div class="balloon-description pt-1">
												<h5 class="text-color-dark text-uppercase font-weight-bold pt-1 mb-2">{{ $vEvent->speaker }}</h5>
												<p class="font-weight-normal custom-font-size-3 mb-1">
                          {{ $vEvent->name }}<br/>
                          {{ $vEvent->tema }}
                        </p>
											</div>
										</div>
                  </a>

									</div>
								</div>
              @endforeach
							</div>
          @endforeach


              </div>
            </div>
          </div>
        </div>
      </section>



    

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