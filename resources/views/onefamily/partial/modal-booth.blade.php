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
                        <div class="col-md-3 col-lg-3 mt-3 mb-3">
                           <div class="custom-speaker-card bg-color-light m-auto">
                              <div class="speaker-photo text-center">
                                 {{-- <a href="#speaker-content-1" class="popup-with-zoom-anim text-decoration-none"m text-decoration-none"> --}}
                     <a href="{{ route('expoproperty_front.dev', ['id' => $vPer->uuid ]) }}">
                                    <img loading="lazy" src="{{ env('URL_ENDPOINT').$vPer->img_pic }}" class="img-fluid" alt="{{ $vPer->name }}" style="margin:auto;max-width: 180px;max-height: 180px;">
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