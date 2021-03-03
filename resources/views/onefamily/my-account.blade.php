@extends( $base['thema_lock'].'master' )

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
                     <i><small><a href="#" onclick="window.history.back();">< back Home </a> </small></i> </h5>
               </div>
            </div>

            <div class="col-lg-6 wow fadeIn vid_profil video-selector">
               <img loading="lazy" src="{{ env('URL_ENDPOINT').$base['logo'] }}" alt="{{ $baseApp['title'] }}">
            </div>
            <!-- end col-4 -->
            <div class="col-lg-6">
               <div class="row inner">
                  <div class="col-12 wow fadeIn">
                     <h5 id="accountName">{{ $account->name }}</h5>
                     <hr/>
                     <div class="form-group">
                        <label>Name</label>
                        <input id="formName" value="{{ $account->name }}" type="text" class="form-control height-login form-registrasi" name="name" placeholder="name" required>
                     </div>
                     <div class="form-group">
                        <label>No. whatsApp</label>
                        <input id="formWa" value="{{ $account->wa }}" type="text" class="form-control height-login form-registrasi" name="wa" placeholder="whatsApp" required>
                     </div>

                     <a href="{{ route('logout') }}" class="btn btn-danger btn-lg btn-block">Logout</a>

                     <button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target=".devOther">Lihat booth developer</button>
                         {{-- &nbsp;&nbsp; --}}
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
                        <li style="border:none;cursor: pointer;" onclick="document.location='{{ route('expoproperty_front.dev', ['id' => $vDev->uuid ]) }}';return false;">
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
            </section>
            {{-- ..... --}}
         </div>
      </div>
   </div>

  
    
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
      });
   </script>
@endsection