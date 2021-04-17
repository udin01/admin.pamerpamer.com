@extends( $base['thema_lock'].'master' )

@section('title_admin')
   {{ $perumahan->name }} | {{ $baseApp['title'] }}
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
<section id="blog" class="section section-with-shape-divider custom-bg-color-1 border-0 m-0"
style="background-image: url({{ env('URL_ENDPOINT').$perumahan->siteplan }}); background-size: auto; background-position: center;"
>

<div class="container py-5 mt-3 ">
    <div class="row align-items-center justify-content-center" style="margin-bottom: 8em;">
      <div class="col-lg-6 mb-5 mb-lg-0">
        <div class="position-relative">
          <div class="custom-shape-1 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="500">
            <div class="position-absolute top-0 left-0 right-0 bottom-0 bg-primary" data-plugin-float-element data-plugin-options="{'startPos': 'top', 'speed': 0.1, 'transition': true, 'transitionDuration': 400, 'isInsideSVG': true}"></div>
          </div>
          <div data-plugin-float-element data-plugin-options="{'startPos': 'top', 'speed': 0.3, 'transition': true, 'transitionDuration': 600, 'isInsideSVG': true}">
          
          {{-- Video --}}
            {{-- <img src="img/demos/law-firm-2/generic/generic-1.jpg" class="img-fluid position-relative z-index-1 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="900" alt="" /> --}}
          <div class="video-bg">
            <div class="video-background">
                <div class="video-foreground video-selector">
                
                @php
                  $videoProfile = ($perumahan->profil_video) ? '<iframe id="profileVideo_dev" src="'.$perumahan->profil_video .'?enablejsapi=1&autoplay=1&controls=0&showinfo=0&rel=0&loop=1" frameborder="0" name="youtube embed" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>' : $baseApp['yt_welcome'];

                  if( !$base['vid'] ){
                     $videoProfile = str_replace("autoplay=1","autoplay=0", $videoProfile );
                  } 
                  
                  $sosmed = json_decode($perumahan->sosmed);
                  if(!$sosmed){
                     $sosmed = [];
                  }
                  
                  if( !substr_count( $videoProfile, "<iframe") ){
                     $videoProfile = '<iframe id="profileVideo_dev" src="'.$videoProfile .'?enablejsapi=1&autoplay=1&controls=0&showinfo=0&rel=0&loop=1" frameborder="0" name="youtube embed" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                  }
               @endphp
               

               {!! $videoProfile !!}

                </div>
            </div>
              <!-- end inner -->
          </div>
          {{-- ./Video --}}

          </div>
        </div>
      </div>
      {{-- color: #ffff; --}}
      <style>
      .text-header {
         font-weight: 600;
         text-shadow: 1px 1px 2px #eee;
      }
      .text-shadow {
         font-weight: 600;
         text-shadow: 1px 1px 2px #fff;
      }
      </style>

      <div class="col-md-9 col-lg-6 pl-lg-5 mt-3">

                  <h2 class="text-header">{{ $perumahan->name }}</h2>
                     <p class="text-header">{{ $perumahan->prolog }}</p>
                     <div>
                     @foreach ( $sosmed as $keySosmed  => $sosKey )
                        @php
                           $logo = strtolower($keySosmed);
                           $url="javascript:void(0);";
                           switch ($logo) {
                              case 'ig':
                                 $logo = 'fa-instagram';
                                 if( substr_count( $sosKey, "instagram.com") ){
                                    $url = $sosKey;
                                 } else {
                                    if( substr_count( $sosKey, "@") ){
                                       $url = 'http://instagram.com/'.str_replace("@","", $sosKey);
                                    } else {
                                       $url = 'http://instagram.com/explore/tags/'.str_replace(" ","", $sosKey);
                                    }
                                 }
                                 break;

                              case 'instagram':
                                 $logo = 'fa-instagram';
                                 if( substr_count( $sosKey, "instagram.com") ){
                                    $url = $sosKey;
                                 } else {
                                    if( substr_count( $sosKey, "@") ){
                                       $url = 'http://instagram.com/'.str_replace("@","", $sosKey);
                                    } else {
                                       $url = 'http://instagram.com/explore/tags/'.str_replace(" ","", $sosKey);
                                    }
                                 }
                                 break;

                              case 'fb':
                                 $logo = 'fa-facebook-official';
                                 if( substr_count( $sosKey, "facebook.com") ){
                                    $url = $sosKey;
                                 } else {
                                    $url = 'https://www.facebook.com/search/top/?q='.$sosKey.'&opensearch=1';
                                 }
                                 break;
                                 
                              case 'facebook':
                                 $logo = 'fa-facebook-official';
                                 if( substr_count( $sosKey, "facebook.com") ){
                                    $url = $sosKey;
                                 } else {
                                    $url = 'https://www.facebook.com/search/top/?q='.$sosKey.'&opensearch=1';
                                 }
                                 break;
                                 
                              case 'web':
                                 $logo = 'fa-globe';
                                 $url = $sosKey;
                                 break;

                              case 'website':
                                 $logo = 'fa-globe';
                                 $url = $sosKey;
                                 break;

                              case 'twitter':
                                 $logo = 'fa-twitter';
                                 if( substr_count( $sosKey, "twitter.com") ){
                                    $url = $sosKey;
                                 } else {
                                    $url = 'https://twitter.com/search?q='.$sosKey.'&src=typed_query';
                                 }
                                 break;

                              case 'email':
                                 $logo = 'fa-envelope';
                                 break;

                              default:
                                 $logo = 'fa-cloud';
                              }
                        @endphp
                         <a href="{{ $url }}" class="text-success" target="_blank" onclick="gooAnalytic({'{{ $logo }}': '{{ $url }}' })">
                           <h5 class="py-1 my-0 text-header">
                              <i class="fab {{ $logo }} fa-1x"></i>&nbsp;&nbsp;&nbsp;{{ $sosKey }}
                           </h5>
                         </a>
                         {{-- &nbsp;&nbsp; --}}
                     @endforeach
                     <hr/>
                     <span class="text-shadow">
                     <b>{!! $perumahan->location !!}</b>
                     <span>
      </div>
    </div>
  </div>
   <div class="shape-divider shape-divider-bottom shape-divider-reverse-y z-index-0" style="height: 260px;">
      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 2000 260" preserveAspectRatio="xMinYMin">
         <path fill="#FFFFFF" d="M-42,42c21.03-0.71,49.03-1.3,82-1c10.06,0.09,73,0.78,147,7c95.4,8.01,191.25,23.7,278,40
            c188.62,35.43,247.14,57.2,353,79c102.08,21.02,252.74,44.36,445,46c0,22.68,0,45.35,0,68.03c-433.33,0-866.67,0-1300,0
            C-38.67,201.35-40.33,121.68-42,42z"/>
         <path fill="#ffffff" d="M-39,233c18.45-5.57,45.76-13.68,79-23c65.89-18.48,100.28-28.12,140-36c64.67-12.83,115.09-15.35,151-17
            c72.37-3.33,126.81,0.97,200,7c21.78,1.79,35.05,3.15,147,16c185.79,21.33,205.66,24.08,252,27c85.5,5.38,150.46,4.35,168,4
            c48.7-0.96,73.47-3.33,246-19c174.43-15.84,185.89-16.75,211-18c76.46-3.81,133.48-3.48,217-3c83.26,0.48,125.58,2.59,166,6
            c37.33,3.15,68.3,7,90,10c0,28.67,0,57.35,0,86.02c-688.33,0-1376.67,0-2065,0C-37.67,259.68-38.33,246.34-39,233z"/>
      </svg>
   </div>
</section>
@endsection


@section ('content')
   

   <section class="contact pt-0">
      <div class="container">
         
         <hr/>
         <div class="row">
               <div class="col-lg-9 wow fadeIn">
                  {!! $perumahan->desc !!}
               </div>
                  <!-- end col-5 -->
               <div class="col-lg-3 wow fadeIn" data-wow-delay="0.1s">
               {{-- @if($_SERVER['REMOTE_ADDR'] === '202.80.216.49' )
                     @dump( $perumahan->marketing )
               @endif --}}
               @if( $perumahan->marketing && count($perumahan->marketing) !== 0 )
                  @foreach ( $perumahan->marketing as $keySales => $sales )
                     @if($sales->telp)
                        <a href="tel:{{ $sales->telp }}" target="_blank" type="button" class="btn btn-primary btn-lg btn-block btn-sm" onclick="gooAnalytic({'telp': '{{ $sales->telp }}' })">
                              <i class="fa fa-phone"></i> 
                              {{ $sales->telp }} <small><i>({{ $sales->name }})</i></small>
                        </a>
                     @endif
                     @if($sales->wa)
                        <a href="https://wa.me/{{ $sales->wa }}?text={{  urlencode(env('TEXT_WA', 'Helo')) }}" target="_blank" type="button" class="btn btn-success btn-lg btn-block btn-sm" onclick="gooAnalytic({'wa': '{{ $sales->wa }}' })">
                              <i class="fa fa-whatsapp"></i>
                              {{ $sales->wa }} <small><i>({{ $sales->name }})</i></small>
                        </a>
                     @endif
                  @endforeach
               @else
                  @if ( $perumahan->marketingAll )
                     @foreach ( $perumahan->marketingAll as $keySales1 => $sales2 )
                        @if($sales2->telp)
                           <a href="tel:{{ $sales2->telp }}" target="_blank" type="button" class="btn btn-primary btn-lg btn-block btn-sm" onclick="gooAnalytic({'telp': '{{ $sales2->telp }}' })">
                                 <i class="fa fa-phone"></i> 
                                 {{ $sales2->telp }} <small><i>({{ $sales2->name }})</i></small>
                           </a>
                        @endif
                        @if($sales2->wa)
                           <a href="https://wa.me/{{ $sales2->wa }}?text=Hello" target="_blank" type="button" class="btn btn-success btn-lg btn-block btn-sm" onclick="gooAnalytic({'wa': '{{ $sales2->wa }}' })">
                                 <i class="fa fa-whatsapp"></i>
                                 {{ $sales2->wa }} <small><i>({{ $sales2->name }})</i></small>
                           </a>
                        @endif
                     @endforeach
                  @endif
               @endif
                  <hr/>
                  
                  @if($perumahan->brosur)
                  <div class="col-md-12 row" style="text-align: center;margin: auto;">
                     <a href="{{ route('expoproperty_front.viewBrowsur', ['id' => $perumahan->uuid ]) }}" target="_blank" type="button" class="btn btn-warning btn-lg w-100 col-5 mx-1">
                              <small>view Brosur</small>
                     </a>
                     <a href="{{ route('expoproperty_front.downloadBrowsur', ['id' => $perumahan->uuid ]) }}" type="button" class="btn btn-danger btn-lg w-100 col-6 mx-1">
                              <small>Download Brosur</small>
                     </a>
                  </div>
                  @endif

                  <br/>
                  <br/>
                  {{-- 
                  <button type="button" class="btn btn-warning btn-lg btn-block" data-toggle="modal" data-target=".simBNI" onclick="gooAnalytic('modal-simulasi')">Simulasi BNI Griya</button>
                  <button class="btn btn-lg btn-block btn-danger" onclick="window.open('{{ $baseApp['url_form_kredit'] }}');gooAnalytic('eform-bni-direct');">AJUKAN PEMOHON BNI GRIYA</button>
                  <br/> --}}

                  <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target=".devOther" onclick="gooAnalytic('modal-booth-lain')">Lihat booth developer lain</button>

                  <div class="col-sm-12 wow fadeIn pt-5">
                        <h6 class="text-center"><b>Event Pamerpamer.com</b></h6>
                        <ul>
                           
                           @foreach ( $event_list as $kDev => $vDev )
                           <li style="border:none;cursor: pointer;" onclick="document.location='{{ route('expoproperty_front.event', ['id' => $vDev->uuid ]) }}';return false;" class="pb-2">
                              <h6>{{ $vDev->name }} - {{ $vDev->tema }}</h6>
                           </li>
                           @endforeach

                           <style>
                           .clients ul:before {
                              background: none;
                           }
                           #map iframe{
                              width: 100%;
                           }
                           </style>
                           
                        </ul>
                  </div>

               </div>

         <div class="row">
         </div>
               <div class="col-lg-9 wow fadeIn">
                  <div class="map" id="map">
                     {!! $perumahan->glocation !!}
                  </div>
               </div>
         </div>
         
      </div>
   </section>


{{-- Modal Dokter --}}
@if($perumahan->pegawai && count($perumahan->pegawai) > 0 )
@foreach ( $perumahan->pegawai as $kpegawai2 => $vpegawai2 )
   <div class="modal fade" id="dok{{ $vpegawai2->id }}" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">

            <div class="modal-header">
               <h4 class="modal-title">{{ $vpegawai2->name }}</h4>
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>

            <div class="modal-body">
            <div class="row">
               <div class="col">

                  <div class="row align-items-center pt-4 appear-animation" data-appear-animation="fadeInLeftShorter">
                     <div class="col-md-4 mb-4 mb-md-0">
                        <img class="img-fluid scale-2  my-4" loading="lazy" src="{{ env('URL_ENDPOINT').$vpegawai2->img_pic }}" alt="{{ $vpegawai2->name }}">
                     </div>
                     <div class="col-md-8 pl-md-5">
                         <p> {{ $vpegawai2->note }} </p>
                        {!! $vpegawai2->desc !!}
                     </div>
                  </div>
                  
               </div>
            </div>
            </div>

            <div class="modal-footer">
               <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
            </div>

         </div>
      </div>
   </div>
@endforeach
@endif
{{-- ./Modal Dokter --}}

<section class="section-center pb-2 pt-4 section section-with-shape-divider border-0 m-0 col-lg-9 bg-white">
{{-- dokter --}}
@if($perumahan->pegawai && count($perumahan->pegawai) > 0 )
<div class="container py-2 mb-6">
   <div class="row">
      <div class="col text-center">
         <h4>Dokter</h4>
      </div>
   </div>

   <div class="row mb-6">
      <div class="col">
         <div class="owl-carousel owl-theme stage-margin" data-plugin-options="{'items': 4, 'margin': 5, 'loop': false, 'nav': true, 'dots': false, 'stagePadding': 40}">
            
            @foreach ( $perumahan->pegawai as $kPegawai => $pegawai )
               <div>
                   <div class="portfolio-item">
                     <a href="javascript:void(0);" data-toggle="modal" data-target="#dok{{ $pegawai->id }}">
                        <span class="thumb-info thumb-info-lighten border-radius-0">
                           <span class="thumb-info-wrapper border-radius-0">
                              <img src="{{ env('URL_ENDPOINT').$pegawai->img_pic }}" class="img-fluid border-radius-0" alt="{{ $pegawai->name }}">
                              <span class="thumb-info-title">
										<span class="thumb-info-inner">{{ $pegawai->name }}</span>
										<span class="thumb-info-type">{{ $pegawai->note }}</span>
                              </span>
                              <span class="thumb-info-action">
                                 <span class="thumb-info-action-icon bg-dark opacity-8"><i class="fas fa-eye"></i></span>
                              </span>
                           </span>
                        </span>
                     </a>
                  </div>
               </div>
            @endforeach

         </div>
      </div>
   </div>
</div>
<div class="row">
  <div class="col mb-6">
    <hr class="my-1">
  </div>
</div>
@endif
{{-- ./dokter --}}


{{-- Product --}}
@if($perumahan->product && count($perumahan->product) > 0 )
<div class="container py-2">
   <div class="row">
      <div class="col text-left">
         <h4>Product :</h4>
      </div>
   </div>

   <div class="row">
      <div class="col">
         <div class="owl-carousel owl-theme stage-margin" data-plugin-options="{'items': 4, 'margin': 5, 'loop': false, 'nav': true, 'dots': false, 'stagePadding': 40}">
            
            @foreach ( $perumahan->product as $kProduct => $product )
               <div>
                  <div class="portfolio-item">
                     <a href="{{ route('expoproperty_front.product', ['id' => $product->uuid ]) }}">
                        <span class="thumb-info thumb-info-lighten border-radius-0">
                           <span class="thumb-info-wrapper border-radius-0">
                              <img src="{{ env('URL_ENDPOINT').$product->img_pic }}" class="img-fluid border-radius-0" alt="{{ $product->name }}">
                              <span class="thumb-info-title">
										<span class="thumb-info-inner">{{ $product->name }}</span>
										<span class="thumb-info-type">{{ $product->cat->name }}</span>
                              </span>
                              <span class="thumb-info-action">
                                 <span class="thumb-info-action-icon bg-dark opacity-8"><i class="fas fa-eye"></i></span>
                              </span>
                           </span>
                        </span>
                     </a>
                  </div>
               </div>
            @endforeach

         </div>
      </div>
   </div>
</div>
@endif
{{-- ./Product --}}

{{-- ./Layanan --}}
@if($perumahan->layanan && count($perumahan->layanan) > 0 )
<div class="container py-2">
   <div class="row">
      <div class="col text-left">
         <h4>Layanan :</h4>
      </div>
   </div>
   <div class="row">
      <div class="col">
         <div class="owl-carousel owl-theme stage-margin" data-plugin-options="{'items': 4, 'margin': 5, 'loop': false, 'nav': true, 'dots': false, 'stagePadding': 40}">
            
            @foreach ( $perumahan->layanan as $kLayanan => $layanan )
                <div>
                  <div class="portfolio-item">
                     <a href="{{ route('expoproperty_front.product', ['id' => $layanan->uuid ]) }}">
                        <span class="thumb-info thumb-info-lighten border-radius-0">
                           <span class="thumb-info-wrapper border-radius-0">
                              <img src="{{ env('URL_ENDPOINT').$layanan->img_pic }}" class="img-fluid border-radius-0" alt="{{ $layanan->name }}">
                              <span class="thumb-info-title">
										<span class="thumb-info-inner">{{ $layanan->name }}</span>
										<span class="thumb-info-type">{{ $layanan->cat->name }}</span>
                              </span>
                              <span class="thumb-info-action">
                                 <span class="thumb-info-action-icon bg-dark opacity-8"><i class="fas fa-eye"></i></span>
                              </span>
                           </span>
                        </span>
                     </a>
                  </div>
               </div>
            @endforeach

         </div>
      </div>
   </div>
</div>
@endif
{{-- ./Layanan --}}
</section>




@if($perumahan->cabang && count($perumahan->cabang) > 0)
   <section class="section-center pb-2 pt-4 section section-with-shape-divider custom-bg-color-1 border-0 m-0 col-lg-9">
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
            <h6 class="text-color-dark text-uppercase font-weight-bold text-center mb-1">Kunjungan Juga kami di tempat ini :</h6>
         </div>
      </div>
      <div class="row mb-4 pb-4 mt-2">
         <div class="col">
            <div class="owl-carousel owl-theme custom-dots-style-1 custom-dots-color-primary mb-0" data-plugin-options="{'items': 1, 'margin': 0, 'loop': true, 'autoplay': true, 'autoplayTimeout': 8000}">

                  @foreach ( $perumahan->cabang as $kSponsor => $vSponsor )
                     <div class="carousel-logo-item" style="width: 40%;margin: auto;">
                        <a href="javascript:void(0);" data-toggle="modal" data-target="#cab{{ $vSponsor->id }}">
                           <div class="carousel-logo-pannel carousel-logo-pb text-center">
                                 @if($vSponsor->img_pic)
                                    <img loading="lazy" src="{{ env('URL_ENDPOINT').$vSponsor->img_pic }}" class="img-fluid" alt="{{ $vSponsor->name }}" />
                                 @endif
                              <h3>{{ $vSponsor->name }}</h3>
                              <p> {{ $vSponsor->location }} </p>
                           </div>
                        </a>
                     </div>
                  @endforeach

            </div>
         </div>
      </div>
   </div>

{{-- Modal Cabang --}}
@foreach ( $perumahan->cabang as $kSponsor2 => $vSponsor2 )
   <div class="modal fade" id="cab{{ $vSponsor2->id }}" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">

            <div class="modal-header">
               <h4 class="modal-title">{{ $vSponsor2->name }}</h4>
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>

            <div class="modal-body">
            <div class="row">
               <div class="col">

                  <div class="row align-items-center pt-4 appear-animation" data-appear-animation="fadeInLeftShorter">
                     <div class="col-md-4 mb-4 mb-md-0">
                        <img class="img-fluid scale-2  my-4" loading="lazy" src="{{ env('URL_ENDPOINT').$vSponsor2->img_pic }}" alt="{{ $vSponsor2->name }}">
                     </div>
                     <div class="col-md-8 pl-md-5">
                        <h2 class="font-weight-normal text-6 mb-3"><strong class="font-weight-extra-bold">{{ $vSponsor2->name }}</strong></h2>
                        <a href="tel:{{ $vSponsor2->telp }}" class="text-success" target="_blank" onclick="gooAnalytic({'{{$vSponsor2->name}}': '{{ $vSponsor2->telp }}' })">
                           <h5 class="py-1 my-0 text-header">
                              <i class="fab fa-phone fa-1x"></i>&nbsp;&nbsp;&nbsp;{{ $vSponsor2->telp }}
                           </h5>
                         </a>
                         <p> {{ $vSponsor2->location }} </p>
                        {!! $vSponsor2->desc !!}
                     </div>
                  </div>
                  <div class="map" id="map">
                     {!! $vSponsor2->glocation !!}
                  </div>
                  
               </div>
            </div>
            </div>

            <div class="modal-footer">
               <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
            </div>

         </div>
      </div>
   </div>
@endforeach
{{-- ./Modal Cabang --}}

   <div class="shape-divider shape-divider-bottom z-index-0" style="height: 260px;">
      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 2000 260" preserveAspectRatio="xMinYMin">
         <circle class="custom-svg-fill-color-secondary" fill="#eeeeee" opacity="0.2" cx="2007.7" cy="208.3" r="140.7"/>
         <circle class="custom-svg-fill-color-secondary" fill="#5349FF" opacity="0.2" cx="1975.78" cy="247.18" r="148.13"/>
         <path fill="#FFFFFF" d="M-42,42c21.03-0.71,49.03-1.3,82-1c10.06,0.09,73,0.78,147,7c95.4,8.01,191.25,23.7,278,40
            c188.62,35.43,247.14,57.2,353,79c102.08,21.02,252.74,44.36,445,46c0,22.68,0,45.35,0,68.03c-433.33,0-866.67,0-1300,0
            C-38.67,201.35-40.33,121.68-42,42z"/>
         <path class="custom-svg-fill-color-secondary" fill="#f7f7f7" d="M-39,233c18.45-5.57,45.76-13.68,79-23c65.89-18.48,100.28-28.12,140-36c64.67-12.83,115.09-15.35,151-17
            c72.37-3.33,126.81,0.97,200,7c21.78,1.79,35.05,3.15,147,16c185.79,21.33,205.66,24.08,252,27c85.5,5.38,150.46,4.35,168,4
            c48.7-0.96,73.47-3.33,246-19c174.43-15.84,185.89-16.75,211-18c76.46-3.81,133.48-3.48,217-3c83.26,0.48,125.58,2.59,166,6
            c37.33,3.15,68.3,7,90,10c0,28.67,0,57.35,0,86.02c-688.33,0-1376.67,0-2065,0C-37.67,259.68-38.33,246.34-39,233z" style="fill: #f0f0f0 !important;" />
      </svg>
   </div>
</section>
@endif



   

   <div class="modal fade devOther" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            {{-- ..... --}}
            <section class="pt-4">
					<div class="container mt-4 pt-4 pb-4">

                     <div class="row pt-2">
                        <div class="col">
                        <h2 class="text-color-dark text-uppercase font-weight-bold text-center mb-1">Participating</h2>
                        <p class="custom-font-size-1 text-center mb-2">Expo Event 2021</p>
                        </div>
                     </div>

                     <div class="row pt-2 pb-4 mb-4">
                     @foreach ( $perumahan_list as $kPer => $vPer )
                     @if($vPer->img_pic)
                        <div class="col-md-4 col-lg-3 mt-3 mb-3">
                           <div class="custom-speaker-card bg-color-light m-auto">
                              <div class="speaker-photo">
                                 {{-- <a href="#speaker-content-1" class="popup-with-zoom-anim text-decoration-none"m text-decoration-none"> --}}
                     <a href="{{ route('expoproperty_front.dev', ['id' => $vPer->uuid ]) }}">
                                    <img loading="lazy" src="{{ env('URL_ENDPOINT').$vPer->img_pic }}" class="img-fluid" alt="">
                                 </a>
                              </div>
                           </div>
                        </div>
                        @endif
                     @endforeach
                     </div>

                     <div class="row pt-2">
                        <div class="col text-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                     </div>

					</div>
				</section>
            {{-- ..... --}}
         </div>
      </div>
   </div>

   {{-- Simulasi BNI --}}
 {{-- @include( $base['thema_lock'].'bniSimulasi', ['base' => $base, 'baseApp' => $baseApp ]) --}}
   {{-- ./Simulasi BNI --}}

   {{-- @if ( $perumahan->siteplan )
   <section class="blog">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-lg-11">
               <div class="post wow fadeIn">
         <a href="{{ env('URL_ENDPOINT').$perumahan->siteplan }}" data-fancybox>
            <figure class="post-image">
               <img loading="lazy" src="{{ env('URL_ENDPOINT').$perumahan->siteplan }}" alt="{{ $perumahan->name }}">
            </figure>
         </a>
               </div>
            </div>
         </div>
      </div>
	</section>
   @endif --}}
    
@endsection

@section ('link_js')
   <script>

      let heightVid = '';
      try {
         heightVid = document.getElementById("profileVideo_dev").offsetWidth      
         document.getElementById("profileVideo_dev").style.width = "100%";
         document.getElementById("profileVideo_dev").style.height = heightVid+"px";
      } catch(err) { }
      /*
      $('.video-container').on('click', function(){
        $('video-selector iframe')[0].contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
        // add other code here to swap a custom image, etc
      });
      */
      $(document).ready(function() {
         let hight = alertSize( 350 );
         let flagPic = true;

         /*
         $(window).scroll(function (event) {
               var scroll = $(window).scrollTop();

               if( scroll >= hight && flagPic){
               flagPic = false;
               $('#pic-bg').show();
               $('#profileVideo_dev').appendTo("#pic-to-pic");
               }
               if( scroll <= hight && !flagPic){
               flagPic = true;
               $('#pic-bg').hide();
               $('#profileVideo_dev').appendTo(".vid_profil");
               }
               // Do something
         });
         */
      
       
      });
      
   </script>
@endsection