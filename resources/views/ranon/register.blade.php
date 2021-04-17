@extends( $base['thema_lock'].'layoutLogin' )

@section('title')
Register | {{ $baseApp['title'] }}
@endsection


@section('content')

<div class="row h-100">

      <div class="col-md-7 p-5 wow fadeIn" data-wow-delay="0.3s" style="background-color: #499aff91!important;border-radius: 10px; margin:auto;">
          {{-- <form action="home.php" method="POST" role="form"> --}}
        <form id="formRegistrasi" action="{{ route('postRegister') }}" method="post" role="form" >
        @csrf

            {{-- Flash Error Message --}}
            @if(session('errors'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Something it's wrong:
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <ul>
                        @php
                            try {
                                $ert = $errors->all();
                            } catch (\Throwable $th) {
                                $ert = [];
                            }
                        @endphp
                        @foreach ($ert as $error)
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

            <div class="form-group">
                <input type="text" class="form-control height-login form-registrasi" name="name" placeholder="name" required>
            </div>

            <div class="form-group">
                <input type="text" class="form-control height-login form-registrasi" name="wa" placeholder="No. WhatsApp" required>
                <small id="waHelp" class="form-text text-muted text-white">
                    <i class="text-white">Masukan No WhatsApp anda, Example: 085111111 atau 85111111 </i>
                </small>
            </div>
            
            <p class=" mt-1 text-white">
                <b><sup>*</sup>) password akan dikirim ke no whatsApp Anda</b>
            </p>

            {{-- <button type="submit" class="btn btn-primary height-login bg-btn-login w-100">Login</button> --}}
            <div class="w-100 text-center">
                <button id="btnRegister" type="submit" class="btn btn-warning height-login bg-btn-login" onclick="$('#btnRegister').hide();$('#lodingRegister').show();" >Register</button>
                <span id="lodingRegister" class="d-none spinner-border spinner-border-sm text-danger" role="status" aria-hidden="true"></span>
            </div>

            <p class="text-center mt-3 text-white">Sudah punya akun? <a href="{{ route('login') }}" class="text-danger" >Login</a> </p>
          </form>
      </div>

</div>
@endsection

@section('js_bottom')
<script>

    $('.form-registrasi').change(function(){
        $('#lodingRegister').hide();
        $('#btnRegister').show();
    });
    /*
    if( $("#formRegistrasi").valid() ){
        console.log('____', hello);
        $('#btnRegister').hide();
        $('#lodingRegister').show();
    }
    */
</script>
@endsection