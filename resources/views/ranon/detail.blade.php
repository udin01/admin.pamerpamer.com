@extends( $base['thema_lock'].'master' )

@section('title_admin')
   {{ $perumahan->name }} | {{ $baseApp['title'] }}
@endsection

@section('style_css')
<style>
.page-header {
    background: url('{{ env('URL_ENDPOINT').$baseApp['bg_showcase'] }}');
    background-position: center;
    background-size: cover;
}
main {
   margin-top: 25vh;
}
#map iframe {
   width: 100%;
}
#pic-bg {
    bottom: 10px !important;
    right: 0px !important;
}
#pic-close{   
   margin-left:  0px !important;
}
.panel {
    margin-bottom: 20px;
    background-color: #fff;
    border: 1px solid transparent;
        border-top-color: transparent;
        border-right-color: transparent;
        border-bottom-color: transparent;
        border-left-color: transparent;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.panel-default {
    border-color: #ddd;
}
.panel-default > .panel-heading {
    color: #333;
    background-color: #f5f5f5;
    border-color: #ddd;
}
.panel-heading {
    padding: 10px 15px;
    border-bottom: 1px solid transparent;
        border-bottom-color: transparent;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
}
.panel-body {
    padding: 15px;
}
.form-group {
    margin-bottom: 15px;
}
label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 5px;
    font-weight: 700;
}
.checkbox-inline, .radio-inline {
    display: inline-block;
    padding-left: 20px;
    margin-bottom: 0;
    font-weight: 400;
    vertical-align: middle;
    cursor: pointer;
}
input[type="checkbox"], input[type="radio"] {
    margin: 4px 0 0;
        margin-left: 0px;
    margin-top: 1px \9;
    line-height: normal;
}
input[type="checkbox"], input[type="radio"] {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    padding: 0;
}
.checkbox input[type="checkbox"], .checkbox-inline input[type="checkbox"], .radio input[type="radio"], .radio-inline input[type="radio"] {
    position: absolute;
    margin-top: 4px \9;
    margin-left: -20px;
}
.checkbox-inline + .checkbox-inline, .radio-inline + .radio-inline {
    margin-top: 0;
    margin-left: 10px;
}
.checkbox-inline, .radio-inline {
    display: inline-block;
    padding-left: 20px;
    margin-bottom: 0;
    font-weight: 400;
    vertical-align: middle;
    cursor: pointer;
}
.mandatory {
  background-color: #E6F9FF;
}

.fixed-panel {
  height: 55vh;
  overflow-y: scroll;
}

.box-form{
        padding:20px;
    padding-left:30px;
    padding-right:30px;
        box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
     }
</style>
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
    {{-- </div> --}}
    <!-- end video-bg -->
  </header>
@endsection


