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

<section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
	<div class="container">
		<div class="row">

			<div class="col-md-12 align-self-center p-static order-2 text-center">


				<h1 class="text-dark font-weight-bold text-8">{{ $title }}</h1>
				@if($desc)
				<span class="sub-title text-dark">{{ $desc }}</span>
				@endif
			</div>
			<div class="col-md-12 align-self-center order-1">
				<ul class="breadcrumb d-block text-center">
					<li><a href="{{ route('expoproperty_front.home') }}">Home</a></li>
					<li class="active">Promo</li>
				</ul>
			</div>
		</div>
	</div>
</section>

@endsection


@section ('content')
{{-- ################################################# --}}
			<div class="container mt-6 pt-6">

				<div class="row mb-7">
					<div class="col-lg-9 order-lg-1">
{{-- ===================================================== --}}
							<div class="blog-posts">

@foreach ( $promo as $pro )			
								<article class="post post-medium">
									<div class="row mb-3">
										<div class="col-lg-5">
											<div class="post-image">
												<a href="#" onclick="return false;" data-toggle="modal" data-target="#devPromo{{ $pro->id }}">
													<img src="{{ env('URL_ENDPOINT').$pro->img_pic }}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />
												</a>
											</div>
										</div>
										<div class="col-lg-7">
											<div class="post-content">
												<h2 class="font-weight-semibold pt-4 pt-lg-0 text-5 line-height-4 mb-2">
													<a href="#" onclick="return false;" data-toggle="modal" data-target="#devPromo{{ $pro->id }}">{{$pro->name}}</a>
												</h2>
												
												<span>
												<a href="{{ route('expoproperty_front.dev', ['id' => $pro->klinik->uuid ]) }}">
												{{ $pro->klinik->name }},
												</a>
													<i class="far fa-calendar-alt"></i>
													<a href="#">{!! \Carbon\Carbon::parse($pro->start_event)->format("M d, Y") !!}</a>
												</span>
												<br/>
													<b>
													@if($pro->type_promo == 'potongan')
														{!! 'Potongan : ' . $pro->val_promo !!}
													@else 
														{!! 'Potongan : ' . $pro->val_promo . '%' !!}
													@endif 
													</b>
												<br/>

												<div class="divider divider-small">
													<hr class="bg-color-grey-scale-4">
												</div>
												
												{!! $pro->note !!}
												<p>
													<a href="#" class="btn btn-lg btn-success text-4 text-uppercase">Klaim</a>
												</p>


											</div>
										</div>
									</div>
								</article>
@endforeach


								{{-- <ul class="pagination float-right">
									<li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-left"></i></a></li>
									<li class="page-item active"><a class="page-link" href="#">1</a></li>
									<li class="page-item"><a class="page-link" href="#">2</a></li>
									<li class="page-item"><a class="page-link" href="#">3</a></li>
									<a class="page-link" href="#"><i class="fas fa-angle-right"></i></a>
								</ul> --}}

							</div>
{{-- ./===================================================== --}}


					</div>


{{-- ############# Sidebar ##########  --}}


					<div class="col-lg-3 order-lg-2">
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

							<button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target=".devOther" onclick="gooAnalytic('modal-booth-lain')">Lihat booth perusahaan lain</button>

							<hr class="solid my-2">

							<h5 class="font-weight-bold pt-3">Categories</h5>
							<ul class="nav nav-list flex-column">
							@foreach ( $catProduct as $catp )
								<li class="nav-item">
										<a class="nav-link" href="{{ route('expoproperty_front.kategoriProduct', ['id' => $catp->uuid ])}}">{{ $catp->name }}</a>
								</li>
							@endforeach
							</ul>

							<h5 class="font-weight-bold pt-3">Event {{ env('URL_ENDPOINT_NAME') }}</h5>
							<ul class="nav nav-list flex-column">
							@foreach ( $event_list as $kDev => $vDev )
								<li class="nav-item" style="border:none;cursor: pointer;" onclick="document.location='{{ route('expoproperty_front.event', ['id' => $vDev->uuid ]) }}';return false;">
									<a>{{ $vDev->name }} - {{ $vDev->tema }}</a>
								</li>
							@endforeach
							</ul>							

						</aside>
					</div>
{{-- ./################################################# --}}

				</div>
			</div>


{{-- Detail promo --}}
@foreach ( $promo as $pro1 )
<div class="modal fade devPromo" id="devPromo{{ $pro1->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			{{-- ..... --}}
			<section class="pt-4">
				<div class="container mt-4 pt-4 pb-4">

					
						<img src="{{ env('URL_ENDPOINT').$pro1->img_pic }}" class="w-100 img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />
						{!! $pro1->desc !!}
						
						@if($pro1->note)
						<hr class="solid my-2">
						{!! $pro1->note !!}
						@endif

						<hr class="solid my-2">
						
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
@endforeach
{{-- ./Detail promo --}}


	@include( $base['thema_lock'].'modal-booth-lain')
	
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