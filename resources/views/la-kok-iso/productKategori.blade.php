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
<section class="bg-dark">
  <div class="container" style="min-height:101px">
    
  </div>
</section>
	<section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
		<div class="container">
		 <div class="row">
			<div class="col-md-12 align-self-center order-1">
				<ul class="breadcrumb d-block text-center">
					<li><a href="{{ route('expoproperty_front.home') }}">Home</a></li>
					<li class="active">Kategori</li>
				</ul>
			</div>
		</div>

			<div class="row">
				<div class="col-md-12 align-self-center p-static order-2 text-center">
					<h1 class="text-dark text-8"> {!! $title !!} </h1>
				</div>
			</div>
		</div>
	</section>
@endsection


@section ('content')
<div class="container py-4">

	<div class="row">
		<div class="col-lg-3">
			<aside class="sidebar">
				<form action="{{ route('expoproperty_front.searchProduct') }}" method="GET">
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

				<h5 class="font-weight-bold pt-4">Categories</h5>
				<ul class="nav nav-list flex-column mb-5">
					@foreach ( $catProduct as $catp )
						<li class="nav-item">
								<a class="nav-link" href="{{ route('expoproperty_front.regionalSlug', ['slug' => $catp->seo_url_slug_en ] )}}">{{ $catp->name }}</a>
						</li>
					@endforeach
				</ul>
				<div class="tabs tabs-dark mb-4 pb-2">
					<h5 class="font-weight-bold pt-3">Event {{ env('URL_ENDPOINT_NAME') }}</h5>
					<ul class="nav nav-list flex-column">
					@foreach ( $event_list as $kDev => $vDev )
						<li class="nav-item" style="border:none;cursor: pointer;" onclick="document.location='{{ route('expoproperty_front.event', ['id' => $vDev->uuid ]) }}';return false;">
							<a>{{ $vDev->name }} - {{ $vDev->tema }}</a>
						</li>
					@endforeach
					</ul>
				</div>
			</aside>
		</div>
		<div class="col-lg-9">
			<div class="blog-posts">
			{{-- ===================================================== --}}
			@foreach ( $product as $pro )
				<article class="post post-medium">
					<div class="row mb-3">
						<div class="col-lg-2">
							<div class="post-image">
							<a href="{{ route('expoproperty_front.product', ['id' => $pro->uuid ]) }}">
									<img @if($pro->img_pic) src="{{ env('URL_ENDPOINT').$pro->img_pic }}"  @else src="{{ env('URL_ENDPOINT').$baseApp['default_logo_comapny'] }}" @endif class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0 m-auto" alt="" />
								</a>
							</div>
						</div>
						<div class="col-lg-10">
							<div class="post-content">
								<h2 class="font-weight-semibold pt-4 pt-lg-0 text-5 line-height-4 mb-2">
									<a href="{{ route('expoproperty_front.product', ['id' => $pro->uuid ]) }}">{{ $pro->name }}</a>
								</h2>
								<div class="post-meta">
									<span>
										<i class="far fa-calendar-alt"></i>
										{!! \Carbon\Carbon::parse($pro->updated_at)->format("M d, Y") !!}
									</span>
									<span><i class="far fa-user"></i> By <a href="{{ route('expoproperty_front.dev', ['id' =>( isset( $pro->company->uuid) ? $pro->company->uuid : '' ) ]) }}">{{ $pro->company->name ?? '-' }}</a> </span>
									@php
										try {
											$py = $pro->catLike();
										} catch (\Throwable $th) {
											$py = [];
											dump($th);
										}
									@endphp
									<br/>
									@foreach ($py as $pyV )
										<span>
											<i class="far fa-folder"></i>
											<a href="{{ route('expoproperty_front.regionalSlug', ['slug' => $pyV->seo_url_slug_en ]) }}?vid=1">{{ $pyV->name }}</a>
										</span>
									@endforeach
									
								</div>
							</div>
						</div>
					</div>
				</article>
				@endforeach
				{{-- ./===================================================== --}}
				

				{{-- <ul class="pagination float-right">
					<li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-left"></i></a></li>
					<li class="page-item active"><a class="page-link" href="#">1</a></li>
					<li class="page-item"><a class="page-link" href="#">2</a></li>
					<li class="page-item"><a class="page-link" href="#">3</a></li>
					<a class="page-link" href="#"><i class="fas fa-angle-right"></i></a>
				</ul> --}}

				@if( isset($product->onEachSide) )
					{{ $product->links('vendor.pagination.row3-bootstrap-4') }}
				@else
					{{ '______' }}
				@endif

			</div>
		</div>
	</div>

</div>

@include( $base['thema_lock'].'modal-booth-lain')

@endsection
