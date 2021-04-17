@extends( $base['thema_lock'].'master' )

@section('title_admin')
   {{ $title }} | {{ $baseApp['title'] }}
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
<div class="row">
  <div class="col mb-6">
    <hr class="my-7">
  </div>
</div>
<section class="section section-no-border section-angled bg-light p-0 m-0 ">
	<div class="container">
		<h2 class="mb-0 font-weight-bold text-7"> {{$title}} </h2>
	</div>
</section>
<div class="row">
  <div class="col mb-6">
    <hr class="my-7">
  </div>
</div>

@endsection


@section ('content')
{{-- ################################################# --}}
			<div class="container mt-6 pt-6">

				<div class="row mb-7">
					<div class="col-lg-9">

							<div class="masonry-loader masonry-loader-showing">
								<div class="row products product-thumb-info-list" data-plugin-masonry data-plugin-options="{'layoutMode': 'fitRows'}">
									
{{-- ===================================================== --}}
@foreach ( $product as $pro )
					<div class="col-sm-6 col-lg-4">
						<div class="product mb-0">
							<div class="product-thumb-info border-0 mb-3">


								<div class="addtocart-btn-wrapper">
									<a href="{{ route('expoproperty_front.product', ['id' => $pro->uuid ]) }}" class="text-decoration-none addtocart-btn" data-tooltip data-original-title="Add to Cart">
										<i class="icons icon-eye"></i>
									</a>
								</div>

								<a href="{{ route('expoproperty_front.product', ['id' => $pro->uuid ]) }}">
									<div class="product-thumb-info-image">
										<img alt="" class="img-fluid" src="{{ env('URL_ENDPOINT').$pro->img_pic }}">
									</div>
								</a>
							</div>
							<div class="d-flex justify-content-between">
								<div>
									<a href="{{ route('expoproperty_front.kategoriProduct', ['id' => $pro->cat->uuid ]) }}" class="d-block text-uppercase text-decoration-none text-color-default text-color-hover-primary line-height-1 text-0 mb-1">{{$pro->cat->name}}</a>
									<h3 class="text-3-4 font-weight-normal font-alternative text-transform-none line-height-3 mb-0"><a href="{{ route('expoproperty_front.product', ['id' => $pro->uuid ]) }}" class="text-color-dark text-color-hover-primary">{{ $pro->name }}</a></h3>
								</div>
								<a href="#" class="text-decoration-none text-color-default text-color-hover-dark text-4"><i class="far fa-heart"></i></a>
							</div>
							<div title="Rated 5 out of 5">
								<input type="text" class="d-none" value="5" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'default', 'size':'xs'}">
							</div>
							<p class="price text-3 mb-3">
								<a href="{{ route('expoproperty_front.dev', ['id' => $pro->klinik->uuid ]) }}">
									<span class="amount">{{ $pro->klinik->name }}</span>
								</a>
							</p>
						</div>
					</div>
@endforeach
{{-- ./===================================================== --}}


								</div>
								
								{{-- <div class="row mt-4">
									<div class="col">
										<ul class="pagination float-right">
											<li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-left"></i></a></li>
											<li class="page-item active"><a class="page-link" href="#">1</a></li>
											<li class="page-item"><a class="page-link" href="#">2</a></li>
											<li class="page-item"><a class="page-link" href="#">3</a></li>
											<a class="page-link" href="#"><i class="fas fa-angle-right"></i></a>
										</ul>
									</div>
								</div> --}}

							</div>
						</div>




{{-- ############# Sidebar ##########  --}}


					<div class="col-lg-3">
						<aside class="sidebar">
							<form action="{{ route('expoproperty_front.searchProduct') }}" method="get">
								<div class="input-group mb-3 pb-1">
									<input class="form-control text-1" placeholder="Search..." name="s" id="s" type="text">
									<span class="input-group-append">
										<button type="submit" class="btn btn-dark text-1 p-2"><i class="fas fa-search m-2"></i></button>
									</span>
								</div>
							</form>


							<div class="divider divider-small">
								<hr class="bg-color-grey-scale-4">
							</div>

							<button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target=".devOther" onclick="gooAnalytic('modal-booth-lain')">Lihat booth developer lain</button>

							<hr class="solid my-2">

							<h5 class="font-weight-bold pt-3">Categories</h5>
							<ul class="nav nav-list flex-column">
							@foreach ( $catProduct as $catp )
								<li class="nav-item">
										<a class="nav-link" href="{{ route('expoproperty_front.kategoriProduct', ['id' => $catp->uuid ])}}">{{ $catp->name }}</a>
								</li>
							@endforeach
							</ul>

							<h5 class="font-weight-bold pt-3">Event Pamerpamer.com</h5>
							<ul class="nav nav-list flex-column">
							@foreach ( $event_list as $kDev => $vDev )
								<li class="nav-item" style="border:none;cursor: pointer;" onclick="document.location='{{ route('expoproperty_front.event', ['id' => $vDev->uuid ]) }}';return false;">
									<a>{{ $vDev->name }} - {{ $vDev->tema }}</a>
								</li>
							@endforeach
							</ul>							

						</aside>
					</div>
				</div>
			</div>
{{-- ./################################################# --}}


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
@endsection

@section ('link_js')
   <script src="{{ asset('onefamily/js/views/view.shop.js')}}"></script>
   <script src="{{ asset('onefamily/js/examples.gallery.js')}}"></script>
	
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