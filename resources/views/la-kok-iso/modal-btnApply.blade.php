   @php
   $uuid = '';
   try {
      $uuid = $productDetail->uuid;
   } catch (\Throwable $th) {}
   @endphp
   
   <div class="modal fade btnApply" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            {{-- ..... --}}
            <section>
					<div class="containerpb-4">

                     <div class="row pt-2">
                        <div class="col">
                        <p class="custom-font-size-1 text-center mb-2">Promosikan diri Anda, (Disarankan)</p>
                        </div>
                     </div>

               <form class="col-lg-12 text-center" role="form" action="{{ route('expoproperty_front.applyJob', ['id' => $uuid ]) }}" method="POST">
                  <div class="form-group row">
                     <div class="col-lg-12">
                        <textarea class="form-control" type="text" name="pitch" placeholder="Beritahu perusahaan mengapa Anda paling cocok untuk posisi ini. Sebutkan keterampilan khusus dan bagaimana Anda berkontribusi. Hindari hal generik seperti Saya bertanggung jawab."></textarea>
                     </div>
                  </div>	
                  <div class="form-group row">
                     <div class="form-group m-auto text-center">
                        @csrf
                        <input type="submit" value="Apply" class="btn btn-primary btn-modern float-right" data-loading-text="Loading...">
                     </div>
                  </div>
               </form>


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