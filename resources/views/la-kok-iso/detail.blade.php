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
{{-- style="background-image: url({{ env('URL_ENDPOINT').$perumahan->siteplan }}); background-size: auto; background-position: center;" --}}
<section id="blog" class="section section-with-shape-divider custom-bg-color-1 border-0 m-0"
style="background-image: url({{ env('URL_ENDPOINT').$baseApp['bg_login'] }}); background-size: cover; background-position: center;"
>

<div class="container py-5 mt-3 ">
    <div class="row align-items-center justify-content-center" style="margin-bottom: 8em;">
      <div class="col-lg-6 mb-0 mb-lg-0">
        <div class="position-relative">
          {{-- <div class="custom-shape-1 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="500">
            <div class="position-absolute top-0 left-0 right-0 bottom-0 bg-primary" data-plugin-float-element data-plugin-options="{'startPos': 'top', 'speed': 0.1, 'transition': true, 'transitionDuration': 400, 'isInsideSVG': true}"></div>
          </div> --}}
          <div data-plugin-float-element data-plugin-options="{'startPos': 'top', 'speed': 0.3, 'transition': true, 'transitionDuration': 600, 'isInsideSVG': true}">
          
          {{-- Video --}}
            {{-- <img src="img/demos/law-firm-2/generic/generic-1.jpg" class="img-fluid position-relative z-index-1 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="900" alt="" /> --}}
          <div class="video-bg">
            <div class="video-background">
                <div class="video-foreground video-selector">
                
                @php
               
               if( substr_count( $perumahan->profil_video, "watch?v=") ){
                  $perumahan->profil_video = str_replace("watch?v=","embed/", $perumahan->profil_video );
               }

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
                                 if( substr_count( $sosKey, "http") ){
                                    $url = $sosKey;
                                 } else {
                                    $url = 'https://'.$sosKey;
                                 }
                                 break;

                              case 'website':
                                 $logo = 'fa-globe';
                                 if( substr_count( $sosKey, "http") ){
                                    $url = $sosKey;
                                 } else {
                                    $url = 'https://'.$sosKey;
                                 }
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

         <path class="custom-svg-fill-color-secondary" fill="#ffffff" d="M-39,233c18.45-5.57,45.76-13.68,79-23c65.89-18.48,100.28-28.12,140-36c64.67-12.83,115.09-15.35,151-17
            c72.37-3.33,126.81,0.97,200,7c21.78,1.79,35.05,3.15,147,16c185.79,21.33,205.66,24.08,252,27c85.5,5.38,150.46,4.35,168,4
            c48.7-0.96,73.47-3.33,246-19c174.43-15.84,185.89-16.75,211-18c76.46-3.81,133.48-3.48,217-3c83.26,0.48,125.58,2.59,166,6
            c37.33,3.15,68.3,7,90,10c0,28.67,0,57.35,0,86.02c-688.33,0-1376.67,0-2065,0C-37.67,259.68-38.33,246.34-39,233z" style="fill:#f2f2f2 !important;"/>
      </svg>
   </div>
</section>
@endsection


@section ('content')
   

   <section class="contact pt-0">
      <div class="container">
         
         <div class="row">
            <div class="col-md-2 text-center">
                  <img class="img-fluid scale-2 m-auto" loading="lazy" @if($perumahan->img_pic) src="{{ env('URL_ENDPOINT').$perumahan->img_pic }}"  @else src="{{ env('URL_ENDPOINT').$baseApp['default_logo_comapny'] }}" @endif  alt="{{ $perumahan->name }}">
            </div>
            
            @php
               $img_list = ($perumahan->img_list) ? json_decode($perumahan->img_list) : [];
               $img_list = ($img_list) ? $img_list : [];
            @endphp
            @if( count($img_list) )
            <div class="col-md-6">
                     <div class="owl-carousel owl-theme dots-morphing  mt-4" data-plugin-options="{'responsive': {'0': {'items': 1}, '479': {'items': 1}, '768': {'items': 2}, '979': {'items': 3}, '1199': {'items': 3}}, 'loop': false, 'autoHeight': true, 'margin': 10, 'nav': true, 'dots': false }">
                        @foreach ( $img_list as $kList => $list )
                           <div class="m-auto">
                              <img alt="" class="img-fluid" src="{{ env('URL_ENDPOINT').$list->img }}" title="{{ $list->description ?? $perumahan->name }}">
                           </div>
                        @endforeach
							</div>
            </div>
            @endif

            <div class="col-md-4 @if( !count($img_list) ) ml-5 @endif">
               <p class="text-header mt-4 mb-0">{!! $perumahan->alamat !!}</p>
            </div>
         </div>
         
         <hr/>
         <div class="row">
               <div class="col-lg-9 wow fadeIn">
                  {!! $perumahan->desc !!}



               @php
                     $extra = [];
               
               /*
                     $extra['location'] = [
                        'icon' => '
            <svg class="_3whuHPmGZhGiaL3OQ6KH5l _1QmKCaFRjRQWwXKECQble1" version="1.1" id="Layer_1"
					xmlns="http://www.w3.org/2000/svg" x="0" y="0" viewBox="0 0 40 58" xml:space="preserve" focusable="false">
					<style>.st0{fill:#f2f2f2}</style>
					<path class="st0" d="M11.9 12.8H17v5.1h-5.1zM11.9 23.7H17v5.1h-5.1zM11.9 35.1H17v5.1h-5.1z"></path>
					<g>
						<path class="st0" d="M22.9 12.8H28v5.1h-5.1zM22.9 23.7H28v5.1h-5.1zM22.9 35.1H28v5.1h-5.1z"></path>
					</g>
					<g>
						<path class="st0" d="M33.8 4.2H1.1v52.4h37.6V4.2h-4.9zm0 47.5h-8.3v-6H14.6v6H6V9.1h27.8v42.6z"></path>
						<path class="st0" d="M.6 4.6L5.2.5h29.2l4.8 4.3z"></path>
					</g>
				</svg>
                        ',
                        'title' => 'Location',
                        'desc' => '<p class="_2VUHEvZBE00PkfHVPj0A5k">Jalan Jendral Ahmad Yani , Jakarta no 79</p>',
                     ];
      // ===============  ========================

      
                     $extra['website'] = [
                        'icon' => '
            <svg class="_3whuHPmGZhGiaL3OQ6KH5l _3Z_LOJHmDclz5elTmMJwu1"
					xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.73 28.73" focusable="false">
					<defs>
						<style>.website-icon{fill:#f2f2f2;fill-rule:evenodd}</style>
					</defs>
					<g id="Layer_2" data-name="Layer 2">
						<g id="Layer_1-2" data-name="Layer 1">
							<path class="website-icon" d="M18.33 8.42l-9.91 9.91a1.4 1.4 0 102 2l9.92-9.92a1.4 1.4 0 00-2-2"></path>
							<path class="website-icon" d="M14.37 2.46a8.4 8.4 0 00-2.18 8.13l2.54-2.53a5.51 5.51 0 011.62-3.61 5.61 5.61 0 111.12 8.79l-2 2a8.41 8.41 0 10-1.1-12.78M14.37 26.27a8.42 8.42 0 002.17-8.13L14 20.67a5.52 5.52 0 01-1.63 3.61 5.61 5.61 0 11-1.12-8.79l2-2a8.41 8.41 0 101.08 12.81"></path>
						</g>
					</g>
				</svg>
                        ',
                        'title' => 'Website',
                        'desc' => '
            <p class="_2VUHEvZBE00PkfHVPj0A5k">
               <a class="r1gHLKfN7vCbDnBPvvF3d" href="http://www.gudanggaramtbk.com">gudanggaramtbk.com</a>
            </p>',
                     ];
      // ===============  ========================
      */

      if($perumahan->company_size){
                     $extra['companySize'] = [
                        'icon' => '
            <svg class="_3whuHPmGZhGiaL3OQ6KH5l _3Z_LOJHmDclz5elTmMJwu1"
					xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32.07 25.96" focusable="false">
					<defs>
						<style>.companysize-icon{fill:#f2f2f2}</style>
					</defs>
					<g id="Layer_2" data-name="Layer 2">
						<g id="Layer_1-2" data-name="Layer 1">
							<g id="_170320-Reviews" data-name="170320-Reviews">
								<g id="CRDB-Overview-LimitedInfo">
									<g id="Group-18">
										<g id="Group-14">
											<path id="Fill-1" class="companysize-icon" d="M9.83 4.45A1.85 1.85 0 108 2.6a1.85 1.85 0 001.83 1.85"></path>
											<path id="Fill-3" class="companysize-icon" d="M22.23 4.45a1.85 1.85 0 10-1.85-1.85 1.85 1.85 0 001.85 1.85"></path>
											<path id="Fill-5" class="companysize-icon" d="M9.16 13.55a.49.49 0 000-.12l-1-5a1 1 0 00-1-.8H1.92a1 1 0 00-1 .79L0 13.44a.37.37 0 000 .11.66.66 0 000 .14 1 1 0 001 1 1 1 0 001-.8l.6-3.77v12a.92.92 0 00.92 1c.36 0 .78-.19.78-.49v-6.57c0-.13.21-.23.34-.23s.33.1.33.23v6.45c0 .34.44.57.84.57a1 1 0 00.94-1v-12l.6 3.77a1 1 0 001.92-.17.66.66 0 000-.14M4.59 7A2.08 2.08 0 102.5 5a2.08 2.08 0 002.09 2"></path>
											<path id="Fill-7" class="companysize-icon" d="M32.05 13.55a.25.25 0 000-.12l-1-5a1 1 0 00-1-.8h-5.24a1 1 0 00-1 .79l-1 5.07a.2.2 0 000 .11v.14a1 1 0 001 1 1 1 0 001-.8l.6-3.77v12a1 1 0 00.95 1c.36 0 .81-.2.81-.49v-6.62c0-.13.21-.23.34-.23s.33.1.33.23v6.45c0 .34.41.57.81.57a.94.94 0 00.93-1v-12l.6 3.77a1 1 0 00.94.8 1 1 0 001-1 .68.68 0 000-.14M27.48 7a2.08 2.08 0 10-2.09-2 2.08 2.08 0 002.09 2"></path>
											<path id="Fill-9" class="companysize-icon" d="M21.91 13.71a.38.38 0 000-.15L20.69 7a1.3 1.3 0 00-1.23-1.11H12.6A1.3 1.3 0 0011.37 7l-1.23 6.54a.47.47 0 000 .17 1.09 1.09 0 000 .18 1.25 1.25 0 002.48.23l.77-4.84v15.43A1.24 1.24 0 0014.62 26a1.38 1.38 0 001.07-.63v-8.4a.34.34 0 01.68 0v8.29c0 .44.59.74 1.1.74a1.23 1.23 0 001.23-1.25V9.31l.77 4.84a1.24 1.24 0 002.47-.22 1.09 1.09 0 000-.18M16 5.35a2.68 2.68 0 10-2.67-2.67A2.68 2.68 0 0016 5.35"></path>
										</g>
									</g>
								</g>
							</g>
						</g>
					</g>
				</svg>
                        ',
                        'title' => 'Company Size',
                        'desc' => '
             <p class="_2VUHEvZBE00PkfHVPj0A5k">
               <span>'.$perumahan->company_size.'</span>
            </p>',
                     ];
      }
      // ===============  ========================




      if($perumahan->benefits){
                     $extra['benefits'] = [
                        'icon' => '
            <svg class="_3whuHPmGZhGiaL3OQ6KH5l _1QmKCaFRjRQWwXKECQble1"
					xmlns="http://www.w3.org/2000/svg" viewBox="0 0 23.93 23.99" focusable="false">
					<defs>
						<style>.benefits-icon{fill:#f2f2f2}</style>
					</defs>
					<g id="Layer_2" data-name="Layer 2">
						<g id="Layer_1-2" data-name="Layer 1">
							<g id="Symbols">
								<g id="gratuity">
									<path id="Fill-1" class="benefits-icon" d="M7.55 4.44h1a7 7 0 00-.64-1.79 1 1 0 00-.69-.27 1 1 0 00-.73.3 1 1 0 000 1.41 3.73 3.73 0 00.81.35zM7.17 0a3.35 3.35 0 012.4 1c.82.82 1.37 3.21 1.68 4.92-.06.33-.1.64-.14.9H6.84a5.23 5.23 0 01-2.08-1A3.4 3.4 0 017.17 0z"></path>
									<path id="Fill-3" class="benefits-icon" d="M16.07 2.65a1 1 0 01.69-.27 1 1 0 01.76 1.71 3.73 3.73 0 01-.81.35h-1.28a7 7 0 01.64-1.79zm-.87 4.17h1.89a5.23 5.23 0 002.08-1A3.4 3.4 0 0016.76 0a3.35 3.35 0 00-2.4 1c-.82.82-1.37 3.21-1.68 4.92.06.33.1.64.14.9z"></path>
									<path id="Fill-5" class="benefits-icon" d="M1.59 23.99h9.53v-9.33H1.59v9.33z"></path>
									<path id="Fill-7" class="benefits-icon" d="M0 13.07h11.12V8.09H0v4.98z"></path>
									<path id="Fill-8" class="benefits-icon" d="M12.81 8.71v4.36h11.12V8.09H12.81v.62z"></path>
									<path id="Fill-9" class="benefits-icon" d="M12.81 23.99h9.53v-9.33h-9.53v9.33z"></path>
								</g>
							</g>
						</g>
					</g>
				</svg>
                        ',
                        'title' => 'Benefits',
                        'desc' => '<p class="_2VUHEvZBE00PkfHVPj0A5k">'.$perumahan->benefits.'</p>',
                     ];
      }
      // ===============  ========================




      if($perumahan->dress_code){
                     $extra['dressCode'] = [
                        'icon' => '
            <svg class="_3whuHPmGZhGiaL3OQ6KH5l _3Z_LOJHmDclz5elTmMJwu1"
					xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32.4 22.92" focusable="false">
					<g data-name="Layer 2">
						<g data-name="Layer 1">
							<path d="M28.94 20.84H3.82c-.5 0-1.29-.08-1.26-.8a1.63 1.63 0 01.65-1.11l13.17-7.63 13.13 7.63A1.74 1.74 0 0130.2 20c0 .69-.76.8-1.26.8m2.95-2.38c-.94-.94-14.54-8.92-14.68-9h-.07V8.06c.18-.18.4-.32.61-.5 1-.79 2.16-1.76 2.16-3.56a3.94 3.94 0 00-4-4 3.78 3.78 0 00-4 3.78 1.48 1.48 0 00.25.83 1.07 1.07 0 001 .36c.68-.08.79-.72.79-1.41v-.18A1.93 1.93 0 0116 2a2 2 0 012 2c0 1-.21 1.47-1.65 2.19a1.51 1.51 0 00-1 1.55v1.73h-.11c-.14.08-13.74 8.06-14.68 9a3.09 3.09 0 00-.25 3 2.3 2.3 0 002.3 1.47h27.23a2.3 2.3 0 002.3-1.47 3.09 3.09 0 00-.25-3" fill="#f2f2f2" data-name="170320-Reviews"></path>
						</g>
					</g>
				</svg>
                        ',
                        'title' => 'Dress code',
                        'desc' => '<p class="_2VUHEvZBE00PkfHVPj0A5k">'.$perumahan->dress_code.'</p>',
                     ];
      }
      // ===============  ========================



      if($perumahan->spoken_language){
                     $extra['spokenLanguage'] = [
                        'icon' => '
            <svg class="_3whuHPmGZhGiaL3OQ6KH5l _35t9h5M82kkZn2cNqHnCrY"
					xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.2 28.8" focusable="false">
					<g data-name="Layer 2">
						<g data-name="Layer 1">
							<path d="M21.15 16.14a1.76 1.76 0 111.76-1.76 1.74 1.74 0 01-1.76 1.76m-7 0a1.76 1.76 0 111.76-1.76 1.74 1.74 0 01-1.76 1.76m-7.16 0a1.76 1.76 0 111.77-1.76 1.77 1.77 0 01-1.77 1.76m21.23-3A14.1 14.1 0 104.76 24.67a10.67 10.67 0 01-2.33 2.89.71.71 0 00.46 1.24 12.17 12.17 0 006.17-1.48 13.88 13.88 0 007.54.7 14.24 14.24 0 0011.57-14.88" fill="#f2f2f2" data-name="170320-Reviews"></path>
						</g>
					</g>
				</svg>
                        ',
                        'title' => 'Spoken language',
                        'desc' => '<p class="_2VUHEvZBE00PkfHVPj0A5k">'.$perumahan->spoken_language.'</p>',
                     ];
      }
      // ===============  ========================



      if($perumahan->work_hours){
                     $extra['workHours'] = [
                        'icon' => '
            <svg class="_3whuHPmGZhGiaL3OQ6KH5l _3Z_LOJHmDclz5elTmMJwu1"
					xmlns="http://www.w3.org/2000/svg" viewBox="0 0 29.76 32.08" focusable="false">
					<defs>
						<style>.workinghours-icon{fill:#f2f2f2}</style>
						<mask id="mask" x="0" y="0" width="29.76" height="32.08" maskUnits="userSpaceOnUse">
							<g id="mask-2">
								<path id="path-1" class="workinghours-icon" d="M29.76 0H0v32.08h29.76V0z"></path>
							</g>
						</mask>
					</defs>
					<g id="Layer_2" data-name="Layer 2">
						<g id="Layer_1-2" data-name="Layer 1">
							<g id="_170320-Reviews" data-name="170320-Reviews">
								<g id="CRDB-Overview-LimitedInfo">
									<g id="Group-20">
										<g mask="url(#mask)" id="Page-1">
											<path id="Fill-1" class="workinghours-icon" d="M18 18.83l-2.1-2.11v-3.25a.93.93 0 00-1.86 0v4l2.65 2.65a.91.91 0 001.3.12.92.92 0 00.14-1.24.68.68 0 00-.12-.12zm4.61-1.72A7.64 7.64 0 1115 9.47a7.64 7.64 0 017.63 7.64zM26 9.16a1.44 1.44 0 102 .54 1.45 1.45 0 00-2-.54zm-2.4-1a1.45 1.45 0 10-.92-.33 1.45 1.45 0 00.92.33zm3.3 7.06a1.47 1.47 0 001.42 1.22h.23a1.45 1.45 0 10-1.64-1.22zM21.21 3.83a.93.93 0 01-.37.72l-4.11 2.94a.89.89 0 01-1.24-.21.93.93 0 01-.16-.51V5a1.51 1.51 0 01-.36.06 12.07 12.07 0 1011.82 14.5 1.45 1.45 0 012.87.34 2 2 0 01-.05.24A15 15 0 1115 2.16a1.36 1.36 0 01.36 0V.88a.89.89 0 011.4-.72l4.11 2.95a.91.91 0 01.38.72z"></path>
										</g>
									</g>
								</g>
							</g>
						</g>
					</g>
				</svg>
                        ',
                        'title' => 'Work hours',
                        'desc' => '<p class="_2VUHEvZBE00PkfHVPj0A5k">'.$perumahan->work_hours.'</p>',
                     ];
      }

               @endphp

               {{-- ######################## --}}
   <div class="row my-4 py-3 ">
      {{-- =============== Extra ======================== --}}
      @foreach ( $extra as $vExtra )
         <div class="col-md-4 row">
            <div class="col-md-4">
               {!! $vExtra['icon'] !!}
            </div>
            <div class="col-md-8">
               <h4 class="_20_RFwflXkbrxAcEmd-yl7">{{ $vExtra['title'] }}</h4>
               {!! $vExtra['desc'] !!}
            </div>
         </div>
      @endforeach
      {{-- =============== ./Extra ======================== --}}

   </div>



   <div class="row">
      <div class="col mb-1">
         <h2 class="text-color-dark text-uppercase font-weight-bold text-left mb-1 ml-2">Jobs</h2>
         <hr class="my-1">
      </div>
   </div>
   

   <div class="row my-4 py-3 ">

   @foreach ( $perumahan->jobs as $job )
      <div class="mx-auto my-3 px-3 card bg-color-grey card-text-color-hover-light border-0 bg-color-hover-primary transition-2ms box-shadow-1 box-shadow-1-primary box-shadow-1-hover" onclick="document.location='{{ route('expoproperty_front.product', ['id' => $job->uuid ])}}';return false;">
         <div class="card-body">
            <h4 class="card-title mb-1 text-4 font-weight-bold transition-2ms">{{ $job->name }}</h4>
            <p class="card-text transition-2ms">Location : {{ $job->penempatan }}</p>
         </div>
      </div>
   @endforeach

   </div>

               {{-- ./######################## --}}

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

                  <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target=".devOther" onclick="gooAnalytic('modal-booth-lain')">Lihat booth perusahaan lain</button>

                  <div class="col-sm-12 wow fadeIn pt-5">
                        <h6 class="text-center"><b>Event {{ env('APP_NAME') }}</b></h6>
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


@include( $base['thema_lock'].'modal-booth-lain')

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