<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
  <meta name="format-detection" content="telephone=no">
  <meta name="theme-color" content="#f03a37" />
  <title>Event {{ env('APP_NAME')}}</title>
   @include( $base['thema_lock'].'partial.css')


<body data-target="#header" data-spy="scroll" data-offset="100">


   {{-- Event --}}
<div class="row my-1">
  <div class="col mr-6">
    <h5 class="text-color-dark text-uppercase font-weight-bold text-center mb-1">Event</h5>
  </div>
</div>
<div class="owl-carousel owl-theme full-width" data-plugin-options="{'items': 4, 'loop': false, 'nav': true, 'dots': false}">

@foreach ( $event as $kChunksEvent => $vChunksEvent )
    <div>
      <a href="{{ route('expoproperty_front.event', ['id' => $vChunksEvent->uuid ]) }}" target="_blank">
        <span class="thumb-info thumb-info-centered-info thumb-info-no-borders">
          <span class="thumb-info-wrapper">
            <img loading="lazy" src="{{ env('URL_ENDPOINT').$vChunksEvent->img_pic }}" alt="" class="img-fluid" style="height:130px;" />
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

</body>


@include( $base['thema_lock'].'partial.js')

<script>
   $(document).ready(function() {
      $('.owl-carousel').owlCarousel({
         loop:true,
         autoplay:true,
         lazyLoadEager:2,
         lazyLoad:true,
         margin:10,
         responsiveClass:true,
         responsive:{
            0:{
                  items:1,
                  nav:true
            },
            600:{
                  items:3,
                  nav:false
            },
            1000:{
                  items:5,
                  nav:true,
                  loop:false
            }
         }
      })
   })
</script>
</html>