@extends( $base['thema_lock'].'master' )

@section('title_admin')
   {{ $event->name }} {{ $event->speaker }}
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

.panel{
    margin-bottom: 0px;
}
.chat-window{
    bottom:0;
    /*position:fixed;*/
    float:right;
    margin-left:10px;
}
.chat-window > div > .panel{
    border-radius: 5px 5px 0 0;
}
.icon_minim{
    padding:2px 10px;
}
.msg_container_base{
  background: #e5e5e5;
  margin: 0;
  padding: 0 10px 10px;
  max-height:300px;
  overflow-x:hidden;
}
.top-bar {
  background: #666;
  color: white;
  padding: 10px;
  position: relative;
  overflow: hidden;
}
.msg_receive{
    padding-left:0;
    margin-left:0;
}
.msg_sent{
    padding-bottom:20px !important;
    margin-right:0;
}
.messages {
  background: white;
  padding: 10px;
  border-radius: 5px;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
  max-width:100%;
}
.messages > p {
    font-size: 13px;
    margin: 0 0 0.2rem 0;
    line-height: 1.5;
  }
.messages > time {
    font-size: 11px;
    color: #ccc;
}
.msg_container {
    padding: 10px;
    overflow: hidden;
    display: flex;
}
img {
    display: block;
    width: 100%;
}
.avatar {
    display: block;
    position: relative;
}
.base_receive > .avatar:after {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    width: 0;
    height: 0;
    border: 5px solid #FFF;
    border-left-color: rgba(0, 0, 0, 0);
    border-bottom-color: rgba(0, 0, 0, 0);
}

.base_sent {
  justify-content: flex-end;
  align-items: flex-end;
}
.base_sent > .avatar:after {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0;
    height: 0;
    border: 5px solid white;
    border-right-color: transparent;
    border-top-color: transparent;
    box-shadow: 1px 1px 2px rgba(black, 0.2); // not quite perfect but close
}

.msg_sent > time{
    float: right;
}

.msg_container_base::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
}

.msg_container_base::-webkit-scrollbar
{
    width: 12px;
    background-color: #F5F5F5;
}

.msg_container_base::-webkit-scrollbar-thumb
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #555;
}

.btn-group.dropup{
    position:fixed;
    left:0px;
    bottom:0;
}

.input-sm {
  height: 30px;
  padding: 5px 10px;
  font-size: 12px;
  line-height: 1.5;
  border-radius: 3px;
}

.panel-footer {
    padding: 10px 15px;
    background-color: #f5f5f5;
    border-top: 1px solid #ddd;
    border-bottom-right-radius: 5px;
    border-bottom-left-radius: 5px;
}

