@extends( $base['thema_lock'].'master' )

@section('title_admin')
  {{ $baseApp['title'] }}
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
					<li class="active">Daftar</li>
				</ul>
			</div>
		</div>

			<div class="row">
				<div class="col-md-12 align-self-center p-static order-2 text-center">
					<h1 class="text-dark text-8"> Daftar</h1>
				</div>
			</div>
		</div>
	</section>
@endsection


@section ('content')
<div class="container">

  <div class="row py-4">
    <div class="col-lg-6">

      <div class="overflow-hidden mb-1">
        <h2 class="font-weight-normal text-7 mt-2 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="200"><strong class="font-weight-extra-bold">Daftar</strong> Job Fair UB</h2>
      </div>
      <div class="overflow-hidden mb-4 pb-3">
        <p class="mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="400">Mulai karirmu disini!</p>
      </div>

      <form class="contact-form" action="{{ route('expoproperty_front.post-signup') }}" method="POST">
        @csrf
        <div class="contact-form-success alert alert-success d-none mt-4">
          <strong>Success!</strong> User Success Create, Login with you Email & password.
        </div>

        <div class="contact-form-error alert alert-danger d-none mt-4">
          <strong>Error!</strong> There was an error sending your message.
          <span class="mail-error-message text-1 d-block"></span>
        </div>
        <div class="form-row">
          <div class="form-group col-lg-6">
            <label class="required font-weight-bold text-dark text-2">Nama Lengkap</label>
            <input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" required>
          </div>
          <div class="form-group col-lg-6">
            <label class="font-weight-bold text-dark text-2">Nomor Telepon</label>
            <input type="tel" value="" data-msg-required="Please enter your phone number." maxlength="100" class="form-control" name="telp" required>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-lg-6">
            <label class="required font-weight-bold text-dark text-2">Alamat Email</label>
            <input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" required>
          </div>
          <div class="form-group col-lg-6">
            <label class="font-weight-bold text-dark text-2">Password</label>
            <input type="password" value="" data-msg-required="Please enter your password." maxlength="100" class="form-control" name="password" required>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-8">
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" name="checkboxes[]" type="checkbox" data-msg-required="Please Checklist." id="inlineCheckbox1" value="option1" required> Saya telah menyetujui Syarat & Ketentuan.
              </label>
            </div>
          </div>
          <div class="form-group col-md-4">
            <div class="text-right">
              <label class="form-check-label">
                <a href="{{ route('expoproperty_front.login') }}">Sudah punya Akun?</a>
              </label>
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col">
            <input type="submit" value="Daftar" class="btn btn-primary btn-modern" data-loading-text="Loading...">
          </div>
        </div>
      </form>
      


    </div>
    <div class="col-lg-6">

      @include( $base['thema_lock'].'side-login')

    </div>

  </div>

</div>

@endsection
