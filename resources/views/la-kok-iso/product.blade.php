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
					<li class="active">Job</li>
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



	{{-- ############# end Sidebar ##########  --}}
				<div class="col-lg-3 float-right">
						<aside class="sidebar">
							<form action="{{ route('expoproperty_front.searchProduct') }}" method="get">
								<div class="input-group mb-3 pb-1">
									<input class="form-control text-1" placeholder="Search..." name="s" id="s" type="text">
									<span class="input-group-append">
										<button type="submit" class="btn btn-dark text-1 p-2"><i class="fas fa-search m-2"></i></button>
									</span>
								</div>
							</form>

							@if( $productDetail->company->marketing && count($productDetail->company->marketing) !== 0 )
								@foreach ( $productDetail->company->marketing as $keySales => $sales )
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
								@if ( $productDetail->company->marketingAll )
									@foreach ( $productDetail->company->marketingAll as $keySales1 => $sales2 )
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

							<button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target=".devOther" onclick="gooAnalytic('modal-booth-lain')">Lihat booth perusahaan lain</button>

							<hr class="solid my-2">

							<h5 class="font-weight-bold pt-3">Categories</h5>
							<ul class="nav nav-list flex-column">
							@foreach ( $catProduct as $catp )
								<li class="nav-item">
										<a class="nav-link" href="{{ route('expoproperty_front.regionalSlug', ['slug' => $catp->seo_url_slug_en ] )}}">{{ $catp->name }}</a>
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



{{-- ############# end Sidebar ##########  --}}



					
					<div class="col-lg-9">

						<div class="row">
							<div class="col-lg-6">

								<div class="thumb-gallery-wrapper">
									<div class="thumb-gallery-detail owl-carousel owl-theme manual nav-inside nav-style-1 nav-dark mb-3">
                              
                              <div>

											<img @if($productDetail->img_pic) src="{{ env('URL_ENDPOINT').$productDetail->img_pic }}"  @else src="{{ env('URL_ENDPOINT').$baseApp['default_logo_comapny'] }}" @endif class="img-fluid" alt="" />
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
                           {{-- <a href="{{ route('expoproperty_front.dev', ['id' => $productDetail->company->uuid ]) }}" class="text-decoration-none text-color-dark text-color-hover-primary border-color-hover-primary font-weight-light" data-tooltip data-original-title="{{$productDetail->company->name}}"><i class="fas fa-chevron-left"></i></a> --}}
                           <a href="#" onclick="window.history.back();" class="text-decoration-none text-color-dark text-color-hover-primary border-color-hover-primary font-weight-light" data-tooltip data-original-title="Back"><i class="fas fa-chevron-left"></i></a>
									&nbsp;&nbsp;&nbsp;
                           {{$productDetail->name}}
                           </h1>

									<div class="pb-0 mt-2 clearfix d-flex align-items-center">
										<div title="Rated 3 out of 5" class="float-left">
											<input type="text" class="d-none" value="3" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'primary', 'size':'xs'}">
										</div>

										<div class="review-num">
											<a href="{{ route('expoproperty_front.dev', ['id' => $productDetail->company->uuid ]) }}" class="text-decoration-none text-color-default text-color-hover-primary" data-hash data-hash-offset="75" data-hash-trigger-click=".nav-link-reviews" data-hash-trigger-click-delay="1000">
                                 {{$productDetail->company->name}}
											</a>
										</div>
									</div>

									<div class="divider divider-small">
										<hr class="bg-color-grey-scale-4">
									</div>

									{{-- <p class="price mb-3">
										<span class="sale text-color-dark">{{$productDetail->cat->name ?? '-'}}</span>
									</p> --}}

									{{-- POST Meta --}}
									<div class="post-meta mb-3">
										<span>
											<i class="far fa-calendar-alt"></i>
											{!! \Carbon\Carbon::parse($productDetail->updated_at)->format("M d, Y") !!}
										</span>
										@php
											try {
												$py = $productDetail->catLike();
											} catch (\Throwable $th) {
												$py = [];
												//dump($th);
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
									{{-- end POST Meta --}}

									<p class="text-3-4 mb-3">
										{{$productDetail->prolog}}
									</p>


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

										@if($btnSaveJob)
										<a href="{{ route('expoproperty_front.saveJob', ['id' => $productDetail->uuid]) }}" class="d-flex align-items-center text-decoration-none text-color-dark text-color-hover-primary font-weight-semibold text-2">
											<i class="far fa-heart mr-1"></i> SAVE TO WISHLIST
										</a>
										@else
										<span href="" class="d-flex align-items-center text-decoration-none text-color-danger font-weight-semibold text-2">
											<i class="far fa-heart mr-1 text-danger"></i> already saved
										</span>
										@endif

									</div>


								</div>
								
							
                         @if( !env('CLOSE_EVENT') )
                            
                            @if( Auth::check() )
										@if( $btnApplyJob )
                            				  @if(  Auth::user()->name == '') 
  
   <button type="button" class="mt-4 btn btn-danger btn-lg btn-block disable" onclick="alert('Silahkan Lengkapi dahulu data lamaran anda di menu my account, (field name)')">Apply Now</button>

  @elseif( Auth::user()->dob == '') 
  <button type="button" class="mt-4 btn btn-danger btn-lg btn-block disable" onclick="alert('Silahkan Lengkapi dahulu data lamaran anda di menu my account, (field tgl) lahir')">Apply Now</button>

  @elseif( Auth::user()->gender == '') 
  <button type="button" class="mt-4 btn btn-danger btn-lg btn-block disable" onclick="alert('Silahkan Lengkapi dahulu data lamaran anda di menu my account, (field gender)')">Apply Now</button>

  @elseif( Auth::user()->telp == '') 
  <button type="button" class="mt-4 btn btn-danger btn-lg btn-block disable" onclick="alert('Silahkan Lengkapi dahulu data lamaran anda di menu my account, (field telp)')">Apply Now</button>

  @elseif( Auth::user()->email == '') 
  <button type="button" class="mt-4 btn btn-danger btn-lg btn-block disable" onclick="alert('Silahkan Lengkapi dahulu data lamaran anda di menu my account, (field email)')">Apply Now</button>

  @elseif( Auth::user()->cv == '') 
  <button type="button" class="mt-4 btn btn-danger btn-lg btn-block disable" onclick="alert('Silahkan Lengkapi dahulu data lamaran anda di menu my account, (field cv)')">Apply Now</button>

  @elseif( Auth::user()->pasfoto == '') 
  <button type="button" class="mt-4 btn btn-danger btn-lg btn-block disable" onclick="alert('Silahkan Lengkapi dahulu data lamaran anda di menu my account, (field pasfoto)')">Apply Now</button>

  @elseif( Auth::user()->institusi == '') 
  <button type="button" class="mt-4 btn btn-danger btn-lg btn-block disable" onclick="alert('Silahkan Lengkapi dahulu data lamaran anda di menu my account, (field institusi)')">Apply Now</button>

  @elseif( Auth::user()->jurusan == '') 
  <button type="button" class="mt-4 btn btn-danger btn-lg btn-block disable" onclick="alert('Silahkan Lengkapi dahulu data lamaran anda di menu my account, (field jurusan)')">Apply Now</button>

  @elseif( Auth::user()->prodi == '') 
  <button type="button" class="mt-4 btn btn-danger btn-lg btn-block disable" onclick="alert('Silahkan Lengkapi dahulu data lamaran anda di menu my account, (field prodi)')">Apply Now</button>

  @elseif( Auth::user()->id_kualifikasi == '') 
  <button type="button" class="mt-4 btn btn-danger btn-lg btn-block disable" onclick="alert('Silahkan Lengkapi dahulu data lamaran anda di menu my account, (field kualifikasi Pendidikan)')">Apply Now</button>

  @elseif( Auth::user()->status_nikah == '') 
  <button type="button" class="mt-4 btn btn-danger btn-lg btn-block disable" onclick="alert('Silahkan Lengkapi dahulu data lamaran anda di menu my account, (field status_nikah)')">Apply Now</button>

  @elseif( Auth::user()->kota_asal == '') 
  <button type="button" class="mt-4 btn btn-danger btn-lg btn-block disable" onclick="alert('Silahkan Lengkapi dahulu data lamaran anda di menu my account, (field kota_asal)')">Apply Now</button>

  @elseif( Auth::user()->alamat == '') 
  <button type="button" class="mt-4 btn btn-danger btn-lg btn-block disable" onclick="alert('Silahkan Lengkapi dahulu data lamaran anda di menu my account, (field alamat)')">Apply Now</button>

  @elseif( Auth::user()->ipk == '') 
  <button type="button" class="mt-4 btn btn-danger btn-lg btn-block disable" onclick="alert('Silahkan Lengkapi dahulu data lamaran anda di menu my account, (field ipk)')">Apply Now</button>

  @elseif( Auth::user()->tinggi == '') 
  <button type="button" class="mt-4 btn btn-danger btn-lg btn-block disable" onclick="alert('Silahkan Lengkapi dahulu data lamaran anda di menu my account, (field tinggi)')">Apply Now</button>

  @elseif( Auth::user()->berat == '') 
  <button type="button" class="mt-4 btn btn-danger btn-lg btn-block disable" onclick="alert('Silahkan Lengkapi dahulu data lamaran anda di menu my account, (field berat)')">Apply Now</button>

  @elseif( Auth::user()->thn_masuk == '') 
  <button type="button" class="mt-4 btn btn-danger btn-lg btn-block disable" onclick="alert('Silahkan Lengkapi dahulu data lamaran anda di menu my account, (field thn_masuk)')">Apply Now</button>

  @elseif( Auth::user()->thn_lulus == '') 
  <button type="button" class="mt-4 btn btn-danger btn-lg btn-block disable" onclick="alert('Silahkan Lengkapi dahulu data lamaran anda di menu my account, (field thn_lulus) ')">Apply Now</button>
  
  @else
  <button type="button" class="mt-4 btn btn-warning btn-lg btn-block disable" data-toggle="modal" data-target=".btnApply" onclick="gooAnalytic('modal-booth-lain')">Apply Now</button>

                            				@endif
											{{-- btn-quaternary --}}
										@else
											<span type="button" class="mt-4 btn btn-outline-primary btn-lg btn-block disable" href="#" >has applied</span>
										@endif
								@else
									<a type="button" class="mt-4 btn btn-warning btn-lg btn-block disable" href="{{ route('expoproperty_front.login') }}" >Apply Now</a>
								@endif
                            
                            @else
<!--                             <a type="button" class="mt-4 btn btn-warning btn-lg btn-block disable" href="{{ route('expoproperty_front.login') }}" ></a> -->
                            <span class="text-danger">The Event close at 16.00, come again tomorrow at 8.00 </span>
                            @endif




							</div>
						</div>

						

					@if( $productDetail->career_level && $productDetail->qualification && $productDetail->year_experience && $productDetail->job_type)
						<h4 class="mb-0">Additional Information</h4>
						<div class="rty">
							<hr class="bg-color-grey-scale-4">
						</div>

						<div class="row">

							@if($productDetail->career_level)
								<div class="col-md-6 my-2">
									<p class="mb-0"><b>Career Level</b></p>
									<span>{{ $productDetail->career_level }}<span>
								</diV>
							@endif

							@if($productDetail->qualification)
								<div class="col-md-6 my-2">
									<p class="mb-0"><b>Qualification</b></p>
									@php
										$qua = (json_decode($productDetail->qualification)) ? json_decode($productDetail->qualification) : [];
									@endphp
									<span>
									@foreach ( $qua as $quaV)
										{{ $quaV }}, 
									@endforeach
									<span>
								</diV>
							@endif

							@if($productDetail->year_experience)
								<div class="col-md-6 my-2">
									<p class="mb-0"><b>Years of Experience</b></p>
									<span>{{ $productDetail->year_experience }}<span>
								</diV>
							@endif

							@if($productDetail->job_type)
								<div class="col-md-6 my-2">
									<p class="mb-0"><b>Job Type</b></p>
									<span>{{ $productDetail->job_type }}<span>
								</diV>
							@endif

						</div>




						<div class="divider divider-small">
							<hr class="bg-color-grey-scale-4">
						</div>
					@endif

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
					

               @php
                     $extra = [];
							$perumahan = $productDetail->company;
               
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




					{{-- ================= --}}
					</div>




{{-- ############# Body DESC ##########  --}}


					
				</div>
			</div>
{{-- ./################################################# --}}
<div class="mx-7">
	<hr class="bg-color-light">
</div>


@include( $base['thema_lock'].'modal-booth-lain')
@include( $base['thema_lock'].'modal-btnApply')


@endsection

@section ('link_js')
   <script src="{{ secure_asset('onefamily/js/views/view.shop.js')}}"></script>
   <script src="{{ secure_asset('onefamily/js/examples.gallery.js')}}"></script>
	
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