.panel-default > .panel-heading {
    color: #333;
    background-color: #f5f5f5;
    border-color: #ddd;
    border-top-right-radius: 5px;
    border-top-left-radius: 5px;
}
.panel-title {
    margin-top: 0;
    margin-bottom: 0;
    font-size: 16px;
    color: inherit;
}
.guest-name {
  font-style: italic;
}
.image-parent {
  max-width: 40px;
}
@media (max-width:576px) {
  .avatar {display: none;}
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
                     {{-- <i><small><a href="#" onclick="window.history.back();">< back Home </a> </small></i> </h5> --}}
                     <i><small><a href="{{ route('expoproperty_front.home').'?vid=1' }}">< back Home </a> </small></i> </h5>
               </div>
            </div>

            <section class="works pt-0">
                <div class="container">
                    <div class="works-title wow fadeIn mb-3">
                     <h3>{{ $event->name }} </h3>
                     <h6><i>{{ $event->speaker }}</i></h6>
                     <h5>{{ $event->tema }}</h5>
                    </div>
                </div>
            </section>

            <div class="col-sm-12 col-lg-7 wow fadeIn vid_profil video-selector" style="    min-height: 360px;">
              @if (\Carbon\Carbon::now() >= $event->start_event)
                @php
                   $videoProfile = ($event->url_video) ? '<iframe class="w-100" style="    min-height: 360px;" id="profileVideo_dev" src="'.$event->url_video .'?enablejsapi=1&autoplay=1&showinfo=0&rel=0&loop=1" frameborder="0" name="youtube embed" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>' : $baseApp['yt_welcome'];

                   if( !$base['vid'] ){
                      $videoProfile = str_replace("autoplay=1","autoplay=0", $videoProfile );
                   } 
                @endphp
                {!! $videoProfile !!}
              @else
                <div id="countdown"> Tunggu Acara {{ $event->name }} <br/>
                Tanggal <b>{{ $event->start_event }}</b></div>
                <figure>
                    <img loading="lazy" class="w-100 h-100" src="{{ env('URL_ENDPOINT').$event->img_pic }}" alt="{{ $event->name }}">
                </figure>
              @endif
            </div>
            <div class="row chat-window col-sm-12 col-lg-5 mt-5" id="chat_window_1" style="margin-left:10px;">
              <div class="col-xs-12 col-md-12">
                <div class="panel panel-default">
                      <div class="panel-heading top-bar">
                          <div class="col-md-12 col-xs-12">
                              <h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span> Komentar</h3>
                          </div>
                      </div>
                      <div class="panel-body msg_container_base">

                      @foreach ( $event->comment as $commKey  => $comm )

                      @if( auth()->user()->id === $comm->user_by )
                        <div class="row msg_container base_sent">
                            <div class="col-md-10 col-xs-10">
                                <div class="messages msg_sent">
                                    <span class="guest-name">{{ $comm->user->name }}</span>
                                    <p>{{ $comm->msg }}</p>
                                    <time datetime="{{ $comm->created_at }}">
                                        {{-- Timothy • 51 min --}}
                                        {{ $comm->created_at }}
                                      </time>
                                </div>
                            </div>
                            <div class="col-md-2 col-xs-2 avatar">
                                <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">
                            </div>
                        </div>
                      @else
                        <div class="row msg_container base_receive">
                              <div class="col-md-2 col-xs-2 avatar">
                                  <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">
                              </div>
                              <div class="col-md-10 col-xs-10">
                                  <div class="messages msg_receive">
                                      <span class="guest-name">{{ $comm->user->name }}</span>
                                      <p>{{ $comm->msg }}</p>
                                      <time datetime="{{ $comm->created_at }}">
                                        {{-- Timothy • 51 min --}}
                                        {{ $comm->created_at }}
                                      </time>
                                  </div>
                              </div>
                        </div>
                        @endif
                          
                      @endforeach

                          
                      </div>
                      <div class="panel-footer">
                          <span> Nick kamu :<b>{{ auth()->user()->name }}</b></span>
                          <div class="input-group">
                              <input id="btn-input" type="text" class="form-control input-sm chat_input" placeholder="Write your message here..." />
                              <span class="input-group-btn">
                              <button class="btn btn-primary btn-sm" id="btn-chat" onclick="sendMsg()">Send</button>
                              </span>
                          </div>
                      </div>
                    </div>
                </div>
              </div>
              <div class="col-sm-12 col-lg-7 wow fadeIn">
                  {!! $event->desc !!}
               </div>
               <div class="col-sm-12 col-lg-5 wow fadeIn pt-5">
                     <h6 class="text-center"><b>Event Lain</b></h6>
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
               <!-- end row inner -->
            </div>
            <!-- end col-8 -->
         </div>
         <!-- end row -->
      </div>
      <!-- end container -->
   </section>
  
    
@endsection

@section ('link_js')
    {{-- <script src="https://cdn.socket.io/socket.io-3.0.1.min.js"></script> --}}
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>

      // Enable pusher logging - don't include this in production
      Pusher.logToConsole = true;

      var pusher = new Pusher('39f857e4d515543842a5', {
        cluster: 'ap1'
      });

      //var channel = pusher.subscribe('my-channel');
      var channel = pusher.subscribe('{{ $event->uuid }}');
      channel.bind('my-event', function(data) {
        //console.log('____', data)
        addMsg(data.message);
      });
    </script>
    
   <script>

      /*
      let heightVid = document.getElementById("profileVideo_dev").offsetWidth
      document.getElementById("profileVideo_dev").style.width = "100%";
      document.getElementById("profileVideo_dev").style.height = heightVid+"px";
      */

      /*
      $('.video-container').on('click', function(){
        $('video-selector iframe')[0].contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
        // add other code here to swap a custom image, etc
      });
      */
    
    /*
    const socket = io({path: '/webhook'});
    // client-side
    socket.on("connect", () => {
        console.log('____ connect', socket)
    });
    */

      function botomMsg(){
        const d = $('.msg_container_base');
        d.scrollTop(d.prop("scrollHeight"));
        return true;
      }
      function addMsg(t){
        let msg = '';
        if( typeof t.type !== 'undefined' && t.type== {{ auth()->user()->id }} ){
        msg = `
        <div class="row msg_container base_sent">
            <div class="col-md-10 col-xs-10">
                <div class="messages msg_sent">
                    <span class="guest-name">${t.user}</span>
                    <p>${t.msg}</p>
                    <time datetime="${t.time}"> • ${t.time}</time>
                </div>
            </div>
            <div class="col-md-2 col-xs-2 avatar">
                <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">
            </div>
        </div>`;

        } else {

        msg = `
              <div class="row msg_container base_receive">
                    <div class="col-md-2 col-xs-2 avatar">
                        <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">
                    </div>
                    <div class="col-md-10 col-xs-10">
                        <div class="messages msg_receive">
                             <span class="guest-name">${t.user}</span>
                              <p>${t.msg}</p>
                              <time datetime="${t.time}"> • ${t.time}</time>
                        </div>
                    </div>
              </div>
        `;
        }

        $('.msg_container_base').append(msg);
        botomMsg();
      }

      function sendMsg() {
        const q = $('#btn-input').val();
        if(!q){
            alert('Pesan Kosong');
            $('#btn-input').focus();
            return false;
        }
        $('#btn-input').val('');
        
        $.ajax({ 
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url: '{{ route('expoproperty_front.sendComment') }}',type: 'post',
            data: { 'uuid': '{{ $event->uuid  }}', 'msg' : String(q) },
            success: function(t) { 
                //if(t){ addMsg(t); }
             }, 
            error: function(t) { console.log( '___Error', t ) }
        });
        }

      $(document).ready(function() {

        setTimeout(function(){ botomMsg();  }, 1000);
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