@section ('content')
   <section class="text-content-block" style="background: #dbe4e4;">
      <div class="container">
         <div class="row">
            
            <div class="col-12 wow fadeIn" style="position: absolute; top: 0; right: 0; padding: 10px 20px;">
               <div class="title">
                  <h5> 
                     {{-- <i><small><a href="#" onclick="window.history.back();">< back Home </a> </small></i>- {{ $perumahan->name }}</h5> --}}
                     <i><small><a href="{{ route('expoproperty_front.home').'?vid=1' }}">< back Home </a> </small></i>- {{ $perumahan->name }}</h5>
               </div>
            </div>

            <div class="col-lg-6 wow fadeIn vid_profil video-selector">
            @php
               $videoProfile = ($perumahan->profil_video) ? '<iframe id="profileVideo_dev" src="'.$perumahan->profil_video .'?enablejsapi=1&autoplay=1&controls=0&showinfo=0&rel=0&loop=1" frameborder="0" name="youtube embed" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>' : $baseApp['yt_welcome'];

               if( !$base['vid'] ){
                  $videoProfile = str_replace("autoplay=1","autoplay=0", $videoProfile );
               } 
               
               $sosmed = json_decode($perumahan->sosmed);
               if(!$sosmed){
                  $sosmed = [];
               }
            @endphp

               {!! $videoProfile !!}


            </div>
            <!-- end col-4 -->
            <div class="col-lg-6">
               <div class="row inner">
                  <div class="col-12 wow fadeIn">
                     <h2>{{ $perumahan->name }}</h2>
                     <p>{{ $perumahan->prolog }}</p>
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
                           <h5 class="py-1 my-0">
                              <i class="fa {{ $logo }} text-success"></i>&nbsp;{{ $sosKey }}
                           </h5>
                         </a>
                         {{-- &nbsp;&nbsp; --}}
                     @endforeach
                     </div>
                  </div>
               </div>
               <!-- end row inner -->
            </div>
            <!-- end col-8 -->
         </div>
         <!-- end row -->
      </div>
      <!-- end container -->
   </section>

   <section class="contact pt-0">
      <div class="container">
         
         <hr/>
         <div class="row">
               <div class="col-md-8 wow fadeIn">
                  {!! $perumahan->desc !!}
               </div>
                  <!-- end col-5 -->
               <div class="col-md-4 wow fadeIn" data-wow-delay="0.1s">
               {{-- @if($_SERVER['REMOTE_ADDR'] === '202.80.216.49' )
                     @dump( $perumahan->marketing )
               @endif --}}
               @if( count($perumahan->marketing) !== 0 )
                  @foreach ( $perumahan->marketing as $keySales => $sales )
                     @if($sales->telp)
                        <a href="tel:{{ $sales->telp }}" target="_blank" type="button" class="btn btn-primary btn-lg btn-block btn-sm" onclick="gooAnalytic({'telp': '{{ $sales->telp }}' })">
                              <i class="fa fa-phone"></i> 
                              {{ $sales->telp }} <small><i>({{ $sales->name }})</i></small>
                        </a>
                     @endif
                     @if($sales->wa)
                        <a href="https://wa.me/{{ $sales->wa }}?text=Hello" target="_blank" type="button" class="btn btn-success btn-lg btn-block btn-sm" onclick="gooAnalytic({'wa': '{{ $sales->wa }}' })">
                              <i class="fa fa-whatsapp"></i>
                              {{ $sales->wa }} <small><i>({{ $sales->name }})</i></small>
                        </a>
                     @endif
                  @endforeach
               @else
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
                  <hr/>
                  
                  @if($perumahan->brosur)
                  <div class="col-md-12 row" style="text-align: center;margin: auto;">
                     <a href="{{ route('expoproperty_front.viewBrowsur', ['id' => $perumahan->uuid ]) }}" target="_blank" type="button" class="btn btn-warning btn-lg w-100 col-5 mx-1">
                              <small><small>view Brosur</small></small>
                     </a>
                     <a href="{{ route('expoproperty_front.downloadBrowsur', ['id' => $perumahan->uuid ]) }}" type="button" class="btn btn-danger btn-lg w-100 col-6 mx-1">
                              <small><small>Download Brosur</small></small>
                     </a>
                  </div>
                  @endif

                  <br/>
                  <br/>
                  <button type="button" class="btn btn-warning btn-lg btn-block" data-toggle="modal" data-target=".simBNI" onclick="gooAnalytic('modal-simulasi')">Simulasi BNI Griya</button>
                  <button class="btn btn-lg btn-block btn-danger" onclick="window.open('{{ $baseApp['url_form_kredit'] }}');gooAnalytic('eform-bni-direct');">AJUKAN PEMOHON BNI GRIYA</button>
                  <br/>

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
                           </style>
                           
                        </ul>
                  </div>

               </div>

         <div class="row">
         </div>
               <div class="col-12 wow fadeIn">
                  <div class="map" id="map">
                     {!! $perumahan->glocation !!}
                  </div>
               </div>
         </div>
         
      </div>
   </section>

   <section class="team">
		<div class="container">
			<ul>
            @php
               $img_list = ($perumahan->img_list) ? json_decode($perumahan->img_list) : [];
               $img_list = ($img_list) ? $img_list : [];
            @endphp
         @foreach ( $img_list as $kList => $list )
            <a href="{{ env('URL_ENDPOINT').$list->img }}" data-fancybox>
               <li class="wow fadeIn mt-3" data-wow-delay="0.4s">
                     <figure>
                        <figcaption class="pt-0 px-0">
                           <img loading="lazy" src="{{ env('URL_ENDPOINT').$list->img }}" alt="{{ $perumahan->name }}">
                           <small class="pt-2">{{ $list->description ?? $perumahan->name }}</small>
                        </figcaption>
                     </figure>
               </li>
            </a>
         @endforeach
			</ul>


		</div>
		<!-- end container -->
	</section>

   <div class="modal fade devOther" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            {{-- ..... --}}
            <section class="clients pb-0 pt-4">
               <div class="container">
               <h6>Developers & Sponsors</h6>
               <ul>
                  
                  @foreach ( $perumahan_list as $kDev => $vDev )
                     @if($vDev->img_pic)
                        <li style="border:none;cursor: pointer;" onclick="document.location='{{ route('expoproperty_front.dev', ['id' => $vDev->uuid ]) }}';return false;" title="{{ $vDev->name }}">
                              <figure><img loading="lazy" src="{{ env('URL_ENDPOINT').$vDev->img_pic }}" alt="{{ $vDev->name }}" title="{{ $vDev->name }}">
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
            </section>
            {{-- ..... --}}
         </div>
      </div>
   </div>

   {{-- Simulasi BNI --}}
 @include( $base['thema_lock'].'bniSimulasi', ['base' => $base, 'baseApp' => $baseApp ])
   {{-- ./Simulasi BNI --}}

   @if ( $perumahan->siteplan )
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
   @endif
    
@endsection

@section ('link_js')
   <script>

      let heightVid = document.getElementById("profileVideo_dev").offsetWidth      
      document.getElementById("profileVideo_dev").style.width = "100%";
      document.getElementById("profileVideo_dev").style.height = heightVid+"px";
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