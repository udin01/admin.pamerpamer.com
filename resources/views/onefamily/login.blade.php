@extends( $base['thema_lock'].'layoutLogin' )

@section('title')
Login | {{ $baseApp['title'] }}
@endsection


@section('content')

        <section class="section section-overlay-opacity section-overlay-opacity-scale-7 border-0 m-0" style="background-image: url({{ env('URL_ENDPOINT').$baseApp['bg_login'] }}); background-size: cover; background-position: center;">
					<div class="container py-5">
						<div class="row align-items-center justify-content-center">
							<div class="col-lg-6 text-center mb-5 mb-lg-0">
								<div class="d-flex flex-column align-items-center justify-content-center h-100">
									<img src="{{ env('URL_ENDPOINT').$base['logo'] }}" class="appear-animation w-100" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="50" data-plugin-options="{'minWindowWidth': 0}" alt="" />
									<p class="text-4 text-color-light font-weight-light mb-0" data-plugin-animated-letters data-plugin-options="{'startDelay': 350, 'minWindowWidth': 0}">Check out our options and features</p>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="slider-contact-form-wrapper bg-primary rounded p-5 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="100" data-appear-animation-duration="1s">
									<div class="row">
										<div class="col text-center">
											<h2 class="font-weight-light text-white text-6 mb-2">
                        <strong>Buku Tamu</strong>
                      </h2>
											{{-- <p class="text-white mb-4 px-xl-5">
                        <strong>Buku Tamu</strong>
                      </p> --}}
                      <hr/>
										</div>
									</div>
									<div class="row">
										<div class="col">
    <form action="{{ route('postLogin') }}" method="post" role="form" class="row h-100 pt-2 w-100">
    
      <div class="wow fadeIn w-100" data-wow-delay="0.3s" style="background: url('@foreach ( $sponsor as $kSp => $sp ) {{ env('URL_ENDPOINT').$sp['img_pic'] }} @endforeach') no-repeat; background-size: 200px; background-position: center bottom;border-radius: 25px; margin:auto; padding-bottom: 10em !important;">
          {{-- <form action="home.php" method="POST" role="form"> --}}
        {{-- <form action="{{ route('postLogin') }}" method="post" role="form" style="margin-bottom: 50px;"> --}}
        @csrf

            {{-- Flash Error Message --}}
            @if(session('errors'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Something it's wrong:
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
            @endif
            {{-- ./Flash Error Message --}}

             {{-- 
             <p class="text-center text-dark mb-0">Belum punya akun? <br/> <br/>
             <a href="{{ route('register') }}" class="btn-small btn-danger text-light p-1 mt-2" style="border-radius: 10px;">Register dahulu</a>

             </p>

             <div class="col-12" style="text-align: center;">
             <svg class="zoomout-ani" id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 35px;margin-top: -8px;position: absolute;"
             ><defs><style>.cls-1{fill:#495875;}.cls-2{fill:#2686ef;}</style></defs><title>gesture-11-filled</title><path class="cls-1" d="M162.91,512h225a15.52,15.52,0,0,0,15.52-15.52V451.13a155.92,155.92,0,0,1,9.55-53.83l4.94-13.48a143.43,143.43,0,0,0,8.78-49.49V272.85c0-24.48-18.46-45.41-42-47.67a46.84,46.84,0,0,0-24.41,4.27c-6.82-15-21-25.94-37.65-27.54a46.93,46.93,0,0,0-21.94,3.19c-5.28-18.3-21-32.39-40.12-34.22a47.13,47.13,0,0,0-20,2.47V109.94c0-24.48-18.46-45.41-42-47.67a46.56,46.56,0,0,0-51.06,46.33V256.92c-23,2.9-39.23,12.61-48.5,29-25.5,45,18.56,121,23.67,129.47.21.35.44.69.67,1,18.72,26.24,24.16,36.81,24.16,56.27v23.82A15.52,15.52,0,0,0,162.91,512Zm-37-210.83c3.72-6.56,10.92-10.86,21.48-12.85v14.22a15.52,15.52,0,0,0,31,0V108.61a15.53,15.53,0,0,1,17.09-15.44c7.82.75,13.94,8.12,13.94,16.78V232.73a15.52,15.52,0,0,0,31,0V217.21a15.53,15.53,0,0,1,17.09-15.44c7.82.75,13.94,8.12,13.94,16.78v45.21a15.52,15.52,0,0,0,31,0V248.24a15.36,15.36,0,0,1,5.08-11.48,15.61,15.61,0,0,1,12-4c7.82.75,13.94,8.12,13.94,16.78V287a15.52,15.52,0,0,0,31,0V271.52a15.53,15.53,0,0,1,17.09-15.44c7.82.75,13.94,8.12,13.94,16.78v61.47a112.52,112.52,0,0,1-6.89,38.81l-4.94,13.48a186.94,186.94,0,0,0-11.45,64.51V481H178.42v-8.31c0-29-9.47-45.56-29.55-73.77C133.24,372.57,113.41,323.23,125.91,301.17Z"/><path class="cls-2" d="M100.85,124.12a15.52,15.52,0,0,0,15.52-15.52,77.58,77.58,0,0,1,155.15,0,15.52,15.52,0,1,0,31,0,108.61,108.61,0,0,0-217.21,0A15.52,15.52,0,0,0,100.85,124.12Z"/></svg>
             </div>

             <hr/>
             --}}

            <div class="form-group text-white">
                <label>Masukkan No. WhatsApp Anda </label>
                <input type="text" class="form-control height-login" name="wa" placeholder="No. WhatsApp" id="waNo" required>
                <small id="waHelp" class="form-text text-muted text-white">
                    <i class="text-white">Example: 085111111 atau 85111111 </i>
                </small>
            </div>
             <div class="form-group form-group-nama text-white" style="display:none;">
                <label><small>Masukkan Nama Anda</small></label>
                <input type="text" class="form-control height-login" name="nama" placeholder="Nama" id="namaForm">
            </div>

            {{-- <button type="submit" class="btn btn-primary height-login bg-btn-login w-100">Login</button> --}}
            <button href="javascript:void(0);" class="btn btn-dark height-login bg-btn-login w-100" onclick="waKamu();" >Login</button>
           
          {{-- </form> --}}
          {{-- <div class="meja d-none d-lg-block " style="
              background: url('https://pamerpamer.com/uploads/1/meja.png') no-repeat center;
              width: 100%;
              height: 100%;
              position: absolute;
              right: 0;
              margin-top: 20px;
          ">
              </div> --}}
      </div>
      <!-- Modal -->
      <div class="modal fade" id="ModalOTP" role="dialog" tabindex="-1" role="dialog" data-backdrop="false" style="background: rgba(0,0,0,0.5);">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content" style="border-radius: 25px;">
            <div class="modal-header">
              {{-- <h5 class="modal-title">OTP Telah Dikirim</h5> --}}
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <h4>Masukan kode OTP</h4>
              <p>berupa 6 digit kode yang dikirim ke nomor WhatsApp Anda : <strong id="refNoWA"> </strong> </p>
              <div class="text-center textOTP">
                <input type="number" class="form-control text-center" name="otp" required>
                <a id="btnSendOTPLagi" href="javascript:void(0);" onclick="sendOTP()"><br>Kirim ulang kode OTP<br></a>
              </div>
              <hr>
              <div class="">
                <button type="submit" class="btn btn-primary form-control">Verifikasi</button>
              </div>

            </div>
          </div>
        </div>
      </div>

    </form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>

@endsection

@section('js_bottom')
<script>
    $('#waNo').change(function(){
        let wert = $('#waNo').val();
        $('#waTemp').val( wert );
        $('#refNoWA').text(wert);
    });
    function sendOTP(){
      let nowaa = $('#waNo').val();
        if(!nowaa){
          $("#ModalOTP").modal('hide');
          $('#waNo').focus();
          return false;
        }
        console.log('____', nowaa);
        $.ajax({ 
          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
          url: '{{ route('getOTPlagi') }}',type: 'post',
          data: { noWa : nowaa},
          success: function(t) {
            if( t === 'Nomer Belum terdaftar') {
              alert( 'Nomer Anda belum terdaftar lakukan Registrasi terlebih dahulu' );
              document.location = '{{ route('register') }}';
            } else if( t === 'fail' ) {
              alert( 'Maaf server ada masalah' );
            } else {
                alert( t );
                $("#btnSendOTPLagi").hide();
                $("#textOTP").append("<span>"+t+"</span>");
            }

          }, 
          error: function(t) { console.log( '___Error', t ) }
      });
    };
    function waKamu(){
        let nowaa = $('#waNo').val();
        let namaKamu = $('#namaForm').val();
        if(!nowaa){
          $('#waNo').focus();
          return false;
        }

        $.ajax({ 
          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
          url: '{{ route('waKamu') }}',type: 'post',
          data: { noWa : nowaa, nama: namaKamu},
          success: function(t) {
            if(t == 'reg'){
              alert( 'Nomer Anda belum terdaftar lakukan Registrasi terlebih dahulu, dengan memasukan Nama' );
              /*
              document.location = '{{ route('register') }}';
              */
              $(".form-group-nama").show();
              $("#namaForm").focus();
              
            } else {
              $("#ModalOTP").modal('show');
              if( t === 'login_success'){
                  location.reload();
              }
            }
          }, 
          error: function(t) { console.log( '___Error', t ) }
      });
    }

</script>
@endsection