@extends( $base['thema_lock'].'master' )

@section('title_admin')
   {{ $productDetail->name }} | {{ $baseApp['title'] }}
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
@endsection


@section ('content')
{{-- ################################################# --}}
			<div class="container mt-6 pt-6">

				<div class="row mb-7">
					<div class="col-lg-9">

						<div class="row">
							<div class="col-lg-6">

								<div class="thumb-gallery-wrapper">
									<div class="thumb-gallery-detail owl-carousel owl-theme manual nav-inside nav-style-1 nav-dark mb-3">
                              
                              <div>
											<img alt="" class="img-fluid" src="{{ env('URL_ENDPOINT').$productDetail->img_pic }}" data-zoom-image="{{ env('URL_ENDPOINT').$productDetail->img_pic }}" />
										</div>

									</div>
									<div class="thumb-gallery-thumbs owl-carousel owl-theme manual thumb-gallery-thumbs">
										
                              <div class="cur-pointer">
											<img alt="" class="img-fluid" src="{{ env('URL_ENDPOINT').$productDetail->img_pic }}" />
										</div>
                              

									</div>
								</div>

							</div>

							<div class="col-lg-6">

								<div class="summary entry-summary position-relative">

									<h1 class="mb-0 font-weight-bold text-7">
                           <a href="{{ route('expoproperty_front.dev', ['id' => $productDetail->klinik->uuid ]) }}" class="text-decoration-none text-color-dark text-color-hover-primary border-color-hover-primary font-weight-light" data-tooltip data-original-title="{{$productDetail->klinik->name}}"><i class="fas fa-chevron-left"></i></a>&nbsp;&nbsp;&nbsp;
                           {{$productDetail->name}}
                           </h1>

									<div class="pb-0 clearfix d-flex align-items-center">
										<div title="Rated 3 out of 5" class="float-left">
											<input type="text" class="d-none" value="3" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'primary', 'size':'xs'}">
										</div>

										<div class="review-num">
											<a href="{{ route('expoproperty_front.dev', ['id' => $productDetail->klinik->uuid ]) }}" class="text-decoration-none text-color-default text-color-hover-primary" data-hash data-hash-offset="75" data-hash-trigger-click=".nav-link-reviews" data-hash-trigger-click-delay="1000">
                                 {{$productDetail->klinik->name}}
											</a>
										</div>
									</div>

									<div class="divider divider-small">
										<hr class="bg-color-grey-scale-4">
									</div>

									<p class="price mb-3">
										<span class="sale text-color-dark">{{$productDetail->cat->name}}</span>
									</p>

									<p class="text-3-4 mb-3">{{$productDetail->prolog}}</p>


									<div class="d-flex align-items-center">
										<ul class="social-icons social-icons-medium social-icons-clean-with-border social-icons-clean-with-border-border-grey social-icons-clean-with-border-icon-dark mr-3 mb-0">
											<!-- Facebook -->
											<li class="social-icons-facebook">
												<a href="http://www.facebook.com/sharer.php?u={{ url()->full() }}" target="_blank" data-toggle="tooltip" data-placement="top" title="Share On Facebook">
													<i class="fab fa-facebook-f"></i>
												</a>
											</li>
											<!-- Google+ -->
											<li class="social-icons-googleplus">
												<a href="https://plus.google.com/share?url={{ url()->full() }}" target="_blank" data-toggle="tooltip" data-placement="top" title="Share On Google+">
													<i class="fab fa-google-plus-g"></i>
												</a>
											</li>
											<!-- Twitter -->
											<li class="social-icons-twitter">
												<a href="https://twitter.com/share?url={{ url()->full() }}&amp;text={{ env('APP_NAME') }}&amp;hashtags={{ env('APP_NAME') }}" target="_blank" data-toggle="tooltip" data-placement="top" title="Share On Twitter">
													<i class="fab fa-twitter"></i>
												</a>
											</li>
											<!-- Email -->
											<li class="social-icons-email">
												<a href="mailto:?Subject=Share This Page&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20 {{ url()->full() }}" data-toggle="tooltip" data-placement="top" title="Share By Email">
													<i class="far fa-envelope"></i>
												</a>
											</li>
										</ul>
										<a href="#" class="d-flex align-items-center text-decoration-none text-color-dark text-color-hover-primary font-weight-semibold text-2">
											<i class="far fa-heart mr-1"></i> SAVE TO WISHLIST
										</a>
									</div>

								</div>

							</div>
						</div>

						<div class="row mt-6">
							<div class="col">
								<div id="description" class="tabs tabs-simple tabs-simple-full-width-line tabs-product tabs-dark mb-2">
									<ul class="nav nav-tabs justify-content-start">
										<li class="nav-item active"><a class="nav-link active font-weight-bold text-3-4 text-uppercase py-2 px-3" href="#productDescription" data-toggle="tab">Description</a></li>
									</ul>
									<div class="tab-content p-0">
										
                              <div class="tab-pane px-0 py-3 active" id="productDescription">
												<span>
													{!! $productDetail->desc !!}
												</span>
										</div>
										
									</div>
								</div>
							</div>
						</div>

						<hr class="solid my-5">

						@if( $productDetail->klinik->product && count($productDetail->klinik->product) > 0)
						<h4 class="mb-3 mt-5"> <strong>Products</strong> Lain</h4>
						<div class="products row">
							<div class="col">
								<div class="owl-carousel owl-theme show-nav-title nav-dark mb-0" data-plugin-options="{'loop': false, 'autoplay': false,'items': 4, 'nav': true, 'dots': false, 'margin': 20, 'autoplayHoverPause': true, 'autoHeight': true}">
                        

                        
                     @foreach ( $productDetail->klinik->product as $product )
                        @if($product->id !== $productDetail->id)
									<div class="product mb-5">
										<div class="product-thumb-info border-0 mb-3">

											<div class="addtocart-btn-wrapper">
												<a href="{{ route('expoproperty_front.product', ['id' => $product->uuid ]) }}" class="text-decoration-none addtocart-btn" data-tooltip data-original-title="view detail">
													<i class="icons icon-eye"></i>
												</a>
											</div>

											<a href="{{ route('expoproperty_front.product', ['id' => $product->uuid ]) }}">
												<div class="product-thumb-info-image">
													<img alt="" class="img-fluid" src="{{ env('URL_ENDPOINT').$product->img_pic }}">

												</div>
											</a>
										</div>
										<div class="d-flex justify-content-between">
											<div>
												<a href="{{ route('expoproperty_front.product', ['id' => $product->uuid ]) }}" class="d-block text-uppercase text-decoration-none text-color-default text-color-hover-primary line-height-1 text-0 mb-1">{{$product->cat->name}}</a>
												<h3 class="text-3-4 font-weight-normal font-alternative text-transform-none line-height-3 mb-0"><a href="shop-product-sidebar-right.html" class="text-color-dark text-color-hover-primary">{{$product->name}}</a></h3>
											</div>
											<a href="#" class="text-decoration-none text-color-default text-color-hover-dark text-4"><i class="far fa-heart"></i></a>
										</div>
										<div title="Rated 5 out of 5">
											<input type="text" class="d-none" value="5" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'default', 'size':'xs'}">
										</div>
									</div>
                        @endif                 
                     @endforeach



								</div>
							</div>
						</div>
						@endif

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

							@if( $productDetail->klinik->marketing && count($productDetail->klinik->marketing) !== 0 )
								@foreach ( $productDetail->klinik->marketing as $keySales => $sales )
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
								@if ( $productDetail->klinik->marketingAll )
									@foreach ( $productDetail->klinik->marketingAll as $keySales1 => $sales2 )
										@if($sales2->telp)
											<a href="tel:{{ $sales2->telp }}" target="_blank" type="button" class="btn btn-primary btn-lg btn-block btn-sm" onclick="gooAnalytic({'telp': '{{ $sales2->telp }}' })">
													<i class="fa fa-phone"></i> 
													{{ $sales2->telp }} <small><i>({{ $sales2->name }})</i></small>
											</a>
										@endif
										@if($sales2->wa)
											<a href="https://wa.me/{{ $sales2->wa }}?text={{ urlencode(env('TEXT_WA', 'Helo')) }}" target="_blank" type="button" class="btn btn-success btn-lg btn-block btn-sm" onclick="gooAnalytic({'wa': '{{ $sales2->wa }}' })">
													<i class="fa fa-whatsapp"></i>
													{{ $sales2->wa }} <small><i>({{ $sales2->name }})</i></small>
											</a>
										@endif
									@endforeach
								@endif
							@endif

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